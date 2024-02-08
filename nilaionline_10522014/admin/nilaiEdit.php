<?php
    include ('../koneksi/koneksi.php');

    $getNim = $_GET["nim"];
    $getNip = $_GET["nip"];
    $editnilai = "SELECT * FROM nilai WHERE nim = '$getNim' AND nip = '$getNip'";
    $resultnilai = mysqli_query($koneksi, $editnilai);
    $datanilai = mysqli_fetch_array($resultnilai, MYSQLI_NUM);

    $querymhs = "SELECT nim, nama FROM mahasiswa WHERE nim = '$datanilai[3]'";
    $resultmhs = mysqli_query($koneksi, $querymhs);
    $datamhs = mysqli_fetch_array($resultmhs);

    $queryds = "SELECT nip, nama FROM dosen WHERE nip = '$datanilai[4]'";
    $resultds = mysqli_query($koneksi, $queryds);
    $datads = mysqli_fetch_array($resultds);

?>

<h3>EDIT DATA NILAI</h3>
<br/><hr/><br/>
<p>
    <?php
        if(!isset($_POST['submit']) && $datanilai)
        {
            ?>
            <form enctype="multipart/form-data" method="post" action="">
                <table width="100%" border="0">
                    <tr>
                        <td height="50">NAMA MAHASISWA</td>
                        <td>:</td>
                        <td><label>
                                <input type="text" name="nim" size="30" value="<?php echo $datamhs[1]; ?>" readonly="readonly">
                            </label><br/></td>
                    </tr>
                    <tr>
                        <td height="50">NAMA DOSEN</td>
                        <td>:</td>
                        <td><label>
                                <input type="text" name="nip" size="30" value="<?php echo $datads[1]; ?>" readonly="readonly">
                            </label><br/></td>
                    </tr>
                    <tr>
                        <td>NILAI TUGAS</td>
                        <td>:</td>
                        <td><input type="text" name="tugas" size="30" placeholder="TUGAS" value="<?php echo $datanilai[0] ?>"/></td>
                    </tr>
                    <tr>
                        <td>NILAI UTS</td>
                        <td>:</td>
                        <td><input type="text" name="uts" size="30" placeholder="UTS" value="<?php echo $datanilai[1] ?>"/></td>
                    </tr>
                    <tr>
                        <td>NILAI UAS</td>
                        <td>:</td>
                        <td><input type="text" name="uas" size="30" placeholder="UAS" value="<?php echo $datanilai[2] ?>"/></td>
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
                            <input id="submit" name="submit" type="submit" value="EDIT"></td>
                    </tr>
                </table>
            </form>
            <?php
        }
        elseif (isset($_POST['submit']))
        {
            $tugas = mysqli_real_escape_string($koneksi, $_POST["tugas"]);
            $uts = mysqli_real_escape_string($koneksi, $_POST["uts"]);
            $uas = mysqli_real_escape_string($koneksi, $_POST["uas"]);

            //input data mahasiswa

            $updatenilai = "UPDATE nilai SET ni_tugas=?, ni_uts=?, ni_uas=? WHERE nim=? AND nip=?";
            $stmt = mysqli_prepare($koneksi, $updatenilai);
    
            mysqli_stmt_bind_param($stmt, "sssii", $tugas, $uts, $uas, $datanilai[3], $datanilai[4]);
            
            $querynilai = mysqli_stmt_execute($stmt);

            if($querynilai)
            {
                echo"<script>alert('Daftar Nilai Berhasil Diubah!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=nilai'</script>";
            }
            else
            {
                echo"<script>alert('Daftar Gagal Diubah!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=nilai'</script>";
            }

        }else {
            echo "Data Nilai tidak ditemukan.";
        }
    ?>
        <a href="./?adm=nilai">&raquo;KEMBALI</a>
        </p>