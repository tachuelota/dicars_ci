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
		$dataheader['title'] = 'Dicars - Home Page -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/homepages.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/homepages.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	/************************Cargos***************************************/
	public function cargos()
	{
		//$this->load->view('welcome_message');
		$dataheader['title'] = 'Dicars - Cargos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/cargos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/cargos.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	/**********************Categorias**********************************/
	public function categorias()
	{
		$dataheader['title'] = 'Dicars - Categorias -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');		
		$this->load->view('administracion/categorias');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/categorias.js';
		$datafooter['active'] = 'admin_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}

	/*************************CONSTANTES***********************************/
	public function constantes()
	{
		$dataheader['title'] = 'Dicars - Constantes -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/constantes.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/constantes.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	/******************LOCALES***********************/
	public function locales()
	{
		$dataheader['title'] = 'Dicars - Locales -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/locales.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/locales.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	/**********************MARCAS*******************************/
	public function marcas()
	{
		//$this->load->view('welcome_message');
		$dataheader['title'] = 'Dicars - Marcas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/marcas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/marcas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);

	}
	/****************TIPO IGVS*******************/
	public function tipoIGV()
	{
		//$this->load->view('welcome_message');
		$dataheader['title'] = 'Dicars - Tipo IGV -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/tipoIGV.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/tipoIGV.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	/**************************TIPO MONEDAS*************************************/
	public function tipoMonedas()
	{
		//$this->load->view('welcome_message');
		$dataheader['title'] = 'Dicars - Tipo Moneda -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/tipoMonedas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/tipoMonedas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	/**************USUARIOS¨¨¨¨¨¨¨¨*******************/
	public function usuarios()
	{
		$dataheader['title'] = 'Dicars - Usuarios -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/usuarios.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/usuarios.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	/**********************ZONA EDIT************************/
	public function editar_zonas()
	{
		$dataheader['title'] = 'Dicars - Zona_Edit -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/editar_zonas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/zona_edit.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	/**********ZONA PERSONAL**************/
	public function zona_personal()
	{
		$dataheader['title'] = 'Dicars - Zona_Edit -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/zona_personal.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/zona_personal.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	/***********************ZONAS*************************/
	public function cons_zonas()
	{
		$dataheader['title'] = 'Dicars - Zonas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/cons_zonas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/zonas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
	
	//Trabajadores

	public function trabajadores()
	{
		$dataheader['title'] = 'Dicars - Trabajadores -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/trabajadores.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/trabajadores.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	
    //Ofertas
	public function ofertas()
	{
		$dataheader['title'] = 'Dicars - Ofertas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/ofertas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/ofertas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}