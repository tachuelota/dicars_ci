<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/Marca_Model','amm');

	}
	
	public function index()
	{
		//$this->load->view('welcome_message');
		$dataheader['title'] = 'Dicars - Marcas -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('administracion/marcas.php');
		$datafooter['jsvista'] = 'assets/js/jsvistas/administracion/marcas.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);

	}

	public function RegistrarMarcaAction(){

		$form = $this->input->get('formulario',true);
		#$form = "-";

		$MarcaDesc = null;
		$MarcaEst = null;

		if ($form!=null){
			
			#$MarcaDesc = $form["desc_marca"];
			#$MarcaEst = $form["selectEstado"];

			$MarcaDesc = "test";
			$MarcaEst = "1";

			$Marca = array('cMarcaDesc'=>$MarcaDesc ,'cMarcaEst'=>$MarcaEst);
			//-------------Insertar----------
			if($this->amm->insert($Marca)){
				$return = array('responseCode'=>200, 'datos'=>$Marca);
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

	public function EditarMarcaAction(){

		$form = $this->input->get('formulario',true);
		#$form = '-';

		$MarcaDesc = null;
		$MarcaEst = null;

		if ($form != null){

			/*$Marcaid = $form["id"];
			$MarcaDesc = $form["desc_marcaE"];
			$MarcaEst = $form["selectEstadoE"];*/
			$Marcaid = 1;
			$MarcaDesc = "Marcon";
			$MarcaEst = "1";

			$data = array('cMarcaDesc'=>$MarcaDesc ,'cMarcaEst'=>$MarcaEst);
			//-------------Update----------
			if($this->amm->update($Marcaid,$data)){
				$return = array('responseCode'=>200, 'datos'=>$data);
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

}