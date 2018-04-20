<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    function __construct() {
    }
	function loginDetails($UserEmail,$UserPassword)
    {
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('User_email',$UserEmail); 
		$this->db->where('Password',$UserPassword); 
    	$query = $this->db->get();
		return $query->result();
    }
	function AvailableEmail($UserEmail)
    {
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('User_email',$UserEmail); 
    	$query = $this->db->get();
		return $query->result();
    }
	function AllTransactionDetails($UserEmail)
    {
    	$this->db->select('*');
		$this->db->from('transaction_history');
		$this->db->where('Sender_Email',$UserEmail);
    	$this->db->order_by('Transaction_Date',"desc");
    	$query = $this->db->get();
		return $query->result();
    }
	function fetchkycstatus($UserEmail)
    {
    	$this->db->select('Kyc_details');
		$this->db->from('users');
		$this->db->where('User_email',$UserEmail); 
    	$query = $this->db->get();
		return $query->result();
    }
	function productprice($Productnumber)
    {
    	$this->db->select('setting_value');
		$this->db->from('admin_setting');
		$this->db->where('Setting_name',$Productnumber); 
    	$query = $this->db->get();
		return $query->result();
    }
	function fetchbankdetailsstatus($UserEmail)
    {
    	$this->db->select('Bank_Details');
		$this->db->from('users');
		$this->db->where('User_email',$UserEmail); 
    	$query = $this->db->get();
		return $query->result();
    }
	function fetchbankdetails($userEmail)
    {
    	$this->db->select('*');
		$this->db->from('Bank_Details');
		$this->db->where('User_email',$userEmail); 
    	$query = $this->db->get();
		return $query->result();
    }
}