<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Zona_Edit
*/
class Zona_Personal extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/ZonaPersonal_Model','zopermod');
	}

	public function registrar(){
		$form = $this->input->post('formulario');	
		$Zona = null;
		$Personal =null; 
		
		if ($form!=null){
			$Zona = $form["id_zona"];			
			$Personal= $form["id_trabajador"];							
			$zonaspersonal = array(
				'nZona_id' => $Zona,
				'nPersonal_id' =>$Personal);
	
			if($this->zopermod->insert($zonaspersonal)){
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
		$form = $this->input->post('formulario');
		$Zona = null;
		$Personal =null; 	

		if ($form!=null){			
			$Zonapersonalid=$form["idZonapersonal"];
			$Zona = $form["id_zona"];			
			$Personal= $form["id_trabajador"];

			$data = array(
				'nZona_id' => $Zona,
				'nPersonal_id' =>$Personal);
			if($this->zopermod->update($Zonapersonalid,$data))
			{				
				$return = array("responseCode"=>200, "datos"=>$data);
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
		
}