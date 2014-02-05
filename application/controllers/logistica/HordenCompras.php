<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Locales
*/
class HordenCompras extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - HordenCompras -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/cons_hordencompras.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/hordencompras.js';
		$datafooter['active'] = 'admin_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}
}

?>