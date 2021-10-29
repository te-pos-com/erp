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
		$this->load->model('Pembayaranlangganan_model', 'pembayaranlangganan');
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
		$id_pembayaran = "";
		if (!empty(base64_decode($this->input->get('id')))){
			$id_pembayaran = base64_decode($this->input->get('id'));
		}
		$data['idpembayaran'] = $id_pembayaran;
        $head['usernm'] = $this->aauth->get_user()->username;
        $data['langganan'] = $this->langganan_model->langganandetail_list($id_langganan);
        $head['title'] = 'Langganan | Checkout';
        $this->load->view('fixed/header', $head);
        $this->load->view('langganan/checkout', $data);
        $this->load->view('fixed/footer');
    }

    public function token()
    {

		$orderid=rand();
		$transaction_details = array(
		  'order_id' => $orderid,
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
		if ($this->input->post('id_pembayaran')=="" || empty($this->input->post('id_pembayaran'))){
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
				'order_id'=>$orderid,
				'status'=>0
			);
			$this->db->insert('te_pembayaran', $langganan);
		}
		else{
			$langganan = array(
				'tokon_midtrans'=>$snapToken,
				'tanggal'=>$tglexpired,
				'durasi_langganan'=>$this->input->post('durasi_langganan'),
				'order_id'=>$orderid,
			);
			$this->db->set($langganan);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('te_pembayaran');
		}
		echo $snapToken;
    }          
	
	
	function berhasil(){
		$langganan = array(
			'status'=>1
		);
		$this->db->set($langganan);
		$this->db->where('token_midtrans', $this->input->get('id'));
		$this->db->update('te_pembayaran');
		redirect('/langganan/', 'refresh');
	}         

	function gagal(){
		redirect('/langganan/', 'refresh');
	}
	
	public function langganan_list()
    {
        $catid = $this->input->get('id');
        $sub = $this->input->get('sub');

		$list = $this->pembayaranlangganan->get_datatables($catid, '', $sub);
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $prd) {
			if ($prd->status==0){
				$status="Belum Dibayar";
			}
			else{
				$status="Dibayar";
			}

            $no++;
            $row = array();
            $row[] = $no;
            $id = $prd->id;
            $row[] = $prd->username;
            $row[] = $prd->phone;
            $row[] = 'Rp '. number_format($prd->nominal_langganan);
            $row[] = $prd->durasi_langganan . ' Bulan';
            $row[] = $status;
			if ($prd->status==0){
			$row[] = '<button type="button" class="btn btn btn-primary dropdown-toggle   btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-cog"></i>  </button>
					  <div class="dropdown-menu">
						&nbsp;<a href="' . base_url() . 'langganan/checkout?i=' . base64_encode($prd->id_langganan) . '&id='. base64_encode($prd->id) .'"  class="btn btn-purple btn-sm">Bayar</a><div class="dropdown-divider"></div>&nbsp;<a href="#" data-object-id="' . $id . '" class="btn btn-danger btn-sm  delete-object"><span class="fa fa-trash"></span>Hapus</a>
					  </div>';
			}
			$row[] ="";
            $data[] = $row;
        }
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->pembayaranlangganan->count_all($catid, '', $sub),
            "recordsFiltered" => $this->pembayaranlangganan->count_filtered($catid, '', $sub),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}