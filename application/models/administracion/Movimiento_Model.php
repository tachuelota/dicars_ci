<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministrarMovimiento_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_movimiento',$data);

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

	function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

		$this->db->where('nMovimiento_id',$id);
		$this->db->update('ven_movimiento',$data);

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