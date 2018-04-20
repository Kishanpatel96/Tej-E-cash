<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
$randkey=rand(1111111111,99999999999);
setcookie('KycDetails', md5($randkey), time() + (1200), "/");
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
                        <a class="navbar-brand" href="#">Enter KYC Details</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                            	<a href="<?php echo base_url()?>User_authentication/logout"><img src="<?php echo base_url()?>assets/images/icons8-shutdown-32.png"></a>
                            </li>   
                        </ul> 
                    </div>
                </div>
            </nav>
        	<?php if(isset($checkkycstatus)) $KycStatus=$checkkycstatus[0]->Kyc_details;
        		if(isset($KycStatus) && $KycStatus== "Unlock" Or isset($KycStatus) && $KycStatus== "Unlock"){
        		?>
             <?php if(isset($success)){?>
             <div class="alert alert-success" role="alert"><?php echo $success;?>.</div><?php } ?>
        	<?php if(isset($error)){?>
             <div class="alert alert-danger" role="alert"><?php echo $error;?>.</div><?php } ?>
             <div class="content">
             <p style="margin-left: 20px;color: red;font-size: 18px;">(Note :- Please enter bank details carefully because once you give Kyc details then you are not able to change it Thank You !)
                <div class="container-fluid">
                    <div class="row">
                    <h5 style="color: #15de1b;margin-left: 750px;margin-top: -50px;">You Available balance is <strong><?php if(isset($balance)){echo $balance[0]->Balance;}?></strong></h5>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Update Kyc Details</h4>
                                    <p class="category">Complete your Kyc Details</p>
                                </div>
                            	<?php echo form_open_multipart('Kyc/do_upload');?>
                                <div class="card-content">
                                    	<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="color: #520c0c;">Document 1: (Identity card)-</label>
                                                    <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" name="userfile[]" size="20" />
                                                </div>
                                            </div>
                                        </div>
                                		<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" style="color: #520c0c;">Document @: (Address Proof)</label>
                                                   <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" name="userfile[]" size="20">
                                                   <input type="hidden" name="KycDetails" value="<?php echo $randkey;?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="checkbox">
                       		 				<div class="g-recaptcha" data-sitekey="6LeqNVAUAAAAAHqML8thgmSElczbD3h9uzcjXsgb"></div>
                    					</div>
                                		<button id="UpdateButton" style="width: 300px;margin-left: 150px;height: 50px;color: white;background: #a923bf; border-radius: 12px;">
										Update Kyc Details
										</button>
                                </div>
                            </div>
                                	<?php echo form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        	<?php }else{?>
                	<p style="margin-left: 400px;font-size: 24px;margin-top: 140px;color: green;"><b>Your Kyc details is updated !</b></p>
                	<p style="margin-left: 150px;font-size: 20px;margin-top: 80px;color: #000a80;"><b>The information given by you is not change if you want to change then contact us thank you !</b></p>
                <?php }  ?>
<?php include('template/Footer_inner.php');
?>