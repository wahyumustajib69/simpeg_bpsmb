<?php
session_start();
require "koneksi.php";
date_default_timezone_set('Asia/Makassar');

$time = date('His');
$id = 'F-'.rand(100,999).$time;
$pg = $_POST['pgw'];
$nm = $_POST['nama'];
$nk = $_POST['nik'];
$tm = $_POST['tmp'];
$tl = $_POST['tgl'];
$gd = $_POST['gender'];
$pd = $_POST['pend'];
$pk = $_POST['pkr'];
$hb = $_POST['hub'];

$sql = mysqli_query($konek,"INSERT INTO keluarga VALUES ('$id','$pg','$nm','$nk','$tm','$tl','$gd','$pd','$pk','$hb')");
if($sql){
	$_SESSION['pesan'] = 'Simpan Data Berhasil !!';
	header("location:keluarga");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:keluarga");
}
