<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
$randkey=rand(1111111111,99999999999);
setcookie('Recharge', md5($randkey), time() + (1200), "/");
 ?>
<script>
	function onlynumber(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                   var charCode = e.which;
                }
                else { return true; }
               if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
               return true;
            }
           catch (err) {
                alert(err.Description);
            }
        }
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
                        <a class="navbar-brand" href="#">Recharge your mobile balance</a>
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
             <?php if(isset($success)){?>
             <div class="alert alert-success" role="alert"><?php echo $success;?>.</div><?php } ?>
        	<?php if(isset($error)){?>
             <div class="alert alert-danger" role="alert"><?php echo $error;?>.</div><?php } ?>
        	<??>
             <div class="content">
                <div class="container-fluid">
                 <h5 style="color: #15de1b;margin-left: 700px;margin-top: -50px;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                    <div class="row"> 
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Mobile Recharge</h4>
                                    <p class="category">Mobile Recharge</p>
                                </div>
                            	<form method="post" action="<?php base_url()?>/Recharge/confirmrecharge">
                                <div class="card-content">
                                    	<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Enter Mobile Number</label>
                                                    <input type="text" class="form-control" id="Mobilenumber" onkeypress="return onlynumber(event,this);" name="Mobilenumber" maxlength="10" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" >Select Operator</label>
                                                   <select class="form-control" name="operator"> 
                                                    	<option value="0" >Select Operator</option>
                                                    	<option value="Idea">Idea</option>
                                                    	<option value="Vodafone">Vodafone</option> 
                                                    	<option value="Jio">JIO</option>
                                                    	<option value="artiel">Artiel</option>
                                                    	<option value="uninor">Uninor</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>           
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Amount</label>
                                                    <input type="text" class="form-control" id="amount" onkeypress="return onlynumber(event,this);" name="amount" maxlength="10"required>
                                                	<input type="hidden" name="Rechargecookie" value="<?php echo $randkey;?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="checkbox">
                       		 				<div class="g-recaptcha" data-sitekey="6LeqNVAUAAAAAHqML8thgmSElczbD3h9uzcjXsgb"></div>
                    					</div>
                                		<button id="UpdateButton" style="width: 300px;margin-left: 150px;height: 50px;color: white;background: #a923bf; border-radius: 12px;">
										Do Recharge
										</button>
                                </div>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
<?php include('template/Footer_inner.php');
?>