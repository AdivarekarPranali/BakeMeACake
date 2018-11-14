<?php
	session_start();
    require_once("../includes/initialize.php");            
    
    $jsonarray = array();	   
			
	if(isset($_SESSION["cart_item"]))
	{
		$item_total = 0;
		$cart_div = "";
		$items = 0;
			foreach ($_SESSION["cart_item"] as $item)
			{
	
			$cart_div .= 	'<div class="single-mini-cart">
								<div class="mini-cart-thumb">
									<a href="#"><img src="'.$item['image'].'" alt="" /></a>
								</div>
								<div class="mini-cart-content">
									<a href="#" class="product-name">'.$item['name'].'</a>
									<span class="mini-cart-quantity">'.$item['quantity'].'</span>
									<span>x</span>
									<span class="mini-cart-price">₹'.$item['price'].'</span>
								</div>
								<div class="cart-item-remove-edit">
									<a href="javascript:void(0)" onclick="addtocart(\'remove\','.$item['id'].')" class="remove-item"></a>
								</div>
							</div>';
	
				$item_total += ($item["price"]*$item["quantity"]);
				$items++;
			}

		$cart_div .= '	<div class="single-mini-cart">
							<div class="mini-cart-subtotal">
								Subtotal: <span class="price">₹'.$item_total.'</span>
							</div>
						</div>
						<div class="mini-cart-action">
							<button class="floatleft" onClick="location.href = \'cart.php\';">view cart <i class="fa fa-angle-right"></i></button>
							<button class="floatright" onClick="location.href = \'checkout.php\';">checkout <i class="fa fa-angle-right"></i></button>
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
	
?>