<?php
require "kelas.php";

$data = ambilSemuaKelas();
?>

<h1>
    daftar kelas
</h1>

    <table border = "1">
        <tr>
            <th>id</th>
            <th>nama kelas</th>
            <th>tingkat</th>
            <th>jurusan</th>
            <th>wali kelas</th>
            <th>aksi</th>
        </tr>
        <?php
            foreach($data as $kelas){
        ?>
        <tr>
            <td><?=$kelas["id"]?></td>
            <td><?=$kelas["nama_kelas"]?></td>
            <td><?=$kelas["tingkat"]?></td>
            <td><?=$kelas["jurusan"]?></td>
            <td><?=$kelas["wali_kelas"]?></td>
            <td>
                <a href='updatekelas.php?id=<?=$kelas["id"]?>'>
                    <button>Edit</button>
                </a>
                <a href='kelas.php?id=<?=$kelas["id"]?>&aksi=delete' onclick = "return confirm ('yakin ingin menghapus data?')">
                    <button>delete</button>
                </a>
            </td>
        </tr>
        <?php
}
?>
</table>