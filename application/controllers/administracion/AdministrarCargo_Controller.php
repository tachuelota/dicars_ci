<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministrarCargo_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/AdministracionCargo_Model','acm');

	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function RegistrarCargoAction(){
		$form = $this->input->get('formulario');

		/* para verificar los datos ---->$form = "-";*/
	

		$CargoDesc = null;
		$cCargocoEst = null;
		
		if ($form!=null){
			$CargoDesc = $form["nom_cargo"];
			$CargoEst = $form["selectEstado"];
			
			/* ---Datos de Prueba------
			$CargoDesc = 'prueba1';
			$CargoEst = '1'; */
				
			$Cargo = array('nCargoDesc' => $CargoDesc,'cCargocoEst' =>$CargoEst );

			/* -- probar el metodo de insert -- $this->acm->insert($Cargo); */

			/* Inicio de Insertar*/
			if(!$this->acm->insert($Cargo){
				$return = array("responseCode"=>200, "datos"=>$datos);
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			}; 
			/* Fin de Insertar */

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EditarCargoAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$CargoEst = null;
	
		if ($form != null){
				
			$Cargoid = $datos["id"];
			$CargoEst = $datos["selectEstadoE"];
				
			$Cargo = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCargo')
			->findOneBy(array('ncargoId' => $Cargoid));
				
			$Cargo->setCcargocoest($CargoEst);
	
			$em = $this->getDoctrine()->getEntityManager();
			$em ->beginTransaction();
				
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */