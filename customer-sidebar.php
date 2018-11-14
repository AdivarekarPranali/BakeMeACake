						<div class="left-sidebar">
							<div class="left-sidebar-title">
								<h3>Dashboard</h3>
							</div>
							<!-- single-sidebar-start -->
							<div class="block-content">
							    <ul>
								<?php
									if(stristr($scriptname, "dashboard.php"))
									{
										$sidebar_dashboard = ' class="current2"';
									}
								?>
							        <li><a <?php echo $sidebar_dashboard;?> href="dashboard.php">My Orders</a></li>
								
								<?php
									if(stristr($scriptname, "my-account.php"))
									{
										$sidebar_my_account = ' class="current2"';
									}
								?>							      
									<li><a <?php echo $sidebar_my_account;?> href="my-account.php">My Account</a></li>									
							    </ul>
							</div>
						</div>