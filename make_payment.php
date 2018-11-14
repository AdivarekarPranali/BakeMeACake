<?php
    require_once("includes/initialize.php");
	session_start();
	require_once("logincheck_customer.php");
	
	    
    $posted = array();
	
	$sql_user_info = "SELECT * FROM customer WHERE c_id = '".$_SESSION['sess_user_id']."'";
	$result_user_info = mysqli_query($con, $sql_user_info);
	if($result_user_info && $myrow_user_info = mysqli_fetch_array($result_user_info))
	{
		$full_name = $myrow_user_info["c_name"];
        $mobile_no = $myrow_user_info["c_contact"];
        $email_addr = $myrow_user_info["c_email"];
	}
    
	if(isset($_SESSION["cart_item"]))
	{
		$item_total = 0;
		foreach ($_SESSION["cart_item"] as $item)
		{
			$item_total += ($item["price"]*$item["quantity"]);			
		}
		$amount = $item_total + 0;
	}
	else
	{ 
		$amount = 0;
	}
	
	$_SESSION['cart_total'] = $amount;
    
    // Generate random transaction id
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    $product_info = "Cake Booking";
   
    $posted["productinfo"] = $product_info;
    $posted["firstname"] = $full_name;
    $posted["email"] = $email_addr;
    $posted["amount"]= $amount;
    $posted["txnid"]= $txnid;
    $posted["key"]= $merchant_key;    
    
    $hash = '';
    // Hash Sequence
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
    foreach($hashVarsSeq as $hash_var) 
    {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
    }

    $hash_string .= $salt;   

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $payu_base_url . '/_payment';   
    
?>
<html>
    <head>
        <script type="text/javascript">
            var hash = '<?php echo $hash ?>';
            function submitPayuForm()
            {				
                  if(hash == '')
                  {
                      return;
                  }
                  var payuForm = document.forms.payuForm;
                  payuForm.submit();
            }
        </script>
  </head>
  <body onload="submitPayuForm()">
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
        <input type="hidden" name="key" value="<?php echo $merchant_key; ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash; ?>" />
        <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
        <input type="hidden" name="amount" value="<?php echo $amount;?>" />        
        <input type="hidden" name="firstname" id="firstname" value="<?php echo $full_name;?>" />
        <input type="hidden" name="email" id="email" value="<?php echo $email_addr; ?>" />
        <input type="hidden"  name="phone" value="<?php echo $mobile_no;?>" />
        <input type="hidden"  name="productinfo" value="<?php echo $product_info;?>" />
        <input type="hidden"  name="surl" value="<?php echo $surl;?>" />
        <input type="hidden"  name="furl" value="<?php echo $furl;?>" />       
        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />  
    </form>
</body>
</html>  