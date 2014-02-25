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
		if($this->ion_auth->in_group_type(3))
		{
			$dataheader['title'] = 'Dicars - Home Page -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/homepages.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/homepages.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}

	/************************Cargos***************************************/
	public function cargos()
	{
		if($this->ion_auth->in_group("admin_cargos"))
		{
			$dataheader['title'] = 'Dicars - Cargos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/cargos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/cargos.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**********************Categorias**********************************/
	public function categorias()
	{
		if($this->ion_auth->in_group("admin_categ"))
		{
			$dataheader['title'] = 'Dicars - Categorias -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');		
			$this->load->view('administracion/categorias');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/categorias.js';
			$datafooter['active'] = 'admin_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	/*************************CONSTANTES***********************************/
	public function constantes()
	{
		if($this->ion_auth->in_group("admin_const"))
		{
			$dataheader['title'] = 'Dicars - Constantes -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/constantes.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/constantes.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/******************LOCALES***********************/
	public function locales()
	{
		if($this->ion_auth->in_group("admin_local"))
		{
			$dataheader['title'] = 'Dicars - Locales -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/locales.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/locales.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**********************MARCAS*******************************/
	public function marcas()
	{
		if($this->ion_auth->in_group("admin_marca"))
		{
			$dataheader['title'] = 'Dicars - Marcas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/marcas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/marcas.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/****************TIPO IGVS*******************/
	public function tipoIGV()
	{
		if($this->ion_auth->in_group("admin_igv"))
		{
			$dataheader['title'] = 'Dicars - Tipo IGV -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/tipoIGV.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/tipoIGV.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**************************TIPO MONEDAS*************************************/
	public function tipoMonedas()
	{
		if($this->ion_auth->in_group("admin_mon"))
		{
			$dataheader['title'] = 'Dicars - Tipo Moneda -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/tipoMonedas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/tipoMonedas.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**************USUARIOS¨¨¨¨¨¨¨¨*******************/
	public function usuarios()
	{
		if($this->ion_auth->in_group("admin_us"))
		{
			$this->load->model('administracion/Local_Model','lo');
			$dataview["locales"] = $this->lo->get_activos();
			$dataview["groups_ventas"] = $this->ion_auth->groups_bytipo(1);
			$dataview["groups_logistica"] = $this->ion_auth->groups_bytipo(2);
			$dataview["groups_administracion"] = $this->ion_auth->groups_bytipo(3);

			$dataheader['title'] = 'Dicars - Usuarios -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/usuarios.php',$dataview);
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/usuarios.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**********************ZONA EDIT************************/
	public function editar_zonasPersonal()
	{
		if($this->ion_auth->in_group("admin_pers"))
		{
			$dataheader['title'] = 'Dicars - Zona_Edit -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/editar_zonasPersonal.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/zona_edit.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/**********ZONA PERSONAL**************/
	public function zona_personal()
	{
		if($this->ion_auth->in_group("admin_zonpers"))
		{
			$dataheader['title'] = 'Dicars - Zona_Edit -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/zona_personal.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/zona_personal.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	/***********************ZONAS*************************/
	public function cons_zonas()
	{
		if($this->ion_auth->in_group("admin_zona"))
		{
			$dataheader['title'] = 'Dicars - Zonas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/cons_zonas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/zonas.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}
	
	//Trabajadores

	public function trabajadores()
	{
		if($this->ion_auth->in_group("admin_trab"))
		{
			$dataheader['title'] = 'Dicars - Trabajadores -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/trabajadores.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/trabajadores.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	
    //Ofertas
	public function ofertas()
	{
		if($this->ion_auth->in_group("admin_ofert"))
		{
			$dataheader['title'] = 'Dicars - Ofertas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/ofertas.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/ofertas.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	//Editar Ofertas
	public function editar_ofertas($nOferta_id)
	{
		if($this->ion_auth->in_group("admin_ofert"))
		{
			$this->load->model('administracion/Oferta_Model','ofertm');
			$pagedata = $this->ofertm->get_ofertas($nOferta_id);
			$dataheader['title'] = 'Dicars - Ofertas -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('administracion/editar_ofertas.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/editar_ofertas.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/administracion', 'refresh');
	}

	//Editar Ofertas
	public function change_password()
	{
		$dataheader['title'] = 'Dicars - Cambiar contraseña -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/change_password.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/change_password.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}