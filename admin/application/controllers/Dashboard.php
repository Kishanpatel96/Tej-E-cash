<?php defined('BASEPATH') OR exit('No direct script access allowed');
class dashboard extends CI_Controller
{
    function __construct() {
        parent::__construct();
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
    	$data['topFiveUser']=$this->DashboardModel->TopFiveUser();
    	$data['topFivetransaction']=$this->DashboardModel->topFivetransaction();
    	$this->load->view('dashboard',$data);
    }
	/*function SendTransactionModel()
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
    	$commission=$amounttotransfer*2/100;
    	$amountCutFromUser=$commission+$amounttotransfer;
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
    	if($_POST['hiddenemail'])
        {
        	$hiddenemail=$_POST['hiddenemail'];
        }
    	if($_POST['hiddenamount'])
        {
        	$hiddenamount=$_POST['hiddenamount'];
        }
    	if($_POST['hiddentotalamonut'])
        {
        	$hiddentotalamonut=$_POST['hiddentotalamonut'];
        }
    	$status="OK";
    	$msg="";
    	$sessionUsername = $this->session->userdata('UserEmail');
    	$fetchsenderbalance=$this->DashboardModel->UserBalance($sessionUsername);
    	$fetchsenderbalance=$fetchsenderbalance[0]->Balance;
    	$commission=$hiddenamount*2/100;
    	$amountCutFromUser=$commission+$hiddenamount;
    	$checkingReceiverExists=$this->DashboardModel->CheckingUserExists($hiddenemail);
    	if (!filter_var($hiddenemail, FILTER_VALIDATE_EMAIL)) {
        	$status="NOTOK";
        	$msg['error']="Invalid Receiver email format !";
    	}
    	if (!is_numeric($hiddenamount))
        {
        	$status="NOTOK";
        	$msg['error']="Please enter numberic value of tej to transfer!";
        }
    	if($amountCutFromUser > $fetchsenderbalance)
        {
        	$status="NOTOK";
        	$msg['error']="You dont have suficient fund to give fees and transfer please incresed balance !";
        }
    	if($amountCutFromUser != $hiddentotalamonut)
        {
        	$status="NOTOK";
        	$msg['error']="There is somthing went wronog try again !";
        }
    	$sessionCookie=get_cookie('UserProfileCookie');
		if(md5($_POST['string']) != $sessionCookie)
        {
        	$status="NOTOK";
        	$msg['error']="There Is Something Went Wrong Please Try Again !";	    
        }
    	if(empty($checkingReceiverExists))
        {
        	$status="NOTOK";
        	$msg['error']="The Receiver is not exists with us !";
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
        	//updating User Balance END-------->>>>>
        	//inserting in transaction Table START---->>>
        	$TransactionDetails=array("Sender_Email"=>$sessionUsername,"Receiver_email"=>$hiddenemail,"Amount"=>$hiddenamount,"Description"=>$hiddenamount."Send To ".$hiddenemail);
        	$this->db->insert('transaction_history',$TransactionDetails);
        	$Description="Commission cut to transfer ".$hiddenamount." Tej to ".$hiddenemail;
        	$TransactionDetails1=array("Sender_Email"=>$sessionUsername,"Receiver_email"=>$hiddenemail,"Amount"=>$commission,"Description"=>$Description);
        	$this->db->insert('transaction_history',$TransactionDetails1);
        	$msg['success']="Tej successfully sent !";
        	$this->load->view('dashboard',$msg);
        	//inserting in transaction Table END---->>>
        }
    }
	function purchsedTej()
    {
    	if($_POST['buytejtextbox'])
        {
        	$buytejtextbox=$_POST['buytejtextbox'];
        }
    	echo $buytejtextbox;
    }
	function selltej()
    {
    	if(isset($_POST['selltejtextbox']))
        {
        	$selltejtextbox=$_POST['selltejtextbox'];
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
        	$selltej=array("User_email"=>$sessionUsername,"Amount"=>$selltejtextbox,"Status"=>"Pending");
        	$this->db->insert('sellTejRequest',$selltej);
        	$Userbalance=$Userbalance - $selltejtextbox;
        	$userbalanceUpdate=array("Balance"=>$Userbalance);
    		$this->db->where('User_email',$sessionUsername);//Please Enter Session Variable Before Launch Site
    		$this->db->update('users',$userbalanceUpdate);
        	echo "<script>alert('Your Request accepted successfully !'); window.location = 'https://tejcoin.com/dashboard';</script>";
        }
    	else
        {
        	$msg['error'] = $msg;
        	$this->load->view('dashboard',$msg);
        }
    }*/
}