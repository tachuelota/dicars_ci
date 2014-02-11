<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zona_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	public function get_zonas($nZona_id = FALSE)
	{
		if($nZona_id === FALSE )
		{
			$query = $this ->db->get ('ven_zona');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_zona', array('nZona_id' => $nZona_id));
		return $query->row_array();
	}


}