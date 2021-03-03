<?php
session_start();
require "koneksi.php";

$id = $_POST['id'];
$pk = ucwords($_POST['pnkt']);
$jb = strtoupper($_POST['jbtn']);

$sql = mysqli_query($konek,"UPDATE golongan SET pangkat='$pk',gol='$jb' WHERE id_gol='$id' ");
if($sql){
	$_SESSION['pesan'] = 'Update Data Berhasil !!';
	header("location:golongan");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:golongan");
}
?>