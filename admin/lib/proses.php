<?php
    include "koneksi.php";
   
    function upload_img($file_tmp, $file_nama, $target){
        $target_dir = $target;
        $target_file = $target_dir . basename($file_nama);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($file_tmp);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return false;
        } else {
            if (move_uploaded_file($file_tmp, $target_file)) {
                echo "The file ". basename( $file_nama). " has been uploaded.";
                return true;
            } else {
                echo "Sorry, there was an error uploading your file.";
                return false;
            }
        }
    }
	
	 if (isset($_POST['update_profil'])) {
		$id=$_POST['id'];
        $nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
        $nim=$_POST['nim'];
		$jurusan=$_POST['jurusan'];
		$email=$_POST['email'];
		$telepon=$_POST['telepon'];
		if(empty($_FILES['foto']['name'])){
            $sql = "update `admin` set `nama`='$nama',
        `alamat`='$alamat', `nim`='$nim',`jurusan`='$jurusan', `email`='$email',`telepon`='$telepon'
          where `id_admin` = '$id'";
        } else {
            $foto = $_FILES["foto"]["name"];
            $tmp_foto = $_FILES["foto"]["tmp_name"];
            $target = "../foto/";
            $upload = upload_img($tmp_foto, $foto, $target);
            $sql = "update `admin` set `nama`='$nama',
        `alamat`='$alamat', `nim`='$nim',`jurusan`='$jurusan', `email`='$email',`telepon`='$telepon',`foto`='$foto'
          where `id_admin` = '$id'";
            if ($upload==true) {
                $get_foto = mysqli_query($konek, "SELECT foto FROM admin WHERE id_admin=$id");
                $row = mysqli_fetch_assoc($get_foto);
                $foto_url = "../foto/{$row['foto']}";
                unlink($foto_url);
            } else header("location: ../index.php?p=data&a=upload_gagal");
        }
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=profil&a=update_sukses');
        else
            header('location: ../index.php?p=profil&a=update_gagal');        
    }
    if(isset($_POST['tambah'])){
        $judul=mysqli_real_escape_string($konek, $_POST['judul']);
        $pengarang=mysqli_real_escape_string($konek, $_POST['pengarang']);
        $penerbit=mysqli_real_escape_string($konek, $_POST['penerbit']);
        $harga=$_POST['harga'];
        $halaman=$_POST['halaman'];
        $kategori=$_POST['kategori'];
        $deskripsi= htmlspecialchars(mysqli_real_escape_string($konek, $_POST['deskripsi']));
        $stok=$_POST['stok'];
        $rating=$_POST['rating'];
        $cover = $_FILES["cover"]["name"];
        $tmp_cover = $_FILES["cover"]["tmp_name"];
        $target = "../buku/";
        $upload = upload_img($tmp_cover, $cover, $target);
		$sql = "insert into `data_buku` (`judul`, `pengarang`, `penerbit`, `harga`,`halaman`, `id_kategori`, `deskripsi`, `stok`, `cover`, `best_sell`)
        values ('$judul', '$pengarang', '$penerbit', '$harga','$halaman', '$kategori', '$deskripsi', '$stok', '$cover', '0')";
        if ($upload==true) {
            $hasil = mysqli_query($konek, $sql);
            if ($hasil)
                header('location: ../index.php?p=data&a=insert_sukses');
            else
                header('location: ../index.php?p=data&a=insert_gagal');
        } else header("location: ../index.php?p=data&a=upload_gagal");
    }
    if (isset($_POST['update'])) {
        $id=$_POST['id'];
        $judul=mysqli_real_escape_string($konek, $_POST['judul']);
        $pengarang=mysqli_real_escape_string($konek, $_POST['pengarang']);
        $penerbit=mysqli_real_escape_string($konek, $_POST['penerbit']);
        $harga=$_POST['harga'];
        $halaman=$_POST['halaman'];
        $kategori=$_POST['kategori'];
        $deskripsi=htmlspecialchars(mysqli_real_escape_string($konek, $_POST['deskripsi']));
        $stok=$_POST['stok'];
        $rating=$_POST['rating'];
        if(empty($_FILES['cover']['name'])){
			 $sql = "update `data_buku` set `judul`='$judul',`pengarang`='$pengarang', `penerbit`='$penerbit',
        `harga`='$harga', `halaman`='$halaman',`id_kategori`='$kategori', `deskripsi`='$deskripsi',`stok`='$stok'
          where `id_buku` = '$id'";
        } else {
            $cover = $_FILES["cover"]["name"];
            $tmp_cover = $_FILES["cover"]["tmp_name"];
            $target = "../buku/";
            $upload = upload_img($tmp_cover, $cover, $target);
            $sql = "update `data_buku` set `judul`='$judul',`pengarang`='$pengarang', `penerbit`='$penerbit',
        `harga`='$harga', `halaman`='$halaman',`id_kategori`='$kategori', `deskripsi`='$deskripsi',`stok`='$stok',`cover`='$cover'
          where `id_buku` = '$id'";
            if ($upload==true) {
                $get_cover = mysqli_query($konek, "SELECT cover FROM data_buku WHERE id_buku=$id");
                $row = mysqli_fetch_assoc($get_cover);
                $cover_url = "../buku/{$row['cover']}";
                unlink($cover_url);
            } else header("location: ../index.php?p=data&a=upload_gagal");
        }
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=data&a=update_sukses');
        else
            header('location: ../index.php?p=data&a=update_gagal');        
    }

    if (isset($_POST['hapus'])) {
        $id=$_POST['id'];
        $cover = mysqli_query($konek, "SELECT cover FROM data_buku WHERE id_buku=$id");
        $row = mysqli_fetch_assoc($cover);
        $url_cover = "../buku/{$row['cover']}";
        $hapus_gambar = unlink($url_cover);
        $sql1 = "DELETE FROM data_buku WHERE id_buku=$id";
        $sql2 = "DELETE FROM komentar WHERE id_buku=$id";
        $hasil1 = mysqli_query($konek, $sql1);
        $hasil2 = mysqli_query($konek, $sql2);
        if ($hasil1&&$hasil2&&$hapus_gambar){
            header('location: ../index.php?p=data&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=data&a=hapus_gagal');
    }

    if (isset($_POST['hapus_best'])) {
        $id = $_POST['id'];
		$sql = "update `data_buku` set `best_sell`='0' where `id_buku` = '$id'";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=data&a=hapus_best_sukses');
        else
            header('location: ../index.php?p=data&a=hapus_best_gagal');
    }

    if (isset($_POST['tambah_best'])) {
        $id = $_POST['id'];
        $sql = "update `data_buku` set `best_sell`='1' where `id_buku` = '$id'";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=data&a=tambah_best_sukses');
        else
            header('location: ../index.php?p=data&a=tambah_best_gagal');
    }

    if(isset($_POST['tambah_kat'])){
        $kategori=mysqli_real_escape_string($konek, $_POST['kategori']);
		$sql = "insert into `kategori_buku` set `judul_kategori`='$kategori'";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
                header('location: ../index.php?p=kategori&a=insert_sukses');
            else
                header('location: ../index.php?p=kategori&a=insert_gagal');
    }

    if (isset($_POST['update_kat'])) {
        $id = $_POST['id'];
        $kategori = mysqli_real_escape_string($konek, $_POST['kategori']);
		$sql = "update `kategori_buku` set `judul_kategori`='$kategori' where `id_kategori` = '$id'";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=kategori&a=update_sukses');
        else
            header('location: ../index.php?p=kateori&a=update_gagal');
    }

    if (isset($_POST['hapus_kat'])) {
        $id=$_POST['id'];
        $cover = mysqli_query($konek, "SELECT cover FROM data_buku WHERE id_kategori=$id");
        while($row = mysqli_fetch_assoc($cover)){
            $url_cover = "../../img/book/{$row['cover']}";
            $hapus_gambar = unlink($url_cover);
        }
        $sql1 = "DELETE FROM data_buku WHERE id_kategori=$id";
        $sql2 =  "DELETE FROM kategori_buku WHERE id_kategori=$id";
        $hasil1 = mysqli_query($konek, $sql1);
        $hasil2 = mysqli_query($konek, $sql2);
        if ($hasil1&&$hasil2){
            header('location: ../index.php?p=kategori&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=kategori&a=hapus_gagal');
    }

    if(isset($_POST['tambah_slider'])){
        $get_gambar = mysqli_query($konek, "SELECT id_slide FROM slider");
        $get_urutan = mysqli_num_rows($get_gambar);
        $judul=mysqli_real_escape_string($konek, $_POST['judul']);
        $keterangan=mysqli_real_escape_string($konek, $_POST['keterangan']);
        $gambar = $_FILES["gambar"]["name"];
        $tmp_gambar = $_FILES["gambar"]["tmp_name"];
        $target = "../slider/";
        $upload = upload_img($tmp_gambar, $gambar, $target);
		$sql = "insert into `slider` (`judul`, `keterangan`, `gambar`, `urutan`) values ('$judul', '$keterangan', '$gambar', '$get_urutan+1')";
        if ($upload==true) {
            $hasil = mysqli_query($konek, $sql);
            if ($hasil)
                header('location: ../index.php?p=slider&a=insert_sukses');
            else
                header('location: ../index.php?p=slider&a=insert_gagal');
        } else 
            header("location: ../index.php?p=slider&a=upload_gagal");
    }

    if (isset($_POST['hapus_slider'])) {
        $id=$_POST['id'];
        $gambar = mysqli_query($konek, "SELECT gambar FROM slider WHERE id_slide=$id");
        $row = mysqli_fetch_assoc($gambar);
        $url_gambar = "../slider/{$row['gambar']}";
        $hapus_gambar = unlink($url_gambar);
        $sql = "DELETE FROM slider WHERE id_slide=$id";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil&&$hapus_gambar){
            header('location: ../index.php?p=slider&a=hapus_sukses');
        }
        else
            header('location: ../index.php?p=slider&a=hapus_gagal');
    }

    if (isset($_POST['update_slider'])) {
        $id=$_POST['id'];
        $judul=mysqli_real_escape_string($konek, $_POST['judul']);
        $keterangan=mysqli_real_escape_string($konek, $_POST['keterangan']);
        $urutan=$_POST['urutan'];
		$sql = "update `slider` set `judul`='$judul',`keterangan`='$keterangan', `urutan`='$urutan' where `id_slide` = '$id'";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=slider&a=update_sukses');
        else
            header('location: ../index.php?p=slider&a=update_gagal');
    }

    if (isset($_POST['delete_comment'])) {
        $id = $_POST['id'];
        $sql ="DELETE FROM komentar WHERE id_komentar=$id";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=comment&a=hapus_sukses');
        else
            header('location: ../index.php?p=comment&a=hapus_gagal');
    }
	 if (isset($_POST['update_about'])) {
		$id=isset($_POST['id']);
		$about= $_POST['about'];
		$sql = "update `about` set `data_aboutus`='$about' where `id_about` = '$id'";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=about_us&a=update_sukses');
        else
            header('location: ../index.php?p=about_us&a=update_gagal');        
    }
	if (isset($_POST['update_contact_us'])) {
		$id=isset($_POST['id']);
		$deskripsi= $_POST['deskripsi'];
		$telepon= $_POST['telepon'];
		$email= $_POST['email'];
		$alamat= $_POST['alamat'];
		$sql = "update `contact` set `deskripsi`='$deskripsi',`telepon`='$telepon', `email`='$email',`alamat`='$alamat' where `id_contact` = '$id'";
        $hasil = mysqli_query($konek, $sql);
        if ($hasil)
            header('location: ../index.php?p=contact_us&a=update_sukses');
        else
            header('location: ../index.php?p=contact_us&a=update_gagal');        
    }