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
		//CARGAR PRODUCTOS
	
		$this->load->model('logistica/Producto_Model','prod');
		$result = $this->prod->get_producto();
		echo json_encode(array('aaData' => $result));
	}
	
	public function getProveedor(){
		//CARGAR PRODUCTOS
		
		$this->load->model('logistica/Proveedor_Model','pro');
		$result = $this->pro->get_proveedor();
		echo json_encode(array('aaData' => $result));
	}
}