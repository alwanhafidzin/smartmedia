<?php
 $contact=mysqli_query($konek, "SELECT * FROM contact");
 ?>
  <!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="?p=kategori">Categories</a></li>
						<li><a href="?p=about">About US</a></li>
						<li class="active"><a href="">Contact US</a></li>
						<li><a href="admin/index.php">Login</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.html">Home</a></li>
							<li><a href="#">Contact US</a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
    <section class="section">
        <div class="container">
            <h1 class="section-title">Contact Us</h1>
			<?php
            $row=mysqli_fetch_assoc($contact);
            ?>
            <div>
			   <?php echo $row['deskripsi']; ?>
				      <ul class="footer-links">
									<li><a href="#"><i class="fa fa-phone"></i><font color="black"><?php echo $row['telepon']; ?></font></a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i><font color="black"><?php echo $row['email']; ?></font></a></li>
									<li><a href="#"><i class="fa fa-map-marker"></i><font color="black"><?php echo $row['alamat']; ?></font></a></li>
								</ul>
								<br></br><br></br>
				
            </div>
        </div>
    </section>