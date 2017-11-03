<!-- Modal -->
<div id="modal-default" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data operator</h4>
      </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                 <div class="form-group">
                    <label class="control-label col-sm-2">Nama Pegawai:</label>
                    <div class="col-sm-3">          
                    <select class="form-control" name="nama">
                    <option selected disabled>-Pilih-</option>
                    <?php foreach ($pegawai as $nama) { ?>
                    <option><?php echo $nama->nama_pegawai ?></option>
                    <?php } ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Username:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="username" name="username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Password:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="********" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Level:</label>
                    <div class="col-sm-3">          
                      <select class="form-control" name="level">
                      <option selected disabled>-Pilih-</option>
                    <?php foreach ($level as $level) { ?>
                    <option><?php echo $level->level ?></option>
                    <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              </div>
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
              <?php echo form_close() ?>  
    </div>

  </div>
</div>
<!-- End Modal -->