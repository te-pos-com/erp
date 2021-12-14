<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends CI_Model
{


    public function employee_details($id)
    {

        $this->db->select('te_employees.*');
        $this->db->from('te_employees');
        $this->db->where('te_pms.id', $id);
        $this->db->join('te_pms', 'te_employees.id = te_pms.sender_id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }


}