<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('log_proveedor',$data);

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

        $this->db->where('nProveedor_id',$id);
		$this->db->update('log_proveedor',$data);

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


 	public function get_proveedor($nProveedor_id = FALSE)
	{
		if($nProveedor_id === FALSE )
		{
			
			$query = $this ->db->get ('log_proveedor');
			return $query -> result_array();
		}
		$query = $this->db->get_where('log_proveedor', array('nProveedor_id' => $nProveedor_id));
		return $query->row_array();
	}


}