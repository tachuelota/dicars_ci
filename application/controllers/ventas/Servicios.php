<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios extends CI_Controller {
public function getClientes()
	{
		$this->load->model('ventas/Clientes_Model','climod');
		$result = $this->climod->get_clientes();
		echo json_encode(array('aaData' => $result));
	}
}