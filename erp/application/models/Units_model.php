<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Units_model extends CI_Model
{


    public function units_list()
    {
        $query = $this->db->query("SELECT * FROM te_units WHERE type=0 AND loc=". $this->aauth->get_user()->loc ." ORDER BY id DESC");
        return $query->result_array();
    }


    public function view($id)
    {

        $this->db->from('te_units');
        $this->db->where('id', $id);
        $this->db->where('loc',$this->aauth->get_user()->loc);

        $query = $this->db->get();
        $result = $query->row_array();
        return $result;


    }

    public function create($name, $code)
    {
        $data = array(
            'name'  =>  $name,
            'code'  =>  $code,
            'loc'   =>  $this->aauth->get_user()->loc,
        );

        if ($this->db->insert('te_units', $data)) {
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('ADDED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }

    }

    public function edit($id, $name, $code)
    {
        $data = array(
            'name'  =>  $name,
            'code'  =>  $code,
            'loc'   =>  $this->aauth->get_user()->loc,
        );

        $this->db->set($data);
        $this->db->where('id', $id);

        if ($this->db->update('te_units')) {
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('UPDATED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }

    }

    public function variations_list()
    {
        $query = $this->db->query("SELECT * FROM te_units WHERE type=1 AND loc=" . $this->aauth->get_user()->loc . " ORDER BY id DESC");
        return $query->result_array();
    }

    public function create_va($name, $type = 0)
    {
        $data = array(
            'name'  =>  $name,
            'type'  =>  $type,
            'loc'   =>  $this->aauth->get_user()->loc,
        );

        if ($this->db->insert('te_units', $data)) {
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('ADDED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }

    }

    public function edit_va($id, $name)
    {
        $data = array(
            'name' => $name
        );

        $this->db->set($data);
        $this->db->where('id', $id);

        if ($this->db->update('te_units')) {
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('UPDATED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }

    }

    public function variables_list()
    {
        //   $query = $this->db->query("SELECT * FROM te_units WHERE type=2 ORDER BY id DESC");
        //    return $query->result_array();
        $this->db->select('u.id,u.name,u2.name AS variation');
        $this->db->join('te_units u2', 'u.rid = u2.id', 'left');
        $this->db->where('u.type', 2);
        $this->db->where('u.loc',$this->aauth->get_user()->loc);
        $this->db->order_by('u.name', 'asc');
        $query = $this->db->get('te_units u');
        return $query->result_array();
    }

    public function create_vb($name, $var_id)
    {
        $data = array(
            'name'  =>  $name,
            'type'  =>  2,
            'rid'   =>  $var_id,
            'loc'   =>  $this->aauth->get_user()->loc
        );

        if ($this->db->insert('te_units', $data)) {
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('ADDED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }

    }

    public function edit_vb($id, $name, $var_id)
    {
        $data = array(
            'name'  =>  $name,
            'rid'   =>  $var_id,
            'loc'   =>  $this->aauth->get_user()->loc
        );

        $this->db->set($data);
        $this->db->where('id', $id);

        if ($this->db->update('te_units')) {
            echo json_encode(array('status' => 'Success', 'message' =>
                $this->lang->line('UPDATED')));
        } else {
            echo json_encode(array('status' => 'Error', 'message' =>
                $this->lang->line('ERROR')));
        }

    }


}