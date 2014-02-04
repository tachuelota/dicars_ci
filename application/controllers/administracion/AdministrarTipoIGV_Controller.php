<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministrarTipoIGV_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/AdministrarTipoIGV_Model','amm');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function RegistrarTipoIGVAction(){

		$form = $this->input->get('formulario');
		$form = '-';

		$TipoIGV_tipoigv = null;
		$TipoIGV_porcentaje = null;		
		$TipoIGV_estado = null;
		$TipoIGV_fechareg = null;

		if ($form!=null){

			$TipoIGV_tipoigv = $form["tipo"];
			$TipoIGV_porcentaje = $form["porc"];
			$TipoIGV_estado = $form["estado"];				
			$TipoIGV_fechareg = new \DateTime();

			$VenTipoigv = new VenTipoigv();
			$VenTipoigv->setCtipoigv($TipoIGV_tipoigv);
			$VenTipoigv->setNtipoigvproc($TipoIGV_porcentaje);			
			$VenTipoigv->setCtipoigvest($TipoIGV_estado);	
			$VenTipoigv->setDtipoigvfecreg($TipoIGV_fechareg);

			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			try {
				$em->persist($VenTipoigv);
				$em->flush();
			} catch (Exception $e){
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");

				throw $e;
			}
			$em->commit();
			$em->clear();
			$em->close();
			$return = array("responseCode"=>200, "datos"=>$datos);
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}

		$return = json_encode($return);
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	}

	public function EditarTipoIGVAction(){

		$request = $this->get('request');
		$form = $request->request->get('formulario');

		$datos = array();
		parse_str($form,$datos);

		$TipoIGV_tipoigv = null;
		$TipoIGV_porcentaje = null;		
		$TipoIGV_estado = null;

		if ($form != null){

			$TipoIGV_id = $datos["id"];
			$TipoIGV_tipoigv = $datos["tipoE"];
			$TipoIGV_porcentaje = $datos["porcE"];
			$TipoIGV_estado = $datos["estadoE"];

			$TipoIGV = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTipoigv')
			->findOneBy(array('ntipoigv' => $TipoIGV_id));

			$TipoIGV->setCtipoigv($TipoIGV_tipoigv);
			$TipoIGV->setNtipoigvproc($TipoIGV_porcentaje);
			$TipoIGV->setCtipoigvest($TipoIGV_estado);

			$em = $this->getDoctrine()->getEntityManager();
			$this->getDoctrine()->getEntityManager()->beginTransaction();

			try {
				$em->flush();
			} catch (Exception $e) {
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");

				throw $e;
			}
			$em->commit();
			$em->clear();
			$em->close();
			$return = array("responseCode"=>200, "datos"=>$datos);

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}

		$return = json_encode($return);
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}