<?php
    require_once("../includes/initialize.php");            
    session_start();
	
    $jsonarray = array();   
	$firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
	$middlename = mysqli_real_escape_string($con, $_POST["middlename"]);
	$lastname = mysqli_real_escape_string($con, $_POST["lastname"]);
	$address = mysqli_real_escape_string($con, $_POST["address"]);
	$company = mysqli_real_escape_string($con, $_POST["company"]);
	$city = mysqli_real_escape_string($con, $_POST["city"]);
	$state = mysqli_real_escape_string($con, $_POST["state"]);
	$pincode = mysqli_real_escape_string($con, $_POST["pincode"]);
	$country = mysqli_real_escape_string($con, $_POST["country"]);
	$contact = mysqli_real_escape_string($con, $_POST["contact"]);
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$msg = mysqli_real_escape_string($con, $_POST["msg"]);
	$delivery = mysqli_real_escape_string($con, $_POST["delivery"]);
    
	
	
    if($firstname == "" || $lastname == "" || $address == "" || $city == "" || $state == "" || $pincode == "" || $country == "" || $contact == "" || $email == "" || $msg == "" || $delivery == "")
    {        
        $jsonarray = array("error" => 1, "message" => "Please fill all required fields.");
        echo json_encode($jsonarray); 
        exit;
    }   
	
	if(is_numeric($contact))
	{
		if(strlen($contact) > 10 || strlen($contact) < 8)
		{
			$jsonarray = array("error" => 1, "message" => "Invalid Contact Number.");
			echo json_encode($jsonarray); 
			exit;
		}
	}
	else
	{
		$jsonarray = array("error" => 1, "message" => "Contact Number must contain only numbers.");
		echo json_encode($jsonarray); 
		exit;
	}

	if(is_numeric($pincode))
	{
		if(strlen($pincode) > 6 || strlen($pincode) < 6)
		{
			$jsonarray = array("error" => 1, "message" => "Invalid Pincode.");
			echo json_encode($jsonarray); 
			exit;
		}
	}
	else
	{
		$jsonarray = array("error" => 1, "message" => "Pincode must contain only numbers.");
		echo json_encode($jsonarray); 
		exit;
	}	
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$jsonarray = array("error" => 1, "message" => "Invalid email address.");
		echo json_encode($jsonarray); 
		exit;
	}
        
		
	$_SESSION['cart_message'] = $msg;
	$_SESSION['cart_delivery'] = $delivery;
	
	$sql_insert = "INSERT INTO shipping_address(c_id,first_name,middle_name,last_name,company,address,city,state,pin_code,country,contact,email) 
					VALUES(".$_SESSION['sess_user_id'].",'".$firstname."','".$middlename."','".$lastname."','".$company."','".$address."','".$city."','".$state."',".$pincode.",'".$country."',".$contact.",'".$email."')";
	$result_insert = mysqli_query($con, $sql_insert);
	if(mysqli_affected_rows($con) <= 0)
	{
		$jsonarray = array("error" => 1, "message" => "Something went wrong. Please try again later.");
        echo json_encode($jsonarray);   
        exit;		
    }
    else
    {
		$_SESSION['cart_shipping_id'] = mysqli_insert_id($con);
		
        $jsonarray = array("error" => 0, "message" => 'Shipping Address successfully updated.');
		echo json_encode($jsonarray); 
		exit;	
    }    
?>