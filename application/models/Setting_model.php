<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    public function setting_list()
    {
        $query = $this->db->query("SELECT * FROM te_settingadmin WHERE id = 1 ORDER BY id DESC");
        return $query->row_array();
    }
}