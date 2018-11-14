<?php require_once("includes/initialize.php");?>
<?php
	session_start(); // Starting Session
	$error = ''; // Variable To Store Error Message
	$error_display = "display-hide";
	if (isset($_POST['submit'])) 
	{			
		if (empty($_POST['username']) || empty($_POST['password'])) 
		{
			$error = "Please fill all required fields.";
			$error_display = "";
		}
		else
		{
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			//$connection = mysqli_connect("localhost", "root", "");
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($con,$username);
			$password = mysqli_real_escape_string($con,$password);
			// Selecting Database
			//$db = mysql_select_db("project", $connection);
			// SQL query to fetch information of registerd users and finds user match for candidate.
			$query = mysqli_query($con, "select * from login where password='".md5($password)."' AND username='$username' AND type=1");
			$query1 = mysqli_query($con, "select * from login where password='".md5($password)."' AND username='$username' AND type=2");
			$rows = mysqli_num_rows($query);
			$rows1 = mysqli_num_rows($query1);

			if ($rows) 
			{
				
				//$_SESSION['login_user']=$username; // Initializing Session
				$result= mysqli_query($con, "select * from customer where c_pass='".md5($password)."' AND c_uname='".$username."'");				
				$userData = mysqli_fetch_array($result);
					session_regenerate_id();
					$_SESSION['sess_user_id'] = $userData['c_id'];
					$_SESSION['login_user'] = $userData['c_uname'];
					$_SESSION['type']='customer';
				header("Location: dashboard.php"); // Redirecting To Other Page
			}
				
			
				
			else if($rows1)
			{
				$result1= mysqli_query($con, "select * from vendor where v_pass='".md5($password)."' AND v_uname='".$username."'");
				$userData = mysqli_fetch_array($result1);
				session_regenerate_id();
				$_SESSION['sess_user_id'] = $userData['v_id'];
				$_SESSION['login_user'] = $userData['v_uname'];
				$_SESSION['type']='vendor';			
				
				header("Location: upload-product.php"); // Redirecting To Other Page
			}
			
			else
			{
				$error = "Invalid Username or Password.";
				$error_display = "";				
			}
				
			mysqli_close($con); // Closing Connection
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
                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 col-xs-12">
                    <div class="tb-login-form ">
                        <h5 class="tb-title">Login</h5>
						                   
						<div class="alert alert-danger alert-dismissible <?php echo $error_display;?>" role="alert">
						  <strong><?php echo $error;?></strong>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						  </button>
						</div>						
                        <form action="" method="POST">
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">
                                    Username
                                    <em>*</em>
                                </label>
                                <input type="text" name="username" id="username">
                            </p>
                            <p class="checkout-coupon top-down log a-an">
                                <label class="l-contact">
                                    Password
                                    <em>*</em>
                                </label>
                                <input type="password" name="password" id="password">
                            </p>
                            <div class="forgot-password1">
                                <label class="inline2">
                                    <input type="checkbox" name="rememberme7"> Remember me! <em>*</em>
                                </label>
                                <a class="forgot-password" href="#">Forgot Your password?</a>
                            </div>
                            <p class="login-submit5">
                                <input class="button-primary" type="submit" id="submit" name="submit" value="login">
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