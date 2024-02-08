<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $nama_db = "nilaionline_10522014";

    //mulai koneksi ke mysql
    $koneksi = mysqli_connect($host, $username, $password, $nama_db) or die ("Koneksi mysql gagal!");
?>