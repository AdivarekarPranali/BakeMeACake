<?php require_once('includes/initialize.php');?>
<?php session_start();
	//if vendor, then logout and send to login
	if($_SESSION['type'] == 'vendor')
	{
		$_SESSION = array();
		session_destroy();
		header("Location: login.php");
		exit;
	}
	
	$vendor = $_SESSION['vendor_id'];     
	$_SESSION['vendor_id'] = "";
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
							if($vendor == "")
							{
								//query for random products
								$sql_query = "SELECT * FROM product
												WHERE p_active = '1'
												ORDER BY RAND()";								
							}
							else
							{
								//query for vendor products
								$sql_query = "SELECT * FROM product WHERE v_id = ".$vendor." AND p_active = '1'";	
							}
								
								$result = mysqli_query($con,$sql_query);
								if(mysqli_num_rows($result) != 0) 
								{
									while($row = mysqli_fetch_array($result))
									{
										$product_id = $row['p_id'];
										$product_name = $row['p_name'];
										$product_price = $row['p_pricekg'];
										$product_image = "vendor/thumbnail/".$row['p_image'];
						?>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<div class="single-product">
										<a href='javascript:void(0)' onclick='displayproductdetails(<?php echo $product_id;?>)' title="Quick View" class="view-single-product"><i class="fa fa-expand"></i></a>
										<div class="product-thumb">
											<a href='javascript:void(0)' onclick='displayproductdetails(<?php echo $product_id;?>)' title="Quick View"><img src="<?php echo $product_image; ?>" alt="" /></a>
										</div>
										<div class="product-desc">
											<h2 class="product-name"><a class="product-name" href="#"><?php echo $product_name; ?></a></h2>
											<div class="price-box floatleft">
												<p class="normal-price">₹ <?php echo $product_price; ?></p>
											</div>
											<div class="product-action floatright">
												<a  href='javascript:void(0)' onclick="addtocart('add','<?php echo $product_id;?>')" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
											</div>
										</div>
									</div>
								</div>
						<?php
									}
								}
								else
								{
						?>
									<div class="col-md-12">
										<h3>No Product Found!</h3>
									</div>
						<?php
									
								}
						?>								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Product Popup -->
			<div id="quickview-wrapper">
				<div class="modal" id="productModal"></div>
			</div>
		 </div>
		 <!-- shop-page-end -->
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>