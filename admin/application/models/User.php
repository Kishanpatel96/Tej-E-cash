<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{
    function __construct() {
    }
	function userdetails($emailid)
    {
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('User_email',$emailid); 
    	$query = $this->db->get();
		return $query->result();
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
	function UserEmail($uid)
    {
    	$this->db->select('User_Email');
		$this->db->from('User_Kyc');
		$this->db->where('id',$uid); 
    	$query = $this->db->get();
		return $query->result();
    }
	function adminSetting()
    {
    	$this->db->select('*');
		$this->db->from('admin_setting'); 
    	$query = $this->db->get();
		return $query->result();
    }
	function UserKycDetails($uid)
    {
    	$this->db->select('*');
		$this->db->from('User_Kyc');
		$this->db->where('id',$uid); 
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
	function shoopingDetails()
    {
    	$this->db->select('*');
		$this->db->from('User_shopping_details');
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
	function fetchbankdetailsstatus($UserEmail)
    {
    	$this->db->select('Bank_Details');
		$this->db->from('users');
		$this->db->where('User_email',$UserEmail); 
    	$query = $this->db->get();
		return $query->result();
    }
	function usertransactiondetails()
    {
    	$this->db->select('*');
		$this->db->from('transaction_history');
    	$this->db->order_by('Transaction_Date',"desc");
    	$query = $this->db->get();
		return $query->result();
    }
	function AllUserKycDetails()
    {
    	$this->db->select('*');
		$this->db->from('User_Kyc');
		$this->db->where('Status',"Pending"); 
    	$query = $this->db->get();
		return $query->result();
    }
	function sellrequest($waytogetback)
	{
    	$this->db->select('*');
		$this->db->from('sellTejRequest');
		$this->db->where('Status',"Pending"); 
		$this->db->where('Way',$waytogetback); 
    	$query = $this->db->get();
		return $query->result();
    }
	function userbankdetails()
    {
    	$this->db->select('*');
		$this->db->from('Bank_Details');
    	$query = $this->db->get();
		return $query->result();
    }
	function oneuserbankdetails($emailid)
    {
    	$this->db->select('*');
		$this->db->from('Bank_Details');
    	$this->db->where('User_email',$emailid); 
    	$query = $this->db->get();
		return $query->result();
    }
	function AllUserDetails()
    {
    	$this->db->select('*');
		$this->db->from('users');
    	$this->db->order_by('Account_created',"desc");
    	$query = $this->db->get();
		return $query->result();
    }
}