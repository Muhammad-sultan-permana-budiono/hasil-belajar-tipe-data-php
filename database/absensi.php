<?php
require "koneksi.php";

function ambilSemuasiswa(){
    global $conn;

    $query = "SELECT * FROM siswa";
    $result = mysqli_query($conn,$query);

    $data = [];

    while ($row = mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
    return $data;
}

function ambilsiswadanabsensi($tanggal){
    global $conn;
    $query ="SELECT siswa.id, 
    siswa.nis,
    siswa.nama,
    absensi.status,
    absensi.keterangan,
    absensi.waktu
    FROM siswa 
    LEFT JOIN absensi 
    ON absensi.siswa_id = siswa.id
    AND absensi.waktu ='$tanggal'
    ORDER BY siswa.nama
    ";
    $result = mysqli_query($conn,$query);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
    return $data;
}

?>