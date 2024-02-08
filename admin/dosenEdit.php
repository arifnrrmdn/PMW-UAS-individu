<?php
    include ('../koneksi/koneksi.php');

    $getNip = $_GET["nip"];
    $editDs = "SELECT * FROM dosen WHERE nip = '$getNip'";
    $resultDs = mysqli_query($koneksi, $editDs);
    $dataDs = mysqli_fetch_array($resultDs);
?>
<h3>EDIT DATA DOSEN</h3>
<br/><hr/><br/>
<p>
    <?php
        if(!isset($_POST['submit']))
        {
            ?>
            <form enctype="multipart/form-data" method="post">
                <table width="100%" border="0">
                    <tr>
                        <td width="27%">NIP</td>
                        <td width="4%">:</td>
                        <td width="69%"><input type="text" name="nip" size="30" value="<?php echo $dataDs[0]?>" 
                        readonly="readonly"/></td>
                    </tr>
                    <tr>
                        <td>NAMA</td>
                        <td>:</td>
                        <td><input type="text" name="nama" id="nama" size="30" value="<?php echo $dataDs[1]?>"/></td>
                    </tr>
                    <tr>
                        <td width="27%">KODE MATKUL</td>
                        <td>:</td>
                        <td><input type="text" name="kode_mtkul" size="30" value="<?php echo $dataDs[2]?>"></td>
                    </tr>
                    <tr>
                        <td>PASSWORD</td>
                        <td>:</td>
                        <td><input type="text" name="password" id="password" size="30" value="<?php echo $dataDs[3]?>"></td>
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
            $nip = $_POST["nip"];
            $nama = $_POST["nama"];
            $kodematkul = $_POST["kode_mtkul"];
            $password = md5($_POST["password"]);

            //input data mahasiswa

            $updateDs = "UPDATE dosen SET nama='$nama', kode_mtkul='$kodematkul', password='$password' WHERE nip='$nip'";
            $queryDs = mysqli_query($koneksi, $updateDs);

            if($queryDs)
            {
                echo"<script>alert('Data Berhasil Diubah!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=dosen'</script>";
            }
            else
            {
                echo"<script>alert('Data Gagal Diubah!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=dosen'</script>";
            }

        }
    ?>
        <a href="./?adm=dosen">&raquo;KEMBALI</a>
        </p>