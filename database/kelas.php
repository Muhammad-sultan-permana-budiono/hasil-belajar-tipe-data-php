<?php
require "koneksi.php";

function ambilSemuaKelas(){
    global $conn;

    $query = "SELECT * FROM kelas";
    $result = mysqli_query($conn,$query);

    $data = [];

    while ($row = mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
    return $data;
}
function tambahkelas($data){
    global$conn;
    $nama_kelas = $data["nama_kelas"];
    $tingkat = $data["tingkat"];
    $jurusan = $data["jurusan"];
    $wali_kelas = $data["wali_kelas"];

    $query = "INSERT INTO kelas (nama_kelas,tingkat,jurusan,wali_kelas)
        VALUES ('$nama_kelas','$tingkat', '$jurusan','$wali_kelas');";

    $result = mysqli_query($conn,$query);
    return $result;
}

function hapuskelas($id){
    global $conn;

    $query = "SELECT * FROM kelas WHERE id = '$id'";
    $kelas = mysqli_query($conn,$query);
    $kelas = mysqli_fetch_assoc($kelas);
    if (!$kelas){
        die("data tidak di temukan");
    }else{
        $query = "DELETE FROM kelas WHERE id = $id";
        $hapus = mysqli_query($conn, $query);
         if(!$hapus){
                echo ("gagal menghapus data");
                sleep(5);
                header("location:readkelas.php");
            }else{
                header("location:readkelas.php");
                exit;
            }
        }
}

function ambilSatuKelas($id){
    global $conn;

    $query = "SELECT * FROM kelas WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc ($result);
    if(!$data){
        header('location:readkelas.php');
        exit;
    }else{
        return $data;
    }
}


function editkelas($data){
    global $conn;
    $id = $data['id'];
    $query = "SELECT * FROM kelas WHERE id = '$id'";
    $kelas = mysqli_query($conn,$query);
    $kelas = mysqli_fetch_assoc($kelas);
    if (!$kelas){
            die("data tidak di temukan");
    }
    $nama_kelas = $data["nama_kelas"];
    $tingkat = $data["tingkat"];
    $jurusan = $data["jurusan"];
    $wali_kelas = $data["wali_kelas"];
    $query ="UPDATE kelas SET nama_kelas='$nama_kelas',tingkat='$tingkat',jurusan='$jurusan',wali_kelas='$wali_kelas' WHERE id ='$id'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "<h5 style='color:red;'>gagal mengedit data" . mysqli_error($conn)."</h5>";
    }else{
        header('Location:readkelas.php');
        exit;
    }
}
    



if(isset($_GET['aksi'])){
    if($_GET['aksi'] == 'create'){
        if(tambahkelas($_POST)){
            header("location: readkelas.php");
        }else{
            echo "gagal menambahkan data: ".mysqli_error($conn);
        }
        exit;
    }else if($_GET['aksi'] == 'delete'){
         if(isset($_GET["id"])){
            hapuskelas($_GET["id"]);
    }else{
        die("halaman tidak di temukan");
}
}else if($_GET['aksi'] == 'update'){
        if(editkelas($_POST)){
            header("location: readkelas.php");
        }else{
            echo "gagal mengedit data: ".mysqli_error($conn);
        }
        exit;
    
}
}
?>