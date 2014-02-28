<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kardex_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	public function get_kardex_byfecha($fecha)
	{
		$query = $this->db->query("select * from log_consultar_kardex where Anio =" .$fecha->format('Y')." and MesNum=" .$fecha->format('m'));
		return $query -> result_array();
		
	}
	public function get_reporte_valorizado($fecha){
		$query = $this->db->query("select * from log_consultar_kardexvalorizado where Anio =" .$fecha->format('Y')." and NroMes=" .$fecha->format('m'));
		return $query -> result_array();
	}

}