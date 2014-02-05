<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/Cargo_Model','acm');
	}
	
	public function index()
	{
		//$this->load->view('welcome_message');
		$dataheader['title'] = 'Dicars - Cargos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/cargos.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/cargos.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function RegistrarCargoAction(){
		$form = $this->input->get('formulario');

		/* para verificar los datos ---->$form = "-";*/
	
		$CargoDesc = null;
		$cCargocoEst = null; 
		
		if ($form!=null){
			$CargoDesc = $form["nCargoDesc"];
			$CargoEst = $form["cCargocoEst"];
			
			/* ---Datos de Prueba------
			$CargoDesc = 'prueba1';
			$CargoEst = '1'; */
			
			$Cargo = array('nCargoDesc' => $CargoDesc,'cCargocoEst' =>$CargoEst );

			/* -- probar el metodo de insert -- 
					$this->acm->insert($Cargo); */

			/* Inicio de Insertar*/
			if(!$this->acm->insert($Cargo)){
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
		echo $return;
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	} 
	
	public function EditarCargoAction(){
	
		$form = $this->input->get('formulario');
		
		$CargoEst = null;
	
		if ($form != null){
				
			$Cargoid = $form["id"];
			$CargoEst = $form["cCargocoEst"];

				
			$Cargo= array('cCargocoEst' => $CargoEst);
			
			/* Inicio de Editar*/
			if($this->acm->update($Cargoid,$data)){
				$return = array('responseCode'=>200, 'datos'=>$data);
			}
			else{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}
			/* Fin de Editar */
			
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		echo $return;
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */