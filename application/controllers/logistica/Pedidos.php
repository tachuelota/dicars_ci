<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class Pedidos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Pedidos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/pedidos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/pedidos.js';
		$datafooter['active'] = 'ord_ped';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function registrar_view()
	{
		$dataheader['title'] = 'Dicars - Pedidos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/reg_pedidos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_pedidos.js';
		$datafooter['active'] = 'ord_ped';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function ver_view()
	{
		$dataheader['title'] = 'Dicars - Pedidos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/ver_pedidos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_pedidos.js';
		$datafooter['active'] = 'ord_ped';
		$this->load->view('templates/footer.php',$datafooter);
	}
	
}

?>