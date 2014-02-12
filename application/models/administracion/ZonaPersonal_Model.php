<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ZonaPersonal_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
				
	}

	function update($id,$data){
	
	}

	public function get_zonaspersonal($nZonaPersonal_id = FALSE)
	{
		if($nZonaPersonal_id === FALSE )
		{
			$query = $this ->db->get ('ven_zonapersonal');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_zonapersonal', array('nZonaPersonal_id' => $nZonaPersonal_id));
		return $query->row_array();
	}


}