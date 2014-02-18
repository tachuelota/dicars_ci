<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetIngProducto_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert_batch($data){

		$this->db->insert_batch('log_detingprod',$data);
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

}