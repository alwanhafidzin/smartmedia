<?php
    include "koneksi.php";
    if(isset($_POST['komentar'])){
        $id_buku=$_POST['id_buku'];
        $nama=mysqli_real_escape_string($konek, $_POST['nama']);
        $isi=mysqli_real_escape_string($konek, $_POST['isi']);
        $tgl=date("Y-m-d H:i:s");

        $query = "INSERT INTO komentar VALUES(NULL, $id_buku, '$nama', '$isi', '$tgl')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index.php?p=detail&id_buku='.$id_buku.'&info=komentar_sukses');
        else
            header('location: ../index.php?p=detail&id_buku='.$id_buku.'&info=komentar_gagal');
    }