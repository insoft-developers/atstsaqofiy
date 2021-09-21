<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');		
	}

	public function proseslogin()
	{
		

		$email = $this->input->post('emailjatra');
		$pass = $this->input->post('passwordjatra');

		$data = array(
			"admin_username" => $email,
			"admin_password" => SHA1($pass) 
		);

		$this->load->model('Login_model');
		$response = $this->Login_model->proseslogin($data);
		if($response['sukses'] == 'sukses')
		{
			$data_session = array(
				"id_session" => $response['data'][0]->id,
				"user_session" => $response['data'][0]->admin_username,
				"name_session" => $response['data'][0]->admin_fullname,
			);

			$this->session->set_userdata($data_session);
		}
		

		echo json_encode($response);

	}



}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */