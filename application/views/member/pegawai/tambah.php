<!-- Modal -->
<div id="modal-default" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Pegawai</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2">KODE KARYAWAN:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_pegawai" value="<?php echo $kode_pegawai ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA KARYAWAN:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_pegawai">
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
              <label class="control-label col-sm-2">NOMOR HP:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nomor_hp">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JABATAN:</label>
              <div class="col-sm-3">          
                  <input type="text" name="status" class="form-control">
              </div>
            </div>
            <div class="form-group" id="gaji_pokok" >
                <label class="control-label col-sm-2">TUNJANGAN:</label>
              <div class="col-sm-2">
                <div class="checkbox">
                  <input type="checkbox" id="c_gp" style="margin-top: 0px;"><b>Gaji Pokok</b>
                </div>
                  <input autocomplete="off" name="gaji_pokok" type="text" class="form-control" value="0" id="gp" style="display: none;">
            </div>
          </div>
          <div class="form-group" id="uang_kehadiran">
            <label class="control-label col-sm-2"></label>
           <div class="col-sm-2"> 
            <div class="checkbox">
              <input type="checkbox" id="c_uk" style="margin-top: 0px;"><b>Uang Kehadiran</b>
            </div>
            <input autocomplete="off" name="uang_kehadiran" type="text" class="form-control" value="0" id="uk" style="display: none;">
          </div>
        </div>
        <div class="form-group" id="uang_makan">
          <label class="control-label col-sm-2"></label>
          <div class="col-sm-2">
            <div class="checkbox">
              <input type="checkbox" id="c_um" style="margin-top: 0px;"><b>Uang Makan</b>
            </div>
            <input autocomplete="off" name="uang_makan" type="text" class="form-control" value="0" id="um" style="display: none;">
        </div>
      </div>
      <div class="form-group" id="prosentase">
        <label class="control-label col-sm-2"></label>
       <div class="col-sm-2">
           <div class="checkbox">
              <input type="checkbox" id="c_pr" style="margin-top: 0px;"><b>Prosentase</b>
            </div>
          <div class="input-group" id="pr" style="display: none;">
            <input autocomplete="off" name="prosentase" id="prsn" type="text" class="form-control" value="0">
            <span class="input-group-addon"><i class="fa fa-percent"></i></span>
          </div>   
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