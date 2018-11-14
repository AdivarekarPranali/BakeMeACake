<?php require_once('includes/initialize.php');?>
<?php session_start();?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
        <!--slider-area start-->
        <div class="slider-area slider-area-2">
            <!-- slider start -->
            <div class="slider">
                <div id="topSlider" class="nivoSlider nevo-slider">
                    <img src="img/slider/1.jpg" alt="main slider" title="#htmlcaption1" />
                    <img src="img/slider/2.jpg" alt="main slider" title="#htmlcaption2" />
					<img src="img/slider/3.jpg" alt="main slider" title="#htmlcaption3" />
                </div>
            <!--    <div id="htmlcaption1" class="nivo-html-caption slider-caption">
                    <div class="slider-progress"></div>
                    <div class="bannerslideshow slider-1">
                        <h1 class="title1">
                            <span class="word1">Cat’s</span>
                            <span class="word2">Food</span>
				        </h1>
                        <h2 class="title2"><span class="word1">Cat</span> <span class="word2">Dry</span>
                            <span class="word3">Superfood</span>
                            <span class="word4">Blend</span>
                            <span class="word5">Egg</span>
                            <span class="word6">Sweet</span>
                            <span class="word7">Potato</span>
                            <span class="word8">Front.</span>
				        </h2>
                        <h3 class="title3">
                            <span class="word1">$8.00</span>
                            <span class="word2">$10.00</span>
				        </h3>
                        <div class="slider-content-2-readmore">
                            <a title="Shop Now" href="#">shop now</a>
                        </div>
                    </div>
					
                </div>-->
            <!--    <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                    <div class="slider-progress"></div>
                    <div class="slider-content-2">
                        <div class="bannerslideshow slider-2">
                            <h1 class="title1">
                                <span class="word1">Cat’s</span>
                                <span class="word2">Food</span>
                            </h1>
                            <h2 class="title2"><span class="word1">Cat</span> <span class="word2">Dry</span>
                                <span class="word3">Superfood</span>
                                <span class="word4">Blend</span>
                                <span class="word5">Egg</span>
                                <span class="word6">Sweet</span>
                                <span class="word7">Potato</span>
                                <span class="word8">Front.</span>
                            </h2>
                            <h3 class="title3">
                                <span class="word1">$8.00</span>
                                <span class="word2">$10.00</span>
                            </h3>
                            <div class="slider-content-2-readmore">
                                <a title="Shop Now" href="#">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
            <!-- slider end -->
        </div>
        <!--slider-area end-->
        <!--banner-area start-->
        <div class="banner-area">
            <div class="container">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <!--single-banner-start-->
                            <div class="single-banner res2">
                                <a href="#"><img src="img/banners/3.jpg" alt="" /></a>
                            </div>
                            <!--single-banner-end-->
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <!--single-banner-start-->
                            <div class="single-banner res2">
                                <a href="#"><img src="img/banners/4.jpg" alt="" /></a>
                            </div>
                            <!--single-banner-end-->
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <!--single-banner-start-->
                            <div class="single-banner">
                                <a href="#"><img src="img/banners/5.jpg" alt="" /></a>
                            </div>
                            <!--single-banner-end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--banner-area end-->
        <!--products-area start-->
        <div class="featured-products-area featured-products-area-2">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>Featured</h2>
                        <h1>Products</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="single-carousel">
<?php
	$sql_query = "SELECT * FROM product
					WHERE p_active = '1'
					ORDER BY RAND()";
	
	$result = mysqli_query($con,$sql_query);
	if($result)
	{
		while($row = mysqli_fetch_array($result))
		{
			$product_id = $row['p_id'];
			$product_name = $row['p_name'];
			$product_price = $row['p_pricekg'];
			$product_image = "vendor/".$row['p_image'];
?>
                        <!-- single-product start-->
                        <div class="col-lg-3">
                            <div class="single-product">
                                <a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>
                                <div class="product-thumb">
                                    <a href="#"><img src="<?php echo $product_image; ?>" alt="" /></a>
                                </div>
                                <div class="product-desc">
                                    <h2 class="product-name"><a href="#"><?php echo $product_name; ?></a></h2>
                                    <div class="price-box floatleft">
                                        <!-- p class="old-price">$170.00</p -->
                                        <p class="normal-price">₹ <?php echo $product_price; ?></p>
                                    </div>
                                    <div class="product-action floatright">
                                        <a href='javascript:void(0)' onclick="addtocart('add','<?php echo $product_id;?>')" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single-product end-->
<?php
		}
	}
?>                        
                    </div>
                </div>

            </div>
        </div>
        <!--products-area end-->
        
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>