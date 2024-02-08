<?php
    include('../koneksi/koneksi.php');

    $nip = $_GET["nip"];
    $delDs = "DELETE FROM dosen WHERE nip='$nip'";
    $resultDs = mysqli_query($koneksi, $delDs);

    if($resultDs)
    {
        echo"<script>alert('Data Dosen Berhasil Dihapus!')</script>";
        echo"<script type='text/javascript'>window.location = './?adm=dosen'</script>";
    }
    else
    {
        echo"<script>alert('Data Dosen Gagal Dihapus!')</script>";
        echo"<script type='text/javascript'>window.location = './?adm=dosen'</script>";
    }
?>