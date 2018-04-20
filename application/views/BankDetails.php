<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
$randkey=rand(1111111111,99999999999);
setcookie('BankDetails', md5($randkey), time() + (1200), "/");
 ?>
 <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="/assets/images/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
        Tip 2: you can also add an image using data-image tag
    -->
            
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Bank Details</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                            	<a href="<?php echo base_url()?>Loginandsignup/logout"><img src="<?php echo base_url()?>assets/images/icons8-shutdown-32.png"></a>
                            </li>   
                        </ul> 
                    </div>
                </div>
            </nav>
        	
            <?php if(isset($checkkycstatus)) $bankDetailsStatus=$checkkycstatus[0]->Bank_Details;
        		if(isset($bankDetailsStatus) && $bankDetailsStatus== "Unlock" Or isset($Bank_Details) && $Bank_Details== "Unlock"){
        		?>
             <?php if(isset($success)){?>
             <div class="alert alert-success" role="alert"><?php echo $success;?>.</div><?php } ?>
        	<?php if(isset($error)){?>
             <div class="alert alert-danger" role="alert"><?php echo $error;?>.</div><?php } ?>
             <div class="content">
             <p style="margin-left: 20px;color: red;font-size: 18px;">(Note :- Please enter bank details carefully because once you give bank details then you are not able to change it Thank You !)
                <div class="container-fluid">
                    <div class="row">
                    <h5 style="color: #15de1b;margin-left: 750px;margin-top: -50px;">You Available balance is <strong><?php if(isset($balance)){echo $balance[0]->Balance;}?></strong></h5>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Update Bank Details</h4>
                                    <p class="category">Complete your Bank Details</p>
                                </div>
                            	<form method="post" action="<?php base_url()?>/BankDetails/UpdateBankDetails">
                                <div class="card-content">
                                    	<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Account holder name</label>
                                                    <input type="text" class="form-control" id="holderName" name="holderName" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Account Number</label>
                                                    <input type="text" class="form-control" id="AcNumber" name="AcNumber" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">IFCA Code</label>
                                                    <input type="text" class="form-control" id="IFCACode" name="IFCACode" required>
                                                </div>
                                            </div>
                                        </div>           
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Bank Name</label>
                                                    <input type="text" class="form-control" id="BankName" name="BankName" required>
                                                	<input type="hidden" name="bankdetails" value="<?php echo $randkey;?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="checkbox">
                       		 				<div class="g-recaptcha" data-sitekey="6LeqNVAUAAAAAHqML8thgmSElczbD3h9uzcjXsgb"></div>
                    					</div>
                                		<button id="UpdateButton" style="width: 300px;margin-left: 150px;height: 50px;color: white;background: #a923bf; border-radius: 12px;">
										Update Profile
										</button>
                                </div>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
              <?php }else{?>
                	<p style="margin-top: 80px;margin-left: 400px;font-size: 24px;color: green;">Your Bank Details is updated !</p>
             		<p style="margin-left: 100px;margin-top: 50px;font-size: 18px;">User Email Id :-<b style="color: blue;"><?php echo $BankDetails[0]->User_email;?></b></p>
             		<p style="margin-left: 100px;margin-top: 50px;font-size: 18px;">Account Holder Name :-<b style="color: blue;"><?php echo $BankDetails[0]->Holder_Name;?></b></p>
             		<p style="margin-left: 100px;margin-top: 50px;font-size: 18px;">Account Number :-<b style="color: blue;"><?php echo $BankDetails[0]->AC_Number;?></b></p>
             		<p style="margin-left: 100px;margin-top: 50px;font-size: 18px;">IFCA Number :-<b style="color: blue;"><?php echo $BankDetails[0]->IFCA_Code;?></b></p>
             		<p style="margin-left: 100px;margin-top: 50px;font-size: 18px;">Bank Name :-<b style="color: blue;"><?php echo $BankDetails[0]->Bank_Name;?></b></p>
              <?php }?>
<?php include('template/Footer_inner.php');
?>