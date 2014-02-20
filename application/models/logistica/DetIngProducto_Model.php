<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetIngProducto_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}
	
	public function insert($data){

		$this->db->insert('log_detingprod',$data);
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

	public function insert_batch($data){

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

	public function delete($id){

		$this->db->where('nDetIngProd_id', $id);
		$this->db->delete('log_detingprod'); 
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

	public function get_DetIngProducto($nIngProd_id)
	{
		$query = $this->db->query("SELECT * FROM log_detingprod_all  where nIngProd_id =" .$nIngProd_id);
		return $query->result_array();
	}

}