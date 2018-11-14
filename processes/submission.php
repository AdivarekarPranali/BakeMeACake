<?php
require_once('../includes/initialize.php');
session_start();
$data_for = mysqli_real_escape_string($con, $_POST['data_for']);
$_SESSION[$data_for] = mysqli_real_escape_string($con, $_POST['data']);

$jsonarray = array("error" => 0);
echo json_encode($jsonarray); 
?>