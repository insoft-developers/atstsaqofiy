<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function proseslogin($data)
	{
		$this->db->where('admin_username', $data['admin_username']);
		$this->db->where('admin_password', $data['admin_password']);
		$query = $this->db->get('master_admin');

		if($query->num_rows() == 1)
		{
			$response['sukses'] = 'sukses';
			$response['data'] = $query->result();
		}
		else
		{
			$response['sukses'] = 'failed';
			$response['data'] = [];
		}

		return $response;

	}	

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */