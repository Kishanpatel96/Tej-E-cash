<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Profile extends CI_Controller {
		function __construct() {
        parent::__construct(); 
        $this->load->helper('url');
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
        $userdata['userdata'] = $this->User->AvailableEmail($sessionUsername);
        $this->load->view('User_Profile',$userdata);
    }
	public function Profile_Update()
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
            	$error_msg .="City Name must Have Only alphanumeric Characters.";
			}
    		if(($Phonenumber) > 12)
            {
            	$status="NOTOK";
            	$error_msg .="Please enter less than 12 character in Phone number field !.";
            }
    		if(strlen($City) > 50)	
            {
            	$status="NOTOK";
            	$error_msg .="City Name must Have Only 50 Characters.";
            }
    		if(strlen($Country) > 50)	
            {
            	$status="NOTOK";
            	$error_msg .="Country Name must Have Only 50 Characters.";
            }
        	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$Country)) { 
            	$status="NOTOK";
            	$error_msg .="Country Name must Have Only alphanumeric Characters. ";
			}
    		if(strlen($firstName) > 50)	
            {
            	$status="NOTOK";
            	$error_msg .="firstName Name must Have Only 50 Characters.";
            }
    		if(!preg_match('/^[a-zA-Z0-9 _]*$/',$firstName)) { 

            	$status="NOTOK";
            	$error_msg .="First Name must Have Only alphanumeric Characters.";
			}
    		if(strlen($lastName) > 50)	
            {
            	$status="NOTOK";
            	$error_msg .="lastName Name must Have Only 50 Characters.";
            }
        	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$lastName)) { 
            	$status="NOTOK";
            	$error_msg .="Last Name must Have Only alphanumeric Characters. ";
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
           $InsertArray=array("First_name"=>$firstName,"Last_name"=>$lastName,"User_email"=>$EmailAddress,"City"=>$City,"Country"=>$Country);
    			$this->db->where('User_email',$sessionUsername);//Please Enter Session Variable Before Launch Site
    			$this->db->update('users',$InsertArray);
            	echo "Your Profile is Updated";
            }
    		else
			{
				echo $error_msg;
			}
        }
}