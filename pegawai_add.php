<?php
session_start();
require "koneksi.php";

$ni = $_POST['nip'];
$nm = ucwords($_POST['nama']);
$tp = $_POST['tmp'];
$tl = $_POST['tgl'];
$ag = $_POST['agm'];
$gd = $_POST['gender'];
$gl = $_POST['gol'];
$jb = $_POST['jbtn'];
$st = $_POST['stn'];
$sp = $_POST['stp'];
$uk = $_POST['ukr'];
$hp = $_POST['telp'];
$em = $_POST['email'];
$al = $_POST['almt'];


$sql = mysqli_query($konek,"INSERT INTO pegawai VALUES ('$ni','$nm','$tp','$tl','$ag','$gd','$gl','$jb','$st','$sp','$uk','$hp','$em','$al')");

if($sql){
	$_SESSION['pesan'] = 'Simpan Data Pegawai Berhasil';
	header("location:pegawai");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan';
	header("location:pegawai");
}
?>