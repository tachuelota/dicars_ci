<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class Proveedores extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('logistica/Proveedor_Model','pro');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
		
		$Ruc = null;
		$RazonSocial = null; 
		$Telefono = null;
		$Email = null; 
		$SitioWeb= null;
		$Direccion = null; 
		$Corriente = null; 
		
		if ($form!=null){
			$Ruc = $form["ruc"];
			$RazonSocial = $form["razonsocial"];
			$Telefono = $form["telefono"];
			$Email = $form["email"];
			$SitioWeb = $form["paginaweb"];
			$Direccion = $form["direccion"];
			$Corriente=$form["ccorriente"];
							
			$Proveedor = array('cProveedorRuc' => $Ruc,'cProveedorRazSocial' =>$RazonSocial,'cProveedorTel'=>$Telefono,
			'cProveedorEmail'=>$Email,'cProveedorSitioWeb'=>$SitioWeb,'cProveedorDirec'=>$Direccion,'cProveedorCCorriente'=>$Corriente );
	
			if($this->pro->insert($Proveedor)){
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
		
		//$Codigo=null;
		$Ruc = null;
		$RazonSocial = null; 
		$Telefono = null;
		$Email = null; 
		$SitioWeb= null;
		$Direccion = null; 
		$Corriente = null; 
		
		if ($form!=null){
			$Codigo=$form["codigo"];
			$Ruc = $form["ruc"];
			$RazonSocial = $form["razonsocial"];
			$Telefono = $form["telefono"];
			$Email = $form["email"];
			$SitioWeb = $form["paginaweb"];
			$Direccion = $form["direccion"];
			$Corriente=$form["ccorriente"];
							
			$data = array('cProveedorRuc' => $Ruc,'cProveedorRazSocial' =>$RazonSocial,'cProveedorTel'=>$Telefono,
			'cProveedorEmail'=>$Email,'cProveedorSitioWeb'=>$SitioWeb,'cProveedorDirec'=>$Direccion,'cProveedorCCorriente'=>$Corriente  );		
			
			if($this->pro->update($Codigo,$data)){
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