<?php
    include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA DOSEN</h3>
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
                        <td width="69%"><input type="text" name="nip" size="30" placeholder="NIP"/></td>
                    </tr>
                    <tr>
                        <td>NAMA</td>
                        <td>:</td>
                        <td><input type="text" name="nama" size="30" placeholder="NAMA"/></td>
                    </tr>
                    <tr>
                        <td>KODE MATKUL</td>
                        <td>:</td>
                        <td><input type="text" name="kode_mtkul" size="30" placeholder="KODE MATKUL"/></td>
                    </tr>
                    <tr>
                        <td>PASSWORD</td>
                        <td>:</td>
                        <td><input type="text" name="password" id="password" size="30" placeholder="PASSWORD"></td>
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
            $nip = $_POST["nip"];
            $nama = $_POST["nama"];
            $kodematkul = $_POST["kode_mtkul"];
            $password = md5($_POST["password"]);

            //input data mahasiswa

            $insertDs = "INSERT INTO dosen VALUE ('$nip', '$nama', '$kodematkul', '$password')";
            $queryDs = mysqli_query($koneksi, $insertDs);

            if($queryDs)
            {
                echo"<script>alert('Daftar Berhasil Disimpan!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=dosen'</script>";
            }
            else
            {
                echo"<script>alert('Daftar Gagal Disimpan!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=dosen'</script>";
            }

        }
    ?>
        <a href="./?adm=dosen">&raquo;KEMBALI</a>
        </p>