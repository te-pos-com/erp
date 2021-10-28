<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Langganan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("Aauth");
        if (!$this->aauth->is_loggedin()) {
            redirect('/user/', 'refresh');
        }

        if (!$this->aauth->premission(5)) {

            exit('<h3>Sorry! You have insufficient permissions to access this section</h3>');

        }
        $this->load->model('langganan_model');
        $this->li_a = 'langganan';
        $params = array('server_key' => 'SB-Mid-server-zy4-GhDK9h0CQLk5xjbY22AR', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
    }

	public function index()
    {
        $head['usernm'] = $this->aauth->get_user()->username;
        $data['langganan'] = $this->langganan_model->langganan_list();
        $head['title'] = 'Langganan';
        $this->load->view('fixed/header', $head);
        $this->load->view('langganan/list_langganan', $data);
        $this->load->view('fixed/footer');
    }
    public function addlangganan()
    {
        $head['usernm'] = $this->aauth->get_user()->username;
        $data['langganan'] = $this->langganan_model->langganan_list();
        $head['title'] = 'Langganan';
        $this->load->view('fixed/header', $head);
        $this->load->view('langganan/list', $data);
        $this->load->view('fixed/footer');
    }
    
    public function checkout()
    {
        $id_langganan = base64_decode($this->input->get('i'));
        $head['usernm'] = $this->aauth->get_user()->username;
        $data['langganan'] = $this->langganan_model->langganandetail_list($id_langganan);
        $head['title'] = 'Langganan | Checkout';
        $this->load->view('fixed/header', $head);
        $this->load->view('langganan/checkout', $data);
        $this->load->view('fixed/footer');
    }

    public function token()
    {

		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $this->input->post('nominal'), // no decimal allowed for creditcard
		);

		$item1_details = array(
		  'id' => 'a1',
		  'price' => $this->input->post('nominal'),
		  'quantity' => 1,
		  'name' => $this->input->post('paket')
		);

		$item_details = array ($item1_details);

		$customer_details = array(
		  'first_name'    => $this->input->post('nama'),
		  'last_name'     => "",
		  'email'         => $this->input->post('email'),
		  'phone'         => $this->input->post('phone'),
		);

		$transaction = array(
		  'transaction_details' => $transaction_details,
		  'customer_details' => $customer_details,
		  'item_details' => $item_details,
		);

		$snapToken = $this->midtrans->getSnapToken($transaction);
		error_log($snapToken);

		$masatrial = 30*$this->input->post('durasi_langganan');
		$tglinstal = date('Y-m-d');
		$today = strtotime($tglinstal);
		$tglexpired = date("Y-m-d", strtotime("+".$masatrial." days", $today));
		
		$langganan = array(
			'loc'=> $this->aauth->get_user()->loc,
			'id_langganan'=>$this->input->post('id_langganan'),
			'id_user'=> $this->aauth->get_user()->id,
			'nominal_langganan'=>$this->input->post('nominal'),
			'alamat'=>$this->input->post('alamat'),
			'tokon_midtrans'=>$snapToken,
			'tanggal'=>$tglexpired,
			'durasi_langganan'=>$this->input->post('durasi_langganan'),
			'email'=>$this->input->post('email'),
			'phone'=>$this->input->post('phone'),
			'username'=>$this->input->post('nama'),
			'status'=>0
		);
		$this->db->insert('te_pembayaran', $langganan);
		echo $snapToken;
    }           
	function berhasil(){

	}                                        
}