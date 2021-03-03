<?php
session_start();
require "koneksi.php";

$nip = $_GET['id'];//nip yang kita dapat dari method get

$sql = mysqli_query($konek,"DELETE FROM pegawai WHERE nip='$nip'");

if($sql){
	$_SESSION['pesan'] = 'Hapus Data Berhasil !!';
	header("location:pegawai");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:pegawai");
}
?>