<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trabajadores_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_personal',$data);

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

        $this->db->where('nPersonal_id',$id);
		$this->db->update('ven_personal',$data);

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


 	public function get_trabajadores()
	{
		$query = $this ->db->query ('select * from ven_personal_all');
		return $query -> result_array();
	}



	public function get_trabajadores_activos()
	{	
		$query = $this ->db->query('select * from ven_trabajadores_activos');
		return $query -> result_array();
	}

	public function get_trabajadores_sinzona()
	{
		$query = $this ->db->query('select * from ven_trabajadores_sinzona');
		return $query -> result_array();
	}

}