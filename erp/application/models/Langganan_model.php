<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Langganan_model extends CI_Model
{
    public function langganan_list()
    {
        $query = $this->db->query("SELECT * FROM te_langgananadmin WHERE id != 1  ORDER BY id ASC");
        return $query->result_array();
    }

    public function langganandetail_list($id_langganan)
    {
        $query = $this->db->query("SELECT * FROM te_langgananadmin WHERE id = ". $id_langganan ."  ORDER BY id ASC");
        return $query->row_array();
    }
}