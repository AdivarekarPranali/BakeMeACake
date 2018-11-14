<?php require_once('includes/initialize.php');?>
<?php session_start();
	if($_SESSION['type'] == 'customer')
	{
		$_SESSION = array();
		session_destroy();
		header("Location: login.php");
		exit;
	}
?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
    <!-- shop-page-start -->
    <div class="blog-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="blog-all">
					
				<?php 
					//query for order details customer details and shipping address details
					$sql_query = "SELECT c.c_name, c.c_contact, c.c_email, co.c_id, co.shipping_id, s.first_name, s.middle_name, s.last_name, s.address, s.city, s.state, s.pin_code, s.country
								  FROM customer c, shipping_address s, cake_order co
								  WHERE co.order_id = 15 
									AND c.c_id = co.c_id
									AND s.shipping_id = co.shipping_id 
								  ";								
					$count_order = 0;
					$result = mysqli_query($con,$sql_query);
					if($result)
					{
						while($row = mysqli_fetch_array($result))
						{
							$customer_id = $row['c_id'];
							$customer_name = $row['c_name'];
							$customer_contact = $row['c_contact'];
							$customer_email = $row['c_email'];
							$shipping_id = $row['shipping_id'];
							$shipping_first_name = $row['first_name'];
							$shipping_middle_name = $row['middle_name'];
							$shipping_last_name = $row['last_name'];
							$shipping_address = $row['address'];
							$shipping_city = $row['city'];
							$shipping_pincode = $row['pin_code'];
							$shipping_state = $row['state'];
							$shipping_country = $row['country'];
				?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="posttitle">
                                    <div class="blog-top">
                                        <h2>Customer Details</h2>
                                        <h4>(who placed order)</h4>
                                    </div>
                                    <div class="blog-bottom">
                                        <p>Name : <?php echo $customer_name ?></p>
										<p>Contact : <?php echo $customer_contact ?></p>
										<p>Email : <?php echo $customer_email ?></p>
                                    </div>
									<div class="blog-top">
                                        <h2>Shipping Details</h2>
                                        <h3>(Delivery details)</h3>
                                    </div>
                                    <div class="blog-bottom">
                                        <p>First Name : <?php echo $shipping_first_name ?></p>
										<p>Middle Name : <?php echo $shipping_middle_name ?></p>
										<p>Last Name : <?php echo $shipping_last_name ?></p>
										<p>Address : <?php echo $shipping_address ?></p>
										<p>City : <?php echo $shipping_city ?></p>
										<p>Pin Code : <?php echo $shipping_pincode ?></p>
										<p>State : <?php echo $shipping_state ?></p>
										<p>Country : <?php echo $shipping_country ?></p>
									</div>
                                </div>
								<div class="buttons clearfix">
									<div class="pull-left">
										<a class="btn btn-default ce5" href="orders.php">Back</a>
									</div>
								</div>
                            </div>
                        </div>
				<?php
						}
					}
				?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- shop-page-end -->
    
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>    