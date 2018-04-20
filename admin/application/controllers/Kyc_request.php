<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kyc_request extends CI_Controller
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
    	$sessionUsername = $this->session->userdata('UserEmail');
		if(!isset($sessionUsername)){
			redirect(base_url());
		}
    }
	function index()
    {
    	$data['AllUserKycDetails']=$this->user->AllUserKycDetails();
    	$this->load->view('Kyc',$data);
    }
	function verified()
    {
    	if(isset($_GET['id']))
        {
    		$userID=$_GET['id'];
        }
    	$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
    	$kycRequest=$this->user->UserKycDetails($userID);
    	$kycStatus=$kycRequest[0]->Status;
    	$useremail=$this->user->UserEmail($userID);
    	$useremail=$useremail[0]->User_Email;
    	if($kycStatus == "Pending")
        {
        	$updateKyc=array("Status"=>"success");
        	$this->db->where('id',$userID);
			$this->db->update('User_Kyc',$updateKyc);
        	$subject = 'Your KYC document verified successfully';
				$message = 
        		"Dear Member,<br><br>
        
        		We were checked you KYC document .<br><br>
        
        		And Your KYC details is successfully Accepted .<br><br>
        
        		If We have any query then we will contanct you :<br><br><br><br>
        
        
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
		mail($useremail,$subject, $body,$headers);
        }
    	echo "<script>window.location = 'https://tejcoin.com/admin/Kyc_request/';</script>";
    }
	function reject()
    {
    	if(isset($_GET['id']))
        {
    		$userID=$_GET['id'];
        }
    	if(isset($_GET['email']))
        {
    		$email=$_GET['email'];
        }
    	$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
    	//delete the user KYC row
    	$this->db->where('id',$userID);
 		$this->db->delete('User_Kyc');
    	//Update Lock status of user field KYC
    	$updateKyc=array("Kyc_details"=>"Unlock");
        $this->db->where('User_email',$email);
		$this->db->update('users',$updateKyc);
    	
    	$subject = 'Sorry your KYC document rejected';
		$message = 
        		"Dear Member,<br><br>
        
        		We were checked you KYC document .<br><br>
        
        		And Your KYC details is not successfully Accepted .<br><br>
        		
                Please send correct document or your identification document to us <br><br>
                
        		Please send us again :<br><br><br><br>
        
        
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
		mail($email,$subject, $body,$headers);
    	echo "<script>window.location = 'https://tejcoin.com/admin/Kyc_request/';</script>";
    }

}