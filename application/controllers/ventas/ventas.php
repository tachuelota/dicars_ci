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
	
}
?>