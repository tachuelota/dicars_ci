<?php 
/**
* 
*/
class Transaccion_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert('ven_transaccion',$data);

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