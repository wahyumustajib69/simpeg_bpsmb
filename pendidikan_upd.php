<?php
session_start();
require "koneksi.php";

$id = $_POST['id'];
$ni = $_POST['nama'];
$jn = $_POST['jnj'];
$in = $_POST['inst'];
$lo = $_POST['lok'];
$ju = $_POST['jur'];
$ij = $_POST['ijz'];
$ti = $_POST['tg_ijz'];
$pi = $_POST['pimp'];

$sql = mysqli_query($konek,"UPDATE pendidikan SET nip='$ni',tingkat='$jn',nama_instansi='$in',lokasi='$lo',jurusan='$ju',no_ijazah='$ij',tgl_ijazah='$ti',pimpinan='$pi' WHERE id_pend='$id'");

if($sql){
	$_SESSION['pesan'] = 'Update Data Berhasil !!';
	header("location:pendidikan");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:pendidikan");
}
