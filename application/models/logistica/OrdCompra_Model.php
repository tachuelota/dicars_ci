<?php 
/**
* Modelo Ingreso de producto
*/
class OrdCompra_Model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function insert($OrdCompra){
		$procedure="call sp_ins_ordencompra(?,?,?,?,?,?,?,?,?)";

		$params =array(
			$OrdCompra['nPersonal_id'],
			intval($OrdCompra['nProveedor_id']),
			$OrdCompra['nOrdComSubTotal'],
			$OrdCompra['OrdComIGV'],
			$OrdCompra['OrdComTotal'],
			$OrdCompra['OrdComObsv'],
			$OrdCompra['OrdComDesct'],
			$OrdCompra['OrdComDocSerie'],
			$OrdCompra['OrdComDocNro']
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