<?php 
/**
* Modelo Ingreso de producto
*/
class OrdPedido_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_ordenpedido()
	{
		$query = $this->db->query("SELECT * FROM log_ordped_all");
		return $query->result_array();
	}
	
}

?>