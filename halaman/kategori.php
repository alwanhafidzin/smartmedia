<?php
                $bukuAll = "SELECT id_buku FROM data_buku";
                $rsBukuAll = mysqli_query($konek, $bukuAll);
                $halaman = 6;
                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                if(isset($_GET['id_kat'])){
                    $id_kat = $_GET['id_kat'];
                    $result = mysqli_query($konek,"SELECT * FROM data_buku WHERE id_kategori=$id_kat");
                } else 
                    $result = mysqli_query($konek,"SELECT * FROM data_buku");
                $total = mysqli_num_rows($result);
                $pages = ceil($total/$halaman);
                if(isset($_GET['id_kat'])){
                    $buku = "SELECT id_buku, judul, harga, cover FROM data_buku WHERE id_kategori=$id_kat ORDER BY id_buku DESC LIMIT $mulai, $halaman";
                }
                else    
                    $buku = "SELECT id_buku, judul, harga, cover FROM data_buku ORDER BY id_buku DESC LIMIT $mulai, $halaman";
                $rs = mysqli_query($konek, $buku);
                $no =$mulai+1;
                $data = mysqli_num_rows($rs);
                if($data==0){
              ?>
			   <?php   
                } else {
                    while($row=mysqli_fetch_assoc($rs)){
              ?>
			   <?php } } ?>
			   
			   <!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="#">Categories</a></li>
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
						<ul class="breadcrumb-tree">
							<li><a href="index.html">Home</a></li>
							<li class="active">Book Collection</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
                                <a href="?p=kategori&halaman=1">Semua Kategori <?php echo "(".mysqli_num_rows($rsBukuAll).")" ?></a>
                               </div>
                 <?php
                    $sideKat = "SELECT * FROM kategori_buku";
                    $rsSideKat = mysqli_query($konek, $sideKat);
                    while($row=mysqli_fetch_assoc($rsSideKat)){
                        if(isset($_GET['id_kat'])){
                            $id_kat = $_GET['id_kat'];
                            $active = "active-cat";
                        } else $active = "";
                        $sideKatPer = "SELECT id_buku FROM data_buku WHERE id_kategori=".$row['id_kategori'];
                        $rsSideKatPer = mysqli_query($konek, $sideKatPer);
                ?>
                    <div class="input-checkbox">
                        <a href="?p=kategori&id_kat=<?php echo $row['id_kategori'] ?>&halaman=1"><?php echo $row['judul_kategori']." (".mysqli_num_rows($rsSideKatPer).")"; ?></a>
                    </div>
                <?php } ?>
 
								 
							</div>
						</div>
						<!-- /aside Widget -->


						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
							<?php
                $bukuAll = "SELECT id_buku FROM data_buku";
                $rsBukuAll = mysqli_query($konek, $bukuAll);
                $halaman = 6;
                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                if(isset($_GET['id_kat'])){
                    $id_kat = $_GET['id_kat'];
                    $result = mysqli_query($konek,"SELECT * FROM data_buku WHERE id_kategori=$id_kat");
                } else 
                    $result = mysqli_query($konek,"SELECT * FROM data_buku");
                $total = mysqli_num_rows($result);
                $pages = ceil($total/$halaman);
                if(isset($_GET['id_kat'])){
                    $buku = "SELECT id_buku, judul, harga, cover,kat.*,buku.* FROM data_buku buku INNER JOIN kategori_buku kat ON buku.id_kategori=kat.id_kategori WHERE buku.id_kategori=$id_kat ORDER BY buku.id_buku DESC LIMIT $mulai, $halaman";
                }
                else    
                    $buku = "SELECT id_buku, judul, harga, cover,kat.*,buku.* FROM data_buku buku INNER JOIN kategori_buku kat ON buku.id_kategori=kat.id_kategori ORDER BY buku.id_buku DESC LIMIT $mulai, $halaman";
                $rs = mysqli_query($konek, $buku);
                $no =$mulai+1;
                $data = mysqli_num_rows($rs);
                if($data==0){
              ?>
			  <div class="col-md-12 col-xs-12">
                    <div class="product-item text-center">
                        <h1>Maaf, data buku kategori Ini belum tersedia</h1>
                    </div>
              </div>
			   <?php   
                } else {
                    while($row=mysqli_fetch_assoc($rs)){
              ?>
							<!-- product -->
							<div class="col-md-4 col-xs-6">
								<div class="product">
											<div class="product-img">
												<img src="admin/buku/<?php echo $row['cover']; ?>" alt=""  width="100px" height="270px">
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $row['judul_kategori']; ?></p>
												<h3 class="product-name"><a href="#">
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
                                                ?>
												</h4>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-eye"></i><a href="?p=detail&id_buku=<?php echo $row['id_buku']; ?>"> View More</a></button>
											</div>
										</div>
							</div>
							<!-- /product -->

							<div class="clearfix visible-sm visible-xs"></div>
                   <?php } } ?>
						
						</div>
						<!-- /store products -->
					
<?php 
                if($data!=0){ 
            ?>
           <div class="store-filter clearfix">        
             <ul class="store-pagination">
                <?php if(isset($_GET['id_kat'])) { if($page == 1) echo ""; else {?>
                    <li><a href="?p=kategori&id_kat=<?php echo $_GET['id_kat']; ?>&halaman=1"><i class="fa fa-angle-double-left"></i></a></li>
                    <li><a href="?pkategori&id_kat=<?php echo $_GET['id_kat']; ?>&halaman=<?php echo $_GET['halaman']-1; ?>"><i class="fa fa-angle-left"></i></a></li>
                <?php } } else { if($page == 1) echo ""; else {?>
                    <li><a href="?p=kategori&halaman=1"><i class="fa fa-angle-double-left"></i></a></li>
                    <li><a href="?p=kategori&halaman=<?php echo $_GET['halaman']-1; ?>"><i class="fa fa-angle-left"></i></a></li>
                <?php 
                    } }
                    if(isset($_GET['id_kat'])){ 
                        for ($i=1; $i<=$pages ; $i++){
                ?>
                    <li class="<?php if($i==$page) echo 'active'; ?>"><a href="?p=kategori&id_kat=<?php echo $_GET['id_kat']; ?>&halaman=<?php echo $i; ?>" ><?php echo $i; ?></a></li>
                <?php } } else { 
                    for ($i=1; $i<=$pages ; $i++){
                ?>
                    <li class="<?php if($i==$page) echo 'active'; ?>"><a href="?p=kategori&halaman=<?php echo $i; ?>" ><?php echo $i; ?></a></li>
                <?php } } ?>

                <?php if(isset($_GET['id_kat'])) { if($page == $pages) echo ""; else {?>
                    <li><a href="?p=kategori&id_kat=<?php echo $_GET['id_kat']; ?>&halaman=<?php echo $_GET['halaman']+1; ?>"><i class="fa fa-angle-right"></i></a></li>
                    <li><a href="?p=kategori&id_kat=<?php echo $_GET['id_kat']; ?>&halaman=<?php echo $pages; ?>"><i class="fa fa-angle-double-right"></i></a></li>
                <?php } } else { if($page == $pages) echo ""; else {?>
                    <li><a href="?p=kategori&halaman=<?php echo $_GET['halaman']+1; ?>"><i class="fa fa-angle-right"></i></a></li>
                    <li><a href="?p=kategori&halaman=<?php echo $pages; ?>"><i class="fa fa-angle-double-right"></i></a></li>
                <?php } } ?>
              </ul>
            </div>
            <?php } ?>
						
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->