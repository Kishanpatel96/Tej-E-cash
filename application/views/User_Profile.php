<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
$hiddenFieldValue=rand(1111111111,9999999999);
	setcookie('UserProfileCookie', md5($hiddenFieldValue), time() + (600), "/");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>/*
    $(document).ready(function(){
         $("#UpdateButton").click(function(){
             var First_name=$("#First_name").val();	
         	 var Last_name=$("#Last_name").val();
         	 var EmailAddress=$("#EmailAddress").val();
         	 var Country=$("#Country").val();
         	 var City=$("#City").val();
         	 var string=$("#string").val();
         	 var Phonenumber=$("#Phonenumber").val();	
         	$.ajax({
             type:'POST',
             data:{First_name:First_name,Last_name:Last_name,string:string,EmailAddress:EmailAddress,,City:City,Country:Country,Phonenumber:Phonenumber},
             url: 'https://tejcoin.com/User_Profile/profile_update',
             success:function(result)
             {
                // $('#result1').html(result);
                 alert(result);
            	 document.location.reload();
             }
           });
          });
    });*/
</script>

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
                        <a class="navbar-brand" href="#">User Profile</a>
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
        	 <?php if(isset($success)){?>
             <div class="alert alert-success" role="alert"><?php echo $success;?>.</div><?php } ?>
        	<?php if(isset($error)){?>
             <div class="alert alert-danger" role="alert"><?php echo $error;?>.</div><?php } ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                    <h5 style="color: #15de1b;margin-left: 750px;margin-top: -50px;">You Available balance is <strong><?php if(isset($balance)){echo $balance[0]->Balance;}?></strong></h5>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Edit Profile</h4>
                                    <p class="category">Complete your profile</p>
                                </div>
                            	<form method="POST" action="<?php echo base_url()?>User_Profile/profile_update">
                                <div class="card-content" style="height: 550px;">
                                    	<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Fist Name</label>
                                                    <input type="text" class="form-control" id="First_name" name="First_name" value="<?php if($userdata[0]->First_name != "")  echo $userdata[0]->First_name;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" class="form-control" id="Last_name" name="Last_name" value="<?php if($userdata[0]->Last_name != "")  echo $userdata[0]->Last_name;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email address</label>
                                                    <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" value="<?php if($userdata[0]->User_email != "")  echo $userdata[0]->User_email;?>" disabled>
                                                </div>
                                            </div>
                                        </div>           
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Phone</label>
                                                    <input type="text" class="form-control" id="Phonenumber" name="Phonenumber" value="<?php if($userdata[0]->Phone_Number != "")  echo $userdata[0]->Phone_Number;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">City</label>
                                                    <input type="text" class="form-control" id="City" name="City" value="<?php if($userdata[0]->City != "")  echo $userdata[0]->City;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Country</label>
                                                    <input type="text" class="form-control" id="Country" name="Country" value="<?php if($userdata[0]->Country != "")  echo $userdata[0]->Country;?>">
                                                <input type="hidden" class="form-control" id="string" name="string" value="<?php echo $hiddenFieldValue;?>">
                                                </div>
                                            </div>
                                        	<div class="form-group">
                        						<div class="g-recaptcha" data-sitekey="6LeqNVAUAAAAAHqML8thgmSElczbD3h9uzcjXsgb"></div>
                        					</div>
                                        </div>
                                		<button type="submit" id="UpdateButton" style="width: 300px;margin-left: 150px;height: 50px;color: white;background: #a923bf; border-radius: 12px;margin-top: 80px;">
										Update Profile
										</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include('template/Footer_inner.php');
?>