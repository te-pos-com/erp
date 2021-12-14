<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function public_key()
    {
     $this->db->select('key1 AS recaptcha_p,key2 AS captcha,url AS recaptcha_s,method AS bank,other AS acid,active AS ext1');
        $this->db->from('univarsal_api');
        $this->db->where('id', 53);
        $query = $this->db->get();
        return $query->row();
    }

        public function send_email($mailto, $mailtotitle, $subject, $message, $attachmenttrue = false, $attachment = '')
    {
        $this->load->library('ultimatemailer');
        $this->db->select('host,port,auth,auth_type,username,password,sender');
        $this->db->from('te_smtp');
        $query = $this->db->get();
        $smtpresult = $query->row_array();
        $host = $smtpresult['host'];
        $port = $smtpresult['port'];
        $auth = $smtpresult['auth'];
		$auth_type = $smtpresult['auth_type'];
        $username = $smtpresult['username'];;
        $password = $smtpresult['password'];
        $mailfrom = $smtpresult['sender'];
        $mailfromtilte = $this->config->item('ctitle');

        $this->ultimatemailer->bin_send($host, $port, $auth, $auth_type, $username, $password, $mailfrom, $mailfromtilte, $mailto, $mailtotitle, $subject, $message, $attachmenttrue, $attachment);

    }


}