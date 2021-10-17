<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Model
{
    public ListPelanggan(){
        $this->db->select('*');
        $this->db->from('pelanggan');

        $query = $this->db->get();
        return $query->result_array();

    }
}