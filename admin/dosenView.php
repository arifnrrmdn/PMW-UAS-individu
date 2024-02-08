<?php
    include "../koneksi/koneksi.php";

    $queryDs  = "SELECT * FROM dosen";
    $resultDs = mysqli_query($koneksi, $queryDs);
    $countDs  = mysqli_num_rows($resultDs);
?>

    <h3>DATA DOSEN</h3>
    <hr/><br/>
    <a href="./?adm=dosenAdd"><input name="add" type="submit" class="buttonadm" value="TAMBAH DATA DOSEN"/></a>
    <br>
    <br>
    <table border="1" id="boxtable">
        <!--tabel master mahasiswa-->
        <tr class="odd">
            <th>NIP</th>
            <th>NAMA</th>
            <th>KODE MATKUL</th>
            <th>PASSWORD</th>
            <th>AKSI</th>
        </tr>
        <?php
            if($countDs > 0)
            {
                while($dataDs=mysqli_fetch_array($resultDs, MYSQLI_NUM))
                {
        ?>
        <tr class="add">
            <td class="value"><?php echo"$dataDs[0]"; ?></td>
            <td class="value"><?php echo"$dataDs[1]"; ?></td>
            <td class="value"><?php echo"$dataDs[2]"; ?></td>
            <td class="value"><?php echo"$dataDs[3]"; ?></td>
            <td class="value">
                <a href="./?adm=dosenEdit&nip=<?php echo "$dataDs[0]"; ?>">Edit</a> |   
                <a href="dosenDelete.php?nip=<?php echo"$dataDs[0]"; ?>">Delete</a>
            </td>
        </tr>

        <?php
                }
            }
            else
            {
                echo"<tr>
                    <td colspan='9' align='center' height='20'>
                    <td><div>Belum ada Data Dosen</div></td>
                </tr>";
            }
    echo"</table>";
    ?>