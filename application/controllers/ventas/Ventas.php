<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Ventas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('ventas/Venta_Model','venm');
		$this->load->model('ventas/DetalleVenta_Model','detvenm');
	}

	public function registrar()
	{
		if(isset($_POST) && !empty($_POST))
		{
			$form = $this->input->post('formulario',true);
			$productos = $this->input->post('productos',true);
			if($form != null)
			{
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
					"nLocal_id" => $this->session->userdata('current_local')["nLocal_id"],
					"nTipoIGV" => $form["tipo_igv"]
					);
			}
			else
				$this->output->set_status_header('400');
		}
		else
			$this->output->set_status_header('400');
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($venta));
	}
}
?>