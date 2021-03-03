<?php
session_start();
require "koneksi.php";

$th = date('Y');
$bl = date('m');
$id = 'K-'.$th.$bl.rand(1000,9999);
$no = $_POST['no'];
$tg = $_POST['tgl'];
$pg = $_POST['pgw'];
$ds = $_POST['dasar'];
$tj = $_POST['tujuan'];
$kt = 'KB';

$sql = mysqli_query($konek,"INSERT INTO sppd VALUES ('$id','$no','$tg','$pg','$ds','$tj','$kt')");
if($sql){
	$_SESSION['pesan'] = 'Simpan Data Berhasil';
	header("location:kepala-balai");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan';
	header("location:kepala-balai");
}