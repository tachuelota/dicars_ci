<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Usuarios
*/
class Ofertas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administracion/Oferta_Model','ofertm');
		$this->load->model('administracion/OfertaProducto_Model','ofertprodm');
	}

	public function registrar()
	{
		$form = $this->input->post('formulario',true);

		if($form != null)
		{
			$cOfertaDesc = $form["descripcion"];
			$dOfertaFecVigente = date_create_from_format("d/m/Y",$form["fecha_ini"]);
			$dOfertaFecVencto = date_create_from_format("d/m/Y",$form["fecha_fin"]);
			$nOfertaPorc = $form["descuento"];

			$Oferta = array(
				"cOfertaDesc"=>$cOfertaDesc,
				"dOfertaFecVigente"=>$dOfertaFecVigente->format('Y-m-d'),
				"dOfertaFecVencto"=>$dOfertaFecVencto->format('Y-m-d'),
				"nOfertaPorc"=>$nOfertaPorc,
				);
			$band = true;
			if (!$this->ofertm->insert($Oferta))
				$this->output->set_status_header('400');				
		}
		else			
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}

	public function editar()
	{
		$form = $this->input->post('formulario',true);
		$tabla = $this->input->post('tabla',true);

		if($form != null)
		{
			$cOfertaDesc = $form["descripcion"];
			$dOfertaFecVigente = date_create_from_format("d/m/Y",$form["fecha_ini"]);
			$dOfertaFecVencto = date_create_from_format("d/m/Y",$form["fecha_fin"]);
			$nOfertaPorc = $form["descuento"];

			$Oferta = array(
				"cOfertaDesc"=>$cOfertaDesc,
				"dOfertaFecVigente"=>$dOfertaFecVigente->format('Y-m-d'),
				"dOfertaFecVencto"=>$dOfertaFecVencto->format('Y-m-d'),
				"nOfertaPorc"=>$nOfertaPorc,
				);
			$band = true;
			if (!$this->ofertm->update($form["idOferta"],$Oferta))
			{				
				$this->output->set_status_header('400');
			}
			else
				$this->output->set_status_header('400');		
		}
		else			
			$this->output->set_status_header('400');

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode("ok"));
	}

}