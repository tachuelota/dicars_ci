<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marcas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/Marca_Model','amm');

	}

	public function registrar(){

		$form = $this->input->post('formulario',true);

		$MarcaDesc = null;
		$MarcaEst = null;

		if ($form!=null){			
			$MarcaDesc = $form["desc_marca"];
			$MarcaEst = $form["selectEstado"];

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

		$return = json_encode($form);
		echo $return;
	}

	public function editar(){

		$form = $this->input->post('formulario',true);

		$MarcaDesc = null;
		$MarcaEst = null;

		if ($form != null){

			$Marcaid = $form["idMarca"];
			$MarcaDesc = $form["desc_marcaE"];
			$MarcaEst = $form["selectEstadoE"];

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
	}

}