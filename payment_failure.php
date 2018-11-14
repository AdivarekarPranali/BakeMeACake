<?php require_once("includes/initialize.php");?>
<?php session_start();
	require_once("logincheck_customer.php");
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
								<div class="vendors-list-title">
									<h3>Payment Failure</h3>
								</div>
								<div class="vendors-list" id="vendors-list">
									<h4> Sorry your payment was not successful. Please try again later.</h4>
								</div>						
							</div>
						</div>
					</div>
				</div>
			</div>
		 </div> 
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>