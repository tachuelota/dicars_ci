<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class Views extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Logistica -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/homepage.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/homepage.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function cons_ordencompra()
	{
		$dataheader['title'] = 'Dicars - OrdenCompras -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/cons_ordencompras.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_ordencompras.js';
		$datafooter['active'] = 'ord_com';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function reg_ordencompra()
	{
		$dataheader['title'] = 'Dicars - OrdenCompras (Registrar) -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/reg_ordencompras.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_ordencompras.js';
		$datafooter['active'] = 'ord_com';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function ver_ordencompras()
	{
		$dataheader['title'] = 'Dicars - OrdenCompras (Ver) -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/ver_ordencompras.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_ordencompras.js';
		$datafooter['active'] = 'ord_com';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function cons_ingresoproductos()
	{
		$dataheader['title'] = 'Dicars - Ingreso Productos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/cons_ingresoproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}	
	public function reg_ingresoproductos(){
		$dataheader['title'] = 'Dicars - Ingreso Productos (Registrar) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/reg_ingresoproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}
	public function editar_ingresoproductos($nIngProd_id){

		$this->load->model('logistica/IngProducto_Model','ingprod');		
		$pagedata = $this->ingprod->get_IngProducto($nIngProd_id);		
		$dataheader['title'] = 'Dicars - Ingreso Productos (Editar) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/editar_ingresoproductos.php',$pagedata);
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/editar_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}
	public function ver_ingresoproductos(){
		$dataheader['title'] = 'Dicars - Ingreso Productos (Ver) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/ver_ingresoproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function kardex()
	{
		$dataheader['title'] = 'Dicars - Kardex -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/kardex.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/kardex.js';
		$datafooter['active'] = 'gen_kardex';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function productos()
	{
		$dataheader['title'] = 'Dicars - Productos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/productos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/productos.js';
		$datafooter['active'] = 'admin_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function proveedores()
	{
		$dataheader['title'] = 'Dicars - Proveedores -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/proveedores.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/proveedores.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function cons_salidaproductos()
	{
		$dataheader['title'] = 'Dicars - Salida Productos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/cons_salidaproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_salidaproductos.js';
		$datafooter['active'] = 'sal_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}
	public function reg_salidaproductos(){
		$dataheader['title'] = 'Dicars - Salida Productos (Registrar) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/reg_salidaproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_salidaproductos.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function ver_salidaproductos(){
		$dataheader['title'] = 'Dicars - Salida Productos (Ver) - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/ver_salidaproductos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_salidaproductos.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function saldo_inicial(){
		$dataheader['title'] = 'Dicars - Saldo Inicial - ';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/saldo_inicial.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/saldo_inicial.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function cons_pedidos()
	{
		$dataheader['title'] = 'Dicars - Pedidos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/pedidos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/pedidos.js';
		$datafooter['active'] = 'ord_ped';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function reg_pedidos()
	{
		$dataheader['title'] = 'Dicars - Pedidos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/reg_pedidos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_pedidos.js';
		$datafooter['active'] = 'ord_ped';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function ver_pedidos()
	{
		$dataheader['title'] = 'Dicars - Pedidos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('logistica/ver_pedidos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_pedidos.js';
		$datafooter['active'] = 'ord_ped';
		$this->load->view('templates/footer.php',$datafooter);
	}
	
}