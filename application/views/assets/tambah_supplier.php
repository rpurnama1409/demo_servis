<div id="stack2" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
<div class="modal-dialog">
    <div class="modal-content">
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
                      <input id="tamkode_supplier"type="text" class="form-control"  name="kode_supplier" value="<?php echo $kode_supplier ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">NAMA SUPPLIER:</label>
                      <div class="col-sm-3">          
                      <input id="tamnama_supplier" type="text" class="form-control"  name="nama_supplier"  required oninvalid="this.setCustomValidity('Nama supplier harus di isi')"  oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">KOTA/NEGARA:</label>
                      <div class="col-sm-3">          
                        <input id="tamkota_negara" type="text" class="form-control"  name="kota_negara"  required oninvalid="this.setCustomValidity('kota/negara harus di isi')"  oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">NO.TLP/HP:</label>
                      <div class="col-sm-2">          
                      <input id="tamnomor_hp" type="text" class="form-control"  name="nomor_hp"  required oninvalid="this.setCustomValidity('Nomor tlp harus di isi')"  oninput="setCustomValidity('')">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2">KONTAK PERSON:</label>
                      <div class="col-sm-2">          
                      <input id="tamkontak_person" type="text" class="form-control"  name="kontak_person">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-sm-2">ACC:</label>
                      <div class="col-sm-3">          
                      <textarea id="tamacc" name="acc" class="form-control"></textarea>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button id="simpan_pelanggan" onclick="possup();" class="btn btn-primary">Simpan</button>
            <button id"pclose" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        </div>
    </div>
</div>
</div>