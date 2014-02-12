<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
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
		$this->load->model('administracion/Categoria_Model','acm');
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

	public function getZonasPersonal()
	{
		$this->load->model('administracion/ZonaPersonal_Model','zopermod');
		$result = $this->zopermod->get_zonaspersonal();
		echo json_encode(array('aaData' => $result));
	}


	/*recuperar productos para ofertas
	*/
	public function getProductoSinOferta()
	{
		$this->load->model('logistica/Producto_model','prodm');
		$productos = $this->prodm->get_sinoferta();
		echo json_encode(array('aaData' => $productos));
	}

	public function getProductosByOferta($nOferta_id)
	{
		$this->load->model('logistica/Producto_model','prodm');
		$productos = $this->prodm->get_byoferta($nOferta_id);
		foreach ($productos as $key => $producto) {
			$productos[$key]["estadolabel"] = '<span class="label label-success">Activo</span>';
		}
		echo json_encode(array('aaData' => $productos));
	}

	public function getLocales()
	{
		$this->load->model('administracion/Local_Model','lo');
		$result = $this->lo->get_locales();
		echo json_encode(array('aaData' => $result));
	}

	public function get_trabajadores_sinzona(){
		$this->load->model('administracion/Trabajadores_Model','tramod');
		$result = $this->tramod->get_trabajadores_sinzona();
		echo json_encode(array('aaData' => $result));
	}

	public function get_trabajadores_activos(){
		$this->load->model('administracion/Trabajadores_Model','tramod');
		$result = $this->tramod->get_trabajadores_activos();
		echo json_encode(array('aaData' => $result));
	}

	public function getOfertas()
	{
		$this->load->model('administracion/Oferta_Model','ofertm');
		$ofertas = $this->ofertm->get_ofertas();
		foreach ($ofertas as $key => $oferta) {
			switch ($oferta["estado"]) {
			    case 1:
			        $ofertas[$key]["estadolabel"] = '<span class="label label-success">Vigente</span>';
			        break;
			    case 2:
			        $ofertas[$key]["estadolabel"] = '<span class="label label-info">Programada</span>';
			        break;
			    case 3:
			        $ofertas[$key]["estadolabel"] = '<span class="label">Terminada</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $ofertas));
	}
	public function get_usuarios(){
		$this->load->model('administracion/Usuario_Model','us');
		$usuarios = $this->us->get_usuarios();

		foreach ($usuarios as $key => $usuario) {
			switch ($usuario["estado"]) {
			    case 0:
			        $usuarios[$key]["estadolabel"] = '<span class="label label-important">Inhabilitado</span>';
			        break;
			    case 1:
			        $usuarios[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $usuarios));
	}
}