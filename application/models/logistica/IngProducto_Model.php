<?php 
/**
* Modelo Ingreso de producto
*/
class IngProducto_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert($IngProducto){
		$procedure="call sp_ins_logingprod(?,?,?,?,?,?,?,?)";

		$params =array(
			intval($IngProducto['nPersonal_id']),
			intval($IngProducto['nLocal_id']),
			$IngProducto['cIngProdSerie'],
			$IngProducto['cIngProdNro'],
			intval($IngProducto['nIngProdMotivo']),
			$IngProducto['cIngProdDocSerie'],
			$IngProducto['cIngProdDocNro'],
			$IngProducto['cIngProdObsv']
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

}

?>