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
	public function getClientes_cronograma()
	{
		$this->load->model('ventas/Clientes_Model','climod');
		$result = $this->climod->get_clientes();
		foreach ($result as $key => $value) {							
				$result[$key]["boton"] = "<a class='btn btn-success btn-pagar' href='cronogramas_detalle/".$value["nCliente_id"]."' ><i class='icon-zoom-in icon-white'></i>
									Ver Creditos</a>";
		}
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_detallecronograma_bycliente($nCliente_id)
	{
		$this->load->model('ventas/VentaCredito_Model','cred');
		$result = $this->cred->get_Creditos_ByClientes($nCliente_id);
			foreach ($result as $key => $value) {
				if($value["creditoest"] == 2)
				{
					$result[$key]["estadolabel"] = "<span class='label label-success'>Pagada</span>";
					$result[$key]["btnpagar"] = "";
					$result[$key]["btnreporte"] = "<button type='button' class='btn btn-success btn-cronograma' data-loading-text='Cargando...'>Reporte del Crédito</button>";		
				}else{
					$result[$key]["estadolabel"] = "<span class='label label-important'>Pendiente</span>";
					$result[$key]["btnpagar"] = "<a class='btn btn-success btn-pagar' href='#'>Pagar Cuotas</a>";
					$result[$key]["btnreporte"] = "<a  class='btn btn-success btn-cronograma'>Reporte del Crédito</a>";
				}
			}
	$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}		
	
}