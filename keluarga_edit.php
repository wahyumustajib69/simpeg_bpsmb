<?php
require "koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM keluarga WHERE id_kel='$id' ");
$hs = mysqli_fetch_assoc($sql);
?>
<form method="post" action="keluarga_upd.php">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
			<h4 class="modal-title" id="myModalLabel">UPDATE DATA KELUARGA</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<input type="hidden" name="id" value="<?php echo $hs['id_kel'] ?>">
							<label class="col-md-3 control-label">Nama Pegawai</label>
							<div class="col-md-9">
								<select name="pgw" required="required" class="form-control input-sm keluarga" style="width: 100%;">
									<option selected="" disabled="">-Cari Pegawai-</option>
									<?php
									$sql = mysqli_query($konek,"SELECT nip,nama_pgw FROM pegawai ORDER BY nama_pgw");
									while($tp=mysqli_fetch_assoc($sql)){
									?>
									<option value="<?php echo $tp['nip'] ?>"<?php if($tp['nip']==$hs['nip']){echo 'selected';} ?>><?php echo $tp['nama_pgw'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Nama Anggota</label>
							<div class="col-md-9">
								<input type="text" name="nama" required="required" class="form-control input-sm" value="<?php echo $hs['nama_kel'] ?>">
							</div>
						</div>
					</div>								
					
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">NIK</label>
							<div class="col-md-9">
								<input type="text" name="nik" required="required" class="form-control input-sm" value="<?php echo $hs['nik'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Tempat Lahir</label>
							<div class="col-md-9">
								<input type="text" name="tmp" required="required" class="form-control input-sm" value="<?php echo $hs['tempat_lhr'] ?>">
							</div>
						</div>
					</div>								
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Tgl Lahir</label>
							<div class="col-md-9">
								<input type="date" name="tgl" required="required" class="form-control input-sm" value="<?php echo $hs['tanggal_lhr'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Gender</label>
							<div class="col-md-9">
								<div class="radio radio-info radio-inline">
										<input type="radio" id="inlineRadio1" value="LAKI-LAKI" name="gender" <?php if($hs['jk']=='LAKI-LAKI'){echo 'checked';} ?>>
										<label for="inlineRadio1"> LAKI-LAKI </label>
									</div>
									<div class="radio radio-inline">
										<input type="radio" id="inlineRadio2" value="PEREMPUAN" name="gender" <?php if($hs['jk']=='PEREMPUAN'){echo 'checked';} ?>>
										<label for="inlineRadio2"> PEREMPUAN </label>
									</div>
							</div>
						</div>
					</div>								
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Pendidikan</label>
							<div class="col-md-9">
								<select name="pend" required="required" class="form-control input-sm">
									<option selected="" disabled="">-PILIH-</option>
									<option value="SD"<?php if($hs['pendidikan']=='SD'){echo 'selected';} ?>>SD</option>
									<option value="SLTP"<?php if($hs['pendidikan']=='SLTP'){echo 'selected';} ?>>SLTP</option>
									<option value="SLTA"<?php if($hs['pendidikan']=='SLTA'){echo 'selected';} ?>>SLTA</option>
									<option value="D3"<?php if($hs['pendidikan']=='D3'){echo 'selected';} ?>>D3</option>
									<option value="S1"<?php if($hs['pendidikan']=='S1'){echo 'selected';} ?>>S1</option>
									<option value="S2"<?php if($hs['pendidikan']=='S2'){echo 'selected';} ?>>S2</option>
									<option value="S3"<?php if($hs['pendidikan']=='S3'){echo 'selected';} ?>>S3</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Pekerjaan</label>
							<div class="col-md-9">
								<input type="text" name="pkr" required="required" class="form-control input-sm" value="<?php echo $hs['pekerjaan'] ?>">
							</div>
						</div>
					</div>								
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Hubungan</label>
							<div class="col-md-9">
								<select name="hub" required="required" class="form-control input-sm">
									<option selected="" disabled="">-PILIH-</option>
									<option value="SUAMI"<?php if($hs['hubungan']=='SUAMI'){echo 'selected';} ?>>SUAMI</option>
									<option value="ISTRI"<?php if($hs['hubungan']=='ISTRI'){echo 'selected';} ?>>ISTRI</option>
									<option value="ANAK"<?php if($hs['hubungan']=='ANAK'){echo 'selected';} ?>>ANAK</option>
								</select>
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
</form>
<script type="text/javascript">
	$(".keluarga").select2({
		dropdownParent: $("#keluargaEdit")
	});
</script>