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
                        <a class="navbar-brand" href="#">Tej E-cash Sell History For Paypal</a>
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
                                    <h4 class="title">Sell History For Paypal</h4>
                                    <p class="category">Sell History For Paypal</p>
                                </div>
            						<div class="content">
               	 						<div class="container-fluid">
                    						<div class="row" style="height: 500px;">
                    						<?php 
                    						//printing all transcation details
                    						if(isset($sellrequest))
                    						{
                    							if(count($sellrequest)==0)
												{
													echo "<br><br><h4 style='margin-left: 350px;margin-top: 120px;color: #1d35e0;'>You Don't Have Any Sell request</h4>";
												}
												else
												{	echo "
                                    
                           						 <div class='table-responsive' style='margin-left: 20px;'>
                            					 <table class='table table-hover'>
                                				 <thead>
                                    			 <tr>
                                        		 <th>User email(Paypal)</th>
                                        		 <th>Amount</th>
                                        		 <th>USD Amount</th>
                                        		 <th>Status</th>
                                        		<th>Action</th>
                                    			</tr>
                                				</thead>
                                				<tbody>";
                                     
                                   				foreach ($sellrequest as $row){
                                                echo '<div id="'.$row['id'].'" class="modal fade">
    											<div class="modal-dialog">
        											<div class="modal-content"> 
            											<div class="modal-header">
                											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                												<h4 class="modal-title">Send Tej Way Paypal</h4>
            											</div>
            											<div class="modal-body">
                											<div class="box-body">
                												<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            										<div class="form-group">
                                									<!--<label class="col-sm-3 control-label">To Address</label>-->
                                										<div class="col-sm-12">                          
                                    										<div class="input-group">
                                        										<input type="text" style="width: 400px;" name="business" disabled value="'.$row['userDetails']['Paypal_email'].'"><br>
  																				<!-- Specify a Buy Now button. -->
  																				<input type="hidden" name="cmd" value="_xclick">
                    															<input type="hidden" name="item_name" value="Buy Tej">
  																				<input type="text" style="width: 400px;" id="amounthidden" name="amount" disabled value="'.$amount=($row['Amount']/100).'">
  																				<input type="hidden" name="currency_code" value="USD">
  																				<input type="hidden" name="rm" value="2">
      																			<input type="hidden" name="return" value="https://tejcoin.com/admin/Paypal/confirm?email='.$row['User_email'].'&id='.$row['id'].'">
    																			<input type="hidden" name="cancel_return" value="https://tejcoin.com/admin/">
                                    										</div>
                                										</div>
                            										</div>
                            										<div class="form-group">
                                										<label class="col-sm-3 control-label"></label>
                                											<div class="col-sm-9">                          
                                    											<button type="submit" class="btn btn-danger btn-md" id="sendButton">Send from Wallet</button>
                                											</div>
                            										</div><br>
                        										</form>
                											</div>
            											</div>
            											<div class="modal-footer">
                											<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            											</div>
        											</div>
    											</div>
											</div>';
												echo "<tr>
                                            	<td>". $row['userDetails']['Paypal_email']."</td>
                                            	<td>". $row['Amount']."</td>
                                            	<td>". ($row['Amount']/100)."</td>
                                            	<td>". $row['Status']."</td>
                                            	<td><button type='butto class='btn btn-info btn-lg' style='background: #6bbdd0;border-radius: 12px;width: 70px;' data-toggle='modal' data-target='#".$row['id']."'>Pay</button></td>";
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
         </div></div>
<?php include('template/Footer_inner.php');
?>