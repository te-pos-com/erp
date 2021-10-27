<?php
/**
 * Geo POS -  Accounting,  Invoicing  and CRM Application
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

class Chart_model extends CI_Model
{

    public function productcat($type, $c1 = '', $c2 = '')
    {
        switch ($type) {
            case 'week':
                $day1 = date("Y-m-d", strtotime(' - 7 days'));
                $day2 = date('Y-m-d');
                break;
            case 'month':
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
            case 'year':
                $day1 = date("Y-m-d", strtotime(' - 1 years'));
                $day2 = date('Y-m-d');
                break;

            case 'custom':
                $day1 = datefordatabase($c1);
                $day2 = datefordatabase($c2);
                break;

            default :
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
        }
        $this->db->select_sum('te_invoice_items.qty');
        $this->db->select_sum('te_invoice_items.subtotal');
        $this->db->select('te_invoice_items.pid');
        $this->db->select('te_product_cat.title');
        $this->db->from('te_invoice_items');
        $this->db->group_by('te_product_cat.id');
        $this->db->join('te_invoices', 'te_invoices.id = te_invoice_items.tid', 'left');
        $this->db->join('te_products', 'te_products.pid = te_invoice_items.pid', 'left');
        $this->db->join('te_product_cat', 'te_product_cat.id = te_products.pcat', 'left');
        $month = date('Y-m');
        $today = date('Y-m-d');
        $this->db->where('DATE(te_invoices.invoicedate) >=', $day1);
        $this->db->where('DATE(te_invoices.invoicedate) <=', $day2);
                    if ($this->aauth->get_user()->loc) {
            $this->db->group_start();
            $this->db->where('te_invoices.loc', $this->aauth->get_user()->loc);
            if (BDATA) $this->db->or_where('te_invoices.loc', 0);
            $this->db->group_end();
        } elseif (!BDATA) {
            $this->db->where('te_invoices.loc', 0);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function trendingproducts($type, $c1 = '', $c2 = '')
    {
        switch ($type) {
            case 'week':
                $day1 = date("Y-m-d", strtotime(' - 7 days'));
                $day2 = date('Y-m-d');
                break;
            case 'month':
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
            case 'year':
                $day1 = date("Y-m-d", strtotime(' - 1 years'));
                $day2 = date('Y-m-d');
                break;

            case 'custom':
                $day1 = datefordatabase($c1);
                $day2 = datefordatabase($c2);
                break;

            default :
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
        }

        $this->db->select_sum('te_invoice_items.qty');
        $this->db->select('te_products.product_name');
        $this->db->from('te_invoice_items');
        $this->db->group_by('te_invoice_items.pid');
        $this->db->join('te_invoices', 'te_invoices.id = te_invoice_items.tid', 'left');
        $this->db->join('te_products', 'te_products.pid = te_invoice_items.pid', 'left');

        $this->db->where('DATE(te_invoices.invoicedate) >=', $day1);
        $this->db->where('DATE(te_invoices.invoicedate) <=', $day2);
                            if ($this->aauth->get_user()->loc) {
            $this->db->group_start();
            $this->db->where('te_invoices.loc', $this->aauth->get_user()->loc);
            if (BDATA) $this->db->or_where('te_invoices.loc', 0);
            $this->db->group_end();
        } elseif (!BDATA) {
            $this->db->where('te_invoices.loc', 0);
        }
        $this->db->order_by('te_invoice_items.qty', 'DESC');
        $this->db->limit(100);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function profitchart($type, $c1 = '', $c2 = '')
    {
        switch ($type) {
            case 'week':
                $day1 = date("Y-m-d", strtotime(' - 7 days'));
                $day2 = date('Y-m-d');
                break;
            case 'month':
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
            case 'year':
                $day1 = date("Y-m-d", strtotime(' - 1 years'));
                $day2 = date('Y-m-d');
                break;

            case 'custom':
                $day1 = datefordatabase($c1);
                $day2 = datefordatabase($c2);
                break;

            default :
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
        }

        $this->db->select_sum('te_metadata.col1');
        $this->db->select('te_metadata.d_date');
        $this->db->from('te_metadata');
        $this->db->group_by('te_metadata.d_date');
        $month = date('Y-m');
        $today = date('Y-m-d');
        $this->db->where('DATE(te_metadata.d_date) >=', $day1);
        $this->db->where('DATE(te_metadata.d_date) <=', $day2);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function customerchart($type, $c1 = '', $c2 = '')
    {
        switch ($type) {
            case 'week':
                $day1 = date("Y-m-d", strtotime(' - 7 days'));
                $day2 = date('Y-m-d');
                break;
            case 'month':
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
            case 'year':
                $day1 = date("Y-m-d", strtotime(' - 1 years'));
                $day2 = date('Y-m-d');
                break;

            case 'custom':
                $day1 = datefordatabase($c1);
                $day2 = datefordatabase($c2);
                break;

            default :
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
        }
        $this->db->select_sum('te_invoices.total');
        $this->db->select('te_customers.name');
        $this->db->from('te_invoices');
        $this->db->group_by('te_invoices.csd');
        $this->db->join('te_customers', 'te_customers.id = te_invoices.csd', 'left');
        $month = date('Y-m');
        $today = date('Y-m-d');
        $this->db->where('DATE(te_invoices.invoicedate) >=', $day1);
        $this->db->where('DATE(te_invoices.invoicedate) <=', $day2);
                            if ($this->aauth->get_user()->loc) {
            $this->db->group_start();
            $this->db->where('te_invoices.loc', $this->aauth->get_user()->loc);
            if (BDATA) $this->db->or_where('te_invoices.loc', 0);
            $this->db->group_end();
        } elseif (!BDATA) {
            $this->db->where('te_invoices.loc', 0);
        }
        $this->db->order_by('te_invoices.total', 'DESC');
        $this->db->limit(100);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }


    public function incomechart($type, $c1 = '', $c2 = '')
    {
        switch ($type) {
            case 'week':
                $day1 = date("Y-m-d", strtotime(' - 7 days'));
                $day2 = date('Y-m-d');
                break;
            case 'month':
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
            case 'year':
                $day1 = date("Y-m-d", strtotime(' - 1 years'));
                $day2 = date('Y-m-d');
                break;

            case 'custom':
                $day1 = datefordatabase($c1);
                $day2 = datefordatabase($c2);
                break;

            default :
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
        }
        $this->db->select_sum('credit');
        $this->db->select('date');
        $this->db->from('te_transactions');
        $this->db->group_by('date');
        $month = date('Y-m');
        $today = date('Y-m-d');
        $this->db->where('DATE(date) >=', $day1);
        $this->db->where('DATE(date) <=', $day2);
        $this->db->where('type', 'Income');
                            if ($this->aauth->get_user()->loc) {
            $this->db->group_start();
            $this->db->where('loc', $this->aauth->get_user()->loc);
            if (BDATA) $this->db->or_where('loc', 0);
            $this->db->group_end();
        } elseif (!BDATA) {
            $this->db->where('loc', 0);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function expenseschart($type, $c1 = '', $c2 = '')
    {
        switch ($type) {
            case 'week':
                $day1 = date("Y-m-d", strtotime(' - 7 days'));
                $day2 = date('Y-m-d');
                break;
            case 'month':
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
            case 'year':
                $day1 = date("Y-m-d", strtotime(' - 1 years'));
                $day2 = date('Y-m-d');
                break;

            case 'custom':
                $day1 = datefordatabase($c1);
                $day2 = datefordatabase($c2);
                break;

            default :
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
        }
        $this->db->select_sum('debit');
        $this->db->select('date');
        $this->db->from('te_transactions');
        $this->db->group_by('date');
        $month = date('Y-m');
        $today = date('Y-m-d');
        $this->db->where('DATE(date) >=', $day1);
        $this->db->where('DATE(date) <=', $day2);
        $this->db->where('type', 'Expense');
                            if ($this->aauth->get_user()->loc) {
            $this->db->group_start();
            $this->db->where('loc', $this->aauth->get_user()->loc);
            if (BDATA) $this->db->or_where('loc', 0);
            $this->db->group_end();
        } elseif (!BDATA) {
            $this->db->where('loc', 0);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function incexp($type, $c1 = '', $c2 = '')
    {
        switch ($type) {
            case 'week':
                $day1 = date("Y-m-d", strtotime(' - 7 days'));
                $day2 = date('Y-m-d');
                break;
            case 'month':
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
            case 'year':
                $day1 = date("Y-m-d", strtotime(' - 1 years'));
                $day2 = date('Y-m-d');
                break;

            case 'custom':
                $day1 = datefordatabase($c1);
                $day2 = datefordatabase($c2);
                break;

            default :
                $day1 = date("Y-m-d", strtotime(' - 30 days'));
                $day2 = date('Y-m-d');
                break;
        }
        $this->db->select_sum('debit');
        $this->db->select_sum('credit');
        $this->db->select('type');
        $this->db->from('te_transactions');
        $this->db->group_by('type');
        $month = date('Y-m');
        $today = date('Y-m-d');
        $this->db->where('DATE(date) >=', $day1);
        $this->db->where('DATE(date) <=', $day2);
                    if ($this->aauth->get_user()->loc) {
            $this->db->group_start();
            $this->db->where('loc', $this->aauth->get_user()->loc);
            if (BDATA) $this->db->or_where('loc', 0);
            $this->db->group_end();
        } elseif (!BDATA) {
            $this->db->where('loc', 0);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }


}