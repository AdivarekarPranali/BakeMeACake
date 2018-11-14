<?php require_once("includes/initialize.php");?>
<?php session_start();?>
<?php require_once('logincheck_customer.php');
	$customer_id = $_SESSION['sess_user_id'];
?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
		 <!-- cart-page-start -->
		<div class="shopping-cart-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="page-title">
							<h1>Shopping Cart</h1>
						</div>
					</div>
				</div>
	<?php			
			if(isset($_SESSION['cart_item']))
			{
				$item_total = 0;
	?>
			<div class="cartpage">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					    <!-- table start -->						
							<div class="table-content table-responsive">
								<table>
									<thead>
										<tr>
											<th class="product-remove">Remove</th>
											<th class="product-thumbnail">Images</th>
											<th class="product-name">Product name</th>
											<th class="real-product-price">unit price</th>
											<th class="product-quantity">Quantity</th>
											<th class="product-subtotal">subTotal</th>
										</tr>
									</thead>
									<tbody>
						<?php
								foreach($_SESSION['cart_item'] as $item)
								{
						?>
										<tr>
										    <td class="product-remove">
												<a href="javascript:void(0)" onclick="updatesfromcart('remove',<?php $item['id'];?>)">
													<i class="fa fa-trash-o"></i>
												</a>
											</td>
											<td class="product-thumbnail">
												<img src="<?php echo $item['image'];?>" alt="" />
											</td>
											<td class="product-name">
												<?php echo $item['name'];?>
											</td>
											<td class="real-product-price">
												<span class="amounte">₹<?php echo $item['price'];?></span>
											</td>
											<td class="product-quantity">
												<input value="<?php echo $item['quantity'];?>" name="qty_<?php echo $item['id'];?>" id="qty_<?php echo $item['id'];?>" onchange="updatesfromcart('add',<?php $item['id'];?>)"/>
											</td>
											<td class="product-subtotal"><?php echo ($item['price']*$item['quantity']);?></td>
										</tr>
							<?php
									$item_total += ($item["price"]*$item["quantity"]);
								}
							?>
									</tbody>
								</table>
							<div class="cart-s-btn">
								    <div class="row">
										<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
											<div class="buttons-cart">
												<a href="#">Continue Shopping</a>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
											<div class="buttons-cart button-cart-right">
												<span class="shopping-btn floatright">
													<a href="javascript:void(0)" onclick="updatesfromcart('empty')">clear shopping cart</a>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						<!-- table end -->
					</div>
				</div>
				<!-- place selection start -->
				<div class="row">
				   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
						<div class="totals-calculation">
							<table id="shopping-cart-totals-table">
									<tfoot>
										<tr>
											<td colspan="1" class="a-right">
												<strong>Grand Total</strong>
											</td>
											<td class="a-right" style="">
												<strong><span class="price"><?php echo $item_total;?></span></strong>
											</td>
										</tr>
									</tfoot>
							</table>
							<ul class="checkout-types">
								<li>
									<button type="button" onclick="location.href = 'checkout.php'">
										<span>Proceed to Checkout</span>
									</button>
								</li>
							</ul>
						</div>
				   </div>
			    </div>			
		<?php
			}
			else
			{
				echo "Empty Cart!";
			}
		?>
			</div>
			</div>
		</div>
		 <!-- cart-page-end -->
		
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>