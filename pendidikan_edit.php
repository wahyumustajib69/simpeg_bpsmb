<?php
require "koneksi.php";
$id  = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM pendidikan WHERE id_pend='$id'");
$tm = mysqli_fetch_assoc($sql);
?>
<form method="post" action="pendidikan_upd">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
			<h4 class="modal-title" id="myModalLabel">UPDATE DATA RIWAYAT PENDIDIKAN</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<input type="hidden" name="id" value="<?php echo $tm['id_pend'] ?>">
							<label class="col-md-3 control-label">Nama Pegawai</label>
							<div class="col-md-9">
								<select name="nama" required="required" class="form-control input-sm nm-pgw" style="width: 100%;">
									<option selected="" disabled="">-Cari Pegawai-</option>
									<?php
									$sql = mysqli_query($konek,"SELECT nip,nama_pgw FROM pegawai ORDER BY nama_pgw");
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
							<label class="col-md-3 control-label">Jenjang</label>
							<div class="col-md-9">
								<input type="text" name="jnj" required="required" class="form-control input-sm" value="<?php echo $tm['tingkat'] ?>">
							</div>
						</div>
					</div>								
					
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Nama Instansi</label>
							<div class="col-md-9">
								<input type="text" name="inst" required="required" class="form-control input-sm" value="<?php echo $tm['nama_instansi'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Lokasi</label>
							<div class="col-md-9">
								<input type="text" name="lok" required="required" class="form-control input-sm" value="<?php echo $tm['lokasi'] ?>">
							</div>
						</div>
					</div>								
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Jurusan</label>
							<div class="col-md-9">
								<input type="text" name="jur" required="required" class="form-control input-sm" value="<?php echo $tm['jurusan'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">No. Ijazah</label>
							<div class="col-md-9">
								<input type="text" name="ijz" required="required" class="form-control input-sm" value="<?php echo $tm['no_ijazah'] ?>">
							</div>
						</div>
					</div>								
				</div>

				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Tgl. Ijazah</label>
							<div class="col-md-9">
								<input type="date" name="tg_ijz" required="required" class="form-control input-sm" value="<?php echo $tm['tgl_ijazah'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Pimpinan</label>
							<div class="col-md-9">
								<input type="text" name="pimp" required="required" class="form-control input-sm" value="<?php echo $tm['pimpinan'] ?>">
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
		dropdownParent: $("#pend-edit")
	});
</script>