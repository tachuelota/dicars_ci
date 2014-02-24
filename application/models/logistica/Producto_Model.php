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

	function insert($Producto){
		$procedure=("call sp_ins_producto
			($Producto[cProductoSerie],'$Producto[cProductoTalla]',$Producto[nProductoMarca],
			  $Producto[nProductoTipo],'$Producto[cProductoDesc]',$Producto[nProductoPContado],
			  $Producto[nProductoPCredito],$Producto[nProductoPCosto],'$Producto[cProductoImage]',
			  $Producto[nCategoria_id],$Producto[nProductoStockMin],$Producto[nProductoStockMax],
			  $Producto[nProductoStock],'$Producto[cProductoEst]',$Producto[nProductoPorcUti],
			  $Producto[nProductoUtiBruta])");
		$params =array(
			intval($Producto['nLocal_id']),
			$Producto['clocalProducto_Estado'],
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

	function update($id,$data){
		
		$this->db->trans_start();
		
		$this->db->trans_begin();

        $this->db->where('nProducto_id',$id);
		$this->db->update('producto',$data);

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

	public function get_producto($nProducto_id = FALSE)
	{
		if($nProducto_id === FALSE )
		{
			$query = $this ->db->query('select * from ven_producto_all;');
			return $query -> result_array();
		}
		$query = $this->db->get_where('producto', array('nProducto_id' => $nProducto_id));
		return $query->row_array();
	}

	public function get_byoferta($nOferta_id)
	{
		$productos = $this->db->query("SELECT * FROM ven_productosoferta where nOferta_id=".$nOferta_id);
		return $productos->result_array();
	}

	public function get_sinoferta()
	{
		$productos = $this->db->query("SELECT * FROM ven_productossinoferta");
		return $productos->result_array();
	}

	public function get_toventas()
	{
		$productos = $this->db->query("SELECT * FROM ven_productosventa");
		return $productos->result_array();
	}

	public function insert_det($data){

		$this->db->insert_det('local_producto',$data);
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