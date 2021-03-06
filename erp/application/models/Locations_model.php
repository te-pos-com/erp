<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locations_model extends CI_Model
{


    public function locations_list()
    {
        $query = $this->db->query("SELECT * FROM te_locations WHERE loc=". $this->aauth->get_user()->id_perusahaan ." ORDER BY id DESC");
        return $query->result_array();
    }

    public function locations_list2()
    {
        $where = '';
        if ($this->aauth->get_user()->loc) $where = 'WHERE loc=' . $this->aauth->get_user()->id_perusahaan . '';
        $query = $this->db->query("SELECT * FROM te_locations $where");
        return $query->result_array();
    }


    public function view($id)
    {

        $this->db->from('te_locations');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function create($name, $address, $city, $region, $country, $postbox, $phone, $email, $taxid, $image, $cur_id, $ac_id, $wid)
    {
        $data = array(
            'cname' => $name,
            'address' => $address,
            'city' => $city,
            'region' => $region,
            'country' => $country,
            'postbox' => $postbox,
            'phone' => $phone,
            'email' => $email,
            'taxid' => $taxid,
            'logo' => $image,
            'ext' => $ac_id,
            'cur' => $cur_id,
            'ware' => $wid,
            'loc' => $this->aauth->get_user()->id_perusahaan
        );

        if ($this->db->insert('te_locations', $data)) {
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('ADDED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }

    }

    public function edit($id, $name, $address, $city, $region, $country, $postbox, $phone, $email, $taxid, $image, $cur_id, $ac_id, $wid)
    {
        $data = array(
            'cname' => $name,
            'address' => $address,
            'city' => $city,
            'region' => $region,
            'country' => $country,
            'postbox' => $postbox,
            'phone' => $phone,
            'email' => $email,
            'taxid' => $taxid,
            'logo' => $image,
            'ext' => $ac_id,
            'cur' => $cur_id,
            'ware' => $wid,
            'loc' => $this->aauth->get_user()->id_perusahaan
        );

        $this->db->set($data);
        $this->db->where('id', $id);

        if ($this->db->update('te_locations')) {
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('UPDATED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }

    }

    public function currencies()
    {

        $this->db->select('*');
        $this->db->from('te_currencies');

        $query = $this->db->get();
        return $query->result_array();

    }

    public function currency_d($id)
    {
        $this->db->select('*');
        $this->db->from('te_currencies');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function accountslist()
    {
        $this->db->select('*');
        $this->db->from('te_accounts');

        if ($this->aauth->get_user()->loc) {
            $this->db->where('loc', $this->aauth->get_user()->loc);
            $this->db->or_where('loc', $this->aauth->get_user()->loc);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function online_pay_settings($id)
    {

        $this->db->select('te_accounts.id,te_accounts.holder,');
        $this->db->from('te_locations');
        $this->db->where('te_locations.id', $id);
        $this->db->join('te_accounts', 'te_locations.ext = te_accounts.id', 'left');
        $query = $this->db->get();
        return $query->row_array();

    }

    public function warehouses()
    {
        $this->db->select('*');
        $this->db->from('te_warehouse');
        if ($this->aauth->get_user()->loc) {
            $this->db->where('loc', $this->aauth->get_user()->loc);
        } elseif (!BDATA) {
            $this->db->where('loc', $this->aauth->get_user()->loc);
        }
        $query = $this->db->get();
        return $query->result_array();
    }


}