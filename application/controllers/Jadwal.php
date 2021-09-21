<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jadwal_model');
	}

	public function index()
	{
		
        $data['kelas'] = $this->Jadwal_model->getkelas();
        $data['studi'] = $this->Jadwal_model->getstudi();
        $data['guru'] = $this->Jadwal_model->getguru();

        $this->load->view('header');
		$this->load->view('sidemenu');
		$this->load->view('master/jadwal', $data);
		$this->load->view('footer');
	}


    public function getjadwalpelajaran($hari, $id)
    {


        $this->db->where('id', $id);
        $jkelas = $this->db->get('master_kelas')->result();


        $this->db->select('master_jadwal.*, master_studi.bidang_studi, master_guru.guru, master_kelas.kelas');
        $this->db->where('id_kelas', $id);
        $this->db->where('hari', $hari);
        $this->db->join('master_studi', 'master_studi.id = master_jadwal.id_studi', 'left');
        $this->db->join('master_guru', 'master_guru.id = master_jadwal.id_guru', 'left');
        $this->db->join('master_kelas', 'master_kelas.id = master_jadwal.id_kelas', 'left');
        $this->db->order_by('jam_masuk', 'asc');
        $jadwal_hari_senin = $this->db->get('master_jadwal')->result();

        $html = '';

        $html .= '<table class="table nowrap" style="font-size:11px;">';
        $html .= '<tr><th colspan="3"><a href="javascript:void(0);" onclick="addData()"><i class="fa fa-plus"></i></a>&nbsp;&nbsp;&nbsp;'.$jkelas[0]->kelas.'</th><th colspan="2">'.$hari.'</th></tr>';
        $html .= '<tr><th>Pelajaran</th><th>Masuk</th><th>Keluar</th><th>Guru</th><th>Act</th></tr>';
        foreach ($jadwal_hari_senin as $key) {
            $html .= '<tr><td>'.$key->bidang_studi.'</td><td>'.$key->jam_masuk.'</td><td>'.$key->jam_keluar.'</td><td>'.$key->guru.'</td><td><a onclick="editjadwal('.$key->id.')" style="width:25px;" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a><br><a onclick="deletejadwal('.$key->id.')" style="width:25px;margin-top:5px;" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td></tr>';
        }

        $html .= '</table>';
        return $html;

    }



	function fetch_datatable()
    {

        $fetch_data = $this->Jadwal_model->make_datatables();
        $data = array();
        $nomor = 0;
        foreach ($fetch_data as $aRow) 
        {
            $nomor++;
            

            
            $row = array();
            $row[] = $nomor;
            $row[] = $aRow->kelas;
            $row[] = $this->getjadwalpelajaran('Senin', $aRow->id);
            $row[] = $this->getjadwalpelajaran('Selasa', $aRow->id);
            $row[] = $this->getjadwalpelajaran('Rabu', $aRow->id);
            $row[] = $this->getjadwalpelajaran('Kamis', $aRow->id);
            $row[] = $this->getjadwalpelajaran('Jumat', $aRow->id);
            $row[] = $this->getjadwalpelajaran('Sabtu', $aRow->id);
            $row[] = $this->getjadwalpelajaran('Minggu', $aRow->id);
           

            
            $data[] = $row;


            
        }

        $output = array(
            "draw"              => intval($_POST["draw"]),
            "recordsTotal"      => $this->Jadwal_model->get_all_data(),
            "recordsFiltered"   => $this->Jadwal_model->get_filtered_data(),
            "data"              => $data

        );

        echo json_encode($output);  
    }



    public function getjadwalbyid()
    {
        $id = $this->input->post('id');
        $response = $this->Jadwal_model->getjadwalbyid($id);
        echo json_encode($response);
    }


    public function savedata()
    {
        $hari = $this->input->post('jadwalhari');
        $kelas = $this->input->post('jadwalkelas');
        $guru = $this->input->post('jadwalguru');
        $studi = $this->input->post('jadwalstudi');
        $masuk = $this->input->post('jadwalmasuk');
        $keluar = $this->input->post('jadwalkeluar');

        $data_insert = array(
            "hari" => $hari,
            "id_kelas" => $kelas,
            "id_guru" => $guru,
            "id_studi" => $studi,
            "jam_masuk" => $masuk,
            "jam_keluar" => $keluar
        );

        $response = $this->Jadwal_model->savedata($data_insert);
        echo json_encode($response);
    }



    public function updatedata()
    {
        $id = $this->input->post('id');
        $hari = $this->input->post('jadwalhari');
        $kelas = $this->input->post('jadwalkelas');
        $guru = $this->input->post('jadwalguru');
        $studi = $this->input->post('jadwalstudi');
        $masuk = $this->input->post('jadwalmasuk');
        $keluar = $this->input->post('jadwalkeluar');


        $data_update = array(
            "hari" => $hari,
            "id_kelas" => $kelas,
            "id_guru" => $guru,
            "id_studi" => $studi,
            "jam_masuk" => $masuk,
            "jam_keluar" => $keluar
        );

        $response = $this->Jadwal_model->updatedata($id, $data_update);
        echo json_encode($response);

    }


    public function deletedata()
    {
        $id = $this->input->post('id');
        $response = $this->Jadwal_model->deletedata($id);
        echo json_encode($response);
    }


}

/* End of file Studi.php */
/* Location: ./application/controllers/Studi.php */