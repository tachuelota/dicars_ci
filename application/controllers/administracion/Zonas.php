<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Zona_Edit
*/
class Zonas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/Zona_Model','zo');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
		

		$Descripcion = null;
		$Estado = "1"; 
		$Ubigeo=null;
		
		if ($form!=null){
			$Descripcion = $form["desc"];
			
			$Ubigeo = $form["dist"];
							
			$zonas = array('cZonaDesc' => $Descripcion,'nZonaEst' =>$Estado , 'nUbigeo_id' =>$Ubigeo );
	
			if($this->zo->insert($zonas)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			}; 

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	}

	public function editar(){
		$form = $this->input->post('formulario',null);
		
		$idZonas=null;
		$Descripcion = null;
		$Estado = null; 
		$Ubigeo=null;
		
		if ($form!=null){
			$idZonas=$form['idZonas'];
			$Descripcion = $form["desc"];
			$Estado = $form["selectEstado"];
			$Ubigeo = $form["dist"];
							
			$data = array('cZonaDesc' => $Descripcion,'nZonaEst' =>$Estado , 'nUbigeo_id' =>$Ubigeo );		
			
			if($this->zo->update($idZonas,$data)){
				$return = array('responseCode'=>200, 'datos'=>$data);
			}
			else{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}		
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	} 

	
}