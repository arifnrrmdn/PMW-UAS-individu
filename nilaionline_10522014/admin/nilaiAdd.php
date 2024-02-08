<?php
    include ('../koneksi/koneksi.php');
?>

<h3>TAMBAH DATA NILAI</h3>
<br/><hr/><br/>
<p>
    <?php
        if(!isset($_POST['submit']))
        {
            ?>
            <form enctype="multipart/form-data" method="post">
                <table width="100%" border="0">
                    <tr>
                        <td height="50">NAMA MAHASISWA</td>
                        <td>:</td>
                        <td><label>
                                <select name="mhs" class='form-control'>
                                    <option value="">-=PILIH=-</option>
                                    <?php
                                    $querymhs = "select nim, nama from mahasiswa";
                                    $resultmhs = mysqli_query($koneksi, $querymhs);
                                    while($datamhs = mysqli_fetch_array($resultmhs, MYSQLI_NUM)){
                                        echo"<option value = '$datamhs[0]'>$datamhs[1]</option>";
                                    }
                                    ?>
                                </select>
                            </label><br/></td>
                    </tr>
                    <tr>
                        <td height="50">NAMA DOSEN</td>
                        <td>:</td>
                        <td><label>
                                <select name="ds" class='form-control'>
                                    <option value="">-=PILIH=-</option>
                                    <?php
                                    $queryds = "select nip, nama from dosen";
                                    $resultds = mysqli_query($koneksi, $queryds);
                                    while($datads = mysqli_fetch_array($resultds, MYSQLI_NUM)){
                                        echo"<option value = '$datads[0]'>$datads[1]</option>";
                                    }
                                    ?>
                                </select>
                            </label><br/></td>
                    </tr>
                    <tr>
                        <td>NILAI TUGAS</td>
                        <td>:</td>
                        <td><input type="text" name="nl_tugas" size="30" placeholder="TUGAS"/></td>
                    </tr>
                    <tr>
                        <td>NILAI UTS</td>
                        <td>:</td>
                        <td><input type="text" name="nl_uts" size="30" placeholder="UTS"/></td>
                    </tr>
                    <tr>
                        <td>NILAI UAS</td>
                        <td>:</td>
                        <td><input type="text" name="nl_uas" size="30" placeholder="UAS"/></td>
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
            $mhs = $_POST["mhs"];
            $ds = $_POST["ds"];
            $tugas = $_POST["nl_tugas"];
            $uts = $_POST["nl_uts"];
            $uas = ($_POST["nl_uas"]);

            //input data mahasiswa

            $insertnilai = "INSERT INTO nilai VALUE ('$tugas', '$uts', '$uas', '$mhs', '$ds')";
            $querynilai = mysqli_query($koneksi, $insertnilai);

            if($querynilai)
            {
                echo"<script>alert('Daftar Nilai Berhasil Disimpan!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=nilai'</script>";
            }
            else
            {
                echo"<script>alert('Daftar Gagal Disimpan!')</script>";
                echo"<script type='text/javascript'>window.location = './?adm=nilai'</script>";
            }

        }
    ?>
        <a href="./?adm=nilai">&raquo;KEMBALI</a>
        </p>