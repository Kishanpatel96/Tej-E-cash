<?php defined('BASEPATH') OR exit('No direct script access allowed');
class BankDetails extends CI_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->model('user');
		$this->load->model('DashboardModel');
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
    	$sessionUsername = $this->session->userdata('UserEmail');
    	$data['balance']=$this->DashboardModel->UserBalance($sessionUsername);
    	$data['checkkycstatus']=$this->user->fetchbankdetailsstatus($sessionUsername);
    	$data['BankDetails']=$this->user->fetchbankdetails($sessionUsername);
    	$this->load->view('BankDetails',$data);
    }
	function UpdateBankDetails()
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
    	if(isset($_POST['holderName']))
        {
        	$holderName=$_POST['holderName'];
        }
    	if(isset($_POST['AcNumber']))
        {
        	$AcNumber=$_POST['AcNumber'];
        }
    	if(isset($_POST['IFCACode']))
        {
        	$IFCACode=$_POST['IFCACode'];
        }
    	if(isset($_POST['BankName']))
        {
        	$BankName=$_POST['BankName'];
        }
        if(isset($_POST['bankdetails']))
        {
        	$bankdetails=$_POST['bankdetails'];
        }
    	//Validation START---->>>> 
    	$status="OK";
    	$msg="";
    	if(strlen($holderName) > 50)
        {
        	$status="NOTOK";
        	$msg['error'] .="Please enter below 50 character in Holder Name";
        }
    	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$holderName)) { 
            	$status="NOTOK";
            	$msg['error'] .="Holder Name must Have Only alphanumeric Characters.";
		}
    	if(strlen($AcNumber) > 20)
        {
        	$status="NOTOK";
        	$msg['error'] .="Please enter below 20 character in Accoun Number";
        }
    	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$AcNumber)) { 
            	$status="NOTOK";
            	$msg['error'].="Account Number must Have Only alphanumeric Characters.";
		}
    	if(strlen($IFCACode) > 20)
        {
        	$status="NOTOK";
        	$msg['error'] .="Please enter below 20 character in IFCA Code";
        }
    	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$BankName)) { 
            	$status="NOTOK";
            	$msg['error'] .="Bank Name must Have Only alphanumeric Characters.";
		}
    	if(strlen($BankName) > 30)
        {
        	$status="NOTOK";
        	$msg['error'] .="Please enter below 20 character in Bank Name";
        }
         $sessionCookie=get_cookie('BankDetails');
    	if(md5($bankdetails) != $sessionCookie)
        {
        	$status="NOTOK";
        	echo "<script>alert('Something went wrong try again !'); window.location = 'https://tejcoin.com/BankDetails/';</script>"; 
        }
    	//Validation END---->>>>
    	if($status == "OK")
        {
        	$sessionUsername = $this->session->userdata('UserEmail');
        	$insertBank=array("User_email"=>$sessionUsername,"Holder_Name"=>$holderName,"AC_Number"=>$AcNumber,"IFCA_Code"=>$IFCACode,"Bank_Name"=>$BankName);
         $this->db->insert('Bank_Details',$insertBank);
    $userkycUpdate=array("Bank_Details"=>"Lock");
    $this->db->where('User_email',$sessionUsername);//Please Enter Session Variable Before Launch Site
    $this->db->update('users',$userkycUpdate);
        $msg['success']="Your Bank Details is registered";
        $msg['Bank_Details']="Lock";
        $headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
        $subject = 'Your bank details updated';
				$message = 
        		"Dear Member,<br><br>
        
        		Your bank details is successfully added.<br><br>
        
        		Note that now you can not change it.<br><br>
                
        		When you want to sell your tej then we will send money in this bank details.<br><br>        		
        
        		Thank you.<br><br>
        		if there is any query please contact us <br><br>
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
			mail($sessionUsername,$subject, $body,$headers);
     //   $this->load->view('BankDetails',$msg);
        redirect('BankDetails');
        }
    	else
        {
        	$this->load->view('BankDetails',$msg);
        }
      }
        else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com/BankDetails';</script>";
    }
    }
     else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com/BankDetails';</script>";
    	}      
    }
}