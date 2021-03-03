<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login");
}
require "koneksi.php";
require "tgl_indo.php";
require "terbilang.php";
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
<title>REKAP CUTI PEGAWAI</title>
<body onload="window.print()" style="font-size: 13px; ">
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
	
<div style="font-family: times;">

	<div class="text-center"><h4 class="text-bold"><u>REKAP CUTI TAHUN <?php echo date("Y"); ?></u></h4></div>
	<!--<div class="text-center" style="margin-top: -10px;"><h5>Nomor : <?php echo $tm['no_surat'] ?></h5></div>-->
	
	
	<table class="table" border="1">
		<thead>
			<th  class="text-center">NO</th>
			<th class="text-center" class="text-center">NAMA PEGAWAI<br>NIP</th>
			<th class="text-center">NO SURAT</th>
			<th class="text-center">TGL SURAT</th>
			<th class="text-center">TANGGAL CUTI</th>
			<th class="text-center">JUMLAH HARI</th>
			<th class="text-center">KEMBALI BEKERJA</th>
			<th class="text-center">ALAMAT CUTI</th>
		</thead>
		<tbody>
			<?php
			$no=1;
			$sql =mysqli_query($konek,"SELECT*FROM cuti AS a JOIN pegawai AS b ON a.nip=b.nip JOIN golongan AS c ON b.gol=c.id_gol JOIN jabatan AS d ON b.jabatan=d.id_jbtn");
			while($tm = mysqli_fetch_assoc($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $tm['nama_pgw'].'<br>'.$tm['nip'] ?></td>
				<td><?php echo $tm['no_surat'] ?></td>
				<td class="text-center"><?php echo tgl_indo($tm['tgl_surat']) ?></td>
				<td class="text-center"><?php echo tgl_indo($tm['tgl_mulai']) ?></td>
				<td class="text-center">
					<?php 
					$hr = $tm['th_ini']+$tm['th_lalu']+$tm['th_lm'];
					echo $hr.' Hari';
					$tc = $tm['tgl_mulai'];

					if($hr==12){
						$hari = date("Y-m-d", strtotime('+12 days', strtotime($tc)));
					}else if($hr==18){
						$hari = date("Y-m-d", strtotime('+18 days', strtotime($tc)));
					}else{
						$hari = date("Y-m-d", strtotime('+24 days', strtotime($tc)));
					}
					
					?>	
				</td>
				<td class="text-center"><?php echo tgl_indo($hari); ?></td>
				<td><?php echo $tm['alamat_cuti'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
</div>
</body>
</html>