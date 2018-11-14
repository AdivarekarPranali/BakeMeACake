<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CREAMYCAKE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    
    <!--google-fonts-->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css' />
    
    <!-- all css here -->
    
    <!-- master CSS
    ============================================ -->			
    <link rel="stylesheet" href="css/master.css">
	
	<!-- PAGEWISE CSS -->
	<?php
		if(stristr($scriptname, "registration-customer.php") || stristr($scriptname, "checkout.php"))
		{
	?>
			<link rel="stylesheet" type="text/css" href="js/datepicker/datepicker3.css" media="screen">
	<?php
		}
	?>
	
    
    <!-- modernizr js -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
	<!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
	
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- home-page-2 start -->
    <div class="home-page-2">