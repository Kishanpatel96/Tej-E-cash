<?php 
include('template/Header_inner.php');
include('template/LeftMenu_inner.php');
$hiddenFieldValue=rand(1111111111,9999999999);
setcookie('UserProfileCookie', md5($hiddenFieldValue), time() + (600), "/");
 ?>
<script src="/assets/js/jquery.min.js"></script>
<script>
window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	zoomEnabled: true,
	title:{
		text: "Report About Tej Coin" 
	},
	axisY :{
		includeZero:false
	},
	data: data  // random generator below
});
chart.render();
}
var limit = 1000;
var y = 0;
var data = [];
var dataSeries = { type: "line" };
var dataPoints = [];
for (var i = 0; i < limit; i += 1) {
	y += (Math.random() * 10 - 5);
	dataPoints.push({
		x: i - limit / 2,
		y: y                
	});
}
dataSeries.dataPoints = dataPoints;
data.push(dataSeries);               
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="/assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
         $("#buytej").click(function(){
              $("#buytejmodel").modal('show');
          });
    });
	$(document).ready(function(){
         $("#SendTejCoin").click(function(){
              $("#sendtej").modal('show');
          });
    });
	$(document).ready(function(){
         $("#sellTej").click(function(){
              $("#selltejmodel").modal('show');
          });
    });
</script>
<script>
$(document).ready(function(){
         $("#sendButton").click(function(){
            var receiverEmail=$("#receiverEmail").val();
            var amounttotransfer=$("#amounttotransfer").val();
            var senderPassword=$("#senderPassword").val();
         	var commission=amounttotransfer*2/100;
         	var totalamountdeducted=commission+parseInt(amounttotransfer);
         	$('#confirmationreceiveremail').text(receiverEmail)
         	$('#confirmationamounttotransfer').text(amounttotransfer)
         	$('#confirmationfees').text(commission)
         	$('#confirmationtotalamountdeducted').text(totalamountdeducted)
         	$('#hiddenemail').val(receiverEmail)
         	$('#hiddenamount').val(amounttotransfer)
         	$('#hiddentotalamonut').val(totalamountdeducted)
         	$.ajax({
              type:'POST',
              data:{receiverEmail:receiverEmail,amounttotransfer:amounttotransfer,senderPassword:senderPassword},
              url: '<?php echo base_url();?>dashboard/SendTransactionModel',
              success:function(response)
              {
              var responseStatus = response;
              //var responseStatus = response.slice(0,1);
        	  //var responseToDisplay= response.slice(1);
              if(responseStatus == "Done")
              {
              	$('#ConfirmationForSend').modal('show');
              	$('#sendtej').modal('hide');
              }
              else
              {
              	alert(response);
              }
              //document.location.reload();
              }
          });
          });
    });
	 $(document).ready(function(){
         $("#BuyTej").click(function(){
            var amount=$("#buytejtextbox").val();
         	$.ajax({
              type:'POST',
              data:{amount:amount},
              url: '<?php echo base_url();?>dashboard/abc',
              success:function(response)
              {
              	var string="You want to buy "+amount+" Tej ";
            	$('#Totaluserbuytej').text(string)
            	$('#confirmationmsg').text("Confirmation")
            	$('#userhavetopaythisamountforbuytej').text("You have to pay "+response+" USD for buying Tej")
            	$('#amounthidden').val(response)
         		$("#purchsedTej").show();
              }
          });
          });
    });
	$(document).ready(function(){
         $("#SellTej").click(function(){
            var amountsell=$("#selltejtextbox").val();
         	var waytogetmoney=$('#dropDownId').val();
         	var userbalanceindatabase="<?php if(isset($balance))echo $balance[0]->Balance;?>";
         	var stringsell="You want to sell "+amountsell+" Tej ";
         	var stringsel2="You want to get back your money in "+waytogetmoney;
         	var status="OK";
         	if(waytogetmoney == "0")
            {
            	$('#error').text("Please Select way to get back your money !")	
 				$('#Totaluserselltej').hide();
            	$('#confirmationmsgsell').hide();
         		$("#sellTejmodelbutton").hide();
            	status="NOTOK";
            }
         	if(amountsell <= "0")
            {
            	$('#error').text("Please sell tej More than 0 !")	
 				$('#Totaluserselltej').hide();
            	$('#confirmationmsgsell').hide();
         		$("#sellTejmodelbutton").hide();
            	status="NOTOK";
            }
         	if(amountsell > parseInt(userbalanceindatabase))
            {
            	$('#error').text("Please sell tej less then your balance !")	
 				$('#Totaluserselltej').hide();
            	$('#confirmationmsgsell').hide();
         		$("#sellTejmodelbutton").hide();
            	status="NOTOK";
            }
         	if(status=="OK")
            {
            	$("#error").hide();
            	$('#Totaluserselltej').show();
            	$('#confirmationmsgsell').show();
         		$("#sellTejmodelbutton").show();
            	$('#Totaluserselltej').text(stringsell)
            	$('#waytopay').text(stringsel2)
            	$('#confirmationmsgsell').text("Confirmation")
         		$("#sellTejmodelbutton").show();
            }
          });
    });
</script>
<script type="text/javascript">
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
<style>
.button {
    background-color: white; /* Green */
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border: 2px solid #555555;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
.button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
<!--When User Going To  Send / Withdraw Tej That Time Model START-->
<div id="sendtej" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tej E-cash Send</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                	<form class="form-horizontal">
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                        <input name="receiverEmail" id="receiverEmail" class="form-control" style="padding: 5px" type="email" value="" placeholder="Enter email address" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
                                        <input name="amounttotransfer"  onkeypress="return onlynumber(event,this);" id="amounttotransfer"onkeypress="return onlynumber(event,this);" style="padding: 5px" class="form-control" type="text" value="" placeholder="How much tej you want to transfer" required/>
                                        <span class="input-group-addon">All</span>
                                    </div>
                                    <small>Transaction Fee: <?php echo $commission[0]->setting_value;?>% </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Password</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input name="senderPassword" id="senderPassword" style="padding: 5px" class="form-control" type="password" value="" placeholder="Enter your Password" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">                          
                                    <button type="button" class="btn btn-danger btn-md" id="sendButton">Send from Wallet</button>
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
</div>
<div id="ConfirmationForSend" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance)){echo $balance[0]->Balance;}?></strong></h5>
                	<form class="form-horizontal" action="<?php echo base_url()?>dashboard/confirmandsubmit" method="post">
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                        <h4 style="font-size: 15px;">You want to send money to this address :-<small style="font-size: 15px;color: #e10be4;" id="confirmationreceiveremail" name="confirmationreceiveremail"></small></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bitcoin"></i></span>
                                    <h4 style="font-size: 15px;">You want to send :-<small style="font-size: 15px;color: #e10be4;" id="confirmationamounttotransfer" name="confirmationamounttotransfer"></small></h4>
                                    <input type="hidden" name="hiddenemail" id="hiddenemail" value="">
                                     <input type="hidden" name="hiddenamount" id="hiddenamount" value="">
                                     <input type="hidden" name="hiddentotalamonut" id="hiddentotalamonut" value="">
                                     <input id="string" name="string" value="<?php if(isset($hiddenFieldValue)) echo $hiddenFieldValue;?>" type='hidden' class="form-control date-picker">

                                    </div>
                                    <small>Transaction Fee: 2% </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Password</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <h4 style="font-size: 15px;">Fees :-<small style="font-size: 15px;color: #e10be4;" id="confirmationfees" name="confirmationfees"></small></h4>
                                    </div>
                                </div>
                            </div>
                    		<div class="form-group">
                                <!--<label class="col-sm-3 control-label">Password</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <h4 style="font-size: 15px;">Total amount Deducted :- <small style="font-size: 15px;color: #e10be4;" id="confirmationtotalamountdeducted" name="confirmationtotalamountdeducted"></small></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">                          
                                    <button type="submit" class="btn btn-danger btn-md" id="sendButton">Confirm And Send</button>
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
</div>
<div id="buytejmodel" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Buy Tej E-cash</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    	<input type="hidden" name="business" value="kishanpatelbca96@gmail.com">
  						<!-- Specify a Buy Now button. -->
  						<input type="hidden" name="cmd" value="_xclick">
                    	<input type="hidden" name="item_name" value="Buy Tej">
  						<input type="hidden" id="amounthidden" name="amount" value="">
  						<input type="hidden" name="currency_code" value="USD">
  						<input type="hidden" name="rm" value="2">
      					<input type="hidden" name="return" value="https://tejcoin.com/dashboard/purchsedTejsuccess">
    					<input type="hidden" name="cancel_return" value="https://tejcoin.com/dashboard/purchsedTejfall">
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                        <input name="#"  id="buytejtextbox"onkeypress="return onlynumber(event,this);"  class="form-control" style="padding: 5px" type="text" value="" placeholder="Enter how much you want to buy tej" required/>
                                    </div>
                                </div>
                            </div>
                    		<div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">                          
                                    <button type="button" class="btn btn-danger btn-md" id="BuyTej" style="margin-left: 60px;">Buy Tej</button>
                                </div>
                            </div>
                    		<h1 id="confirmationmsg" style="font-size: 30px;align: center;color: blue;margin-left: 160px;"></h1>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <p id="Totaluserbuytej" style="margin-left: 140px;font-size: 24px;color: #e22bdc;"></p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Password</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                       <p id="userhavetopaythisamountforbuytej" style="margin-left: 100px;font-size: 24px;color: #e22bdc;"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">   
            							 <button type="submit" class="btn btn-danger btn-md" id="purchsedTej" style="display:none; margin-left: 50px;">Purchsed Tej </button>
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
</div>
<div id="selltejmodel" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sell Tej E-cash</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                	<h5 style="color: #15de1b;">You Available balance is <strong><?php if(isset($balance))echo $balance[0]->Balance;?></strong></h5>
                	<form class="form-horizontal" method="post" action="<?php echo base_url()?>dashboard/selltej">
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">To Address</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                        <input name="selltejtextbox" onkeypress="return onlynumber(event,this);" id="selltejtextbox"onkeypress="return onlynumber(event,this);"  class="form-control" style="padding: 5px" type="text" value="" placeholder="Enter how much you want to sell tej" required/>
                                    </div>
                                </div>
                            </div>
                    		<div class="form-group">
                            	<div class="col-sm-12">                          
                                    <div class="input-group"><br>
                                        <small style="margin-left: 40px;">Select way to get back your money</small>
                                         <select class="form-control" id="dropDownId" name="dropDownId" style="margin-left: 40px;">
        									<option value="0">Select way to get back money</option>
        									<option value="Bank">Bank</option>
        									<option value="Paypal">Paypal</option>
      									</select>
                                    </div>
                                </div>
                            	<p id="error" style="margin-left: 140px;margin-top: 80px;color: red;"></p>
                            </div>
                    		<div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">                          
                                    <button type="button" class="btn btn-danger btn-md" id="SellTej" style="margin-left: 60px;">Sell Tej</button>
                                </div>
                            </div>
                    		<h1 id="confirmationmsgsell" style="font-size: 30px;align: center;color: blue;margin-left: 160px;"></h1>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">Quantity</label>-->
                                <div class="col-sm-12">                          
                                    <div class="input-group">
                                        <p id="Totaluserselltej" style="margin-left: 140px;font-size: 24px;color: #e22bdc;"></p>
                                        <p id="waytopay" style="margin-left: 140px;font-size: 20px;color: #1e64e4;"></p>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">                          
                                    <button type="submit" class="btn btn-danger btn-md" id="sellTejmodelbutton" style="display:none; margin-left: 50px;">Sell Tej </button>
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
</div>
<!--When User Going To  Send / Withdraw Tej That Time Model END-->
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
                        <a class="navbar-brand" href="#">TejCoin wallet</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                            	<a href="<?php echo base_url()?>Loginandsignup/logout"><img src="<?php echo base_url()?>assets/images/icons8-shutdown-32.png"></a>
                            </li> 
                        </ul> 
                    <h4 style="margin-left: 700px;margin-top: 40px;color: #15de1b;">You Available balance is <?php if(isset($balance))echo $balance[0]->Balance;?></h4>
                    </div>
                </div>
            </nav>
            <div class="content">
            	 <?php if(isset($success)){?>
                            <div class="alert alert-success" role="alert"><?php echo $success;?>.</div><?php } ?>
                        <?php if(isset($error)){?>
                            <div class="alert alert-danger" role="alert"><?php echo $error;?>.</div><?php } ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6" style="width: 350px;">
                            <div class="card card-stats"> 
                                <div class="card-content" style="text-align: center;">
                                    <button class="button button2" id="SendTejCoin" style="width: 250px;">Send Tej coin</button>
                                </div>
                            </div>
                        </div>
                       <div class="col-lg-3 col-md-6 col-sm-6" style="width: 350px;">
                            <div class="card card-stats"> 
                                <div class="card-content" style="text-align: center;">
                                    <button class="button button2" id="buytej" style="width: 250px;">Buy Tej</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6" style="width: 350px;">
                            <div class="card card-stats"> 
                                <div class="card-content" style="text-align: center;">
                                    <button class="button button2" id="sellTej" style="width: 250px;">Sell Tej</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div><br><br>
               <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Latest Transaction</h4>
                                    <p class="category">Latest Transaction</p>
                                </div>
                    			<div class="row">
                    			<?php 
                    			//printing all transcation details
                    			if(isset($Alltransactiondetails))
                    			{
                    				if(count($Alltransactiondetails)==0)
									{
										echo "<br><br><h4 style='margin: 0px;'>You Don't Have Any Transactions</h4>";
									}
									else
									{	echo "
                                    
                            			<div class='table-responsive'>
                            			<table class='table table-hover' style='margin-left: 30px;'>
                                		<thead>
                                    	<tr>
                                        <th>Receiver email</th>
                                        <th>Amount</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Transaction Date</th>
                                    	</tr>
                                		</thead>
                                		<tbody>";
                                     
                                  		 foreach ($Alltransactiondetails as $row){
											echo "<tr>
                                            <td>". $row->Receiver_email."</td>
                                            <td>". $row->Amount."</td>
											<td>". $row->Amount."</td>
											<td>". $row->Transaction_Date."</td>
                                            <td>". $row->Description."</td>";
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
<?php include('template/Footer_inner.php');
?>