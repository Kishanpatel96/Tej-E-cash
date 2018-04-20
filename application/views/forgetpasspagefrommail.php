<?php 
include('template/Header_inner.php');
//include('template/LeftMenu_inner.php');
$hiddenFieldValue=rand(1111111111,9999999999);
setcookie('sessionCookie', md5($hiddenFieldValue), time() + (600), "/");
?>


<!-- begin #page-loader -->
<!-- <div id="page-loader" class="fade in"><span class="spinner"></span></div> -->
<!-- end #page-loader -->
<!-- begin #page-container -->
<div id="page-container" class="">
    <!-- begin login -->
    <div class="login login-with-news-feed">
        <!-- begin news-feed -->
        <div class="news-feed">
            <div class="news-image">
                <img src="/assets/images/prosperityImage.jpg" alt="">
            </div>
            
        </div>
        <!-- end news-feed -->
        <!-- begin right-content -->
        <div class="right-content">
            <!-- begin login-header -->
            <div class="login-header">
                <center>
                    <img src="/assets/images/tej-coin-250x250.png" width="128">
                    <div class="brand">
                       Tej E-cash
                    </div>
                </center>
            </div>
            <br>
            <style type="text/css">
                .alert.alert-success{background:#7cdda7}.alert.alert-info{background:#93cfe5}.alert.alert-danger{background:#f8b2b2}.alert.alert-warning{background:#ffead0}.note{margin-bottom:20px;padding:10px;border-left:3px solid}.note.note-success{border-color:#4a8564;background:#b0ebca;color:#3c763d}.note.note-success h1,.note.note-success h2,.note.note-success h3,.note.note-success h4,.note.note-success h5,.note.note-success h6{color:#3c763d}.note.note-danger{border-color:#986e6e;background:#fbd1d1;color:#a94442}.note.note-danger h1,.note.note-danger h2,.note.note-danger h3,.note.note-danger h4,.note.note-danger h5,.note.note-danger h6{color:#a94442}.note.note-info{border-color:#587c89;background:#bee2ef;color:#31708f}.note.note-info h1,.note.note-info h2,.note.note-info h3,.note.note-info h4,.note.note-info h5,.note.note-info h6{color:#31708f}.note.note-warning{border-color:#9d9080;background:#fff2e3;color:#8a6d3b}.note.note-warning h1,.note.note-warning h2,.note.note-warning h3,.note.note-warning h4,.note.note-warning h5,.note.note-warning h6{color:#8a6d3b}

            </style>
            <!-- end login-header -->
            <!-- begin login-content -->
            <div class="login-content">
            <div class="lc-block toggled" id="l-register">
                <?php if(isset($login_errors))
                {
                 //echo '<div class="errorNoticeDiv">'. $regiser_error_messages.'</div>';
                 echo '<div class="alert alert-danger">'. $login_errors.'</div>';
                 }
                 elseif(isset($success_message))
                 {
                   // echo '<div class="successNoticeDiv">'. $regiser_success_messages.'</div>';
                    echo '<div class="alert alert-success">'. $success_message.'</div>';
                } ?> 

          		 <?php if(isset($success)) echo $success;?>
             <form method="POST" action="<?php echo base_url();?>Loginandsignup/change_forget_pass" accept-charset="UTF-8" class="margin-bottom-0">
                <div class="form-group m-b-15">
                    <input class="form-control input-lg" placeholder="Enter New Password" required name="chngpassword" type="password">
                    <input class="form-control input-lg" value="<?php echo $hiddenFieldValue;?>" name="string" type="hidden">
                </div>
                <div class="form-group m-b-15">
                    <input class="form-control input-lg" placeholder="Confirm New Password" required name="chngcnfpassword" type="password" value="">
                </div>
				<div class="checkbox">
                      <div class="g-recaptcha" data-sitekey="6LeqNVAUAAAAAHqML8thgmSElczbD3h9uzcjXsgb"></div>
                </div>
                <div class="login-buttons">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Reset Password</button>
                </div>
                </form>
            </div>
            <!-- end login-content -->
        </div>
        <!-- end right-container -->
    </div>
    <!-- end login -->
</div>
<!-- end page container -->

<?php include('template/Footer_inner.php');
?>