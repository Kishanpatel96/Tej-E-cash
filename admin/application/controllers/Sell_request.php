<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Sell_request extends CI_Controller
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
    	$banksellrequest=$this->user->sellrequest("Bank");
    	$masterarray=array();
    	$i=0;
    	foreach($banksellrequest as $row)
        {
        	$array=(array)$row;
        	$usermailid=$array['User_email'];
    		$userbankdetails=$this->user->userbankdetails($usermailid);
        	$userbankdetails=(array)$userbankdetails[0];
        	$array['bankdetails']=$userbankdetails;
        	$masterarray[$i]=$array;
        }
    	$data['sellrequest'] = $masterarray;
    	$this->load->view('Sell_request',$data);
    }
	function abc()
    {
    	if(isset($_POST['amountoftej']))
        {
        	$amount=$_POST['amountoftej'];
        }
    	if(isset($_POST['email']))
        {
        	$email=$_POST['email'];
        }
    	$InsertArray=array("Status"=>"Success");
    	$this->db->where('User_email',$email);
    	$this->db->where('Amount',$amount);
    	$this->db->where('Way',"Bank");
    	$this->db->update('sellTejRequest',$InsertArray);
        echo "<script>alert('Done !');window.location = 'https://tejcoin.com/admin/Sell_request/';</script>";
    }
}