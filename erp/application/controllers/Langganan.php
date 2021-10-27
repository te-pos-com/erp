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
		  'gross_amount' => 1000, // no decimal allowed for creditcard
		);

		$item1_details = array(
		  'id' => 'a1',
		  'price' => 1000,//$this->input->post('nominal'),
		  'quantity' => 1,
		  'name' => "priyo subarkah"//$this->input->post('paket')
		);

		$item_details = array ($item1_details);

		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		$customer_details = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'email'         => "andri@litani.com",
		  'phone'         => "081122334455",
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		$transaction = array(
		  'transaction_details' => $transaction_details,
		  'customer_details' => $customer_details,
		  'item_details' => $item_details,
		);

		$snapToken = $this->midtrans->getSnapToken($transaction);
		error_log($snapToken);
		echo $snapToken;
    }                                                   
}