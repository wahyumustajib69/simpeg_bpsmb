<?php include "header.php"; require "koneksi.php"; ?>
<nav class="ts-sidebar">
	<ul class="ts-sidebar-menu">
		
		<li class="ts-label">Main Menu</li>
		<li><a href="home"><i class="fa fa-home"></i> Beranda</a></li>
		<li><a href="#"><i class="fa fa-user"></i> Data Pegawai</a>
			<ul>
				<li><a href="golongan"><i class="fa fa-list"></i> Golongan Pegawai</a></li>
				<li><a href="jabatan"><i class="fa fa-sitemap"></i> Jabatan</a></li>
				<li><a href="pegawai"><i class="fa fa-list-alt"></i> Semua Data</a></li>
				<li><a href="keluarga"><i class="fa fa-users"></i> Keluarga</a></li>
				<li><a href="pendidikan"><i class="fa fa-graduation-cap"></i> Pendidikan</a></li>
				<!--<li><a href="typography.html">Typography</a></li>
				<li><a href="icon.html">Icon</a></li>
				<li><a href="grid.html">Grid</a></li>-->
			</ul>
		</li>
		
		<li  class="open"><a href="cuti"><i class="fa fa-user-plus"></i> Cuti Pegawai</a></li>
		<li><a href="#"><i class="fa fa-money"></i> Gaji & Tunjangan</a>
			<ul>
				<li><a href="gaji"><i class="fa fa-money"></i> Gaji</a></li>
				<li><a href="tunjangan"><i class="fa fa-money"></i> Tunjangan</a></li>
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

				<h2 class="page-title"><i class="fa fa-user-plus"></i> CUTI PEGAWAI</h2>

				<!-- Zero Configuration Table -->
				<div class="panel panel-primary">
					<div class="panel-heading">SEMUA DATA CUTI</div>
					<div class="panel-body table-responsive">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-2" style="margin-bottom: 8px;">
										<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalCuti">
										<i class="fa fa-plus-circle"></i> TAMBAH
										</button>
										<a href="cuti_rekap" class="btn btn-sm btn-danger" target="_blank"><i class="fa fa-print"></i> REKAP</a>
									</div>
									<div class="col-md-10">
										<p>
											<div style="margin-top: -25px;">
								                 <?php
								                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
								                    echo '<div id="pesan" class="alert alert-success" style="display:none;">'.$_SESSION['pesan'].'</div>';
								                    }
								                    $_SESSION['pesan'] = '';
								                ?>
								            </div>
										</p>
									</div>
								</div>
							</div>
						</div>
						
						<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>NO</th>
									<th>NO. SURAT</th>
									<th>PEGAWAI</th>
									<th>TGL CUTI</th>
									<th>HARI CUTI</th>
									<th>ALAMAT CUTI</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								$sql = mysqli_query($konek,"SELECT*FROM cuti AS a JOIN pegawai AS b ON a.nip=b.nip ORDER BY a.tgl_surat");
								while($row = mysqli_fetch_assoc($sql)){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['no_surat'] ?></td>
									<td><?php echo $row['nama_pgw'] ?></td>
									<td><?php echo tgl_indo($row['tgl_mulai']) ?></td>
									<td><?php echo $row['th_ini']+$row['th_lalu']+$row['th_lm'].' Hari'; ?></td>
									<td><?php echo $row['alamat_cuti'] ?></td>
									<td>
										<a id="<?php echo $row['id_cuti'] ?>" class="btn btn-xs btn-primary modal_edit"><i class="fa fa-edit"></i> </a>
										<a onclick="konfirmasi('cuti_del.php?id=<?php echo $row['id_cuti'] ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>
										<a class="btn btn-xs btn-success" target="_blank" href="cuti_cetak?ref=<?php echo $row['id_cuti'] ?>"><i class="fa fa-print"></i> </a>
									</td>
								</tr>
								<?php } ?> 
							</tbody>
						</table>

					</div>
				</div>

				<!-- Modal -->
				<form method="post" action="cuti_add.php" enctype="multipart/form-data">
				<div class="modal fade" id="modalCuti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
								<h4 class="modal-title" id="myModalLabel">TAMBAH CUTI PEGAWAI</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div class="row">
												<label class="col-md-3 control-label">No. Surat</label>
												<div class="col-md-9">
													<input type="text" name="no" required="required" class="form-control input-sm" placeholder="cth: 123/BPSMB/XII/2021">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-md-3 control-label">Tgl. Surat</label>
												<div class="col-md-9">
													<input type="date" name="tgs" required="required" class="form-control input-sm">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-md-3 control-label">Tgl. Mulai Cuti</label>
												<div class="col-md-9">
													<input type="date" name="tgm" required="required" class="form-control input-sm">
												</div>
											</div>
										</div>	

										<div class="form-group">
											<div class="row">
												<label class="col-md-3 control-label">Tahun Cuti</label>
												<div class="col-md-9">
													<?php
													$th_ini = date('Y');
													?>
													<label><input type="checkbox" name="th1" class="" value="6"> <?php echo $th_ini-2; ?></label> &nbsp;
													<label><input type="checkbox" name="th2" class="" value="6"> <?php echo $th_ini-1; ?></label> &nbsp;
													<label><input type="checkbox" checked name="th3" class="" value="12"> <?php echo $th_ini; ?>(now)</label>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-md-3 control-label">Pegawai</label>
												<div class="col-md-9">
													<select name="pgw" required="required" class="form-control input-sm cuti" style="width: 100%;">
														<option selected="" disabled="">-Cari Pegawai-</option>
														<?php
														$sql = mysqli_query($konek,"SELECT nip,nama_pgw FROM pegawai ORDER BY nama_pgw");
														while($pg=mysqli_fetch_assoc($sql)){
														?>
														<option value="<?php echo $pg['nip'] ?>"><?php echo $pg['nama_pgw'] ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>	

										<div class="form-group">
											<div class="row">
												<label class="col-md-3 control-label">Alamat Cuti</label>
												<div class="col-md-9">
													<textarea name="almt" required="required" class="form-control input-sm"></textarea>
												</div>
											</div>
										</div>						
										
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> BATAL</button>
								<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-floppy-o"></i> SIMPAN</button>
							</div>
						</div>
					</div>
				</div></form>

				<div class="modal fade" id="cutiEdit"></div>

				<!--Modal Hapus-->
                <div class="modal modal-xs fade" id="modal-delete">
                  <div class="modal-dialog">
                    <div class="modal-content" style="margin-top:150px;">
                        <div class="modal-header bg-primary" style="border-top-left-radius: 5px;border-top-right-radius: 5px;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                            <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> KONFIRMASI</h4>
                        </div> 
                        <div class="modal-body" align="center">Apakah Anda Yakin??<br>Hapus data <i class="fa fa-trash"></i></div>   
                        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                            <a href="#" class="btn btn-danger btn-sm" id="delete-link"><i class="fa fa-check-circle"></i> Hapus</a>
                            <button type="button" class="btn btn-success btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
                        </div>
                    </div>
                  </div>
                </div>

			</div>
		</div>

		<div class="row">
			<div class="clearfix pt pb">
				<div class="col-md-12">
					<em>Copyright &copy; <?php echo date('Y'); ?></em>
				</div>
			</div>
		</div>

	</div>
</div>
<?php include "footer.php"; ?>