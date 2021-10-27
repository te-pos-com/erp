<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{
    var $date;

    public function __construct()
    {
        parent::__construct();
        $this->load->library("Aauth");
        $this->load->model('export_model', 'export');
        if (!$this->aauth->is_loggedin()) {
            redirect('/user/', 'refresh');
            exit;
        }

        if ($this->aauth->get_user()->roleid < 5) {

            exit('Not Allowed!');
        }
        $this->date = 'backup_' . date('Y_m_d_H_i_s');
        $this->li_a = 'export';


    }


    function dbexport()
    {


        $head['title'] = "Backup Database";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('export/db_back');
        $this->load->view('fixed/footer');


    }


    function dbexport_c()
    {

        $this->load->dbutil();
        $backup =& $this->dbutil->backup();
        $this->load->helper('file');
        write_file('<?php  echo base_url();?>/downloads', $backup);
        $this->load->helper('download');
        force_download($this->date . '.gz', $backup);
    }


    function crm()
    {


        $head['title'] = "Export CRM Data";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('export/crm');
        $this->load->view('fixed/footer');


    }


    function crm_now()
    {


        $type = $this->input->post('type');

        switch ($type) {
            case 1 :
                $this->customers();
                break;

            case 2 :
                $this->suppliers();
                break;
        }


    }

    private function customers()
    {

        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=customers_' . $this->date . '..csv');
        header('Content-Transfer-Encoding: binary');
        $whr = '';
        if ($this->aauth->get_user()->loc) {
            $whr = " WHERE loc='" . $this->aauth->get_user()->loc . "';";
        } elseif (!BDATA) {
            $whr = " WHERE loc='0';";
        }


        $query = $this->db->query("SELECT name,address,city,region,country,postbox,email,phone,company FROM te_customers $whr");
        echo "\xEF\xBB\xBF"; // Byte Order Mark
        echo $this->dbutil->csv_from_result($query);
        //  force_download('customers_' . $this->date . '.csv', );

    }

    private function suppliers()
    {
        $whr = '';
        if ($this->aauth->get_user()->loc) {
            $whr = " WHERE loc='" . $this->aauth->get_user()->loc . "';";
        } elseif (!BDATA) {
            $whr = " WHERE loc='0';";
        }
        $query = $this->db->query("SELECT name,address,city,region,country,postbox,email,phone,company FROM te_supplier $whr");
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=suppliers_' . $this->date . '..csv');
        header('Content-Transfer-Encoding: binary');
        echo "\xEF\xBB\xBF"; // Byte Order Mark
        echo $this->dbutil->csv_from_result($query);

    }

    function transactions()
    {
        $this->load->model('transactions_model');
        $data['accounts'] = $this->transactions_model->acc_list();
        $head['title'] = "Export Transactions";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('export/transactions', $data);
        $this->load->view('fixed/footer');
    }

    function transactions_o()
    {
        $whr = '';
        if ($this->aauth->get_user()->loc) {
            $whr = " AND loc='" . $this->aauth->get_user()->loc . "';";
        } elseif (!BDATA) {
            $whr = " AND loc='0';";
        }

        $pay_acc = $this->input->post('pay_acc');
        $trans_type = $this->input->post('trans_type');
        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        if ($pay_acc == 'All') {
            if ($trans_type == 'All') {
                $where = " WHERE (DATE(date) BETWEEN '$sdate' AND '$edate') ";
            } else {
                $where = " WHERE (DATE(date) BETWEEN '$sdate' AND '$edate') AND type='$trans_type'";
            }
        } else {
            if ($trans_type == 'All') {
                $where = " WHERE acid='$pay_acc' AND (DATE(date) BETWEEN '$sdate' AND '$edate') ";
            } else {
                $where = " WHERE acid='$pay_acc' AND (DATE(date) BETWEEN '$sdate' AND '$edate') AND type='$trans_type'";
            }
        }

        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=transactions_' . $this->date . '..csv');
        header('Content-Transfer-Encoding: binary');
        $query = $this->db->query("SELECT account,type,cat AS category,debit,credit,payer,method,date,note FROM te_transactions" . $where . ' ' . $whr);
        echo "\xEF\xBB\xBF"; // Byte Order Mark
        echo $this->dbutil->csv_from_result($query);
    }


    function products()
    {
        $head['title'] = "Export Products";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('export/products');
        $this->load->view('fixed/footer');
    }

    function products_o()
    {
        $whr = '';
        if ($this->aauth->get_user()->loc) {
            $whr = "LEFT JOIN te_warehouse ON te_products.warehouse=te_warehouse.id WHERE te_warehouse.loc='" . $this->aauth->get_user()->loc . "';";
        } elseif (!BDATA) {
            $whr = "LEFT JOIN te_warehouse ON te_products.warehouse=te_warehouse.id WHERE te_warehouse.loc='0';";
        }

        $type = $this->input->post('type');
        $query = '';
        switch ($type) {
            case 1 :
                $query = "SELECT product_name,product_code,product_price,fproduct_price AS factory_price,taxrate,disrate AS discount_rate,qty FROM te_products $whr";
                break;

            case 2 :
                $query = "SELECT te_product_cat.title as category,te_products.product_name,te_products.product_code,te_products.product_price,te_products.fproduct_price AS factory_price,te_products.taxrate,te_products.disrate AS discount_rate,te_products.qty FROM te_products LEFT JOIN te_product_cat ON te_products.pcat=te_product_cat.id $whr";
                break;
        }
        $query = $this->db->query($query);
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=transactions_' . $this->date . '..csv');
        header('Content-Transfer-Encoding: binary');


        echo "\xEF\xBB\xBF"; // Byte Order Mark
        echo $this->dbutil->csv_from_result($query);

    }


    function account()
    {


        $this->load->model('transactions_model');
        $this->load->model('employee_model');
        $data['cat'] = $this->transactions_model->categories();
        $data['emp'] = $this->employee_model->list_employee();
        $data['accounts'] = $this->transactions_model->acc_list();
        $head['title'] = "Export Transactions";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('export/account', $data);
        $this->load->view('fixed/footer');


    }

    function accounts_o()
    {
        $this->load->model('reports_model');
        $this->load->model('accounts_model');

        $pay_acc = $this->input->post('pay_acc');
        $trans_type = $this->input->post('trans_type');
        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        $data['account'] = $this->accounts_model->details($pay_acc);


        $data['list'] = $this->reports_model->get_statements($pay_acc, $trans_type, $sdate, $edate);

        $data['lang']['statement'] = $this->lang->line('Account Statement');
        $data['lang']['title'] = $this->lang->line('Account');
        $data['lang']['var1'] = $data['account']['holder'];
        $data['lang']['var2'] = $data['account']['acn'];

        $loc = location($this->aauth->get_user()->loc);
        $company = '<strong>' . $loc['cname'] . '</strong><br>' . $loc['address'] . '<br>' . $loc['city'] . ', ' . $loc['region'] . '<br>' . $loc['country'] . ' -  ' . $loc['postbox'] . '<br>' . $this->lang->line('Phone') . ': ' . $loc['phone'] . '<br> ' . $this->lang->line('Email') . ': ' . $loc['email'];
        if ($loc['taxid']) $company .= '<br>' . $this->lang->line('Tax') . ' ID: ' . $loc['taxid'];
        $data['lang']['company'] = $company;


        $html = $this->load->view('accounts/statementpdf-' . LTR, $data, true);


        ini_set('memory_limit', '64M');


        $this->load->library('pdf');

        $pdf = $this->pdf->load();


        $pdf->WriteHTML($html);


        $pdf->Output('Statement' . $pay_acc . '.pdf', 'D');


    }

    function employee()
    {
        $this->load->model('reports_model');
        $this->load->model('accounts_model');

        $pay_acc = $this->input->post('employee');
        $trans_type = $this->input->post('trans_type');
        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        $this->load->model('employee_model');
        $data['employee'] = $this->employee_model->employee_details($pay_acc);


        $data['list'] = $this->reports_model->get_statements_employee($pay_acc, $trans_type, $sdate, $edate);

        $data['lang']['statement'] = $this->lang->line('Employee Account Statement');
        $data['lang']['title'] = $this->lang->line('Employee');
        $data['lang']['var1'] = $data['employee']['name'];
        $data['lang']['var2'] = $data['employee']['email'];
        $loc = location($this->aauth->get_user()->loc);
        $company = '<strong>' . $loc['cname'] . '</strong><br>' . $loc['address'] . '<br>' . $loc['city'] . ', ' . $loc['region'] . '<br>' . $loc['country'] . ' -  ' . $loc['postbox'] . '<br>' . $this->lang->line('Phone') . ': ' . $loc['phone'] . '<br> ' . $this->lang->line('Email') . ': ' . $loc['email'];
        if ($loc['taxid']) $company .= '<br>' . $this->lang->line('Tax') . ' ID: ' . $loc['taxid'];
        $data['lang']['company'] = $company;


        $html = $this->load->view('accounts/statementpdf-' . LTR, $data, true);


        ini_set('memory_limit', '64M');


        $this->load->library('pdf');

        $pdf = $this->pdf->load();


        $pdf->WriteHTML($html);


        $pdf->Output('Statement' . $pay_acc . '.pdf', 'D');


    }

    function trans_cat()
    {
        $this->load->model('reports_model');
        $this->load->model('transactions_model');

        $pay_cat = $this->input->post('pay_cat', true);
        $trans_type = $this->input->post('trans_type');
        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        $data['cat'] = $this->transactions_model->cat_details_name($pay_cat);


        $data['list'] = $this->reports_model->get_statements_cat($pay_cat, $trans_type, $sdate, $edate);

        $data['lang']['statement'] = $this->lang->line('Transaction Categories Statement');
        $data['lang']['title'] = $this->lang->line('Transaction Categories');
        $data['lang']['var1'] = $data['cat'] ['name'];
        $data['lang']['var2'] = '';
        $loc = location($this->aauth->get_user()->loc);
        $company = '<strong>' . $loc['cname'] . '</strong><br>' . $loc['address'] . '<br>' . $loc['city'] . ', ' . $loc['region'] . '<br>' . $loc['country'] . ' -  ' . $loc['postbox'] . '<br>' . $this->lang->line('Phone') . ': ' . $loc['phone'] . '<br> ' . $this->lang->line('Email') . ': ' . $loc['email'];
        if ($loc['taxid']) $company .= '<br>' . $this->lang->line('Tax') . ' ID: ' . $loc['taxid'];
        $data['lang']['company'] = $company;
        $html = $this->load->view('accounts/statementpdf-' . LTR, $data, true);


        ini_set('memory_limit', '64M');


        $this->load->library('pdf');

        $pdf = $this->pdf->load();


        $pdf->WriteHTML($html);


        $pdf->Output('Statement' . $data['lang']['var1'] . '.pdf', 'D');


    }

    function customer()
    {
        $this->load->model('reports_model');
        $this->load->model('customers_model');

        $customer = $this->input->post('customer');
        $trans_type = $this->input->post('trans_type');
        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        $data['customer'] = $this->customers_model->details($customer);


        $data['list'] = $this->reports_model->get_customer_statements($customer, $trans_type, $sdate, $edate);

        $loc = location($this->aauth->get_user()->loc);
        $company = '<strong>' . $loc['cname'] . '</strong><br>' . $loc['address'] . '<br>' . $loc['city'] . ', ' . $loc['region'] . '<br>' . $loc['country'] . ' -  ' . $loc['postbox'] . '<br>' . $this->lang->line('Phone') . ': ' . $loc['phone'] . '<br> ' . $this->lang->line('Email') . ': ' . $loc['email'];
        if ($loc['taxid']) $company .= '<br>' . $this->lang->line('Tax') . ' ID: ' . $loc['taxid'];
        $data['lang']['company'] = $company;


        $html = $this->load->view('customers/statementpdf', $data, true);


        ini_set('memory_limit', '64M');


        $this->load->library('pdf');

        $pdf = $this->pdf->load();


        $pdf->WriteHTML($html);


        $pdf->Output('Statement' . $customer . '.pdf', 'D');


    }

    function supplier()
    {
        $this->load->model('reports_model');
        $this->load->model('supplier_model');

        $customer = $this->input->post('supplier');
        $trans_type = $this->input->post('trans_type');
        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        $data['customer'] = $this->supplier_model->details($customer);

        $data['list'] = $this->reports_model->get_supplier_statements($customer, $trans_type, $sdate, $edate);

        $loc = location($this->aauth->get_user()->loc);
        $company = '<strong>' . $loc['cname'] . '</strong><br>' . $loc['address'] . '<br>' . $loc['city'] . ', ' . $loc['region'] . '<br>' . $loc['country'] . ' -  ' . $loc['postbox'] . '<br>' . $this->lang->line('Phone') . ': ' . $loc['phone'] . '<br> ' . $this->lang->line('Email') . ': ' . $loc['email'];
        if ($loc['taxid']) $company .= '<br>' . $this->lang->line('Tax') . ' ID: ' . $loc['taxid'];
        $data['lang']['company'] = $company;

        $html = $this->load->view('supplier/statementpdf', $data, true);

        ini_set('memory_limit', '64M');

        $this->load->library('pdf');
        $pdf = $this->pdf->load();

        $pdf->WriteHTML($html);

        $pdf->Output('Statement' . $customer . '.pdf', 'D');


    }

    function taxstatement()
    {


        $head['title'] = "Export TAX Report";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('export/taxstatement');
        $this->load->view('fixed/footer');


    }

    function taxstatement_o()
    {
        $whr = '';
        $whr2 = '';
        if ($this->aauth->get_user()->loc) {
            $whr = " AND te_invoices.loc='" . $this->aauth->get_user()->loc . "';";
            $whr2 = " AND te_purchase.loc='" . $this->aauth->get_user()->loc . "';";
        } elseif (!BDATA) {
            $whr = " AND te_invoices.loc='0';";
            $whr2 = " AND te_purchase.loc='0';";
        }

        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        $trans_type = $this->input->post('ty');
        $prefix = $this->config->item('prefix') . '-';
        $curr = $this->config->item('currency') . ' ';

        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=tax_transactions_' . $this->date . '..csv');
        header('Content-Transfer-Encoding: binary');


        echo "\xEF\xBB\xBF"; // Byte Order Mark


        if ($trans_type == 'Sales') {
            $where = " WHERE (DATE(te_invoices.invoicedate) BETWEEN '$sdate' AND '$edate') $whr";
            $query = $this->db->query("SELECT te_customers.taxid AS TAX_Number,concat('$prefix',te_invoices.tid) AS invoice_number,concat('$curr',te_invoices.total) AS amount,te_invoices.shipping AS shipping,te_invoices.ship_tax AS ship_tax,te_invoices.ship_tax_type AS ship_tax_type,te_invoices.discount AS discount,te_invoices.tax AS tax,te_invoices.pmethod AS payment_method,te_invoices.status AS status,te_invoices.refer AS referance,te_customers.name AS customer_name,te_customers.company AS Company_Name,te_invoices.invoicedate AS date FROM te_invoices LEFT JOIN te_customers ON te_invoices.csd=te_customers.id" . $where);

            echo $this->dbutil->csv_from_result($query);

        } else {

            $where = " WHERE (DATE(te_purchase.invoicedate) BETWEEN '$sdate' AND '$edate') $whr";
            $query = $this->db->query("SELECT concat('$prefix',te_purchase.tid) AS receipt_number,concat('$curr',te_purchase.total) AS amount,te_purchase.tax AS tax,te_supplier.name AS supplier_name,te_supplier.company AS Company_Name,te_purchase.invoicedate AS date FROM te_purchase LEFT JOIN te_supplier ON te_purchase.csd=te_supplier.id" . $where);

            echo $this->dbutil->csv_from_result($query);

        }


    }

    function people_products()
    {


        $this->load->model('transactions_model');
        $data['accounts'] = $this->transactions_model->acc_list();
        $head['title'] = "Export Product Transactions";
        $head['usernm'] = $this->aauth->get_user()->username;
        $this->load->view('fixed/header', $head);
        $this->load->view('export/product', $data);
        $this->load->view('fixed/footer');


    }


    function cust_products_o()
    {
        $this->load->model('reports_model');
        $this->load->model('customers_model');

        $customer = $this->input->post('customer');

        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        $data['customer'] = $this->customers_model->details($customer);


        $data['list'] = $this->reports_model->product_customer_statements($customer, $sdate, $edate);


        $html = $this->load->view('customers/cust_prod_pdf', $data, true);


        ini_set('memory_limit', '64M');


        $this->load->library('pdf');

        $pdf = $this->pdf->load();


        $pdf->WriteHTML($html);


        $pdf->Output('Statement' . $customer . '.pdf', 'D');


    }

    function sup_products_o()
    {
        $this->load->model('reports_model');
        $this->load->model('supplier_model');

        $customer = $this->input->post('supplier');

        $sdate = datefordatabase($this->input->post('sdate'));
        $edate = datefordatabase($this->input->post('edate'));
        $data['customer'] = $this->supplier_model->details($customer);


        $data['list'] = $this->reports_model->product_supplier_statements($customer, $sdate, $edate);

        $html = $this->load->view('supplier/supp_prod_pdf', $data, true);


        ini_set('memory_limit', '64M');


        $this->load->library('pdf');

        $pdf = $this->pdf->load();


        $pdf->WriteHTML($html);


        $pdf->Output('Statement' . $customer . '.pdf', 'I');


    }


}