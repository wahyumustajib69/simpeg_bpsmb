<?php
session_start();
require "koneksi.php";

$bl = date('m');
$th = date('y');
$id = 'C'.$bl.$th.rand(100,999);
$no = strtoupper($_POST['no']);
$ts = $_POST['tgs'];
$tm = $_POST['tgm'];
//hitung hari cuti
$t1 = $_POST['th1'];
if($t1=='unchecked'){
	$t1 = 0;
}
$t2 = $_POST['th2'];
if($t2=='unchecked'){
	$t2 = 0;
}
$t3 = $_POST['th3'];
$pg = $_POST['pgw'];
$al = $_POST['almt'];


$sql = mysqli_query($konek,"INSERT INTO cuti VALUES ('$id','$no','$ts','$tm','$t3','$t2','$t1','$pg','$al')");
if($sql){
	$_SESSION['pesan'] = 'Simpan Data Berhasil !!';
	header("location:cuti");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:cuti");
}