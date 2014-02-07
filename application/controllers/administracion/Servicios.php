<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('administracion/Categoria_Model','acm');
	}

	public function getCargos()
	{
		$this->load->model('administracion/Cargo_Model','acam');
		$result = $this->acam->get_cargos();
		echo json_encode(array('aaData' => $result));
			
	}
	
	public function getCargoByIdAction($id){
	}
	
	public function getCategoria()
	{
		$result = $this->acm->get_categorias();
		echo json_encode(array('aaData' => $result));
	}
	
	public function getCategoriaByIdAction($id){
	}
	
	public function getMarcas()
	{
		$this->load->model('administracion/Marca_Model','amm');
		$result = $this->amm->get_marcas();
		echo json_encode(array('aaData' => $result));
	}
	
	public function getMarcaByIdAction($id)
	{

	}


	public function getTablaUsuarioAction(){
		
	}
	
	public function getUsuarioByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$usuario = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Usuario')
		->findOneBy(array('nusuarioId' => $id));
	
		$data = array('id' => $usuario -> getNusuarioId(),
				'trabajador' => $usuario -> getNpersonal()->getNpersonalId(),
				'usuario_id' => $usuario -> getCusuarioId(),
				'clave' => $usuario -> getCusuarioclave(),
				'estado' => $usuario -> getCusuarioest(),
				'fecharegistro' => $usuario -> getCusuariofecreg()-> format('d/m/Y')
				);
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaZonasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$zonas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenZona')
		->findAll();
	
		$todo = array();
		foreach ($zonas as $key => $zona){
			$estado = '';
			$estadochar = $zona -> getNzonaest();
			if($estadochar=="1")
				$estado = "
<span class='label label-success'>Habilidado</span>
";
			else
				$estado = "
<span class='label label-important'>Inhabilitado</span>
";
			
			$dist = $zona -> getNubigeo();
			
			$prov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
			
			$dep = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
			
			$ubigeo =  $dist -> getCubigeodesc()." - ".$prov -> getCubigeodesc()." - ".$dep -> getCubigeodesc();
			
			$todo[] = array('id' => $zona -> getNzonaId(),
					'desc' => $zona -> getCzonadesc(),
					'selectEstado' => $zona -> getNzonaest(),
					'estado' => $estado,
					'dist' => $dist -> getNubigeoId(),
					'prov' => $prov -> getNubigeoId(),
					'dep' => $dep -> getNubigeoId(),
					'ubigeo' =>  $ubigeo,
					'edit_btn' => "
<a id-data='".$zona ->
	getNzonaId()."' class='btn btn-info btn-editar' href='#'>
	<i class='icon-edit icon-white'></i>
	Editar
</a>
"
			);
		}
		
		$em->clear();
		$em->close();		
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getOptionMarcasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$marcas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenMarca')
		->findAll();
				
		$todo = array();
		
		foreach ($marcas as $key => $marca){
			$todo[] = array('id' => $marca->getNmarcaId(),
				'desc' => $marca->getCmarcadesc(),
				);
		}
		$em->clear();
		$em->close();	
		return new JsonResponse($todo);
	}
	
	/*public function getOptionCargosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cargos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCargo')
		->findAll();
		$em->clear();
	
		$result = "";
		foreach ($cargos as $key => $cargo){
			$result = $result."
<option value='".$cargo->getNcargoId()."'>".$cargo->getNcargodesc()."</option>
";
		}
		return new Response($result);
	}*/
	
	public function getOptionCategoriasAction(){
	}
	
	public function getConstantes()
	{
		$this->load->model('administracion/Constante_Model','constm');
		$result = $this->constm->get_constantes();
		echo json_encode(array('aaData' => $result));

	}
	
	public function getConstanteByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$constante = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findOneBy(array('nconstanteId' => $id));
	
		$data = array('id' => $constante -> getNconstanteId(),
				'clase' => $constante -> getNconstanteclase(),
				'nom_clase' => $constante -> getCconstantedesc(),
				'valor' => $constante -> getCconstantevalor());
		
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTipoMonedas(){
		$this->load->model('administracion/TipoMoneda_Model','tmonmod');
		$result = $this->tmonmod->get_tipomoneda();
		echo json_encode(array('aaData' => $result));
	}
	
	public function getTipoMonedasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$monedas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipomoneda')
		->findBy(array('ntipomonedaest' => 1));
		
		$todo = array();
		foreach ($monedas as $key => $moneda){
			$todo[] = array('id' => $moneda -> getNtipomoneda(),
					'desc_tipomoneda' => $moneda -> getCtipomonedadesc(),
					'monto' => $moneda -> getNtipomonedamont(),
					'estado' => $moneda -> getNtipomonedaest()
				);
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionTipoByClaseAction($Clase){
		$em = $this->getDoctrine()->getEntityManager();
			
		$Tipos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findBy(array('nconstanteclase' => $Clase));
	
		$result = "";
		foreach ($Tipos as $key => $tipo){
			if($tipo -> getCconstantevalor() != 0 )
				$result = $result."
<option value='".$tipo ->getCconstantevalor()."'>".$tipo->getCconstantedesc()."</option>
";
		}
		return new Response($result);
	}
	
	public function getOptionUbigeoAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$ubigeos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findAll();
		
		$todo = array();
		foreach ($ubigeos as $key => $ubigeo){
			$todo[] = array('id' => $ubigeo -> getNubigeoId(),
					'desc' => $ubigeo -> getCubigeodesc(),
					'dep' => $ubigeo -> getNubigeodpt(),
					'prov' => $ubigeo -> getNubigeoprov(),
					'dist' => $ubigeo -> getNubigeodist(),
					'depend' => $ubigeo -> getNubigeodep()
			);
		}
		
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionConstantesAction($idclase){
		$em = $this->getDoctrine()->getEntityManager();
			
		$constantes = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findBy(array('nconstanteclase'=>$idclase));
		
		$todo = array();
		foreach ($constantes as $key => $constante){
			if($constante -> getCconstantevalor() != 0){
				$todo[] = array('id' => $constante -> getNconstanteId(),
						'clase' => $constante -> getNconstanteclase(),
						'desc' => $constante -> getCconstantedesc(),
						'valor' => $constante -> getCconstantevalor()
				);
			}
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionCargosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$cargos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenCargo')
		->findBy(array('ccargocoest' => '1'));
	
		$todo = array();
		foreach ($cargos as $key => $cargo){
			$todo[] = array('id' => $cargo -> getNcargoId(),
					'desc' => $cargo -> getNcargodesc(),
					'estado' => $cargo -> getCcargocoest()
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionTiposIGVAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$tiposigv = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipoigv')
		->findAll();
	
		$todo = array();
		foreach ($tiposigv as $key => $tipoigv){
			if($tipoigv->getCtipoigvest() == 1){
				$todo[] = array('id' => $tipoigv -> getNtipoigv(),
						'porc' => $tipoigv -> getNtipoigvproc()
				);
			}
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getOptionZonasAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$zonas = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenZona')
		->findAll();
	
		$todo = array();
	
		foreach ($zonas as $key => $zona){
			$todo[] = array('id' => $zona->getNzonaId(),
					'desc' => $zona->getCzonadesc(),
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getTipoIGV(){

	}
	
	public function getTablaTipoIGVByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$tipos = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenTipoigv')
		->findOneBy(array('ntipoigv' => $id));
	
		$data = array('id' => $tipos -> getNtipoigv(),
				'tipo' => $tipos -> getCtipoigv(),
				'porcentaje' => $tipos -> getNtipoigvproc(),
				'fecha' => $tipos -> getDtipoigvfecreg() -> format("d/m/Y"),
				'estado' => $tipos -> getCtipoigvest());
		
		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaZonasNoAsignadaAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "select nZona_id from ven_zona 
				where not exists (
					select * from ven_zonapersonal 
					where ven_zona.nZona_id = ven_zonapersonal.nZona_id)";						
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$zonas = $smt->fetchAll();
		
		$todo = array();
		
		foreach ($zonas as $key => $idzona){
			$zona = $this->getDoctrine()
				->getRepository('DicarsDataBundle:VenZona')
				->findOneBy(array('nzonaId' =>$idzona['nZona_id']));
			
			$estado = '';
			$estadochar = $zona -> getNzonaest();
			
			if($estadochar=="1")
				$estado = "
<span class='label label-success'>Habilidado</span>
";
			else
				$estado = "
<span class='label label-important'>Inhabilitado</span>
";
				
			$dist = $zona -> getNubigeo();
				
			$prov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
				
			$dep = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
				
			$ubigeo =  $dist -> getCubigeodesc()." - ".$prov -> getCubigeodesc()." - ".$dep -> getCubigeodesc();
				
			$todo[] = array('id' => $zona -> getNzonaId(),
					'desc' => $zona -> getCzonadesc(),
					'selectEstado' => $zona -> getNzonaest(),
					'estado' => $estado,
					'dist' => $dist -> getNubigeoId(),
					'prov' => $prov -> getNubigeoId(),
					'dep' => $dep -> getNubigeoId(),
					'ubigeo' =>  $ubigeo
			);
		}
		
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaZonaPersonalAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$zonaspersonal = $this->getDoctrine()
		->getRepository('DicarsDataBundle:VenZonapersonal')
		->findAll();
	
		$todo = array();
		foreach ($zonaspersonal as $key => $zonapersonal){
			$estado = '';
			$zona = $zonapersonal -> getNzona();
			$personal = $zonapersonal ->getNpersonal();
			$estadochar = $zona -> getNzonaest();
			
			if($estadochar=="1")
				$estado = "
<span class='label label-success'>Habilidado</span>
";
			else
				$estado = "
<span class='label label-important'>Inhabilitado</span>
";
			
			$dist = $zona -> getNubigeo();
			
			$prov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
			
			$dep = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
			
			$ubigeo =  $dist -> getCubigeodesc()." - ".$prov -> getCubigeodesc()." - ".$dep -> getCubigeodesc();
			
			$todo[] = array(
					'idzonapersonal' => $zonapersonal -> getNzonapersonalId(),
					'idzona' => $zona -> getNzonaId(),
					'idpersonal' => $personal -> getNpersonalId(),
					'nombrepersonal' => $personal -> getCpersonalnom()." ".$personal->getCpersonalape(),
					'desc' => $zona -> getCzonadesc(),
					'selectEstado' => $zona -> getNzonaest(),
					'estado' => $estado,
					'dist' => $dist -> getNubigeoId(),
					'prov' => $prov -> getNubigeoId(),
					'dep' => $dep -> getNubigeoId(),
					'ubigeo' =>  $ubigeo,
					'edit_btn' => "
<a class='btn btn-info btn-editar' href='#'>
	<i class='icon-edit icon-white'></i>
	Editar
</a>
"
			);
		}
		
		$em->clear();
		$em->close();		
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaMovAction($fecmin,$fecmax){
		$em = $this->getDoctrine()->getEntityManager();
		
		$fecmindate = date_create_from_format('Y-m-d H:i:s', $fecmin."00:00:00");
		$fecmaxdate = date_create_from_format('Y-m-d H:i:s', $fecmax."23:59:59");
                
                $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_VENDEDOR') )
                { 
		
                    $movimientosRepository =$this->getDoctrine()
                    ->getRepository('DicarsDataBundle:VenMovimiento');
		
                    $query = $movimientosRepository->createQueryBuilder('m')
                    ->where("m.dmovimientofecreg  BETWEEN :fecmin AND :fecmax")
                    ->setParameter('fecmin', $fecmindate)
                    ->setParameter('fecmax', $fecmaxdate)
                    ->getQuery();
		
                    $movimientos = $query->getResult();
	
                    $todo = array();
                    foreach ($movimientos as $key => $movimiento){
			$tipo_mov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteclase' => '6', 'cconstantevalor'  => $movimiento -> getNmovimientotip()));
			
			$tipo_pago = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteclase' => '7', 'cconstantevalor' => $movimiento -> getNmovimientotippag()));
				
			$todo[] = array('id' => $movimiento -> getNmovimientoId(),
					'valortipo' =>$movimiento -> getNmovimientotip(),
					'fecha_reg' => $movimiento -> getDmovimientofecreg() -> format('d/m/Y'),
					'concepto' => $movimiento -> getCmovimientoconcepto(),
					'monto' => $movimiento -> getNmovimientomonto(),
					'tipo_mov' => $tipo_mov -> getCconstantedesc(),
					'tipo_pago' => $tipo_pago -> getCconstantedesc(),
					'personal' => $movimiento -> getNpersonal() -> getCpersonalnom()." ".$movimiento -> getNpersonal() -> getCpersonalape()
			);
                    }
                }
                else $todo = array();
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}	
}