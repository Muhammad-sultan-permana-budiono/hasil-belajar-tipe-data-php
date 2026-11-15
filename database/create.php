<?php
require "koneksi.php";

if(isset($_POST["proses"])){
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $jenis_kelamin = $_POST["jenis_kelamin"] ?? "";
    $alamat = $_POST["alamat"];
    $kelas = $_POST["kelas"];
    $no_hp = $_POST["no_hp"];

    $query = "INSERT INTO siswa 
    (nis,nama,jenis_kelamin,alamat,kelas,no_hp) 
    VALUES 
    ('$nis','$nama','$jenis_kelamin','$alamat','$kelas','$no_hp');";
     echo $query;
    $result = mysqli_query($conn,$query);

    if(!$result){
        echo "<h5 color ='red'>gagal menambahkan data" . mysqli_error($conn)."</h5>";
    }else{
        header('Location:read.php');
        exit;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    <h1>create</h1>
    <form action="" method="post">
        <label for="nis">NIS</label>
        <input type="number" name="nis" id="nis">
        <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        <br>
        <label for="jenis_kelamin">jenis kelamin</label>
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">laki laki
        <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">Perempuan
        <br>
        <label for="alamat">alamat</label>
        <textarea name="alamat" id="alamat"></textarea>
        <br>
        <label for="kelas">kelas</label>
        <input type="text" name="kelas" id="kelas">
        <br>
        <label for="no_hp">no hand phone</label>
        <input type="text" name="no_hp" id="no_hp">
        <br>
        <input type="submit" name="proses" value = "proses">
        <input type="reset">
    </form>
</body>
</html>