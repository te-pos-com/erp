<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    public function pelanggan_list()
    {
        $query = $this->db->query("SELECT * FROM geopos_system WHERE id != 1 ORDER BY id DESC");
        return $query->result_array();
    }

    public function pelangganbaru_list()
    {
        $query = $this->db->query("SELECT * FROM geopos_users WHERE loc != 0 AND YEAR(date_created)='". date("Y") ."' AND MONTH(date_created)='". date("m") ."'  ORDER BY id DESC");
        return $query->result_array();
    }

    public function patner_list()
    {
        $query = $this->db->query("SELECT * FROM geopos_users WHERE patner != 0 ORDER BY id DESC");
        return $query->result_array();
    }
}