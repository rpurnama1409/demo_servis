<div id="stack1" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Servis</h4>
      </div>
              <div class="modal-body">
              <div class="container">
                    <div class="col-lg-4"  style="margin-left: 20px;">
                        <div class="form-group label-floating">                        
                            <label class=" ">Kode Servis</label>
                            <label class="form-control"><?php echo $kode ?></label>
                            <input name="kode_servis" type="hidden" value="<?php echo $kode ?>">
                        </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Nama Pelanggan :</label>        
                                    <div class="input-group">
                                        <select  name="nama_pelanggan" class="form-control">
                                        <option selected disabled>-pilih-</option>
                                        <?php foreach($pel as $pel){ ?>
                                        <option value="<?php echo $pel->nama_pelanggan?>"><?php echo $pel->nama_pelanggan?></option>
                                        <?php } ?>
                                        </select>
                                    <div class="input-group-btn">
                              <a data-toggle="modal" href="#stack2" class="btn btn-default" title="Tambah Pelanggan">
                                <i class="fa fa-user"></i><small><i class="fa fa-plus"></i></small>
                              </a>
                                    </div>
                                    </div>
                          </div>
                          <div class="form-group label-floating">   
                                        <label class="control-label">Kategori Servis :</label>         
                                        <select  name="kategori" class="form-control">
                                        <option selected disabled>-pilih-</option>
                                        <?php foreach($kategori as $kategori){ ?>
                                        <option><?php echo $kategori->nama_kategori?></option>
                                        <?php } ?>
                                        </select>
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Unit Servis :</label>
                            <input type="text" name="unit_servis" class="form-control" placeholder="Nama Unit">            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">SNID :</label>
                            <input type="text" name="snid" class="form-control" placeholder="Nomor SNID">            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Keluhan :</label>
                            <textarea name="keluhan" class="form-control" placeholder="keluhan"></textarea>            
                          </div>
                        </div>
                        <div class="col-lg-4"  style="margin-left: 20px;">
                            <div class="form-group label-floating">   
                            <label class="control-label">Kelengkapan :</label>
                            <textarea name="kelengkapan" class="form-control" placeholder="kelengkapan"></textarea>            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Status Garansi :</label>
                            <select type="text" name="status_garansi" class="form-control" placeholder="Nama Unit" id="status_garansi" onchange="statusgr();">
                            <option selected disabled>-pilih-</option>
                            <option>Garansi</option>
                            <option>Tidak Garansi</option>
                            </select>
                          </div>
                              <script type="text/javascript">
                                  function statusgr(){
                                    var statgr = $("#status_garansi").val();
                                  if (statgr == 'Garansi') {
                                  $("#tanggal_garansi").show();  
                                  }else{
                                  $("#tanggal_garansi").hide();  
                                  }
                                  };
                              </script>
                          <div id="tanggal_garansi" style="display: none;">
                          <div class="form-group label-floating">   
                            <label class="control-label">Tanggal Garansi :</label>
                               <div class="input-group date">
                                  <div class="input-group-addon">
                                     <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker" name="batas_garansi" >
                                  </div>         
                          </div>
                          </div>
                           <div class="form-group label-floating">   
                            <label class="control-label">Catatan Servis:</label>
                            <textarea name="catatan" class="form-control" placeholder="catatan"></textarea>            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Status Servis:</label>
                                    <select  name="status_servis" class="form-control" required="" oninvalid="this.setCustomValidity('Data masih kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-pilih-</option>
                                    <?php foreach($statusservis as $statusservis){ ?>
                                    <option><?php echo $statusservis->nama_status ?></option>
                                    <?php } ?> 
                                    </select>
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Sales / Teknisi:</label>
                                    <select  name="nama_pegawai" class="form-control">
                                    <option selected disabled>-pilih-</option>
                                    <?php foreach($peg as $peg){ ?>
                                    <option><?php echo $peg->nama_pegawai ?></option>
                                    <?php } ?> 
                                    </select>
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

<?php $this->load->view('assets/tambah_pelanggan')?>


