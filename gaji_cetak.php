<?php
session_start();
require "koneksi.php";
require "tgl_indo.php";
require "rupiah.php";
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
    .border {
        border-width: 3px;
        border-style: solid;
        border-color: #000;
        margin-top: -5px;
    }
    .border-2{
    	border-width: 1px;
    	border-style: solid;
    	border-color: #000;
    	margin-top: 2px;
    	margin-bottom: 10px;
    }

 </style>

	
</head>
<body onload="window.print()" style="font-size: 12px;">
	<table width="100%">
		<tr>
			<td width="10%"><img src="img/kalsel.png" width="80px"></td>
			<td width="90%">
				<h4 class="text-center">PEMERINTAH DAERAH PROVINSI KALIMANTAN SELATAN</h4>
				<h5 class="text-center">DINAS PERINDUSTRIAN DAN PERDAGANGAN</h5>
				<h5 class="text-center">UNIT PELAKSANA TEKNIS</h5>
				<h5 class="text-center text-bold">BALAI PENGUJIAN DAN SERTIFIKASI MUTU BARANG</h5>
				<p class="text-center">Jalan Panglima Batur, Telp. (0511) 4772237 Fax. (0511) 4772237 Banjarbaru Kode POS 70711</p>
			</td>
		</tr>
	</table>
 <div class="border"></div>
 <div class="border-2"></div>
 	<?php
 	error_reporting(0);
 	$sql = mysqli_query($konek,"SELECT tgl_gaji FROM gaji");
 	$tg = mysqli_fetch_assoc($sql);
 	$bl = $tg['tgl_gaji'];
 	$bi = explode("-", $bl);
 	$th = $bi[0];
 	$mt = $bi[1];
 	$gb = $th.'-'.strtoupper($mt);
 	$tg = tgl_indo($gb);
 	?><br>
	<h5 class="text-center text-bold"><u>PEMBAYARAN GAJI PEGAWAI BULAN <?php echo strtoupper($tg); ?></u></h5>
<table border="1" class="table table-striped">
	<thead style="font-size: 10px;">
		<th style="vertical-align: text-top;" class="text-center">NO</th>
		<th style="vertical-align: text-top;">NAMA PEGAWAI<br>TANGGAL LAHIR<br>NIP<br>STATUS PEGAWAI / GOLONGAN</th>
		<th style="vertical-align: text-top;">STATUS<br>ANAK<br>JML JIWA</th>
		<th style="vertical-align: text-top; color: green;">GAJI POKOK<br>TUNJ. ISTRI/SMI<br>TUNJ. ANAK<br>JUMLAH</th>
		<th style="vertical-align: text-top; color: green;">TUNJ. ESELON<br>TUNJ. FUNG UMUM<br>TJ. FUNGSIONAL<br>TJ. KHUSUS</th>
		<th style="vertical-align: text-top; color: green;">TJ. TERPENCIL<br>TKD<br>TUNJ. BERAS<br>TUNJ. PAJAK</th>
		<th style="vertical-align: text-top; color: green;">BPJS KES.<br>TUNJ. JKK<br>TUNJ. JKM<br>TAPERA PK<br>JML KOTOR</th>
		<th style="vertical-align: text-top; color: red;">POT. PAJAK<br>BPJS KES.<br>POT. IWP 1%<br>POT. IWP 8%<br>POT. TAPERUM<br>POT. JKK<br>POT. JKM</th>
		<th style="vertical-align: text-top; color: red;">TAPERA PK<br>TAPERA PEG.<br>HUTANG/LAIN-2<br>BULOG<br>SEWA RUMAH<br>POTONGAN<br>JUMLAH BERSIH</th>
		<th style="vertical-align: text-top;">TANDA TANGAN</th>
	</thead>
	<tbody style="font-size: 10px;">
		<?php
		$no = 1;
		$pr = 1;
		$sql = mysqli_query($konek,"SELECT*FROM gaji AS a JOIN pegawai AS b ON a.nip=b.nip JOIN golongan AS c ON b.gol=c.id_gol JOIN jabatan AS d ON b.jabatan=d.id_jbtn ORDER BY c.gol DESC");
		while($tm=mysqli_fetch_assoc($sql)){

		?>
		<tr>
			<td class="text-center"><?php echo $no++; ?></td>
			<td><?php echo $tm['nama_pgw'].'<br>'.tgl_indo($tm['tgl_lahir']).'<br>'.$tm['nip'].'<br>'.$tm['gol'] ?></td>
			<td>
				<?php
				echo $tm['status'].'<br>';
				$nip = $tm['nip'];
				$hitung_anak = mysqli_query($konek,"SELECT * FROM keluarga AS a JOIN pegawai AS b ON a.nip=b.nip WHERE a.nip='$nip' ");
				$y = mysqli_fetch_assoc($hitung_anak);
				$st = $y['status'];
				$x = mysqli_num_rows($hitung_anak);

				$nip 	= $tm['nip'];
				$gpokok = $tm['gj_pokok'];
				$tj_esl	= $tm['tunj_eselon'];
				$tj_um	= $tm['tunj_umum'];
				$tj_fu	= $tm['t_fungsi'];
				$tj_kh	= $tm['t_khusus'];
				$tj_ter	= $tm['t_terp'];
				$tkd	= $tm['tkd'];
				$tj_brs	= $tm['t_beras'];
				$tj_pjk	= $tm['t_pajak'];
				$bpjs	= $tm['bpjs'];
				$jkk	= $tm['jkk'];
				$jkm	= $tm['jkm'];
				$tpr	= $tm['tapera'];
				
				$pt_pjk	= $tm['p_pajak'];
				$pt_bp	= $tm['b_kes'];
				$pt_tap	= $tm['p_taperum'];
				$pt_jkk	= $tm['p_jkk'];
				$pt_jkm	= $tm['p_jkm'];
				$pt_tpk	= $tm['p_tpk'];
				$pt_tpg	= $tm['p_tpg'];
				$htg	= $tm['hutang'];
				$blg	= $tm['bulog'];
				$swr	= $tm['sewa_rmh'];

				if($x<1){
					$jml_pas = 0;
					$jml_anak = 0;
				}else if($x==1 AND $st=='JANDA' OR $st=='DUDA'){
					$jml_pas = 0;
					$jml_anak = 1;
				}else if($x==1 AND $st=='MENIKAH'){
					$jml_pas = 1;
					$jml_anak = 0;
				}else  if($x==2 AND $st=='MENIKAH'){
					$jml_pas = 1;
					$jml_anak = 1;
				}else  if($x==2 AND $st=='JANDA' OR $st=='DUDA'){
					$jml_pas = 0;
					$jml_anak = 2;
				}else if($x>2){
					$jml_pas = 1;
					$jml_anak = 2;
				}

				$tj_pas = ($gpokok*0.1)*$jml_pas; //hitung tunjangan suami/istri
				$tj_anak = ($gpokok*0.02)*$jml_anak; //hitung tunjangan 2 orang anak

				$pemasukan = $gpokok+$tj_pas+$tj_anak+$tj_esl+$tj_um+$tj_fu+$tj_kh+$tj_ter+$tkd+$tj_brs+$tj_pjk+$bpjs+$jkk+$jkm+$tpr; //total penghasilan


				//hitung potongan
				$iwp1 = round(($pemasukan-$tj_brs)*0.01);
				$iwp8 = round(($gpokok+$tj_pas+$tj_anak)*0.08);

				$potongan = $pt_pjk+$pt_bp+$pt_tap+$pt_jkk+$pt_jkm+$pt_tpk+$pt_tpg+$htg+$blg+$swr+$iwp1+$iwp8;

				$pm_bersih = $pemasukan-$potongan;

				echo $jml_anak.' Anak <br>'; echo 1+$jml_pas+$jml_anak.' Jiwa';
				$jm_ktr = $gpokok+$tj_pas+$tj_anak;
				?>
			</td>
			<td class="text-right"><?php echo duit($gpokok).'<br>'.duit($tj_pas).'<br>'.duit($tj_anak).'<br>'.duit($jm_ktr); ?></td>
			<td class="text-right"><?php echo duit($tj_esl).'<br>'.duit($tj_um).'<br>'.duit($tj_fu).'<br>'.duit($tj_kh); ?></td>
			<td class="text-right"><?php echo duit($tj_ter).'<br>'.duit($tkd).'<br>'.duit($tj_brs).'<br>'.duit($tj_pjk); ?></td>
			<td class="text-right"><?php echo duit($bpjs).'<br>'.duit($jkk).'<br>'.duit($jkm).'<br>'.duit($tpr).'<br>'.duit($pemasukan); ?></td>
			<td class="text-right">
				<?php echo duit($pt_pjk).'<br>'.duit($pt_bp).'<br>'.duit($iwp1).'<br>'.duit($iwp8).'<br>'.duit($pt_tap).'<br>'.duit($pt_jkk).'<br>'.duit($pt_jkm) ?></td>
			<td class="text-right"><?php echo duit($pt_tpk).'<br>'.duit($pt_tpg).'<br>'.duit($htg).'<br>'.duit($blg).'<br>'.duit($swr).'<br>'.duit($potongan).'<br>'.duit($pm_bersih); ?></td>
			<td><?php echo $pr++; ?></td>
		</tr>
		<?php } ?>
	</tbody>

</table>
</body>
</html>