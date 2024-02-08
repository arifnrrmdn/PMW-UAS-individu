<?php
    include('../koneksi/koneksi.php');

    $kodematkul = $_GET["kode_mtkul"];
    $delMk = "DELETE FROM matakuliah WHERE kode_mtkul='$kodematkul'";
    $resultMk = mysqli_query($koneksi, $delMk);

    if($resultMk)
    {
        echo"<script>alert('Data Mata Kuliah Berhasil Dihapus!')</script>";
        echo"<script type='text/javascript'>window.location = './?adm=matakuliah'</script>";
    }
    else
    {
        echo"<script>alert('Data Mata Kuliah Gagal Dihapus!')</script>";
        echo"<script type='text/javascript'>window.location = './?adm=matakuliah'</script>";
    }
?>