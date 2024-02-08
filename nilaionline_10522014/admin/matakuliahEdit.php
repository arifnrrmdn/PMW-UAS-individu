<?php
    include ('../koneksi/koneksi.php');

    $getKodeMatkul = $_GET["kode_mtkul"];
    $editMk = "SELECT * FROM matakuliah WHERE kode_mtkul = '$getKodeMatkul'";
    $resultMk = mysqli_query($koneksi, $editMk);
    $dataMk = mysqli_fetch_array($resultMk);
?>
<h3>EDIT DATA MATA KULIAH</h3>
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
                        <td width="69%"><input type="text" name="kode_mtkul" size="30" value="<?php echo $dataMk[0]?>" 
                        readonly="readonly"/></td>
                    </tr>
                    <tr>
                        <td>NAMA MATA KULIAH</td>
                        <td>:</td>
                        <td><input type="text" name="nama_mtkul" id="nama" size="30" value="<?php echo $dataMk[1]?>"/></td>
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
                            <input id="submit" name="submit" type="submit" value="UBAH"></td>
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

            $updateMk = "UPDATE matakuliah SET nama_mtkul='$namamatkul' WHERE kode_mtkul='$kodematkul'";
            $queryMk = mysqli_query($koneksi, $updateMk);

            if($queryMk)
            {
                echo"<script>alert('Data Berhasil Diubah!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=matakuliah'</script>";
            }
            else
            {
                echo"<script>alert('Data Gagal Diubah!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=matakuliah'</script>";
            }

        }
    ?>
        <a href="./?adm=matakuliah">&raquo;KEMBALI</a>
        </p>