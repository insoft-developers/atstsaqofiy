<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';


class Hotel extends REST_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Hotel_model', 'Hoteltable');
        $this->load->model('City_model', 'Citytable');
    }


    public function hotellist_get()
    {
    	$response = $this->Hoteltable->hotellist();
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


    public function hotelslider_post()
    {
        
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $id_hotel = $dec_data->id_hotel;
        $response = $this->Hoteltable->hotelslider($id_hotel);
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




    public function citylist_get()
    {
        $response = $this->Citytable->citylist();
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

/* End of file Hotel.php */
/* Location: ./application/controllers/api/Hotel.php */