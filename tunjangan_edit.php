<?php
require "koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM tunjangan WHERE id_tunj='$id'");
$tj = mysqli_fetch_assoc($sql);
?>
<form method="post" action="tunjangan_upd.php">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
			<h4 class="modal-title" id="myModalLabel">TAMBAH TUNJANGAN</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Nama Pegawai</label>
							<div class="col-md-9">
								<input type="hidden" name="id" value="<?php echo $tj['id_tunj']; ?>">
                                <select name="pgw" required="required" class="form-control input-sm tnj" style="width: 100%">
                                    <option selected="" disabled="">-Pilih Pegawai-</option>
                                    <?php
                                        $sql = mysqli_query($konek,"SELECT nip,nama_pgw FROM pegawai ORDER BY nama_pgw");
                                        while($pg = mysqli_fetch_assoc($sql)){
                                    ?>
                                    <option value="<?php echo $pg['nip'] ?>" <?php if($pg['nip']==$tj['nip']){echo 'selected';} ?>><?php echo $pg['nama_pgw'] ?></option>
                                    <?php } ?>
                                </select>
							</div>
						</div>
					</div>

                    <div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Jumlah Tetap</label>
							<div class="col-md-9">
								<input type="text" name="jml" required="required" value="<?php echo $tj['jml_ttp'] ?>" class="form-control input-sm">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Besaran Tetap</label>
							<div class="col-md-9">
								<input type="text" name="bes" required="required" value="<?php echo $tj['bsr_ttp'] ?>" class="form-control input-sm">
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
	$(".tnj").select2({
		dropdownParent: $("#tunjEdit")
	});
</script>