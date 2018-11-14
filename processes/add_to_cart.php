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
				$sql_details = "SELECT *
								FROM product WHERE p_id = '".$product_id."'";
				$result_details = mysqli_query($con, $sql_details);
				if($result_details  && $myrow_details = mysqli_fetch_array($result_details))
				{        
					$product_id = $myrow_details['p_id'];
					$product_name = $myrow_details['p_name'];
					$product_price = $myrow_details['p_pricekg'];			
					$product_image = "vendor/thumbnail/".$myrow_details['p_image'];		
					
					$itemArray = array(
									'name'=>$product_name, 
									'id'=>$product_id, 
									'quantity'=>$count, 
									'price'=>$product_price,
									'image'=>$product_image								
								);
					
					if(!empty($_SESSION["cart_item"])) 
					{
						if(isset($_SESSION["cart_item"][$product_id]))
						{
							$_SESSION["cart_item"][$product_id]["quantity"] = $_SESSION["cart_item"][$product_id]["quantity"] +  $count;
						} 
						else 
						{
							$_SESSION["cart_item"][$product_id] = $itemArray;
						}
					} 
					else 
					{
						$_SESSION["cart_item"][$product_id] = $itemArray;
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
	}
	else
	{
		$jsonarray = array("error" => 1, "message" => "Something went wrong. Please try again later.");
		echo json_encode($jsonarray);   
		exit;
	}
?>