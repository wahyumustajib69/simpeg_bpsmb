<?php
require "koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM cuti WHERE id_cuti='$id' ");
$x = mysqli_fetch_assoc($sql);
?>
<form method="post" action="cuti_upd.php">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
			<h4 class="modal-title" id="myModalLabel">UPDATE CUTI PEGAWAI</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<input type="hidden" name="id" value="<?php echo $x['id_cuti'] ?>">
							<label class="col-md-3 control-label">No. Surat</label>
							<div class="col-md-9">
								<input type="text" name="no" required="required" class="form-control input-sm" placeholder="cth: 123/BPSMB/XII/2021" value="<?php echo $x['no_surat'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Tgl. Surat</label>
							<div class="col-md-9">
								<input type="date" name="tgs" required="required" class="form-control input-sm" value="<?php echo $x['tgl_surat'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Tgl. Mulai Cuti</label>
							<div class="col-md-9">
								<input type="date" name="tgm" required="required" class="form-control input-sm" value="<?php echo $x['tgl_mulai'] ?>">
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
								<label><input type="checkbox" name="th1" class="" value="6" <?php if($x['th_lm']=='6'){echo 'checked';} ?>> <?php echo $th_ini-2; ?></label> &nbsp;
								<label><input type="checkbox" name="th2" class="" value="6" <?php if($x['th_lalu']=='6'){echo 'checked';} ?>> <?php echo $th_ini-1; ?></label> &nbsp;
								<label><input type="checkbox" checked name="th3" class="" value="12" <?php if($x['th_ini']=='12'){echo 'checked';} ?>> <?php echo $th_ini; ?>(now)</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Pegawai</label>
							<div class="col-md-9">
								<select name="pgw" required="required" class="form-control input-sm cuti2" style="width: 100%;">
									<option selected="" disabled="">-Cari Pegawai-</option>
									<?php
									$sql = mysqli_query($konek,"SELECT nip,nama_pgw FROM pegawai ORDER BY nama_pgw");
									while($pg=mysqli_fetch_assoc($sql)){
									?>
									<option value="<?php echo $pg['nip'] ?>"<?php if($x['nip']==$pg['nip']){echo 'selected';} ?>><?php echo $pg['nama_pgw'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>	

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Alamat Cuti</label>
							<div class="col-md-9">
								<textarea name="almt" required="required" class="form-control input-sm"><?php echo $x['alamat_cuti'] ?></textarea>
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
	$(".cuti2").select2({
		dropdownPArent: $("#cutiEdit")
	});
</script>