<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {
	public function getClientes()
	{
		$this->load->model('ventas/Clientes_Model','climod');
		$result = $this->climod->get_clientes();
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


	public function getProductosToVenta()
	{
		$this->load->model('logistica/Producto_model','prodm');
		$productos = $this->prodm->get_toventas();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $productos)));
	}	

	public function getMovimientos($Desde,$Hasta)
	{
		$this->load->model('ventas/Movimientos_Model','amm');		
		$result = $this->amm->get_fromrange($Desde,$Hasta);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	
	
}