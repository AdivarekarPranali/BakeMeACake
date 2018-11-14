<?php
    require_once("../includes/initialize.php");            
    session_start();
	
    $jsonarray = array();   
	$shipping_id = mysqli_real_escape_string($con, $_POST["address"]);
	$msg = mysqli_real_escape_string($con, $_POST["msg"]);
	$delivery = mysqli_real_escape_string($con, $_POST["delivery"]);
    
	
	
    if($shipping_id == "" || $msg == "" || $delivery == "")
    {        
        $jsonarray = array("error" => 1, "message" => "Please fill all required fields.");
        echo json_encode($jsonarray); 
        exit;
    }    
        
		
	$_SESSION['cart_message'] = $msg;
	$_SESSION['cart_delivery'] = $delivery;
	$_SESSION['cart_shipping_id'] = $shipping_id;
		
		
	$jsonarray = array("error" => 0, "message" => 'Shipping Address successfully updated.');
	echo json_encode($jsonarray); 
	exit;	    
?>
