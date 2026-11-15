<?php
require "absensi.php";
$tanggal = date("Y-m-d");
$data = ambilsiswadanabsensi($tanggal);

?>

<h1>
    rekap absensi
</h1>


    <table border = "1">
        <tr>
            <th>id siswa</th>
            <th>nama siswa</th>
            <th>nis siswa</th>
            <th>status absensi</th>
            <th>keterangan absensi</th>
            <th>waktu absensi</th>
            <th>aksi</th>
        </tr>
        <?php
            foreach($data as $rekap){
        ?>
        <tr>
            <td><?=$rekap["id"]?></td>
            <td><?=$rekap["nama"]?></td>
            <td><?=$rekap["nis"]?></td>
            <td><?=$rekap["status"]?></td>
            <td><?=$rekap["keterangan"]?></td>
            <td><?=$rekap["waktu"]?></td>
            <td>
                <a href='updatekelas.php?id=<?=$rekap["id"]?>'>
                    <button>Edit</button>
                </a>
                <a href='kelas.php?id=<?=$rekap["id"]?>&aksi=delete' onclick = "return confirm ('yakin ingin menghapus data?')">
                    <button>delete</button>
                </a>
            </td>
        </tr>
        <?php
}
?>
</table>