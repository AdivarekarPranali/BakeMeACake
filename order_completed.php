<?php
    require_once("includes/initialize.php");   
	session_start();   
	require_once("logincheck_customer.php");	
	
	if(isset($_SESSION['cart_item']))
	{
		if($_SESSION['cart_shipping_id'] == "" || !isset($_SESSION['cart_shipping_id']))
		{
			header('Location: checkout.php');
			exit;
		}
		
		$item_total = 0;
		foreach ($_SESSION["cart_item"] as $item)
		{
			$item_total += ($item["price"]*$item["quantity"]);			
		}
		$amount = $item_total + 50;
		
		$_SESSION['cart_total'] = $amount;
		
		
		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		
		$error_display = "display-hide";
		$success_display = "display-hide";
		
		  
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
									   VALUES('".$_SESSION['sess_user_id']."','".$_SESSION['cart_shipping_id']."','".$delivery_date."','".$_SESSION['cart_total']."','Pending','".$txnid."','COD')";
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
		header('Location: products.php');
		exit;
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
									unset($_SESSION['cart_shipping_id']);
							?>
									<div class="vendors-list-title">
										<h3>Congratulations!</h3>
									</div>
									<div class="vendors-list" id="vendors-list">
										<h4>Order Successfull</h4>
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