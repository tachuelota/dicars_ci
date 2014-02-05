<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Cronogramas extends CI_Controller {
		public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/cronogramas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/cronograma.js';
		$datafooter['active'] = 'cron_pago';
		$this->load->view('templates/footer.php',$datafooter);
	}
	
}