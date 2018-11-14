<?php
    defined("HOST") ? null : define("HOST", $_SERVER['HTTP_HOST']);
    
    defined("SITE_URL") ? null : define("SITE_URL", "http://".HOST);
    
    $scriptname = $_SERVER['SCRIPT_FILENAME'];
    
    $pagename = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */

    
	//$merchant_key = 'tXXKb1WX';
	//$salt = '0u3pLmEIrD';
	
	$merchant_key = 'gtKFFx'; //test keys
	$salt = 'eCwWELxi';
	
	$payu_base_url = ' https://test.payu.in';
	//success url
    $surl = SITE_URL."/payment_successful.php";
    
    //failure url
    $furl = SITE_URL."/payment_failure.php";
    
    //cancel url
    $curl = SITE_URL."/payment_failure.php";
?>