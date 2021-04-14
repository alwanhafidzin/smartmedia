<?php 
  $kategori="SELECT * FROM kategori_buku ORDER BY id_kategori LIMIT 5";
  $kategori_result=mysqli_query($konek, $kategori);
?>
<?php
 $contact=mysqli_query($konek, "SELECT * FROM contact");
 ?>
<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Ketahui berita dan penawaran terbaru dari<strong> SMARTMEDIA</strong></p>
							<ul class="newsletter-follow">
								<li>
									<a><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a ><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
	
	<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
							<?php
                           $row=mysqli_fetch_assoc($contact);
                          ?>
								<h3 class="footer-title">About Us</h3>
								<p class="footer-info">Smartmedia tempat membeli buku harga murah</p>
								<ul class="footer-links">
									<li><a><i class="fa fa-map-marker"></i><?php echo $row['alamat']; ?></a></li>
									<li><a><i class="fa fa-phone"></i><?php echo $row['telepon']; ?></a></li>
									<li><a><i class="fa fa-envelope-o"></i><?php echo $row['email']; ?></a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
								    <?php while($row=mysqli_fetch_assoc($kategori_result)){ ?>
									<li><a href="?p=kategori&id_kat=<?php echo $row['id_kategori']; ?>&halaman=1"><?php echo $row['judul_kategori']; ?></a></li>
									 <?php } ?>
									 <li><a href="?p=kategori&halaman=1">all categories</li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="index.php?p=about">ABOUT US</a></li>
									<li><a href="index.php?p=contact">CONTACT US</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="admin/index.php">LOGIN</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> Smartmedia
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->