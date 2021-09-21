<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Studi_model');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidemenu');
		$this->load->view('master/studi');
		$this->load->view('footer');
	}


	function fetch_datatable()
    {

        $fetch_data = $this->Studi_model->make_datatables();
        $data = array();
        $nomor = 0;
        foreach ($fetch_data as $aRow) 
        {
            $nomor++;
            $row = array();
            $row[] = $nomor;
            $row[] = $aRow->bidang_studi;
            $row[] = '<center><button onclick="editData('.$aRow->id.')" style="width:50px;margin-right:5px;" class="btn-xs btn-warning">Edit</button><button onclick="deleteData('.$aRow->id.')" style="width:50px;" class="btn-xs btn-danger">Delete</button></center>';


            
            $data[] = $row;


            
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->Studi_model->get_all_data(),
            "recordsFiltered"   => $this->Studi_model->get_filtered_data(),
            "data"              => $data

        );

        echo json_encode($output);  
    }



    public function savedata()
    {
        $bidangstudi = $this->input->post('bidangstudi');
            
        $data_insert = array(
            "bidang_studi" => $bidangstudi,
        );

        $res = $this->Studi_model->savedata($data_insert);
        if($res)
        {
            $response['message'] = 'sukses';    
        }

        

        echo json_encode($response);

    }


    public function getdatabyid($id)
    {
    	$res = $this->Studi_model->getdatabyid($id);
    	echo json_encode($res);
    }


    public function updatedata()
    {
    	$bidangstudi = $this->input->post('bidangstudi');
    	$id = $this->input->post('id');

    	$res = $this->Studi_model->updatedata($id, $bidangstudi);
    	echo json_encode($res);


    }


    public function deletedata()
    {
    	$id = $this->input->post('id');
    	$res = $this->Studi_model->deletedata($id);
    	echo json_encode($res);
    }


}

/* End of file Studi.php */
/* Location: ./application/controllers/Studi.php */