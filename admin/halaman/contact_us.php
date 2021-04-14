<?php
    if(!defined('MyConst')){
        die('Akses langsung tidak diperbolehkan');
    }
    $contact_us=mysqli_query($konek, "SELECT * FROM contact");
?>
<div class="panel-content">
          <div class="main-title-sec">
             <div class="row">
			   <div class="col-md-12 column">
                       <?php
                        if(isset($_GET['a'])){
                            $alert=$_GET['a'];
                            if($alert=='update_sukses'){
                        ?>
                        <div role="alert" class="alert color green-bg fade in alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Edit Sukses!</strong> Edit data Contact US halaman website berhasil disimpan.
                        </div>
                        <?php } } ?>
                    </div>
			   <div class="col-md-3 column">
                         <div class="heading-profile">
                              <h2>Data About US</h2>
                         </div>
                    </div>
               </div>
			   <ul class="breadcrumbs">
               <li><a href="" title="">Admin</a></li>
               <li>Data About US</li>
          </ul>
		  <div class="main-content-area">
               <div class="row">
                    <div class="col-md-12">
                         <div class="streaming-table">
                                   <table id="komentar" class='table table-responsive table-responsive table-striped table-hover'>
                                     <thead>
                                        <tr>
                                          <th><font size="4">Deskripsi Contact US</font></th>
										  <th><font size="4">Telepon</font></th>
										  <th><font size="4">Email</font></th>
										  <th><font size="4">Alamat Toko</font></th>
										  <th><font size="4">Aksi</font></th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        <?php
                                          $row=mysqli_fetch_assoc($contact_us);
                                        ?>
                                         <tr>
                                            <td><font size="4"><?php echo $row['deskripsi']; ?></font></td>
											<td><font size="4"><?php echo $row['telepon']; ?></font></td>
											<td><font size="4"><?php echo $row['email']; ?></font></td>
											<td><font size="4"><?php echo $row['alamat']; ?></font></td>
                                            <td>
											     <a href="" data-toggle="modal" data-target=".edit_contact_us" data-id='<?php echo $row['id_contact']; ?>' data-deskripsi='<?php echo $row['deskripsi']; ?>'
												 data-telepon='<?php echo $row['telepon']; ?>' data-email='<?php echo $row['email']; ?>' data-alamat='<?php echo $row['alamat']; ?>' 
                                                class="c-btn small green-bg buzz edit_button"><i class="fa fa-pencil-square"></i></a>
                                            </td>
                                        </tr>
                                     </tbody>
                                   </table>
                                </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div><!-- Panel Content -->
	 <div class="modal fade edit_contact_us" tabindex="-3" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data Contact US</h4>
            </div>
            <div class="modal-body">
                <form action="lib/proses.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
					     <div class="form-group">
                            <input type="hidden" id="id" name="id" class="form-control edit_id" readonly>
                        </div>
						<div class="form-group">
                            <div class="form-group">
                            <label for="about">Deskripsi Contact US</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5" cols="20" class="form-control"></textarea>
                        </div>
						 <div class="form-group">
                            <label for="id">No Telepon</label>
                            <input type="text" id="telepon" name="telepon" class="form-control edit_telepon" required>
                        </div>
						<div class="form-group">
                            <label for="id">Email</label>
                            <input type="text" id="email" name="email" class="form-control edit_email" required>
                        </div>
						<div class="form-group">
                            <label for="id">Alamat Toko</label>
                            <input type="text" id="alamat" name="alamat" class="form-control edit_alamat" required>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn medium blue-bg" name="update_contact_us">Update</button>
                        <button type="button" class="c-btn medium red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
     </div>