<?php
	session_start();
    require_once("../includes/initialize.php");            
    
    $jsonarray = array();
	$action = mysqli_real_escape_string($con, $_POST["action"]);
    $product_id = mysqli_real_escape_string($con, $_POST["product_id"]);
	$count = mysqli_real_escape_string($con, $_POST["count"]);
	    
    if(!empty($action))
    {
		switch($action) 
		{
			case "add":
					if(!empty($_SESSION["cart_item"])) 
					{
						if(isset($_SESSION["cart_item"][$product_id]))
						{
							$_SESSION["cart_item"][$product_id]["quantity"] = $count;
						} 
					}
			break;
			case "remove":
				if(!empty($_SESSION["cart_item"])) 
				{
					foreach($_SESSION["cart_item"] as $k => $v) 
					{
							if($product_id == $k)
								unset($_SESSION["cart_item"][$k]);
							if(empty($_SESSION["cart_item"]))
								unset($_SESSION["cart_item"]);
					}
						
				}
			break;
			case "empty":
				unset($_SESSION["cart_item"]);
			break;		
				
		}
				
		if(isset($_SESSION["cart_item"]))
		{
			$item_total = 0;
			$cart_div = '<div class="row">
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
											<tbody>';			
				foreach ($_SESSION["cart_item"] as $item)
				{
		
				$cart_div .= 	'<tr>
									<td class="product-remove">
										<a href="javascript:void(0)" onclick="updatesfromcart(\'remove\','.$item['id'].')">
											<i class="fa fa-trash-o"></i>
										</a>
									</td>
									<td class="product-thumbnail">
										<img src="'.$item['image'].'" alt="" />
									</td>
									<td class="product-name">
										'.$item['name'].'
									</td>
									<td class="real-product-price">
										<span class="amounte">₹'.$item['price'].'</span>
									</td>
									<td class="product-quantity">
										<input value="'.$item['quantity'].'" name="qty_'.$item['id'].'" id="qty_'.$item['id'].'" onchange="updatesfromcart(\'add\','.$item['id'].')"/>
									</td>
									<td class="product-subtotal">'.($item['quantity']*$item['price']).'</td>
								</tr>';
		
					$item_total += ($item["price"]*$item["quantity"]);
					$items++;
				}
	
			$cart_div .= '	</tbody>
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
													<a href="javascript:void(0)" onclick="updatesfromcart(\'empty\')">clear shopping cart</a>
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
												<strong><span class="price">'. $item_total.'</span></strong>
											</td>
										</tr>
									</tfoot>
							</table>
							<ul class="checkout-types">
								<li>
									<button type="button">
										<span>Proceed to Checkout</span>
									</button>
								</li>
							</ul>
						</div>
				   </div>
			    </div>	
							
							';		
		}
		else
		{
			$cart_div = "Cart Is Empty";
			$items = 0;
		}
			
		
		$jsonarray = array("error" => 0, "cartdiv" => $cart_div, "items" => $items);
		echo json_encode($jsonarray); 
		exit;
	}
	else
	{
		$jsonarray = array("error" => 1, "message" => "Something went wrong. Please try again later.");
		echo json_encode($jsonarray);   
		exit;
	}
?>