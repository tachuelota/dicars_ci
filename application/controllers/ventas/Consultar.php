<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Consultar extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index()
	{
      	$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/Consultar.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/consultar.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 
	

}
?>