<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReporteIngEgr_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	public function get_reporteIngEgre_byfecha($fecha){
		
		$procedure="call spF_kardex_StockActual(".$fecha->format('Y').",".$fecha->format('m').",2)";

		$query = $this->db->query($procedure);	
		return $query -> result_array();
	}
}