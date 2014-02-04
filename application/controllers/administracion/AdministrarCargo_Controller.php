<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministrarCargo_Controller extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function RegistrarCargoAction(){
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$CargoDesc = null;
		$CargoEst = null;
		
		if ($form!=null){
			$CargoDesc = $datos["nom_cargo"];
			$CargoEst = $datos["selectEstado"];
				
			$Cargo = new VenCargo();
			$Cargo->setNcargodesc($CargoDesc);
			$Cargo->setCcargocoest($CargoEst);
				
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
			try {
				$em->persist($Cargo);
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