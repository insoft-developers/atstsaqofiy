<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('id_session'))
        {
            redirect('Login');
        }
        $this->load->model('User_model');
	}


	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidemenu');
		$this->load->view('usermanagement/userlist');
		$this->load->view('footer');		
	}


	function fetch_datatable()
    {

        $fetch_data = $this->User_model->make_datatables();
        $data = array();
        $nomor = 0;
        foreach ($fetch_data as $aRow) 
        {
            $nomor++;
            $row = array();
            $row[] = $nomor;
            $row[] = $aRow->username;
            $row[] = $aRow->email;
            $row[] = $aRow->fullname;
            if($aRow->status=='1')
            {
            	$row[] = 'Aktif';
            }
            else
            {
            	$row[] = 'NonAktif';
            }

            $row[] = date('d-m-Y H:i:s', strtotime($aRow->updated_at));
            if($aRow->unit_owner == '0')
            {
                $row[] = 'No Unit Owner';
            }
            else if($aRow->unit_owner == '1')
            {
                $row[] = 'Bronze';
            }
            else if($aRow->unit_owner == '2')
            {
                $row[] = 'Silver';
            }
            else if($aRow->unit_owner == '3')
            {
                $row[] = 'Gold';
            }
            else if($aRow->unit_owner == '4')
            {
                $row[] = 'Platinum';
            }
            $row[] = $aRow->poin;
            $row[] = '<center><button onclick="editData('.$aRow->id.')" style="width:50px;margin-right:5px;" class="btn-xs btn-warning">Edit</button><button onclick="deleteData('.$aRow->id.')" style="width:50px;" class="btn-xs btn-danger">Delete</button></center>';

            
            $data[] = $row;


            
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->User_model->get_all_data(),
            "recordsFiltered"   => $this->User_model->get_filtered_data(),
            "data"              => $data

        );

        echo json_encode($output);  
    }


    public function getdatabyid($id) 
    {
    	$data = $this->User_model->getdatabyid($id);
    	$response = array(
    		"data" => $data,
    		"message" => 'sukses'
    	);

    	echo json_encode($response);
    }


    public function updateData()
    {
    	$id = $this->input->post('id');

    	$data = array(
    		"username" => $this->input->post('username'),
    		"password" => $this->input->post('password'),
    		"email" => $this->input->post('email'),
    		"fullname" => $this->input->post('fullname'),
    		"status" => $this->input->post('status'),
    		"updated_at"=> date('Y-m-d H:i:s'),
            "unit_owner" => $this->input->post('unitowner'),
            "poin" => $this->input->post('poin')
    	);

    	$response = $this->User_model->updateData($data, $id);
    	echo json_encode($response);
    }


    public function deleteData()
    {
    	$id = $this->input->post('id');
    	$response = $this->User_model->deleteData($id);
    	echo json_encode($response);
    }


    public function logout()
    {
        $newdata = array(
            'id_session'  =>'',
            'user_session' => '',
            'email_session' => '',
            'name_session' => ''
        );

        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();

        redirect('Dashboard','refresh');
    }

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */