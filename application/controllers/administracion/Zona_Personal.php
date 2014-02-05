<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Zona_Edit
*/
class Zona_Personal extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Zona_Edit -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/zona_personal.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/zona_personal.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}