<?php
session_start();
require "koneksi.php";
$nip = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM pegawai WHERE nip='$nip' ");
$res = mysqli_fetch_assoc($sql);
?>

<!-- Modal -->
<form method="post" action="pegawai_upd.php" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
				<h4 class="modal-title" id="myModalLabel">UPDATE PEGAWAI</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<!-------------------------------------->
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">NIP</label>
									<div class="col-md-9">
										<input type="text" name="nip" readonly="readonly" required="required" class="form-control input-sm" value="<?php echo $res['nip'] ?>">
									</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Nama Pegawai</label>
									<div class="col-md-9">
										<input type="text" name="nama" required="required" class="form-control input-sm" value="<?php echo $res['nama_pgw'] ?>">
									</div>
								</div>
								</div>
							</div>
						</div>
						<!-------------------------------------->								
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Tmp Lahir</label>
									<div class="col-md-9">
										<input type="text" name="tmp" required="required" class="form-control input-sm" value="<?php echo $res['tmp_lahir'] ?>">
									</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Tgl Lahir</label>
									<div class="col-md-9">
										<input type="date" name="tgl" required="required" class="form-control input-sm" value="<?php echo $res['tgl_lahir'] ?>">
									</div>
								</div>
								</div>
							</div>
						</div>	
						<!-------------------------------------->								
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Agama</label>
									<div class="col-md-9">
										<select name="agm" required="required" class="form-control input-sm">
											<option selected="" disabled="">-PILIH-</option>
							<option value="ISLAM" <?php if($res['agama']=='ISLAM'){echo 'selected';} ?>>ISLAM</option>
							<option value="KRISTEN" <?php if($res['agama']=='KRISTEN'){echo 'selected';} ?>>KRISTEN</option>
							<option value="KATHOLIK" <?php if($res['agama']=='KATHOLIK'){echo 'selected';} ?>>KATHOLIK</option>
							<option value="HINDU"<?php if($res['agama']=='HINDU'){echo 'selected';} ?>>HINDU</option>
							<option value="BUDHA"<?php if($res['agama']=='BUDHA'){echo 'selected';} ?>>BUDHA</option>
										</select>
									</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Gender</label>
									<div class="col-md-9">
										<div class="radio radio-info radio-inline">
										<input type="radio" id="inlineRadio1" value="LAKI-LAKI" name="gender"<?php if($res['gender']=='LAKI-LAKI'){echo 'checked';} ?>>
										<label for="inlineRadio1"> LAKI-LAKI </label>
									</div>
									<div class="radio radio-inline">
										<input type="radio" id="inlineRadio2" value="PEREMPUAN" name="gender"<?php if($res['gender']=='PEREMPUAN'){echo 'checked';} ?>>
										<label for="inlineRadio2"> PEREMPUAN </label>
									</div>
									</div>
								</div>
								</div>
							</div>
						</div>	
						<!-------------------------------------->								
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Golongan</label>
									<div class="col-md-9">
										<select name="gol" required="required" class="form-control input-sm">
											<option selected="" disabled="">-PILIH-</option>
											<?php
											$sql = mysqli_query($konek,"SELECT*FROM golongan ORDER BY gol");
											while($tm=mysqli_fetch_assoc($sql)){
											?>
	<option value="<?php echo $tm['id_gol'] ?>" <?php if($res['gol']==$tm['id_gol']){echo 'selected';} ?>><?php echo $tm['gol'] ?></option>
											<?php } ?>
										</select>
									</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Jabatan</label>
									<div class="col-md-9">
									<select name="jbtn" class="form-control input-sm" required="required">
										<option disabled="" selected="" >-PILIH-</option>
										<?php
										$sql = mysqli_query($konek,"SELECT*FROM jabatan ORDER BY nama_jbtn");
										while($jb=mysqli_fetch_assoc($sql)){
										?>
										<option value="<?php echo $jb['id_jbtn'] ?>" <?php if($jb['id_jbtn']==$res['jabatan']){echo 'selected';} ?>><?php echo $jb['nama_jbtn'] ?></option>
										<?php } ?>
									</select>
									</div>
								</div>
								</div>
							</div>
						</div>	
						<!-------------------------------------->								
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Status Pernikahan</label>
									<div class="col-md-9">
										<select name="stn" required="required" class="form-control input-sm">
											<option selected="" disabled="">-PILIH-</option>
											<option value="MENIKAH"<?php if($res['status']=='MENIKAH'){echo 'selected';} ?>>MENIKAH</option>
											<option value="LAJANG"<?php if($res['status']=='LAJANG'){echo 'selected';} ?>>LAJANG</option>
											<option value="DUDA"<?php if($res['status']=='DUDA'){echo 'selected';} ?>>DUDA</option>
											<option value="JANDA"<?php if($res['status']=='JANDA'){echo 'selected';} ?>>JANDA</option>
										</select>
									</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Status Pegawai</label>
									<div class="col-md-9">
										<select name="stp" required="required" class="form-control input-sm">
											<option selected="" disabled="">-PILIH-</option>
											<option value="PNS"<?php if($res['sts_pegawai']=='PNS'){echo 'selected';} ?>>PNS</option>
											<option value="PTT"<?php if($res['sts_pegawai']=='PTT'){echo 'selected';} ?>>PTT</option>
										</select>
									</div>
								</div>
								</div>
							</div>
						</div>	
						<!-------------------------------------->								
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Unit Kerja</label>
									<div class="col-md-9">
										<input type="text" name="ukr" required="required" class="form-control input-sm" value="<?php echo $res['unit_kerja'] ?>">
									</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Telepon</label>
									<div class="col-md-9">
										<input type="text" name="telp" required="required" class="form-control input-sm" value="<?php echo $res['telp'] ?>">
									</div>
								</div>
								</div>
							</div>
						</div>	
						<!-------------------------------------->								
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Email</label>
									<div class="col-md-9">
										<input type="email" name="email" required="required" class="form-control input-sm" value="<?php echo $res['email'] ?>">
									</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="row">
									<label class="col-md-3 control-label">Alamat</label>
									<div class="col-md-9">
										<textarea name="almt" required="required" class="form-control input-sm"><?php echo $res['alamat'] ?></textarea>
									</div>
								</div>
								</div>
							</div>
						</div>	
						<!-------------------------------------->
					</div>
				</div>
			</div>
			<div class="modal-footer" style="margin-top: -20px;">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> BATAL</button>
				<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-floppy-o"></i> SIMPAN</button>
			</div>
		</div>
	</div>
</form>