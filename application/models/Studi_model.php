<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Studi_model extends CI_Model {

	var $table ="master_studi";
    var $select_column = array("id","bidang_studi");
    var $order_column = array("id", "bidang_studi");


    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);

        if(isset($_POST["search"]["value"]))
        {
            $this->db->like("bidang_studi", $_POST["search"]["value"]);
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
    	$query = $this->db->insert('master_studi', $data);
    	return $query;
    }


    public function getdatabyid($id)
    {
    	$this->db->where('id', $id);
    	$query = $this->db->get('master_studi');
    	return $query->result();
    }

    public function updatedata($id, $bidangstudi)
    {
    	$this->db->where('id', $id);
    	$query = $this->db->update('master_studi', array("bidang_studi"=> $bidangstudi));
    	return $query;
    }

    public function deletedata($id)
    {
    	$this->db->where('id', $id);
    	$query = $this->db->delete('master_studi');
    	return $query;
    }
		

}

/* End of file Studi_model.php */
/* Location: ./application/models/Studi_model.php */