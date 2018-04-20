<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
 ?>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/images/sidebar-1.jpg">
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
                        <a class="navbar-brand" href="#">Tej E-cash Users History</a>
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
                <div class="container-fluid">
                    <div class="row" style="height: 500px;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Users Profile</h4>
                                    <p class="category">Users Profile</p>
                                </div>
           			 			<div class="content">
                					<div class="container-fluid">
                    					<div class="row" style="height: 500px;">
                    					<?php 
                    					//printing all transcation details
                    					if(isset($AllUserDetails))
                    					{
                    						if(count($AllUserDetails)==0)
											{
												echo "<br><br><h4 style='margin-left: 350px;margin-top: 120px;color: #1d35e0;'>You Don't Have Any User Profile</h4>";
											}
											else
											{	echo "
                                    
                            					<div class='table-responsive' style='margin-left: 20px;'>
                            					<table class='table table-hover'>
                                				<thead>
                                    			<tr>
                                        		<th>First name</th>
                                        		<th>User email</th>
                                        		<th>Balance</th>
                                        		<th>Phone Number</th>
                                        		<th>Country</th>
                                    			</tr>
                                				</thead>
                                                <tbody>";
                                     
                                  	 			foreach ($AllUserDetails as $row){
												echo "<tr>
                                            		<td>". $row->First_name."</td>
                                            		<td>". $row->User_email."</td>
													<td>". $row->Balance."</td>
                                           	 		<td>". $row->Phone_Number."</td>
                                            		<td>". $row->Country."</td>";
                                           		echo "</tr>";}
                                   			echo"</tbody>
                            				</table>
                        				</div> ";
										}
									}?>
                    		</div>
                		</div>
            		</div>
       			</div>
              </div>
            </div>
          </div>
        </div>
<?php include('template/Footer_inner.php');
?>