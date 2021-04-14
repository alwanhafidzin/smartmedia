<?php
 $contact=mysqli_query($konek, "SELECT * FROM contact");
 ?>
<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
				<?php
            $row=mysqli_fetch_assoc($contact);
            ?>
					<ul class="header-links pull-left">
						<li><a><i class="fa fa-phone"></i><?php echo $row['telepon']; ?></a></li>
						<li><a><i class="fa fa-envelope-o"></i> <?php echo $row['email']; ?></a></li>
						<li><a><i class="fa fa-map-marker"></i><?php echo $row['alamat']; ?></a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
						<h3></h3>
							<div class="header-logo">
							<p></p>
								<a href="#" class="logo">
									<img src="./img/smart.png" weight="100"  height="80" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		
		