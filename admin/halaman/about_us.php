<?php
    if(!defined('MyConst')){
        die('Akses langsung tidak diperbolehkan');
    }
    $about_us=mysqli_query($konek, "SELECT * FROM about");
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
                            <strong>Edit Sukses!</strong> Edit data About US halaman website berhasil disimpan.
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
                                          <th><font size="4">About US</font></th>
										  <th><font size="4">Aksi</font></th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        <?php
                                          $row=mysqli_fetch_assoc($about_us);
                                        ?>
                                         <tr>
                                            <td><font size="4"><?php echo $row['data_aboutus']; ?></font></td>
                                            <td>
											     <a href="" data-toggle="modal" data-target=".edit_about" data-id='<?php echo $row['id_about']; ?>' data-about='<?php echo $row['data_aboutus']; ?>'
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
	 <div class="modal fade edit_about" tabindex="-3" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Data About US</h4>
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
                            <label for="about">About US</label>
                            <textarea name="about" id="about" rows="5" cols="20" class="form-control"></textarea>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-4 col-md-offset-4">
                        <button type="submit" class="c-btn medium blue-bg" name="update_about">Update</button>
                        <button type="button" class="c-btn medium red-bg" data-dismiss="modal">Batal</button>
                </div>
            </div>
            </form>            
            </div>
        </div>
     </div>