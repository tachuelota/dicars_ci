<?php 
/**
* 
*/
class Oferta_Model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert('oferta',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}	

	public function get_ofertas($nOferta_id = FALSE)
	{
		if($nOferta_id === FALSE )
		{
			$query = $this ->db->get ('oferta');
			return $query -> result_array();
		}
		$query = $this->db->get_where('oferta', array('nOferta_id' => $nOferta_id));
		return $query->row_array();
	}
}
 ?>