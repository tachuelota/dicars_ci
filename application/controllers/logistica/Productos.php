<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler producto
*/
class Productos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('logistica/Producto_Model','pro');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
	
		$Serie = null;
		$Talla = null;
		$Marca = null;
		$Tipo = null; 
		$Categoria = null;
		$Descripcion = null;
		$Imagen = null;
		$PContado = null; 
		$PCredito = null;
		$PCosto = null;
		$StockMin = null;
		$StockMax = null;
		//$CodBarra = null;
		$Stock = 0;
		$PorcUti = 0;
		$UtiBruta = 0; 
		$Estado="1"; 
		
		if ($form!=null){
			$Serie = $form["serie"];
			$Talla = $form["talla"];
			$Marca = $form["marca"];
			$Tipo = $form["tipprod"];
			$Categoria = $form["categoria"];
			$Descripcion = $form["descripcion"];
			$Imagen = $form["nombrearchivo"];
			$PContado = $form["preciocontado"];
			$PCredito = $form["preciocredito"];
			$PCosto = $form["preciocosto"];
			$StockMin = $form["stockmin"];
			$StockMax = $form["stockmax"];
							
			$Producto = array('cProductoSerie' => $Serie,'cProductoTalla' =>$Talla,'nProductoMarca'=>$Marca,'nProductoTipo'=> $Tipo,
			'nCategoria_id' => $Categoria,'cProductoDesc' => $Descripcion,'cProductoImage' => $Imagen,'nProductoPContado' => $PContado,
			'nProductoPCredito'=>$PCredito,'nProductoPCosto'=>$PCosto ,'nProductoStockMin'=>$StockMin ,'nProductoStockMax'=>$StockMax,
			'nProductoStock'=>$Stock,'nProductoPorcUti'=>$PorcUti,'nProductoUtiBruta'=>$UtiBruta,'cProductoEst'=>$Estado);
	
			if($this->pro->insert($Producto)){
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
	
		$Serie = null;
		$Talla = null;
		$Marca = null;
		$Tipo = null; 
		$Categoria = null;
		$Descripcion = null;
		$Imagen = null;
		$PContado = null; 
		$PCredito = null;
		$PCosto = null;
		$StockMin = null;
		$StockMax = null;
		//$CodBarra = null;
		$Stock = 0;
		$PorcUti = 0;
		$UtiBruta = 0; 
		$Estado=null; 
		
		if ($form!=null){
			$Productoid=$form["codigo"];
			$Serie = $form["serie"];
			$Talla = $form["talla"];
			$Marca = $form["marca"];
			$Tipo = $form["tipprod"];
			$Categoria = $form["categoria"];
			$Descripcion = $form["descripcion"];
			$Imagen = $form["nombrearchivo"];
			$PContado = $form["preciocontado"];
			$PCredito = $form["preciocredito"];
			$PCosto = $form["preciocosto"];
			$StockMin = $form["stockmin"];
			$StockMax = $form["stockmax"];
			$Estado=$form["estado"];
							
			$data = array('cProductoSerie' => $Serie,'cProductoTalla' =>$Talla,'nProductoMarca'=>$Marca,'nProductoTipo'=> $Tipo,
			'nCategoria_id' => $Categoria,'cProductoDesc' => $Descripcion,'cProductoImage' => $Imagen,'nProductoPContado' => $PContado,
			'nProductoPCredito'=>$PCredito,'nProductoPCosto'=>$PCosto ,'nProductoStockMin'=>$StockMin ,'nProductoStockMax'=>$StockMax,
			'nProductoStock'=>$Stock,'nProductoPorcUti'=>$PorcUti,'nProductoUtiBruta'=>$UtiBruta,'cProductoEst'=>$Estado);		
			
			if($this->pro->update($Productoid,$data)){
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

?>