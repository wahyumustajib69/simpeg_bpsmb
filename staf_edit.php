<?php
require "koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM sppd WHERE id_surat='$id' ");
$tm=mysqli_fetch_assoc($sql);
?>
<form method="post" action="staf_upd.php">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
				<h4 class="modal-title" id="myModalLabel">UPDATE SPPD STAF</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<input type="hidden" name="id" value="<?php echo $tm['id_surat'] ?>">
								<label class="col-md-3 control-label">No. Surat</label>
								<div class="col-md-9">
									<input type="text" name="no" required="required" class="form-control input-sm" placeholder="cth: 090/001/SPT-LD/Disdag" value="<?php echo $tm['no_surat'] ?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-3 control-label">Tanggal Surat</label>
								<div class="col-md-9">
									<input type="date" name="tgl" required="required" class="form-control input-sm" value="<?php echo $tm['tgl_surat'] ?>">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-3 control-label">Nama Pegawai</label>
								<div class="col-md-9">
									<select name="pgw" required="required" class="form-control input-sm nm-pgw" style="width: 100%;">
										<option selected="" disabled="">-Cari Pegawai-</option>
										<?php
										$sql = mysqli_query($konek,"SELECT nip,nama_pgw FROM pegawai ORDER BY nip");
										while($tp=mysqli_fetch_assoc($sql)){
										?>
										<option value="<?php echo $tp['nip'] ?>" <?php if($tm['nip']==$tp['nip']){echo 'selected';} ?>><?php echo $tp['nama_pgw'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-3 control-label">Dasar</label>
								<div class="col-md-9">
									<textarea name="dasar" id="editor3" required="required" class="form-control input-sm" cols="5" rows="5"><?php echo $tm['dasar'] ?></textarea>
								</div>
							</div>
						</div>	

						<div class="form-group">
							<div class="row">
								<label class="col-md-3 control-label">Tujuan</label>
								<div class="col-md-9">
									<textarea name="tujuan" id="editor4" required="required" class="form-control input-sm"><?php echo $tm['tujuan']; ?></textarea>
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
<script>
	$(".nm-pgw").select2({
		dropdownParent: $("#stafEdit")
	});
	$(function(){
		CKEDITOR.replace('editor3');
		CKEDITOR.replace('editor4');
	});
</script>
