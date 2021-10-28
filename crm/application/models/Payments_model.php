<?php
/**
 * Geo POS -  Accounting,  Invoicing  and CRM Software
 * Copyright (c) Rajesh Dukiya. All Rights Reserved
 * ***********************************************************************
 *
 *  Email: support@ultimatekode.com
 *  Website: https://www.ultimatekode.com
 *
 *  ************************************************************************
 *  * This software is furnished under a license and may be used and copied
 *  * only  in  accordance  with  the  terms  of such  license and with the
 *  * inclusion of the above copyright notice.
 *  * If you Purchased from Codecanyon, Please read the full License from
 *  * here- http://codecanyon.net/licenses/standard/
 * ***********************************************************************
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model
{
    var $table = 'te_transactions';
    var $column_order = array(null, 'date', 'debit', 'credit', null);
    var $column_search = array('date', 'debit', 'credit', null);
    var $order = array('id' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }


    public function invoice_details($id)
    {

        $this->db->select('te_invoices.*,te_customers.*,te_customers.id AS cid,te_terms.id AS termid,te_terms.title AS termtit,te_terms.terms AS terms');
        $this->db->from($this->table);
        $this->db->where('te_invoices.tid', $id);
        $this->db->join('te_customers', 'te_invoices.csd = te_customers.id', 'left');
        $this->db->join('te_terms', 'te_terms.id = te_invoices.term', 'left');
        $query = $this->db->get();
        return $query->row_array();

    }
        public function gateway_list($enable = '')
    {

        $this->db->from('te_gateways');
        if ($enable == 'Yes') {
            $this->db->where('enable', 'Yes');
        }
        $this->db->where('id<=', 6);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function invoice_products($id)
    {

        $this->db->select('*');
        $this->db->from('te_invoice_items');
        $this->db->where('tid', $id);
        $query = $this->db->get();
        return $query->result_array();

    }

    public function invoice_transactions($id)
    {

        $this->db->select('*');
        $this->db->from('te_transactions');
        $this->db->where('tid', $id);
        $this->db->where('ext', 0);
        $query = $this->db->get();
        return $query->result_array();

    }


    private function _get_datatables_query()
    {

        $this->db->from($this->table);
        $this->db->where('te_transactions.payerid', $this->session->userdata('user_details')[0]->cid);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        $this->db->where('te_transactions.payerid', $this->session->userdata('user_details')[0]->cid);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $this->db->where('te_transactions.payerid', $this->session->userdata('user_details')[0]->cid);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->where('te_transactions.payerid', $this->session->userdata('user_details')[0]->cid);
        return $this->db->count_all_results();
    }


    public function billingterms()
    {
        $this->db->select('id,title');
        $this->db->from('te_terms');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function employee($id)
    {
        $this->db->select('te_employees.name,te_employees.sign,te_users.roleid');
        $this->db->from('te_employees');
        $this->db->where('te_employees.id', $id);
        $this->db->join('te_users', 'te_employees.id = te_users.id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function balance($id)
    {

        $this->db->select('balance');
        $this->db->from('te_customers');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result= $query->row_array();
        return $result['balance'];

    }

    public function activity($id)
    {
        $this->db->select('*');
        $this->db->from('te_metadata');
        $this->db->where('type', 21);
        $this->db->where('rid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }


}