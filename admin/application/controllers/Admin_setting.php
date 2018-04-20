<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_setting extends CI_Controller
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
    	$data['admin_setting']=$this->user->adminSetting();
    	$this->load->view('Admin_setting',$data);
    }
	function update()
    {
    	if(isset($_POST['product1']))
        {
        	$product1=$_POST['product1'];
        }
    	$data=array('setting_value'=>$product1);
		$this->db->where('Setting_name','product1price');
		$this->db->update('admin_setting',$data);
    	if(isset($_POST['product2']))
        {
        	$product2=$_POST['product2'];
        }
    	$data=array('setting_value'=>$product2);
		$this->db->where('Setting_name','product2price');
		$this->db->update('admin_setting',$data);
    	if(isset($_POST['product3']))
        {
        	$product3=$_POST['product3'];
        }
    	$data=array('setting_value'=>$product3);
		$this->db->where('Setting_name','product3price');
		$this->db->update('admin_setting',$data);
    	if(isset($_POST['product4']))
        {
        	$product4=$_POST['product4'];
        }
    	$data=array('setting_value'=>$product4);
		$this->db->where('Setting_name','product4price');
		$this->db->update('admin_setting',$data);
    	if(isset($_POST['product5']))
        {
        	$product5=$_POST['product5'];
        }
    	$data=array('setting_value'=>$product5);
		$this->db->where('Setting_name','product5price');
		$this->db->update('admin_setting',$data);
    	if(isset($_POST['product6']))
        {
        	$product6=$_POST['product6'];
        }
    	$data=array('setting_value'=>$product6);
		$this->db->where('Setting_name','product6price');
		$this->db->update('admin_setting',$data);
    	if($_POST['exchangerate'])
        {
        	$exchangerate=$_POST['exchangerate'];
        }
    	$data=array('setting_value'=>$exchangerate);
		$this->db->where('Setting_name','transfer_exchange');
		$this->db->update('admin_setting',$data);
    	
    	echo "<script>alert('Details updated succefully '); window.location = 'https://tejcoin.com/admin/Admin_setting/';</script>";
    }
}