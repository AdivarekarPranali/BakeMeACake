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
			$pagename = mysqli_real_escape_string($con, $_POST['pagename']);
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
			$rows = mysqli_num_rows($query);			

			if ($rows) 
			{
				//$_SESSION['login_user']=$username; // Initializing Session
				$result= mysqli_query($con, "select * from customer where c_pass='".md5($password)."' AND c_uname='$username'");
				$userData = mysqli_fetch_array($result);
					session_regenerate_id();
					$_SESSION['sess_user_id'] = $userData['c_id'];
					$_SESSION['login_user'] = $userData['c_uname'];
					$_SESSION['type']='customer';
				header("Location: ".$pagename.".php"); // Redirecting To Other Page
			}
				
							
			else
			{
				header("Location: ".$pagename.".php?error=1");
				$error = "Invalid Username or Password.";
				$error_display = "";				
			}
				
			mysqli_close($con); // Closing Connection			
		}
	}
?>