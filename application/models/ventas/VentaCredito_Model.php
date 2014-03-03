<?php 
/**
* 
*/
class VentaCredito_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert('ven_credito',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return FALSE;
		}
		else
		{
			return $this->db->insert_id();
		}
	}
	public function get_Creditos_ByClientes($nCliente_id){
		$query = $this->db->query("SELECT * FROM ven_credito_by_idcliente  where id_cliente =" .$nCliente_id);
		return $query->result_array();
	}
}
 ?>