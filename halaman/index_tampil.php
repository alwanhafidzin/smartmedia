<?php
    $slider = "SELECT * FROM slider ORDER BY urutan";
    $result = mysqli_query($konek, $slider);
?>
<?php 
  $kategori="SELECT * FROM kategori_buku ORDER BY id_kategori LIMIT 5";
  $kategori_result=mysqli_query($konek, $kategori);
?>
<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="">Home</a></li>
						<li><a href="?p=kategori">Categories</a></li>
						<li><a href="?p=about">About US</a></li>
						<li><a href="?p=contact">Contact US</a></li>
						<li><a href="admin/index.php">Login</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
<div class="container">
  <br>
  <div id="WJSlider" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#WJSlider" data-slide-to="0" class="active"></li>
      <li data-target="#WJSlider" data-slide-to="1"></li>
      <li data-target="#WJSlider" data-slide-to="2"></li>
      <li data-target="#WJSlider" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php 
                $row=mysqli_fetch_assoc($result)
        ?>
      <div class="item active">
        <img src="admin/slider/<?php echo $row['gambar']; ?>" alt="" width="460" height="345">
        <div class="carousel-caption">
          <h3><font color="blue"><?php echo $row['judul']; ?></font></h3>
          <p><font color="navy"><?php echo $row['keterangan']; ?></font></p>
        </div>
      </div>
	   <?php
                $i=2; 
                while($row=mysqli_fetch_assoc($result)){ 
            ?>
	   <div class="item">
        <img src="admin/slider/<?php echo $row['gambar']; ?>" alt="" width="460" height="345">
        <div class="carousel-caption">
          <h3><font color="blue"><?php echo $row['judul']; ?></font></h3>
          <p><font color="navy"><?php echo $row['keterangan']; ?></font></p>
        </div>
      </div>
	  <?php $i++; } ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#WJSlider" role="button" data-slide="prev">
      <span class="sr-only">Kembali</span>
    </a>
    <a class="right carousel-control" href="#WJSlider" role="button" data-slide="next">
      <span class="sr-only">Lanjut</span>
    </a>
  </div>
</div>

		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Baru Rilis</h3>
						</div>
					</div>
					<?php
                    $baru = "SELECT id_buku, judul, harga, cover,kat.*,buku.* FROM data_buku buku INNER JOIN kategori_buku kat ON buku.id_kategori=kat.id_kategori ORDER BY buku.id_buku DESC LIMIT 5";
                    $baru_tampil = mysqli_query($konek, $baru);
                   
                   ?>
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
									<?php while($row=mysqli_fetch_assoc($baru_tampil)){ ?>
										<div class="product">
											<div class="product-img">
												<img src="admin/buku/<?php echo $row['cover']; ?>" alt="" width="100px" height="270px">
												<div class="product-label">
													<span class="new">Baru</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $row['judul_kategori']; ?></p>
												<h3 class="product-name">
												<?php 
                                                    $bagi = $row['judul']; 
                                                    $strip = strip_tags(htmlspecialchars_decode(stripcslashes($bagi)), '<a>');
                                                    echo substr($strip, 0, 22);
                                                    if(strlen(trim($row['judul']))>24) echo " ..."; 
                                                ?>
												</a></h3>
												<h4 class="product-price">
												<?php
                                               $harga = number_format($row['harga'], 0, ",", ".");
                                              echo "Rp ".$harga;
                                            ?></h4> 
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-eye"></i><a href="?p=detail&id_buku=<?php echo $row['id_buku']; ?>">View More</a></button>
											</div>
										</div>
										<!-- /product -->
										<?php } ?>

										
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<p>Cari Buku Yang Kamu Inginkan dengan harga bersaing dan kualitas yang sudah terjamin hanya di SMARTMEDIA<p>
							<br><br>
							<h2 class="text-uppercase">Cari Buku yang kamu Inginkan</h2>
							<a class="primary-btn cta-btn" href="?p=kategori">Book Collection</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Best Seller</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
									<?php
                       $best = "SELECT id_buku, judul, harga, cover,kat.*,buku.* FROM data_buku buku INNER JOIN kategori_buku kat ON buku.id_kategori=kat.id_kategori WHERE buku.best_sell='1' ORDER BY buku.id_buku DESC LIMIT 5";
                       $best_tampil = mysqli_query($konek, $best);
					   while($row=mysqli_fetch_assoc($best_tampil)){
                   
                       ?>
										<!-- product -->
										
										<div class="product">
											<div class="product-img">
												<img src="admin/buku/<?php echo $row['cover']; ?>" alt="" width="100px" height="270px">
												<div class="product-label">
													<span class="new">Best Seller</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $row['judul_kategori']; ?></p>
												<h3 class="product-name">
												<?php 
                                                    $bagi = $row['judul']; 
                                                    $strip = strip_tags(htmlspecialchars_decode(stripcslashes($bagi)), '<a>');
                                                    echo substr($strip, 0, 22);
                                                    if(strlen(trim($row['judul']))>24) echo " ..."; 
                                                ?>
												</h3>
												<h4 class="product-price">
												<?php
                                               $harga = number_format($row['harga'], 0, ",", ".");
                                               echo "Rp ".$harga;
                                               ?>
												</h4>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-eye"></i><a href="?p=detail&id_buku=<?php echo $row['id_buku']; ?>">View More</a></button>
											</div>
										</div>
										<!-- /product -->

										 <?php } ?>
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->