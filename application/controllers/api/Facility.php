<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';



class Facility extends REST_Controller  {


	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Room_model', 'Facilitytable');
    }


    public function facilitylist_post()
    {
    	$data = file_get_contents("php://input");
		$dec_data = json_decode($data);

		$id = $dec_data->id;
		$id_hotel = $dec_data->id_hotel;
		$type = $dec_data->type;

		$response = $this->Facilitytable->facilitylist($id, $id_hotel, $type);

		if($response)
		{
			$message = array(
				"resultcode" => "00",
				"status" => "sukses",
				"data" => $response
			);	
			
			$this->response($message, 200);
		}
		else
		{
			$message = array(
				"resultcode" => "01",
				"status" => "failed",
				"data" => []
			);	
			$this->response($message, 200);
		}
    }

    
	

}

/* End of file Facility.php */
/* Location: ./application/controllers/api/Facility.php */