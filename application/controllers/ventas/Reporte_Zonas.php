<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Usuarios
*/
class Reporte_Zonas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Reporte Zonas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/reporte_zonas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reporte_zonas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}