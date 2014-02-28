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
		if ($this->ion_auth->logged_in())
		{
			if(!$this->ion_auth->selected_local())
				redirect('auth/select_local', 'refresh');
		}
		else
			redirect('login', 'refresh');
	}

	public function index()
	{
		if($this->ion_auth->in_group_type(1))
		{
			$dataheader['title'] = 'Dicars - Home Pages -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/homepages.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/homepages.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}


	//Clientes

	public function clientes()
	{
		if($this->ion_auth->in_group("ven_client"))
		{
			$dataheader['title'] = 'Dicars - Ventas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/clientes.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/clientes.js';
			$datafooter['active'] = 'clientes';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	//Cronograna

	public function cronogramas()
	{
		if($this->ion_auth->in_group("ven_crono"))
		{
			$dataheader['title'] = 'Dicars - Ventas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/cronogramas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/cronograma.js';
			$datafooter['active'] = 'cron_pago';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function cronogramas_detalle()
	{
		if($this->ion_auth->in_group("ven_crono"))
		{
			$dataheader['title'] = 'Dicars - Ventas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/cronogramas_detalle.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/cronogramas_detalle.js';
			$datafooter['active'] = 'cron_pago';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

    //Reporte Zona
	public function reporte_zonas()
	{
		if($this->ion_auth->in_group("ven_report_zona"))
		{
			$dataheader['title'] = 'Dicars - Reporte Zonas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/reporte_zonas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reporte_zonas.js';
			$datafooter['active'] = 'clienteszonas_rep';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function tarjetascreditos()
	{
		if($this->ion_auth->in_group("ven_tarj_cred"))
		{	
			$pagedata["local"] = $this->session->userdata('current_local');
			$dataheader['title'] = 'Dicars - Tarjetas de Creditos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/tarjetascreditos.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/tarjetascreditos.js';
			$datafooter['active'] = 'tarj_cred';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

    
	// Todo de Ventas
	public function cons_ventas()
	{
		if($this->ion_auth->in_group("ven_ven_prod"))
		{
	      	$dataheader['title'] = 'Dicars - Ventas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/ventas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/consultar.js';
			$datafooter['active'] = 'venta_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	} 

	public function editar_ventas()
	{
		if($this->ion_auth->in_group("ven_ven_prod"))
		{
	      	$dataheader['title'] = 'Dicars - Ventas -(editar)';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/editar_ventas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/editar_ventas.js';
			$datafooter['active'] = 'venta_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	} 
	
	public function registrar_ventas()
	{
		if($this->ion_auth->in_group("ven_ven_prod"))
		{
			$this->load->model('administracion/Trabajadores_Model','tra');
			$pagedata["trabajador"] = $this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);
			$pagedata["local"] = $this->session->userdata('current_local');
	      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/reg_ventas.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reg_ventas.js';
			$datafooter['active'] = 'venta_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	} 

	public function ver_ventas()
	{
		if($this->ion_auth->in_group("ven_ven_prod"))
		{
	      	$dataheader['title'] = 'Dicars - Ventas -(registrar)';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/ver_ventas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/ver_ventas.js';
			$datafooter['active'] = 'venta_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	} 


	public function reporte_ventas()
	{
		if($this->ion_auth->in_group("ven_ven_prod"))
		{
	      	$dataheader['title'] = 'Dicars - Ventas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/reporte_ventas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/reporte_ventas.js';
			$datafooter['active'] ='ventas_rep';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	} 

	/*******************MOVIMIENTOS*******************/
	public function movimientos()
	{
		if($this->ion_auth->in_group("ven_movi"))
		{
			$this->load->model('administracion/Trabajadores_Model','tra');
			$dataheader['title'] = 'Dicars - Movimientos -';
			$pagedata["trabajador"] = $this->tra->get_trabajadores($this->ion_auth->user()->row()->nPersonal_id);
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('ventas/movimientos.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/ventas/movimientos.js';
			$datafooter['active'] = 'movimientos';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}	
}