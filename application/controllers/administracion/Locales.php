<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Locales
*/
class Locales extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Locales -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/locales.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/locales.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}