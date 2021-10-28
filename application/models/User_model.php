<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function suport_list()
    {
        $query = $this->db->query("SELECT * FROM te_useradmin  ORDER BY id DESC");
        return $query->result_array();
    }
}