<!-- Modal -->
<div id="modal-default" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Pelanggan</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2">KODE PELANGGAN:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_plg" value="<?php echo $kode_pelanggan ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA PELANGGAN:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_pelanggan">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">STATUS:</label>
              <div class="col-sm-3">          
              <select name="status" class="form-control">
                <option selected disabled>Pilih status pelanggan</option>
                <option>Dealer</option>
                <option>User</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">TANGGAL LAHIR:</label>
              <div class="col-sm-2">          
               <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir">
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">ALAMAT:</label>
              <div class="col-sm-3">          
              <textarea name="alamat" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KOTA</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="kota">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.TELP/HP</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="no_hp">
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