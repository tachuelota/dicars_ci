<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('local',$data);

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

        $this->db->where('nLocal_id',$id);
		$this->db->update('local',$data);

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


 	public function get_locales($nLocal_id = FALSE)
	{
		if($nLocal_id === FALSE )
		{
			$query = $this ->db->query ('select * from adm_local_all');
			return $query -> result_array();
		}
		$query = $this->db->get_where('local', array('nLocal_id' => $nLocal_id));
		return $query->row_array();
	}

}