<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Constante_Model extends CI_Model
{
	
	function __construct() {
		parent::__construct();
	}

	public function get_constantes($nConstante_id = FALSE)
	{
		if($nConstante_id === FALSE )
		{
			$query = $this ->db->get ('constante');
			return $query -> result_array();
		}
		$query = $this->db->get_where('constante', array('nCategoria_id' => $nConstante_id));
		return $query->row_array();
	}
}
?>