<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Paypal extends CI_Controller
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
    	//$data['sellrequest']=$this->user->sellrequest("Paypal");
    	//$this->load->view('Paypal',$data);
    
    	$banksellrequest=$this->user->sellrequest("Paypal");
    	$masterarray=array();
    	$i=0;
    	foreach($banksellrequest as $row)
        {
        	$array=(array)$row;
        	$usermailid=$array['User_email'];
    		$userbankdetails=$this->user->userdetails($usermailid);
        	$userbankdetails=(array)$userbankdetails[0];
        	$array['userDetails']=$userbankdetails;
        	$masterarray[$i]=$array;
        }
    	$data['sellrequest'] = $masterarray;
    	$this->load->view('Paypal',$data);
    }
	function confirm()
    {	
    	$email=$_GET['email'];
    	$id=$_GET['id'];
    	$update=array("Status"=>"Success");
    	$this->db->where('User_email',$email);
    	$this->db->where('id',$id);
		$this->db->update('sellTejRequest',$update);
    }
}