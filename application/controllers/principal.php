<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in())
		{
			redirect('login', 'refresh');
		}
	}
	public function index()
	{
		$dataheader['title'] = 'Dicars - Productos -';
		$this->load->view('templates/headers.php',$dataheader);		
		$this->load->view('templates/menu.php');
		$this->load->view('principal');
		$datafooter['jsvista'] = 'assets/js/jsvistas/principal.js';
		$datafooter['active'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}
}