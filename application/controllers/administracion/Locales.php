<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Locales
*/
class Locales extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/Local_Model','lo');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
	
		$Descripcion = null;
		$Estado = "1";
		$Telefono=null;
		$Direccion=null;
		$Ubigeo=null;
		$TipoRubro=null; 
		
		if ($form!=null){
			$Descripcion = $form[""];
			$Telefono = $form[""];
			$Direccion = $form[""];
			$Ubigeo = $form[""];
			$TipoRubro = $form[""];
							
			$Cargo = array('cLocalDesc' => $Descripcion,'nLocalEst' =>$Estado,'cLocalTelf'=>$Telefono,
			'cLocalDirec'=>$Direccion,'nUbigeo_id'=>$Ubigeo,'nLocalTipRub'=>$TipoRubro );
	
			if($this->lo->insert($Cargo)){
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

	
}