<?php
session_start();
require "koneksi.php";

$id = rand(1000,9999);
$ni = $_POST['nama'];
$jn = $_POST['jnj'];
$in = $_POST['inst'];
$lo = $_POST['lok'];
$ju = $_POST['jur'];
$ij = $_POST['ijz'];
$ti = $_POST['tg_ijz'];
$pi = $_POST['pimp'];

$sql = mysqli_query($konek,"INSERT INTO pendidikan VALUES ('$id','$ni','$jn','$in','$lo','$ju','$ij','$ti','$pi')");

if($sql){
	$_SESSION['pesan'] = 'Simpan Data Berhasil !!';
	header("location:pendidikan");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:pendidikan");
}
