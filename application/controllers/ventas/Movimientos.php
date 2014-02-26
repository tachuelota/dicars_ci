<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movimientos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/Movimiento_Model','amm');

	}	

	public function Registrar(){
		
		$form = $this->input->get('formulario',true);
		
		if ($form!=null){

			$fecha_reg = new \DateTime();
			$personal =$form["idRegistrado"];
			$monto = $form["monto"];
			$concepto = $form["concepto"];
			$tipo_mov = $form["selectTipoMov"];
			$tipo_pag = $form["selectTipoPag"];
			
			$Movimiento = array(
				'nMovimientoMonto'=>$monto,
				'cMovimientoConcepto'=>$concepto,
				'nPersonal_id'=>$personal,
				'dMovimientoFecReg'=>$fecha_reg,
				'nMovimientoTip'=>$tipo_mov,
				'nMovimientoTipPag'=>$tipo_pag);

			if($this->amm->insert($Movimiento))
				$return = array("responseCode"=>200, "datos"=>"ok");
			else
				$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
		else
			$return = array("responseCode"=>400, "greeting"=>"Bad");

		$return = json_encode($return);
		echo $return;
	}

}