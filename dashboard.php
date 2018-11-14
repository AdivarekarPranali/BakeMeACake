<?php require_once("includes/initialize.php");?>
<?php session_start();?>
<?php require_once('logincheck_customer.php');
	$customer_id = $_SESSION['sess_user_id'];
?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
<?php require_once('breadcrumbs.php');?>
		 <!-- shop-page-start -->
		 <div class="shop-product-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12">
						<?php require_once('customer-sidebar.php');?>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12">
						<div class="area-title bdr">
                             <h2>My Orders</h2>
                        </div>					
						<div class="category-products">
					<?php
						//selecting order id from cake_order
						$sql_order_id = "SELECT * FROM cake_order WHERE c_id = '".$customer_id."' ORDER by order_id DESC";						
						$result_order_id = mysqli_query($con, $sql_order_id);
						if(mysqli_num_rows($result_order_id) > 0)
						{
					?>
							<div class="row">
								<div class="col-md-12">
									<div class="faq-accordion">
										<div class="panel-group pas7" id="accordion" role="tablist" aria-multiselectable="true">
									<?php
										while($myrow_order_id = mysqli_fetch_array($result_order_id))
										{
											$order_id = $myrow_order_id['order_id'];
											$shipping_id = $myrow_order_id['shipping_id'];
											$total_cost = $myrow_order_id['total_cost'];
											$order_status = $myrow_order_id['order_status'];
									?>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading<?php echo $order_id;?>">
													<h4 class="panel-title">
														<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $order_id;?>" aria-expanded="false" aria-controls="collapse<?php echo $order_id;?>"># ORDER NUMBER : <?php echo $order_id;?> <i class="fa fa-caret-down"></i></a>
													</h4>
												</div>
												<div id="collapse<?php echo $order_id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $order_id;?>" aria-expanded="false" >
													<div class="row">
														<div class="easy2">
															<h2>Order Details</h2>
															<div class="user-order-review table-responsive">
																<table>
																	<thead>
																		<tr>
																			<td>Product Name</td>
																			<td>Price</td>
																			<td>Qty</td>
																			<td>Subtotal</td>
																		</tr>
																	</thead>
																	<tbody>
															<?php
																$sql_order_detials = "SELECT od.p_id, od.price, od.quantity, p.p_name 
																					  FROM order_details od, product p 
																					  WHERE od.order_id = '".$order_id."' 
																						AND p.p_id = od.p_id";																						
																$result_order_details = mysqli_query($con, $sql_order_detials);
																if($result_order_details && $myrow_order_details = mysqli_fetch_array($result_order_details))
																{																	
																	do
																	{
																		$product_id = $myrow_order_details['p_id'];
																		$product_name = $myrow_order_details['p_name'];
																		$product_price = $myrow_order_details['price'];
																		$product_quantity = $myrow_order_details['quantity'];
															?>
																		<tr>
																			<td class="first-column">
																				<h3><?php echo $product_name;?></h3>
																			</td>
																			<td class="p-price">₹ <?php echo $product_price;?></td>
																			<td><?php echo $product_quantity;?></td>
																			<td class="p-price">₹ <?php echo ($product_price*$product_quantity);?></td>
																		</tr>
															<?php
																	}while($myrow_order_details = mysqli_fetch_array($result_order_details));
																}
															?>																		
																		
																	</tbody>
																	<tfoot>
																		<tr>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																			<td class="text-right">Subtotal</td>
																			<td class="text-right p-price">₹ <?php echo ($total_cost-50);?></td>
																		</tr>
																		<tr>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																			<td class="text-right">Shipping & Handling (Flat Rate - Fixed)</td>
																			<td class="text-right p-price">₹ 50.00</td>
																		</tr>
																		<tr>
																			<td class="text-right"></td>
																			<td class="text-right"></td>
																			<td class="text-right">Grand Total</td>
																			<td class="text-right p-price">₹ <?php echo $total_cost;?></td>
																		</tr>
																	</tfoot>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
									<?php	
										}
									?>
										</div>
									</div>	
								</div>
							</div>
					<?php
						}
						else
						{
					?>
							<div class="row">
								<div class="col-md-12">
									<h4>No Orders.</h4>
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
		 <!-- shop-page-end -->		
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>