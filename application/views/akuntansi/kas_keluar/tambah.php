<!-- Modal -->
<div id="modal-default" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Kas keluar</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2">KODE TRANSAKSI:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_transaksi" value="<?php echo $kode_transaksi ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KODE AKUN:</label>
              <div class="col-sm-3">          
                <select name="kode_akun" id="kode_akun" class="form-control" onchange="otomatis();">
                  <option selected disabled>Pilih kode akun--</option>
                  <?php foreach ($kode_akun as $kode_akun) { ?>
                    <option value="<?php echo $kode_akun->kode ?>"><?php echo $kode_akun->kode.' - '. $kode_akun->nama_akuntansi ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA AKUN:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control" id="nama_akun"  name="nama_akun" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.BUKTI:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control"  name="no_bukti"  required oninvalid="this.setCustomValidity('No.Bukti harus di isi')"  oninput="setCustomValidity('')">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NOMINAL:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nominal"  required oninvalid="this.setCustomValidity('Nominal harus di isi')"  oninput="setCustomValidity('')">
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