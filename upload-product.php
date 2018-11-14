<?php require_once('includes/initialize.php');?>
<?php session_start();
	require_once("logincheck_vendor.php");
?>
<?php
	
	$error_display = "display-hide";
	$success_display = "display-hide";

	if(count($_POST) > 0) 
	{
		$erroroccured = 0;	
		
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$price = mysqli_real_escape_string($con,$_POST['price']);
		$description = mysqli_real_escape_string($con,$_POST['description']);
		$flavour = mysqli_real_escape_string($con,$_POST['flavour']);
		$veg = mysqli_real_escape_string($con,$_POST['veg']);
		$img = $_POST['product-image'];
				
		
		if($name == "" || $price == "" || $flavour == "" || $description == "" || $veg == "" )
		{
			$erroroccured = 1;
			$error = "Please fill mandatory fields.";
			goto end;
		}
		
		if(is_numeric($price))
		{
			if(strlen($price) < 2 || strlen($price) > 6)
			{
				$erroroccured = 1;
				$error = "Please Enter Valid Price";
				goto end;
			}
		}
		else
		{
			$erroroccured = 1;
			$error = "Price must contain only numbers.";
			goto end;
		}
		
		//image upload
		if($_FILES["product-image"]["name"] != "")
		{
			require_once("includes/resize_class.php");
			//resize and save members image
			$allowedexts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
			$temp = explode(".", $_FILES["product-image"]["name"]);
			$extension = end($temp);

			if ((($_FILES["product-image"]["type"] == "image/jpeg")
			|| ($_FILES["product-image"]["type"] == "image/jpg")
			|| ($_FILES["product-image"]["type"] == "image/png")
			|| ($_FILES["product-image"]["type"] == "image/JPEG")
			|| ($_FILES["product-image"]["type"] == "image/PNG")
			|| ($_FILES["product-image"]["type"] == "image/JPG"))
			&& ($_FILES["product-image"]["size"] < 2000000)
			&& in_array($extension, $allowedexts))
			{
				if ($_FILES["product-image"]["error"] > 0)
				{
					$error = "Invalid image. Please upload a valid image.";
					$erroroccured = 1;
					goto end;
				}
				else
				{
					//give a unique name to the file
					$img_file_type = pathinfo($_FILES["product-image"]["name"], PATHINFO_EXTENSION);
					$filename = sha1(rand().microtime()).".".$img_file_type;

					$image_file_path = $_SERVER["DOCUMENT_ROOT"]."/vendor/".$filename;
					$thumb_image_file_path = $_SERVER["DOCUMENT_ROOT"]."/vendor/thumbnail/".$filename;

					//move file to temp image folder
					if(!move_uploaded_file($_FILES["product-image"]["tmp_name"], $image_file_path))
					{
						$error = "Something went wrong while moving image. Kindly try again later.";
						$erroroccured = 1;
						goto end;
					}

					//crop and save thumb image
					if($erroroccured == 0)
					{
						// *** 1) Initialise / load image
						$resizeObj = new resize($image_file_path);
						// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
						$resizeObj->resizeImage(300, 300, 'crop');
						// *** 3) Save image
						$resizeObj->saveImage($thumb_image_file_path, 90);                    
					}
								
				}
			}
			else
			{
				$erroroccured = 1;
				$error = "Please upload valid image (2 MB).";
				goto end;
			}			
		}
		else
		{
			$erroroccured = 1;
			$error = "Please upload product image.";
			goto end;
		}

		if($erroroccured == 0)
		{
			$sql_insert_product = "INSERT INTO product (p_name,p_pricekg,p_flavour,p_desc,p_veg,p_image,v_id) 
									VALUES('". $name ."',". $price .",'"
									.$flavour."','". $description ."','". $veg ."', '".$filename."', '".$_SESSION['sess_user_id']."')"; 
			$result_insert_product = mysqli_query($con, $sql_insert_product);
			if(mysqli_affected_rows($con)<=0)
			{
				$erroroccured = 1;
				$error = "Error Adding New Product.".$sql_insert_product;
				goto end;
			}			
		}
		
		end:
		if($erroroccured == 0)
		{
			
			$error = "";
			$success = "Your product has been successfully added!";                        
			$error_display = "display-hide";
			$success_display = "";
			
			$name = "";
			$price = "";
			$description = "";
			$veg = "";			
			$flavour = "";
		}
		else
		{
			$success = "";
			$error_display = "";
			$success_display = "display-hide";
		}

		 
	}
?>
<?php require_once('headertags.php');?>
<?php require_once('header.php');?>
<?php require_once('breadcrumbs.php');?>
		 <!-- shop-page-start -->
		 <div class="shop-product-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<?php require_once('vendor-sidebar.php');?>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="area-title bdr">
                             <h2>Upload Your Product</h2>
                        </div>
						<div class="tb-login-form ">                        
							<div class="alert alert-danger alert-dismissible <?php echo $error_display;?>" role="alert">
							  <strong><?php echo $error;?></strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>		
							<div class="alert alert-success alert-dismissible <?php echo $success_display;?>" role="alert">
							  <strong><?php echo $success;?></strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							
							<form action="" method="POST" class="user-billing-info" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="user-info-single">
											<label>Cake Name<span class="required">*</span></label>
											<input name="name" id="name" type="text" required="required" tabindex=1 value="<?php echo $name;?>">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="user-info-single">
											<label>Price/Kg<span class="required">*</span></label>
											<input name="price" id="price" type="text" required="required" tabindex=2 value="<?php echo $price;?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="user-info-single">
											<label>Description<span class="required">*</span></label>
											<input name="description" id="description" type="text" required="required" tabindex=3 value="<?php echo $description;?>">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="user-info-single">
											<label>Flavour<span class="required">*</span></label>
											<input name="flavour" id="flavour" type="text" required="required" tabindex=4 value="<?php echo $flavour;?>">
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="user-info-single">
											<label>Veg/Non-Veg<span class="required">*</span></label>
											<select name="veg" id="veg"  tabindex=5>
												<option value="" disabled="true" selected="selected">Select Cake Type</option>
												<option value="WithEgg">With Egg</option>
												<option value="Eggless">Eggless</option>
											</select>
											<script type="text/javascript">
												$("#veg").val("<?php echo $veg;?>");
											</script>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="user-info-single">
											<label>Cake Image<span class="required">*</span></label>
											<input name="product-image" id="product-image" type="file" placeholder="Product Image" tabindex=6>
										</div>
									</div>
								</div>
								<p class="login-submit5">
									<input class="button-primary" type="submit" id="submit" name="submit" value="SUBMIT" tabindex=7>
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		 </div>
		 <!-- shop-page-end -->
<?php require_once('footer.php');?>
<?php require_once('footertags.php');?>			