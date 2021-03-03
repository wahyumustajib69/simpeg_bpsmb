<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login");
}
require "koneksi.php";
require "tgl_indo.php";
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
	
<table border="1" class="table table-striped">
	<thead>
		<th class="text-center">NO</th>
		<th class="text-center">NIP</th>
		<th class="text-center">NAMA PEGAWAI</th>
		<th class="text-center">TTL</th>
		<th class="text-center">AGAMA</th>
		<th class="text-center">GENDER</th>
		<th class="text-center">PANGKAT/GOL</th>
		<th class="text-center">JABATAN</th>
		<th class="text-center">STATUS</th>
		<th class="text-center">KEP. STATUS</th>
		<th class="text-center">UNIT KERJA</th>
		<th class="text-center">ALAMAT</th>
	</thead>
	<tbody>
		<?php
		$sql = mysqli_query($konek,"SELECT*FROM pegawai AS a JOIN golongan AS b ON a.gol=b.id_gol JOIN jabatan AS c ON a.jabatan=c.id_jbtn ORDER BY b.gol DESC");
		$no = 1;
		while($pg=mysqli_fetch_assoc($sql)){
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $pg['nip'] ?></td>
			<td><?php echo $pg['nama_pgw'] ?></td>
			<td><?php echo $pg['tmp_lahir'].', '.tgl_indo($pg['tgl_lahir']) ?></td>
			<td><?php echo $pg['agama'] ?></td>
			<td><?php echo $pg['gender'] ?></td>
			<td><?php echo $pg['pangkat'].'-'.$pg['gol'] ?></td>
			<td><?php echo $pg['nama_jbtn'] ?></td>
			<td><?php echo $pg['status'] ?></td>
			<td><?php echo $pg['sts_pegawai'] ?></td>
			<td><?php echo $pg['unit_kerja'] ?></td>
			<td><?php echo $pg['alamat'] ?></td>
		</tr>
		<?php } ?>
	</tbody>

</table>
</body>
</html>