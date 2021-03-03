<?php
session_start();
require "koneksi.php";

$id = $_GET['id'];
$sql = mysqli_query($konek,"DELETE FROM sppd WHERE id_surat='$id' ");
if($sql){
    $_SESSION['pesan'] = 'Hapus Data BERHASIL !!';
    header("location:staf");
}else{
    $_SESSION['pesan'] = 'Terjadi Kesalahan !!';
    header("location:staf");
}