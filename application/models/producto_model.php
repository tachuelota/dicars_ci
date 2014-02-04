<?php 

/**
* Modelo prodeucto
*/
class Producto_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function get_producto($nProducto_id = FALSE)
	{
		if($nProducto_id === FALSE )
		{
			$query = $this ->db->get ('producto');
			return $query -> result_array();
		}
		$query = $this->db->get_where('producto', array('nProducto_id' => $nProducto_id));
		return $query->row_array();
	}
}

?>