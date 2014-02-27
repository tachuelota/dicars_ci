<?php 
/**
* 
*/
class VentaCronograma_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('ven_cronpago',$data);

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