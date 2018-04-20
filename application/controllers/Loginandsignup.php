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
       		echo "<script>alert('Invalid email format'); window.location = 'https://tejcoin.com/';</script>"; 
	   }
       if(strlen($UserPassword) < 7)
       {	
       	$status="NOTOK";
       	echo "<script>alert('Password must be above 7 characters'); window.location = 'https://tejcoin.com/';</script>";
       }
    	if($status=="OK")
        {
        	$UserPassword=md5($UserPassword);
       		$userData=$this->user->loginDetails($UserEmail,$UserPassword);
        	if(!empty($userData))
            {
            	$AccountStatus=$userData[0]->Account_status;
            	if($AccountStatus == "Active")
                {
            		$this->session->set_userdata('UserEmail',$UserEmail);
            		redirect(base_url().'dashboard');
                }
            	else
                {
                	echo "<script>alert('Your account is not active please verified email address !'); window.location = 'https://tejcoin.com/';</script>";
                }
            }
        	else
            {
            		echo "<script>alert('Your password and email address is wrong check it !'); window.location = 'https://tejcoin.com/';</script>";
            }
        }
    }
        else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com/';</script>";
    	}
    }
     else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com/';</script>";
    	}
    }
	public function signup()
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
    	$status="OK";
    	if(isset($_POST['firstName']))
        {
        	$firstName=$_POST['firstName'];
        }
    	if(isset($_POST['LastName']))
        {
        	$LastName=$_POST['LastName'];
        }
    	if(isset($_POST['UserEmail']))
        {
        	$UserEmail=$_POST['UserEmail'];
        }
    	if(isset($_POST['UserPassword']))
        {
        	$UserPassword=$_POST['UserPassword'];
        }
    	if(isset($_POST['UsercnfPassword']))
        {
        	$UsercnfPassword=$_POST['UsercnfPassword'];
        }
    	if(isset($_POST['UserNumber']))
        {
        	$UserNumber=$_POST['UserNumber'];
        }
    	if(isset($_POST['UserCity']))
        {
        	$UserCity=$_POST['UserCity'];
        }
    	if(isset($_POST['UserCountry']))
        {
        	$UserCountry=$_POST['UserCountry'];
        }
        if(isset($_POST['UserpaypalEmail']))
        {
        	$userpaypalEmail=$_POST['UserpaypalEmail'];
        }
    	//validation START---->>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$firstName)) { 
            	$status="NOTOK";
            	echo "<script>alert('First Name must Have Only alphanumeric Characters.'); window.location = 'https://tejcoin.com/';</script>";
			}
    		if(strlen($firstName) > 50)	
            {
            	$status="NOTOK";
            	echo "<script>alert('First Name must Have Only 50 Characters.'); window.location = 'https://tejcoin.com/';</script>"; 
            }
    	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$LastName)) { 
            	$status="NOTOK";
            	echo "<script>alert('Last Name must Have Only alphanumeric Characters.'); window.location = 'https://tejcoin.com/';</script>";
			}
    		if(strlen($LastName) > 50)	
            {
            	$status="NOTOK";
            	echo "<script>alert('Last Name must Have Only 50 Characters.'); window.location = 'https://tejcoin.com/';</script>"; 
            }
    		if(!preg_match('/^[a-zA-Z0-9 _]*$/',$UserCity)) { 
            	$status="NOTOK";
            	echo "<script>alert('City Name must Have Only alphanumeric Characters.'); window.location = 'https://tejcoin.com/';</script>";
			}
    		if(strlen($UserCity) > 50)	
            {
            	$status="NOTOK";
            	echo "<script>alert('City Name must Have Only 50 Characters.'); window.location = 'https://tejcoin.com/';</script>"; 
            }
    		if(!preg_match('/^[a-zA-Z0-9 _]*$/',$UserCountry)) { 
            	$status="NOTOK";
            	echo "<script>alert('Country Name must Have Only alphanumeric Characters.'); window.location = 'https://tejcoin.com/';</script>";
			}
    		if(strlen($UserCountry) > 50)	
            {
            	$status="NOTOK";
            	echo "<script>alert('Country Name must Have Only 50 Characters.'); window.location = 'https://tejcoin.com/';</script>"; 
            }
    	if(!filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
  			$status="NOTOK";
       		echo "<script>alert('Invalid email format'); window.location = 'https://tejcoin.com/';</script>"; 
	   }
    	if(!is_numeric($UserNumber))
        {
        	$status="NOTOK";
       		echo "<script>alert('Please enter correct Mobile Number'); window.location = 'https://tejcoin.com/';</script>"; 
        }
       if(strlen($UserPassword) < 7 && strlen($UsercnfPassword) < 7)
       {	
       		$status="NOTOK";
       		echo "<script>alert('Password and confirm password must be above 7 characters'); window.location = 'https://tejcoin.com/';</script>";
       }
    	if($UserPassword != $UsercnfPassword)
        {
        	$status="NOTOK";
       		echo "<script>alert('Please Enter Password and confirm password same !'); window.location = 'https://tejcoin.com/';</script>";
        }
    	if($status=="OK")
        {
        	$AvailableEmailAddress=$this->user->AvailableEmail($UserEmail);
        	if(empty($AvailableEmailAddress))
            {	
            	$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    			$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
 				$randomKey=rand(1111111111,9999999999);           	$userDetails=array("First_name"=>$firstName,"Last_name"=>$LastName,"User_email"=>$UserEmail,"Paypal_email"=>$userpaypalEmail,"Password"=>md5($UserPassword),"Phone_Number"=>$UserNumber,"City"=>$UserCity,"Country"=>$UserCountry,"Account_status"=>"Inactive","RandomKey"=>$randomKey);
            	$this->db->insert('users',$userDetails);
            	$subject = 'Please confirm your email';
				$message = 
        		"Dear Member,<br><br>
        
        		We are excited that you decided to join our team.<br><br>
        
        		We assure you that our association would be very beneficial and profitable for you.<br><br>
        
        		Now, before we can get started, there is one last step remained.<br><br>
        
        		Please verify your email by pressing the button below:<br><br><br><br>
        
        		<a href='".base_url().'Loginandsignup/getdata?Key='.$randomKey."' class='btnIPSecurity'>Confirm the email</a><br><br><br><br>
        
        		Thank you.<br><br>
        
       		   Regards,<br><br>
        
        		Tej E-cash Team
        
        		";
      
				$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
							<title>' . $subject . '</title>
							<style type="text/css">
							body {
								font-family: Arial, Verdana, Helvetica, sans-serif;
								font-size: 16px;
								}
                    		.btnIPSecurity{
       					 	background-color: #006e80;
        					color: white;
        					padding: 10px;
        					border: 0px;
        					border-radius: 5px;
       					 	min-width: 200px;
        					font-size: 15px;
                        	text-decoration: none;
    						}
    						.btnIPSecurity:hover{
        					box-shadow: 1px 1px 10px #4c4a4a;
    						}
						</style>
					</head>
				<body>
				' . $message . '
				</body>
			</html>';
		mail($UserEmail,$subject, $body,$headers);

            	echo "<script>alert('You Are successfully registered with us Now confirm Email !'); window.location = 'https://tejcoin.com/';</script>";
            }
        	else{
            $status="NOTOK";
       		echo "<script>alert('This Email Address is already registred !'); window.location = 'https://tejcoin.com/';</script>";
            }
        }
    	//validation END---->>>>>>>>>>>>>>>>>>>>>>>>>>>>>
      }
        else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com/';</script>";
    	}
    }
     else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com/';</script>";
    	}
    }
	function getdata()
	{
		$key=$_GET['Key'];
    	$message = "";
    	//header for mail function
    	$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
		if(is_numeric($key))
		{
			$regist="";
			$this->db->select("Account_status");
        	$this->db->where('RandomKey', $key);
			$this->db->from('users');
			$query = $this->db->get();
			if($query->num_rows())
			{
				foreach($query->result_array() as $row)
				{
					$regist=$row['Account_status'];
				}
			}
			if($regist=='Active')
			{
				$message = "Your account is already Active. Please login to access your account. ";
			}
			else
			{
				$this->db->select('*'); 
				$this->db->where('RandomKey', $key);
				$query = $this->db->get('users'); 
				$results  = $query->result();
            	//fetching user mail id or referrer details -->>
            	$userMailId=$results['0']->User_email;
            	
				if($query->num_rows()==1)
				{
					$data='Active';
					$this->db->set('Account_status', $data); //value that used to update column  
					$this->db->where('RandomKey',$key); //which row want to upgrade  
					$this->db->update('users');
		
					$message = $message. "Your registration is completed successfully. Please login to access your account. ";                
                
                	//congratulation mail to user
                	$subject = 'Welcome to Tej e-cash';
					$messageMail = 
        			"Dear Member,<br><br>
        
        			We are very delighted to have you in our team. <br><br>
        
        			We assure you to make our association the most beneficial and most profitable for you!<br><br>

					Please explore the website and get the most out of it.<br><br>

					If you have any questions, then please do not hesitate to contact us.<br><br>

					Many thanks.<br><br>

					Best Regards,<br><br>

					Tej E-cash Team
					<br><br>
                    ";
      
					$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
						<title>' . $subject . '</title>
						<style type="text/css">
						body {
							font-family: Arial, Verdana, Helvetica, sans-serif;
							font-size: 16px;
							}
                    	.btnIPSecurity{
       					 background-color: #006e80;
        				 color: white;
        				 padding: 10px;
        				 border: 0px;
        				 border-radius: 5px;
       					 min-width: 200px;
        				 font-size: 15px;
                         text-decoration: none;
    					}
    					.btnIPSecurity:hover{
        				 box-shadow: 1px 1px 10px #4c4a4a;
    					}
						</style>
					</head>
					<body>
					' . $messageMail . '
					</body>
			</html>';
            mail($userMailId,$subject, $body,$headers);
                }
				else
				{
					$message = $message. " This link is expired Please Try Again. ";
				}
			}
		}
		else
		{
			$message = $message. " The confirmation key is not valid. Please try again. ";
		}
    
    	echo "<script> alert('".$message."'); window.location='https://tejcoin.com/';  </script>";
	}
	function forgetPasswordPage()
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
    	$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
    	if($_POST['UserEmail'])
        {
        	$UserEmail=$_POST['UserEmail'];
        }
    	$checkEmailExists=$this->user->AvailableEmail($UserEmail);
    	if(!empty($checkEmailExists))
        {
        $randstring=rand(1111111111,9999999999);
		$subject = 'Reset Password';
        $message = 
        "Dear Member,<br><br>
        
        We received request to reset the password of your CryptoBite account.<br><br>
        
        So to protect your account, we require that you validate that login attempt.<br><br>
        
        Please press the button below:<br><br><br><br>
        
        <a href='".base_url().'Loginandsignup/ForgetPassEmailPage?Key='.$randstring."' class='btnIPSecurity'>Change Password</a><br><br><br><br>
        If you did not made that attempt, then please contact our customer service urgently.<br><br>
        
        Thank you.<br><br>
        
        Regards,<br><br>
        
        Tej E-cash Team
        
        ";
        
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
					<title>' . $subject . '</title>
						<style type="text/css">
							body {
								font-family: Arial, Verdana, Helvetica, sans-serif;
								font-size: 16px;
								}
                         .btnIPSecurity{
       					 background-color: #006e80;
        				color: white;
        				padding: 10px;
        				border: 0px;
        				border-radius: 5px;
       					 min-width: 200px;
        				font-size: 15px;
                        text-decoration: none;
    					}
    					.btnIPSecurity:hover{
        				box-shadow: 1px 1px 10px #4c4a4a;
    					}
						</style>
				</head>
				<body>
				' . $message . '
				</body>
			</html>';
        	mail($UserEmail,$subject, $body,$headers);
			$this->db->set('ForgetPassRandomKey', $randstring); //value that used to update column  
			$this->db->where('User_email',$UserEmail); //which row want to upgrade  
			$this->db->update('users');
			echo "<script> alert('We Sent You Email Please Chnage Your password from There');window.location='https://tejcoin.com/'; </script>";

        }
    	else
        {
        	echo "<script> alert('You are not regester with us !'); window.location='https://tejcoin.com/';  </script>";
        }
       }
        else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com/';</script>";
    	}
    }
     else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com/';</script>";
    	}
    }
	function ForgetPassEmailPage()
    {
    	if(isset($_GET['Key']))
		{	
			$key1=array();
			$key1['key1']=$_GET['Key'];
			$this->load->view('forgetpasspagefrommail',$key1);
        	setcookie('passkey',$_GET['Key'],time() + (300), "/");
		}
		else
		{
			echo "Key is Not Set";
		}
    }
	function change_forget_pass()
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
    		//r e c a p t c h a    e n d
    	$message=array();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$mainPassword =$this->input->post('chngpassword');
		$confirmPassword=$this->input->post('chngcnfpassword');
		$key=get_cookie('passkey');	
		if(!isset($key))
		{
			$message['error']="The verification link is not valid. Please try again. ";
			$this->load->view('forgetpasspagefrommail',$message);
		} 
		$this->form_validation->set_rules('chngpassword', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('chngcnfpassword', 'Password', 'required|min_length[8]');
		//$this->form_validation->set_rules('user_idenfied_key', '', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$message['error']="Password should be atleast 8 characters long. ";
			$this->load->view('forgetpasspagefrommail',$message);
		}
       		$sessionCookie=get_cookie('sessionCookie');
			if(md5($_POST['string']) != $sessionCookie){
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
        	$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    		$headers .= 'From: CryptoBite <contact@cryptobite.co>' . "\r\n";
            mail("yogeshpadsala@gmail.com","Unauthorize Activity is happening on our portal", "Some one trying to doing anything wrong with our website please take step<br> 
            He/She trying at <b>Forget Password Page in Mail </b> In Members<br>
            Ip Address :'".$ip_address_from_user_system."'",$headers);
        	$message['error']="Something went wrong please try again after sometime later !";
			$this->load->view('forget_password_from_mail',$message);
        }
		else
		{
			if($mainPassword == $confirmPassword){
			$this->db->set('Password',md5($_POST['chngpassword'])); //value that used to update column  
			$this->db->where('ForgetPassRandomKey',$key); //which row want to upgrade  
			$this->db->update('users');
			echo "<script> alert('Your password is changed now login !'); window.location='https://tejcoin.com/';  </script>";
			}
			else{
				$message['error']="Both passwords do not match. ";
				$this->load->view('forget_password_from_mail',$message);
			}
		}
        }
	 else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com';</script>";
    }
        }
     else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com';</script>";
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