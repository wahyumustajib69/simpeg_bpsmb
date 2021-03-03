<?php
session_start();
require "koneksi.php";

$id = $_GET['id'];

$sql = mysqli_query($konek,"DELETE FROM cuti WHERE id_cuti='$id'");
if($sql){
	$_SESSION['pesan'] = 'Hapus Data Berhasil !!';
	header("location:cuti");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:cuti");
}
?>