<?php
session_start();
require "koneksi.php";

$id = $_POST['id'];
$nj = $_POST['njbtn'];
$kt = $_POST['ket'];

$sql = mysqli_query($konek,"UPDATE jabatan SET nama_jbtn='$nj',ket='$kt' WHERE id_jbtn='$id' ");
if($sql){
    $_SESSION['pesan'] = 'Update Jabatan Berhasil!!';
    header("location:jabatan");
}else{
    $_SESSION['pesan'] = 'Terjadi Kesalahan!!';
    header("location:jabatan");
}