<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* 
*/
class IngresoProductos extends CI_Controller
{
	
	function  __construct()
	{
		parent::__construct();
		$this->load->model('logistica/IngProducto_Model','ingpro');
		$this->load->model('logistica/DetIngProducto_Model','detingpro');
	}

	public function registrar(){

		$form = $this->input->post('formulario');
		$tabla = $this->input->post('tabla',true);		
		
		if ($form!=null){
			//CABECERA
			$idPersonal = $form["idRegistrado"];
			$idLocal = $form["idLocal"];
			$Serie = "1";
			$Numero = "1";
			$Motivo = 1;
			$DocSerie = $form["docserie"];
			$DocNumero = $form["docnumero"];
			$Observacion = $form["observacion"];
							
			$IngProducto = array('nPersonal_id' => $idPersonal,'nLocal_id' =>$idLocal,'cIngProdSerie'=>$Serie,
			'cIngProdNro'=> $Numero,'nIngProdMotivo' => $Motivo,'cIngProdDocSerie' => $DocSerie,'cIngProdDocNro' => $DocNumero,
			'cIngProdObsv'=>$Observacion);

			$band = true;
			$this->db->trans_begin();
			$IngProducto_id = $this->ingpro->insert($IngProducto);
			if($IngProducto_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
				foreach ($tabla as $key => $row)
				{
					$tabla[$key]["nIngProd_id"] = intval($IngProducto_id);

				}
				if(!$this->detingpro->insert_batch($tabla))
					$band = false;
			}

			if($band)
				$this->db->trans_commit();
			else
			{
				$this->db->trans_rollback();
				$this->output->set_status_header('400');
			}
		}
		else 
		{
			$this->output->set_status_header('400');
			$return = "bad";
		} 
	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}


	public function editar(){

		$form = $this->input->post('formulario');
		$tabla = $this->input->post('tabla',true);
		$detalle=array();
		$idDetalle=null;		
		if ($form!=null){
			//CABECERA
			$id=$form["idingprod"];
			$DocNumero = $form["edit_numdoc"];
			$Motivo = $form["tipo"];
			$Observacion = $form["observacion"];
						
			$IngProducto = array('nIngProd_id'=>$id,'nIngProdMotivo' => $Motivo,'cIngProdDocNro' => $DocNumero,
			'cIngProdObsv'=>$Observacion);

			$band = true;
			$this->db->trans_begin();
			$IngProducto_id = $this->ingpro->update($IngProducto,$id);
			if($IngProducto_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
			foreach ($tabla as $key => $row)
				{
					$tabla[$key]["nIngProd_id"] = intval($IngProducto_id);
					//$idDetalle=$row["nDetIngProd_id"];
					$detalle=array(
							 'nIngProd_id'=>intval($IngProducto_id),
							 'nProducto_id'=>$row["nProducto_id"],
							 'nDetIngProdCant'=>$row["nDetIngProdCant"],
							 'nDetIngProdPrecUnt'=>$row["nDetIngProdPrecUnt"],
							 'nDetIngProdTot'=>$row["nDetIngProdTot"]);
					switch ($row["band"]) {
						case 1:
							if(!$this->detingpro->delete($IngProducto_id))
							$band = false;		
							break;
						
						case 2:
							if(!$this->detingpro->insert($detalle))
							$band = false;	
							break;
						default:
							$band=true;	
							break;	
					}
				}
			}

			if($band)
				$this->db->trans_commit();
			else
				{
				$this->db->trans_rollback();
				$this->output->set_status_header('400');
			}
		}
		else 
		{
			$this->output->set_status_header('400');
			$return = "bad";
		} 
	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}



}

?>