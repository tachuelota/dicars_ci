<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saldo_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	public function get_saldoinicial_byfecha($fecha){
		
		$procedure="call spF_kardex_SaldoInicial(".$fecha->format('Y').",".$fecha->format('m').",2)";

		$query = $this->db->query($procedure);	
		return $query -> result_array();
	}

	public function get_saldoactual_byfecha($fecha){
		
		$procedure="call spF_kardex_StockActual(".$fecha->format('Y').",".$fecha->format('m').",2)";

		$query = $this->db->query($procedure);	
		return $query -> result_array();
	}
}