<?php
session_start();
require "koneksi.php";

$id = $_GET['id'];

$sql = mysqli_query($konek,"DELETE FROM gaji WHERE id_gaji='$id'");
if($sql){
	$_SESSION['pesan'] = 'Hapus Data Berhasil !!';
	header("location:gaji");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:gaji");
}
?>