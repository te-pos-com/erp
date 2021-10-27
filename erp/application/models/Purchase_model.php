<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_model extends CI_Model
{
    var $table = 'te_purchase';
    var $column_order = array(null, 'te_purchase.tid', 'te_supplier.name', 'te_purchase.invoicedate', 'te_purchase.total', 'te_purchase.status', null);
    var $column_search = array('te_purchase.tid', 'te_supplier.name', 'te_purchase.invoicedate', 'te_purchase.total','te_purchase.status');
    var $order = array('te_purchase.tid' => 'desc');

    public function __construct()
    {
        parent::__construct();
    }

    public function lastpurchase()
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
        if ($this->aauth->get_user()->loc) {
            $this->db->where('loc', $this->aauth->get_user()->loc);
            if (BDATA) $this->db->or_where('loc',$this->aauth->get_user()->loc);
        } elseif (!BDATA) {
            $this->db->where('loc', $this->aauth->get_user()->loc);
        }
        $query = $this->db->get();
        return $query->result_array();

    }

    public function purchase_details($id)
    {

        $this->db->select('te_purchase.*,te_purchase.id AS iid,SUM(te_purchase.shipping + te_purchase.ship_tax) AS shipping,te_supplier.*,te_supplier.id AS cid,te_terms.id AS termid,te_terms.title AS termtit,te_terms.terms AS terms');
        $this->db->from($this->table);
        $this->db->where('te_purchase.id', $id);
        if ($this->aauth->get_user()->loc) {
            $this->db->where('te_purchase.loc', $this->aauth->get_user()->loc);
            if (BDATA) $this->db->or_where('te_purchase.loc', $this->aauth->get_user()->loc0);
        } elseif (!BDATA) {
            $this->db->where('te_purchase.loc', $this->aauth->get_user()->loc);
        }
        $this->db->join('te_supplier', 'te_purchase.csd = te_supplier.id', 'left');
        $this->db->join('te_terms', 'te_terms.id = te_purchase.term', 'left');
        $query = $this->db->get();
        return $query->row_array();

    }

    public function purchase_products($id)
    {
        $this->db->select('*');
        $this->db->from('te_purchase_items');
        $this->db->where('tid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function purchase_transactions($id)
    {
        $this->db->select('*');
        $this->db->from('te_transactions');
        $this->db->where('tid', $id);
        $this->db->where('ext', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function purchase_delete($id)
    {
        $this->db->trans_start();
        $this->db->select('pid,qty');
        $this->db->from('te_purchase_items');
        $this->db->where('tid', $id);
        $query = $this->db->get();
        $prevresult = $query->result_array();
        foreach ($prevresult as $prd) {
            $amt = $prd['qty'];
            $this->db->set('qty', "qty-$amt", FALSE);
            $this->db->where('pid', $prd['pid']);
            $this->db->update('te_products');
        }
        $whr = array('id' => $id);
        if ($this->aauth->get_user()->loc) {
            $whr = array('id' => $id, 'loc' => $this->aauth->get_user()->loc);
        } elseif (!BDATA) {
               $whr = array('id' => $id, 'loc' =>$this->aauth->get_user()->loc);
        }
        $this->db->delete('te_purchase', $whr);
        if ($this->db->affected_rows()) $this->db->delete('te_purchase_items', array('tid' => $id));
        if ($this->db->trans_complete()) {
            return true;
        } else {
            return false;
        }
    }


    private function _get_datatables_query()
    {
        $this->db->select('te_purchase.id,te_purchase.tid,te_purchase.invoicedate,te_purchase.invoiceduedate,te_purchase.total,te_purchase.status,te_supplier.name');
        $this->db->from($this->table);
        $this->db->join('te_supplier', 'te_purchase.csd=te_supplier.id', 'left');
            if ($this->aauth->get_user()->loc) {
            $this->db->where('te_purchase.loc', $this->aauth->get_user()->loc);
        }
        elseif(!BDATA) { $this->db->where('te_purchase.loc', $this->aauth->get_user()->loc); }
                    if ($this->input->post('start_date') && $this->input->post('end_date')) // if datatable send POST for search
        {
            $this->db->where('DATE(te_purchase.invoicedate) >=', datefordatabase($this->input->post('start_date')));
            $this->db->where('DATE(te_purchase.invoicedate) <=', datefordatabase($this->input->post('end_date')));
        }
        $i = 0;
        foreach ($this->column_search as $item) // loop column
        {
            if ($this->input->post('search')['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $this->input->post('search')['value']);
                } else {
                    $this->db->or_like($item, $this->input->post('search')['value']);
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
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
           if ($this->aauth->get_user()->loc) {
            $this->db->where('te_purchase.loc', $this->aauth->get_user()->loc);
        }
        elseif(!BDATA) { $this->db->where('te_purchase.loc', 0); }
        return $this->db->count_all_results();
    }


    public function billingterms()
    {
        $this->db->select('id,title');
        $this->db->from('te_terms');
        $this->db->where('type', 4);
        $this->db->or_where('type', 0);
        $query = $this->db->get();
        return $query->result_array();
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

    public function employee($id)
    {
        $this->db->select('te_employees.name,te_employees.sign,te_users.roleid');
        $this->db->from('te_employees');
        $this->db->where('te_employees.id', $id);
        $this->db->join('te_users', 'te_employees.id = te_users.id', 'left');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function meta_insert($id, $type, $meta_data)
    {

        $data = array('type' => $type, 'rid' => $id, 'col1' => $meta_data);
        if ($id) {
            return $this->db->insert('te_metadata', $data);
        } else {
            return 0;
        }
    }

    public function attach($id)
    {
        $this->db->select('te_metadata.*');
        $this->db->from('te_metadata');
        $this->db->where('te_metadata.type', 4);
        $this->db->where('te_metadata.rid', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function meta_delete($id, $type, $name)
    {
        if (@unlink(FCPATH . 'userfiles/attach/' . $name)) {
            return $this->db->delete('te_metadata', array('rid' => $id, 'type' => $type, 'col1' => $name));
        }
    }

}