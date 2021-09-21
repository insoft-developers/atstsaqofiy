<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('id_session'))
        {
            redirect('Login');
        }
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidemenu');
		$this->load->view('dashboard');	
		$this->load->view('footer');	
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */