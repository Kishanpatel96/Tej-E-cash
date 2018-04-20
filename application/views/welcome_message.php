<?php 
include('template/header_outer.php');
 ?>
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
<section class="main wow fadeInDownBig">
<div class="main__title__container ">
<h1 class="main__title">Tej E-cash </h1>
<h2 class="main__subtitle">The Best of <span>Decentralized Network</span> <br> programs</h2>
</div>												
<video autoplay loop class="main__video" muted src="/assets/images/outerbackgroundVideo.mp4" poster="https://farstcoin.co/resources/assets/img/home/video_poster.png">
</video>
</section>
<!--
<section class="about" style="background: url('https://farstcoin.co/resources/assets/img/home/bg_img2.jpg') top no-repeat;min-height: 100vh; background-size: cover;">
<div class="container">
<div class="about__wrapper wow fadeInDown">
<h3 class="about__title">INTRODUCING <br> <span class="normal__weight">Tej NETWORK</span>
<div class="feature-media media-wrapper" style="margin-top: 10px;width: 100%;">
<iframe src="https://www.youtube.com/embed/83joiZpGt0g" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
</div>
<div class="about__links">
<a href="https://farstcoin.co/signup" rel="nofollow" class="about__link">More About Us
<img src="https://farstcoin.co/resources/assets/img/home/arrow__right.png" height="8" width="15" alt="->" />
</a>
<a href="https://farstcoin.co/signup" rel="nofollow" class="about__link">Careers
<img src="https://farstcoin.co/resources/assets/img/home/arrow__right.png" height="8" width="15" alt="->" />
</a>
</div>
</div>
</div>
</section>-->
<section class="advantages" style="background-image: url('https://farstcoin.co/resources/assets/img/home/bg_img1.jpg');">
<div class="container">
<div class="advantages__card wow fadeInDown">
<div class="advantages__card__icon">
<img src="https://farstcoin.co/resources/assets/img/home/advantage_1.png" height="59" width="62" />
</div>
<p class="advantages__card__paragraph">
Special business scope combining financial solutions and ecosystem.
</p>
</div>
<div class="advantages__card wow fadeInDown">
<div class="advantages__card__icon">
<img src="https://farstcoin.co/resources/assets/img/home/advantage_7.png" height="64" width="62" />
</div>
<p class="advantages__card__paragraph">
Strong Ecosystem allows FRCT payment in various online services.
</p>
</div>
<div class="advantages__card wow fadeInDown">
<div class="advantages__card__icon">
<img src="https://farstcoin.co/resources/assets/img/home/advantage_5.png" height="57" width="62" />
</div>
<p class="advantages__card__paragraph">
No Emotional TOGC trading signals with high successful rate.
</p>
</div>
<div class="advantages__card wow fadeInDown">
<div class="advantages__card__icon">
<img src="https://farstcoin.co/resources/assets/img/home/advantage_4.png" height="64" width="64" />
</div>
<p class="advantages__card__paragraph">
Powerful Community with Understanding and Knowledge.
</p>
</div>
<div class="advantages__card wow fadeInDown">
<div class="advantages__card__icon">
<img src="https://farstcoin.co/resources/assets/img/home/advantage_8.png" height="62" width="66" />
</div>
<p class="advantages__card__paragraph">
High Return Low Risk investment.
</p>
</div>
<div class="advantages__card wow fadeInDown">
<div class="advantages__card__icon">
<img src="https://farstcoin.co/resources/assets/img/home/advantage_2.png" height="62" width="60" />
</div>
<p class="advantages__card__paragraph">
Effective Communication and Technical Support.
</p>
</div>
</div>
</section><!--
<section class="contract">
<div class="affiliate wow fadeInLeft">
<div class="affiliate__wrapper ">
<div class="affiliate__bg" style="background: linear-gradient(180deg,rgba(52,54,58,.3),rgba(52,54,58,.3)),url('https://farstcoin.co/resources/assets/img/home/affiliate.png') no-repeat 50%;background-size: cover;"></div>
<h4 class="affiliate__title">
TOGC THE OCEAN GARBAGE COLLECTOR <br>
</h4>
<div class="feature-media media-wrapper" style="width: 100%;">
<iframe src="https://www.youtube.com/embed/0rwb7zGKti0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
</div>
</div>
</div>
<div class="employer wow fadeInRight">
<div class="employer__wrapper ">
<div class="employer__bg" style="background:linear-gradient(180deg,rgba(54, 105, 195, 0.9),rgba(75, 103, 236, 0.9)),url('https://farstcoin.co/resources/assets/img/home/employer.png') no-repeat 50%;background-size: cover;"></div>
<h4 class="employer__title">
TOGC <br>
TABLE REPORT
</h4>
 <table id="show" data-order='[[ 3, "desc" ]]' data-page-length='10' class="table table-striped">
<thead>
<tr>
<th style="color: #33aee2">Market</th>
<th>Buy At</th>
<th>Result</th>
<th>Time end</th>
<th>Status</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</section>-->
<section class="clients" style="background-image: url('https://farstcoin.co/resources/assets/img/home/bg_img1.jpg')">
<div class="container wow fadeInUp">
<h5 class="clients__title">CHART REPORT TOGC</h5>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
<div class="clients__wrapper">
<div id="chartContainer" style="height: 600px; width: 100%;">
</div>
</div>
</div>
</section><!--
<section class="news-line">
<div class="container">
<div>
<ul id="og-grid" class="og-grid row" style="padding-left: 15px;">

<li class="mix photoshop col-md-3" style="display: inline-block;padding-left: 0px;">
<a href="https://farstcoin.co/new/farst-ico-detail-schedule">
<img src="https://farstcoin.co/public/uploads/1512666885.png" alt="Farst ICO detail schedule">
<div class="hover-mask">
<h3>Tej ICO detail schedule</h3>
</div>
</a>
</li>


<li class="mix photoshop col-md-3" style="display: inline-block;padding-left: 0px;">
<a href="https://farstcoin.co/new/how-to-deposit-and-withdraw">
<img src="https://farstcoin.co/public/uploads/1512669938.png" alt="How to deposit and withdraw?">
<div class="hover-mask">
<h3>How to deposit and withdraw?</h3>
</div>
</a>
</li>


<li class="mix photoshop col-md-3" style="display: inline-block;padding-left: 0px;">
<a href="https://farstcoin.co/new/farst-network-announcement">
<img src="https://farstcoin.co/public/uploads/1512666626.jpg" alt="Farst Network Announcement">
<div class="hover-mask">
<h3>Tej Network Announcement</h3>
</div>
</a>
</li>


<li class="mix photoshop col-md-3" style="display: inline-block;padding-left: 0px;">
<a href="https://farstcoin.co/new/internal-exchange-15-dec-17">
<img src="https://farstcoin.co/public/uploads/1512666586.png" alt="Internal Exchange 15-Dec-17">
<div class="hover-mask">
<h3>Internal Exchange 15-Dec-17</h3>
</div>
</a>
</li>

</ul> 
</div>
</div>
</section>-->
<section class="partners" style="background-image: url('https://farstcoin.co/resources/assets/img/home/bg_img1.jpg')">
<div class="container wow fadeInUp">
<h5 class="partners__title">Why Tej E-cash is unique?</h5>
<div class="partners__carousel__container">
<div class="row">
<div class="col-md-6">
<div class="home-trading__subtitle">The Ocean Garbage Collector</div>
<ul class="home-trading__describtion">
<li class="home-trading__item">
Tej e-cash is usefully to transfer cash from one person to other person with in few second and alos wit less fees . you can buy many things from tej e-cash and pay electronic billa also with tej e-cash.
</li>
</ul>
</div>
<div class="col-md-6">
<div class="home-trading__subtitle">Ecosystem</div>
<ul class="home-trading__describtion">
<li class="home-trading__item">
Tej Network is Ecosystem Project. We are creating the ecosystem that allow FRCT growth.
</li>
</ul>
</div>
</div>
</div>
</div>
</section>
<section class="behind-click" style="background: linear-gradient(180deg,rgba(197, 26, 50, 0.9),rgba(79, 117, 255, 0.9)), no-repeat 50%;background-size: cover;">
<div class="behind-click__wrapper wow fadeInRight">
<img src="https://farstcoin.co/resources/assets/img/home/quote__icon2.png" alt=" '' " class="behind-click__quote" height="55" width="72" />
<h6 class="behind-click__title">
Investment is always risky.
Like any other investments, the perceive value of Tej E-cash can fluctuate.
Please read our details and policies before investment.
The strategy of tej e-cash may change due to market and compliance requirements of external parties.
The administrator of tej e-cash will try to follow the strategy as outline as much as possible; any changes of strategy will be updated asap
We have only one website for announcements and membership registration. All of our social medias will be listed on the website homepage.
Investors are advised to assess the risk of trading in tej e-cash the administrator of this website will take no responsibility for changes in valuation of tej e-cash.
</h6>
</div>
</section>

<div id="login-modal" class="modal fade" role="dialog">
	<div class="Model-Background-Gif">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><strong style="font-size: 24px;font-family: inherit;color: #0f2d9a;">Login </strong></h4>
				</div>
			 	<div class="modal-body" style="height: 400px;">
					<form method="POST" action="<?php echo base_url()?>/Loginandsignup/login" >
                    	<div class="form-group">
    						<label for="inputdefault" style="margin-left: -420px;">Enter Email Address</label>
    						<input class="form-control" name="UserEmail" id="inputdefault" type="email" placeholder="Enter Email Address" required>
  						</div><br>
                    	<div class="form-group">
    						<label for="inputdefault" style="margin-left: -450px;">Enter Password</label>
    						<input class="form-control" name="UserPassword" id="UserPassword" type="password" placeholder="Enter Password" required>
  						</div>
                    	<div class="checkbox">
                       		 	<div class="g-recaptcha" data-sitekey="6LeqNVAUAAAAAHqML8thgmSElczbD3h9uzcjXsgb"></div>
                    	</div>
                    	<button type="submit" name="submit" class="btn btn-primary" style="width: 350px;border-radius: 12px;margin-top: 30px;">Login</button>
					</form>
                	<p style="margin-left: -300px;margin-top: 0px;font-size: 12px;color: #0e0404;">If you Forget Password Then Click This Button</p>
                <button href="#" style="margin-left: 100px;" data-toggle="modal" class="btn btn-primary" data-target="#Forget-modal"  style="border-radius: 12px;">Forget Password</button>
				</div>
			</div>
		</div>
    </div>
</div>
<div id="singup-modal" class="modal fade" role="dialog">
	<div class="Model-Background-Gif">
		<div class="modal-dialog">
			<div class="modal-content text-center" style="height: 600px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><strong style="font-size: 24px;font-family: inherit;color: #0f2d9a;">Sign Up </strong></h4>
				</div>
			 	<div class="modal-body" style="height: 400px;">
					<form method="POST" action="<?php echo base_url()?>/Loginandsignup/signup" >
                    	<div class="form-group">
                        	<div class="col-xs-6">
    							<label for="inputdefault" style="margin-left: -140px;">Enter First Name</label>
    							<input class="form-control" name="firstName" id="firstName" type="text" placeholder="Enter First Name" required>
                            </div>
                        	<div class="col-xs-6">
    							<label for="inputdefault" style="margin-left: -140px;">Enter Last Name</label>
    							<input class="form-control" name="LastName" id="LastName" type="text" placeholder="Enter Last Name" required>
                            </div>
  						</div>
                    	<div class="form-group">
                        	<div class="col-xs-12">
    							<label for="inputdefault" style="margin-left: -400px;">Enter Email Address</label>
    							<input class="form-control" name="UserEmail" id="UserEmail" type="email" placeholder="Enter Email Address" required>
  							</div>
                        	<div class="col-xs-12">
    							<label for="inputdefault" style="margin-left: -350px;">Enter Paypal Email Address</label>
    							<input class="form-control" name="UserpaypalEmail" id="UserpaypalEmail" type="email" placeholder="Enter Paypal Email Address" required>
  							</div>
                        </div>
                    	<div class="form-group">
                        	<div class="col-xs-6">
    							<label for="inputdefault" style="margin-left: -140px;">Enter Password</label>
    							<input class="form-control" name="UserPassword" id="UserPassword" type="password" placeholder="Enter Password" required>
                            </div>
                        	<div class="col-xs-6">
                            	<label for="inputdefault" style="margin-left: -80px;">Enter Confirm Password</label>
    							<input class="form-control" name="UsercnfPassword" id="UsercnfPassword" type="password" placeholder="Enter Confirm Password" required>
                            </div>
  						</div>
                    	<div class="form-group">
                        	<div class="col-xs-12">
    							<label for="inputdefault" style="margin-left: -390px;">Enter Mobile Number</label>
    							<input class="form-control" name="UserNumber" id="UserNumber" type="text" placeholder="Enter Mobile Number" required>
                            </div>
  						</div>
                    	<div class="form-group">
                        	<div class="col-xs-6">
    							<label for="inputdefault" style="margin-left: -180px;">Enter City</label>
    							<input class="form-control" name="UserCity" id="UserCity" type="text" placeholder="Enter City" required>
                            </div>
                        	<div class="col-xs-6">
                            	<label for="inputdefault" style="margin-left: -140px;">Enter Country</label>
    							<input class="form-control" name="UserCountry" id="UserCountry" type="text" placeholder="Enter Confirm Password" required>
                            	
                            </div>
  						</div>
                    	<div class="form-group">
                        	<div class="g-recaptcha" data-sitekey="6LeqNVAUAAAAAHqML8thgmSElczbD3h9uzcjXsgb"></div>
                        </div>
                    	<button type="submit" name="submit" class="btn btn-primary" style="width: 350px;border-radius: 12px;margin-top: 100px;">Sign Up</button>
					</form>
				</div>
			</div>
		</div>
    </div>
</div>
<div id="Forget-modal" class="modal fade" role="dialog">
	<div class="Model-Background-Gif">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><strong style="font-size: 24px;font-family: inherit;color: #0f2d9a;">Forget Password </strong></h4>
				</div>
			 	<div class="modal-body" style="height: 400px;">
					<form method="POST" action="<?php echo base_url()?>/Loginandsignup/forgetPasswordPage" >
                    	<div class="form-group">
    						<label for="inputdefault" style="margin-left: -420px;">Enter Email Address</label>
    						<input class="form-control" name="UserEmail" id="inputdefault" type="email" placeholder="Enter Email Address" required>
  						</div>
                    	<div class="form-group">
                        	<div class="g-recaptcha" data-sitekey="6LeqNVAUAAAAAHqML8thgmSElczbD3h9uzcjXsgb"></div>
                        </div>
                    	<button type="submit" name="submit" class="btn btn-primary" style="width: 350px;border-radius: 12px;margin-top: 30px;">Forget Password</button>
					</form>
				</div>
			</div>
		</div>
    </div>
</div>
<?php include('template/footer_outer.php'); ?>