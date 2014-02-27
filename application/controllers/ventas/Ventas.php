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
	}

	public function registrar()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$form = $this->input->post('formulario',true);
			$productos = $this->input->post('productos',true);
			if($form != null)
			{
				if ($form["forma_pago"] == 1) 
					$Estado = '2'; //pagada/cancelada
				else if($form["saldo"] > 0 && $form["forma_pago"] == 3)
					$Estado = '3'; //separada
				else if($form["saldo"] > 0 && $form["forma_pago"] == 2)
					$Estado = '1'; //pendiente/deuda
				else
					$Estado = '0'; //anulada

				$nLocal_id = $this->session->userdata('current_local')["nLocal_id"];

				$this->db->trans_begin();
				$venta = array(
					"nCliente_id" => $form["cliente_id"],
					"cVentaFecReg" => date("Y-m-d"),
					"nTipoMoneda"=> $form["tipo_moneda"],
					"nVentaSubTotal" => $form["subtotal"],
					"nVentaDscto" => $form["descuento"],
					"nVentaTipPag" => $form["forma_pago"],
					"cVentaObsv" => $form["observacion"],
					"nVentaTotApag" => $form["total"],
					"nVentaTotAmt" => $form["amortizacion"],
					"nVentaSaldo" => $form["saldo"],
					"nLocal_id" => $nLocal_id,
					"nTipoIGV" => $form["tipo_igv"]
					);

				try {
					$nVenta_id = $this->venm->insert($venta);

					if($form["forma_pago"] != '3')
					{
						$SalProd = array(
							"nPersonal_id" => $this->session->userdata('user_id'),
							"nLocal_id" => $nLocal_id,
							"nSalProdMotivo" => 2,
							"nSolicitante_id" => $this->session->userdata('user_id'),
							"cSalProdObsv" => "Salida por ventas"
							);
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
						$FechaDiaPago = date_create_from_format('d/m/Y', $datos["prim_cuota"]);
						$CronoPago = array();
						for($i = 0 ; $i < $form["num_cuotas"]; $i++)
						{
							$FechaPagoReg = date_create_from_format('d/m/Y', $FechaDiaPago -> format("d/m/Y"));
							$CronoPago[] = array(
								"nCronPagoNroCuota" => $i+1,
								"nCronPagoFecReg" => date("Y-m-d"),
								"nCronPagoFecPago" => $FechaPagoReg,
								"nCronPagoMonCouApg" => $form["montocuota"],
								"nVenCredito_id" => $idCredito,
								);													
							$FechaDiaPago -> modify('+7 day');
						}

						$this->cronom->insert_batch($CronoPago);
							
						$DesTrans = "Venta Credito";
						$MontoTrans = $datos["amortizacion"];
					}					
					$DetalleSalProd = array();
					foreach ($productos as $key => $prod)
					{
						$productos[$key]["nVenta_id"] = $nVenta_id;
						$DetalleSalProd[]= array(
							"nSalProd_id" => $nSalProd_id,
							"nProducto_id" => $prod["nProducto_id"],
							"DetSalProdCant" => $prod["nDetVentaCant"],
							"cDetSalProdEst" => 1,
							);
					}
					$this->detvenm->insert_batch($productos);
					$this->detsalprod->insert_batch($DetalleSalProd);
					$this->db->trans_commit();

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
			->set_output(json_encode($Estado));
	}
}
?>