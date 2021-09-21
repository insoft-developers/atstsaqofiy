<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';


class Promo extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Promo_model', 'Promotable');
    }


    public function promolist_post()
    {
        
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        $id_hotel = $dec_data->id_hotel;

        $response = $this->Promotable->promolist($id_hotel);
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