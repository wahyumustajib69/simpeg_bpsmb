<?php
session_start();
require "koneksi.php";
$id = $_GET['id'];

$sql = mysqli_query($konek,"DELETE FROM pendidikan WHERE id_pend='$id'");

if($sql){
	$_SESSION['pesan'] = 'Hapus Data Berhasil !!';
	header("location:pendidikan");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:pendidikan");
}
