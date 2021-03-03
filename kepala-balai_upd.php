<?php
session_start();
require "koneksi.php";

$id = $_POST['id'];
$no = $_POST['no'];
$tg = $_POST['tgl'];
$pg = $_POST['pgw'];
$ds = $_POST['dasar'];
$tj = $_POST['tujuan'];
$kt = 'KB';

$sql = mysqli_query($konek,"UPDATE sppd SET no_surat='$no',tgl_surat='$tg',nip='$pg',dasar='$ds',tujuan='$tj',ket='$kt' WHERE id_surat='$id' ");
if($sql){
	$_SESSION['pesan'] = 'Update Data Berhasil';
	header("location:kepala-balai");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan';
	header("location:kepala-balai");
}