<?php
    include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA MATA KULIAH</h3>
<br/><hr/><br/>
<p>
    <?php
        if(!isset($_POST['submit']))
        {
            ?>
            <form enctype="multipart/form-data" method="post">
                <table width="100%" border="0">
                    <tr>
                        <td width="27%">KODE MATA KULIAH</td>
                        <td width="4%">:</td>
                        <td width="69%"><input type="text" name="kode_mtkul" size="30" placeholder="KODE MATA KULIAH"/></td>
                    </tr>
                    <tr>
                        <td>NAMA MATA KULIAH</td>
                        <td>:</td>
                        <td><input type="text" name="nama_mtkul" size="30" placeholder="NAMA MATA KULIAH"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <input id="submit" name="submit" type="submit" value="TAMBAH"></td>
                    </tr>
                </table>
            </form>
            <?php
        }
        else
        {
            $kodematkul = $_POST["kode_mtkul"];
            $namamatkul = $_POST["nama_mtkul"];

            //input data mahasiswa

            $insertMk = "INSERT INTO matakuliah VALUE ('$kodematkul', '$namamatkul')";
            $queryMk = mysqli_query($koneksi, $insertMk);

            if($queryMk)
            {
                echo"<script>alert('Daftar Berhasil Disimpan!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=matakuliah'</script>";
            }
            else
            {
                echo"<script>alert('Daftar Gagal Disimpan!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=matakuliah'</script>";
            }

        }
    ?>
        <a href="./?adm=matakuliah">&raquo;KEMBALI</a>
        </p>