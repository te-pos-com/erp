<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Quote_model extends CI_Model
{
    var $table = 'te_quotes';
    var $column_order = array(null, 'tid', 'name', 'invoicedate', 'total', 'status', null);
    var $column_search = array('tid', 'name', 'invoicedate', 'total');
    var $order = array('tid' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }

    public function lastquote()
    {
        $this->db->select('tid');
        $this->db->from($this->table);
        $this->db->order_by('tid', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->tid;
        } else {
            return 1000;
        }
    }

    public function warehouses()
    {
        $this->db->select('*');
        $this->db->from('te_warehouse');
        $query = $this->db->get();
        return $query->result_array();

    }

    public function quote_details($id)
    {

        $this->db->select('te_quotes.*,te_quotes.id AS iid,te_customers.*,te_customers.id AS cid,te_terms.id AS termid,te_terms.title AS termtit,te_terms.terms AS terms');
        $this->db->from($this->table);
        $this->db->where('te_quotes.id', $id);
		$this->db->where('te_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        $this->db->join('te_customers', 'te_quotes.csd = te_customers.id', 'left');
        $this->db->join('te_terms', 'te_terms.id = te_quotes.term', 'left');
        $query = $this->db->get();
        return $query->row_array();

    }

    public function quote_products($id)
    {

        $this->db->select('*');
        $this->db->from('te_quotes_items');
        $this->db->where('tid', $id);
        $query = $this->db->get();
        return $query->result_array();

    }





    private function _get_datatables_query()
    {
        $this->db->select('te_quotes.*,te_customers.name');
        $this->db->from($this->table);
        $this->db->where('te_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        $this->db->join('te_customers', 'te_quotes.csd=te_customers.id', 'left');

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
		$this->db->where('te_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
		$this->db->where('te_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
		$this->db->where('te_quotes.csd', $this->session->userdata('user_details')[0]->cid);
        return $this->db->count_all_results();
    }

     public function update_status($id)
    {
        $this->db->set('status', 'customer_approved');
                $this->db->where('id', $id);
               return $this->db->update('te_quotes');
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

    public function convert($id)
    {

        $invoice = $this->quote_details($id);
        $products = $this->quote_products($id);
        $this->db->trans_start();

        $this->db->select('tid');
        $this->db->from('te_invoices');
        $this->db->order_by('tid', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $iid = $query->row()->tid + 1;
        } else {
            $iid = 1000;
        }
        $productlist = array();
        $prodindex = 0;

        foreach ($products as $row) {

            $amt = $row['qty'];

            $data = array(
                'tid' => $iid,
                'pid' => $row['pid'],
                'product' => $row['product'],
                'qty' => $amt,
                'price' => $row['price'],
                'tax' => $row['tax'],
                'discount' => $row['discount'],
                'subtotal' => $row['subtotal'],
                'totaltax' => $row['totaltax'],
                'totaldiscount' => $row['totaldiscount']
            );

            $productlist[$prodindex] = $data;
            $prodindex++;

            $this->db->set('qty', "qty-$amt", FALSE);
            $this->db->where('pid', $row['pid']);
            $this->db->update('te_products');
        }


        $this->db->insert_batch('te_invoice_items', $productlist);


        $data = array('tid' => $iid, 'invoicedate' => $invoice['invoicedate'], 'invoiceduedate' => $invoice['invoicedate'], 'subtotal' => $invoice['invoicedate'], 'shipping' => $invoice['shipping'], 'discount' => $invoice['discount'], 'tax' => $invoice['tax'], 'total' => $invoice['total'], 'notes' => $invoice['notes'], 'csd' => $invoice['csd'], 'eid' => $invoice['eid'], 'items' => $invoice['items'], 'taxstatus' => $invoice['taxstatus'], 'discstatus' => $invoice['discstatus'], 'format_discount' => $invoice['format_discount'], 'refer' => $invoice['refer'], 'term' => $invoice['term']);

        $this->db->insert('te_invoices', $data);

        if ($this->db->trans_complete()) {
            return true;
        } else {
            return false;
        }


    }


}