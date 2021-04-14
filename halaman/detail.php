<link type="text/css" rel="stylesheet" href="css/style.css"/>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<?php
    $id_buku = $_GET['id_buku'];
    $Product = "SELECT buku.*, kat.judul_kategori FROM data_buku buku
                     INNER JOIN kategori_buku kat ON buku.id_kategori = kat.id_kategori
                     WHERE buku.id_buku=$id_buku";
    $rsProduct = mysqli_query($konek, $Product);
    $row = mysqli_fetch_assoc($rsProduct);
    $Komentar = "SELECT * FROM komentar WHERE id_buku=$id_buku ORDER BY id_komentar DESC";
    $rsKomentar = mysqli_query($konek, $Komentar);
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
					<link type="text/css" rel="stylesheet" href="style.css"/>
						<ul class="breadcrumb-tree">
							<li><a href="index.html">Home</a></li>
							<li class="active">Detail Buku</li>
							<li class="active"><?php echo $row['judul']; ?></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		<br></br>
		<div class="container relative">
		<div class="row">
		<?php 
            if(isset($_GET['info'])){ 
                $alert = $_GET['info'];
                if ($alert=='komentar_sukses'){
        ?>
        <div class="col-sm-12 col-xs-12">
            <div class="alert alert-success fade in alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Sukses!</strong> Komentar Anda telah ditambahkan
            </div>
        </div>
            <?php } else { ?>
        <div class="col-sm-12 col-xs-12">
            <div class="alert alert-danger fade in alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong>Gagal!</strong> Komentar Anda gagal ditambahkan
            </div>
        </div>
        <?php } } ?>
		
          <div class="col-sm-6 col-xs-12 mb-60">

            <div class="flickity  mfp-hover" id="gallery-main">

              <div class="gallery-cell">
                <a>
                  <img src="admin/buku/<?php echo $row['cover']; ?>" alt="" width="400" height="600" />
                </a>
              </div>
              
            </div> <!-- end gallery main -->

          </div> <!-- end col img slider -->

          <div class="col-sm-6 col-xs-12 product-description-wrap">
            <h1 class="product-title"><?php echo $row['judul']; ?></h1>
            <span class="price">
              <ins>
                <span class="ammount text-danger">
				  <font size="6">
                    <?php
                        $harga = number_format($row['harga'], 0, ",", ".");
                        echo "Rp ".$harga;
                    ?>
					</font>
                </span>
				
              </ins>
            </span>
            

            <div class="product_meta">
                <table class="table table-hover table-responsive">
                    <tr>
                        <td width="5px"></td>
                        <td><span class="sku">Pengarang</td>
                        <td><?php echo $row['pengarang']; ?></span></td>
                    </tr>
                    <tr>
                        <td width="5px"></span></td>
                        <td><span class="posted_in">Penerbit</td>
                        <td><?php echo $row['penerbit']; ?></span></td>
                    </tr>
                    <tr>
                        <td width="5px"></span></td>
                        <td><span class="tagged_as">Jumlah Halaman</td>
                        <td><?php echo $row['halaman']; ?> Halaman</span></td>
                    </tr>
                    <tr>
                        <td width="5px"></span></td>
                        <td><span class="tagged_as">Stok</td>
                        <td><?php echo $row['stok']; ?></span></td>
                    </tr>
                    <tr>
                        <td width="5px"></span></td>
                        <td><span class="posted_in">Kategori</td>
                        <td><a href="?p=kategori&id_kat=<?php echo $row['id_kategori'] ?>&halaman=1">
                            <font color="blue"><?php echo $row['judul_kategori']; ?> </font></a></span></td>
                    </tr>
                </table>
                <!-- tabs -->
                <div class="row">
                <div class="col-md-12">
                    <div class="tabs tabs-bb">
                    <ul class="nav nav-tabs">                                 
                        <li class="active">
                        <a href="#tab-description" data-toggle="tab">Deskripsi</a>
                        </li>                                 
                        <li>
                        <a href="#tab-info" data-toggle="tab">Kirim Komentar</a>
                        </li>                                 
                        <li>
                        <a href="#tab-reviews" data-toggle="tab">Komentar</a>
                        </li>                                 
                    </ul> <!-- end tabs -->
                    
                    <!-- tab content -->
                    <div class="tab-content">
                        
                        <div class="tab-pane fade in active" id="tab-description">
                        <p align="justify">
                            <?php echo htmlspecialchars_decode(stripcslashes($row['deskripsi'])); ?>
                        </p>
                        </div>
                        
                        <div class="tab-pane fade" id="tab-info">
                            <div class="col-md-12">
                                <form action="koneksi/komentar.php" name="komentar" method="post">
                                    <input name="id_buku" type="hidden" value="<?php echo $_GET['id_buku']; ?>">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input class="form-control" name="nama" id="nama" type="text" placeholder="Masukkan nama lengkap Anda" required>
                                    </div>
                                     <div class="form-group">
                                        <label for="isi">Isi Komentar</label>
                                        <textarea rows="3" cols="5" name="isi" id="isi"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-md" name="komentar"><font color="#FFF">Kirim Komentar</font></button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tab-reviews">

                        <div class="reviews">
                            <ul class="reviews-list">
                            <?php if(mysqli_num_rows($rsKomentar)==0) { ?>
                                <div class="review-body">
                                <div class="review-content">
                                    <h3 class="text-center">Belum ada komentar pada buku ini</h3>
                                </div>
                                </div>
                            <?php 
                                } else { 
                                    while($row=mysqli_fetch_assoc($rsKomentar)){ 
                            ?>
                            <li>
                                <div class="review-body">
                                <div class="review-content">
                                    <p class="review-author"><strong><?php echo $row['nama']; ?></strong><small> - <?php echo $row['tgl']; ?></small></p>
                                    <p align="justify">
									
                                       <?php
      
                                         echo $row['komentar'];
                  
                                        ?>
									
                                    </p>
                                </div>
                                </div>
                            </li>
                            <br><hr><br>
                            <?php } } ?>
                            </ul>         
                        </div> <!--  end reviews -->
                        </div>
                        
                    </div> <!-- end tab content -->

                    </div>
                </div> <!-- end tabs -->
                </div> <!-- end row -->
            </div>
 <br></br><br></br>
          </div> <!-- end col product description -->
		  </div>
		  </div>
      
    
	