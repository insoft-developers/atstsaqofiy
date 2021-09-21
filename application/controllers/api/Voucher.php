<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';


class Voucher extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Voucher_model', 'Vouchertable');
    }


    public function voucherlist_post()
    {
        
        $data = file_get_contents("php://input");
        $dec_data = json_decode($data);

        
        $id_voucher = $dec_data->id_voucher;
        $tipe_voucher = $dec_data->tipe_voucher;
        $id_hotel = $dec_data->id_hotel;
        $id_fasilitas = $dec_data->id_fasilitas;


        $response = $this->Vouchertable->voucherlist($id_voucher, $tipe_voucher, $id_hotel, $id_fasilitas);
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