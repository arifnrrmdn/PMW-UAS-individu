<?php
    include "../koneksi/koneksi.php";

    $queryMk  = "SELECT * FROM matakuliah";
    $resultMk = mysqli_query($koneksi, $queryMk);
    $countMk  = mysqli_num_rows($resultMk);
?>

    <h3>DATA MATA KULIAH</h3>
    <hr/><br/>
    <a href="./?adm=matakuliahAdd"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA MATA KULIAH"/></a>
    <br>
    <br>
    <table border="1" id="boxtable">
        <!--tabel master mahasiswa-->
        <tr>
            <th>KODE MATA KULIAH</th>
            <th>NAMA MATA KULIAH</th>
            <th>AKSI</th>
        </tr>
        <?php
            if($countMk > 0)
            {
                while($dataMk=mysqli_fetch_array($resultMk, MYSQLI_NUM))
                {
        ?>
        <tr class="add">
            <td class="value"><?php echo"$dataMk[0]"; ?></td>
            <td class="value"><?php echo"$dataMk[1]"; ?></td>
            <td class="value">
                <a href="./?adm=matakuliahEdit&kode_mtkul=<?php echo "$dataMk[0]"; ?>">Edit</a> |   
                <a href="matakuliahDelete.php?kode_mtkul=<?php echo"$dataMk[0]"; ?>">Delete</a>
            </td>
        </tr>

        <?php
                }
            }
            else
            {
                echo"<tr>
                    <td colspan='9' align='center' height='20'>
                    <td><div>Belum ada Data Mata Kuliah</div></td>
                </tr>";
            }
    echo"</table>";
    ?>