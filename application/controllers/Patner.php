<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patner extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model');
		$this->load->model('user_model');
		$this->load->model('setting_model');
    }
	public function index()
	{
		$data['patner'] = $this->pelanggan_model->patner_list();
		$data['setting'] = $this->setting_model->setting_list();
		$data['pelanggan'] = $this->pelanggan_model->pelanggan_list();
		$data['pelanggan_baru'] = $this->pelanggan_model->pelangganbaru_list();
        $this->load->view('patner.php',$data);

	}
}
