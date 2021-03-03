<?php
session_start();
require "koneksi.php";

$id = $_POST['id'];
$pg = $_POST['pgw'];
$gj = $_POST['gaji'];
$es = $_POST['esel'];
$fu = $_POST['t_umum'];
$tf = $_POST['t_fung'];
$tk = $_POST['t_khu'];
$tp = $_POST['t_terp'];
$td = $_POST['tkd'];
$tb = $_POST['t_bras'];
$tt = $_POST['t_pjk'];
$bp = $_POST['bpjs'];
$tj = $_POST['t_jkk'];
$tm = $_POST['t_jkm'];
$tr = $_POST['tpra'];
$pf = $_POST['p_pjk'];
$ps = $_POST['p_bpjs'];
$pr = $_POST['p_perum'];
$pk = $_POST['p_jkk'];
$pm = $_POST['p_jkm'];
$pa = $_POST['p_tpra'];
$pt = $_POST['p_tpg'];
$ht = $_POST['hutang'];
$bu = $_POST['bulog'];
$sw = $_POST['sewa'];

//hitung anak
$hitung_anak = mysqli_query($konek,"SELECT COUNT(hubungan) AS jiwa FROM keluarga WHERE nip='$pg'");
$x = mysqli_fetch_assoc($hitung_anak);
$jml_anak	= $x['jiwa'];
$jml_pas	= $x['jiwa'];

if($x['jiwa']<1){
	$jml_pas = 0;
	$jml_anak = 0;
}else if($x['jiwa']==1){
	$jml_pas = 1;
	$jml_anak = 0;
}else  if($x['jiwa']==2){
	$jml_pas = 1;
	$jml_anak = 1;
}else{
	$jml_pas = 1;
	$jml_anak = 2;
}
//hitung tunjangan

$tj_pas = ($gj*0.1)*$jml_pas; //hitung tunjangan suami/istri
$tj_anak = ($gj*0.02)*$jml_anak; //hitung tunjangan 2 orang anak

$pemasukan = $gj+$tj_pas+$tj_anak+$es+$fu+$tf+$tk+$tp+$td+$tb+$tt+$bp+$tj+$tm+$tr; //total penghasilan


//hitung potongan
$iwp1 = round(($pemasukan-$tb)*0.01);
$iwp8 = round(($gj+$tj_pas+$tj_anak)*0.08);

$potongan = $pf+$ps+$pr+$pk+$pm+$pa+$pt+$ht+$bu+$sw+$iwp1+$iwp8;

$pm_bersih = $pemasukan-$potongan;


$sql = mysqli_query($konek,"UPDATE gaji SET nip='$pg',gj_pokok='$gj',tunj_eselon='$es',tunj_umum='$fu',t_fungsi='$tf',t_khusus='$tk',t_terp='$tp',tkd='$td',t_beras='$tb',t_pajak='$tt',bpjs='$bp',jkk='$tj',jkm='$tm',tapera='$tr',p_pajak='$pf',b_kes='$ps',p_taperum='$pr',p_jkk='$pk',p_jkm='$pm',p_tpk='$pa',p_tpg='$pt',hutang='$ht',bulog='$bu',sewa_rmh='$sw',g_bersih='$pm_bersih' WHERE id_gaji='$id' ");
if($sql){
	$_SESSION['pesan'] = 'Update Data Derhasil !!';
	header("location:gaji");
}else{
	$_SESSION['pesan'] = 'Terjadi Kesalahan !!';
	header("location:gaji");
}