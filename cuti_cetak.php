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
<title>CETAK CUTI PEGAWAI</title>
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
<?php
$id = $_GET['ref'];
$sql =mysqli_query($konek,"SELECT*FROM cuti AS a JOIN pegawai AS b ON a.nip=b.nip JOIN golongan AS c ON b.gol=c.id_gol JOIN jabatan AS d ON b.jabatan=d.id_jbtn WHERE a.id_cuti='$id' ");
$tm = mysqli_fetch_assoc($sql);
?>	
<div class="container" style="font-family: times;">
	<div class="text-center"><h4 class="text-bold"><u>SURAT IZIN CUTI TAHUNAN</u></h4></div>
	<div class="text-center" style="margin-top: -10px;"><h5>Nomor : <?php echo $tm['no_surat'] ?></h5></div>
	<?php 
	$th = date("Y");
	$tl = $th -1;
	$ts = $th -2;
	?>
	<p>Diberikan izin cuti tahunan untuk tahun <?php echo $ts.', '.$tl.', dan '.$th; ?> kepada Pegawai Negeri Sipil :</p>
	<table>
		<tr>
			<td>Nama &nbsp;</td>
			<td>:</td>
			<td>&nbsp;<?php echo $tm['nama_pgw'] ?></td>
		</tr>
		<tr>
			<td>N I P &nbsp;</td>
			<td>:</td>
			<td>&nbsp;<?php echo $tm['nip'] ?></td>
		</tr>
		<tr>
			<td>Pangkat / Golongan &nbsp;</td>
			<td>:</td>
			<td>&nbsp;<?php echo $tm['pangkat'].'-'.$tm['gol'] ?></td>
		</tr>
		<tr>
			<td>J a b a t a n &nbsp;</td>
			<td>:</td>
			<td>&nbsp;<?php echo $tm['nama_jbtn'] ?></td>
		</tr>
		<tr>
			<td>Satuan Organisasi &nbsp;</td>
			<td>:</td>
			<td>&nbsp;<?php echo $tm['unit_kerja'] ?></td>
		</tr>
	</table><br>
	<?php 
	$hr = $tm['th_ini']+$tm['th_lalu']+$tm['th_lm'];
	$sb = sebut($hr);

	$tc = $tm['tgl_mulai'];

	if($hr==12){
		$hari = date("Y-m-d", strtotime('+12 days', strtotime($tc)));
	}else if($hr==18){
		$hari = date("Y-m-d", strtotime('+18 days', strtotime($tc)));
	}else{
		$hari = date("Y-m-d", strtotime('+24 days', strtotime($tc)));
	}
	
	?>
	<p>Selama <?php echo $hr." (".$sb.")"; ?> hari kerja terhitung <?php echo tgl_indo($tm['tgl_mulai']) ?> s/d <?php echo tgl_indo($hari) ?> dengan ketentuan sebagai berikut : </p>
	<table width="100%" class="table-responsive">
		<tr>
			<td>&ensp;&ensp;<p  style="margin-top: -8px;">1.</p>&nbsp;</td>
			<td>Sebelum menjalankan Cuti Tahunan wajib menyerahkan pekerjaannya kepada atasan langsung atau pejabat lainnya yang ditentukan.</td>
		</tr>
		<tr>
			<td>&ensp;&ensp;<p  style="margin-top: -8px;">2.</p>&nbsp;</td>
			<td>Setelah selesai menjalankan Cuti Tahunan wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana mestinya.</td>
		</tr>
		<tr>
			<td>&ensp;&ensp;<p style="margin-top: 8px;">3.</p>&nbsp;</td>
			<td>Alamat cuti : <?php echo $tm['alamat_cuti'] ?></td>
		</tr>
	</table>
	<br>
	<p>Demikian Surat Izin Cuti Tahunan ini diberikan untuk dapat digunakan sebagai mana mestinya.</p><br><br>
	<table width="100%">
		<tr>
			<td width="50%"></td>
			<td width="50%" class="text-center">
				Banjarbaru, <?php echo tgl_indo($tm['tgl_surat']) ?><br>
				Kepala Balai Pengujian dan Sertifikasi Mutu Barang <br>
				Provinsi Kalimantan Selatan<br><br><br><br><br>
				<u>Drs. M. Anang Aliansyah</u><br>
				Pembina Tk.I<br>
				NIP. 19580726 198403 1 007
			</td>
		</tr>
		<tr>
			<td width="50%">
			TEMBUSAN : <br>
			&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;1. Disperindag Provinsi Kalimantan Selatan<br>
			&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;2. Saudari Nurhalipah<br>
			&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;3. Arsip
			</td>
			<td width="50%"></td>
		</tr>
	</table>
</div>
</body>
</html>