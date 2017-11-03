<!-- Modal -->
<div id="modal-default" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Supplier</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2">KODE SUPPLIER:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_supplier" value="<?php echo $kode_supplier ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA SUPPLIER:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_supplier"  required oninvalid="this.setCustomValidity('Nama supplier harus di isi')"  oninput="setCustomValidity('')">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KOTA/NEGARA:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control"  name="kota_negara"  required oninvalid="this.setCustomValidity('kota/negara harus di isi')"  oninput="setCustomValidity('')">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.TLP/HP:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nomor_hp"  required oninvalid="this.setCustomValidity('Nomor tlp harus di isi')"  oninput="setCustomValidity('')">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KONTAK PERSON:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kontak_person">
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-2">ACC:</label>
              <div class="col-sm-3">          
              <textarea name="acc" class="form-control"></textarea>
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