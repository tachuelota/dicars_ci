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
		$productos = $this->input->post('productos',true);

		$this->db->trans_start(true);		
		$this->db->trans_begin();

		if($form != null)
		{
			$cOfertaDesc
			$dOfertaFecVigente
			$dOfertaFecVencto
			$nOfertaPorc
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return false;
			}
			else
			{
				$this->db->trans_commit();
				return true;
			}
		}
	}


}