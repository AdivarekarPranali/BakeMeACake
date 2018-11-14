<?php require_once("includes/initialize.php");?>
<?php
	session_start();   
	if(isset($_SESSION['type']))
	{
		if($_SESSION['type'] == 'customer'){
		header("Location: vendor-selection.php");
		}
		else if($_SESSION['type'] == 'vendor'){
		header("Location: upload-product.php");
		}
	}
	
	//FORM PROCESSING
	
	$error_display = "display-hide";
	$success_display = "display-hide";
	
	if(count($_POST)>0)
    { 			
		$erroroccured = 0;

		$name = mysqli_real_escape_string($con,$_POST['name']);
		$contact= mysqli_real_escape_string($con,$_POST['contact']);
		$building = mysqli_real_escape_string($con,$_POST['building']);
		$street = mysqli_real_escape_string($con,$_POST['street']);
		$area = mysqli_real_escape_string($con,$_POST['area']);
		$city = mysqli_real_escape_string($con,$_POST['city']);
		$country = mysqli_real_escape_string($con,$_POST['country']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$website = mysqli_real_escape_string($con,$_POST['website']);
		$timings = mysqli_real_escape_string($con,$_POST['timings']);
		$uname = mysqli_real_escape_string($con,$_POST['uname']);
		$pass = mysqli_real_escape_string($con,$_POST['pass']);
		//$logo = $_POST['logo'];
		$logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
		if($name == "" || $contact == "" || $building == "" || $street == "" || $area == "" || $city == "" || $country == "" || $email == "" || $timings == "" || $uname == "" || $pass == "")
		{
			$erroroccured = 1;
			$error = "Please fill mandatory fields.";			
			goto end;
		}
		
		if(is_numeric($contact))
		{
			if(strlen($contact) > 10 || strlen($contact) < 8)
			{
				$erroroccured = 1;
				$error = "Invalid Contact Number.";
				goto end;
			}
		}
		else
		{
			$erroroccured = 1;
			$error = "Contact must contain only numbers.";
			goto end;
		}	
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$erroroccured = 1;
			$error = "Invalid email address.";
			goto end;
		}
		else
		{
			$sql_email = "SELECT email
							FROM login
							WHERE email = '".$email."'";
			$result_email = mysqli_query($con, $sql_email);
			if($result_email && $myrow_email = mysqli_fetch_array($result_email))
			{
				$erroroccured = 1;
				$error = "User with similar e-mail id already exist.";
				goto end;
			}       
		}
		
		if(strlen($uname) < 5 || strlen($uname) > 10)
		{
			$erroroccured = 1;
			$error = "Username must be 5-10 Chars.";
			goto end;
		}
		else
		{
			$sql_chk_uname = "Select username from login where username = '" . $uname . "'";			
			$result_chk_uname = mysqli_query($con, $sql_chk_uname);
			if($result_chk_uname && $myrow_chk_uname = mysqli_fetch_array($result_chk_uname))
			{
				$erroroccured = 1;
				$error = "User with similar username already exist.";
				goto end;
			}   
		}
		
		if($erroroccured == 0)
		{
			$sql = "START TRANSACTION";
			$result = mysqli_query($con, $sql);
			
			if(!$result)
			{
				$error = "Something went wrong while starting transaction. Please try again later.";
				$erroroccured = 1;
				goto end;
			}
			
			$sql_vendor = "INSERT INTO vendor(v_name,v_contact,v_email,v_bldg,v_street,v_area,v_city,v_provience,v_website,v_timings,v_uname,v_pass,v_logo)
							VALUES('".$name."',".$contact.",'".$email."','".$building."','".$street."','".$area."','".$city."','".$country."','".$website."','".$timings."','".$uname."','".$pass."', '".$logo."')";
            $result_client = mysqli_query($con, $sql_vendor);
            if(mysqli_affected_rows($con)<=0)
            {
                $erroroccured = 1;
                $error = "Error Adding New Member.".$sql_vendor;
                goto end;
            }
            else
			{
				$sql_login = "INSERT INTO login(username,email,password,type) 
							  VALUES('".$uname."','".$email."','".$pass."','2')";
				$result_login = mysqli_query($con, $sql_login);
				if(mysqli_affected_rows($con)<=0)
				{
					$erroroccured = 1;
					$error = "Error Adding Login Details. Please Try Again Later".$sql_login;
					goto end;
				}
			}
		}
		
		end:
		if($erroroccured == 0)
		{						

			$sql = "COMMIT";
            $result = mysqli_query($con, $sql);
            if(!$result)
            {
                $error = "Something went wrong. Please try again later.";
                $erroroccured = 1;
            }	
			
			$error_display = "display-hide";
			$success_display = "";		
			$error = "";
			$success = "You have been registered successfully!";                        
			
			$name = "";
			$contact= "";
			$building = "";
			$street = "";
			$area = "";
			$city = "";
			$country = "";
			$email = "";
			$website = "";
			$timings = "";
			$uname = "";
			$pass = "";
		
		}
		else
		{		
			mysqli_query($con, "ROLLBACK");	
			$error_display = "";
			$success_display = "display-hide";
			$success = "";			
		}
	}
	

?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
<?php require_once('breadcrumbs.php');?>
    <!-- login content section start -->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 col-xs-12">
                    <div class="tb-login-form ">
                        <h5 class="tb-title">Register As Vendor</h5>
						                   
						<div class="alert alert-danger alert-dismissible <?php echo $error_display;?>" role="alert">
						  <strong><?php echo $error;?></strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>		
						<div class="alert alert-success alert-dismissible <?php echo $success_display;?>" role="alert">
						  <strong><?php echo $success;?></strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>
						
                        <form action="" method="POST" class="user-billing-info" enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Company Name<span class="required">*</span></label>
										<input name="name" id="name" type="text" required="required" tabindex=1 value="<?php echo $name;?>">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Contact Number<span class="required">*</span></label>
										<input name="contact" id="contact" type="text" required="required" tabindex=2 value="<?php echo $contact;?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Building name<span class="required">*</span></label>
										<input name="building" id="building" type="text" required="required" tabindex=3 value="<?php echo $building;?>">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Street name<span class="required">*</span></label>
										<input name="street" id="street" type="text" required="required" tabindex=4 value="<?php echo $street;?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Area<span class="required">*</span></label>
										<input name="area" id="area" type="text" required="required" tabindex=5 value="<?php echo $area;?>">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>City<span class="required">*</span></label>
										<input name="city" id="city" type="text" required="required" tabindex=6 value="<?php echo $city;?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Country<span class="required">*</span></label>
										<input name="country" id="country" type="text" required="required" tabindex=7 value="<?php echo $country;?>">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Email<span class="required">*</span></label>
										<input name="email" id="email" type="email" required="required" tabindex=8 value="<?php echo $email;?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Website</label>
										<input name="website" id="website" type="text" tabindex=9value="<?php echo $website;?>">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Timings<span class="required">*</span></label>
										<input name="timings" id="timings" type="text" required="required" tabindex=10 value="<?php echo $timings;?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Username<span class="required">*</span></label>
										<input name="uname" id="uname" type="text" required="required" tabindex=11 value="<?php echo $uname;?>">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Password<span class="required">*</span></label>
										<input name="pass" id="pass" type="password" required="required" tabindex=12 value="<?php echo $pass;?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="user-info-single">
										<label>Logo<span class="required">*</span></label>
										<input name="logo" id="logo" type="file" required="required" tabindex=13>
									</div>
								</div>
							</div>
                            <p class="login-submit5">
                                <input class="button-primary" type="submit" id="submit" name="submit" value="SUBMIT" tabindex=14>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login  content section end -->
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>
