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
//untuk foto

//perintah update record
$sql = mysqli_query($konek,"UPDATE pegawai SET nama_pgw='$nm',tmp_lahir='$tp',tgl_lahir='$tl',agama='$ag',gender='$gd',gol='$gl',jabatan='$jb',status='$st',sts_pegawai='$sp',unit_kerja='$uk',telp='$hp',email='$em',alamat='$al' WHERE nip='$ni'");

//pesan notifikasi
if($sql){
	$_SESSION['pesan'] = 'Update Data Pegawai Berhasil Disimpan';
	header("location:pegawai");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan';
	header("location:pegawai");
}

?>