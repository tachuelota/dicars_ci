<?php 
/**
* 
*/
class OfertaProducto_Model extends CI_Model
{
	
	 public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert('oferta_producto',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	public function update($nOfertaProducto_id, $data)
	{
		$this->db->trans_begin();
		$this->db->where('nOfertaProducto_id',$nOfertaProducto_id);
		$this->db->update('oferta_producto',$data);

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

 ?>