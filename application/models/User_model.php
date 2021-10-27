<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function suport_list()
    {
        $query = $this->db->query("SELECT * FROM geopos_useradmin WHERE level = 4 ORDER BY id DESC");
        return $query->result_array();
    }
}