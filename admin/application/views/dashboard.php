<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
 ?>
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
                        <a class="navbar-brand" href="#">Dashboard</a>
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
                    <div class="row" style="height: 200px;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Top Five user</h4>
                                    <p class="category">Top Five user</p>
                                </div>
            					<div class="content">
                					<div class="container-fluid">
                    					<div class="row">
                    					<?php 
                    					//printing all transcation details
                    					if(isset($topFiveUser))
                    					{
                    						if(count($topFiveUser)==0)
											{
												echo "<br><br><h4 style='margin-left: 350px;margin-top: 120px;color: #1d35e0;'>You Don't Have Any User</h4>";
											}
											else
											{	echo "
                                    
                            					<div class='table-responsive' style='margin-left: 20px;'>
                            					<table class='table table-hover'>
                                				<thead>
                                    			<tr>
                                        		<th>User email</th>
                                        		<th>First_name</th>
                                        		<th>Balance</th>
                                        		<th>Phone Number</th>
                                        		<th>Country</th>
                                        		<th>Account Created</th>
                                    			</tr>
                                				</thead>
                                				<tbody>";
                                     
                                  				foreach ($topFiveUser as $row){
												echo "<tr>
                                            	<td>". $row->User_email."</td>
                                            	<td>". $row->First_name."</td>
												<td>". $row->Balance."</td>
												<td>". $row->Phone_Number."</td>
												<td>". $row->Country."</td>
                                            	<td>". $row->Account_created."</td>";
                                           		echo "</tr>";							
                                   			}
                                   			echo"</tbody>
                            			</table>
                        			</div> ";
									}
								}
								?>
                	  		  </div>
                			</div>
            			</div>
                     </div>
                   </div>
                 </div>
               </div>
           </div>
        	<div class="content">
                <div class="container-fluid">
                    <div class="row" style="height: 200px;">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Top Five user's transaction</h4>
                                    <p class="category">Top Five user's transaction</p>
                                </div>
        						<div class="content">
                					<div class="container-fluid" style='margin-left: 20px;'>
                						<div class="row">
                    					<?php 
                    					//printing all transcation details
                    					if(isset($topFivetransaction))
                    					{
                    						if(count($topFivetransaction)==0)
											{
												echo "<br><br><h4 style='margin-left: 350px;margin-top: 120px;color: #1d35e0;'>You Don't Have Any Transaction</h4>";
											}
											else
											{	echo "
                                    
                            				<div class='table-responsive'>
                            				<table class='table table-hover'>
                                			<thead>
                                    		<tr>
                                        	<th>Sender Email</th>
                                        	<th>Receiver email</th>
                                        	<th>Amount</th>
                                        	<th>Description</th>
                                       		<th>Transaction_Date</th>
                                    		</tr>
                                			</thead>
                                			<tbody>
                                    		";
                                     
                                   			foreach ($topFivetransaction as $row){
												echo "<tr>
                                            	<td>". $row->Sender_Email."</td>
                                            	<td>". $row->Receiver_email."</td>
												<td>". $row->Amount."</td>
												<td>". $row->Description."</td>
                                            	<td>". $row->Transaction_Date."</td>";
                                           		echo "</tr>";							
                                   				}
                                   				echo"</tbody>
                            					</table>
                        					</div> ";}
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