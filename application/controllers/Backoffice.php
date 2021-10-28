<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {
	public function index()
	{
        $this->load->view('admin/include/header.php');
        $this->load->view('admin/include/menu.php');
		$this->load->view('admin/index.php');
        $this->load->view('admin/include/footer.php');

	}
}
