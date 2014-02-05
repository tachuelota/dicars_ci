<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movimientos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/Movimiento_Model','amm');

	}
	
	

	public function RegistrarMovAction(){
		
		$form = $this->input->get('formulario',true);
		$form = "-";

		$fecha_reg = null;
		$personal = null; 
		$monto = null;
		$concepto = null;
		$tipo_mov = null;
		$tipo_pag = null;

		if ($form!=null){

			$fecha_reg = new \DateTime();
			$personal = 1;

			#$monto = $form["monto"];
			#$concepto = $form["concepto"];
			#$tipo_mov = $form["selectTipoMov"];
			#$tipo_pag = $form["selectTipoPag"];
			$monto = "20.0";
			$concepto = "---";
			$tipo_mov = "1";
			$tipo_pag = "1";

			$Movimiento = array('nMovimientoMonto'=>$monto,
				'cMovimientoConcepto'=>$concepto,'nPersonal_id'=>$personal,
				'dMovimientoFecReg'=>$fecha_reg,'nMovimientoTip'=>$tipo_mov,
				'nMovimientoTipPag'=>$tipo_pag);

			if($this->amm->insert($Movimiento)){
				$return = array('responseCode'=>200, 'datos'=>$Movimiento);
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