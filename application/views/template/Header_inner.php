<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/apple-icon.png" />
    <link rel="icon" type="image/png" href="/assets/images/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Tej Coin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard">
    <meta name="description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard by Creative Tim | Free Material Bootstrap Admin">
    <meta itemprop="description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard by Creative Tim | Free Material Bootstrap Admin">
    <meta name="twitter:description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Tej Coin" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://demos.creative-tim.com/material-dashboard/examples/dashboard.html" />
    <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/50/opt_md_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard is a Free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="/assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script>
window.onload = function () {

var limit = 10000;    //increase number of dataPoints by increasing the limit
var y = 100;    
var data = [];
var dataSeries = { type: "line" };
var dataPoints = [];
for (var i = 0; i < limit; i += 1) {
	y += Math.round(Math.random() * 10 - 5);
	dataPoints.push({
		x: i,
		y: y
	});
}
dataSeries.dataPoints = dataPoints;
data.push(dataSeries);

//Better to construct options first and then pass it as a parameter
var options = {
	zoomEnabled: true,
	animationEnabled: true,
	title: {
		text: "Try Zooming - Panning"
	},
	axisY: {
		includeZero: false
	},
	data: data  // random data
};

$("#chartContainer").CanvasJSChart(options);

}
</script>
</head>
<body>