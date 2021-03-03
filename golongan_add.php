<?php
session_start();
require "koneksi.php";

$pk = ucwords($_POST['pnkt']);
$jb = strtoupper($_POST['jbtn']);

$sql = mysqli_query($konek,"INSERT INTO golongan (id_gol,pangkat,gol) VALUES('','$pk','$jb')");
if($sql){
	$_SESSION['pesan'] = 'Simpan Data Berhasil !!';
	header("location:golongan");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:golongan");
}
?>