<?php
	if(!isset($_SESSION['sess_user_id']))
	{
		header("Location: login.php");
		exit;
	}
	elseif($_SESSION['type'] != 'customer')
	{
		$_SESSION = array();
		session_destroy();
		header("Location: login.php");
		exit;
	}
?>