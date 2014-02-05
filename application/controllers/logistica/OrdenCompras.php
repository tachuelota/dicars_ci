<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Locales
*/
class OrdenCompras extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - OrdenCompras -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/cons_ordencompras.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_ordencompras.js';
		$datafooter['active'] = 'ord_com';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function registrar_view()
	{
		$dataheader['title'] = 'Dicars - OrdenCompras (Registrar) -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/reg_ordencompras.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_ordencompras.js';
		$datafooter['active'] = 'ord_com';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function ver_view()
	{
		$dataheader['title'] = 'Dicars - OrdenCompras (Ver) -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/ver_ordencompras.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_ordencompras.js';
		$datafooter['active'] = 'ord_com';
		$this->load->view('templates/footer.php',$datafooter);
	}
}

?>