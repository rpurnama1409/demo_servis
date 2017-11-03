<div id="stack1" class="modal fade" data-focus-on="input:first" style="display: none;">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Transaksi Penjualan</h4>
      </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                    <div class="col-lg-4"  style="margin-left: 20px;">
                        <div class="form-group label-floating">                        
                            <label class=" ">Kode Transaksi</label>
                            <label class="form-control"><?php echo $kode ?></label>
                            <input name="kode_transaksi" type="hidden" value="<?php echo $kode ?>">
                        </div>
                        <div class="form-group label-floating">
                            <label class="">Nama Pelanggan</label>
                            <div class="input-group">
                                <select  name="nama_pelanggan" class="form-control" id="nama_pelanggan" onchange="nama();">
                                <option selected disabled></option>
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
                        <div id="status">
                        <input type="hidden" name="status">
                        </div>
                        <div class="form-group label-floating">
                            <label class=" ">Kode Item</label>
                            <div id="tkode_item">
                                <input type="text" name="kode_item" class="form-control" placeholder="-Nama Pelanggan kosong-" disabled>
                            </div>
                        </div>
                        <div id="isi1">
                            <div class="form-group label-floating">
                                <label class=" ">Uraian</label>
                                <input type="text" name="nama_item" class="form-control" placeholder="-Kode item kosong-" disabled>
                            </div>
                            <div class="form-group label-floating">
                                <label class=" ">Harga</label>
                                <input name="harga" type="text" class="form-control" placeholder="-Kode item kosong-" disabled>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-4" style="margin-left: 20px;">
                        <div id="isi2">
                            <div class="form-group label-floating">
                                <label class=" ">Jumlah</label>
                                <input name="" type="text" class="form-control" placeholder="-Kode item kosong-" disabled>
                            </div>
                            <div class="form-group label-floating">
                                <label class=" ">Diskon</label>
                                <input name="" type="text" class="form-control" placeholder="-Kode item kosong-" disabled> 
                            </div>
                            <div class="form-group label-floating">
                                <label class=" ">Total</label>
                                <input name="" type="text" class="form-control" placeholder="-Kode item kosong-" disabled> 
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <label class=" ">Sales / Teknisi</label>
                            <select  name="nama_pegawai" class="form-control">
                            <option selected disabled></option>
                            <option>-</option>
                            <?php foreach($peg as $peg){ ?>
                            <option><?php echo $peg->nama_pegawai ?></option>
                            <?php } ?> 
                            </select>
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

<?php $this->load->view('assets/tambah_pelanggan')?>