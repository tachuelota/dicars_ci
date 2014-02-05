<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministrarTipoIGV_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/TipoIGV_Model','atm');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function RegistrarTipoIGVAction(){

		$form = $this->input->get('formulario');
		#$form = '-';

		$TipoIGV_tipoigv = null;
		$TipoIGV_porcentaje = null;		
		$TipoIGV_estado = null;
		$TipoIGV_fechareg = null;

		if ($form!=null){

			$TipoIGV_tipoigv = $form["tipo"];
			$TipoIGV_porcentaje = $form["porc"];
			$TipoIGV_estado = $form["estado"];
			/*$TipoIGV_tipoigv = 1;
			$TipoIGV_porcentaje = 18;
			$TipoIGV_estado = 1;*/			
			$TipoIGV_fechareg = new DateTime();
			$TipoIGV_fechareg = $TipoIGV_fechareg->format('Y-m-d H:i:s');

			$TipoIGV = array('cTipoIGV'=>$TipoIGV_tipoigv ,
						   'nTipoIGVProc'=>$TipoIGV_porcentaje,
						   'dTipoIGVFecReg' => $TipoIGV_fechareg
							,'cTipoIGVEst' => $TipoIGV_estado);

			//-------------Insertar----------
			if($this->atm->insert($TipoIGV)){
				$return = array('responseCode'=>200, 'datos'=>$TipoIGV);
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

	public function EditarTipoIGVAction(){

		$form = $this->input->get('formulario');
		#$form = '-';

		$TipoIGV_tipoigv = null;
		$TipoIGV_porcentaje = null;		
		$TipoIGV_estado = null;

		if ($form != null){

			$TipoIGV_id = $datos["id"];
			$TipoIGV_tipoigv = $datos["tipoE"];
			$TipoIGV_porcentaje = $datos["porcE"];
			$TipoIGV_estado = $datos["estadoE"];
			/*$TipoIGV_id = 1;
			$TipoIGV_tipoigv = 1;
			$TipoIGV_porcentaje = 19;
			$TipoIGV_estado = 0;*/			
			$TipoIGV_fechareg = new DateTime();
			$TipoIGV_fechareg = $TipoIGV_fechareg->format('Y-m-d H:i:s');

			$data = array('cTipoIGV'=>$TipoIGV_tipoigv ,
						   'nTipoIGVProc'=>$TipoIGV_porcentaje,
						   'dTipoIGVFecReg' => $TipoIGV_fechareg
							,'cTipoIGVEst' => $TipoIGV_estado);

			//-------------Update----------
			if($this->atm->update($TipoIGV_id,$data)){
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