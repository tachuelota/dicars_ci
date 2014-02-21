<?php 

/**
* Modelo prodeucto
*/
class SalProducto_Model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}
	public function insert($SalProducto){
		$procedure="call sp_ins_logsalprod(?,?,?,?,?)";

		$params =array(
			intval($SalProducto['nPersonal_id']),
			intval($SalProducto['nLocal_id']),
			intval($SalProducto['nSalProdMotivo']),
			intval($SalProducto['nSolicitante_id']),
			$SalProducto['cSalProdObsv']
			);

		$result = $this->db->query($procedure,$params);
		$id = $result->row_array()["id"];
		$result->next_result();
		$result->free_result();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $id;
		}
	}
	
	public function get_fromrange($Desde,$Hasta)
	{
		$query = $this->db->query("select * from log_salprod_all where dSalProdFecReg between '".$Desde."' and '".$Hasta."'");
		return $query -> result_array();
	}
	public function get_SalProducto($nSalProd_id = FALSE)
	{
		if($nSalProd_id === FALSE )
		{
			$query = $this ->db->query ('SELECT * FROM log_salprod_all');
			return $query -> result_array();
		}
		$query = $this->db->query("SELECT * FROM log_salprod_all  where nSalProd_id =" .$nSalProd_id);
		return $query->row_array();
	}


	

}

?>