<?php include "header.php"; require "koneksi.php"; ?>
<nav class="ts-sidebar">
	<ul class="ts-sidebar-menu">
		
		<li class="ts-label">Main Menu</li>
		<li class="open"><a href="home"><i class="fa fa-home"></i> Beranda</a></li>
		<li><a href="#"><i class="fa fa-user"></i> Data Pegawai</a>
			<ul>
				<li><a href="golongan"><i class="fa fa-list"></i> Golongan Pegawai</a></li>
				<li><a href="jabatan"><i class="fa fa-sitemap"></i> Jabatan</a></li>
				<li><a href="pegawai"><i class="fa fa-list-alt"></i> Semua Data</a></li>
				<li><a href="buttons.html"><i class="fa fa-users"></i> Keluarga</a></li>
				<li><a href="notifications.html"><i class="fa fa-graduation-cap"></i> Pendidikan</a></li>
				<!--<li><a href="typography.html">Typography</a></li>
				<li><a href="icon.html">Icon</a></li>
				<li><a href="grid.html">Grid</a></li>-->
			</ul>
		</li>
		
		<li><a href="cuti"><i class="fa fa-user-plus"></i> Cuti Pegawai</a></li>
		<li><a href="#"><i class="fa fa-money"></i> Gaji & Tunjangan</a>
			<ul>
				<li><a href="gaji">gaji</a></li>
				<li><a href="login.html">Login page</a></li>
			</ul>
		</li>
		<li><a href="#"><i class="fa fa-bus"></i> SPPD</a>
			<ul>
				<li><a href="kepala-balai"><i class="fa fa-user"></i> Kepala Balai</a></li>
				<li><a href="staf"><i class="fa fa-users"></i> Staf</a></li>
			</ul>
		</li>

		<li><a href="#"><i class="fa fa-book"></i> Laporan</a>
			<ul>
				<li><a href="pegawai_cetak" target="_blank"><i class="fa fa-files-o"></i> Data Pegawai</a></li>
				<li><a href="gaji_cetak" target="_blank"><i class="fa fa-files-o"></i> Gaji</a></li>
				<li><a href="tunjangan_cetak" target="_blank"><i class="fa fa-files-o"></i> Tunjangan</a></li>
				<li><a href="cuti_rekap" target="_blank"><i class="fa fa-files-o"></i> Rekap Cuti</a></li>
				<li><a href="sppd_rekap" target="_blank"><i class="fa fa-files-o"></i> Rekap SPPD Kepala Balai</a></li>
				<li><a href="staf_rekap" target="_blank"><i class="fa fa-files-o"></i> Rekap SPPD Staf</a></li>
			</ul>
		</li>

		<!-- Account from above -->
		<ul class="ts-profile-nav">
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Edit Account</a></li>
					<li><a href="#">Logout</a></li>
				</ul>
			</li>
		</ul>

	</ul>
</nav>
<div class="content-wrapper">
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">

				<h2 class="page-title"><i class="fa fa-home"></i> HALAMAN BERANDA</h2>
				
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-success">SELAMAT DATANG <?php echo strtoupper($_SESSION['username']).' <i class="fa fa-user"></i>' ?></div>
						<div class="row">
							
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="panel-body bk-primary text-light">
										<div class="stat-panel text-center">
											<?php
											$sql = mysqli_query($konek,"SELECT*FROM pegawai");
											$tp = mysqli_num_rows($sql);
											?>
											<div class="stat-panel-number h1 "><?php echo $tp ?></div>
											<div class="stat-panel-title text-uppercase"><i class="fa fa-users"></i> TOTAL PEGAWAI</div>
										</div>
									</div>
									<a href="pegawai" class="btn btn-sm btn-primary block-anchor panel-footer">DETAIL<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="panel-body bk-success text-light">
										<div class="stat-panel text-center">
											<?php
											$sql = mysqli_query($konek,"SELECT*FROM cuti");
											$pc = mysqli_num_rows($sql);
											?>
											<div class="stat-panel-number h1 "><?php echo $pc; ?></div>
											<div class="stat-panel-title text-uppercase"><i class="fa fa-user-times"></i> Pegawai Cuti</div>
										</div>
									</div>
									<a href="cuti" class="btn btn-sm btn-success block-anchor panel-footer text-center">DETAIL &nbsp; <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="panel-body bk-info text-light">
										<div class="stat-panel text-center">
											<?php
											$sql = mysqli_query($konek,"SELECT*FROM sppd");
											$sp = mysqli_num_rows($sql);
											?>
											<div class="stat-panel-number h1 "><?php echo $sp ?></div>
											<div class="stat-panel-title text-uppercase"><i class="fa fa-bus"></i> total SPPD</div>
										</div>
									</div>
									<a href="#" class="btn btn-sm btn-info block-anchor panel-footer text-center">DETAIL &nbsp; <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="panel-body bk-warning text-light">
										<div class="stat-panel text-center">
											<div class="stat-panel-number h1 ">18</div>
											<div class="stat-panel-title text-uppercase"><i class="fa fa-credit-card"></i> gaji pegawai</div>
										</div>
									</div>
									<a href="#" class="btn btn-sm btn-warning block-anchor panel-footer text-center">DETAIL &nbsp; <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>

	</div>
</div>
<?php include "footer.php"; ?>