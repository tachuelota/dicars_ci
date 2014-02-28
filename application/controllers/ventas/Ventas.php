<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Ventas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ventas/Venta_Model','venm');
		$this->load->model('ventas/DetalleVenta_Model','detvenm');
		$this->load->model('logistica/SalProducto_Model','salprod');
		$this->load->model('logistica/DetSalProducto_Model','detsalprod');
		$this->load->model('ventas/VentaCredito_Model','credm');
		$this->load->model('ventas/VentaCronograma_Model','cronom');
		$this->load->model('ventas/Transaccion_Model', "transm");
	}

	public function registrar()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$form = $this->input->post('formulario',true);
			$productos = $this->input->post('productos',true);
			if($form != null)
			{

				$nLocal_id = $this->session->userdata('current_local')["nLocal_id"];
				$nPersonal_id = $this->ion_auth->user()->row()->nPersonal_id;
				$datenow = date("Y-m-d");
				$MontoTrans = $form["total"];
				$DesTrans = "Venta al Contado";
				$Estado = null;

				if ($form["forma_pago"] == 1) 
					$Estado = '2'; //pagada/cancelada
				else if($form["saldo"] > 0 && $form["forma_pago"] == 3)
					$Estado = '3'; //separada
				else if($form["saldo"] > 0 && $form["forma_pago"] == 2)
					$Estado = '1'; //pendiente/deuda
				else
					$Estado = '0'; //anulada

				$this->db->trans_begin();

				$venta = array(
					"nCliente_id" => $form["cliente_id"],
					"cVentaFecReg" => $datenow,
					"nTipoMoneda"=> $form["tipo_moneda"],
					"nVentaSubTotal" => $form["subtotal"],
					"nVentaDscto" => $form["descuento"],
					"nVentaTipPag" => $form["forma_pago"],
					"cVentaObsv" => $form["observacion"],
					"nVentaTotApag" => $form["total"],
					"nVentaTotAmt" => $form["amortizacion"],
					"nVentaSaldo" => $form["saldo"],
					"nLocal_id" => $nLocal_id,
					"nTipoIGV" => $form["tipo_igv"],
					"cVentaEst" => $Estado
					);

				try {

					$nVenta_id = $this->venm->insert($venta);

					if($form["forma_pago"] == '3')
					{
						$DesTrans = "Venta Separada";
						$MontoTrans = $form["amortizacion"];
					}
			

					if($form["forma_pago"] != '3')
					{
						$SalProd = array($nPersonal_id,$nLocal_id,2,$nPersonal_id,"Salida por ventas");
						$nSalProd_id = $this->salprod->insert($SalProd);
					}

					if($form["forma_pago"] == '2')
					{
						$Credito = array(
							"nCreditoFormaPag" => $form["forma_pago"],
							"nVenCreditoNCuota" => $form["num_cuotas"],
							"nVenCreditoMontInicial" => $form["amortizacion"],
							"nVenCreditoPPag" => 100/$form["num_cuotas"],
							"nVenta_id" => $nVenta_id,
							"cCreditoEst" => 1
							);
						
						$idCredito = $this->credm->insert($Credito);
						$FechaDiaPago = date_create_from_format('d/m/Y', $form["prim_cuota"]);
						$CronoPago = array();
						for($i = 0 ; $i < $form["num_cuotas"]; $i++)
						{
							$CronoPago[] = array(
								"nCronPagoNroCuota" => $i+1,
								"nCronPagoFecReg" => $datenow,
								"nCronPagoFecPago" => $FechaDiaPago->format("Y-m-d"),
								"nCronPagoMonCouApg" => $form["montocuota"],
								"nVenCredito_id" => $idCredito,
								);													
							$FechaDiaPago -> modify('+7 day');
						}

						$this->cronom->insert_batch($CronoPago);
							
						$DesTrans = "Venta Credito";
						$MontoTrans = $form["amortizacion"];
					}					
					$DetalleSalProd = array();
					foreach ($productos as $key => $prod)
					{
						$productos[$key]["nVenta_id"] = $nVenta_id;
						$DetalleSalProd[]= array(
							"nSalProd_id" => $nSalProd_id,
							"nProducto_id" => $prod["nProducto_id"],
							"DetSalProdCant" => $prod["nDetVentaCant"],
							"cDetSalProdEst" => 1
							);
					}

					$transaccion = array(
						"nPersonal_id" => $nPersonal_id,
						"nVenta_id" => $nVenta_id,
						"cTransaccionDesc" => $DesTrans,
						"nTransaccionMont" => $MontoTrans,
						"dTransaccionFecReg" => $datenow,
 						"nTransaccionTipPag" => $form["forma_pago"]
						);

					$this->transm->insert($transaccion);
					$this->detvenm->insert_batch($productos);
					$this->detsalprod->insert_batch($DetalleSalProd);
					if ($this->db->trans_status() === FALSE)
					{
						$this->db->trans_rollback();
					}
					else
					{
						$this->db->trans_commit();
					}	

				} catch (Exception $e) {
					$this->db->trans_rollback();
					$this->output->set_status_header('400');
				}
			}
			else
				$this->output->set_status_header('400');
		}
		else
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}
}
?>