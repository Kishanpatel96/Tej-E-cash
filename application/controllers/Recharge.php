<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Recharge extends CI_Controller
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
    	$this->load->view('Recharge',$data);
    }
	function confirmrecharge()
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
    			if(isset($_POST['Mobilenumber']))
        		{
        			$Mobilenumber=$_POST['Mobilenumber'];
        		}
    			if(isset($_POST['amount']))
        		{
        			$amount=$_POST['amount'];
        		}
    			if(isset($_POST['operator']))
        		{
        			$operator=$_POST['operator'];
        		}
          		if(isset($_POST['Rechargecookie']))
                {
                	$Rechargecookie=$_POST['Rechargecookie'];
                }
    			// validation START---->>>
    			$status="OK";
          		if($amount < 0)
                {
                	$status="NOTOK";
        			echo "<script>alert('Please enter more than 0 in amount'); window.location = 'https://tejcoin.com/Recharge/';</script>"; 
                }
    			if($operator == "0")
        		{
                	$status="NOTOK";
        			echo "<script>alert('Please Select Operator'); window.location = 'https://tejcoin.com/Recharge/';</script>"; 
        		}
          		if(!is_numeric($Mobilenumber))
                {
                	$status="NOTOK";
        			echo "<script>alert('Please Enter Number in Mobile Number field '); window.location = 'https://tejcoin.com/Recharge/';</script>"; 
                }
          		if(strlen($Mobilenumber) != 10)
                {
                	$status="NOTOK";
                	echo "<script>alert('Please Enter Correct Number'); window.location = 'https://tejcoin.com/Recharge/';</script>";
                }
        		$sessionCookie=get_cookie('Recharge');
				if(md5($Rechargecookie) != $sessionCookie)
                {
                	$status="NOTOK";
                	echo "<script>alert('There is somethign wrong !'); window.location = 'https://tejcoin.com/Recharge/';</script>";
                }
          		if($status == "OK")
                {
                	//update user balance START--->>
                	$sessionUsername = $this->session->userdata('UserEmail');
                	$sernderbalance=$this->DashboardModel->UserBalance($sessionUsername);
        			$sernderbalance=$sernderbalance[0]->Balance;
        			$senderFinalBalance=$sernderbalance-$amount;
                	$sernderarray=array("Balance"=>$senderFinalBalance);
    				$this->db->where('User_email',$sessionUsername);
    				$this->db->update('users',$sernderarray);
                	//update user balance END--->>
                	//insert in transaction table and sending mail
                	$txn=rand(1111111111,9999999999);
                $RechargeDetails=array("Sender_Email"=>$sessionUsername,"Receiver_email"=>"-","txn_id"=>$txn,"Amount"=>$amount,"Description"=>$Mobilenumber." Recharge Done of ".$amount);
                $this->db->insert('transaction_history',$RechargeDetails);
                	
                $headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    			$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
       			$subject = 'Recharge succefully done';
				$message = 
        		"Dear Member,<br><br>
        
        		Your recharge Proccess is done.<br><br>
        
        		Please Check Your details below.<br><br>
                
        		Mobile Number :- $Mobilenumber.<br>        		
        		Mobile Operator :- $operator.<br>        		
        		Amount :- $amount.<br>        		
        		Txn id :- $txn.<br>        		
        
        		Thank you for choose Tej e-cash.<br><br>
        		if there is any query please contact us <br><br>
       		   	Regards,<br><br>
        
        		Tej E-cash Team";
      
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
                echo "<script>alert('Your Recharge is done Thanks For Using Tej e-cash !'); window.location = 'https://tejcoin.com/Recharge/';</script>";
                }
    			// validation end---->>>
    		}
        	else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com/Recharge';</script>";
    		}
    	}
     	else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com/Recharge';</script>";
    	}
    }
}