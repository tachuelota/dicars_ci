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
}

 ?>