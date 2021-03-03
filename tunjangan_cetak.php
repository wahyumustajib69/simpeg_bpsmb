<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login");
}
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
 	$sql = mysqli_query($konek,"SELECT tgl_tunj FROM tunjangan");
 	$tg = mysqli_fetch_assoc($sql);
 	$bl = $tg['tgl_tunj'];
 	$bi = explode("-", $bl);
 	$th = $bi[0];
 	$mt = $bi[1];
 	$gb = $th.'-'.strtoupper($mt);
 	$tg = tgl_indo($gb);
 	?><br>
	<h5 class="text-center text-bold"><u>PEMBAYARAN TUNJANGAN PEGAWAI BULAN <?php echo strtoupper($tg); ?></u></h5>
<table border="1" class="table table-striped">
	<thead>
		<th class="text-center">NO</th>
		<th class="text-center">NAMA, NIP</th>
		<th class="text-center">JABATAN</th>
		<th class="text-center">Jumlah TTP sebelum iuran Jamkes 1%</th>
		<th class="text-center">Gaji dan Tunj. melekat untuk pemb. Jamkes 1%</th>
		<th class="text-center">Besar TTP yang dikenakan iuran Jamkes 1%</th>
		<th class="text-center">Jumlah iuran Jamkes 1%</th>
		<th class="text-center">Jumlah Bersih TTP yang diterima</th>
	</thead>
	<tbody>
		<?php
		$sql = mysqli_query($konek,"SELECT*FROM tunjangan AS a JOIN gaji AS b ON a.gaji=b.id_gaji JOIN pegawai AS c ON a.nip=c.nip JOIN jabatan AS d ON c.jabatan=d.id_jbtn JOIN golongan AS e ON c.gol=e.id_gol ORDER BY e.gol DESC");
		$no = 1;
		while($pg=mysqli_fetch_assoc($sql)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $pg['nama_pgw'].'<br>'.$pg['nip'] ?></td>
			<td><?php echo $pg['nama_jbtn']?></td>
			<td class="text-right"><?php echo duit($pg['jml_ttp']) ?></td>
			<td class="text-right"><?php echo duit($pg['g_bersih']) ?></td>
			<td class="text-right"><?php echo duit($pg['bsr_ttp']) ?></td>
			<td class="text-right"><?php $btp = $pg['bsr_ttp']*0.01; echo duit(round($btp)); ?></td>
			<td class="text-right"><?php $tb = $pg['jml_ttp'] - $btp; echo duit(round($tb)); ?></td>
		</tr>
		<?php } ?>
	</tbody>

</table>
</body>
</html>