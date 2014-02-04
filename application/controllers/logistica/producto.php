<?php 
/**
* Controler producto
*/
class Producto extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('producto_model');
	}

	public function index()
	{
		$data['productos'] = $this->producto_model->get_producto();
		$data['title'] = 'Producto';
		$this->load->view('templates/header', $data);
		$this->load->view('productos/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($nProducto_id)
	{
		$data['producto_item'] = $this->producto_model->get_producto($nProducto_id);
		if (empty($data['producto_item']))
		{
			show_404();
		}
		$data['title'] = $data['producto_item']['cProductoDesc'];
		$this->load->view('templates/header', $data);
		$this->load->view('productos/view', $data);
		$this->load->view('templates/footer');
	}
	public function json()
	{
		$data['productos'] = $this->producto_model->get_producto();
		echo json_encode($data);
	}
}

?>