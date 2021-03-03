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
<title>CETAK SPPD KEPALA BALAI</title>
<body onload="window.print()" style="font-size: 13px; ">
	<table width="100%">
		<tr>
			<td width="10%"><img src="img/kalsel.png" width="80px"></td>
			<td width="90%">
				<h4 class="text-center">PEMERINTAH DAERAH PROVINSI KALIMANTAN SELATAN</h4>
				<h3 style="font-family: times;" class="text-center">DINAS PERINDUSTRIAN DAN PERDAGANGAN</h3>
				
				<p class="text-center">Jalan Letjend S. Parman No. 44, Telp. (0511) 3354219 - 3352494 - 3352536 Fax. (0511) 3354219</p>
				<p class="text-center">BANJARMASIN</p>
			</td>
		</tr>
	</table>
 <div class="border"></div>
 <div class="border-2"></div>
<?php
$id = $_GET['ref'];
$sql =mysqli_query($konek,"SELECT*FROM sppd AS a join pegawai AS b ON a.nip=b.nip JOIN golongan AS c ON b.gol=c.id_gol JOIN jabatan AS d ON b.jabatan=d.id_jbtn WHERE a.id_surat='$id'");
$tm = mysqli_fetch_assoc($sql);
?>	
<div class="container" style="font-family: times;">
	<div class="text-center"><h4 class="text-bold"><u>SURAT PERINTAH TUGAS</u></h4></div>
	<div class="text-center" style="margin-top: -10px;"><h5>Nomor : <?php echo $tm['no_surat'] ?></h5></div>
	<table width="100%">
		<tr>
			<td width="10%" style="vertical-align: text-top;">Dasar</td>
			<td style="vertical-align: text-top;">:</td>
			<td><?php echo htmlspecialchars_decode($tm['dasar']) ?></td>
		</tr>
	</table>
	<p class="text-center" style="font-size: 14px;">MEMERINTAHKAN</p>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2">
				<div class="row"> Kepada</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<table class="table" cellpadding="2" cellspacing="2" border="0">
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td><?php echo $tm['nama_pgw'] ?></td>
						</tr>
						<tr>
							<td>Pangkat / Gol</td>
							<td>:</td>
							<td><?php echo $tm['pangkat'].' / '.$tm['gol'] ?></td>
						</tr>
						<tr>
							<td>N I P</td>
							<td>:</td>
							<td><?php echo $tm['nip'] ?></td>
						</tr>
						<tr>
							<td>J a b a t a n</td>
							<td>:</td>
							<td><?php echo $tm['nama_jbtn'] ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<table width="100%">
		<tr>
			<td width="10%" style="vertical-align: text-top;">Untuk</td>
			<td style="vertical-align: text-top;">:</td>
			<td><?php echo htmlspecialchars_decode($tm['tujuan']) ?></td>
		</tr>
	</table>

	<br>
	
	<table width="100%">
		<tr>
			<td width="50%"></td>
			<td width="50%" class="text-center">
				Banjarmasin, <?php echo tgl_indo($tm['tgl_surat']) ?><br>
				Kepala Dinas Perdagangan <br>
				Provinsi Kalimantan Selatan<br><br><br><br><br>
				<u>Drs. H. Birhasani, M.Si</u><br>
				Pembina Utama Madya<br>
				NIP. 19630723 199003 1 011
			</td>
		</tr>
		<tr>
			<td width="50%">
			TEMBUSAN : <br>
			<!--&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;1. Disperindag Provinsi Kalimantan Selatan<br>
			&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2. Saudari Nurhalipah<br>-->
			&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;1. Arsip
			</td>
			<td width="50%"></td>
		</tr>
	</table>
</div>
</body>
</html>