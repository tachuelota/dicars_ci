<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getProductos(){
		$this->load->model('logistica/Producto_Model','prod');
		$result = $this->prod->get_producto();
		echo json_encode(array('aaData' => $result));
	}
	
	public function getProveedor(){		
		$this->load->model('logistica/Proveedor_Model','pro');
		$result = $this->pro->get_proveedor();
		echo json_encode(array('aaData' => $result));
	}	
	public function get_trabajadores_activos(){		
		$this->load->model('administracion/Trabajadores_Model','tra');
		$result = $this->tra->get_trabajadores_activos();
		echo json_encode(array('aaData' => $result));
	}	
	public function getOrdenPedido(){
		
		$this->load->model('logistica/OrdPedido_Model','ordpe');
		$result = $this->ordpe->get_ordenpedido();
		echo json_encode(array('aaData' => $result));
	}	
	//CARGAR POR RANGO DE FECHAS
	public function get_log_ingprod($Desde,$Hasta){		

			$this->load->model('logistica/IngProducto_Model','ingprod');
			$result = $this->ingprod->get_fromrange($Desde,$Hasta);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}
	public function get_log_salprod($Desde,$Hasta){		

			$this->load->model('logistica/SalProducto_Model','salpro');
			$result = $this->salpro->get_fromrange($Desde,$Hasta);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}
	public function get_log_ordcompra_rangefechas($Desde,$Hasta){		

			$this->load->model('logistica/OrdCompra_Model','ordcomp');
			$result = $this->ordcomp->get_fromrange($Desde,$Hasta);
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));		
	}

	//CARGAR DETALLES(TABLAS)
	public function get_log_detingprod($nIngProd_id){		

			$this->load->model('logistica/DetIngProducto_Model','detingprod');
			$detalles=$this->detingprod->get_DetIngProducto($nIngProd_id);
			foreach ($detalles as $key => $detalle) 
			{
			    $detalles[$key]["estadolabel"] = '<span class="label label-success">Activo</span>';
			    $detalles[$key]["band"] = 1;

			}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}
	public function get_log_detsalprod($nSalProd_id){		

			$this->load->model('logistica/DetSalProducto_Model','detsalprod');
			$detalles=$this->detsalprod->get_DetIngProducto($nSalProd_id);
			foreach ($detalles as $key => $detalle) 
			{
			    $detalles[$key]["estadolabel"] = '<span class="label label-success">Activo</span>';
			    $detalles[$key]["band"] = 1;

			}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}
	public function get_log_detordcompras($nOrdenCom_id){		

			$this->load->model('logistica/DetOrdCompra_Model','detordcompra');
			$detalles=$this->detordcompra->get_DetOrdCompra($nOrdenCom_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}
	public function get_log_detordpedido($nOrdPed_id){		

			$this->load->model('logistica/DetOrdPedido_Model','detordped');
			$detalles=$this->detordped->get_DetOrdPedido($nOrdPed_id);
			foreach ($detalles as $key => $detalle) 
			{
			    $detalles[$key]["estadolabel"] = '<span class="label label-success">Activo</span>';
			    $detalles[$key]["band"] = 1;

			}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $detalles)));		
	}

	

}