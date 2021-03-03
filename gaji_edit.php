<?php
require "koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM gaji WHERE id_gaji='$id' ");
$g = mysqli_fetch_assoc($sql);
?>
<form method="post" action="gaji_upd.php">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header bg-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
			<h4 class="modal-title" id="myModalLabel">UPDATE GAJI PEGAWAI</h4>
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
									<input type="hidden" name="id" value="<?php echo $g['id_gaji'] ?>">
									<select name="pgw" required="required" class="form-control input-sm gaji" style="width: 100%">
										<option selected="" disabled="">-Pilih Pegawai-</option>
										<?php 
										$sql = mysqli_query($konek,"SELECT nip,nama_pgw FROM pegawai ORDER BY nama_pgw");
										while($pw=mysqli_fetch_assoc($sql)){
										?>
										<option value="<?php echo $pw['nip'] ?>"<?php if($g['nip']==$pw['nip']){echo 'selected';} ?>><?php echo $pw['nama_pgw'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">Gaji Pokok</label>
								<div class="col-md-8">
									<input type="number" name="gaji" required="required" class="form-control input-sm" value="<?php echo $g['gj_pokok'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. Eselon</label>
								<div class="col-md-8">
									<input type="number" name="esel" required="required" class="form-control input-sm" value="<?php echo $g['tunj_eselon'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. Fungsi Umum</label>
								<div class="col-md-8">
									<input type="number" name="t_umum" required="required" class="form-control input-sm" value="<?php echo $g['tunj_umum'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. Fungsional</label>
								<div class="col-md-8">
									<input type="number" name="t_fung" required="required" class="form-control input-sm" value="<?php echo $g['t_fungsi'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. Khusus</label>
								<div class="col-md-8">
									<input type="number" name="t_khu" required="required" class="form-control input-sm" value="<?php echo $g['t_khusus'] ?>" min="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. Terpencil</label>
								<div class="col-md-8">
									<input type="number" name="t_terp" required="required" class="form-control input-sm" value="<?php echo $g['t_terp'] ?>" min="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">TKD</label>
								<div class="col-md-8">
									<input type="number" name="tkd" required="required" class="form-control input-sm" value="<?php echo $g['tkd'] ?>" min="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. Beras</label>
								<div class="col-md-8">
									<input type="number" name="t_bras" required="required" class="form-control input-sm" value="<?php echo $g['t_beras'] ?>" min="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. Pajak</label>
								<div class="col-md-8">
									<input type="number" name="t_pjk" required="required" class="form-control input-sm" value="<?php echo $g['t_pajak'] ?>" min="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">BPJS Kes.</label>
								<div class="col-md-8">
									<input type="number" name="bpjs" required="required" class="form-control input-sm" value="<?php echo $g['bpjs'] ?>" min="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. JKK</label>
								<div class="col-md-8">
									<input type="number" name="t_jkk" required="required" class="form-control input-sm" value="<?php echo $g['jkk'] ?>" min="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">T. JKM</label>
								<div class="col-md-8">
									<input type="number" name="t_jkm" required="required" class="form-control input-sm" value="<?php echo $g['jkm'] ?>" min="0">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">TAPERA</label>
								<div class="col-md-8">
									<input type="number" name="tpra" required="required" class="form-control input-sm" value="<?php echo $g['tapera'] ?>" min="0">
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
									<input type="number" name="p_pjk" required="required" class="form-control input-sm" value="<?php echo $g['p_pajak'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;BPJS Kes.</label>
								<div class="col-md-8">
									<input type="number" name="p_bpjs" required="required" class="form-control input-sm" value="<?php echo $g['b_kes'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;P. Teperum</label>
								<div class="col-md-8">
									<input type="number" name="p_perum" required="required" class="form-control input-sm" value="<?php echo $g['p_taperum'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;Potongan JKK</label>
								<div class="col-md-8">
									<input type="number" name="p_jkk" required="required" class="form-control input-sm" value="<?php echo $g['p_jkk'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;Potongan JKM</label>
								<div class="col-md-8">
									<input type="number" name="p_jkm" required="required" class="form-control input-sm" value="<?php echo $g['p_jkm'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;TAPERA PK</label>
								<div class="col-md-8">
									<input type="number" name="p_tpra" required="required" class="form-control input-sm" value="<?php echo $g['p_tpk'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;TAPERA PEG.</label>
								<div class="col-md-8">
									<input type="number" name="p_tpg" required="required" class="form-control input-sm" value="<?php echo $g['p_tpg'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;Hutang/Dll</label>
								<div class="col-md-8">
									<input type="number" name="hutang" required="required" class="form-control input-sm" value="<?php echo $g['hutang'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;BULOG</label>
								<div class="col-md-8">
									<input type="number" name="bulog" required="required" class="form-control input-sm" value="<?php echo $g['bulog'] ?>" min="0">
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<label class="col-md-4 control-label">&nbsp;&nbsp;Sewa Rumah</label>
								<div class="col-md-8">
									<input type="number" name="sewa" required="required" class="form-control input-sm" value="<?php echo $g['sewa_rmh'] ?>" min="0">
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
</form>
<script type="text/javascript">
	$(".gaji").select2({
		dropdownParent: $("#gajiEdit")
	});
</script>