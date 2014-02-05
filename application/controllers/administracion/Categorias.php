<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministrarCategoria_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('administracion/Categoria_Model','acm');
	}

	public function index()
	{
		$dataheader['title'] = 'Dicars - Productos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');		
		$this->load->view('administracion/categorias');
		$datafooter['jsvista'] = 'assets/js/jsvistas/categorias.js';
		$datafooter['active'] = 'admin_prod';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function RegistrarCategoriaAction(){

		#verificar si se esta enviado datos del formulario
		$form = $this->input->get('formulario',true);
		
		#$form = "-";

		$CategoriaNom = null;
		$CategoriaDesc = null;
		$CategoriaEst = null;
	
		if ($form!=null){

			$CategoriaNom = $from["nom_categoria"];
			$CategoriaDesc = $from["desc_categoria"];
			$CategoriaEst = $from["selectEstado"];
			/*$CategoriaNom = 'valorPrubea2';
			$CategoriaDesc = 'valorPrueba2';
			$CategoriaEst = '1';*/
			$Categoria = array('cCategoriaNom'=>$CategoriaNom ,'cCategoriaDesc'=>$CategoriaDesc, 'cCategoriaEst' => $CategoriaEst);
			//-------------Insertar----------
			if($this->acm->insert($Categoria)){
				$return = array('responseCode'=>200, 'datos'=>$Categoria);
			}
			else{
				$return = array('responseCode'=>400, 'greeting'=>'Bad');
			}
		}else{
			$return = array('responseCode'=>400, 'greeting'=>'Bad');
		}
		$return = json_encode($return);
		echo $return;
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EditarCategoriaAction(){
	
		#verificar si se esta enviado datos del formulario
		$form = $this->input->get('formulario',true);
		
		#$form = '-';
		
		$CategoriaNom = null;
		$CategoriaDesc = null;
		$CategoriaEst = null;
	
		if ($form != null){
	
			$Categoriaid = $form["id"];
			$CategoriaNom = $form["nom_categoriaE"];
			$CategoriaDesc = $form["desc_categoriaE"];
			$CategoriaEst = $form["selectEstadoE"];
			/*$Categoriaid = 1;
			$CategoriaNom = "cambiado";
			$CategoriaDesc = "cambiado";
			$CategoriaEst = "0";*/

			$data = array('cCategoriaNom'=>$CategoriaNom ,'cCategoriaDesc'=>$CategoriaDesc, 'cCategoriaEst' => $CategoriaEst);

			if($this->acm->update($Categoriaid,$data)){
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
		//return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}