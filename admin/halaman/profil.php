<?php
    if(!defined('MyConst')){
            die('Akses langsung tidak diperbolehkan');
        }
		$id =$_SESSION['id_admin'];
		$profil=mysqli_query($konek, "SELECT * FROM admin where id_admin=$id ");
		
		?>
		<?php 
                                           $row=mysqli_fetch_assoc($profil)
                                        ?>
		
		<div class="panel-content">
        <div class="main-title-sec">
            <div class="row">
                <div class="col-md-12 column">
                       <?php
                        if(isset($_GET['a'])){
                            $alert=$_GET['a'];
                            if($alert=='insert_sukses'){
                        ?>
                        <?php } else if($alert=='update_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Gagal!</strong> Data Profil gagal diperbarui.
                        </div>
                        <?php } else if($alert=='upload_gagal'){ ?>
                        <div role="alert" class="alert color red-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Gagal!</strong> Upload Foto gagal.
                        </div>
                        <?php } else if($alert=='update_sukses'){ ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Update Sukses!</strong> Pembaharuan data profil berhasil disimpan.
                        </div>
                        <?php } } ?>
                    </div>
                <div class="col-md-9 column">
                    <div class="heading-profile">
                        <h2>Admin</h2>
                        <span><strong> <?php echo $row['nama']; ?></strong></span>
                    </div>
                </div>
            </div>
        </div><!-- Heading Sec -->
		<ul class="breadcrumbs">
            <li><a href="#" title="">Admin</a></li>
            <li><a href="#" title="">Profil</a></li>
        </ul>
		
		<div class="main-content-area">
               <div class="row">
			   <div class="col-md-3">
			   </div>
                    <div class="col-md-6">
                        <div class="widget">
                              <div class="widget-title">
                                   <center><h3>Profil</h3></center>
                              </div>
							  <div class="with-padding">                                          
                                <table class="table table-responsive table-bordered table-condensed table-hover table-striped">
								<thead>
								
		<tr>
			<td align="left"><h3>Nama</h3></td>
			<td><h3><?php echo $row['nama'] ?></h3></td>
		</tr>
	    <tr>
			<td align="left"><h3>Foto</h3></td>
			<td>
			<a>
              <img src="foto/<?php echo $row['foto']; ?>" class=" img-responsive" alt="<?php echo $row['foto']; ?>" width="150" height="200">
            </a>
            </td>
		</tr>
		<tr>
			<td align="left"><h3>Alamat</h3></td>
			<td><h3><?php echo $row['alamat'] ?></h3></td>
		</tr>
		<tr>
			<td align="left"><h3>NIM</h3></td>
			<td><h3><?php echo $row['nim'] ?></h3></td>
		</tr>
		<tr>
			<td align="left"><h3>Jurusan</h3></td>
			<td><h3><?php echo $row['jurusan'] ?></h3></td>
		</tr>
		<tr>
			<td align="left"><h3>Email</h3></td>
			<td><h3><?php echo $row['email'] ?></h3></td>
		</tr>
		<tr>
			<td align="left"><h3>Telepon</h3></td>
			<td><h3><?php echo $row['telepon'] ?></h3></td>
		</tr>
		<tr>
			<td colspan="5" align="right">
			   <a href="#" data-toggle="modal" data-target=".profil" data-id='<?php echo $row['id_admin']; ?>' data-nama='<?php echo $row['nama']; ?>' data-foto='<?php echo $row['foto'] ?>' 
			   data-alamat='<?php echo $row['alamat'] ?>' data-nim='<?php echo $row['nim'] ?>' data-jurusan='<?php echo $row['jurusan'] ?>' data-email='<?php echo $row['email'] ?>'
			   data-telepon='<?php echo $row['telepon'] ?>' class="c-btn small blue-bg buzz edit_button"><i class="fa fa-pencil-square"></i></a>
			   
		</tr>
		</thead>
                                </table> 
                             </div>
                         </div>
                    </div>   
					
    <div class="modal fade profil" tabindex="-3" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Profil</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
					    <div class="form-group">
                            <label for="id">ID Admin</label>
                            <input type="text" id="id" name="id" class="form-control edit_id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control edit_nama" required>
                        </div>
						<div class="form-group">
                            <label for="foto">Ganti Foto <small>(Foto baru harus dimasukkan jika tidak ingin data foto hilang)</small></label>
                            <input type="file" id="foto" name="foto" class="form-control edit">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control edit_alamat" required>
                        </div>
						<div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" id="nim" name="nim" class="form-control edit_nim" required>
                        </div>
						<div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" id="jurusan" name="jurusan" class="form-control edit_jurusan" required>
                        </div>
						<div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control edit_email" required>
                        </div>
						<div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" id="telepon" name="telepon" class="form-control edit_telepon" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn medium blue-bg" name="update_profil">Update</button>
                        <button type="button" class="c-btn medium red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
     </div>
				
		