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
								<div class="toolbar">									
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
										<div class="limiter">
											<label>Select your area</label>
											<select style="width: 20%;" id="select-area" name="select-area">							  
												<option selected="true" disabled="disabled">Choose Area</option>    
											  <?php
												$select_area = "Select distinct(v_area) from vendor
																ORDER By v_area ASC";
												$result_area = mysqli_query($con, $select_area);
												if($result_area && $myrow_area = mysqli_fetch_array($result_area))
												{
													do
													{
											  ?>
														<option value="<?php echo $myrow_area['v_area'];?>"><?php echo $myrow_area['v_area'];?></option>
											  <?php								
													}
													while($myrow_area = mysqli_fetch_array($result_area));
												}
											  ?>
											</select>											
										</div>
									</div>									
								</div>
							</div>
							<div class="row">
								<div class="vendors-list-title">
									<h3>Vendors List</h3>
								</div>
								<div class="vendors-list" id="vendors-list">
						<?php
							$query = "select * from vendor ORDER BY RAND()";							
							$result = mysqli_query($con, $query);

							if ($result)
							{
								while($row = mysqli_fetch_array($result))
								{
									$vendor_id = $row['v_id'];
									$vendor_name = $row['v_name'];
									$logo = $row['v_logo'];
										//echo base64_encode($logo);
									$link = SITE_URL.'/product.php?vendor='.$vendor_name;
						?>		
									<div class="col-lg-3 col-md-3 col-sm-4">
										<div class="single-product">		
											<div class="product-thumb">
												<a href="javascript:void(0)" onclick="submission('<?php echo $vendor_id;?>','vendor_id')"><img src="img/products/cake.jpg" alt="" class="img-responsive" /><?php echo '<!--<img src="data:image/jpeg;base64,'.base64_encode($logo).'"/>-->';?></a>
											</div>
											<div class="product-desc">
												<h2 class="product-name text-center"><a class="product-name" href="javascript:void(0)" onclick="submission('<?php echo $vendor_id;?>','vendor_id')"><?php echo $vendor_name;?></a></h2>
												<!--<div class="price-box floatleft">
													<p class="old-price">$170.00</p>
													<p class="normal-price">$155.00</p>
												</div>-->
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
			</div>
		 </div>
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>