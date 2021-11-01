<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaranlangganan_model extends CI_Model
{
    var $table = 'te_pembayaran';
    var $column_order = array(null, 'te_products.product_name', 'te_products.qty', 'te_products.product_code', 'te_product_cat.title', 'te_products.product_price', null); //set column field database for datatable orderable
    var $column_search = array('te_products.product_name', 'te_products.product_code', 'te_product_cat.title', 'te_warehouse.title'); //set column field database for datatable searchable
    var $order = array('te_pembayaran.id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($id = '', $w = '', $sub = '')
    {
        $this->db->select('te_pembayaran.*,te_langgananadmin.nama_langganan AS nama_langganan');
        $this->db->from($this->table);
        $this->db->join('te_langgananadmin', 'te_langgananadmin.id = te_pembayaran.id_langganan');
        $this->db->where('te_pembayaran.loc', $this->aauth->get_user()->loc);
        $i = 0;

        foreach ($this->column_search as $item)  
        {
            $search = $this->input->post('search');
            $value = $search['value'];
            if ($value) 
            {

                if ($i === 0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $value);
                } else {
                    $this->db->or_like($item, $value);
                }

                if (count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
        $search = $this->input->post('order');
        if ($search) 
        {
            $this->db->order_by($this->column_order[$search['0']['column']], $search['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($id = '', $w = '', $sub = '')
    {
        $this->_get_datatables_query($id, $w, $sub);
        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id, $w = '', $sub = '')
    {
        $this->_get_datatables_query($id, $w, $sub);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->join('te_langgananadmin', 'te_langgananadmin.id = te_pembayaran.id_langganan');
        $this->db->where('te_pembayaran.loc', $this->aauth->get_user()->loc);
        
        return $this->db->count_all_results();
    }
}