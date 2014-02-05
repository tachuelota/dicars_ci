<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Clientes extends CI_Controller {
		public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/clientes.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/clientes.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	
}