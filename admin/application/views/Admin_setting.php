<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
$hiddenFieldValue=rand(1111111111,9999999999);
setcookie('UserProfileCookie', md5($hiddenFieldValue), time() + (600), "/");
?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
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
                        <a class="navbar-brand" href="#">Admin Setting</a>
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
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8" style="margin-left: 70px;">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Admin setting</h4>
                                    <p class="category">Admin Setting</p>
                                </div>
                            	<form method="post" action="<?php echo base_url()?>Admin_setting/update">
                                <div class="card-content">
                                    	<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Iphone & price</label>
                                                    <input type="text" class="form-control" id="product1" name="product1" value="<?php if($admin_setting[0]->setting_value != "")  echo $admin_setting[0]->setting_value;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Lenovo Leptop Price</label>
                                                    <input type="text" class="form-control" id="product2" name="product2" value="<?php if($admin_setting[1]->setting_value != "")  echo $admin_setting[1]->setting_value;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Sony Bluetooth Price</label>
                                                    <input type="text" class="form-control" id="product3" name="product3" value="<?php if($admin_setting[2]->setting_value != "")  echo $admin_setting[2]->setting_value;?>" >
                                                </div>
                                            </div>
                                        </div>           
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Jbl Headphone Price</label>
                                                    <input type="text" class="form-control" id="product4" name="product4" value="<?php if($admin_setting[3]->setting_value != "")  echo $admin_setting[3]->setting_value;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Philips Speaker Price</label>
                                                    <input type="text" class="form-control" id="product5" name="product5" value="<?php if($admin_setting[4]->setting_value != "")  echo $admin_setting[4]->setting_value;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Jbl Speaker2 Price</label>
                                                    <input type="text" class="form-control" id="product6" name="product6" value="<?php if($admin_setting[5]->setting_value != "")  echo $admin_setting[5]->setting_value;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Exchange Commission</label>
                                                    <input type="text" class="form-control" id="exchangerate" name="exchangerate" value="<?php if($admin_setting[6]->setting_value != "")  echo $admin_setting[6]->setting_value;?>">
                                                	<input id="string" name="string" value="<?php if(isset($hiddenFieldValue)) echo $hiddenFieldValue;?>" type='hidden' class="form-control date-picker">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                		<button id="UpdateButton" style="width: 300px;margin-left: 150px;height: 50px;color: white;background: #a923bf; border-radius: 12px;">
										Update Details
										</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include('template/Footer_inner.php');
?>