<?php 
if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
/**
* Controler Usuarios
*/
class Usuarios extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	//create a new user
	function create_user()
	{
		/*if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}*/

		$nPersonal_id = 
		$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
		$email    = strtolower($this->input->post('email'));
		$password = $this->input->post('password');

		$additional_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name'  => $this->input->post('last_name'),
			'company'    => $this->input->post('company'),
			'phone'      => $this->input->post('phone'),
		);

		if ($this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("auth", 'refresh');
		}
	}

	
}