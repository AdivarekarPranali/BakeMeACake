<?php
    require_once("../includes/initialize.php");            
    
    $jsonarray = array();
    $id = mysqli_real_escape_string($con, $_POST["id"]);    
    
    if($id == "")
    {        
        $jsonarray = array("error" => 1, "message" => "");
        echo json_encode($jsonarray); 
        exit;
    }    
        
    $sql_details = "SELECT *
                    FROM product WHERE p_id = '".$id."'";
    $result_details = mysqli_query($con, $sql_details);
    if($result_details  && $myrow_details = mysqli_fetch_array($result_details))
    {        
		$product_id = $myrow_details['p_id'];
		$product_name = $myrow_details['p_name'];
		$product_price = $myrow_details['p_pricekg'];
		$product_flavour = $myrow_details['p_flavour'];
		$product_desc = $myrow_details['p_desc'];
		$product_veg = $myrow_details['p_veg'];
		$product_image = "vendor/".$myrow_details['p_image'];		
		
        $modal = '                            
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											</div>
											<div class="modal-body">
												<div class="modal-product">
													<div class="container">
														<div class="row">
															<div class="col-lg-5 col-sm-12 col-xs-12">
																<div class="zoom-all">
																	<div class="pro-img-tab-content tab-content">
																		<div class="tab-pane active" id="image-1">
																			<div class="simpleLens-big-image-container">
																				<a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="'.$product_image.'" href="'.$product_image.'">
																					<img src="'.$product_image.'" alt="" class="simpleLens-big-image">
																				</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-lg-7 col-sm-12 col-xs-12">
																<div class="page-single-product-desc">
																	<div class="product-name">
																		<h2>'.$product_name.'</h2>
																	</div>
																	<p class="availability in-stock">Availability: <span>In stock</span></p>
																	<div class="product-rating">
																		<ul>
																			<li><i class="fa fa-star"></i></li>
																			<li><i class="fa fa-star"></i></li>
																			<li><i class="fa fa-star"></i></li>
																			<li><i class="fa fa-star"></i></li>
																			<li><i class="fa fa-star"></i></li>
																		</ul>
																	</div>
																	<div class="price-box single-product-price">
																		<p class="normal-price">₹ '.$product_price.'</p>
																	</div>
																	<div class="sin-product-shot-desc">
																		<p>'.$product_desc.'</p>
																	</div>
																	<div class="sin-product-add-cart">
																		<label>Qty</label>
																		<input type="text" value="1" name="qty_'.$product_id.'" id="qty_'.$product_id.'"/>
																		<button onclick="addtocart(\'add\','.$product_id.')" >
																			<i class="fa fa-shopping-cart"></i>
																			<span>add to cart</span>
																		</button>
																	</div>
																	<div class="clearfix"><br/></div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- .modal-product -->
											</div>
											<!-- .modal-body -->
										</div>
										<!-- .modal-content -->
									</div>
									<!-- .modal-dialog -->
                         ';
            $jsonarray = array("error" => 0, "message" => $modal);
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