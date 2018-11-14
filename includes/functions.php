<?php
    function logincheck($role)
    {
        global $con;
        $return = 0;
        if(isset($_COOKIE["USER_FNAME"]) && isset($_COOKIE["USER_ID"]) && isset($_COOKIE["USER_TOKEN"]))
        {
            //sql query
            $sql = 'SELECT lname FROM user WHERE id="'.$_COOKIE["USER_ID"].'" AND token ="'.$_COOKIE["USER_TOKEN"].'" AND role="'.$role.'"';            
            $result = mysqli_query($con, $sql);
            if($myrow = mysqli_fetch_array($result))
            {
                $return = 1;
            }
            else
            {
                $return = 0;
            }
        }
        return $return;
    }
    
    function logincheck_user()
    {
        global $con;
        $return = 0;
        if(isset($_COOKIE["USER_FNAME"]) && isset($_COOKIE["USER_ID"]) && isset($_COOKIE["USER_TOKEN"]))
        {
            //sql query
            $sql = 'SELECT fname FROM clients WHERE id="'.$_COOKIE["USER_ID"].'" AND token ="'.$_COOKIE["USER_TOKEN"].'"';            
            $result = mysqli_query($con, $sql);
            if($myrow = mysqli_fetch_array($result))
            {
                $return = 1;
            }
            else
            {
                $return = 0;
            }
        }
        return $return;
    }
    
    function randomPassword() 
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    //generate random username
    function generate_alphanum_5char() 
    {
        $generate_alphanum_5char = strtoupper(substr(uniqid(), 1, 5));
        return $generate_alphanum_5char;
    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function verify_time_format($value) 
    {
        $pattern1 = '/^(0?\d|1\d|2[0-3]):[0-5]\d:[0-5]\d$/';
        //$pattern2 = '/^(0?\d|1[0-2]):[0-5]\d\s(am|pm)$/i';
        return preg_match($pattern1, $value);
    }
    
    function time_12_to_24_hours($time_in_12_hours)
    {
        $time_in_24_hour_format  = date("H:i:s", strtotime($time_in_12_hours));        
        return $time_in_24_hour_format;
    }
    
    function time_24_to_12_hours($time_in_24_hours)
    {
        $time_in_12_hour_format  = date("h:i A", strtotime($time_in_24_hours));        
        return $time_in_12_hour_format;
    }
    
    function sendmail($email, $message, $subject)
    {
        //send mail to member
        $email_subject = $subject;
        
        $mailbody = $message;        

        require_once("class.phpmailer.php");
        $reply_address = CONTACTUS_REPLY_ADD;
        $reply_person_name = CONTACTUS_REPLY_NAME;
        $from_address = CONTACTUS_FROM_ADD;
        $from_name = CONTACTUS_FROM_NAME;
        $alt_body = "To view the message, please use an HTML compatible email viewer!";

        $mail = new PHPMailer(); // defaults to using php "mail()"

        if(USE_SMTP_SERVER==1)
        {
            $mail->IsSMTP(); // telling the class to use SMTP
            // 1 = errors and messages
            // 2 = messages only
            $mail->SMTPDebug  = SMTP_DEBUGGING;                     // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = SMTP_HOST; // sets the SMTP server
            $mail->Port       = SMTP_HOST_PORT;                    // set the SMTP port for the GMAIL server
            $mail->Username   = SMTP_HOST_USERNAME; // SMTP account username
            $mail->Password   = SMTP_HOST_PASSWORD;        // SMTP account password                
        }                

        $body = $mailbody;
        $mail->SetFrom($from_address, $from_name);
        $mail->AddReplyTo($reply_address,$reply_person_name);

        $mail->AddAddress($email);

        $mail->Subject = $email_subject;
        $mail->AltBody = $alt_body; // optional, comment out and test
        $mail->MsgHTML($body);
        if(!$mail->Send())
        {
            $return = FALSE;
        }
        else
        {
            $return =  TRUE;
        }
        return $return;
    }
    
    function check_profile_status($currentpage)
    {
        global $con;
        $return = $currentpage;
        $user_id = mysqli_real_escape_string($con, $_COOKIE["USER_ID"]);
        
        //sql query
        $sql_check_status = 'SELECT * FROM clients_profile_status WHERE clients_id="'.$user_id.'"';            
        $result_check_status = mysqli_query($con, $sql_check_status);
        if($myrow_check_status = mysqli_fetch_array($result_check_status))
        {                
            $primary_info = $myrow_check_status['primary_info'];
            $body_composition = $myrow_check_status['body_composition'];
            $lifestyle = $myrow_check_status['lifestyle'];
            $medical_condition = $myrow_check_status['medical_condition'];
            $food_record = $myrow_check_status['food_record'];
            
            if($primary_info == 0)
            {
                $return = 'member_basic_info.php'; 
                goto end_check_profile_status;
            }
            elseif($body_composition == 0)
            {
                $return = 'member_body_composition.php';
                goto end_check_profile_status;
            }
            elseif($lifestyle == 0)
            {
                $return = 'member_lifestyle.php';
                goto end_check_profile_status;
            }
            elseif($medical_condition == 0)
            {
                $return = 'member_medical_condition.php';
                goto end_check_profile_status;
            }
            elseif($food_record == 0)
            {
                $return = 'member_food_record.php';
                goto end_check_profile_status;
            }
        }
        else
        {
            $return = 'member_basic_info.php';
        }        
        
        end_check_profile_status:
        return $return;
    }
?>