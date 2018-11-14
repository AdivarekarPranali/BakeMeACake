<?php
	
	if($vendor != "")
	{
		$sql_vendor_details = "SELECT v_name, v_contact, v_bldg, v_street, v_area, v_city, v_provience, v_email, v_website, v_timings, v_logo
								FROM vendor
								Where v_id = '".$vendor."'";
		$result_vendor_details = mysqli_query($con, $sql_vendor_details);
		if(mysqli_num_rows($result_vendor_details) != 0)
		{
			while($row = mysqli_fetch_array($result_vendor_details))
			{
				$vendorid = $row['v_id'];
				$vendorname = $row['v_name'];
				$vendoradd = "".$row['v_bldg'].", ".$row['v_street'].", ".$row['v_area'].", ".$row['v_city'];
				$timings = $row['v_timings'];
				$contact = $row['v_contact'];
				$vendorlogo = $row['v_logo'];
			}
		}
?>							
							
							<div class="left-sidebar">
							<div class="left-sidebar-title">
								<h3>Vendor Details</h3>
							</div>
							<!-- single-sidebar-start -->
							<div class="single-sidebar">
								<h3 class="single-sidebar-title"><?php echo $vendorname;?></h3>								
							</div>
							
							<!-- single-sidebar-end -->
							<div class="single-sidebar den">
								<div class="single-banner">
									<?php echo '<img src="data:image/jpg;base64,'.base64_encode($vendorlogo).'"/>';?></a>
									<!--<a href="#"><img src="img/banners/banner-left.jpg" alt="" /></a>-->
								</div>
							</div>
							
							<div class="single-banner">
								<p>Address: <?php echo $vendoradd;?><br>
								Timings: <?php echo $timings;?><br>
								Contact: <?php echo $contact;?><br><br/></p>
							</div>
						</div>
<?php
	}
	if($vendor == "")
	{
		//echo '<div class="left-sidebar">';
		include('customer-sidebar.php');
	}
?>
							<!-- single-sidebar-start 
							<div class="single-sidebar">
								<h3 class="single-sidebar-title">Product Filter</h3>
								<div class="sidebar-content">
									<div class="price_filter">
										<div id="slider-range"></div>
										<div class="price_slider_amount">
											<input type="text" id="amount" name="price"  placeholder="Add Your Price" />
											<a href="#" class="cart-button">show</a>  
										</div>
									</div>
									
								</div>
							</div>-->
							<!-- single-sidebar-end -->
							<!-- single-sidebar-start -->
					<!--		<div class="single-sidebar">
								<h3 class="single-sidebar-title">Manufacturer</h3>
								<ul>
									<li><a href="#">Chanel</a></li>
									<li><a href="#">Gabbana</a></li>
									<li><a href="#">Nike</a></li>
									<li><a href="#">Vogue</a></li>
									<li><a href="#">Vogue</a></li>
								</ul>
							</div>
							<!-- single-sidebar-end -->
							<!-- single-sidebar-start -->
					<!--		<div class="single-sidebar">
								<h3 class="single-sidebar-title">Color</h3>
								<ul>
									<li><a href="#">Blue</a></li>
									<li><a href="#">Red</a></li>
									<li><a href="#">Nike</a></li>
									<li><a href="#">White</a></li>
									<li><a href="#">Yellow</a></li>
								</ul>
							</div>
							
							<!-- single-sidebar-end -->
							
						