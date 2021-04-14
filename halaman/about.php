<?php
 $about_us=mysqli_query($konek, "SELECT * FROM about");
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
						<li class="active"><a href="">About US</a></li>
						<li><a href="?p=contact">Contact US</a></li>
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
							<li><a href="#">About US</a></li>
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
		 <?php
            $row=mysqli_fetch_assoc($about_us);
          ?>
            <h1 class="section-title">About Us</h1>
			<?php echo $row['data_aboutus']; ?>
			
        </div>
    </section>