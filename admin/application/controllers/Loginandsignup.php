<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Loginandsignup extends CI_Controller
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
    }

    public function login(){
    	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
    	{
    	//your site secret key
        $secret = '6LeqNVAUAAAAANk1H5XRqHC1j6L-l5lECD9gCihX';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
         $responseData = json_decode($verifyResponse);
          if($responseData->success)
          {
       		$status="OK";
       		$msg="";
       		if($_POST['UserEmail'])
       		{
       	   		$UserEmail=$_POST['UserEmail'];
       		}
       		if($_POST['UserPassword'])
       		{
       	   		$UserPassword=$_POST['UserPassword'];
       		}
	   		if(!filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
  				$status="NOTOK";
       			echo "<script>alert('Invalid email format'); window.location = 'https://tejcoin.com/admin';</script>"; 
	   		}
       		if(strlen($UserPassword) < 7)
       		{	
       			$status="NOTOK";
       			echo "<script>alert('Password must be above 7 characters'); window.location = 'https://tejcoin.com/admin';</script>";
       		}
    		if($status=="OK")
        	{
        		if($UserEmail == "kishanpatelbca96@gmail.com" && $UserPassword=="12345678")
            	{
            		$this->session->set_userdata('UserEmail',$UserEmail);
            		redirect(base_url().'dashboard');
            	}
        		else
            	{
            		echo "<script>alert('Password and email address is wrong'); window.location = 'https://tejcoin.com/admin';</script>";
            	}
        	}
          	}
        else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com/admin';</script>";
    	}
    }
     else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com/admin';</script>";
    	}
    }
	 public function logout() {
        // Remove local Facebook session
        // Remove user data from session
        $this->session->unset_userdata('UserEmail');
        // Redirect to login page
     	redirect(base_url().'welcome');
    }
}