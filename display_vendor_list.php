<?php require_once('../includes/initialize.php');?>
<?php session_start();?>
<?php
$area= mysqli_real_escape_string($con, $_GET['area']);

$query = "select * from vendor where v_area='".$area."';";
//$query = "select * from vendor where v_area='Dadar';";
$result = mysqli_query($con, $query);

if ($result)
{
	while($row = mysqli_fetch_array($result))
	{
		$vendor_id = $row['v_id'];
		$vendor_name = $row['v_name'];
		$logo = $row['v_logo'];
			//echo base64_encode($logo);
		$link = SITE_URL.'/product.php?vendor='.$vendor_name;
?>		
		<div class="col-lg-3 col-md-3 col-sm-4">
			<div class="single-product">				
				<div class="product-thumb">
					<a href="javascript:void(0)" onclick="submission('<?php echo $vendor_id;?>','vendor_id')"><img src="img/products/cake.jpg" alt="" class="img-responsive" /><?php echo '<!--<img src="data:image/jpeg;base64,'.base64_encode($logo).'"/>-->';?></a>
				</div>
				<div class="product-desc">
					<h2 class="product-name text-center"><a class="product-name" href="javascript:void(0)" onclick="submission('<?php echo $vendor_id;?>','vendor_id')"><?php echo $vendor_name;?></a></h2>
					<!--<div class="price-box floatleft">
						<p class="old-price">$170.00</p>
						<p class="normal-price">$155.00</p>
					</div>-->
				</div>
			</div>
		</div>		
<?php
	}
}
else
{
	?>
	<div>
		<p>NO VENDORS FOUND.</p>
	</div>
	<?php
}
mysqli_close($con);
?>

</div>