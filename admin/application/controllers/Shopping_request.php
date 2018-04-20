<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Shopping_request extends CI_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->model('user');
    	$this->load->library('email');
		$this->load->helper('string');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form'); 
		$this->load->helper('cookie');
    	$sessionUsername = $this->session->userdata('UserEmail');
		if(!isset($sessionUsername)){
			redirect(base_url());
		}
    }
	function index()
    {
    	$data['shoopingDetails']=$this->user->shoopingDetails();
    	$this->load->view('Shopping_request',$data);
    }
}