<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipoMonedas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/TipoMoneda_Model','atm');
	}
	
	public function index()
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

	public function RegistrarTipoMonedaAction(){

		$form = $this->input->get('formulario',true);

		$form = '-';

		$Desc = null;
		$Monto = null;
		$Est = null;

		if ($form!=null){

			#$Desc = $form["desc_tipomoneda"];
			#$Monto = $form["monto"];
			#$Est = $form["selectEstado"];
			
			$Desc = "1";
			$Monto = 20.0;
			$Est = '1';

			$TipoMoneda = array('cTipoMonedaDesc'=>$Desc ,'nTipoMonedaMont'=>$Monto, 'cTipoMonedaEst' => $Est);
			//-------------Insertar----------
			if($this->atm->insert($TipoMoneda)){
				$return = array('responseCode'=>200, 'datos'=>$TipoMoneda);
			}
			else{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}

		$return = json_encode($return);
		echo $return;
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	}

	public function EditarTipoMonedaAction(){

		$request = $this->get('request');
		$form = $request->request->get('formulario');

		$datos = array();
		parse_str($form,$datos);

		$Desc = null;
		$Monto = null;
		$Est = null;

		if ($form != null){

			$id = $datos["id"];

			$Desc = $datos["desc_tipomonedaE"];
			$Monto = $datos["montoE"];
			$Est = $datos["selectEstadoE"];

			$TipMoneda = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenTipomoneda')
			->findOneBy(array('ntipomoneda' => $id));

			$TipMoneda->setCtipomonedadesc($Desc);
			$TipMoneda->setNtipomonedamont($Monto);
			$TipMoneda->setNtipomonedaest($Est);

			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();

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
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
}

?>