        <!-- header start -->
        <header>
            <!-- header-top start -->
            <div class="header-top-area header-top-area-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <!-- header-top-left start -->
                            <div class="header-top-left">
                                <div class="phone-number phone-number-2 floatleft"><i class="fa fa-phone"></i>Phone : 123 456 789</div>
                            </div>
                            <!-- header-top-left end -->
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- header-top end -->
            <div class="header-bottom-area header-bottom-area-2">
                <div class="container">
                    <div class="header-bottom-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <!--logo start-->
                                <div class="logo">
                                    <a href="index.html"><img src="img/logo/logo.png" alt="" /></a>
                                </div>
                                <!--logo end-->
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="mobile-menu-area">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mobile-menu">
                                                <nav id="dropdown">
                                                    <ul class="menu">													
                                                        <?php include('menu.php');?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--mainmenu start-->
                                <div class="mainmenu mainmenu-2">
                                    <nav>
                                        <ul>
                                            <?php include('menu.php');?>
                                        </ul>
                                    </nav>
                                </div>
                                <!--mainmenu end-->
                            </div>
					<?php
						if($_SESSION['type'] != 'vendor')
						{
					?>
                            <div class="col-lg-2 col-md-2">
							<?php
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
							
							?>
                                <div class="cart-and-search floatright">
                                    <div class="total-cart floatleft">
                                        <a href="#">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="mini-cart-items"><?php echo $items;?></span>
                                        </a>
                                        <div class="mini-cart-dropdown">
											<?php echo $cart_div;?>
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
        </header>
        <!-- header end -->