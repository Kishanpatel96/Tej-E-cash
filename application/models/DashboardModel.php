<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DashboardModel extends CI_Model{
    function __construct() {
    }
    public function UserBalance($userEmail){
    	$this->db->select('Balance');
		$this->db->from('users');
		$this->db->where('User_email',$userEmail); //here we have to set dynamic variable in which google or facebook Id or session variable come
    	$query = $this->db->get();
		return $query->result();
    }
	function Admincommission()
    {
    	$this->db->select('setting_value');
		$this->db->from('admin_setting');
		$this->db->where('Setting_name','transfer_exchange'); //here we have to set dynamic variable in which google or facebook Id or session variable come
    	$query = $this->db->get();
		return $query->result();
    }
	function UserDetails($userEmail)
    {
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('User_email',$userEmail); //here we have to set dynamic variable in which google or facebook Id or session variable come
    	$query = $this->db->get();
		return $query->result();
    }
	function UserPassword($userEmail)
    {
    	$this->db->select('Password');
		$this->db->from('users');
		$this->db->where('User_email',$userEmail); //here we have to set dynamic variable in which google or facebook Id or session variable come
    	$query = $this->db->get();
		return $query->result();
    }
	function CheckingUserExists($userEmail)
    {
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('User_email',$userEmail); //here we have to set dynamic variable in which google or facebook Id or session variable come
    	$query = $this->db->get();
		return $query->result();
    }
	function AllTransactionDetails($UserEmail)
    {
    	$this->db->select('*');
		$this->db->from('transaction_history');
		$this->db->where('Sender_Email',$UserEmail);
    	$this->db->order_by('Transaction_Date',"desc");
    	$this->db->limit(5);
    	$query = $this->db->get();
		return $query->result();
    }
	function bankdetails($UserEmail)
    {
    	$this->db->select('Bank_Details');
    	$this->db->from('users');
		$this->db->where('User_email',$UserEmail);
    	$query = $this->db->get();
		return $query->result();
    }
}