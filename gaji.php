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
		
		<li><a href="cuti"><i class="fa fa-user-plus"></i> Cuti Pegawai</a></li>
		<li  class="open"><a href="#"><i class="fa fa-money"></i> Gaji & Tunjangan</a>
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

				<h2 class="page-title"><i class="fa fa-money"></i> GAJI PEGAWAI</h2>

				<!-- Zero Configuration Table -->
				<div class="panel panel-primary">
					<div class="panel-heading">GAJI PEGAWAI</div>
					<div class="panel-body table-responsive">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-2" style="margin-bottom: 8px;">
										<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalGaji">
										<i class="fa fa-plus-circle"></i> TAMBAH
										</button>
										<a href="gaji_cetak" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> CETAK</a>
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
									<th>TANGGAL</th>
									<th>PEGAWAI</th>
									<th>PNKT/GOL</th>
									<th>TOT. JIWA<br>ANAK</th>
									<th>PENGHASILAN</th>
									<th>POTONGAN</th>
									<th>JUMLAH BERSIH</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no=1;
								$sql = mysqli_query($konek,"SELECT*FROM gaji AS a JOIN pegawai AS b ON a.nip=b.nip JOIN golongan AS C ON b.gol=c.id_gol ORDER BY c.gol DESC");
								while($row = mysqli_fetch_assoc($sql)){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['tgl_gaji'] ?></td>
									<td><?php echo $row['nama_pgw'] ?></td>
									<td><?php echo $row['pangkat'].'/ '.$row['gol'] ?></td>
									<?php
									$nip 	= $row['nip'];
									$gpokok = $row['gj_pokok'];
									$tj_esl	= $row['tunj_eselon'];
									$tj_um	= $row['tunj_umum'];
									$tj_fu	= $row['t_fungsi'];
									$tj_kh	= $row['t_khusus'];
									$tj_ter	= $row['t_terp'];
									$tkd	= $row['tkd'];
									$tj_brs	= $row['t_beras'];
									$tj_pjk	= $row['t_pajak'];
									$bpjs	= $row['bpjs'];
									$jkk	= $row['jkk'];
									$jkm	= $row['jkm'];
									$tpr	= $row['tapera'];
									
									$pt_pjk	= $row['p_pajak'];
									$pt_bp	= $row['b_kes'];
									$pt_tap	= $row['p_taperum'];
									$pt_jkk	= $row['p_jkk'];
									$pt_jkm	= $row['p_jkm'];
									$pt_tpk	= $row['p_tpk'];
									$pt_tpg	= $row['p_tpg'];
									$htg	= $row['hutang'];
									$blg	= $row['bulog'];
									$swr	= $row['sewa_rmh'];

									//hitung anak
									$hitung_anak = mysqli_query($konek,"SELECT * FROM keluarga AS a JOIN pegawai AS b ON a.nip=b.nip WHERE a.nip='$nip' ");
									$y = mysqli_fetch_assoc($hitung_anak);
									$st = $y['status'];
									$x = mysqli_num_rows($hitung_anak);


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
									//hitung tunjangan
									
									$tj_pas = ($gpokok*0.1)*$jml_pas; //hitung tunjangan suami/istri
									$tj_anak = ($gpokok*0.02)*$jml_anak; //hitung tunjangan 2 orang anak

									$pemasukan = $gpokok+$tj_pas+$tj_anak+$tj_esl+$tj_um+$tj_fu+$tj_kh+$tj_ter+$tkd+$tj_brs+$tj_pjk+$bpjs+$jkk+$jkm+$tpr; //total penghasilan


									//hitung potongan
									$iwp1 = round(($pemasukan-$tj_brs)*0.01);
									$iwp8 = round(($gpokok+$tj_pas+$tj_anak)*0.08);

									$potongan = $pt_pjk+$pt_bp+$pt_tap+$pt_jkk+$pt_jkm+$pt_tpk+$pt_tpg+$htg+$blg+$swr+$iwp1+$iwp8;

									$pm_bersih = $pemasukan-$potongan;
									?>

									<td class="text-center"><?php echo 1+$jml_pas+$jml_anak.' Jiwa'; echo '<br>'.$jml_anak.' Anak' ?></td>
									<td class="text-right"><?php echo 'Rp. '.duit($pemasukan) ?></td>
									<td class="text-right"><?php echo 'Rp. '.duit($potongan) ?></td>
									<td class="text-right"><?php echo 'Rp. '.duit($pm_bersih) ?></td>
									<td>
										<a id="<?php echo $row['id_gaji'] ?>" class="btn btn-xs btn-primary modal_edit"><i class="fa fa-edit"></i></a>
										<a onclick="konfirmasi('gaji_del.php?id=<?php echo $row['id_gaji'] ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?> 
							</tbody>
						</table>

					</div>
				</div>

				<!-- Modal -->
				<form method="post" action="gaji_add.php" enctype="multipart/form-data">
				<div class="modal fade" id="modalGaji" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
								<h4 class="modal-title" id="myModalLabel">HITUNG GAJI PEGAWAI</h4>
							</div>
							<div class="modal-body">
								<div class="col-md-12">
									<div class="row">
										<!--====KOLOM KIRI =====-->
										<div class="col-md-6">
											<div class="row">
											<label class="text-success text-center">PENGHASILAN</label>
											
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">Pegawai</label>
													<div class="col-md-8">
														<select name="pgw" required="required" class="form-control input-sm gaji" style="width: 100%">
															<option selected="" disabled="">-Pilih Pegawai-</option>
															<?php 
															$sql = mysqli_query($konek,"SELECT nip,nama_pgw FROM pegawai ORDER BY nama_pgw");
															while($pw=mysqli_fetch_assoc($sql)){
															?>
															<option value="<?php echo $pw['nip'] ?>"><?php echo $pw['nama_pgw'] ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">Gaji Pokok</label>
													<div class="col-md-8">
														<input type="number" name="gaji" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. Eselon</label>
													<div class="col-md-8">
														<input type="number" name="esel" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. Fungsi Umum</label>
													<div class="col-md-8">
														<input type="number" name="t_umum" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. Fungsional</label>
													<div class="col-md-8">
														<input type="number" name="t_fung" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. Khusus</label>
													<div class="col-md-8">
														<input type="number" name="t_khu" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. Terpencil</label>
													<div class="col-md-8">
														<input type="number" name="t_terp" required="required" class="form-control input-sm" min="0">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">TKD</label>
													<div class="col-md-8">
														<input type="number" name="tkd" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. Beras</label>
													<div class="col-md-8">
														<input type="number" name="t_bras" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. Pajak</label>
													<div class="col-md-8">
														<input type="number" name="t_pjk" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">BPJS Kes.</label>
													<div class="col-md-8">
														<input type="number" name="bpjs" required="required" class="form-control input-sm" min="0">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. JKK</label>
													<div class="col-md-8">
														<input type="number" name="t_jkk" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">T. JKM</label>
													<div class="col-md-8">
														<input type="number" name="t_jkm" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">TAPERA</label>
													<div class="col-md-8">
														<input type="number" name="tpra" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											</div>								
										</div>

										<!--====KOLOM KIRI =====-->
										<div class="col-md-6">
											<div class="row">
											<label class="text-danger">&nbsp;&nbsp;POTONGAN</label>
											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;P. Pajak</label>
													<div class="col-md-8">
														<input type="number" name="p_pjk" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;BPJS Kes.</label>
													<div class="col-md-8">
														<input type="number" name="p_bpjs" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;P. Teperum</label>
													<div class="col-md-8">
														<input type="number" name="p_perum" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;Potongan JKK</label>
													<div class="col-md-8">
														<input type="number" name="p_jkk" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;Potongan JKM</label>
													<div class="col-md-8">
														<input type="number" name="p_jkm" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;TAPERA PK</label>
													<div class="col-md-8">
														<input type="number" name="p_tpra" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;TAPERA PEG.</label>
													<div class="col-md-8">
														<input type="number" name="p_tpg" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;Hutang/Dll</label>
													<div class="col-md-8">
														<input type="number" name="hutang" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;BULOG</label>
													<div class="col-md-8">
														<input type="number" name="bulog" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="row">
													<label class="col-md-4 control-label">&nbsp;&nbsp;Sewa Rumah</label>
													<div class="col-md-8">
														<input type="number" name="sewa" required="required" class="form-control input-sm"  min="0">
													</div>
												</div>
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

				<div class="modal fade" id="gajiEdit"></div>

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