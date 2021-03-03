<?php
session_start();
require "koneksi.php";

$id = $_GET['id'];

$sql = mysqli_query($konek,"DELETE FROM tunjangan WHERE id_tunj='$id'");
if($sql){
	$_SESSION['pesan'] = 'Hapus Data Berhasil !!';
	header("location:tunjangan");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:tunjangan");
}
?>