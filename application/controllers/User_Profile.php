<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Profile extends CI_Controller {
		function __construct() {
        parent::__construct(); 
        $this->load->helper('url');
        $this->load->model('DashboardModel');
		$this->load->library('session');
		$this->load->model('User');
		$this->load->helper('form'); 
        $this->load->helper('cookie');
        $this->load->library('email');
		$this->load->helper('string');
		$this->load->library('form_validation');
        //starting session for logged in users
		$sessionUsername = $this->session->userdata('UserEmail');
		if(!isset($sessionUsername)){
			redirect(base_url());
		}
    }
	 public function index(){
     	$sessionUsername = $this->session->userdata('UserEmail');
    	$userdata['balance']=$this->DashboardModel->UserBalance($sessionUsername);
        $userdata['userdata'] = $this->User->AvailableEmail($sessionUsername);
        $this->load->view('User_Profile',$userdata);
    }
	public function profile_update()
    {
    	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
    	{
    	//your site secret key
        $secret = '6LeqNVAUAAAAANk1H5XRqHC1j6L-l5lECD9gCihX';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
         $responseData = json_decode($verifyResponse);
          if($responseData->success)
          {
    	//checking All the Field Are Set START--->>
    	if(isset($_POST['First_name']))
        {
        	$firstName=$_POST['First_name'];
        }
    	if(isset($_POST['Last_name']))
        {
        	$lastName=$_POST['Last_name'];
        }
    	if(isset($_POST['string']))
        {
        	$cookieValueFromForm=$_POST['string'];
        }
    	if(isset($_POST['EmailAddress']))
        {
        	$EmailAddress=$_POST['EmailAddress'];
        }
    	if(isset($_POST['Phonenumber']))
        {
        	$Phonenumber=$_POST['Phonenumber'];
        }
    	if(isset($_POST['Country']))
        {
        	$Country=$_POST['Country'];
        }
    	if(isset($_POST['City']))
        {
        	$City=$_POST['City'];
        }
    	//checking All the Field Are Set END--->>
    	$status="OK";
    	$error_msg="";
    	//Checking IP of User start
        	$ip_address_from_user_system = "";
        	if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    		{
      			$ip_address_from_user_system=$_SERVER['HTTP_CLIENT_IP'];
    		}
    		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    		{
      			$ip_address_from_user_system=$_SERVER['HTTP_X_FORWARDED_FOR'];
    		}
    		else
    		{
      			$ip_address_from_user_system=$_SERVER['REMOTE_ADDR'];
    		}
       		 //checking IP of User END
    		//Validation START---->>>>>
    		if(!preg_match('/^[a-zA-Z0-9 _]*$/',$City)) { 
            	$status="NOTOK";
            	echo "<script>alert('City Name must Have Only alphanumeric Characters.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
			}
    		//echo count($Phonenumber);
    		if(strlen($Phonenumber) > 12)
            {
            	$status="NOTOK";
            	echo "<script>alert('Please enter less than 12 character in Phone number field !.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
            }
    		if(strlen($City) > 50)	
            {
            	$status="NOTOK";
            	echo "<script>alert('City Name must Have Only 50 Characters.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
            }
    		if(strlen($Country) > 50)	
            {
            	$status="NOTOK";
            	echo "<script>alert('Country Name must Have Only 50 Characters.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
            }
        	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$Country)) { 
            	$status="NOTOK";
            	echo "<script>alert('Country Name must Have Only alphanumeric Characters.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
			}
    		if(strlen($firstName) > 50)	
            {
            	$status="NOTOK";
            	echo "<script>alert('firstName Name must Have Only 50 Characters.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
            }
    		if(!preg_match('/^[a-zA-Z0-9 _]*$/',$firstName)) { 

            	$status="NOTOK";
            	echo "<script>alert('First Name must Have Only alphanumeric Characters.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
			}
    		if(strlen($lastName) > 50)	
            {
            	$status="NOTOK";
            	echo "<script>alert('lastName Name must Have Only 50 Characters.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
            }
        	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$lastName)) { 
            	$status="NOTOK";
            	echo "<script>alert('Last Name must Have Only alphanumeric Characters.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
			}                  
    		$sessionUsername = $this->session->userdata('UserEmail');
        	$sessionCookie=get_cookie('UserProfileCookie');
			if(md5($cookieValueFromForm) != $sessionCookie){
            	$status="NOTOK";
            	$error_msg .="Something went wrong please try again after sometime later !";
            	$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    			$headers .= 'From: TejCoin <contact@TejCoin.co>' . "\r\n";
            	mail("kishanpatelbca96@gmail.com","Unauthorize Activity is happening on our portal", "Some one trying to doing anything wrong with our website please take step<br>
                He/She trying at <b>User Profile Update Section</b> In Members<br> 
                Ip Address :'".$ip_address_from_user_system."'<br>
                User Email :'".$sessionUsername."'",$headers);
            	//Validation END---->>>>>
            }
    		if($status == "OK")
            {
            	$sessionUsername = $this->session->userdata('UserEmail');
           $InsertArray=array("First_name"=>$firstName,"Last_name"=>$lastName,"City"=>$City,"Country"=>$Country);
    			$this->db->where('User_email',$sessionUsername);//Please Enter Session Variable Before Launch Site
    			$this->db->update('users',$InsertArray);
            	echo "<script>alert('Profile Updated successfully.'); window.location = 'https://tejcoin.com/User_Profile';</script>";
            }
    		else
			{
				$msg['error']=$error_msg;
            	$this->load->view('User_Profile',$msg);
			}
          }
        else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com/User_Profile';</script>";
    }
    }
     else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com/User_Profile';</script>";
    	}
        }
        
}