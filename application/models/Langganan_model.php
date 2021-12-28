<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Langganan_model extends CI_Model
{
    public function langganan_list()
    {
        $query = $this->db->query("SELECT * FROM te_langgananadmin ORDER BY id ASC");
        return $query->result_array();
    }
}