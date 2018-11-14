<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'cake_shop';    
    $con = @mysqli_connect($hostname, $username, $password, $dbname);
    if(mysqli_connect_errno())
    {
        echo 'Error in connecting to DB ' . mysqli_connect_error();
        exit;
    }
?>