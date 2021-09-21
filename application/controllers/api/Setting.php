<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';



class Setting extends REST_Controller  {


	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Setting_model', 'setting');
    }


    public function index_get()
    {
    	$response = $this->setting->getsettinglist();
    	$message = array(
    		"data" => $response,
    		"pesan" => 'list setting'
    	);

    	$this->response($message, 200);
    }

    
	

	
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */

// if (!isset($_SERVER['PHP_AUTH_USER'])) {
//     header("WWW-Authenticate: Basic realm=\"Private Area\"");
//     header("HTTP/1.0 401 Unauthorized");
//     return false;
// }

// $data = file_get_contents("php://input");
// $decoded_data = json_decode($data);