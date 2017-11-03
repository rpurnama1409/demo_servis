<!-- Modal -->
<div id="modal-default" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Jenis Produk</h4>
      </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Nama Jenis:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="nama jenis" name="nama_jenis">
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