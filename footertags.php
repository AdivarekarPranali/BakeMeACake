    </div>
    <!--home-page end-->
    
    
    
    
    <!-- all js here -->    
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nivo slider js -->
    <script src="js/jquery.nivo.slider.pack.js"></script>
    <!-- jquery.countdown js -->
    <script src="js/jquery.countdown.min.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Img Zoom js -->
    <script src="js/img-zoom/jquery.simpleLens.min.js"></script>
    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- jquery-ui js -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- wow js -->
    <script src="js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="js/plugins.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
	<!-- custom js -->
	<script src="js/custom.js"></script>
	
	<!-- PAGEWISE JS -->
	<?php
		if(stristr($scriptname, "registration-customer.php") || stristr($scriptname, "checkout.php"))
		{
	?>
			<script type="text/javascript" src="js/datepicker/bootstrap-datepicker.js"></script>
			<script>
				//Date range picker
					$('.datepicker').datepicker({endDate: '-0m'});
					$('.delivery_datepicker').datepicker({startDate: '-0m'});
			</script>
	<?php
		}
	?>
</body>

</html>