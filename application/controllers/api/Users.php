<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';



class Users extends REST_Controller  {


	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('User_model', 'Usertable');
    }

    
	

	public function register_post()
	{
		$data = file_get_contents("php://input");
		$dec_data = json_decode($data);

		$insert = array(
			"username" => $dec_data->username,
			"password" => SHA1($dec_data->password),
			"email" => $dec_data->email,
			"fullname" => $dec_data->fullname,
			"created_at" => date('Y-m-d H:i:s'),
			"updated_at" => date('Y-m-d H:i:s')

		);

		$response = $this->Usertable->register($insert);

		if($response)
		{
			$message = array(
				"resultcode" => "00",
				"status" => "sukses",
				"pesan" => "Register Berhasil"
			);	
			
			$this->response($message, 200);
		}
		else
		{
			$message = array(
				"resultcode" => "01",
				"status" => "failed",
				"pesan" => "Register Gagal"
			);	
			$this->response($message, 200);
		}
		
	}


	public function login_post()
	{
		$data = file_get_contents("php://input");
		$dec_data = json_decode($data);

		$username = $dec_data->username;
		$password = $dec_data->password;
		$shapass = SHA1($password);

		$response = $this->Usertable->login($username, $shapass);
		if($response['status'])
		{
			$message = array(
				"resultcode" => "00",
				"status" => "sukses",
				"pesan" => "Login Berhasil",
				"data" => $response['data']
			);	
			
			$this->response($message, 200);
		}
		else
		{
			$message = array(
				"resultcode" => "01",
				"status" => "failed",
				"pesan" => "Login Gagal",
				"data" => []
			);	
			$this->response($message, 200);
		}


	}


	public function editprofil_post()
	{
		$data = file_get_contents("php://input");
		$dec_data = json_decode($data);

		$id_user = $dec_data->id_user;

		$response = $this->Usertable->editprofil($id_user);
		if($response)
		{
			$message = array(
				"resultcode"=> "00",
				"status" => "sukses",
				"pesan" => "edit profil sukses",
				"data" => $response
			);

			$this->response($message, 200);
		}
		else
		{
			$message = array(
				"resultcode"=> "01",
				"status" => "failed",
				"pesan" => "edit profil failed",
				"data" => []
			);

			$this->response($message, 200);
		}
	}


	public function updateprofil_post()
	{
		$data = file_get_contents("php://input");
		$dec_data = json_decode($data);

		$url_gambar = './assets/images/profil/';
		
		$id_user = $dec_data->id_user;
		$email = $dec_data->email;
		$name = $dec_data->fullname;
		$telepon = $dec_data->no_telepon;
		$kelamin = $dec_data->jenis_kelamin;
		$tlahir = $dec_data->tanggal_lahir;
		$gambar = $dec_data->gambar;
		$id_gambar = uniqid();
		$nama_gambar = $id_gambar.'.png';

		$kirim = array(
			"email" => $email,
			"fullname" => $name,
			"no_telepon" => $telepon,
			"jenis_kelamin" => $kelamin,
			"tanggal_lahir" => $tlahir,
			"gambar" => $nama_gambar
		);


		$response = $this->Usertable->updateprofil($kirim, $id_user);
		$gambar_lama = $this->Usertable->gambar_lama($id_user);
		

		if($response)
		{
			
			
			if(file_exists($url_gambar.$gambar_lama))
			{
				unlink($url_gambar.$gambar_lama);
			}

			$this->save_image($url_gambar, $gambar, $nama_gambar);

			$message = array(
				"resultcode"=> "00",
				"status" => "sukses",
				"pesan" => "update profil sukses", 
			);

			$this->response($message, 200);
		}
		else
		{
			$message = array(
				"resultcode"=> "01",
				"status" => "failed",
				"pesan" => "update profil failed",
			);

			$this->response($message, 200);
		}


	}


	public function save_image($url_foto, $base, $name){
        if (isset($base)) {
            $image_name = $name;
            $binary = base64_decode($base);
            $success = file_put_contents($url_foto.$image_name, $binary);
            return $success;
        }else{
            return FALSE;
        }
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