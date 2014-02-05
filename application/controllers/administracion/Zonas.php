<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Zona_Edit
*/
class Zonas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Zonas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/zonas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/zonas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}