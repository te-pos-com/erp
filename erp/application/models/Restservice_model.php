<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Restservice_model extends CI_Model
{

    public function customers($id = '')
    {

        $this->db->select('*');
        $this->db->from('te_customers');
        if ($id != '') {

            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function delete_customer($id)
    {
        return $this->db->delete('te_customers', array('id' => $id));
    }

    public function products($id = '')
    {

        $this->db->select('*');
        $this->db->from('te_products');
        if ($id != '') {

            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function invoice($id)
    {
        $this->db->select('te_invoices.*,te_customers.*,te_invoices.id AS iid,te_customers.id AS cid,te_terms.id AS termid,te_terms.title AS termtit,te_terms.terms AS terms');
        $this->db->from('te_invoices');
        $this->db->where('te_invoices.id', $id);
        $this->db->join('te_customers', 'te_invoices.csd = te_customers.id', 'left');
        $this->db->join('te_terms', 'te_terms.id = te_invoices.term', 'left');
        $query = $this->db->get();
        $invoice = $query->row_array();
        $loc = location($invoice['loc']);
        $this->db->select('te_invoice_items.*');
        $this->db->from('te_invoice_items');
        $this->db->where('te_invoice_items.tid', $id);
        $query = $this->db->get();
        $items = $query->result_array();
        return array(array('invoice' => $invoice, 'company' => $loc, 'items' => $items, 'currency' => currency($invoice['loc'])));
    }


}