<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class AdministrarProducto extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Productos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/productos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/productos.js';
		$datafooter['active'] = 'admin_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}
}

?>