<?php
    require_once("includes/initialize.php");   
	session_start();   
	require_once("logincheck_customer.php");
		
	$error_display = "display-hide";
	$success_display = "display-hide";
	
    if(count($_POST)>0)
    {
        $erroroccured = 0;
        $status = mysqli_real_escape_string($con, $_POST["status"]);
        $firstname = mysqli_real_escape_string($con, $_POST["firstname"]);
        $amount = mysqli_real_escape_string($con, $_POST["amount"]);
        $txnid = mysqli_real_escape_string($con, $_POST["txnid"]);
        $posted_hash = mysqli_real_escape_string($con, $_POST["hash"]);
        $key = mysqli_real_escape_string($con, $_POST["key"]);
        $productinfo = mysqli_real_escape_string($con, $_POST["productinfo"]);
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $mobile_no = mysqli_real_escape_string($con, $_POST["phone"]);        
        $payumoney_id = mysqli_real_escape_string($con, $_POST["payumoneyId"]);

        if(isset($_POST["additionalCharges"]))
        {
            $additionalCharges = mysqli_real_escape_string($con, $_POST["additionalCharges"]);
            $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        }
        else
        {	  
            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;			
        }
		//$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
        $hash = hash("sha512", $retHashSeq);

        if ($hash != $posted_hash)
        {
             $error = "Invalid Transaction. Please try again";
             $erroroccured = 1;
        }
        else 
        {
           
            if($status == "success")
            {
                 //start transaction
                $sql = "START TRANSACTION";
                $result = mysqli_query($con, $sql);
                if(!$result)
                {
                    $error = "Something went wrong while starting transaction. Please try again later.";
                    $erroroccured = 1;
                }
				
				if($erroroccured == 0)
				{					
					$delivery_date = $_SESSION['cart_delivery'];			
					$delivery_date = date('Y-m-d', strtotime($delivery_date));		
					
					//update cakeorder table
					$sql_insert_cake_order = "INSERT INTO cake_order(c_id,shipping_id,delivery_date,total_cost,order_status,transid,transtype) 
											   VALUES('".$_SESSION['sess_user_id']."','".$_SESSION['cart_shipping_id']."','".$delivery_date."','".$_SESSION['cart_total']."','Pending','".$txnid."','PAYUMONEY')";
					$result_insert_cake_order = mysqli_query($con, $sql_insert_cake_order);
					if(mysqli_affected_rows($con) <= 0)
					{					
						$error = "Something went wrong, while updating cake order status Please try again later.";
						$erroroccured = 1; 
					}
					else
					{
						//inserting product detials into order detials
						$order_id = mysqli_insert_id($con);
						
						if(isset($_SESSION["cart_item"]))
						{							
							foreach ($_SESSION["cart_item"] as $item)
							{								
								$sql_insert_order_details = "INSERT into order_details(order_id,p_id,price,quantity,notes,product_status)
														VALUES('".$order_id."','".$item['id']."','".$item["price"]."','".$item["quantity"]."','".$_SESSION["cart_message"]."','Pending')";
								$result_insert_order_details = mysqli_query($con, $sql_insert_order_details);
								if(mysqli_affected_rows($con) <= 0)
								{
									$error = "Something went wrong, while updating order details. Please try again later.".$sql_insert_order_details;
									$erroroccured = 1; 
									break;
								}								
							}							
						}																		
					}					
				}
						

				if($erroroccured == 0)
				{	
					 //commit transaction
					$sql = "COMMIT";
					$result = mysqli_query($con, $sql);
					if(!$result)
					{
						mysqli_query($con, "ROLLBACK");
						$error = "Something went wrong while committing transaction. Please try again later.";
						$erroroccured = 1;
					}	
					$error_display = "display-hide";
					$success_display = "";	
					$success = "Payment Successfull.";
					
				}
				else
				{
					mysqli_query($con, "ROLLBACK");                    
                    $erroroccured = 1;
					$error_display = "";
					$success_display = "display-hide";	
				}              
            }
            else
            {
				$error_display = "";
                $erroroccured = 1;
                $error = "Something went wrong, payment transaction failed. Please try again later.";
            }
        }
    }
    else
    {
		$error_display = "";
        $erroroccured = 1;
        $error = "Something went wrong. Please try again later.";        
    }       
?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
<?php require_once('breadcrumbs.php');?>
  		 <!-- shop-page-start -->
		 <div class="shop-product-area">
			<div class="container">
				<div class="row">				
					<div class="col-lg-12 col-md-12 col-sm-12">					    
						<div class="category-products">
							<div class="row">
							<?php
								if($erroroccured == 0)
								{
									unset($_SESSION['cart_item']);
									unset($_SESSION['cart_total']);
									unset($_SESSION['cart_message']);
									unset($_SESSION['cart_delivery']);									
							?>
									<div class="vendors-list-title">
										<h3>Congratulations</h3>
									</div>
									<div class="vendors-list" id="vendors-list">
										<h4><?php echo $success;?></h4>
									</div>
							<?php
								}
								else
								{
							?>
									<div class="vendors-list-title">
										<h3>Sorry!!</h3>
									</div>
									<div class="vendors-list" id="vendors-list">
										<h4><?php echo $error;?></h4>										
									</div>
							<?php
								}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
		 </div>
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>