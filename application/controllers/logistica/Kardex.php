<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Kardex
*/
class Kardex extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Kardex -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/kardex.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/kardex.js';
		$datafooter['active'] = 'gen_kardex';
		$this->load->view('templates/footer.php',$datafooter);
	}
}

?>