<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
 ?>
<script>
	$(document).ready(function(){
         $("#sendButton").click(function(){
            var amountoftej=$("#amountoftej").val();
            var email=$("#email").val();
         	alert(amountoftej);
         	alert(email);
         	$.ajax({
              type:'POST',
              data:{amountoftej:amountoftej,email:email},
              url: '<?php echo base_url();?>Sell_request/paidfrombank',
              success:function(response)
              {
              	alert(response);
              //document.location.reload();
              }
          });
          });
    });
</script>
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
                        <a class="navbar-brand" href="#">Tej E-cash Sell History For Bank</a>
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
                                    <h4 class="title">Sell History For Bank</h4>
                                    <p class="category">Sell History For Bank</p>
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
                                        		 <th>User email</th>
                                        		 <th>Amount</th>
                                        		 <th>Status</th>
                                        		<th>Action</th>
                                    			</tr>
                                				</thead>
                                				<tbody>";
                                   				foreach ($sellrequest as $row){
												echo "<tr>
                                            	<td>". $row['User_email']."</td>
                                            	<td>". $row['Amount']."</td>
                                            	<td>". $row['Status']."</td>
                                            	<td><button type='butto class='btn btn-info btn-lg' style='background: #6bbdd0;border-radius: 12px;width: 70px;' data-toggle='modal' data-target='#".$row['id']."'>Pay in bank</button></td>";
                                           		echo "</tr>";
                                                echo '<div id="'.$row['id'].'" class="modal fade">
    												<div class="modal-dialog">
        												<div class="modal-content" style="height: 500px;"> 
            												<div class="modal-header">
                												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         												       <h4 class="modal-title">Send Tej Way Paypal</h4>
            												</div>
            												<div class="modal-body">
                												<div class="box-body">
                													<form method="post" action="https://tejcoin.com/admin/Sell_request/abc">
                            											
                                                                                	<div class="form-group">
                                        												<p style="margin-top: -40px;">Account holder name<input type="text" style="margin-top;color: #de1717;" class="form-control" name="holdername" value="'.$row['bankdetails']['Holder_Name'].'" disabled>
  																					</div>
                                                                                    <div class="form-group">
  																						<p style="margin-top: -40px;">Account number<input type="text"  style="margin-top;color: #de1717;" class="form-control"name="acnumber" value="'.$row['bankdetails']['AC_Number'].'"disabled>
                                                                                    <div class="form-group">
  																						<p style="margin-top: -30px;">IFSC Code<input type="text" style="margin-top;color: #de1717;" class="form-control" name="ifcanumber" value="'.$row['bankdetails']['IFCA_Code'].'"disabled>
  																					</div>
                                                                                    <div class="form-group">
                                                                                    	<p style="margin-top: -40px;">bank name<input type="text" style="margin-top;color: #de1717;" class="form-control" name="bankname" value="'.$row['bankdetails']['Bank_Name'].'"disabled>
  																					</div>
                                                                                    <div class="form-group">
                                                                                    	<p style="margin-top: -40px;">Amount to pay<input type="text" style="margin-top;color: #de1717;" class="form-control" id="amount" name="amount" value="'.$amount=($row['Amount']/100).'"disabled>
  																					</div>
                                                                                    <div class="form-group">
                                                                                    	<input type="hidden" class="form-control" id="amountoftej" name="amountoftej" value="'.$row['Amount'].'">
  																					</div>
                                                                                    <div class="form-group">
                                                                                    	<input type="hidden" class="form-control" id="email" name="email" value="'.$row['User_email'].'">
                                   											 		</div>
                            											<div class="form-group">
                                											<label class="col-sm-3 control-label"></label>
                                												<div class="col-sm-9">                          
                                    												<input type="submit" style="margin-top: -150px;" class="btn btn-danger btn-md" id="sendButton"></input>
                                												</div>
                            											</div><br>
                        											
                												</div>
            												</div>
            												<div class="modal-footer">
                												<button type="button" class="btn btn-primary" style="margin-top: -170px;" data-dismiss="modal">Close</button>
            												</div>
        												</div>
    												</div>
                                                    
											</div>';							
                                   				}
                                   			echo"</tbody>
                            				</table>
                        				</div> </form>";
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