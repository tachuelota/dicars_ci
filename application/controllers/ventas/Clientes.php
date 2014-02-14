<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class Clientes extends CI_Controller {
public function __construct()
	{
		parent::__construct();		
		$this->load->model('ventas/Clientes_Model','climod');
	}

public function registrar(){
		$form = $this->input->post('formulario');
		$ClienteNombre = null;
		$ClienteApell = null; 
		$ClienteDNI = null;
		$ClienteDirec = null;
		$ClienteZona = null;
		$ClienteRef = null;
		$ClienteLinOpe = null;
		//$cClienteArcCredito=null;
		$ClienteOcup = null;			

		if ($form != null)
		{
			$ClienteNombre = $form["nombres"];
			$ClienteApell = $form["apellidos"];
			$ClienteDNI = $form["dni"];
			$ClienteRef = $form["referencia"];
			$ClienteDirec = $form["direccion"];			
			$ClienteZona = $form["zona"];				
			$ClienteLinOpe = $form["lineaop"];	
			$cClienteArcCredito =null;
			$ClienteOcup = $form["ocupacion"];				
			$Cliente = array(
				'cClienteNom'=> $ClienteNombre,
				'cClienteApe'=> $ClienteApell,
				'cClienteDNI'=> $ClienteDNI,				
			 	'cClienteRef' => $ClienteRef,
				'cClientecDir' => $ClienteDirec,
			 	'nZona_id'=> $ClienteZona,
			 	'nClienteLineaOp'=> $ClienteLinOpe,
			 	//'cClienteArcCredito' =>"ejemplo",
			 	'cClienteOcup'=> $ClienteOcup);
			if($this->climod->insert($Cliente))
				$return = array("responseCode"=>200, "datos"=>"ok");
			else
				$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
		else
			$return = array("responseCode"=>400, "greeting"=>"Bad");

		$return = json_encode($return);
		echo $return;
	}

	public function editar(){
		$form = $this->input->post('formulario',null);

		$ClienteNombre = null;
		$ClienteApell = null; 
		$ClienteDNI = null;
		$ClienteRef = null;
		$ClienteDirec = null;
		$ClienteLinOpe = null;	
		$ClienteOcup = null;
		//$ClienteZona = 1;
		
		if ($form!=null){

			$nCliente_id =$form["idClientes"];
			$ClienteNombre = $form["nombres"];
			$ClienteApell = $form["apellidos"];
			$ClienteDNI = $form["dni"];
			$ClienteRef = $form["referencia"];
			$ClienteDirec = $form["direccion"];			
			$ClienteZona = $form["zona"];				
			$ClienteLinOpe = $form["lineaop"];			
			$ClienteOcup = $form["ocupacion"];			
			$data = array(
				'cClienteNom'=> $ClienteNombre,
				'cClienteApe'=> $ClienteApell,
				'cClienteDNI'=> $ClienteDNI,				
			 	'cClienteRef' => $ClienteRef,
				'cClientecDir' => $ClienteDirec,
			 	'nZona_id'=> $ClienteZona,
			 	'nClienteLineaOp'=> $ClienteLinOpe,
			 	'cClienteOcup'=> $ClienteOcup);					
			if($this->climod->update($nCliente_id,$data))
				$return = array('responseCode'=>200, 'datos'=>$data);
			else
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
		}
		else 
			$return = array("responseCode"=>400, "greeting"=>"Bad");
			
		$return = json_encode($return);
		echo $return;
	} 
	

	
}