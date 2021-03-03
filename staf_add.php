<?php
session_start();
require "koneksi.php";

$th = date('Y');
$bl = date('m');
$id = 'S-'.$th.$bl.rand(1000,9999);
$no = $_POST['no'];
$tg = $_POST['tgl'];
$pg = $_POST['pgw'];
$ds = htmlspecialchars($_POST['dasar']);
$tj = htmlspecialchars($_POST['tujuan']);
$kt = 'ST';

$sql = mysqli_query($konek,"INSERT INTO sppd VALUES ('$id','$no','$tg','$pg','$ds','$tj','$kt')");
if($sql){
	$_SESSION['pesan'] = 'Simpan Data Berhasil';
	header("location:staf");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan';
	header("location:staf");
}