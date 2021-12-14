<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices_model extends CI_Model
{
    var $table = 'te_invoices';
    var $column_order = array(null, 'tid', 'name', 'invoicedate', 'total', 'status', null);
    var $column_search = array('tid', 'name', 'invoicedate', 'total');
    var $order = array('tid' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }




        public function invoice_details($id)
    {
        $this->db->select('te_invoices.*,te_customers.*,te_invoices.loc as loc,te_invoices.id AS iid,te_customers.id AS cid,te_terms.id AS termid,te_terms.title AS termtit,te_terms.terms AS terms');
        $this->db->from($this->table);
        $this->db->where('te_invoices.id', $id);


        $this->db->join('te_customers', 'te_invoices.csd = te_customers.id', 'left');
        $this->db->join('te_terms', 'te_terms.id = te_invoices.term', 'left');
        $query = $this->db->get();
        return $query->row_array();
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

         $this->db->select('te_invoices.id,te_invoices.tid,te_invoices.invoicedate,te_invoices.invoiceduedate,te_invoices.total,te_invoices.status,te_invoices.multi,te_customers.name');
        $this->db->from($this->table);
        $this->db->where('te_invoices.csd', $this->session->userdata('user_details')[0]->cid);
     //     $this->db->where('te_invoices.i_class');
        $this->db->join('te_customers', 'te_invoices.csd=te_customers.id', 'left');

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
        $this->db->where('te_invoices.csd', $this->session->userdata('user_details')[0]->cid);
         // $this->db->where('te_invoices.i_class', 0);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $this->db->where('te_invoices.csd', $this->session->userdata('user_details')[0]->cid);
     //     $this->db->where('te_invoices.i_class', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->where('te_invoices.csd', $this->session->userdata('user_details')[0]->cid);
    //      $this->db->where('te_invoices.i_class', 0);
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
        $this->db->join('te_users', 'te_employees.id =te_users.id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }


}