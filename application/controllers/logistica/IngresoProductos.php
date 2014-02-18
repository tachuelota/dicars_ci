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


}

?>