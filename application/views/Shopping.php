<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
$randkey=rand(1111111111,99999999999);
setcookie('Shopping', md5($randkey), time() + (1200), "/");
 ?>
<script src="/assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
         $("#product1").click(function(){
         	var UserBalanace="<?php echo $balance[0]->Balance;?>";
         	var Productprice="<?php echo $product1[0]->setting_value;?>";
         	if(parseInt(Productprice) > parseInt(UserBalanace))
            {
            	alert("You don't have suficient fund to buy this product");
            }
         	else
            {
              $("#product1model").modal('show');
            }
          });
    });
	$(document).ready(function(){
         $("#product2").click(function(){
         	var UserBalanace="<?php echo $balance[0]->Balance;?>";
         	var Productprice="<?php echo $product2[0]->setting_value;?>";
         	if(parseInt(Productprice) > parseInt(UserBalanace))
            {
            	alert("You don't have suficient fund to buy this product");
            }
         	else
            {
              $("#product1mode2").modal('show');
            }
          });
    });
	$(document).ready(function(){
         $("#product3").click(function(){
         	var UserBalanace="<?php echo $balance[0]->Balance;?>";
         	var Productprice="<?php echo $product3[0]->setting_value;?>";
         	if(parseInt(Productprice) > parseInt(UserBalanace))
            {
            	alert("You don't have suficient fund to buy this product");
            }
         	else
            {
              $("#product1mode3").modal('show');
            }
          });
    });
	$(document).ready(function(){
         $("#product4").click(function(){
         	var UserBalanace="<?php echo $balance[0]->Balance;?>";
         	var Productprice="<?php echo $product4[0]->setting_value;?>";
         	if(parseInt(Productprice) > parseInt(UserBalanace))
            {
            	alert("You don't have suficient fund to buy this product");
            }
         	else
            {
              $("#product1mode4").modal('show');
            }
          });
    });
	$(document).ready(function(){
         $("#product5").click(function(){
         	var UserBalanace="<?php echo $balance[0]->Balance;?>";
         	var Productprice="<?php echo $product5[0]->setting_value;?>";
         	if(parseInt(Productprice) > parseInt(UserBalanace))
            {
            	alert("You don't have suficient fund to buy this product");
            }
         	else
            {
              $("#product1mode5").modal('show');
            }
          });
    });
	$(document).ready(function(){
         $("#product6").click(function(){
         	var UserBalanace="<?php echo $balance[0]->Balance;?>";
         	var Productprice="<?php echo $product6[0]->setting_value;?>";
         	if(parseInt(Productprice) > parseInt(UserBalanace))
            {
            	alert("You don't have suficient fund to buy this product");
            }
         	else
            {
              $("#product1mode6").modal('show');
            }
          });
    });
</script>
<div id="product1model" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Product Details</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <img src="<?php echo base_url()?>assets/images/iphone7-plus.png" style="max-width: 100px;margin-left: 220px;"><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group" style="margin-top: -10px;margin-left: 100px;">
                                       <small style="margin-left: 120px;"><b>Product :-</b> Mobile</small><br>
                        			   <small style="margin-left: 120px;"><b>Model :-</b> Iphone7</small><br>
                        			   <small style="margin-left: 120px;"><b>Color :-</b> Black</small><br>
                        	           <small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product1[0]->setting_value;?></small><br>
                                    <form method="post" action="<?php echo base_url()?>Shopping/product1">
                                    <input type="hidden" name="product" value="Mobile" >
                                    <input type="hidden" name="Model" value="Iphone7" >
                                    <input type="hidden" name="Color" value="Black" >
                                    <input type="hidden" name="Shoppingkey" value="<?php echo $randkey;?>" >
                                    <input type="hidden" name="Price" value="<?php echo $product1[0]->setting_value; ?>" >
                    		 <button class="button button2" type="submit" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="product1mode2" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Product Details</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <img src="<?php echo base_url()?>assets/images/leptop.png" style="max-width: 100px;margin-left: 220px;"><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group" style="margin-top: -10px;margin-left: 100px;">
                                       <small style="margin-left: 120px;"><b>Product :-</b> Leptop</small><br>
                        			   <small style="margin-left: 120px;"><b>Model :-</b> Lenovo</small><br>
                        			   <small style="margin-left: 120px;"><b>Color :-</b> Gray</small><br>
                        	           <small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product2[0]->setting_value;?></small><br>
                                    <form method="post" action="<?php echo base_url()?>Shopping/product1">
                                    <input type="hidden" name="product" value="Leptop" >
                                    <input type="hidden" name="Model" value="Lenovo" >
                                    <input type="hidden" name="Color" value="Gray" >
                                    <input type="hidden" name="Shoppingkey" value="<?php echo $randkey;?>" >
                                    <input type="hidden" name="Price" value="<?php echo $product2[0]->setting_value; ?>" >
                    		 <button class="button button2" type="submit" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="product1mode3" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Product Details</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <img src="<?php echo base_url()?>assets/images/Bluetooth.png" style="max-width: 100px;margin-left: 220px;"><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group" style="margin-top: -10px;margin-left: 100px;">
                                       <small style="margin-left: 120px;"><b>Product :-</b> Bluetooth</small><br>
                        			   <small style="margin-left: 120px;"><b>Model :-</b> Sony</small><br>
                        			   <small style="margin-left: 120px;"><b>Color :-</b> black</small><br>
                        	           <small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product3[0]->setting_value;?></small><br>
                                    <form method="post" action="<?php echo base_url()?>Shopping/product1">
                                    <input type="hidden" name="product" value="Bluetooth" >
                                    <input type="hidden" name="Model" value="Sony" >
                                    <input type="hidden" name="Color" value="black" >
                                    <input type="hidden" name="Shoppingkey" value="<?php echo $randkey;?>" >
                                    <input type="hidden" name="Price" value="<?php echo $product3[0]->setting_value; ?>" >
                    		 <button class="button button2" type="submit" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="product1mode4" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Product Details</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <img src="<?php echo base_url()?>assets/images/headphone.png" style="max-width: 100px;margin-left: 220px;"><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group" style="margin-top: -10px;margin-left: 100px;">
                                       <small style="margin-left: 120px;"><b>Product :-</b> Headphone</small><br>
                        			   <small style="margin-left: 120px;"><b>Model :-</b> Jbl</small><br>
                        			   <small style="margin-left: 120px;"><b>Color :-</b> black</small><br>
                        	           <small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product4[0]->setting_value;?></small><br>
                                    <form method="post" action="<?php echo base_url()?>Shopping/product1">
                                    <input type="hidden" name="product" value="Headphone" >
                                    <input type="hidden" name="Model" value="Jbl" >
                                    <input type="hidden" name="Color" value="black">
                                    <input type="hidden" name="Shoppingkey" value="<?php echo $randkey;?>" >
                                    <input type="hidden" name="Price" value="<?php echo $product4[0]->setting_value; ?>" >
                    		 <button class="button button2" type="submit" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="product1mode5" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Product Details</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <img src="<?php echo base_url()?>assets/images/Speaker.png" style="max-width: 100px;margin-left: 220px;"><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group" style="margin-top: -10px;margin-left: 100px;">
                                       <small style="margin-left: 120px;"><b>Product :-</b> Speaker</small><br>
                        			   <small style="margin-left: 120px;"><b>Model :-</b> Jbl</small><br>
                        			   <small style="margin-left: 120px;"><b>Color :-</b> black</small><br>
                        	           <small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product6[0]->setting_value;?></small><br>
                                    <form method="post" action="<?php echo base_url()?>Shopping/product1">
                                    <input type="hidden" name="product" value="Speaker" >
                                    <input type="hidden" name="Model" value="Jbl" >
                                    <input type="hidden" name="Color" value="black" >
                                    <input type="hidden" name="Shoppingkey" value="<?php echo $randkey;?>" >
                                    <input type="hidden" name="Price" value="<?php echo $product6[0]->setting_value; ?>" >
                    		 <button class="button button2" type="submit" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="product1mode6" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Product Details</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <img src="<?php echo base_url()?>assets/images/speaker1.png" style="max-width: 100px;margin-left: 220px;"><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group" style="margin-top: -10px;margin-left: 100px;">
                                       <small style="margin-left: 120px;"><b>Product :-</b> Speaker</small><br>
                        			   <small style="margin-left: 120px;"><b>Model :-</b> Philips</small><br>
                        			   <small style="margin-left: 120px;"><b>Color :-</b> black</small><br>
                        	           <small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product5[0]->setting_value;?></small><br>
                                    <form method="post" action="<?php echo base_url()?>Shopping/product1">
                                    <input type="hidden" name="product" value="Speaker" >
                                    <input type="hidden" name="Model" value="Philips" >
                                    <input type="hidden" name="Color" value="black" >
                                    <input type="hidden" name="Shoppingkey" value="<?php echo $randkey;?>" >
                                    <input type="hidden" name="Price" value="<?php echo $product5[0]->setting_value; ?>" >
                    		 <button class="button button2" type="submit" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
                        <a class="navbar-brand" href="#">Shopping</a>
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
            <div class="content">
            	<h5 style="color: #15de1b;margin-left: 700px;margin-top: -50px;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
            	 <?php if(isset($success)){?>
                  <div class="alert alert-success" role="alert"><?php echo $success;?>.</div><?php } ?>
                <div class="container-fluid">
                    <div class="row">
                    	<div class="col-sm-4">
                    		<img src="<?php echo base_url()?>assets/images/iphone7-plus.png" style="max-width: 100px;margin-left: 120px;"><br><br>
                        	<small style="margin-left: 120px;"><b>Product :-</b> Mobile</small><br>
                        	<small style="margin-left: 120px;"><b>Model :-</b> Iphone7</small><br>
                        	<small style="margin-left: 120px;"><b>Color :-</b> Black</small><br>
                        	<small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product1[0]->setting_value;?></small><br>
                    		 <button class="button button2" id="product1" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                        </div>
                        <div class="col-sm-4">
                    		<img src="<?php echo base_url()?>assets/images/leptop.png" style="width: 300px;margin-top: -80px;">
                        	<small style="margin-left: 120px;"><b>Product :-</b> Leptop</small><br>
                        	<small style="margin-left: 120px;"><b>Model :-</b> Lenovo</small><br>
                        	<small style="margin-left: 120px;"><b>Color :-</b> Gray</small><br>
                        	<small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product2[0]->setting_value;?></small><br>
                    		 <button class="button button2" id="product2" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                        </div>
                        <div class="col-sm-4">
                    		<img src="<?php echo base_url()?>assets/images/Bluetooth.png" style="max-width: 200px;margin-left: 60px;">
                    		<small style="margin-left: 120px;"><b>Product :-</b> Bluetooth</small><br>
                        	<small style="margin-left: 120px;"><b>Model :-</b> Sony</small><br>
                        	<small style="margin-left: 120px;"><b>Color :-</b> Black</small><br>
                        	<small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product3[0]->setting_value;?></small><br>
                    		 <button class="button button2" id="product3" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                        </div>
                    </div><br><br>
                     <div class="row">
                    	<div class="col-sm-4">
                    		<img src="<?php echo base_url()?>assets/images/headphone.png" style="max-width: 400px;margin-top: 40px;"><br><br>
                    		<small style="margin-left: 120px;"><b>Product :-</b> Headphone</small><br>
                        	<small style="margin-left: 120px;"><b>Model :-</b> Jbl</small><br>
                        	<small style="margin-left: 120px;"><b>Color :-</b> Black</small><br>
                        	<small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product4[0]->setting_value;?></small><br>
                    		 <button class="button button2" id="product4" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                        </div>
                        <div class="col-sm-4">
                    		<img src="<?php echo base_url()?>assets/images/Speaker.png" style="max-width: 200px; margin-left: 60px;"><br><br>
                    		<small style="margin-left: 120px;"><b>Product :-</b> Speaker</small><br>
                        	<small style="margin-left: 120px;"><b>Model :-</b> Philips</small><br>
                        	<small style="margin-left: 120px;"><b>Color :-</b> Black</small><br>
                        	<small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product5[0]->setting_value;?></small><br>
                    		 <button class="button button2" id="product5" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                        </div>
                        <div class="col-sm-4">
                    		<img src="<?php echo base_url()?>assets/images/speaker1.png" style="max-width: 150px; margin-left: 40px;"><br><br><br>
                        	<small style="margin-left: 120px;"><b>Product :-</b> Speaker</small><br>
                        	<small style="margin-left: 120px;"><b>Model :-</b> Jbl</small><br>
                        	<small style="margin-left: 120px;"><b>Color :-</b> Black</small><br>
                        	<small style="margin-left: 120px;"><b>Price :-</b> <?php echo $product6[0]->setting_value;?></small><br>
                    		 <button class="button button2" id="product6" style="margin-left: 90px; width: 150px; height: 50px; color: white; background: #a923bf; border-radius: 12px;">Buy Product</button>
                        </div>
                    </div>
                </div>
            </div>
<?php include('template/Footer_inner.php');
?>