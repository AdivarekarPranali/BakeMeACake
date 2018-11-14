<?php
	if(isset($_SESSION['type']) && !empty($_SESSION['type']))
	{
		if($_SESSION['type'] == 'customer')
		{
			?>				
				<li><a href="index.php">HOME</a></li>
				<li><a href="vendor-selection.php">VENDOR SELECTION</a></li>			
				<li><a href="products.php">PRODUCTS</a></li>	
				<li><a href="dashboard.php">DASHBOARD</a></li>					
				<li><a href="logout.php">LOGOUT</a></li>
			<?php
		}
		else if($_SESSION['type'] == 'vendor')
		{
			?>
				<li><a class="active" href="myproducts.php">DASHBOARD</a></li>
				<li><a href="upload-product.php">UPLOAD PRODUCTS</a></li> 								
				<li><a href="logout.php">LOGOUT</a></li>
			<?php
		}
	}
	else
	{
		?>
			<li><a class="active" href="index.php">HOME</a></li>
			<li><a href="products.php">PRODUCTS</a></li>
			<li><a href="#">REGISTER</a>
				<ul class="sub-menu">															
					<li><a href="registration-customer.php">As Customer</a></li>
					<li><a href="registration-vendor.php">As Vendor</a></li>
				</ul>
			</li>           			
			<li><a href="login.php">LOGIN</a></li>
		<?php		
	}
?>