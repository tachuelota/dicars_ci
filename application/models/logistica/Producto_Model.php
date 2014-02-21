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

	function insert($data){
		
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->query("call sp_ins_producto('$data[cProductoSerie]','$data[cProductoTalla]',$data[nProductoMarca],
												$data[nProductoTipo],'$data[cProductoDesc]',$data[nProductoPContado],
							   					$data[nProductoPCredito],$data[nProductoPCosto],'$data[cProductoImage]',
							   					$data[nCategoria_id],$data[nProductoStockMin],
							   					$data[nProductoStockMax],$data[nProductoStock],'$data[cProductoEst]',
							   					$data[nProductoPorcUti],$data[nProductoUtiBruta])"
						);

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

}

?>