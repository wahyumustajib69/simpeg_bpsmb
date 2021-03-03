<?php
session_start();
require "koneksi.php";

$th = date("Y");
$bl = date("m");
$hr = date("d");
$id = $_POST['id'];
$tg = date("Y-m-d");
$pg = $_POST['pgw'];

//cari id gaji sesuai nip
$sql = mysqli_query($konek,"SELECT id_gaji FROM gaji WHERE nip='$pg' AND year(tgl_gaji)='$th' AND month(tgl_gaji)='$bl' ");
$x =mysqli_fetch_assoc($sql);
$gj = $x['id_gaji'];
if(empty($gj)){
	$gj = 0;
}

$jm = $_POST['jml'];
$bs = $_POST['bes'];

$jmk = round($bs*0.01);
$dt = $jm - $jmk;


$ins = mysqli_query($konek,"UPDATE tunjangan SET nip='$pg',gaji='$gj',jml_ttp='$jm',bsr_ttp='$bs',jml_diterima='$dt' WHERE id_tunj='$id' ");
if($ins){
	$_SESSION['pesan'] = 'Update Data Berhasil !!!';
	header("location:tunjangan");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!!';
	header("location:tunjangan");
}