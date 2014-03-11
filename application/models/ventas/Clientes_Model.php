<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes_Model extends CI_Model {

	
	function __construct() {
		parent::__construct();
	}

	function insert($data){
		$this->db->trans_start(true);
		
		$this->db->trans_begin();

		$this->db->insert('ven_cliente',$data);

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

	function update($id,$data){
		$this->db->trans_start();
		
		$this->db->trans_begin();

        $this->db->where('nCliente_id',$id);
		$this->db->update('ven_cliente',$data);

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


 	public function get_clientes($nCliente_id = FALSE)
	{
		if($nCliente_id === FALSE )
		{
			$query = $this ->db->get ('ven_cliente');
			return $query -> result_array();
		}
		$query = $this->db->get_where('ven_cliente', array('nCliente_id' => $nCliente_id));
		return $query->row_array();
	}

	public function get_clientesmorosos()
	{
		$query = $this->db->query("SELECT * FROM  ven_listaclientedeudores");
		return $query -> result_array();
	}
	public function get_clientesmorosos_detallado()
	{
		$query = $this->db->query("SELECT * FROM  ven_listaclientedeudores_detallado");
		return $query -> result_array();
	}

	public function get_anonimo()
	{
		$query = $this->db->get_where('ven_cliente', array('cClienteDNI' => "00000000"));
		return $query->row_array();
	}

}