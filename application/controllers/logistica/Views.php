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
		if($this->ion_auth->in_group_type(2))
		{
			$dataheader['title'] = 'Dicars - Logistica -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/homepage.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/homepage.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/', 'refresh');
	}

	public function cons_ordencompra()
	{
		if($this->ion_auth->in_group("log_ord_comp"))
		{
			$dataheader['title'] = 'Dicars - OrdenCompras -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/cons_ordencompras.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_ordencompras.js';
			$datafooter['active'] = 'ord_com';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function reg_ordencompra()
	{
		if($this->ion_auth->in_group("log_ord_comp"))
		{
			$dataheader['title'] = 'Dicars - OrdenCompras (Registrar) -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_ordencompras.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_ordencompras.js';
			$datafooter['active'] = 'ord_com';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function ver_ordencompras($nOrdenCom_id)
	{
		if($this->ion_auth->in_group("log_ord_comp"))
		{
			$this->load->model('logistica/OrdCompra_Model','ordcomp');
			$pagedata = $this->ordcomp->get_OrdCompra_views($nOrdenCom_id);	
			$dataheader['title'] = 'Dicars - OrdenCompras (Ver) -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_ordencompras.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_ordencompras.js';
			$datafooter['active'] = 'ord_com';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function cons_ingresoproductos()
	{
		if($this->ion_auth->in_group("log_ing_prod"))
		{
			$dataheader['title'] = 'Dicars - Ingreso Productos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/cons_ingresoproductos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_ingresoproductos.js';
			$datafooter['active'] = 'ing_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}	
	public function reg_ingresoproductos()
	{
		if($this->ion_auth->in_group("log_ing_prod"))
		{
			$dataheader['title'] = 'Dicars - Ingreso Productos (Registrar) - ';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_ingresoproductos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_ingresoproductos.js';
			$datafooter['active'] = 'ing_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}
	public function editar_ingresoproductos($nIngProd_id)
	{
		if($this->ion_auth->in_group("log_ing_prod"))
		{
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
		else
			redirect('/ventas', 'refresh');
	}
	public function ver_ingresoproductos($nIngProd_id)
	{
		if($this->ion_auth->in_group("log_ing_prod"))
		{
			$this->load->model('logistica/IngProducto_Model','ingprod');		
			$pagedata = $this->ingprod->get_IngProducto($nIngProd_id);		
			$dataheader['title'] = 'Dicars - Ingreso Productos (Ver) - ';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_ingresoproductos.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_ingresoproductos.js';
		$datafooter['active'] = 'ing_prod';
		$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function kardex()
	{
		if($this->ion_auth->in_group("log_gen_kardex"))
		{
			$dataheader['title'] = 'Dicars - Kardex -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/kardex.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/kardex.js';
			$datafooter['active'] = 'gen_kardex';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function productos()
	{
		if($this->ion_auth->in_group("log_prd"))
		{
			$dataheader['title'] = 'Dicars - Productos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/productos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/productos.js';
			$datafooter['active'] = 'admin_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function proveedores()
	{
		if($this->ion_auth->in_group("log_prove"))
		{
			$dataheader['title'] = 'Dicars - Proveedores -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/proveedores.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/proveedores.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function cons_salidaproductos()
	{
		if($this->ion_auth->in_group("log_sal_prod"))
		{
			$dataheader['title'] = 'Dicars - Salida Productos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/cons_salidaproductos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/cons_salidaproductos.js';
			$datafooter['active'] = 'sal_prod';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}
	public function reg_salidaproductos()
	{
		if($this->ion_auth->in_group("log_sal_prod"))
		{
			$dataheader['title'] = 'Dicars - Salida Productos (Registrar) - ';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_salidaproductos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_salidaproductos.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function ver_salidaproductos($nSalProd_id)
	{
		if($this->ion_auth->in_group("log_sal_prod"))
		{
			$this->load->model('logistica/SalProducto_Model','salprod');		
			$pagedata = $this->salprod->get_SalProducto($nSalProd_id);
				
			$dataheader['title'] = 'Dicars - Salida Productos (Ver) - ';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_salidaproductos.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_salidaproductos.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function saldo_inicial()
	{
		if($this->ion_auth->in_group("log_sal_ini"))
		{
			$dataheader['title'] = 'Dicars - Saldo Inicial - ';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/saldo_inicial.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/saldo_inicial.js';
			$datafooter['active'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function cons_pedidos()
	{
		if($this->ion_auth->in_group("log_ord_ped"))
		{
			$dataheader['title'] = 'Dicars - Pedidos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/pedidos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/pedidos.js';
			$datafooter['active'] = 'ord_ped';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function reg_pedidos()
	{
		if($this->ion_auth->in_group("log_ord_ped"))
		{
			$dataheader['title'] = 'Dicars - Pedidos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/reg_pedidos.php');
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/reg_pedidos.js';
			$datafooter['active'] = 'ord_ped';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}

	public function ver_pedidos($nOrdPed_id)
	{
		if($this->ion_auth->in_group("log_ord_ped"))
		{
			$this->load->model('logistica/OrdPedido_Model','ordped');
			$pagedata = $this->ordped->get_OrdPedido_Views($nOrdPed_id);
			$dataheader['title'] = 'Dicars - Pedidos -';
			$this->load->view('templates/headers.php',$dataheader);		
			$this->load->view('templates/menu.php');
			$this->load->view('logistica/ver_pedidos.php',$pagedata);
			$datafooter['jsvista'] = 'assets/js/jsvistas/logistica/ver_pedidos.js';
			$datafooter['active'] = 'ord_ped';
			$this->load->view('templates/footer.php',$datafooter);
		}
		else
			redirect('/ventas', 'refresh');
	}
	
}