<div id="stack1" class="modal fade" data-focus-on="input:first" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open($tambah) ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Retur Barang</h4>
        </div>
        <div class="modal-body">
           <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-4">KODE RETUR:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="kode_retur" value="<?php echo $kode_retur ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">KODE PRODUK:</label>
                  <div class="col-sm-5">
                  <div class="input-group">
                    <div id="pencarian" style="width:220px;">
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
                  </div>
                <script>
                $('[title="Pencarian"]').click(function(){
                var btn = $('[title="Pencarian"]').text(); ;
                    $('[name="isi"]').html(btn);   
                    $('#pencarian').load("<?php echo base_url('loader_data/pempencarian_kode_item'); ?>");
                });
                $('[title="Barcode"]').click(function(){
                var btn = $('[title="Barcode"]').text(); ;
                    $('[name="isi"]').html(btn);   
                    $('#pencarian').load("<?php echo base_url('loader_data/pembarcode_kode_item'); ?>");
                });
                </script>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">NAMA PRODUK:</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="nama_produk" name="nama_produk" required oninvalid="this.setCustomValidity('Nama produk harus di isi')"  oninput="setCustomValidity('')" readonly placeholder="Isi kode produk terlebih dahulu">
                  <input type="hidden" id="id_produk" name="id_produk">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">NAMA SUPPLIER:</label>
                <div class="col-sm-5">
                  <select name="id_supplier" class="form-control">
                    <option selected disabled>Pilih supplier--</option>
                    <?php foreach($supplier as $supplier){ ?>
                  <option value="<?php echo $supplier->id ?>"><?php echo $supplier->nama_supplier ?></option>
                  <?php } ?> 
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">QTY:</label>
                <div class="col-sm-2">
                  <input autocomplete="off" type="text" class="form-control" id="qty" onkeyup="tothitng();" name="qty" required oninvalid="this.setCustomValidity('Qty harus di isi')"  oninput="setCustomValidity('')">
                </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-4">TANGGAL RETUR:</label>
               <div class="col-sm-4">          
               <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal">
                </div>
                <!-- /.input group -->
            </div>
            </div>
              <div class="form-group">
                <label class="control-label col-sm-4">SALES/TEKNISI:</label>
                <div class="col-sm-7">
                  <select name="sales" class="form-control">
                    <option selected disabled>Pilih sales/teknisi--</option>
                    <?php foreach($sales as $sales){ ?>
                  <option><?php echo $sales->nama_pegawai ?></option>
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
