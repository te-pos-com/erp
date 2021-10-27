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

class Projects_model extends CI_Model
{

    var $column_order = array('te_projects.status', 'te_projects.name', 'te_projects.edate', 'te_projects.worth', null);
    var $column_search = array('te_projects.name', 'te_projects.edate', 'te_projects.status');
    var $tcolumn_order = array('status', 'name', 'duedate', 'start', null, null);
    var $tcolumn_search = array('name', 'edate', 'status');
    var $order = array('id' => 'desc');


    public function explore($id)
    {
        $this->db->select('te_projects.id AS prj');
        $this->db->from('te_projects');
        $this->db->where('te_projects.id', $id);
        $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
        $this->db->where('te_project_meta.meta_key', 2);
        $this->db->where('te_project_meta.meta_data=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

        $query = $this->db->get();
        $result = $query->row_array();

        if ($result['prj'] == $id) {
//project
            $this->db->select('te_projects.*,te_customers.name AS customer,te_customers.email');
            $this->db->from('te_projects');
            $this->db->where('te_projects.id', $id);
            $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
            $this->db->where('te_project_meta.meta_key=', 2);
            $this->db->where('te_project_meta.meta_data=', 'true');
            $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
            $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');
            $query = $this->db->get();
            $project = $query->row_array();

            //employee

            $this->db->select('te_employees.name');
            $this->db->from('te_project_meta');
            $this->db->where('te_project_meta.pid', $id);
            $this->db->where('te_project_meta.meta_key', 6);
            $this->db->join('te_employees', 'te_project_meta.meta_data = te_employees.id', 'left');
            $query = $this->db->get();
            $employee = $query->result_array();

            //invoices
            $this->db->select('te_invoices.*');
            $this->db->from('te_project_meta');
            $this->db->where('te_project_meta.pid', $id);
            $this->db->where('te_project_meta.meta_key', 11);
            $this->db->join('te_invoices', 'te_project_meta.meta_data = te_invoices.id', 'left');
            $query = $this->db->get();
            $invoices = $query->result_array();

            return array('project' => $project, 'employee' => $employee, 'invoices' => $invoices);
        }

    }

    public function details($id)
    {
//project
        $this->db->select('te_projects.id AS prj');
        $this->db->from('te_projects');
        $this->db->where('te_projects.id', $id);
        $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
        $this->db->where('te_project_meta.meta_key', 2);
        $this->db->where('te_project_meta.meta_data=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

        $query = $this->db->get();
        $result = $query->row_array();


        if ($result['prj'] == $id) {
            $this->db->select('te_projects.*,te_projects.id AS prj, te_customers.name AS customer,te_project_meta.*');

            $this->db->from('te_projects');
            $this->db->where('te_projects.id', $id);
            $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
            $this->db->where('te_project_meta.meta_key', 2);
            $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
            $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

            $query = $this->db->get();
            return $query->row_array();
        }
    }

    private function _project_datatables_query($cday = '')
    {
        $this->db->select('te_projects.*,te_customers.name AS customer');
        $this->db->from('te_projects');
        $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
        $this->db->where('te_project_meta.meta_key=', 2);
        $this->db->where('te_project_meta.meta_data=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');
        if ($cday) {
            $this->db->where('DATE(te_projects.edate)=', $cday);
        }


        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            $search = $this->input->post('search');
            $value = $search['value'];
            if ($value) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $value);
                } else {
                    $this->db->or_like($item, $value);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        $search = $this->input->post('order');
        if ($search) {
            $this->db->order_by($this->column_order[$search['0']['column']], $search['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function project_datatables($cday = '')
    {


        $this->_project_datatables_query($cday);

        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }

    function project_count_filtered($cday = '')
    {
        $this->_project_datatables_query($cday);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function project_count_all($cday = '')
    {
        $this->_project_datatables_query($cday);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function project_stats($project)
    {

        $query = $this->db->query("SELECT
				COUNT(IF( status = 'Waiting', id, NULL)) AS Waiting,
				COUNT(IF( status = 'Progress', id, NULL)) AS Progress,
				COUNT(IF( status = 'Finished', id, NULL)) AS Finished			
				FROM te_projects WHERE cid='" . $this->session->userdata('user_details')[0]->cid . "'");

        echo json_encode($query->result_array());

    }

    //project tasks

    private function _task_datatables_query($cday = '')
    {

        $this->db->from('te_todolist');
        $this->db->where('related', 1);
        if ($cday) {

            $this->db->where('rid=', $cday);
        }


        $i = 0;

        foreach ($this->tcolumn_search as $item) // loop column
        {
            $search = $this->input->post('search');
            $value = $search['value'];
            if ($value) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $value);
                } else {
                    $this->db->or_like($item, $value);
                }

                if (count($this->tcolumn_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        $search = $this->input->post('order');
        if ($search) {
            $this->db->order_by($this->tcolumn_order[$search['0']['column']], $search['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function task_datatables($cday = '')
    {


        $this->_task_datatables_query($cday);

        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $this->db->where('related', 1);
        $this->db->where('rid=', $cday);
        $query = $this->db->get();
        return $query->result();
    }

    function task_count_filtered($cday = '')
    {
        $this->_task_datatables_query($cday);
        $this->db->where('related', 1);
        $this->db->where('rid=', $cday);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function task_count_all($cday = '')
    {
        $this->_task_datatables_query($cday);
        $this->db->where('related', 1);
        $this->db->where('rid=', $cday);
        $query = $this->db->get();
        return $query->num_rows();
    }

    //thread task


    public function task_thread($id)
    {

        $this->db->select('te_projects.id AS prj');
        $this->db->from('te_projects');
        $this->db->where('te_projects.id', $id);
        $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
        $this->db->where('te_project_meta.meta_key', 2);
        $this->db->where('te_project_meta.meta_data=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

        $query = $this->db->get();
        $result = $query->row_array();

        if ($result['prj'] == $id) {
            $this->db->select('te_todolist.*, te_employees.name AS emp');
            $this->db->from('te_todolist');
            $this->db->where('te_todolist.related', 1);
            $this->db->where('te_todolist.rid', $id);
            $this->db->join('te_employees', 'te_todolist.eid = te_employees.id', 'left');
            $this->db->order_by('te_todolist.id', 'desc');
            $query = $this->db->get();
            return $query->result_array();
        }
    }


    public function milestones($id)
    {

        $this->db->select('te_projects.id AS prj');
        $this->db->from('te_projects');
        $this->db->where('te_projects.id', $id);
        $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
        $this->db->where('te_project_meta.meta_key', 2);
        $this->db->where('te_project_meta.meta_data=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

        $query = $this->db->get();
        $result = $query->row_array();

        if ($result['prj'] == $id) {
            $this->db->select('*');

            $this->db->from('te_milestones');
            $this->db->where('pid', $id);
            $this->db->order_by('id', 'desc');
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function milestones_list($id)
    {

        $this->db->select('te_projects.id AS prj');
        $this->db->from('te_projects');
        $this->db->where('te_projects.id', $id);
        $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
        $this->db->where('te_project_meta.meta_key', 2);
        $this->db->where('te_project_meta.meta_data=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

        $query = $this->db->get();
        $result = $query->row_array();


        if ($result['prj'] == $id) {
            $query = $this->db->query('SELECT te_milestones.*,te_todolist.name as task FROM te_milestones LEFT JOIN te_project_meta ON te_project_meta.meta_data=te_milestones.id AND te_project_meta.meta_key=8 LEFT JOIN te_todolist ON te_project_meta.value=te_todolist.id WHERE te_milestones.pid=' . $id . ' ORDER BY te_milestones.id DESC;');
            return $query->result_array();
        }


    }


    public function p_files($id)
    {

        $this->db->select('te_projects.id AS prj');
        $this->db->from('te_projects');
        $this->db->where('te_projects.id', $id);
        $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
        $this->db->where('te_project_meta.meta_key', 2);
        $this->db->where('te_project_meta.meta_data=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

        $query = $this->db->get();
        $result = $query->row_array();


        if ($result['prj'] == $id) {
            $this->db->select('*');
            $this->db->from('te_project_meta');
            $this->db->where('pid', $id);
            $this->db->where('meta_key', 9);
            $query = $this->db->get();
            return $query->result_array();
        }
    }


    //comments

    public function comments_thread($id)
    {

        $this->db->select('te_projects.id AS prj');
        $this->db->from('te_projects');
        $this->db->where('te_projects.id', $id);
        $this->db->where('te_projects.cid=', $this->session->userdata('user_details')[0]->cid);
        $this->db->where('te_project_meta.meta_key', 2);
        $this->db->where('te_project_meta.value=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

        $query = $this->db->get();
        $result = $query->row_array();


        if ($result['prj'] == $id) {
            $this->db->select('te_project_meta.value, te_project_meta.key3,te_employees.name AS employee, te_customers.name AS customer');

            $this->db->from('te_project_meta');
            $this->db->where('te_project_meta.pid', $id);
            $this->db->where('te_project_meta.meta_key', 13);
            $this->db->join('te_employees', 'te_project_meta.meta_data = te_employees.id', 'left');
            $this->db->join('te_customers', 'te_project_meta.key3 = te_customers.id', 'left');
            $this->db->order_by('te_project_meta.id', 'desc');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function add_comment($comment, $prid, $cust)
    {

        $this->db->select('te_projects.*,te_projects.id AS prj, te_customers.name AS customer,te_project_meta.*');
        $this->db->from('te_projects');
        $this->db->where('te_projects.id', $prid);
        $this->db->where('te_projects.cid=', $cust);
        $this->db->where('te_project_meta.meta_key', 2);
        $this->db->where('te_project_meta.value=', 'true');
        $this->db->join('te_customers', 'te_projects.cid = te_customers.id', 'left');
        $this->db->join('te_project_meta', 'te_project_meta.pid = te_projects.id', 'left');

        $query = $this->db->get();
        $result = $query->row_array();

        if ($result['prj'] == $prid) {

            $data = array('pid' => $prid, 'meta_key' => 13, 'key3' => $cust, 'value' => $comment . '<br><small>@' . date('Y-m-d H:i:s') . '</small>');
            if ($prid) {
                return $this->db->insert('te_project_meta', $data);
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }


}