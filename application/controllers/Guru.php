<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guru_model');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidemenu');
		$this->load->view('master/guru');
		$this->load->view('footer');
	}


	function fetch_datatable()
    {

        $fetch_data = $this->Guru_model->make_datatables();
        $data = array();
        $nomor = 0;
        foreach ($fetch_data as $aRow) 
        {
            $nomor++;
            $row = array();
            $row[] = $nomor;
            $row[] = $aRow->kode;
            $row[] = $aRow->guru;
            $row[] = $aRow->username;
            $row[] = $aRow->password;
            $row[] = '<center><button onclick="editData('.$aRow->id.')" style="width:50px;margin-right:5px;" class="btn-xs btn-warning">Edit</button><button onclick="deleteData('.$aRow->id.')" style="width:50px;" class="btn-xs btn-danger">Delete</button></center>';
            $data[] = $row;


            
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->Guru_model->get_all_data(),
            "recordsFiltered"   => $this->Guru_model->get_filtered_data(),
            "data"              => $data

        );

        echo json_encode($output);  
    }



    public function savedata()
    {
        $kode = $this->input->post('kode');
        $guru = $this->input->post('guru');
        $username = $this->input->post('username');
        $passguru = $this->input->post('passguru');
            
        $data_insert = array(
            "kode" => $kode,
            "guru" => $guru,
            "username" => $username,
            "password" => $passguru
        );

        $res = $this->Guru_model->savedata($data_insert);
        if($res)
        {
            $response['message'] = 'sukses';    
        }

        echo json_encode($response);

    }


    public function getdatabyid($id)
    {
    	$res = $this->Guru_model->getdatabyid($id);
    	echo json_encode($res);
    }


    public function updatedata()
    {
    	
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $guru = $this->input->post('guru');
        $username = $this->input->post('username');
        $passguru = $this->input->post('passguru');
            
        $data_update = array(
            "kode" => $kode,
            "guru" => $guru,
            "username" => $username,
            "password" => $passguru
        );

    	$res = $this->Guru_model->updatedata($id, $data_update);
    	echo json_encode($res);


    }


    public function deletedata()
    {
    	$id = $this->input->post('id');
    	$res = $this->Guru_model->deletedata($id);
    	echo json_encode($res);
    }


}

/* End of file Studi.php */
/* Location: ./application/controllers/Studi.php */