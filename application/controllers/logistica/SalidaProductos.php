<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* 
*/
class SalidaProductos extends CI_Controller
{
	
	function  __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Salida Productos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/cons_salidaproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_salidaproductos.js';
		$datafooter['active'] = 'sal_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}
	public function registrar_view(){
		$dataheader['title'] = 'Dicars - Salida Productos (Registrar) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/reg_salidaproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/reg_salidaproductos.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	public function ver_view(){
		$dataheader['title'] = 'Dicars - Salida Productos (Ver) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/ver_salidaproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ver_salidaproductos.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}

?>