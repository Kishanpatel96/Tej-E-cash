<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Kyc extends CI_Controller
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
    	$data['checkkycstatus']=$this->user->fetchkycstatus($sessionUsername);
    	$this->load->view('Kyc',$data);
    }
	/*function detailsfillupform()
    {
    	if(isset($_POST['IdNumber']))
        {
        	$IdNumber=$_POST['IdNumber'];
        }
    	if(isset($_POST['username']))
        {
        	$username=$_POST['username'];
        }
    	if(isset($_POST['useremail']))
        {
        	$useremail=$_POST['useremail'];
        }
    	if(isset($_POST['userphone']))
        {
        	$userphone=$_POST['userphone'];
        }
    	if(isset($_POST['useraddress']))
        {
        	$useraddress=$_POST['useraddress'];
        }
    	$idcard=$_POST['userId'];
    	//VAlidation START---->>>>
    	$status = "OK";
        if($idcard == "1")
        {
        	echo "<script>alert('Please select ID card'); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
        }
    	if(strlen($IdNumber) > 20)
        {
        	echo "<script>alert('Please enter correct Id Number'); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
        }
    	if(strlen($userphone) > 15)
        {
        	echo "<script>alert('Please enter 15 character in Phone number field '); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
        }
    	if(strlen($useraddress) > 100)
        {
        	echo "<script>alert('Please enter 100 character in Address field '); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
        }
    	if(strlen($username) > 20)
        {
        	echo "<script>alert('Please enter below 20 charachet in name'); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
        }
    	if(!preg_match('/^[a-zA-Z0-9 _]*$/',$username)) { 
            	echo "<script>alert('Please don't enter special character in name field'); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
		}
    	if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
  			echo "<script>alert('PleaseEnter Correct Email address'); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
		}
    	if($status == "OK")
        {
        	$insertkyc=array("Id_card"=>$idcard,"Id_number"=>$IdNumber,"User_name"=>$username,"User_emailOnID"=>$useremail,"User_numberOnID"=>$userphone,"User_AddressOnId"=>$useraddress);
        	$this->db->insert('USer_KycDetails', $insertkyc);
        		$sessionUsername = $this->session->userdata('UserEmail');
        		$userkycUpdate=array("Kyc_details"=>"Lock");
    			$this->db->where('User_email',$sessionUsername);//Please Enter Session Variable Before Launch Site
    			$this->db->update('users',$userkycUpdate);
			echo "<script>alert('Your kyc request successfully added !'); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
        }
    	//VAlidation END---->>>>
    }*/
	function do_upload()
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
          		//validation START --->>>
          		$status="OK";
          		//r e c a p t c h a    e n d
          		if(isset($_POST['KycDetails']))
                {
                	$KycDetails=$_POST['KycDetails'];
                }
          		//validation END --->>>
          		 $sessionCookie=get_cookie('KycDetails');
    			if(md5($KycDetails) != $sessionCookie)
        		{
        			$status="NOTOK";
        			echo "<script>alert('Something went wrong try again !'); window.location = 'https://tejcoin.com/Kyc/';</script>"; 
        		}
    			if($status == "OK")
                {
    				$this->load->library('upload');
    				$files = $_FILES;
    				$cpt = count($_FILES['userfile']['name']);
    				$sessionUsername = $this->session->userdata('UserEmail');
    				$insertDocument=array();
    				for($i=0; $i<$cpt; $i++)
    				{           
       		 			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
        		 		$_FILES['userfile']['type']= $files['userfile']['type'][$i];
         	 			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        	 			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
        	 			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
    		 			$insertDocument['document'.$i]=$files['userfile']['name'][$i];
        	 			$this->upload->initialize($this->set_upload_options());
        	 			$this->upload->do_upload();
    				}
  				$insertKyc=array("User_Email"=>$sessionUsername,"Document1"=>$insertDocument['document0'],"Document2"=>$insertDocument['document1'],"Status"=>"Pending");
    			$this->db->insert('User_Kyc',$insertKyc);
    			$msg['success']="Your Document is Successfully taken";
    			$userkycUpdate=array("Kyc_details"=>"Lock");
    			$this->db->where('User_email',$sessionUsername);//Please Enter Session Variable Before Launch Site
    			$this->db->update('users',$userkycUpdate);
    			$msg['KycStatus']="Lock";
    			$this->load->view('Kyc',$msg);
          	
          	$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    		$headers .= 'From: Tej e-cash<contact@Tejecash.co>' . "\r\n";
       		$subject = 'Your Kyc details updated';
				$message = 
        		"Dear Member,<br><br>
        
        		Your Kyc details is successfully added.<br><br>
        
        		Note that now you can not change it.<br><br>
                
        		We will check your documents if it's required.<br><br>        		
        
        		Thank you.<br><br>
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
          
         }
        }
        else{
             echo "<script>alert('Invalid google reCaPTCHA .'); window.location = 'https://tejcoin.com/Kyc';</script>";
    }
    }
     else{
          echo "<script>alert('Select google reCaPTCHA .'); window.location = 'https://tejcoin.com/Kyc';</script>";
    	}
    }
	private function set_upload_options()
	{   
    	 //upload an image options
   	     $config = array();
    	 $config['upload_path'] = './uploads/';
    	 $config['allowed_types'] = 'gif|jpg|png';
    	 $config['overwrite']     = FALSE;

    	 return $config;
	}
}