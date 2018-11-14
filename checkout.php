<?php require_once('includes/initialize.php');?>
<?php session_start();
	if($_SESSION['type'] == 'vendor')
	{
		$_SESSION = array();
		session_destroy();
		header("Location: login.php");
		exit;
	}
	
	if(!isset($_SESSION['cart_item']))
	{
		header('Location: cart.php');
		exit;
	}
?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
    <!-- checkout-area-start-->
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- Payment Method -->
                    <div class="payment-method">
                        <!-- Panel Gropup -->
                        <div class="panel-group" id="accordion">
                            <!-- Panel Default -->
							<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" class="active" data-parent="#accordion" href="#checkut1">
                                        <span class="number">1</span>Checkout Method</a>
								    </h4>
                                </div>
                                <div id="checkut1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<?php
							if(!isset($_SESSION['sess_user_id']))
							{
						?>
                                                <form class="checkout-form product-form">
                                                    <h2>New User - Register</h2>
                                                    <div class="user-bottom fix">
                                                        <button class="common-btn rjc" type="button" onclick="location.href = 'registration-customer.php?page=checkout'">Register Now</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <form class="checkout-form product-form" action="login-action.php" method="POST">
                                                    <h2>Login</h2>
                                                    <div class="user-login-form">
                                                        <h4>Already registered?</h4>
														<?php
															if($_GET['error'] != "" || $_GET['error'] == 1)
															{
														?>
															<p>Invalid Customer Username or Password!</p>
														<?php
															}
															else
															{
														?>
															<p>Please log in below</p>
														<?php
															}
														?>
                                                        <div class="account-form">
                                                            <div class="form-goroup">
                                                                <label>Username <sup>*</sup></label>
                                                                <input type="text" required="required" name="username" class="form-control">
                                                            </div>
                                                            <div class="form-goroup">
                                                                <label>Password <sup>*</sup></label>
                                                                <input type="password" required="required" name="password" class="form-control">
																<input type="hidden" name="pagename" id="pagename" value="checkout">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="user-bottom fix">
														<button class="common-btn" type="submit" id="submit" name="submit" value="submit">login</button>
                                                    </div>
                                                </form>
                                            </div>
								<?php 
									}
									else
									{
										echo "Welcome! Proceed to step 2.";
									}
								?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#checkut2">
                                        <span class="number">2</span>Shipping Address</a>
								    </h4>
                                </div>
                                <div id="checkut2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="user-billing-info">
                                            <div class="row">
                                                <div class="form">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="user-info-single">
                                                            <label>First Name <span class="required">*</span></label>
                                                            <input type="text" id="firstname" class="firstname" name="firstname"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="user-info-single">
                                                            <label>Middle Name</label>
                                                            <input type="text" id="middlename" class="middlename" name="middlename"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="user-info-single">
                                                            <label>Last Name <span class="required">*</span></label>
                                                            <input type="text" id="lastname" class="lastname" name="lastname"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>Company</label>
                                                        <input type="text" id="company" class="company" name="company"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="user-info-single user-address">
                                                        <label>Address<span class="required">*</span></label>
                                                        <input type="text" id="address" class="address" name="address"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>City<span class="required">*</span></label>
                                                        <input type="text" id="city" class="city" name="city"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>State/Province<span class="required">*</span></label>
														<input type="text" id="state" class="state" name="state"/>
                                                    <!--
														<select>
                                                            <option>Dhaka</option>
                                                            <option>Barishal</option>
                                                            <option>Khulna</option>
                                                            <option>Sylhet</option>
                                                            <option>Moymonsing</option>
                                                            <option>Rangpur</option>
                                                            <option>Rajshahi</option>
                                                        </select>
													-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>Zip/Postal Code<span class="required">*</span></label>
                                                        <input type="text" id="pincode" class="pincode" name="pincode"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>Country<span class="required">*</span></label>
														<input type="text" id="country" class="country" name="country"/>
                                                    <!--    <select>
                                                            <option>Bangladesh</option>
                                                            <option>India</option>
                                                            <option>Pakistan</option>
                                                            <option>USA</option>
                                                            <option>Russia</option>
                                                            <option>Nepal</option>
                                                            <option>Vutan</option>
                                                        </select>
													-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>Contact Number<span class="required">*</span></label>
                                                        <input type="text" id="contact" class="contact" name="contact"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>Email<span class="required">*</span></label>
                                                        <input type="email" id="email" class="email" name="email"/>
                                                    </div>
                                                </div>
                                            </div>
											<div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>Message On Cake<span class="required">*</span></label>
                                                        <input type="text" id="msg" class="msg" name="msg"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="user-info-single">
                                                        <label>Delivery Date<span class="required">*</span></label>
                                                        <input type="text" id="delivery" class="delivery" name="delivery"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="billing-action">
                                                    <button class="common-btn floatright" onclick="submitshippingdetails()">continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#checkut5">
                                        <span class="number">3</span>Payment Information</a>
								    </h4>
                                </div>
                                <div id="checkut5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <div class="user-info-single user-payment-info">
                                                    <input type="radio" name="payment_type" id="payment_type" value="cod"/>
                                                    <label>Cash on delivery</label>
                                                </div>
                                                <div class="user-info-single user-payment-info">
                                                    <input type="radio" name="payment_type" id="payment_type" value="payumoney"/>
                                                    <label>PayUMoney</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <a href="#" class="pdt-32">
                                                    <i class="fa fa-long-arrow-up"></i> Back
                                                </a>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-xs-12">
                                                <button class="common-btn floatright" onclick="paymentmethod();">continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#checkut6">
                                        <span class="number">4</span>Order Review</a>
								    </h4>
                                </div>
                                <div id="checkut6" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <?php
									if(isset($_SESSION["cart_item"]))
									{
										$item_total = 0;
								?>
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
										foreach($_SESSION['cart_item'] as $item)
										{
								?>
                                                            <tr>
                                                                <td class="first-column">
                                                                    <h3><?php echo $item['name']; ?></h3>
                                                                </td>
                                                                <td class="p-price"><?php echo $item['price']; ?></td>
                                                                <td><?php echo $item['quantity']; ?></td>
                                                                <td class="p-price"><?php echo ($item['price'])*($item['quantity']); ?></td>
                                                            </tr>
								<?php
											$item_total += ($item["price"]*$item["quantity"]);;
										}
								?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td class="text-right"></td>
                                                                <td class="text-right"></td>
                                                                <td class="text-right">Subtotal</td>
                                                                <td class="text-right p-price">₹<?php echo $item_total; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right"></td>
                                                                <td class="text-right"></td>
                                                                <td class="text-right">Shipping & Handling (Flat Rate - Fixed)</td>
                                                                <td class="text-right p-price">₹50.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right"></td>
                                                                <td class="text-right"></td>
                                                                <td class="text-right">Grand Total</td>
                                                                <td class="text-right p-price">₹<?php echo $item_total+50; ?></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
								<?php 
									}
									else
									{
										echo "Cart is empty!";
									}
								?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-xs-12">
                                                <div class="user-order-plce">
                                                    <button class="common-btn floatright" onClick="location.href ='make_payment.php';">place order</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Default -->
                        </div>
                        <!-- End Panel Gropup -->
                    </div>
                    <!-- End Payment Method -->
                </div>
            </div>
        </div>
    </div>
    <!-- shop-page-end -->
    
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>    