<?php defined('BASEPATH') OR exit('No direct script access allowed');
class dashboard extends CI_Controller
{	
    function __construct() {
        parent::__construct();
		$this->load->model('DashboardModel');
    	$this->load->library('email');
    	$this->load->library('PaypalIPN');
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
    	$data['commission']=$this->DashboardModel->Admincommission();
    	$data['userdetails']=$this->DashboardModel->UserDetails($sessionUsername);
    	$data['Alltransactiondetails']=$this->DashboardModel->AllTransactionDetails($sessionUsername);
    	$data['MERCHANT_KEY']="IheOOjC3";
    	$data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    	$this->load->view('dashboard',$data);
    }
	function abc()
    {	
    	if(isset($_POST['amount']))
        {
        	$amount=$_POST['amount'];
        }
    	$userpayAmount=$amount*1/100;
		echo $userpayAmount;
    }
	function SendTransactionModel()
    {
    	if(isset($_POST['receiverEmail']))
        {
        	$receiverEmail=$_POST['receiverEmail'];
        }
    	if(isset($_POST['amounttotransfer']))
        {
        	$amounttotransfer=$_POST['amounttotransfer'];
        }
    	if(isset($_POST['senderPassword']))
        {
        	$senderPassword=$_POST['senderPassword'];
        }
    	//Validation Start --->>>>>>>>
    	$status="OK";
    	$msg="";
    	$sessionUsername = $this->session->userdata('UserEmail');
    	$fetchUserPassword=$this->DashboardModel->UserPassword($sessionUsername);
    	$fetchUserPassword=$fetchUserPassword[0]->Password;
    	$fetchsenderbalance=$this->DashboardModel->UserBalance($sessionUsername);
    	$admincommission=$this->DashboardModel->Admincommission();
    	$admincommission=$admincommission[0]->setting_value;
    	if($admincommission == 0)
        {
        	$amountCutFromUser=$amounttotransfer;
        }
    	else
        {
        	$commission=$amounttotransfer*$admincommission/100;
    		$amountCutFromUser=$commission+$amounttotransfer;
        }
    	$checkingReceiverExists=$this->DashboardModel->CheckingUserExists($receiverEmail);
    	if(empty($checkingReceiverExists))
        {
        	$status="NOTOK";
        	echo "The Receiver is not exists with us !";
        }
    	if (!is_numeric($amounttotransfer))
        {
        	$status="NOTOK";
        	echo "Please enter numberic value of tej to transfer!";
        }
    	if($amountCutFromUser > $fetchsenderbalance)
        {
        	$status="NOTOK";
        	echo "You dont have suficient fund to give fees and transfer please incresed balance !";
        }
    	if(md5($senderPassword) != $fetchUserPassword)
        {
        	$status="NOTOK";
        	echo "Please Enter Your Correct Password !";
        }
    	if (!filter_var($receiverEmail, FILTER_VALIDATE_EMAIL)) {
        	$status="NOTOK";
        	echo "Invalid Receiver email format !";
    	}
    	if($status=="OK")
        {
        	echo "Done";
        }
    	//Validation END --->>>>>>>>
    }
	function confirmandsubmit()
    {
    	if(isset($_POST['hiddenemail']))
        {
        	$hiddenemail=$_POST['hiddenemail'];
        }
    	if(isset($_POST['hiddenamount']))
        {
        	$hiddenamount=$_POST['hiddenamount'];
        }
    	if(isset($_POST['hiddentotalamonut']))
        {
        	$hiddentotalamonut=$_POST['hiddentotalamonut'];
        }
    	$status="OK";
    	$msg="";
    	$sessionUsername = $this->session->userdata('UserEmail');
    	$fetchsenderbalance=$this->DashboardModel->UserBalance($sessionUsername);
    	$fetchsenderbalance=$fetchsenderbalance[0]->Balance;
    	$admincommission=$this->DashboardModel->Admincommission();
    	$admincommission=$admincommission[0]->setting_value;
    	$commission=$hiddenamount*$admincommission/100;
    	$amountCutFromUser=$commission+$hiddenamount;
    	$checkingReceiverExists=$this->DashboardModel->CheckingUserExists($hiddenemail);
    	if (!filter_var($hiddenemail, FILTER_VALIDATE_EMAIL)) {
        	$status="NOTOK";
        	echo "<script>alert('Invalid Receiver email format!'); window.location = 'https://tejcoin.com/dashboard';</script>";
    	}
    	if (!is_numeric($hiddenamount))
        {
        	$status="NOTOK";
        	echo "<script>alert('Please enter numberic value of tej to transfer!'); window.location = 'https://tejcoin.com/dashboard';</script>";
        }
    	if($amountCutFromUser > $fetchsenderbalance)
        {
        	$status="NOTOK";
        	echo "<script>alert('You dont have suficient fund to give fees and transfer please incresed balance !'); window.location = 'https://tejcoin.com/dashboard';</script>";
        }
    	if($amountCutFromUser != $hiddentotalamonut)
        {
        	$status="NOTOK";
        	echo "<script>alert('There is somthing went wronog try again !'); window.location = 'https://tejcoin.com/dashboard';</script>";
        }
    	$sessionCookie=get_cookie('UserProfileCookie');
		if(md5($_POST['string']) != $sessionCookie)
        {
        	$status="NOTOK";	 
        	echo "<script>alert('There Is Something Went Wrong Please Try Again !'); window.location = 'https://tejcoin.com/dashboard';</script>";
        }
    	if(empty($checkingReceiverExists))
        {
        	$status="NOTOK";
        	echo "<script>alert('The Receiver is not exists with us !'); window.location = 'https://tejcoin.com/dashboard';</script>";
        }
    	if($status=="OK")
        {
        	//updating User Balance START-------->>>>>
        	$receiverbalance=$this->DashboardModel->UserBalance($hiddenemail);
        	$receiverbalance=$receiverbalance[0]->Balance;
        	$senderFinalBalance=$fetchsenderbalance-$amountCutFromUser;
        	$receiverfinalbalance=$receiverbalance+$hiddenamount;
        	$receiverarray=array("Balance"=>$receiverfinalbalance);
    		$this->db->where('User_email',$hiddenemail);
    		$this->db->update('users',$receiverarray);
        	$senderArray=array("Balance"=>$senderFinalBalance);
    		$this->db->where('User_email',$sessionUsername);
    		$this->db->update('users',$senderArray);
        	$txn=rand(1111111111,9999999999);
        	//updating User Balance END-------->>>>>
        	//inserting in transaction Table START---->>>
        	$TransactionDetails=array("Sender_Email"=>$sessionUsername,"Receiver_email"=>$hiddenemail,"txn_id"=>$txn,"Amount"=>$hiddenamount,"Description"=>$hiddenamount."Send To ".$hiddenemail);
        	$this->db->insert('transaction_history',$TransactionDetails);
        	$Description="Commission cut to transfer ".$hiddenamount." Tej to ".$hiddenemail;
        	$TransactionDetails1=array("Sender_Email"=>$sessionUsername,"Receiver_email"=>$hiddenemail,"Amount"=>$commission,"Description"=>$Description);
        	$this->db->insert('transaction_history',$TransactionDetails1);
        	echo "<script>alert('Tej send succefully !'); window.location = 'https://tejcoin.com/dashboard';</script>";
        	$msg['balance']=$senderFinalBalance;
        	$this->load->view('dashboard',$msg);
        	//inserting in transaction Table END---->>>
        		$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    			$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
            	$subject = 'Your Purchsed order succefully accepted';
				$message = 
        		"Dear Member,<br><br>
        
        		We Thankfully to you for Use Tej e-cash.<br><br>
        
        		You are Tej e-cash transfer is successfully done<br>
        		Please check details of transation<br><br>
        
        		Tej e-cash :- '$hiddenamount'.<br>
        		Fees :- '$commission'.<br>
        		Receiver :- '$hiddenemail'.<br>
                Transaction id :-'$txn'<br>
                Description :- tej e-cash Transfer<br><br>
        
        		Please contact us if you have any query<br>
        
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
		mail($sessionUsername,$subject, $body,$headers);
        		$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    			$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
            	$subject = 'Your Purchsed order succefully accepted';
				$message = 
        		"Dear Member,<br><br>
        
        		We Thankfully to you for Use Tej e-cash.<br><br>
        
        		You are Tej e-cash Received is successfully done<br>
        		Please check details of transation<br><br>
        
        		Tej e-cash :- '$hiddenamount'.<br>
        		Sender :- '$sessionUsername'.<br>
                Transaction id :-'$txn'<br>
                Description :- tej e-cash Received<br><br>
        
        		Please contact us if you have any query<br>
        
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
		mail($hiddenemail,$subject, $body,$headers);
        }
    }
	function purchsedTejsuccess()
    {
    	$amount = $_POST['mc_gross'];
    	$txn = $_POST['txn_id'];
    	$payment_status = $_POST['payment_status'];
    	$mc_currency = $_POST['mc_currency'];
    	$payment_type = $_POST['payment_type'];
    	$sessionUsername = $this->session->userdata('UserEmail');
    	$userbalannce=$this->DashboardModel->UserBalance($sessionUsername);
    	$userbalannce=$userbalannce[0]->Balance;
    	if($payment_status == "Completed" && $payment_type == "instant")
        {
        	$userGet=$amount*100;
        	$userUpdated_balance=$userbalannce+$userGet;
        	$userbalanceUpdate=array("Balance"=>$userUpdated_balance);
        	$this->db->where('User_email',$sessionUsername);//Please Enter Session Variable Before Launch Site
    		$this->db->update('users',$userbalanceUpdate);
        
        	$selltej=array("Sender_Email"=>$sessionUsername,"txn_id"=>$txn,"Amount"=>$userGet,"Description"=>"tej e-cash purchsed");
        	$this->db->insert('transaction_history',$selltej);
        	$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    			$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
            	$subject = 'Your Purchsed order succefully accepted';
				$message = 
        		"Dear Member,<br><br>
        
        		We Thankfully to you for purchsed Tej e-cash.<br><br>
        
        		Please confirm below Transaction details<br><br>
        
        		Amount Paid in USD :- '$amount'.<br>
        		Tej Receive :- '$userGet'.<br>
                Transaction id :-'$txn'<br>
                Description :- tej e-cash purchsed<br><br>
        
        		Please contact us if you have any query<br>
        
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
		mail($sessionUsername,$subject, $body,$headers);
        }
     	echo "<script>alert('Your purchasing order done succefully !'); window.location = 'https://tejcoin.com/dashboard';</script>";
    }
	function purchsedTejfall()
    {
    	echo "<script>alert('There is something went wrong try again Thank you!'); window.location = 'https://tejcoin.com/dashboard';</script>";
    }
	function selltej()
    {
    	if(isset($_POST['selltejtextbox']))
        {
        	$selltejtextbox=$_POST['selltejtextbox'];
        }
    	if(isset($_POST['dropDownId']))
        {
        	$dropDownId=$_POST['dropDownId'];
        }
    	$sessionUsername = $this->session->userdata('UserEmail');
    	$Userbalance=$this->DashboardModel->UserBalance($sessionUsername);
    	$bankdetails=$this->DashboardModel->bankdetails($sessionUsername);
    	$bankdetails=$bankdetails[0]->Bank_Details;
    	$Userbalance=$Userbalance[0]->Balance;
    	//validation START------>>>
    	$status="OK";
    	$msg="";
    	if($bankdetails == "Unloack")
        {
        	$status="NOTOK";
        	$msg .="Please Enter bank Details first !";
        }
    	if($dropDownId == "0")
        {
        	$status="NOTOK";
        	$msg .="Please select way to get back money !";
        }
    	if(!is_numeric($selltejtextbox))
        {
        	$status="NOTOK";
        	$msg .="Please enter correct amount !";
        }
    	if($selltejtextbox > $Userbalance)
        {
        	$status="NOTOK";
        	$msg .="Please Don't Enter Amount more than your balance !";
        }
    	if($status == "OK")
        {
        	$selltej=array("User_email"=>$sessionUsername,"Amount"=>$selltejtextbox,"Way"=>$dropDownId,"Status"=>"Pending");
        	$this->db->insert('sellTejRequest',$selltej);
        	$Userbalance=$Userbalance - $selltejtextbox;
        	$userbalanceUpdate=array("Balance"=>$Userbalance);
    		$this->db->where('User_email',$sessionUsername);//Please Enter Session Variable Before Launch Site
    		$this->db->update('users',$userbalanceUpdate);
        	$description=$sessionUsername." Want To Sell This amount of Tej ".$selltejtextbox;
        	$txn=rand(1111111111,9999999999);
            $selltej1=array("Sender_Email"=>$sessionUsername,"Receiver_email"=>"company","txn_id"=>$txn,"Amount"=>$selltejtextbox,"Description"=>$description);
        	$this->db->insert('transaction_history',$selltej1);
        	echo "<script>alert('Your Request accepted successfully !'); window.location = 'https://tejcoin.com/dashboard';</script>";
        }
    	else
        {
        	$msg['error'] = $msg;
        	$this->load->view('dashboard',$msg);
        }
    }
}