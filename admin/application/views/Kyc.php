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
                        <a class="navbar-brand" href="#">Tej E-cash User Kyc History</a>
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
                                    <h4 class="title">KYC Request</h4>
                                    <p class="category">KYC Request</p>
                                </div>
            					<div class="content">
                					<div class="container-fluid">
                    					<div class="row" style="height: 500px;">
                    					<?php 
                    						//printing all transcation details
                    						if(isset($AllUserKycDetails))
                    						{
                    							if(count($AllUserKycDetails)==0)
												{
													echo "<br><br><h4 style='margin-left: 350px;margin-top: 120px;color: #1d35e0;'>You Don't Have Any Kyc Request</h4>";
												}
												else
												{	echo "
                                    
                            						<div class='table-responsive' style='margin-left: 20px;'>
                           	 						<table class='table table-hover'>
                                					<thead>
                                    				<tr>
                                        			<th>User email</th>
                                        			<th>Document 1</th>
                                        			<th>Document 2</th>
                                        			<th>Status</th>
                                        			<th>Action</th>
                                    				</tr>
                                					</thead>
                                					<tbody>";
                                     				foreach ($AllUserKycDetails as $row){
													echo "<tr>
                                            		<td>". $row->User_Email."</td>
                                            		<td><a href='https://tejcoin.com/uploads/$row->Document1'target='_blank'>". $row->Document1."</a></td>
													<td><a href='https://tejcoin.com/uploads/$row->Document2'target='_blank'>". $row->Document2."</a></td>
                                            		<td>". $row->Status."</td>
                                            		<td><a href='https://tejcoin.com/admin/Kyc_request/verified?id=$row->id'><i class='fa fa-check' style='font-size:24px'></i></a> &nbsp;&nbsp<a href='https://tejcoin.com/admin/Kyc_request/reject?id=$row->id&email=$row->User_Email';'><i class='fa fa-remove' style='font-size:24px'></i></a></td>";
                                           			echo "</tr>";							
                                   				}
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