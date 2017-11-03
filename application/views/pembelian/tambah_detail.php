<div class="col-md-3">
  <div class="box" style="padding: 15px;">
    <div class="box-header" data-background-color="green" style="padding: 10px 5px 2px 10px;">
      <h4 class="title">Tambah Data</h4>
    </div>
    <div class="box-body">
      <?php echo form_open($simpan) ?>
        <div class="row">
          <div class="col-md-12">
							<input name="kode_pembelian" type="hidden" value="<?php echo $where ?>">
              <input type="hidden" value="<?php echo $field['nama_supplier'] ?>" name="nama_supplier">
              <input type="hidden" value="<?php echo $field['sales'] ?>" name="sales">
              <input type="hidden" value="<?php echo $field['tanggal_pembelian'] ?>" name="tanggal">
              <input type="hidden" value="<?php echo $field['op'] ?>" name="op">
              <div class="form-group">
                <label class="control-label">KODE PRODUK:</label>
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
                var btn = "P";
                    $('[name="isi"]').html(btn);   
                    $('#pencarian').load("<?php echo base_url('loader_data/pempencarian_kode_item'); ?>");
                });
                $('[title="Barcode"]').click(function(){
                var btn = "B" ;
                    $('[name="isi"]').html(btn);   
                    $('#pencarian').load("<?php echo base_url('loader_data/pembarcode_kode_item'); ?>");
                });
          </script>
          </div>
              <div class="form-group">
                <label class="control-label">NAMA PRODUK:</label>
                  <input type="text" class="form-control" id="nama_produk" name="nama_produk" required oninvalid="this.setCustomValidity('Nama produk harus di isi')"  oninput="setCustomValidity('')" readonly placeholder="Isi kode produk terlebih dahulu">
              </div>
              <div class="form-group">
                <label class="control-label">QTY:</label>
                  <input autocomplete="off" type="text" class="form-control" id="qty" onkeyup="tothitng();" name="qty" required oninvalid="this.setCustomValidity('Qty harus di isi')"  oninput="setCustomValidity('')">
              </div>
              <div class="form-group">
                <label class="control-label">HARGA BELI:</label>
                <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input autocomplete="off" type="text" class="form-control" id="harga" onkeyup="tothitng();" name="harga_beli" required oninvalid="this.setCustomValidity('Harga beli harus di isi')"  oninput="setCustomValidity('')">
                </div>  
              </div>
        <div class="form-group label-floating">
            <label class=" ">DISKON</label>
            <div class="input-group">
                <input autocomplete="off" name="diskon_percen" id="disper" class="form-control" placeholder="0%" onkeyup="htgdis();">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
            </div>
            <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input autocomplete="off" type="text" class="form-control" id="diskon" onkeyup="hitung();" name="diskon" >
                </div>
        </div>
              <div class="form-group">
                <label class="control-label">TOTAL:</label>
                <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input type="text" class="form-control" id="total" name="total" readonly>
                </div>
              </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success pull-right">Tambah</button>
        <div class="clearfix"></div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>