<?php 
	/**
	* 
	*/
	class DetalleVenta_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function insert_batch($data)
		{
			$this->db->insert_batch('ven_detventa',$data);

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
?>