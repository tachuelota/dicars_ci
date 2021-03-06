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
		$cargos = $this->acam->get_cargos();
		foreach ($cargos as $key => $cargo) {
		switch ($cargo["cCargosEst"]) {				
			    case 0:
			        $cargos[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
			        break;
			    case 1:
			        $cargos[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $cargos));			
	}

	//Tipo de Categoria Activo get_categoria_activo

	public function getCategoria_Activo()
	{
		$this->load->model('administracion/Categoria_Model','acm');
		$result = $this->acm->get_categoria_activo();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}	

	public function getCategoria()
	{		
		$this->load->model('administracion/Categoria_Model','acm');
		$categorias = $this->acm->get_categorias();
		foreach ($categorias as $key => $categoria) {
		switch ($categoria["cCategoriaEst"]) {				
			    case 0:
			        $categorias[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
			        break;
			    case 1:
			        $categorias[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $categorias));
	}

	//Marcas activas
	public function getMarcas_Activo()
	{
		$this->load->model('administracion/Marca_Model','amm');
		$result = $this->amm->get_activos();	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getMarcas()
	{
		$this->load->model('administracion/Marca_Model','amm');
		$marcas = $this->amm->get_marcas();
		foreach ($marcas as $key => $marca) {
			switch ($marca["cMarcaEst"]) {				
			    case 0:
			        $marcas[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
			        break;
			    case 1:
			        $marcas[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $marcas));
	}

	public function getTrabajadores()
	{
		
		$this->load->model('administracion/Trabajadores_Model','tramod');
		$trabajadores = $this->tramod->get_trabajadores();
		foreach ($trabajadores as $key => $trabajador) {
			switch ($trabajador["cPersonalEst"]) {				
			    case 0:
			        $trabajadores[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
			        break;
			    case 1:
			        $trabajadores[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $trabajadores));
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
	
	public function getClaseConstante()
	{
		$this->load->model('administracion/Constante_Model','constm');
		$result = $this->constm->get_Clases();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

	public function getTipoMonedas($nTipoMoneda = FALSE)
	{
		$this->load->model('administracion/TipoMoneda_Model','tmonmod');
		if($nTipoMoneda === FALSE)
		{
			$tipomoneda = $this->tmonmod->get_tipomoneda();
			foreach ($tipomoneda as $key => $tipomonedas) {
				switch ($tipomonedas["cTipoMonedaEst"]) {		
				    case 0:
				        $tipomoneda[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
				        break;
				    case 1:
				        $tipomoneda[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
				        break;
				}
			}
			$tipomoneda = array('aaData' => $tipomoneda);
		}
		else
		{
			$tipomoneda = $this->tmonmod->get_tipomoneda($nTipoMoneda);
		}
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($tipomoneda));
	}

	//CARGAR TIPO IGV

	public function getTipoIGVActivo()
	{
		$this->load->model('administracion/TipoIGV_Model','igvm');
		$result = $this->igvm->get_activo();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function getTipoIGV($nTipoIGV = FALSE)
	{
		$this->load->model('administracion/TipoIGV_Model','igvm');
		if($nTipoIGV === FALSE)
		{
			$tipoigv = $this->igvm->get_tipoIGV();
			foreach ($tipoigv as $key => $tipo_igv) {
				switch ($tipo_igv["cTipoIGVEst"]) {				
				    case 0:
				        $tipoigv[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
				        break;
				    case 1:
				        $tipoigv[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
				        break;
				}
			}
			$tipoigv = array('aaData' => $tipoigv);
		}
		else
			$tipoigv = $this->igvm->get_tipoIGV($nTipoIGV);
	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($tipoigv));
	}

	public function getZonas()
	{
		$this->load->model('administracion/Zona_Model','zonmod');
		$zonas = $this->zonmod->get_zonas();
		foreach ($zonas as $key => $zona) {
			switch ($zona["nZonaEst"]) {				
			    case 0:
			        $zonas[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
			        break;
			    case 1:
			        $zonas[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $zonas));
	}

	public function get_zonas_activos()
	{	
		$this->load->model('administracion/Zona_Model','zonmod');
		$result = $this->zonmod->get_zonas_activos();
		echo json_encode(array('aaData' => $result));
	} 

	public function get_ZonaByUbigeo($nUbigeo_id)
	{	
		$this->load->model('administracion/Zona_Model','zonmod');
		$result = $this->zonmod->get_ByUbigeo($nUbigeo_id);
		echo json_encode(array('aaData' => $result));
	} 


	public function getZonasPersonal()
	{
		$this->load->model('administracion/ZonaPersonal_Model','zopermod');
		$result = $this->zopermod->get_zonaspersonal();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


	public function getUbigeo()
	{
			$query = $this ->db->get ('ubigeo');
			echo json_encode($query -> result_array());
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
		$locales = $this->lo->get_locales();
		foreach ($locales as $key => $local) {
			switch ($local["nLocalEst"]) {				
			    case 0:
			        $locales[$key]["estadolabel"] = '<span class="label label-info">Inhabilitado</span>';
			        break;
			    case 1:
			        $locales[$key]["estadolabel"] = '<span class="label label-success">Habilitado</span>';
			        break;
			}
		}
		echo json_encode(array('aaData' => $locales));
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

	public function get_trabajadores_nouser(){
		$this->load->model('administracion/Trabajadores_Model','tramod');
		$result = $this->tramod->get_trabajadores_nouser();
		echo json_encode(array('aaData' => $result));
	}

	public function get_trabajadores_bylocal(){

		$nLocal_id= $this->session->userdata('current_local')["nLocal_id"];

		$this->load->model('administracion/Trabajadores_Model','tramod');
		$result = $this->tramod->get_trabajadores_bylocal($nLocal_id);
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
			switch ($usuario["active"]) {
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

	public function get_groupsbyUser($user_id)
	{
		$result = $this->ion_auth->get_users_groups($user_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result->result_array()));
	}

	public function get_LocalbyUser($user_id)
	{
		$this->load->model('administracion/UserLocal_Model','ulom');
		$result = $this->ulom->get_byuser($user_id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

}