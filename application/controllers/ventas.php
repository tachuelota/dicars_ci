<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Ventas extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
	}
	function index()
	{
		$this->load->view('ventas/clientes.php');
	}
	function clientes(){
		$dataheader['title'] = 'Clientes - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/clientes.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/clientes.js';
		$datafooter['active'] = 'clientes';
		$this->load->view('templates/footer.php',$datafooter);
	}
}
?>