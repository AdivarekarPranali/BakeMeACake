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
                             <h2>Orders</h2>
                        </div>					
						<div class="category-products">														
						<?php							
								//query for vendor products
								$sql_query = "SELECT p.p_name, od.p_id, od.price, od.quantity, od.od_id, od.order_id, od.notes, od.product_status 
											  FROM order_details od, product p 
											  WHERE p.v_id = '".$vendor."' 
												AND p.p_id = od.p_id 
											  ORDER by od.od_id DESC";								
								$count_order = 0;
								$result = mysqli_query($con,$sql_query);
								if($result)
								{
						?>
									<div class="user-order-review table-responsive">
										<table>
											<thead>
												<tr>
													<td>Sr no.</td>
													<td>Product Name</td>
													<td>Qty</td>
													<td>Price</td>
													<td>Notes</td>
													<td>Order Status</td>
													<td>Action</td>
												</tr>
											</thead>
											<tbody>
									<?php
										while($row = mysqli_fetch_array($result))
										{
											$count_order++;
											$product_id = $row['p_id'];
											$product_name = $row['p_name'];
											$product_price = $row['price'];
											$quantity = $row['quantity'];
											$order_id = $row['order_id'];
											$order_note = $row['notes'];											
											$order_status = $row['product_status'];
											
							?>
										<tr>
											<td> <?php echo $count_order;?></td>
											<td class="first-column">
												<h3><?php echo $product_name;?></h3>
											</td>
											<td> <?php echo $quantity;?></td>
											<td class="p-price">₹ <?php echo $product_price;?></td>
											<td><?php echo $order_note;?></td>
											<td><?php echo $order_status;?></td>
										<td><?php echo '<a href="order-details.php?id='.$order_id.'">Order Details</a> | <a href="#">Completed</a>';?></td>											
										</tr>
							<?php											
										}
						?>				
											</tbody>
										</table>
									</div>									
						<?php
								}
								else
								{
						?>
									<div class="row">
										<div class="col-md-12">
											<p>No Order Found!</p>
										</div>
									</div>
						<?php
									
								}
						?>
								</br>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		 </div>
		 <!-- shop-page-end -->		
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>