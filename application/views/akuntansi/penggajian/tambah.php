<!-- Modal -->
<div id="modal-default" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Penggajian</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2">KODE PENGGAJIAN:</label>
              <div class="col-sm-2">          
                <input type="text" class="form-control"  name="kode_penggajian" value="<?php echo $kode_penggajian ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA PEGAWAI:</label>
              <div class="col-sm-3">          
              <select name="nama_pegawai" class="form-control" id="pengnama_pegawai" onchange="otomatis_jabatan();">
                <option selected disabled>Pilih nama pegawai--</option>
                <?php foreach ($pegawai as $pegawai) { ?>
                <option><?php echo $pegawai->nama_pegawai ?></option>
                <?php } ?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JABATAN:</label>
              <div class="col-sm-2">          
                <input type="text" class="form-control" id="jabatan"  name="jabatan" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JUMLAH KEHADIRAN:</label>
              <div class="col-sm-1">          
                <input autocomplete="off" type="text" class="form-control"  name="jumlah_kehadiran">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JUMLAH KETERLAMBATAN:</label>
              <div class="col-sm-1">          
                <input autocomplete="off" type="text" class="form-control"  name="jumlah_keterlambatan">
              </div>
              <div class="col-sm-1" style="margin-left:-20px; margin-top: 5px;">
                X
              </div>
              <div class="col-sm-2">
                <input autocomplete="off" type="text" class="form-control"  name="denda" placeholder="Jumlah denda" style="margin-left:-80px; " value="20000">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">HUTANG/KASBON:</label>
              <div class="col-sm-2">          
                <input autocomplete="off" type="text" class="form-control"  name="kasbon">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">BONUS:</label>
              <div class="col-sm-2">          
                <input autocomplete="off" type="text" class="form-control"  name="bonus">
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