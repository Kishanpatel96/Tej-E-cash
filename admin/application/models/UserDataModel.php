<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserDataModel extends CI_Model{
    function __construct() {
    }
    public function FecthingUserData(){
    	$userIdFromSession=$this->session->userdata('username');
		$UserId=$userIdFromSession['oauth_uid'];
    	$Oauth_provider=$userIdFromSession['oauth_provider']; 
    	$this->db->select('*');
		$this->db->from('users');
		$this->db->where('oauth_provider',$Oauth_provider); //here we have to set dynamic variable in which google or facebook come
		$this->db->where('oauth_uid',$UserId); //here we have to set dynamic variable in which google or facebook Id or session variable come
    	$query = $this->db->get();
		return $query->result();
    }
}