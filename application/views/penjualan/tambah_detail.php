<div class="col-md-3">
  <div class="box" style="padding: 15px;">
    <div class="box-header" data-background-color="green" style="padding: 10px 5px 2px 10px;">
      <h4 class="title">Tambah Data</h4>
    </div>
    <div class="box-body">
      <?php echo form_open($simpan) ?>
        <div class="row">
          <div class="col-md-12">
							<input name="kode_transaksi" type="hidden" value="<?php echo $where ?>">
							<input type="hidden" value="<?php echo $field['status'] ?>" id="statuspelanggan">
              <input type="hidden" value="<?php echo $field['nama_pegawai'] ?>" name="nama_pegawai">
              <input type="hidden" value="<?php echo $field['tanggal'] ?>" name="tanggal">
						<div class="form-group label-floating">
							<label class="control-label">Kode Produk</label>
                            <div class="input-group" style="width: 90%">
                              <div id="pencarian">
                              <input type="text" id="nonesearch" class="form-control" placeholder="-Disable-" disabled>
                              </div>
                              <div class="input-group-btn">
                              <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="border-top-left-radius:0px;border-bottom-left-radius:0px;">
                                  <span name="isi">Pilih</span>&nbsp;&nbsp;<span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a title="Pencarian">Pencarian</a></li>
                                  <li><a title="Barcode">Barcode</a></li>
                                </ul>
                              </div>
                              </div>
                            </div>
                          <script>
                          $('[title="Pencarian"]').click(function(){
                          var btn = "P"; ;
                              $('[name="isi"]').html(btn);   
                              $('#pencarian').load("<?php echo base_url('loader_data/pencarian_kode_itemtam'); ?>");
                          });
                          $('[title="Barcode"]').click(function(){
                          var btn = "B"; ;
                              $('[name="isi"]').html(btn);   
                              $('#pencarian').load("<?php echo base_url('loader_data/barcode_kode_itemtam'); ?>");
                          });
                          </script>
                        </div>
                        <span id="isitam">
  						<div class="form-group label-floating">
    						<label class="control-label">Uraian</label>
    						<input name="banyak" type="text" class="form-control" placeholder="-Kode item kosong-" disabled>
  						</div>
  						<div class="form-group label-floating">
  							<label class="control-label">Harga</label>
  							<input name="harga" type="text" class="form-control" placeholder="-Kode item kosong-" disabled>
  						</div>
  						<div class="form-group label-floating">
  							<label class="control-label">Jumlah</label>
                <input name="jumlah" class="form-control" placeholder="-Kode item kosong-" disabled>
  						</div>
  						<div class="form-group label-floating">
  							<label class="control-label">Diskon</label>
  							<input name="diskon" type="text" class="form-control" placeholder="-Kode item kosong-" disabled>
  						</div>
              <div class="form-group label-floating">
                <label class="control-label">Total</label>
                <input name="total" type="text" class="form-control" placeholder="-Kode item kosong-" disabled>
              </div>
            </span>
          </div>
        </div>
        <button type="submit" class="btn btn-success pull-right">Tambah</button>
        <div class="clearfix"></div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>