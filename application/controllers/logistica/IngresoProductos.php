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
	}

	public function registrar(){

		$form = $this->input->post('formulario',true);
		$tabla = $this->input->post('tabla',true);		
		
		//CABECERA
		$idPersonal = null;
		$idLocal = null;
		$Serie = null;
		$Numero = null; 
		$Motivo = null;
		$DocSerie = null;
		$DocNumero = null; 
		$Observacion = null;
		
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
							
			$ProductoCabecera = array('nPersonal_id' => $idPersonal,'nLocal_id' =>$idLocal,'cIngProdSerie'=>$Serie,
			'cIngProdNro'=> $Numero,'nIngProdMotivo' => $Motivo,'cIngProdDocSerie' => $DocSerie,'cIngProdDocNro' => $DocNumero,
			'cIngProdObsv'=>$Observacion);

			/*if($this->ingpro->insert($ProductoCabecera,$tabla))
			{ 
				$return = array("respoeCode"=>200, "datos"=>"ok");
			} else {
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			};*/

			$return = $tabla;
		}
		else {

			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	}


}

?>