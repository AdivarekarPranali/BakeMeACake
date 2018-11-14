<?php require_once('includes/initialize.php');?>
<?php session_start();
	require_once("logincheck_vendor.php");
	$vendor = $_SESSION['sess_user_id'];     	
?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
<?php require_once('breadcrumbs.php');?>
		 <!-- shop-page-start -->
		 <div class="shop-product-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12">
						<?php require_once('vendor-sidebar.php');?>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12">
						<div class="area-title bdr">
                             <h2>My Products</h2>
                        </div>					
						<div class="category-products">														
						<?php							
								//query for vendor products
								$sql_query = "SELECT * FROM product WHERE v_id = ".$vendor;								
								$count_product = 0;
								$result = mysqli_query($con,$sql_query);
								if($result)
								{
									while($row = mysqli_fetch_array($result))
									{
										$count_product++;
										$product_id = $row['p_id'];
										$product_name = $row['p_name'];
										$product_price = $row['p_pricekg'];
										$product_image = "vendor/thumbnail/".$row['p_image'];
										$product_active = $row['p_active'];
										
										if($product_active == 1)
										{											
											$prod_active_text = "<a id='actdecttext".$product_id."' onclick=\"activate_deactivate_cake('0','".$product_id."');\" href='javascript:void(0);'  title='Deactivate Cake'>Active</a>";
											$prod_active_button = "<a id='actdect".$product_id."' onclick=\"activate_deactivate_cake('0','".$product_id."');\" href='javascript:void(0);'  title='Deactivate Cake'><i title='Deactivate Cake' class='fa fa-thumbs-down'></i></a>";
										}
										else
										{
											$prod_active_text = "<a id='actdecttext".$product_id."' onclick=\"activate_deactivate_cake('1','".$product_id."');\" href='javascript:void(0);'  title='Activate Cake'>Deactive</a>";
											$prod_active_button = "<a id='actdect".$product_id."' onclick=\"activate_deactivate_cake('1','".$product_id."');\" href='javascript:void(0);'  title='Activate Cake'><i title='Activate Cake' class='fa fa-thumbs-up'></i></a>";
										}
										
										if($count_product == 1)
										{
											echo '<div class="row">';
										}
						?>
								<div class="col-lg-4 col-md-4 col-sm-6">
									<div class="single-product">
									<!--	<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
										<div class="product-thumb">
											<a href="#productModal"><img src="<?php echo $product_image; ?>" alt="" /></a>
										</div>
										<div class="product-desc">
											<h2 class="product-name"><a class="product-name" href="#"><?php echo $product_name; ?></a></h2>
											<div class="price-box floatleft">
												<p class="normal-price">₹ <?php echo $product_price; ?></p>
												<p><?php echo $prod_active_text;?></p>
											</div>
											<div class="product-action floatright">
												<a href="edit-product.php?id=<?php echo $product_id;?>" title="Edit Product"><i class="fa fa-edit"></i></a>
												<?php echo $prod_active_button?>
											</div>
										</div>
									</div>
								</div>
						<?php
										if($count_product == 3)
										{
											echo '</div>';
											$count_product = 0;
										}
									}
								}
								else
								{
						?>
									<div class="row">
										<div class="col-md-12">
											<p>No Product Found!</p>
										</div>
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
		 <!-- shop-page-end -->		
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>