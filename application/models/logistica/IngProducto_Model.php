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

	public function insert($IngProducto,$Detalle){
		
		$this->db->trans_start(true);
		$this->db->trans_begin();
		//Registro Cabecera
		$this->db->query("call sp_ins_logingprod (
							 $IngProducto[nPersonal_id],$IngProducto[nLocal_id],'$IngProducto[cIngProdSerie]',
							'$IngProducto[cIngProdNro]',$IngProducto[nIngProdMotivo],'$IngProducto[cIngProdDocSerie]',
							'$IngProducto[cIngProdDocNro]','$IngProducto[cIngProdObsv]');");
		//capturo el ultimo id
		$id_ingprod = $this->db->insert_id();
		
		//Registro Detalle
		/*
		$DetalleIngProd = array(); 
		foreach($Detalle as $key => $data){			
				$detalle=array(
					'nProducto_id' => $data["idproducto"],
					'nIngProd_id' =>$IngProd,
					'nDetIngProdCant'=>$data["cantidad"],
					'nDetIngProdPrecUnt'=> $data["precio_uni"],
					'nDetIngProdTot' => $data["total"]);
				$DetalleIngProd.array_push($detalle);
					
		}

		$this->db->insert('log_detingprod',$DetalleIngProd);*/

		$cuerpo = array();
		foreach ($Detalle as $row)
		{
			$cuerpo [] = array('nIngProd_id' => $id_ingprod,'nProducto_id' => $row->nProducto_id , 
			 					'nDetIngProdCant' => $row->cantidad, 'nDetIngProdPrecUnt' => $row->precio_uni ,
			 					'nDetIngProdTot' => ($row->cantidad * $row->precio_uni)
			 				);
		}

		$this->db->insert_batch('log_detingprod',$cuerpo);

		//Aquí se ejecuta la transacción
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