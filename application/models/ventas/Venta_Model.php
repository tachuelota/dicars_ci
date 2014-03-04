<?php 
/**
* 
*/
class Venta_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$this->db->insert('ven_venta',$data);

		if ($this->db->trans_status() === FALSE)
		{
			return FALSE;
		}
		else
		{
			return $this->db->insert_id();
		}
	}
	public function get_fromrange($Desde,$Hasta)
	{
		$query = $this->db->query("SELECT * FROM ven_venta_all where cVentaFecReg_temp between '".$Desde."' and '".$Hasta."'");
		return $query -> result_array();
	}

	public function get_venta($nVenta_id)
	{
		$query = $this->db->query("SELECT * FROM ven_consultarventa_byid where nVenta_id=".$nVenta_id);
		return $query->row_array();
	}

	public function anular($id)
	{
		$this->db->trans_start();
		
		$this->db->trans_begin();

		$this->db->where('nVenta_id',$id);
		$this->db->update('ven_venta',array("cVentaEst" => 0));

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}
}
?>