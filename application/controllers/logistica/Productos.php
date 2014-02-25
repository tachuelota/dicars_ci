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
		$this->load->model('logistica/LocalProducto_Model','locpro');
	}

	public function registrar(){
		$form = $this->input->post('formulario');
		
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
			$Stock = 0;
			$PorcUti = 0;
			$UtiBruta = 0; 
			$Estado="1";
			$idLocal=$form["idLocal"];	

			$Producto = array(
				'cProductoSerie' => $Serie,'cProductoTalla' =>$Talla,
				'nProductoMarca'=>$Marca,'nProductoTipo'=> $Tipo,
				'nCategoria_id' => $Categoria,'cProductoDesc' => $Descripcion,
				'cProductoImage' => $Imagen,'nProductoPContado' => $PContado,
				'nProductoPCredito'=>$PCredito,'nProductoPCosto'=>$PCosto,
				'nProductoStockMin'=>$StockMin,'nProductoStockMax'=>$StockMax,
				'nProductoStock'=>$Stock,'nProductoPorcUti'=>$PorcUti,
				'nProductoUtiBruta'=>$UtiBruta,'cProductoEst'=>$Estado);

			$band = true;
			$this->db->trans_begin();
			$Producto_id = $this->pro->insert($Producto);
			if($Producto_id === FALSE)
			{ 
				$this->output->set_status_header('400');
				$band = false;
			} 
			else
			{
				$detalle=array('nLocal_id'=>$idLocal,
					'nProducto_id'=>$Producto_id,
					'clocalProducto_Estado'=>$Estado);
				
				if(!$this->locpro->insert_batch($detalle))
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