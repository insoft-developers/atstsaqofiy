<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kelas_model');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidemenu');
		$this->load->view('master/kelas');
		$this->load->view('footer');
	}


	function fetch_datatable()
    {

        $fetch_data = $this->Kelas_model->make_datatables();
        $data = array();
        $nomor = 0;
        foreach ($fetch_data as $aRow) 
        {
            $nomor++;
            $row = array();
            $row[] = $nomor;
            $row[] = $aRow->kode;
            $row[] = $aRow->kelas;
            $row[] = $aRow->latitude;
            $row[] = $aRow->longitude;
            $row[] = '<center><button onclick="editData('.$aRow->id.')" style="width:50px;margin-right:5px;" class="btn-xs btn-warning">Edit</button><button onclick="deleteData('.$aRow->id.')" style="width:50px;" class="btn-xs btn-danger">Delete</button></center>';


            
            $data[] = $row;


            
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->Kelas_model->get_all_data(),
            "recordsFiltered"   => $this->Kelas_model->get_filtered_data(),
            "data"              => $data

        );

        echo json_encode($output);  
    }



    public function savedata()
    {
        $kode = $this->input->post('kode');
        $kelas = $this->input->post('kelas');
        $lat = $this->input->post('latkelas');
        $long = $this->input->post('longkelas');
            
        $data_insert = array(
            "kode" => $kode,
            "kelas" => $kelas,
            "latitude" => $lat,
            "longitude" => $long
        );

        $res = $this->Kelas_model->savedata($data_insert);
        if($res)
        {
            $response['message'] = 'sukses';    
        }

        echo json_encode($response);

    }


    public function getdatabyid($id)
    {
    	$res = $this->Kelas_model->getdatabyid($id);
    	echo json_encode($res);
    }


    public function updatedata()
    {
    	
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $kelas = $this->input->post('kelas');
        $lat = $this->input->post('latkelas');
        $long = $this->input->post('longkelas');
            
        $data_update = array(
            "kode" => $kode,
            "kelas" => $kelas,
            "latitude" => $lat,
            "longitude" => $long
        );

    	$res = $this->Kelas_model->updatedata($id, $data_update);
    	echo json_encode($res);


    }


    public function deletedata()
    {
    	$id = $this->input->post('id');
    	$res = $this->Kelas_model->deletedata($id);
    	echo json_encode($res);
    }


}

/* End of file Studi.php */
/* Location: ./application/controllers/Studi.php */