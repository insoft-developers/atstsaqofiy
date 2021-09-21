<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

	var $table ="master_guru";
    var $select_column = array("*");
    var $order_column = array(
        "id",
        "kode",
        "guru",
        "username",
        "password",
        null
    );


    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);

        if(isset($_POST["search"]["value"]))
        {
            $this->db->like("kode", $_POST["search"]["value"]);
            $this->db->or_like("guru", $_POST["search"]["value"]);
            $this->db->or_like("username", $_POST["search"]["value"]);
            $this->db->or_like("password", $_POST["search"]["value"]);
            
        }

        if(isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by("id","DESC");
        }

    }


    function make_datatables()
    {
        $this->make_query();
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }


    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }


    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    public function savedata($data)
    {
    	$query = $this->db->insert('master_guru', $data);
    	return $query;
    }


    public function getdatabyid($id)
    {
    	$this->db->where('id', $id);
    	$query = $this->db->get('master_guru');
    	return $query->result();
    }

    public function updatedata($id, $data)
    {
    	$this->db->where('id', $id);
    	$query = $this->db->update('master_guru', $data);
    	return $query;
    }

    public function deletedata($id)
    {
    	$this->db->where('id', $id);
    	$query = $this->db->delete('master_guru');
    	return $query;
    }
		

}

/* End of file Studi_model.php */
/* Location: ./application/models/Studi_model.php */