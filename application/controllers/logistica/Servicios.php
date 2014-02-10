<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {

	
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getTablaProductosAction(){
		$em = $this->getDoctrine()->getEntityManager();
		 
		$productos = $this->getDoctrine()
    		->getRepository('DicarsDataBundle:Producto')
			->findAll();
		
		$todo = array();
		foreach ($productos as $key => $producto){
			
			$tipo_prod = $this->getDoctrine()
    		->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteclase' => '5', 'cconstantevalor' => $producto -> getNproductotipo())); 
			
			$estadodesc = "";
			if($producto -> getCproductoest() == 1)
				$estadodesc = "<span class='label label-success'>Habilitado</span>";
			else
				$estadodesc = "<span class='label label-important'>Inhabilitado</span>";
			
			$todo[] = array('idproducto' => $producto -> getNproductoId(),
					'serie' => $producto -> getCproductoserie(),
					'talla' => $producto -> getCproductotalla(),
					'nombre' => $producto -> getCproductodesc(),
					'descprod' => $producto -> getCproductodesc()." - ".$producto -> getNproductomarca() -> getCmarcadesc()." - ".$producto -> getCproductotalla(),
					'pcosto' => $producto -> getNproductopcosto(),
					'pcontado' => $producto -> getNproductopcontado(),
					'pcredito' => $producto -> getNproductopcredito(),
					'tipoId' => $tipo_prod -> getNconstanteId(),
					'tipo' => $tipo_prod -> getCconstantedesc(),
					'codigobarras' => $producto -> getCproductocodbarra(),
					'stockmin' => $producto -> getNproductostockmin(),
					'stock' => $producto -> getNproductostock(),
					'stockmax' => $producto -> getNproductostockmax(), 
					'estadoId' => $producto -> getCproductoest(),
					'estadodesc' => $estadodesc,
					'urlimagen' => $producto -> getCproductoimage(),
					'porcuti' => $producto -> getNproductoporcuti(),				
					'utibruta' => $producto -> getNproductoutibruta(), 
					'marcaId' => $producto -> getNproductomarca() -> getNmarcaId(),
					'marca' => $producto -> getNproductomarca() -> getCmarcadesc(),
					'categoriaId' => $producto -> getNcategoria() -> getNcategoriaId(),
					'categoria' => $producto -> getNcategoria() -> getCcategorianom(),
					'ver_btn' => "<a id-data='".$producto -> getNproductoId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$producto -> getNproductoId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$producto -> getNproductoId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	

	public function getProductos(){
		//CARGAR PRODUCTOS
	
		$this->load->model('logistica/Producto_Model','prod');
		$result = $this->prod->get_producto();
		echo json_encode(array('aaData' => $result));
	}
	
	public function getTablaProveedoresAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
                 $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_ALM') )
                {
                    $proveedores = $this->getDoctrine()
                    ->getRepository('DicarsDataBundle:LogProveedor')
                    ->findAll();
		
                    $todo = array();
                    foreach ($proveedores as $key => $proveedor){
			$todo[] = array('id' => $proveedor -> getNproveedorId(), 
					'ruc' => $proveedor -> getCproveedorruc(),
					'razonsocial' => $proveedor -> getCproveedorrazsocial(), 
					'telefono' => $proveedor -> getCproveedortel(),
					'ccorriente' => $proveedor -> getCproveedorccorriente(),
					'direccion' => $proveedor -> getCproveedordirec(),
					'email' => $proveedor -> getCproveedoremail(), 
					'sitioweb' => $proveedor -> getCproveedorsitioweb(), 
					'ver_btn' => "<a id-data='".$proveedor -> getNproveedorId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$proveedor -> getNproveedorId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$proveedor -> getNproveedorId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>"
					);
                    }
                }
                else $todo = array();
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getProveedor(){
		//CARGAR PRODUCTOS
		
		$this->load->model('logistica/Proveedor_Model','pro');
		$result = $this->pro->get_proveedor();
		echo json_encode(array('aaData' => $result));
	}
	
	public function getTablaLocalesAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$locales = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Local')
		->findAll();
		
		$todo = array();
		foreach ($locales as $key => $local){
			if($local -> getNlocalest() == 1){
				$estado = "<span class='label label-success'>Habilitado</span>";
			}
			else{
				$estado = "<span class='label label-important'>Inhabilitado</span>";
			}
			
			$dist = $local -> getNubigeo();
			
			$prov = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
			
			$dep = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Ubigeo')
			->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
			
			$tiporubro = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteclase'=>'2','cconstantevalor' => $local -> getNlocaltiprub()));
			
			$todo[] = array('id' => $local -> getNlocalId(), 
							'nombre_tienda' => $local -> getClocaldesc(),
							'estado' => $estado,
							'estadoValor' => $local -> getNlocalest(),
							'telefono' => $local -> getClocaltelf(), 
							'direccion' => $local -> getClocaldirec(), 
							'dist' => $dist -> getNubigeoId(),
							'distdesc' =>  $dist -> getCubigeodesc(),
							'prov' => $prov -> getNubigeoId(),
							'provdesc' =>  $prov -> getCubigeodesc(),
							'dep' => $dep -> getNubigeoId(),
							'depdesc' =>  $dep -> getCubigeodesc(),
							'tiprub' => $tiporubro->getCconstantedesc(), 
							'tiprubId' => $local -> getNlocaltiprub(),
							'ver_btn' => "<a id-data='".$local -> getNlocalId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
							'edit_btn' => "<a id-data='".$local -> getNlocalId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
							'elim_btn' => "<a id-data='".$local -> getNlocalId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>"
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getLocalByIdAction($id){
		$em = $this->getDoctrine()->getEntityManager();

		$local = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Local')
		->findOneBy(array('nlocalId' => $id));
		
		$dist = $local -> getNubigeo();
		
		$prov = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findOneBy(array('nubigeoId' => $dist -> getNubigeodep()));
		
		$dep = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Ubigeo')
		->findOneBy(array('nubigeoId' => $prov -> getNubigeodep()));
		
		$tiporubro = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Constante')
		->findOneBy(array('nconstanteclase'=>'2','cconstantevalor' => $local -> getNlocaltiprub()));
		
		$data = array('id' => $local -> getNlocalId(),
				'nombre_tienda' => $local -> getClocaldesc(),
				'estado' => $local -> getNlocalest(),
				'direccion' => $local -> getClocaldirec(),
				'telefono' => $local -> getClocaltelf(),
				'dist' => $dist -> getNubigeoId(),
				'prov' => $prov -> getNubigeoId(),
				'dep' => $dep -> getNubigeoId(),
				'tiprub' => $tiporubro->getNconstanteId());

		$em->clear();
		$em->close();
		return new JsonResponse($data);
	}
	
	public function getTablaIngresoProductoAction($fecmin,$fecmax){
		$em = $this->getDoctrine()->getEntityManager();
		
		$fecmindate = date_create_from_format('Y-m-d H:i:s', $fecmin."00:00:00");
		$fecmaxdate = date_create_from_format('Y-m-d H:i:s', $fecmax."23:59:59");
		
                 $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_ALM') )
                {
                    
                
                    $ingprodsRepository = $this->getDoctrine()
                    ->getRepository('DicarsDataBundle:LogIngprod');
		
                    $query = $ingprodsRepository->createQueryBuilder('i')
                    ->where("i.dingprodfecreg  BETWEEN :fecmin AND :fecmax")
                    ->setParameter('fecmin', $fecmindate)
                    ->setParameter('fecmax', $fecmaxdate)
                    ->getQuery();
		
                    $ingprods = $query->getResult();
	
                    $todo = array();
                    foreach ($ingprods as $key => $ingprod){

			$personal = $ingprod -> getNpersonal();
			
			$motivo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteclase' => '3', 'cconstantevalor' =>$ingprod -> getNingprodmotivo()));
			
			$todo[] = array(
					'idingprod' => $ingprod -> getNingprodId(),
					'personal' => $personal -> getCpersonalnom()." ".$personal -> getCpersonalape(),
					'numero' => $ingprod -> getCingprodserie()." - ".$ingprod -> getCingprodnro(),
					'fechareg' => $ingprod -> getDingprodfecreg() -> format("d/m/Y"),
					'documento' => $ingprod -> getCingproddocserie()." - ".$ingprod -> getCingproddocnro(),
					'motivo' => $motivo -> getCconstantedesc(),	
					'ver_btn' => "<a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
                    }
                }
                else $todo = array();
		
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}

public function getTablaSalProdAction($fecmin,$fecmax){
		$em = $this->getDoctrine()->getEntityManager();
		
		$fecmindate = date_create_from_format('Y-m-d H:i:s', $fecmin."00:00:00");
		$fecmaxdate = date_create_from_format('Y-m-d H:i:s', $fecmax."23:59:59");
		
                  $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_ALM') )
                {
                    $salprodsRepository = $this->getDoctrine()
                    ->getRepository('DicarsDataBundle:LogSalProd');
		
                    $query = $salprodsRepository->createQueryBuilder('s')
                    ->where("s.dsalprodfecreg  BETWEEN :fecmin AND :fecmax")
                    ->setParameter('fecmin', $fecmindate)
                    ->setParameter('fecmax', $fecmaxdate)
                    ->getQuery();
		
                    $salprods = $query->getResult();		
	
                    $todo = array();
                    foreach ($salprods as $key => $salprod){
			$motivo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:Constante')
			->findOneBy(array('nconstanteclase' => '4', 'cconstantevalor' =>$salprod -> getNsalprodmotivo()));
			
			$solicitante = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenPersonal')
			->findOneBy(array('npersonalId' => $salprod -> getNsolicitanteId()));
			
			$idpersonal = $salprod -> getNpersonal() -> getNpersonalId();
			
			$personal = $salprod -> getNpersonal();
			 
			$todo[] = array('id' => $salprod -> getNsalprodId(),
					'registrante' => $personal -> getCpersonalnom()." ".$personal -> getCpersonalape(),
					'local' => $salprod -> getNlocal() -> getClocaldesc(),
					'solicitante' => $solicitante -> getCpersonalnom()." ".$solicitante -> getCpersonalape(),
					'serie' => $salprod -> getCsalprodserie(),
					'numero' => $salprod -> getCsalprodnro(),
					'serienum' => $salprod -> getCsalprodserie()." - ".$salprod -> getCsalprodnro(),
					'motivo' => $motivo -> getCconstantedesc(),  
					'fecha_reg' => $salprod -> getDsalprodfecreg() -> format("d/m/Y"),
					'observacion' => $salprod -> getCsalprodobsv(),
					'ver_btn' => "<a id-data='".$salprod -> getNsalprodId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$salprod -> getNsalprodId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$salprod -> getNsalprodId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");

                    }
                } else $todo = array();
                
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaPedidosAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$ordpeds = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogOrdped')
		->findBy(array('cordpedest' => '1')); //habilitado
		
		$todo = array();
		foreach ($ordpeds as $key => $ordped){
			$registrante = $ordped -> getNpersonal();
	
			$todo[] = array('id' => $ordped -> getNordpedId(),
					'registrante' => $registrante -> getCpersonalnom()." ".$registrante -> getCpersonalape(),
					'local' => $ordped -> getNlocal() -> getClocaldesc(),
					'serie' => $ordped -> getCordpedserie(),
					'numero' => $ordped -> getCordpednro(),
					'sernum' => $ordped -> getCordpedserie()." - ".$ordped -> getCordpednro(),
					'fecha_reg' => $ordped -> getDordpedfecreg() -> format("d/m/Y"),
					'fecha_ent' => $ordped -> getDordepedfecent() -> format("d/m/Y"),
					'ver_btn' => "<a id-data='".$ordped -> getNordpedId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$ordped -> getNordpedId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$ordped -> getNordpedId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
	
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
public function getTablaDetPedidoCompraAction(){
	$em = $this->getDoctrine()->getEntityManager();
	
	$detapedidoRepo =  $this->getDoctrine()
	->getRepository('DicarsDataBundle:LogDetordped');
	
	$detordpeds1 = $detapedidoRepo
	->findBy(array('cdetordpedest'=>0));//Los detalles no atendidos
	
	$detordpeds2 = $detapedidoRepo
	->findBy(array('cdetordpedest'=>1));//Los detalles parcialmente atendidos
	
	$detordpeds =  array_merge($detordpeds1, $detordpeds2);
	
	$todo = array();
	foreach ($detordpeds as $key => $detordped){
		$pedido = $detordped -> getNordped();
		$registrante = $pedido -> getNpersonal();
		$producto = $detordped -> getNproducto();
		
		$todo[] = array('iddetordped' => $detordped -> getNdetordpedId(),
		'registrante' => $registrante -> getCpersonalnom()." ".$registrante -> getCpersonalape(),
		'pedido_codigo' => $pedido -> getCordpedserie()."-".$pedido -> getCordpednro(),
		'idproducto' => $producto -> getNproductoId(),
		'codigobarras' => $producto -> getCproductocodbarra(),
		'descprod' => $producto -> getCproductodesc()." - ".$producto -> getNproductomarca() -> getCmarcadesc()." - ".$producto -> getCproductotalla(),
		'aceptado' => $detordped -> getNdetordpedcantacept(),
		'faltan' => $detordped -> getNdetordpedcant() - $detordped -> getNdetordpedcantacept(),
		'cantidad' => $detordped -> getNdetordpedcant(),
		'fecha_reg' => $pedido -> getDordpedfecreg() -> format("d/m/Y"),
		'fecha_ent' => $pedido -> getDordepedfecent() -> format("d/m/Y"),
		'ver_btn' => "<a id-data='".$pedido -> getNordpedId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
		'edit_btn' => "<a id-data='".$pedido -> getNordpedId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
		'elim_btn' => "<a id-data='".$pedido -> getNordpedId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
	
	}
	$em->clear();
	$em->close();
	return new JsonResponse(array('aaData' => $todo));
}
	
	public function getTablaDetSalProdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$detsalprods = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogDetSalProd')
		->findBy(array('nsalprod'=>$id));
	
		$todo = array();
		foreach ($detsalprods as $key => $detsalprod){
			$producto = $detsalprod -> getNproducto();
	
			$todo[] = array('id' => $detsalprod -> getNdetsalprodId(),
					'producto_desc' => $producto -> getCproductodesc()." - ".$producto -> getNproductomarca() -> getCmarcadesc()." - ".$producto -> getCproductotalla(),
					'cantidad' => $detsalprod -> getDetsalprodcant(),
					'estado' => $detsalprod -> getCdetsalprodest(),
					'ver_btn' => "<a id-data='".$detsalprod -> getNdetsalprodId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$detsalprod -> getNdetsalprodId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$detsalprod -> getNdetsalprodId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaDetOrdPedAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$detordpeds = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogDetordped')
		->findBy(array('nordped'=>$id));
	
		$todo = array();
		foreach ($detordpeds as $key => $detordped){
			$producto = $detordped -> getNproducto();
	
			$todo[] = array('iddetordped' => $detordped -> getNdetordpedId(),
					'idproducto' => $producto -> getNproductoId(),
					'serie' => $producto -> getCproductoserie(),
					'nombre' => $producto -> getCproductodesc(),
					'desc' => $producto -> getCproductodesc()." - ".$producto -> getNproductomarca() -> getCmarcadesc()." - ".$producto -> getCproductotalla(),
					'stock' => $producto -> getNproductostock(),
					'pordcom' => 0,
					'labeleordcom' => '<span class="label label-success">Atendido</span>',
					'eordcom' => 1,
					'pcosto' => $producto -> getNproductopcosto(),
					'cantidad' => $detordped -> getNdetordpedcant(),
					'estado' => $detordped -> getCdetordpedest(),
					'cantidad_rec' => $detordped -> getNdetordpedcantacept(),
					'ver_btn' => "<a id-data='".$detordped -> getNdetordpedId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$detordped -> getNdetordpedId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$detordped -> getNdetordpedId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");			
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaDetIngProdAction($id){
		$em = $this->getDoctrine()->getEntityManager();
			
		$detingprods = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogDetingProd')
		->findBy(array('ningprod'=>$id));
			
		foreach ($detingprods as $key => $detingprod){
			$producto = $detingprod -> getNproducto();
	
			$todo[] = array('iddetingreso' => $detingprod -> getNdetingprodId(),
					'producto_serie' => $producto -> getCproductoserie(),
					'codigobarras' => $producto -> getCproductocodbarra(),
					'idproducto' => $producto -> getNproductoId(),
					'cantidad' => $detingprod -> getNdetingprodcant(),
					'precio_uni' => $detingprod -> getNdetingprodprecunt(),
					'total' => $detingprod -> getNdetingprodtot(),
					'band' => 0,
					'ver_btn' => "<a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");	
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getOptionLocalesAction(){
		$em = $this->getDoctrine()->getEntityManager();
			
		$locales = $this->getDoctrine()
		->getRepository('DicarsDataBundle:Local')
		->findAll();
	
		$todo = array();
		foreach ($locales as $key => $local){
			$todo[] = array('id' => $local -> getNlocalId(),
					'desc' => $local -> getClocaldesc()
			);
		}
		$em->clear();
		$em->close();
		return new JsonResponse($todo);
	}
	
	public function getTablaOrdComAction($fecmin,$fecmax){
		$em = $this->getDoctrine()->getEntityManager();
		
		$fecmindate = date_create_from_format('Y-m-d H:i:s', $fecmin."00:00:00");
		$fecmaxdate = date_create_from_format('Y-m-d H:i:s', $fecmax."23:59:59");
		
                 $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_ALM') )
                {
                
                    $ordcomsRepository = $this->getDoctrine()
                    ->getRepository('DicarsDataBundle:LogOrdcom');
		
                    $query = $ordcomsRepository->createQueryBuilder('oc')
                    ->where("oc.ordcomfecreg  BETWEEN :fecmin AND :fecmax AND oc.cordcomest = '1'")
                    ->setParameter('fecmin', $fecmindate)
                    ->setParameter('fecmax', $fecmaxdate)
                    ->getQuery();
		
                    $ordcoms = $query->getResult();
	
                    $todo = array();
                    foreach ($ordcoms as $key => $ordcom){
			$registrante = $ordcom -> getNpersonal();
			$proveedor = $ordcom -> getNproveedor();
	
			$todo[] = array('id' => $ordcom -> getNordencomId(),
					'sernum' => $ordcom -> getCordcomserie()." - ".$ordcom -> getCordcomnro(),
					'serie' => $ordcom -> getCordcomserie(),
					'numero' => $ordcom -> getCordcomnro(),
					'registrante' => $registrante -> getCpersonalnom()." ".$registrante -> getCpersonalape(),
					'proveedor' => $proveedor -> getCproveedorrazsocial(),
					'fecha_reg' => $ordcom -> getOrdcomfecreg() -> format("d/m/Y"),
					'total' => $ordcom -> getNordcomtotal(),
					'ver_btn' => "<a id-data='".$ordcom -> getNordencomId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$ordcom -> getNordencomId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$ordcom -> getNordencomId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
	
                    }
                
                }
                else $todo = array();
                
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getTablaDetOrdComAction($idordcom){
		$em = $this->getDoctrine()->getEntityManager();
			
		$detordcoms = $this->getDoctrine()
		->getRepository('DicarsDataBundle:LogDetcompra')
		->findBy(array('nordencompra'=>$idordcom));
	
		$todo = array();
		foreach ($detordcoms as $key => $detordcom){
			$producto = $detordcom -> getNproducto();
			//$proveedor = $detordcom -> getNproveedor();
	
			$todo[] = array('id' => $detordcom -> getNdetcompraId(),
					'producto_desc' => $producto -> getCproductodesc(),
					'desc' => $producto -> getCproductodesc()." - ".$producto -> getNproductomarca() -> getCmarcadesc()." - ".$producto -> getCproductotalla(),
					'cantidad' => $detordcom -> getNdetcompracant(),
					'pordcom' => $detordcom -> getNdetcompraprecunt(),
					'importe' => $detordcom -> getNdetcompraimporte(),
					'estado' => $detordcom -> getCdetcompraest(),
					'ordped_id' => $detordcom -> getNdetordordped(), //detalle orden pedido id
					'ver_btn' => "<a id-data='".$detordcom -> getNdetcompraId()."' class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a>",
					'edit_btn' => "<a id-data='".$detordcom -> getNdetcompraId()."' class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a>",
					'elim_btn' => "<a id-data='".$detordcom -> getNdetcompraId()."' class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a>");
	
		}
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $todo));
	}
	
	public function getGenerarCodigoProductoAction(){		
		$em = $this->getDoctrine()->getEntityManager();
		
		$sql = "call sp_generar_codigobarra";
		
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
		
		$codigos = $smt->fetchAll();
		$codigo = $codigos[0]['Codigo'];
		
		$em->clear();
		$em->close();
		return new Response($codigo);
	}
	
	public function getGenerarCodigoPedidoAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "call sp_generar_sn_ordenpedido";
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$codigos = $smt->fetchAll();
	
		$em->clear();
		$em->close();
		return new JsonResponse($codigos);
	}
	
	public function getGenerarCodigoSalProdAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "call sp_generar_sn_salprod";
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$codigos = $smt->fetchAll();
	
		$em->clear();
		$em->close();
		return new JsonResponse($codigos[0]);
	}
	
	public function getGenerarCodigoIngProdAction(){
		$em = $this->getDoctrine()->getEntityManager();
	
		$sql = "call sp_generar_sn_ingproducto";
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$codigos = $smt->fetchAll();
	
		$em->clear();
		$em->close();
		return new JsonResponse($codigos[0]);
	}
	public function getTableSaldosAction($fecha){
		$em = $this->getDoctrine()->getEntityManager();
                
                $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_KARD')  )
                {    
                    $fec = date_create_from_format('Y-m-d', $fecha);
		
                
                    $sql = "call spF_kardex_SaldoInicial(".$fec->format('Y').",".$fec->format('m').",2)";
		
                    $smt = $em->getConnection()->prepare($sql);
                    $smt->execute();
		
                    $saldos = $smt->fetchAll();
                }
                else $saldos = array();
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $saldos));
	}
	public function getTableSaldoActualAction($fecha){
		$em = $this->getDoctrine()->getEntityManager();
	
                $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_KARD')  )
                {
                    $fec = date_create_from_format('Y-m-d', $fecha);
	
                    $sql = "call spF_kardex_StockActual(".$fec->format('Y').",".$fec->format('m').",2)";
	
                    $smt = $em->getConnection()->prepare($sql);
                    $smt->execute();
	
                    $saldos = $smt->fetchAll();
                }
                else $saldos = array();
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $saldos));
	}

	public function cierreMesAction($idlocal){
		$em = $this->getDoctrine()->getEntityManager();
	
                $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_KARD')  )
                {
                    $sql = "call spI_cierreMes(".$idlocal.")";

                    $smt = $em->getConnection()->prepare($sql);
                    $smt->execute();
	
                    $result = $smt->fetchAll();
		
                }
                else $result = array();
                
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $result));
	}

	public function gettablagenerarKardexAction($fecha) {
		$em = $this->getDoctrine()->getEntityManager();
		
                $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_KARD')  )
                {
                    $fec = date_create_from_format('Y-m-d', $fecha);
	
                    $sql = "SELECT * FROM dicarsbd.log_consultar_kardex where Anio =".$fec->format('Y')." and NroMes =".$fec->format('m');

                    $smt = $em->getConnection()->prepare($sql);
                    $smt->execute();
	
                    $kardex = $smt->fetchAll();
                }
                else $kardex = array();
                
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $kardex));
	}

	public function gettablagenerarKardexValAction($fecha) {
		$em = $this->getDoctrine()->getEntityManager();
	
                $securityContext = $this->get('security.context');
        
                if($securityContext->isGranted('ROLE_ASIST_KARD')  )
                {
                    $fec = date_create_from_format('Y-m-d', $fecha);
	
                    $sql = "SELECT * FROM dicarsbd.log_consultar_kardexvalorizado where Anio =".$fec->format('Y')." and NroMes =".$fec->format('m');
	
                    $smt = $em->getConnection()->prepare($sql);
                    $smt->execute();
	
                    $kardex = $smt->fetchAll();
                }
                else $kardex = array();
                
		$em->clear();
		$em->close();
		return new JsonResponse($kardex);
	}

	public function gettablasalidaZonasAction($fecha, $local) {
		$em = $this->getDoctrine()->getEntityManager();
	
		$fec = date_create_from_format('Y-m-d', $fecha);
	
		$sql = "SELECT * FROM dicarsbd.log_lista_salidacampo where nLocal_id = ".$local." and DATE(FecReg) = '".$fecha."'";
	
		$smt = $em->getConnection()->prepare($sql);
		$smt->execute();
	
		$salidaZonas = $smt->fetchAll();
	
		$em->clear();
		$em->close();
		return new JsonResponse(array('aaData' => $salidaZonas));
	}

}