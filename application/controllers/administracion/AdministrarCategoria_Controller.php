<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdministrarCategoria_Controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AbstractFactory_Model','abs');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function RegistrarCategoriaAction(){
		
		
		$from = $this->input->post('formulario');
		
		$CategoriaNom = null;
		$CategoriaDesc = null;
		$CategoriaEst = null;
	
		if ($form!=null){
			
			/*$CategoriaNom = $from["nom_categoria"];
			$CategoriaDesc = $from["desc_categoria"];
			$CategoriaEst = $from["selectEstado"];*/
			$CategoriaNom = 'valorPrubea';
			$CategoriaDesc = 'valorPrueba1';
			$CategoriaEst = '1';

			$Categoria = array('cCategoriaNom'=>$CategoriaNom ,'cCategoriaDesc'=>$CategoriaDesc, 'cCategoriaEst');
			/*-------------Insertar----------*/
			if(!$this->abs->insert($Categoria){
				$return = array("responseCode"=>200, "datos"=>$datos);
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			};

		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
	public function EditarCategoriaAction(){
	
		$request = $this->get('request');
		$form = $request->request->get('formulario');
	
		$datos = array();
		parse_str($form,$datos);
	
		$CategoriaNom = null;
		$CategoriaDesc = null;
		$CategoriaEst = null;
	
		if ($form != null){
	
			$Categoriaid = $datos["id"];

			$CategoriaNom = $datos["nom_categoriaE"];
			$CategoriaDesc = $datos["desc_categoriaE"];
			$CategoriaEst = $datos["selectEstadoE"];
			
			$Categoria = $this->getDoctrine()
			->getRepository('DicarsDataBundle:VenCategoria')
			->findOneBy(array('ncategoriaId' => $Categoriaid));
	
			$Categoria->setCcategorianom($CategoriaNom);
			$Categoria->setCcategoriadesc($CategoriaDesc);
			$Categoria->setCcategoriaest($CategoriaEst);
	
			$em = $this->getDoctrine()->getEntityManager();
			$em->beginTransaction();
	
			try {
				$em->flush();
			} catch (Exception $e) {
				$em->rollback();
				$em->close();
				$return = array("responseCode"=>400, "greeting"=>"Bad");					
				throw $e;
			}
			$em->commit();
			$em->clear();
			$em->close();
			$return = array("responseCode"=>200, "datos"=>$datos);
	
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		}
	
		$return = json_encode($return);
		return new Response($return,200,array('Content-Type'=>'application/json'));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */