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

	public function cons_clientes()
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

	public function const_cronograma()
	{
		$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/cronogramas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/cronograma.js';
		$datafooter['active'] = 'cron_pago';
		$this->load->view('templates/footer.php',$datafooter);
	}


    //Ofertas
	public function const_ofertas()
	{
		$dataheader['title'] = 'Dicars - Ofertas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/ofertas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/ofertas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

    //Reporte Zona
	public function const_reporte_zonas()
	{
		$dataheader['title'] = 'Dicars - Reporte Zonas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/reporte_zonas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reporte_zonas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

    //Tarjetas Creditos
	public function const_tarjetascreditos()
	{
		$dataheader['title'] = 'Dicars - Tarjetas de Creditos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/tarjetascreditos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/tarjetascreditos.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	//Trabajadores

	public function const_trabajadores()
	{
		$dataheader['title'] = 'Dicars - Trabajadores -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/trabajadores.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/trabajadores.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

    
	// Todo de Ventas
	public function const_ventas()
	{
      	$dataheader['title'] = 'Dicars - Ventas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/ventas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/consultar.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 

	public function editar_view()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(editar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/editar.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/editar.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 
	
	public function registrar_view()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/registrar.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/registrar.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 

	public function ver_view()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/ver.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/ver.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 


	public function reporte_view()
	{
      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('ventas/reporte.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reporte.js';
		$datafooter['active'] = 'venta_prod';
		$this->load->view('templates/footer.php',$datafooter);
	} 
	
}