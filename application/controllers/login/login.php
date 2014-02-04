<?php
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Login producto
*/

class Login extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
	}

	public function index()
	{

	}
}

?>