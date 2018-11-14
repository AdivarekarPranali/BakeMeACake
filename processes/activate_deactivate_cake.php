<?php
    require_once("../includes/initialize.php");    
    
    $jsonarray = array();

    $id = mysqli_real_escape_string($con, $_POST["cake_id"]);
    $active = mysqli_real_escape_string($con, $_POST["update_status"]);
    if($active == 1)
    {
        $action = "activating"; 
        $action_success = "activated";
        $button = "<a id='actdect".$id."' onclick=\"activate_deactivate_cake('0','".$id."');\" href='javascript:void(0);' title='Deactivate Cake'><i title='Deactivate Cake' class='fa fa-thumbs-down'></i></a>";
		$text = "<a id='actdecttext".$id."' onclick=\"activate_deactivate_cake('0','".$id."');\" href='javascript:void(0);'  title='Deactivate Cake'>Active</a>";
    }
    else
    {
        $action = "deactivating"; 
        $action_success = "deactivated";
        $button = "<a id='actdect".$id."' onclick=\"activate_deactivate_cake('1','".$id."');\" href='javascript:void(0);'  class='sepV_a' title='Activate Cake'><i title='Activate Cake' class='fa fa-thumbs-up'></i></a>";
		$text = "<a id='actdecttext".$id."' onclick=\"activate_deactivate_cake('1','".$id."');\" href='javascript:void(0);'  title='Activate Cake'>Deactive</a>";
    }
    
    $sql = "UPDATE product
            SET p_active = ".$active.", p_modifiedon = NOW()
            WHERE p_id = '".$id."'";    
    $result = mysqli_query($con, $sql);
    if(mysqli_affected_rows($con) > 0)
    {       
        $error = 0;
        $errormsg = "Cake successfully ".$action_success.".";
        $jsonarray["error"] = $error;
        $jsonarray["message"] = $errormsg;
        $jsonarray["button"] = $button;
		$jsonarray["text"] = $text;
        echo json_encode($jsonarray);
        exit;
    }
    else
    {     
        $error = 1;
        $errormsg = "Error ".$action." Cake. Please try again later.".$sql;
        $jsonarray["error"] = $error;
        $jsonarray["message"] = $errormsg;
        echo json_encode($jsonarray);
        exit;        
    }
?>