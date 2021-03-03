<?php
session_start();
require "koneksi.php";

$id = $_GET['id'];
$sql = mysqli_query($konek,"DELETE FROM jabatan WHERE id_jbtn='$id'");
if($sql){
    $_SESSION['pesan'] = 'Hapus Data Berhasil !!';
    header("location:jabatan");
}else{
    $_SESSION['pesan'] = 'Terjadi Kesalahan !!';
    header("location:jabatan");
}