<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Usuarios
*/
class Trabajadores extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/Trabajadores_Model','tramod');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
	
		$TrabajNombre = null;
		$TrabajApell = null; 
		$TrabajFecN = null;
		$TrabajEdad = null;
		$TrabajDNI = null;
		$TrabajTelef = null;
		$TrabajEmail = null;
		$TrabajSexo = null;
		$TrabajCargo = null;
		$TrabajEstado = null;

		if ($form != null)
		{
			$TrabajNombre = $form["nombres"];
			$TrabajApell = $form["apellidos"];
			$TrabajFecN = date_create_from_format("d/m/Y",$form["fechanacimiento"]);
			$TrabajEdad = $form["edad"];
			$TrabajDNI = $form["dni"];
			$TrabajTelef = $form["telefono"];
			$TrabajEmail = $form["email"];
			$TrabajSexo = $form["sexo"];
			$TrabajCargo = $form["cargo"];
			$TrabajEstado = $form["estado"];							
			$Trabajador = array(
				'cPersonalNom'=> $TrabajNombre,
				'cPersonalApe'=> $TrabajApell,
				'dPersonalFec'=> $TrabajFecN->format("Y-m-d"),
				'cPersonalEdad'=> $TrabajEdad,
				'cPersonalDNI' => $TrabajDNI,
			 	'cPersonalTelf' => $TrabajTelef,
			 	'cPersonalEmail'=> $TrabajEmail,
			 	'cPersonalSexo'=> $TrabajSexo,
			 	'nCargo_id'=> $TrabajCargo,
			 	'cPersonalEst'=> $TrabajEstado);
			if($this->tramod->insert($Trabajador))
				$return = array("responseCode"=>200, "datos"=>"ok");
			else
				$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
		else
			$return = array("responseCode"=>400, "greeting"=>"Bad");

		$return = json_encode($return);
		echo $return;
	}
	
	
	/*public function editar(){
		$form = $this->input->post('formulario',null);
	
		$CargoDesc = null;
		$cCargocoEst = null; 
		
		if ($form!=null){

			$Cargoid = $form["idCargo"];
			$CargoDesc = $form["nom_cargo"];
			$cCargocoEst = $form["selectEstado"];
							
			$data = array('nCargoDesc' => $CargoDesc,'cCargocoEst' =>$cCargocoEst );		
			
			if($this->acam->update($Cargoid,$data)){
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
	} */

}



	
	
	
