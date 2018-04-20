<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Shopping extends CI_Controller
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
    	$data['product1']=$this->user->productprice('product1price');
    	$data['product2']=$this->user->productprice('product2price');
    	$data['product3']=$this->user->productprice('product3price');
    	$data['product4']=$this->user->productprice('product4price');
    	$data['product5']=$this->user->productprice('product5price');
    	$data['product6']=$this->user->productprice('product6price');
    	$sessionUsername = $this->session->userdata('UserEmail');
    	$data['balance']=$this->DashboardModel->UserBalance($sessionUsername);
    	$this->load->view('Shopping',$data);
    }
	function product1()
    {
    	if(isset($_POST['product']))
        {
        	$product=$_POST['product'];
        }
    	if(isset($_POST['Model']))
        {
        	$Model=$_POST['Model'];
        }
    	if(isset($_POST['Color']))
        {
        	$Color=$_POST['Color'];
        }
		if(isset($_POST['Price']))
        {
        	$Price=$_POST['Price'];
        }
    	if(isset($_POST['Shoppingkey']))
        {
        	$FormShoppingkey=$_POST['Shoppingkey'];
        }
    	//Validation START ----->>>>>
    	$status="OK";
    	$msg="";
    	$sessionUsername = $this->session->userdata('UserEmail');
    	$balance=$this->DashboardModel->UserBalance($sessionUsername);
    	$balance=$balance[0]->Balance;
    	if($Price > $balance)
        {
        	$status="NOTOK";
        	echo "<script>alert('Increse fund !'); window.location = 'https://tejcoin.com/Shopping/';</script>"; 
        }
    	$sessionCookie=get_cookie('Shopping');
    	if(md5($FormShoppingkey) != $sessionCookie)
        {
        	$status="NOTOK";
        	echo "<script>alert('Something went wrong try again !'); window.location = 'https://tejcoin.com/Shopping/';</script>"; 
        }
    	if($status=="OK")
        {
        	//User balance updated
        	$userBalance=$balance-$Price;
        	$senderArray=array("Balance"=>$userBalance);
    		$this->db->where('User_email',$sessionUsername);
    		$this->db->update('users',$senderArray);
        	//Shopping details registered 
        	$productdetails=array("User_Email"=>$sessionUsername,"Product"=>$product,"Model"=>$Model,"Color"=>$Color,"Price"=>$Price);
        	$this->db->insert('User_shopping_details',$productdetails);
        	//Transaction details
        	$TransactionDetails=array("Sender_Email"=>$sessionUsername,"Receiver_email"=>"-","Amount"=>$Price,"Description"=>$product." Purchsed ");
        	$this->db->insert('transaction_history',$TransactionDetails);
        	$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    		$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
        	$subject = 'Product Purchsed successfully';
				$message = 
        		"Dear Member,<br><br>
        
        		Your oder is successfully added.<br><br>
        
        		We delivery your product in 7 working days.<br><br>
        
        		Please check the product details below.<br><br>
        		
                Product :- $product<br>
                Model :- $Model.<br>
                Color :- $Color<br>
                Price :- $Price<br><br><br>
        		
        
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
        	echo "<script>alert('Puroduct is successfully purchsed Thank you !'); window.location = 'https://tejcoin.com/Shopping/';</script>";
        }
    	
    }
}