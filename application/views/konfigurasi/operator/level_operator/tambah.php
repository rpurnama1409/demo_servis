<!-- Modal -->
<div id="modal-default" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
              <?php echo form_open($tambah) ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Level Operator</h4>
      </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Level Pengguna:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="level pengguna" name="level">
                    </div>
                  </div>
                  <div class="form-group">        
                      <div class="row" style="padding-left: 12px;"><label class="control-label col-sm-2">Fasilitas:</label></div>
                      <div class="row" style="padding: 10px 30px 10px 30px;">
                      <div class="col-sm-2" style="padding: 5px;margin-left: 50px;">
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsedsE" aria-expanded="false" aria-controls="collapsedsE">
                            <input type="checkbox" disabled checked><b>DASHBOARD</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsedsE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">                     
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsedsE1" aria-expanded="false" aria-controls="collapsedsE1">
                                <input type="checkbox" name="dslt" value="Y"> Last Task
                              </label>
                            </div>
                          </div>
                          <div id="collapsedsE1" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="dsltp" value="Y">Penjualan</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="dslts" value="Y">Servis</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="dsltl" value="Y">Login</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsedsE2" aria-expanded="false" aria-controls="collapsedsE2">
                                <input type="checkbox" name="dssbm" value="Y"> Stok Barang Minim
                              </label>
                            </div>
                          </div>
                          <div id="collapsedsE2" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="dssbmr" value="Y">Reorder</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsedsE3" aria-expanded="false" aria-controls="collapsedsE3">
                                <input type="checkbox" name="dshp" value="Y"> Hutang & Piutang Jatuh Tempo
                              </label>
                            </div>
                          </div>
                          <div id="collapsedsE3" aria-expanded="false" class="collapse">
                              <div class="form-group" style="margin: 0px;">
                                <div class="checkbox">
                                  <label style="padding-left: 55px;" data-toggle="collapse" data-target="#collapsedsE31" aria-expanded="false" aria-controls="collapsedsE31">
                                    <input type="checkbox" name="dshph" value="Y"> Hutang
                                  </label>
                                </div>
                              </div>
                              <div id="collapsedsE31" aria-expanded="false" class="collapse">
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="dshphv" value="Y">View</label>
                                </div>
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="dshphb" value="Y">Bayar</label>
                                </div>
                              </div>
                              <div class="form-group" style="margin: 0px;">
                                <div class="checkbox">
                                  <label style="padding-left: 55px;" data-toggle="collapse" data-target="#collapsedsE32" aria-expanded="false" aria-controls="collapsedsE32">
                                    <input type="checkbox" name="dshpp" value="Y"> Piutang
                                  </label>
                                </div>
                              </div>
                              <div id="collapsedsE32" aria-expanded="false" class="collapse">
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="dshppv" value="Y">View</label>
                                </div>
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="dshppb" value="Y">Bayar</label>
                                </div>
                              </div>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="dspy" value="Y">Pelanggan yang berulang tahun</label>
                          </div> 
                        </div>


                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapseOneE" aria-expanded="false" aria-controls="collapseOneE">
                              <input type="checkbox" name="kon" value="Y"> <b>MENU KONFIGURASI</b>
                            </label>
                          </div>
                        </div>
                        <div id="collapseOneE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOneE1" aria-expanded="false" aria-controls="collapseOneE1">
                                <input type="checkbox" name="konkp" value="Y"> Kategori Produk
                              </label>
                            </div>
                          </div>
                          <div id="collapseOneE1" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkpt" value="Y">Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkpu" value="Y">Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkpd" value="Y">Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOneE2" aria-expanded="false" aria-controls="collapseOneE2">
                                <input type="checkbox" name="konjp" value="Y"> Jenis Produk
                              </label>
                            </div>
                          </div>
                          <div id="collapseOneE2" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konjpt" value="Y">Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konjpu" value="Y">Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konjpd" value="Y">Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOneE3" aria-expanded="false" aria-controls="collapseOneE3">
                                <input type="checkbox" name="konks" value="Y"> Kategori Sesvis
                              </label>
                            </div>
                          </div>
                          <div id="collapseOneE3" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkst" value="Y">Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konksu" value="Y">Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konksd" value="Y">Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOneE4" aria-expanded="false" aria-controls="collapseOneE4">
                                <input type="checkbox" name="konss" value="Y"> Status Servis
                              </label>
                            </div>
                          </div>
                          <div id="collapseOneE4" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konsst" value="Y">Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konssu" value="Y">Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konssd" value="Y">Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOneE5" aria-expanded="false" aria-controls="collapseOneE5">
                                <input type="checkbox" name="konkoa" value="Y"> Kode Akuntansi
                              </label>
                            </div>
                          </div>
                          <div id="collapseOneE5" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkoat" value="Y">Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkoau" value="Y">Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkoad" value="Y">Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOneE6" aria-expanded="false" aria-controls="collapseOneE6">
                                <input type="checkbox" name="konop" value="Y">Operator
                              </label>
                            </div>
                          </div>
                          <div id="collapseOneE6" aria-expanded="false" class="collapse">
                              <div class="form-group" style="margin: 0px;">
                                <div class="checkbox">
                                  <label style="padding-left: 55px;" data-toggle="collapse" data-target="#collapseOneE61" aria-expanded="false" aria-controls="collapseOneE61">
                                    <input type="checkbox" name="konopdo" value="Y">Data Operator
                                  </label>
                                </div>
                              </div>
                              <div id="collapseOneE61" aria-expanded="false" class="collapse">
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="konopdot" value="Y">Tambah</label>
                                </div>
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="konopdou" value="Y">Edit</label>
                                </div>
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="konopdod" value="Y">Delete</label>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapseTwoE" aria-expanded="false" aria-controls="collapseTwoE">
                              <input type="checkbox" name="pr" value="Y"> <b>MENU PRODUK</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapseTwoE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="prt" value="Y">Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pru" value="Y">Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="prd" value="Y">Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="prv" value="Y">View</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="prh" value="Y">Histori</label>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsetiluE" aria-expanded="false" aria-controls="collapsetiluE">
                              <input type="checkbox" name="s" value="Y"> <b>MENU SERVIS</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsetiluE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="st" value="Y">Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="su" value="Y">Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="sd" value="Y">Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="sv" value="Y">View</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="sh" value="Y">Transaksi Buka Nota</label>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapseopatE" aria-expanded="false" aria-controls="collapseopatE">
                              <input type="checkbox" name="p" value="Y"> <b>MENU PENJUALAN</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapseopatE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pt" value="Y">Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pu" value="Y">Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pd" value="Y">Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pv" value="Y">View</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="tp" value="Y">Tambah Barang</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="epd" value="Y">Edit Diskon Barang</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="dp" value="Y">Delete Barang Ditambahkan</label>
                          </div>
                        </div>                         
                      </div>
                      <div class="col-sm-2"  style="padding: 5px;margin-left: 50px;">
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapselimaE" aria-expanded="false" aria-controls="collapselimaE">
                              <input type="checkbox" name="pem" value="Y"> <b>MENU PEMBELIAN</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapselimaE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemt" value="Y">Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemu" value="Y">Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemd" value="Y">Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemv" value="Y">View</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemtb" value="Y">Tambah Barang</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemdb" value="Y">Edit Diskon Barang</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemedis" value="Y">Delete Barang Ditambahkan</label>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsegenepE" aria-expanded="false" aria-controls="collapsegenepE">
                              <input type="checkbox" name="ak" value="Y"> <b>MENU AKUNTANSI</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsegenepE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsegenepE1" aria-expanded="false" aria-controls="collapsegenepE1">
                                <input type="checkbox" name="akkake" value="Y"> Kas Keluar
                              </label>
                            </div>
                          </div>
                          <div id="collapsegenepE1" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akkaket" value="Y">Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akkakeu" value="Y">Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akkaked" value="Y">Delete</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akkakev" value="Y">View</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsegenepE2" aria-expanded="false" aria-controls="collapsegenepE2">
                                <input type="checkbox" name="akpeng" value="Y"> Penggajian
                              </label>
                            </div>
                          </div>
                          <div id="collapsegenepE2" aria-expanded="false" class="collapse">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akpengt" value="Y">Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akpengu" value="Y">Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akpengd" value="Y">Delete</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akpengv" value="Y">View</label>
                              </div>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsetujuhE" aria-expanded="false" aria-controls="collapsetujuhE">
                              <input type="checkbox" name="mem" value="Y"> <b>MENU MEMBER</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsetujuhE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsetujuhE1" aria-expanded="false" aria-controls="collapsetujuhE1">
                                <input type="checkbox" name="mempel" value="Y"> Pelanggan
                              </label>
                            </div>
                          </div> 
                          <div id="collapsetujuhE1" aria-expanded="false" class="collapse">
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempelt" value="Y">Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempelu" value="Y">Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempeld" value="Y">Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempelv" value="Y">View</label>
                          </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsetujuhE2" aria-expanded="false" aria-controls="collapsetujuhE2">
                                <input type="checkbox" name="mempeg" value="Y"> Pegawai
                              </label>
                            </div>
                          </div> 
                          <div id="collapsetujuhE2" aria-expanded="false" class="collapse">
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempegt" value="Y">Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempegu" value="Y">Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempegd" value="Y">Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempegv" value="Y">View</label>
                          </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsetujuhE3" aria-expanded="false" aria-controls="collapsetujuhE3">
                                <input type="checkbox" name="memsup" value="Y"> Supplier
                              </label>
                            </div>
                          </div> 
                          <div id="collapsetujuhE3" aria-expanded="false" class="collapse">
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="memsupt" value="Y">Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="memsupu" value="Y">Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="memsupd" value="Y">Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="memsupv" value="Y">View</label>
                          </div>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsedalapanE" aria-expanded="false" aria-controls="collapsedalapanE">
                              <input type="checkbox" name="lap" value="Y"> <b>MENU LAPORAN</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsedalapanE" aria-expanded="false" class="collapse">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="lapp" value="Y">Penjualan</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="laphis" value="Y">Servis</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="lappem" value="Y">Pembelian</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="lappro" value="Y">Produk</label>
                          </div>
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