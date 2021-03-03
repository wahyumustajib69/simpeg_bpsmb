<?php
session_start();
require "koneksi.php";

$id = $_GET['id'];

$sql = mysqli_query($konek,"DELETE FROM golongan WHERE id_gol='$id'");
if($sql){
	$_SESSION['pesan'] = 'Hapus Data Berhasil !!';
	header("location:golongan");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:golongan");
}
?>