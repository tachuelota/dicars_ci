<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class Producto extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->library('ion_auth');
		$this->load->database();
		$this->lang->load('auth');
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