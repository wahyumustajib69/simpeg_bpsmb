<?php
session_start();
require "koneksi.php";

$id = $_POST['id'];
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


$sql = mysqli_query($konek,"UPDATE cuti SET no_surat='$no',tgl_surat='$ts',tgl_mulai='$tm',th_ini='$t3',th_lalu='$t2',th_lm='$t1',nip='$pg',alamat_cuti='$al' WHERE id_cuti='$id' ");
if($sql){
	$_SESSION['pesan'] = 'Simpan Data Berhasil !!';
	header("location:cuti");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:cuti");
}