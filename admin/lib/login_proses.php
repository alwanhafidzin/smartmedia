<?php
  session_start();
  include "koneksi.php";
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $username=mysqli_real_escape_string($konek, $user);
  $password=mysqli_real_escape_string($konek, MD5($pass));
  $passcrypt=sha1($password);
  $query=mysqli_query($konek, "SELECT * FROM admin where username='$username' and password='$password'");
  $row=mysqli_fetch_assoc($query);
  $cek=mysqli_num_rows($query);
  if($row['level']=='admin'){
    $_SESSION['username']=$username;
	$_SESSION['id_admin']=$row['id_admin'];
    $_SESSION['nama']=$row['nama'];
    header("location:../index.php?a=sukses_login");
  }else{
    header("location:../login.php?a=gagal_login");
  }