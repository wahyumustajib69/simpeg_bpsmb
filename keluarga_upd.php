<?php
session_start();
require "koneksi.php";

$id = $_POST['id'];
$pg = $_POST['pgw'];
$nm = $_POST['nama'];
$nk = $_POST['nik'];
$tm = $_POST['tmp'];
$tl = $_POST['tgl'];
$gd = $_POST['gender'];
$pd = $_POST['pend'];
$pk = $_POST['pkr'];
$hb = $_POST['hub'];

$sql = mysqli_query($konek,"UPDATE keluarga SET nip='$pg',nama_kel='$nm',nik='$nk',tempat_lhr='$tm',tanggal_lhr='$tl',jk='$gd',pendidikan='$pd',pekerjaan='$pk',hubungan='$hb' WHERE id_kel='$id' ");
if($sql){
	$_SESSION['pesan'] = 'Update Data Berhasil !!';
	header("location:keluarga");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:keluarga");
}
