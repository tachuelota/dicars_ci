<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('administracion/Categoria_Model','acm');
	}
	//CARGAR CARGOS
	public function getCargos()
	{
		$this->load->model('administracion/Cargo_Model','acam');
		$result = $this->acam->get_cargos();
		echo json_encode(array('aaData' => $result));			
	}
	
	public function getCategoria()
	{
		$result = $this->acm->get_categorias();
		echo json_encode(array('aaData' => $result));
	}
	public function getMarcas()
	{
		$this->load->model('administracion/Marca_Model','amm');
		$result = $this->amm->get_marcas();
		echo json_encode(array('aaData' => $result));
	}


	public function getTrabajadores()
	{
		$this->load->model('administracion/Trabajadores_Model','tramod');
		$result = $this->tramod->get_trabajadores();
		echo json_encode(array('aaData' => $result));
	}
	
	
	public function getConstantes()
	{
		$this->load->model('administracion/Constante_Model','constm');
		$result = $this->constm->get_constantes();
		echo json_encode(array('aaData' => $result));

	}

	public function getConstantesByClase($clase)
	{
		$this->load->model('administracion/Constante_Model','constm');
		$result = $this->constm->get_ByClase($clase);
		echo json_encode(array('aaData' => $result));
	}
	
	public function getTipoMonedas(){
		$this->load->model('administracion/TipoMoneda_Model','tmonmod');
		$result = $this->tmonmod->get_tipomoneda();
		echo json_encode(array('aaData' => $result));
	}

	//CARGAR TIPO IGV
	public function getTipoIGV(){
	$this->load->model('administracion/TipoIGV_Model','igvm');
		$result = $this->igvm->get_tipoIGV();
		echo json_encode(array('aaData' => $result));
	}

	public function getZonas()
	{
		$this->load->model('administracion/Zona_Model','zonmod');
		$result = $this->zonmod->get_zonas();
		echo json_encode(array('aaData' => $result));
	}


	/*recuperar productos para ofertas
	*/
	public function getProductoOferta()
	{
		$productos = $this->db->query("SELECT * FROM ven_productossinoferta");
		echo json_encode(array('aaData' => $productos->result_array()));
	}
}