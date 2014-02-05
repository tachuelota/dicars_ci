<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* 
*/
class IngresoProductos extends CI_Controller
{
	
	function  __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Ingreso Productos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/cons_ingresoproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}	

	/*public function editar_view()
	{
		$dataheader['title'] = 'Dicars - Ingreso Productos (Editar) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/editar_salidaproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/cons_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}*/
	public function registrar_view(){
		$dataheader['title'] = 'Dicars - Ingreso Productos (Registrar) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/reg_ingresoproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/reg_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}
	public function editar_view(){
		$dataheader['title'] = 'Dicars - Ingreso Productos (Editar) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/editar_ingresoproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/editar_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}
	public function ver_view(){
		$dataheader['title'] = 'Dicars - Ingreso Productos (Ver) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/ver_ingresoproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ver_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}

}

?>