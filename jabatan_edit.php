<?php
require "koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($konek,"SELECT*FROM jabatan WHERE id_jbtn='$id'");
$tm = mysqli_fetch_assoc($sql);
?>
<form method="post" action="jabatan_upd.php">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
            <h4 class="modal-title" id="myModalLabel">UPDATE JABATAN</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">
                        <input type="hidden" name="id" value="<?php echo $tm['id_jbtn'] ?>">
                            <label class="col-md-3 control-label">Nama Jabatan</label>
                            <div class="col-md-9">
                                <input type="text" name="njbtn" required="required" class="form-control input-sm" value="<?php echo $tm['nama_jbtn'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-md-3 control-label">Keterangan</label>
                            <div class="col-md-9">
                                <textarea name="ket" required="required" class="form-control input-sm"><?php echo $tm['ket'] ?></textarea>
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