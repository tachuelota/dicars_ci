<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipoMonedas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/TipoMoneda_Model','atm');
	}
	
	

	public function RegistrarTipoMonedaAction(){

		$form = $this->input->get('formulario',true);

		#$form = '-';

		$Desc = null;
		$Monto = null;
		$Est = null;

		if ($form!=null){

			$Desc = $form["desc_tipomoneda"];
			$Monto = $form["monto"];
			$Est = $form["selectEstado"];
			
			#$Desc = "1";
			#$Monto = 20.0;
			#$Est = '1';

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

		$form = $this->input->get('formulario',true);
		#$form = '-';
		$Desc = null;
		$Monto = null;
		$Est = null;

		if ($form != null){

			$id = $form["id"];
			$Desc = $form["desc_tipomonedaE"];
			$Monto = $form["montoE"];
			$Est = $form["selectEstadoE"];

			$data = array('cTipoMonedaDesc'=>$Desc ,'nTipoMonedaMont'=>$Monto, 'cTipoMonedaEst' => $Est);
			//-------------Insertar----------
			if($this->atm->update($id,$data)){
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
		#return new Response($return,200,array('Content-Type'=>'application/json'));
	}
}

?>