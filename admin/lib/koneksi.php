<?php
    date_default_timezone_set("Asia/Jakarta");
    $host ="localhost";
    $user ="root";
    $pass = "";
    $dbName = "smartmedia";

    $konek = mysqli_connect($host,$user,$pass);
    if(!$konek)
        die("Gagal koneksi...");

    $hasil = mysqli_select_db($konek,$dbName);
