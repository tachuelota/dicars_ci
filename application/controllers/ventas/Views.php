<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler HomePages
*/
class Views extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Home Pages -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/homepages.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/homepages.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}


	//Clientes

	public function clientes()
	{
		$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/clientes.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/clientes.js';
		$datafooter['active'] = 'clientes';
		$this->load->view('templates/footer.php',$datafooter);
	}

	//Cronograna

	public function cronogramas()
	{
		$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/cronogramas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/cronograma.js';
		$datafooter['active'] = 'cron_pago';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function cronogramas_detalle()
	{
		$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/cronogramas_detalle.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/cronogramas_detalle.js';
		$datafooter['active'] = 'cron_pago';
		$this->load->view('templates/footer.php',$datafooter);
	}

    //Reporte Zona
	public function reporte_zonas()
	{
		$dataheader['title'] = 'Dicars - Reporte Zonas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/reporte_zonas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reporte_zonas.js';
		$datafooter['active'] = 'clienteszonas_rep';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function tarjetascreditos()
	{
		$dataheader['title'] = 'Dicars - Tarjetas de Creditos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/tarjetascreditos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/tarjetascreditos.js';
		$datafooter['active'] = 'tarj_cred';
		$this->load->view('templates/footer.php',$datafooter);
	}

    
	// Todo de Ventas
	public function cons_ventas()
	{
      	$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/ventas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/consultar.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 

	public function editar_ventas()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(editar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/editar_ventas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/editar_ventas.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 
	
	public function registrar_ventas()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/reg_ventas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reg_ventas.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 

	public function ver_ventas()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/ver_ventas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/ver_ventas.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 


	public function reporte_ventas()
	{
      	$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/reporte_ventas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reporte_ventas.js';
		$datafooter['active'] ='ventas_rep';
		$this->load->view('templates/footer.php',$datafooter);
	} 

	/*******************MOVIMIENTOS*******************/
	public function movimientos()
	{
		$dataheader['title'] = 'Dicars - Movimientos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/movimientos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/movimientos.js';
		$datafooter['active'] = 'movimientos';
		$this->load->view('templates/footer.php',$datafooter);
	}	
}