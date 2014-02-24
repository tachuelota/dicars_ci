<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DetOrdPedido_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}
	
	/*public function insert($data){

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
	}*/

	public function insert_batch($data){

		$this->db->insert_batch('log_detordped',$data);
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

	/*public function delete($id){

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
	}*/

	public function get_DetOrdCompra($nOrdenCom_id)
	{
		$query = $this->db->query("SELECT * FROM log_ordcom_all  where nOrdenCom_id =" .$nOrdenCom_id);
		return $query->result_array();
	}

}