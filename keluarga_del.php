<?php
session_start();
require "koneksi.php";

$id = $_GET['id'];
$sql = mysqli_query($konek,"DELETE FROM keluarga WHERE id_kel='$id' ");
if($sql){
	$_SESSION['pesan'] = 'Hapus Data Berhasil !!';
	header("location:keluarga");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:keluarga");
}