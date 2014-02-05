<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Ventas extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index()
	{
      	$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/ventas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/consultar.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 

	public function editar_view()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(editar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/editar.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/editar.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 
	
	public function registrar_view()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/registrar.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/registrar.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 

	public function ver_view()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/ver.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/ver.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 


	public function reporte_view()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/reporte.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reporte.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 
	
	

}
?>