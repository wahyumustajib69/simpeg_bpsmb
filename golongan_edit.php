<?php
session_start();
require "koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM golongan WHERE id_gol='$id'");
$tm=mysqli_fetch_assoc($sql);
?>
<form method="post" action="golongan_act.php">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
			<h4 class="modal-title" id="myModalLabel">UPDATE GOLONGAN</h4>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $tm['id_gol'] ?>">
						<div class="row">
							<label class="col-md-3 control-label">Pangkat</label>
							<div class="col-md-9">
								<input type="text" name="pnkt" required="required" class="form-control input-sm" value="<?php echo $tm['pangkat'] ?>">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label class="col-md-3 control-label">Jabatan</label>
							<div class="col-md-9">
								<input type="text" name="jbtn" required="required" class="form-control input-sm" value="<?php echo $tm['gol'] ?>">
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