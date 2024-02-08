<?php
    include('../koneksi/koneksi.php');

    $nim = $_GET["nim"];
    $nip = $_GET["nip"];
    $delnilai = "DELETE FROM nilai WHERE nim='$nim' AND nip='$nip'";
    $resultnilai = mysqli_query($koneksi, $delnilai);

    if($resultnilai)
    {
        echo"<script>alert('Data Nilai Mahasiswa Berhasil Dihapus!')</script>";
        echo"<script type='text/javascript'>window.location = './?adm=nilai'</script>";
    }
    else
    {
        echo"<script>alert('Data Nilai Mahasiswa Gagal Dihapus!')</script>";
        echo"<script type='text/javascript'>window.location = './?adm=nilai'</script>";
    }
?>