<?php
require "koneksi.php";

$query = "SELECT * FROM siswa";
$result = mysqli_query($conn,$query);
?>

<a href="create.php"><button>Tambah siswa</button></a>
    <table border = "1">
        <tr>
            <th>id</th>
            <th>nis</th>
            <th>nama</th>
            <th>kelas</th>
            <th>nomor hp</th>
            <th>aksi</th>
        </tr>
        <?php
while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?=$row["id"]?></td>
            <td><?=$row["nis"]?></td>
            <td><?=$row["nama"]?></td>
            <td><?=$row["kelas"]?></td>
            <td><?=$row["no_hp"]?></td>
            <td>
                <a href='update.php?id=<?=$row["id"]?>'>
                    <button>Edit</button>
                </a>
                <a href='delete.php?id=<?=$row["id"]?>' onclick = "return confirm ('yakin ingin menghapus data?')">
                    <button>delete</button>
                </a>
            </td>
        </tr>
        <?php
}
?>
</table>