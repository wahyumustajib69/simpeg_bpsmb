<?php
session_start();
require "koneksi.php";

$id = rand(100,999);
$nj = $_POST['njbtn'];
$kt = $_POST['ket'];

$sql = mysqli_query($konek,"INSERT INTO jabatan VALUES ('$id','$nj','$kt')");
if($sql){
    $_SESSION['pesan'] = 'Simpan Jabatan Berhasil!!';
    header("location:jabatan");
}else{
    $_SESSION['pesan'] = 'Terjadi Kesalahan!!';
    header("location:jabatan");
}
