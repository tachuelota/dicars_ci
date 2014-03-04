<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');

class CuadreCaja extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();		
	}

	public function get_cuadrecaja($fecha)
	{
		$id_local =intval($this->session->userdata('current_local')["nLocal_id"]);
		$procedure="call sp_venta_cuadrecaja(?,?)";

		$params =array($fecha,$id_local);		

		$result = $this->db->query($procedure,$params);
		$result->next_result();
		$result->free_result();
		
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
		}

	}



	
	

	
}