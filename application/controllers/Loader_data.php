<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loader_data extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('umum_model');
  }

  public function index() {
      redirect('log/out');
  }


//EDIT KATEGORI PRODUK
  public function kategori_produk() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('kategori_produk',$where);
  $record = $field->row_array(); 
    ?>
    <?php echo form_open('kategori_produk/update'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Kategori Produk</h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                 <div class="form-group">
                    <label class="control-label col-sm-2">Nama Kategori:</label>
                    <div class="col-sm-3">          
                    <input type="text" class="form-control" placeholder="nama kategori" name="nama_kategori" value="<?php echo $record['nama_kategori']; ?>">
                    </div>
                </div>
          </div>
          </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php echo form_close(); ?>

    <?php
  }
//END EDIT KATEGORI PRODUK

//EDIT JENIS PRODUK
  public function jenis_produk() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('jenis_produk',$where);
  $record = $field->row_array(); 
    ?>
              <?php echo form_open('jenis_produk/update') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Jenis Produk</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Nama Jenis:</label>
                    <div class="col-sm-3">          
                      <input style="width: 100%;" type="text" class="form-control" placeholder="nama jenis" name="nama_jenis" value="<?php echo $record['nama_jenis']; ?>">
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
    <?php
  }
//END EDIT JENIS PRODUK

//EDIT KATEGORI SERVIS
  public function kategori_servis() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('kategori_servis',$where);
  $record = $field->row_array(); 
    ?>
              <?php echo form_open('kategori_servis/update') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Kategori Servis</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Nama Kategori:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="nama kategori" name="nama_kategori" value="<?php echo $record['nama_kategori']; ?>">
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
    <?php
  }
//END EDIT KATEGORI SERVIS

//EDIT STATUS SERVIS
  public function status_servis() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('status_servis',$where);
  $record = $field->row_array(); 
    ?>
              <?php echo form_open('status_servis/update') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Status Servis</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Nama Status:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="nama status" name="nama_status" value="<?php echo $record['nama_status']; ?>">
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
    <?php
  }
//END EDIT STATUS SERVIS

//EDIT KODE AKUNTANSI
  public function kode_akuntansi() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('kode_akuntansi',$where);
  $record = $field->row_array(); 
    ?>
              <?php echo form_open('kode_akuntansi/update') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Kode Akuntansi</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2">kode Akuntansi:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="kode akuntansi" name="kode" value="<?php echo $record['kode']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Nama Akuntansi:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="nama akuntansi" name="nama_akuntansi" value="<?php echo $record['nama_akuntansi']; ?>">
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
    <?php
  }
//END EDIT KODE AKUNTANSI

//EDIT DATA OPERATOR
  public function data_operator() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('data_operator',$where);
  $pegawai  = $this->umum_model->tampil('pegawai')->result();
  $level  = $this->umum_model->tampil('level_operator')->result();
  $record = $field->row_array(); 
    ?>
              <?php echo form_open('data_operator/update') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Operator</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                 <div class="form-group">
                    <label class="control-label col-sm-2">Nama Pegawai:</label>
                    <div class="col-sm-3">          
                    <select class="form-control" name="nama">
                    <option disabled>-Pilih-</option>
                    <?php foreach ($pegawai as $nama) { ?>
                    <option <?php if($record['nama'] == $nama->nama_pegawai){ echo 'selected';} ?>><?php echo $nama->nama_pegawai ?></option>
                    <?php } ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Username:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo $record['username']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Password:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="********" name="password">
                      <label class="control-label"><small>Jika Password tidak ingin diubah biarkan kosong.</small></label>
                    </div>

                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2">Level:</label>
                    <div class="col-sm-3">          
                      <select class="form-control" name="level">
                      <option disabled>-Pilih-</option>
                    <?php foreach ($level as $level) { ?>
                    <option <?php if($record['level'] == $level->level){ echo 'selected';} ?>><?php echo $level->level ?></option>
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
    <?php
  }
//END EDIT DATA OPERATOR

//EDIT LEVEL OPERATOR
  public function level_operator() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('level_operator',$where);
  $record = $field->row_array(); 
    ?>
              <?php echo form_open('level_operator/update') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Level Operator</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2">Level Pengguna:</label>
                    <div class="col-sm-3">          
                      <input type="text" class="form-control" placeholder="level pengguna" name="level" value="<?php echo $record['level']; ?>">
                    </div>
                  </div>
                  <div class="form-group">        
                      <div class="row" style="padding-left: 12px;"><label class="control-label col-sm-2">Fasilitas:</label></div>
                      <div class="row" style="padding: 10px 30px 10px 30px;">
                      <div class="col-sm-2" style="padding: 5px;margin-left: 50px;">
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapseds" aria-expanded="<?php if ($record['dslt'] == 'Y' OR $record['dssbm'] == 'Y' OR $record['dshp'] == 'Y' OR $record['dspy'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseds">
                            <input type="checkbox" disabled checked><b>DASHBOARD</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapseds" aria-expanded="<?php if ($record['dslt'] == 'Y' OR $record['dssbm'] == 'Y' OR $record['dshp'] == 'Y' OR $record['dspy'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['dslt'] == 'Y' OR $record['dssbm'] == 'Y' OR $record['dshp'] == 'Y' OR $record['dspy'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">                   
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseds1" aria-expanded="<?php if ($record['dslt'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseds1">
                                <input type="checkbox" name="dslt" value="Y" <?php if ($record['dslt'] == 'Y') {echo 'checked';} ?>> Last Task
                              </label>
                            </div>
                          </div>
                          <div id="collapseds1" aria-expanded="<?php if ($record['dslt'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['dslt'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="dsltp" value="Y" <?php if ($record['dsltp'] == 'Y') {echo 'checked';} ?>>Penjualan</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="dslts" value="Y" <?php if ($record['dslts'] == 'Y') {echo 'checked';} ?>>Servis</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="dsltl" value="Y" <?php if ($record['dsltl'] == 'Y') {echo 'checked';} ?>>Login</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseds2" aria-expanded="<?php if ($record['dssbm'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseds2">
                                <input type="checkbox" name="dssbm" value="Y" <?php if ($record['dssbm'] == 'Y') {echo 'checked';} ?>> Stok Barang Minim
                              </label>
                            </div>
                          </div>
                          <div id="collapseds2" aria-expanded="<?php if ($record['dssbm'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['dssbm'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="dssbmr" value="Y" <?php if ($record['dssbmr'] == 'Y') {echo 'checked';} ?>>Reorder</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseds3" aria-expanded="<?php if ($record['dshp'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseds3">
                                <input type="checkbox" name="dshp" value="Y" <?php if ($record['dshp'] == 'Y') {echo 'checked';} ?>> Hutang & Piutang Jatuh Tempo
                              </label>
                            </div>
                          </div>
                          <div id="collapseds3" aria-expanded="<?php if ($record['dshp'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['dshp'] == 'Y') {echo 'in';} ?>">
                              <div class="form-group" style="margin: 0px;">
                                <div class="checkbox">
                                  <label style="padding-left: 55px;" data-toggle="collapse" data-target="#collapseds31" aria-expanded="<?php if ($record['dshph'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseds31">
                                    <input type="checkbox" name="dshph" value="Y" <?php if ($record['dshph'] == 'Y') {echo 'checked';} ?>> Hutang
                                  </label>
                                </div>
                              </div>
                              <div id="collapseds31" aria-expanded="<?php if ($record['dshph'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['dshph'] == 'Y') {echo 'in';} ?>">
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="dshphv" value="Y" <?php if ($record['dshphv'] == 'Y') {echo 'checked';} ?>>View</label>
                                </div>
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="dshphb" value="Y" <?php if ($record['dshphb'] == 'Y') {echo 'checked';} ?>>Bayar</label>
                                </div>
                              </div>
                              <div class="form-group" style="margin: 0px;">
                                <div class="checkbox">
                                  <label style="padding-left: 55px;" data-toggle="collapse" data-target="#collapseds32" aria-expanded="<?php if ($record['dshpp'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseds32">
                                    <input type="checkbox" name="dshpp" value="Y" <?php if ($record['dshpp'] == 'Y') {echo 'checked';} ?>> Piutang
                                  </label>
                                </div>
                              </div>
                              <div id="collapseds32" aria-expanded="<?php if ($record['dshpp'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['dshpp'] == 'Y') {echo 'in';} ?>">
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="dshppv" value="Y" <?php if ($record['dshppv'] == 'Y') {echo 'checked';} ?>>View</label>
                                </div>
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="dshppb" value="Y" <?php if ($record['dshppb'] == 'Y') {echo 'checked';} ?>>Bayar</label>
                                </div>
                              </div>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="dspy" value="Y" <?php if ($record['dspy'] == 'Y') {echo 'checked';} ?>>Pelanggan yang berulang tahun</label>
                          </div> 
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapseOne" aria-expanded="<?php if ($record['kon'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseOne">
                              <input type="checkbox" name="kon" value="Y" <?php if ($record['kon'] == 'Y') {echo 'checked';} ?>> <b>MENU KONFIGURASI</b>
                            </label>
                          </div>
                        </div>
                        <div id="collapseOne" aria-expanded="<?php if ($record['kon'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['kon'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="<?php if ($record['konkp'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseOne1">
                                <input type="checkbox" name="konkp" value="Y" <?php if ($record['konkp'] == 'Y') {echo 'checked';} ?>> Kategori Produk
                              </label>
                            </div>
                          </div>
                          <div id="collapseOne1" aria-expanded="<?php if ($record['konkp'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['konkp'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkpt" value="Y" <?php if ($record['konkpt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkpu" value="Y" <?php if ($record['konkpu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkpd" value="Y" <?php if ($record['konkpd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="<?php if ($record['konjp'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseOne2">
                                <input type="checkbox" name="konjp" value="Y" <?php if ($record['konjp'] == 'Y') {echo 'checked';} ?>> Jenis Produk
                              </label>
                            </div>
                          </div>
                          <div id="collapseOne2" aria-expanded="<?php if ($record['konjp'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['konjp'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konjpt" value="Y" <?php if ($record['konjpt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konjpu" value="Y" <?php if ($record['konjpu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konjpd" value="Y" <?php if ($record['konjpd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="<?php if ($record['konks'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseOne3">
                                <input type="checkbox" name="konks" value="Y" <?php if ($record['konks'] == 'Y') {echo 'checked';} ?>> Kategori Sesvis
                              </label>
                            </div>
                          </div>
                          <div id="collapseOne3" aria-expanded="<?php if ($record['konks'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['konks'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkst" value="Y" <?php if ($record['konkst'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konksu" value="Y" <?php if ($record['konksu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konksd" value="Y" <?php if ($record['konksd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="<?php if ($record['konss'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseOne4">
                                <input type="checkbox" name="konss" value="Y" <?php if ($record['konss'] == 'Y') {echo 'checked';} ?>> Status Servis
                              </label>
                            </div>
                          </div>
                          <div id="collapseOne4" aria-expanded="<?php if ($record['konss'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['konss'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konsst" value="Y" <?php if ($record['konsst'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konssu" value="Y" <?php if ($record['konssu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konssd" value="Y" <?php if ($record['konssd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="<?php if ($record['konkoa'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseOne5">
                                <input type="checkbox" name="konkoa" value="Y" <?php if ($record['konkoa'] == 'Y') {echo 'checked';} ?>> Kode Akuntansi
                              </label>
                            </div>
                          </div>
                          <div id="collapseOne5" aria-expanded="<?php if ($record['konkoa'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['konkoa'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkoat" value="Y" <?php if ($record['konkoat'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkoau" value="Y" <?php if ($record['konkoau'] == 'Y') {echo 'checked';} ?>>Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="konkoad" value="Y" <?php if ($record['konkoad'] == 'Y') {echo 'checked';} ?>>Delete</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapseOne6" aria-expanded="<?php if ($record['konop'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseOne6">
                                <input type="checkbox" name="konop" value="Y" <?php if ($record['konop'] == 'Y') {echo 'checked';} ?>>Operator
                              </label>
                            </div>
                          </div>
                          <div id="collapseOne6" aria-expanded="<?php if ($record['konop'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['konop'] == 'Y') {echo 'in';} ?>">
                              <div class="form-group" style="margin: 0px;">
                                <div class="checkbox">
                                  <label style="padding-left: 55px;" data-toggle="collapse" data-target="#collapseOne61" aria-expanded="<?php if ($record['konopdo'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseOne61">
                                    <input type="checkbox" name="konopdo" value="Y" <?php if ($record['konopdo'] == 'Y') {echo 'checked';} ?>>Data Operator
                                  </label>
                                </div>
                              </div>
                              <div id="collapseOne61" aria-expanded="<?php if ($record['konopdo'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['konopdo'] == 'Y') {echo 'in';} ?>">
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="konopdot" value="Y" <?php if ($record['konopdot'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                                </div>
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="konopdou" value="Y" <?php if ($record['konopdou'] == 'Y') {echo 'checked';} ?>>Edit</label>
                                </div>
                                <div class="checkbox">
                                <label style="padding-left: 75px;"><input type="checkbox" name="konopdod" value="Y" <?php if ($record['konopdod'] == 'Y') {echo 'checked';} ?>>Delete</label>
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapseTwo" aria-expanded="<?php if ($record['pr'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseTwo">
                              <input type="checkbox" name="pr" value="Y" <?php if ($record['pr'] == 'Y') {echo 'checked';} ?>> <b>MENU PRODUK</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapseTwo" aria-expanded="<?php if ($record['pr'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['pr'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="prt" value="Y" <?php if ($record['prt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pru" value="Y" <?php if ($record['pru'] == 'Y') {echo 'checked';} ?>>Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="prd" value="Y" <?php if ($record['prd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="prv" value="Y" <?php if ($record['prv'] == 'Y') {echo 'checked';} ?>>View</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="prh" value="Y" <?php if ($record['prh'] == 'Y') {echo 'checked';} ?>>Histori</label>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsetilu" aria-expanded="<?php if ($record['s'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsetilu">
                              <input type="checkbox" name="s" value="Y" <?php if ($record['s'] == 'Y') {echo 'checked';} ?>> <b>MENU SERVIS</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsetilu" aria-expanded="<?php if ($record['s'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['s'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="st" value="Y" <?php if ($record['st'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="su" value="Y" <?php if ($record['su'] == 'Y') {echo 'checked';} ?>>Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="sd" value="Y" <?php if ($record['sd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="sv" value="Y" <?php if ($record['sv'] == 'Y') {echo 'checked';} ?>>View</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="sh" value="Y" <?php if ($record['sh'] == 'Y') {echo 'checked';} ?>>Transaksi Buka Nota</label>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapseopat" aria-expanded="<?php if ($record['p'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapseopat">
                              <input type="checkbox" name="p" value="Y" <?php if ($record['p'] == 'Y') {echo 'checked';} ?>> <b>MENU PENJUALAN</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapseopat" aria-expanded="<?php if ($record['p'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['p'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pt" value="Y" <?php if ($record['pt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pu" value="Y" <?php if ($record['pu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pd" value="Y" <?php if ($record['pd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pv" value="Y" <?php if ($record['pv'] == 'Y') {echo 'checked';} ?>>View</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="tp" value="Y" <?php if ($record['tp'] == 'Y') {echo 'checked';} ?>>Tambah Barang</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="epd" value="Y" <?php if ($record['epd'] == 'Y') {echo 'checked';} ?>>Edit Diskon Barang</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="dp" value="Y" <?php if ($record['dp'] == 'Y') {echo 'checked';} ?>>Delete Barang Ditambahkan</label>
                          </div>
                        </div>                         
                      </div>
                      <div class="col-sm-2"  style="padding: 5px;margin-left: 50px;">
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapselima" aria-expanded="<?php if ($record['pem'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapselima">
                              <input type="checkbox" name="pem" value="Y" <?php if ($record['pem'] == 'Y') {echo 'checked';} ?>> <b>MENU PEMBELIAN</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapselima" aria-expanded="<?php if ($record['pem'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['pem'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemt" value="Y" <?php if ($record['pemt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemu" value="Y" <?php if ($record['pemu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemd" value="Y" <?php if ($record['pemd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemv" value="Y" <?php if ($record['pemv'] == 'Y') {echo 'checked';} ?>>View</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemtb" value="Y" <?php if ($record['pemtb'] == 'Y') {echo 'checked';} ?>>Tambah Barang</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemdb" value="Y" <?php if ($record['pemdb'] == 'Y') {echo 'checked';} ?>>Edit Diskon Barang</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="pemedis" value="Y" <?php if ($record['pemedis'] == 'Y') {echo 'checked';} ?>>Delete Barang Ditambahkan</label>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsegenep" aria-expanded="<?php if ($record['ak'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsegenep">
                              <input type="checkbox" name="ak" value="Y" <?php if ($record['ak'] == 'Y') {echo 'checked';} ?>> <b>MENU AKUNTANSI</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsegenep" aria-expanded="<?php if ($record['ak'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['ak'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsegenep1" aria-expanded="<?php if ($record['akkake'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsegenep1">
                                <input type="checkbox" name="akkake" value="Y" <?php if ($record['akkake'] == 'Y') {echo 'checked';} ?>> Kas Keluar
                              </label>
                            </div>
                          </div>
                          <div id="collapsegenep1" aria-expanded="<?php if ($record['akkake'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['akkake'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akkaket" value="Y" <?php if ($record['akkaket'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akkakeu" value="Y" <?php if ($record['akkakeu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akkaked" value="Y" <?php if ($record['akkaked'] == 'Y') {echo 'checked';} ?>>Delete</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akkakev" value="Y" <?php if ($record['akkakev'] == 'Y') {echo 'checked';} ?>>View</label>
                              </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsegenep2" aria-expanded="<?php if ($record['akpeng'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsegenep2">
                                <input type="checkbox" name="akpeng" value="Y" <?php if ($record['akpeng'] == 'Y') {echo 'checked';} ?>> Penggajian
                              </label>
                            </div>
                          </div>
                          <div id="collapsegenep2" aria-expanded="<?php if ($record['akpeng'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['akpeng'] == 'Y') {echo 'in';} ?>">
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akpengt" value="Y" <?php if ($record['akpengt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akpengu" value="Y" <?php if ($record['akpengu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akpengd" value="Y" <?php if ($record['akpengd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                              </div>
                              <div class="checkbox">
                              <label style="padding-left: 55px;"><input type="checkbox" name="akpengv" value="Y" <?php if ($record['akpengv'] == 'Y') {echo 'checked';} ?>>View</label>
                              </div>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsetujuh" aria-expanded="<?php if ($record['mem'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsetujuh">
                              <input type="checkbox" name="mem" value="Y" <?php if ($record['mem'] == 'Y') {echo 'checked';} ?>> <b>MENU MEMBER</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsetujuh" aria-expanded="<?php if ($record['mem'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['mem'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsetujuh1" aria-expanded="<?php if ($record['mempel'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsetujuh1">
                                <input type="checkbox" name="mempel" value="Y" <?php if ($record['mempel'] == 'Y') {echo 'checked';} ?>> Pelanggan
                              </label>
                            </div>
                          </div> 
                          <div id="collapsetujuh1" aria-expanded="<?php if ($record['mempel'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['mempel'] == 'Y') {echo 'in';} ?>">
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempelt" value="Y" <?php if ($record['mempelt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempelu" value="Y" <?php if ($record['mempelu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempeld" value="Y" <?php if ($record['mempeld'] == 'Y') {echo 'checked';} ?>>Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempelv" value="Y" <?php if ($record['mempelv'] == 'Y') {echo 'checked';} ?>>View</label>
                          </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsetujuh2" aria-expanded="<?php if ($record['mempeg'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsetujuh2">
                                <input type="checkbox" name="mempeg" value="Y" <?php if ($record['mempeg'] == 'Y') {echo 'checked';} ?>> Pegawai
                              </label>
                            </div>
                          </div> 
                          <div id="collapsetujuh2" aria-expanded="<?php if ($record['mempeg'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['mempeg'] == 'Y') {echo 'in';} ?>">
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempegt" value="Y" <?php if ($record['mempegt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempegu" value="Y" <?php if ($record['mempegu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempegd" value="Y" <?php if ($record['mempegd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="mempegv" value="Y" <?php if ($record['mempegv'] == 'Y') {echo 'checked';} ?>>View</label>
                          </div>
                          </div>
                          <div class="form-group" style="margin: 0px;">
                            <div class="checkbox">
                              <label style="padding-left: 35px;" data-toggle="collapse" data-target="#collapsetujuh3" aria-expanded="<?php if ($record['memsup'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsetujuh3">
                                <input type="checkbox" name="memsup" value="Y" <?php if ($record['memsup'] == 'Y') {echo 'checked';} ?>> Supplier
                              </label>
                            </div>
                          </div> 
                          <div id="collapsetujuh3" aria-expanded="<?php if ($record['memsup'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['memsup'] == 'Y') {echo 'in';} ?>">
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="memsupt" value="Y" <?php if ($record['memsupt'] == 'Y') {echo 'checked';} ?>>Tambah</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="memsupu" value="Y" <?php if ($record['memsupu'] == 'Y') {echo 'checked';} ?>>Edit</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="memsupd" value="Y" <?php if ($record['memsupd'] == 'Y') {echo 'checked';} ?>>Delete</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 55px;"><input type="checkbox" name="memsupv" value="Y" <?php if ($record['memsupv'] == 'Y') {echo 'checked';} ?>>View</label>
                          </div>
                          </div>
                        </div>
                        <div class="form-group" style="margin: 0px;">
                          <div class="checkbox">
                            <label data-toggle="collapse" data-target="#collapsedalapan" aria-expanded="<?php if ($record['lap'] == 'Y') {echo 'true';}else{echo 'false';} ?>" aria-controls="collapsedalapan">
                              <input type="checkbox" name="lap" value="Y" <?php if ($record['lap'] == 'Y') {echo 'checked';} ?>> <b>MENU LAPORAN</b>
                            </label>
                          </div>
                        </div> 
                        <div id="collapsedalapan" aria-expanded="<?php if ($record['lap'] == 'Y') {echo 'true';}else{echo 'false';} ?>" class="collapse <?php if ($record['lap'] == 'Y') {echo 'in';} ?>">
                          <hr style="margin-top: 0px;margin-bottom: 0px;border-style: groove;">
                         <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="lapp" value="Y" <?php if ($record['lapp'] == 'Y') {echo 'checked';} ?>>Penjualan</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="laphis" value="Y" <?php if ($record['laphis'] == 'Y') {echo 'checked';} ?>>Servis</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="lappem" value="Y" <?php if ($record['lappem'] == 'Y') {echo 'checked';} ?>>Pembelian</label>
                          </div>
                          <div class="checkbox">
                          <label style="padding-left: 35px;"><input type="checkbox" name="lappro" value="Y" <?php if ($record['lappro'] == 'Y') {echo 'checked';} ?>>Produk</label>
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
        <script type="text/javascript">
        </script>
    <?php

  }
//END EDIT LEVEL OPERATOR

//REORDER
  public function reorder() {
   $supplier_barang = $this->umum_model->tampil('supplier')->result();
    $id = $this->input->post('id');
    $where = array(
      'id'=>$id
      );
    $field  = $this->umum_model->tampil_filter('pembelian',$where);
    $record = $field->row_array(); 
    ?>
    <?php echo form_open('pembelian/update'); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data Pembelian</h4>
      </div>
      <div class="modal-body">
    <div class="form-horizontal">
             <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                          <div class="form-group">
                            <label class="control-label col-sm-4">KODE PEMBELIAN:</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="kode_pembelian" value="<?php echo $record['kode_pembelian']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">NAMA SUPPLIER:</label>
                            <div class="col-sm-5">
                              <select name="nama_supplier" class="form-control">
                                <option selected disabled>Pilih supplier--</option>
                                <?php foreach($supplier_barang as $supplier){ ?>
                              <option <?php if ($record['nama_supplier'] == $supplier->nama_supplier){echo 'selected';} ?>><?php echo $supplier->nama_supplier ?></option>
                              <?php } ?> 
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">TYPE PRODUK:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="jenis_produk" required oninvalid="this.setCustomValidity('Tipe produk belum di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['tipe_produk']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">NAMA PRODUK:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama_produk" required oninvalid="this.setCustomValidity('Nama produk harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nama_produk']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">QTY:</label>
                            <div class="col-sm-2">
                              <input autocomplete="off" type="text" class="form-control" id="q" onkeyup="hitung2();" name="qty" required oninvalid="this.setCustomValidity('Qty harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['qty']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA BELI:</label>
                            <div class="col-sm-4">
                              <input autocomplete="off" type="text" class="form-control" id="h" onkeyup="hitung2();" name="harga_beli" required oninvalid="this.setCustomValidity('Harga beli harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['harga_beli']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">DISKON:</label>
                            <div class="col-sm-4">
                              <input autocomplete="off" type="text" class="form-control" id="dis" onkeyup="hitung2();" name="diskon" value="<?php echo $record['diskon']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">TOTAL:</label>
                            <div class="col-sm-4">
                              <input autocomplete="off" type="text" class="form-control" id="tot" name="total" readonly value="<?php echo $record['total']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">SALES/TEKNISI:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="sales" required oninvalid="this.setCustomValidity('Sales harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['sales']; ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      </div>
      <?php echo form_close(); ?> 
                          <!--Script penjumlahan total-->
                          <script>
              function hitung2() {
                  var qty = $("#q").val();
                  var harga = $("#h").val();
                  var diskon = $("#dis").val();
                  total = harga * qty - diskon; //a kali b
                  $("#tot").val(total);
              }
             </script>
             <!--End-->
    <?php
  }
//END REORDER

//KODE PEMBELIAN
  public function pempencarian_kode_item(){
    $where = array(
        'tipe_item' => 'Barang',
        );
    $cari = $this->umum_model->tampil_filter('produk',$where)->result();
    ?>
    <style type="text/css">.select2-container--default .select2-selection--single{height: 34px;border-bottom-right-radius: 0px;border-top-right-radius: 0px;}</style>
    <select class="form-control select2" id="barcode" onchange="isi_otomatis();" name="barcode">
    <option disabled selected>-Masukan Data Kode atau Nama-</option>
    <?php
    foreach ($cari as $cari) {
    echo '<option value="'.$cari->kode_item.'">';
    echo $cari->kode_item.' - '.$cari->nama_item;
    echo '</option>';
    }
    ?>
    </select>
    <script type="text/javascript">
      $(document).ready(function () {
    $('.select2').select2();
    })
    </script>
    <?php
  }

  public function pembarcode_kode_item(){
   ?>
    <input type="text" class="form-control" placeholder="Masukan Data Barcode" style="width: 100%;" id="barcode" onkeyup="isi_otomatis();" name="barcode">
    <?php
  }
//END KODE PEMBELIAN

//TAMBAH PENJUALAN
  //STATUS PELANGGAN
    public function pelanggan(){
    $ini = $this->input->post('value');
    $where = array('nama_pelanggan' => $ini );
    $isi = $this->umum_model->tampil_filter('pelanggan',$where)->row_array();
    ?>
    <input type="hidden" name="status" class="form-control" id="status_pelanggan" readonly value="<?php echo $isi['status']; ?>">
    <?php
    }
  //END STATUS PELANGGAN

//KODE PENJUALAN
    public function pencarian_kode_item(){
    $cari = $this->umum_model->tampil('produk')->result();
    ?>
    <style type="text/css">.select2-container--default .select2-selection--single{height: 34px;border-bottom-right-radius: 0px;border-top-right-radius: 0px;}</style>
    <select style="width: 100%" type="text" class="form-control select2" name="kode_item" id="kode_item" onchange="isi();">
    <option disabled selected>-Masukan Data Kode atau Nama-</option>
    <?php
    foreach ($cari as $cari) {
    echo '<option value="'.$cari->kode_item.'">';
    echo $cari->kode_item.' - '.$cari->nama_item;
    echo '</option>';
    }
    ?>
    </select>
    <script type="text/javascript">
      $(document).ready(function () {
    $('.select2').select2();
    })
    </script>
    <?php
    }
    
    public function barcode_kode_item(){
        ?>
        <input type="text" class="form-control" placeholder="Masukan Data Barcode" name="kode_item" id="kode_item" onkeyup="isi();">
        <?php
    }
//END KODE PENJUALAN

  //STATUS PELANGGAN
    public function kode_item(){
    $ini = $this->input->post('value');
      if ($ini != '') {
      ?>
  <div class="input-group">
    <div id="pencarpen">
    <input type="text" id="nonesearch" class="form-control" placeholder="-Disable-" disabled>
    </div>
    <div class="input-group-btn">
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="border-top-left-radius:0px;border-bottom-left-radius:0px;">
        <span name="isipen">Pilih</span>&nbsp;&nbsp;<span class="caret"></span>
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
var btn = $('[title="Pencarian"]').text(); ;
    $('[name="isipen"]').html(btn);   
    $('#pencarpen').load("<?php echo base_url('loader_data/pencarian_kode_item'); ?>");
});
$('[title="Barcode"]').click(function(){
var btn = $('[title="Barcode"]').text(); ;
    $('[name="isipen"]').html(btn);   
    $('#pencarpen').load("<?php echo base_url('loader_data/barcode_kode_item'); ?>");
});
</script>
      <?php
      }else{
      ?>
      <input type="text" name="kode_item" class="form-control" placeholder="-Nama Pelanggan kosong-" disabled>
      <?php
      }
    }
  //END STATUS PELANGGAN

  //ISI1
    public function isi1(){
      $kode = $this->input->post('value');
      $status_pel = $this->input->post('value2');      
    $kata = str_split($kode);
    if($kata[0] == '' OR $kata[0] == '-' OR $kata[0] == ' '){
    $query = $this->db->query("SELECT * FROM produk WHERE kode_item='$kode'");    
    }else{
    $query = $this->db->query("SELECT * FROM produk WHERE kode_item='$kode' OR barcode='$kode'");    
    }  
      $isi = $query->row_array();

      if ($isi != '') {
      if ($status_pel == 'Dealer') {
      $harga = $isi['hj_dealer'];  
      }elseif ($status_pel == 'User') {
      $harga = $isi['hj_user'];
      }
        ?>
        <input type="hidden" name="tipe" class="form-control" value="<?php echo $isi['tipe_item']; ?>">
        <div class="form-group label-floating">
            <label class=" ">Uraian</label>
            <input type="text" name="uraian" class="form-control" value="<?php echo $isi['nama_item']; ?>" readonly style="background-color: transparent;">
        </div>
        <div class="form-group label-floating">
            <label class=" ">Harga</label>
            <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input autocomplete="off" name="harga" type="text" class="form-control" value="<?php echo $harga; ?>" id="hargabar" style="background-color: transparent;">
            </div>
        </div>
        <?php
      }else{
        ?>
        <div class="form-group label-floating">
            <label class=" ">Uraian</label>
            <input type="text" name="uraian" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled>
        </div>
        <div class="form-group label-floating">
            <label class=" ">Harga</label>
            <input name="harga" type="text" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled>
        </div>
        <?php
      }
    }
  //END ISI1

  //ISI2
    public function isi2(){
    $kode = $this->input->post('value');
    $status_pel = $this->input->post('value2');  
    $kata = str_split($kode);
    if($kata[0] == '' OR $kata[0] == '-' OR $kata[0] == ' '){
    $query = $this->db->query("SELECT * FROM produk WHERE kode_item='$kode'");    
    }else{
    $query = $this->db->query("SELECT * FROM produk WHERE kode_item='$kode' OR barcode='$kode'");    
    }  
 
    $isi = $query->row_array();
    if ($isi != '') {
    $jumlah = $isi['stok'];
      if ($status_pel == 'Dealer') {
      $harga = $isi['hj_dealer'];  
      }elseif ($status_pel == 'User') {
      $harga = $isi['hj_user'];
      }
    ?>
      <?php if ($isi['tipe_item'] == 'Jasa') { ?>
        <div class="form-group label-floating" style="display:none;">
            <label class=" ">JUMLAH</label>
            <input name="jumlah" id="jumbar" type="number" class="form-control" value="1" readonly>
        </div>
      <?php }else{ ?>
        <?php if ($jumlah == 0 OR $jumlah <= 0) { ?>
        <div class="form-group label-floating" style="">
            <label class=" ">JUMLAH</label>
            <span class="form-control" readonly>-Stok Produk Kosong-</span>
            <input autocomplete="off" style="display:none;" name="jumlah" type="text" class="form-control" required placeholder="-Stok Habis-" oninvalid="this.setCustomValidity('Data masih kosong atau jumlah melebihi stok yang tersedia')"  oninput="setCustomValidity('')">
        </div>
        <?php }else{ ?>
        <div class="form-group label-floating" style="">
            <label class=" ">JUMLAH</label>
            <input autocomplete="off" name="jumlah" type="number" class="form-control" id="jumbar" required oninvalid="this.setCustomValidity('Data masih kosong atau jumlah melebihi stok yang tersedia')"  oninput="setCustomValidity('')" onchange="totbar();" max="<?php echo $jumlah;?>" min="1" value="<?php if($isi['tipe_item']=='Jasa'){echo'1';} ?>">
        </div>  
        <?php } ?>
      <?php } ?>
        <div class="form-group label-floating">
            <label class=" ">DISKON</label>
            <div class="input-group">
                <input autocomplete="off" name="diskon" class="form-control" placeholder="0%" id="disbar" onkeyup="totbar();" >
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                <span class="input-group-addon">Rp.</span>
                <input autocomplete="off" name="brdiskon_pr" class="form-control" onkeyup="distotbar();" id="brdiskon_pr">
                </div>
        </div>
      <?php if ($isi['tipe_item'] == 'Jasa') { ?>
        <div class="form-group label-floating">
            <label class=" ">TOTAL</label>
            <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input autocomplete="off" name="total" type="text" class="form-control" placeholder="0" id="totharbar" readonly style="background-color: transparent;" value="<?php echo $harga; ?>">
            </div> 
        </div>  
      <?php }else{ ?>
        <div class="form-group label-floating">
            <label class=" ">TOTAL</label>
            <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input name="total" type="text" class="form-control" placeholder="0" id="totharbar" readonly style="background-color: transparent;" value="<?php if($isi['tipe_item']=='Jasa'){echo $harga;} ?>">
            </div> 
        </div>  
      <?php } ?>
        <?php
      }else{
        ?>
        <div class="form-group label-floating">
            <label class=" ">JUMLAH</label>
            <input name="" type="text" class="form-control select2" placeholder="-Kode Item Tidak Diketahui-" disabled>
        </div>
        <div class="form-group label-floating">
            <label class=" ">DISKON</label>
            <input name="" type="text" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled> 
        </div>
        <div class="form-group label-floating">
            <label class=" ">TOTAL</label>
            <input name="" type="text" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled> 
        </div>
        <?php
      }
    }
  //END ISI2
//END TAMBAH PENJUALAN

//TAMBAH PRODUK PENJUALAN
  //ISI TAMBAH
    public function pencarian_kode_itemtam(){
    $cari = $this->umum_model->tampil('produk')->result();
    ?>
    <style type="text/css">.select2-container--default .select2-selection--single{height: 34px;border-bottom-right-radius: 0px;border-top-right-radius: 0px;}</style>
    <select type="text" class="form-control select2" name="kode_item" id="kodeitem" onchange="isitot();">
    <option disabled selected>-Masukan Data Kode atau Nama-</option>
    <?php
    foreach ($cari as $cari) {
    echo '<option value="'.$cari->kode_item.'">';
    echo $cari->kode_item.' - '.$cari->nama_item;
    echo '</option>';
    }
    ?>
    </select>
    <script type="text/javascript">
      $(document).ready(function () {
    $('.select2').select2();
    })
    </script>
    <?php
    }
    
    public function barcode_kode_itemtam(){
    ?>
    <input type="text" class="form-control" placeholder="Masukan Data Barcode" style="border-top-left-radius:5px;border-bottom-left-radius:5px;"  name="kode_item" id="kodeitem" onkeyup="isitot();">
    <?php
    }

    public function isitambah(){
      $kode = $this->input->post('value');
      $status_pel = $this->input->post('value2');      
    $kata = str_split($kode);
    if($kata[0] == '' OR $kata[0] == '-' OR $kata[0] == ' '){
    $query = $this->db->query("SELECT * FROM produk WHERE kode_item='$kode'");    
    }else{
    $query = $this->db->query("SELECT * FROM produk WHERE kode_item='$kode' OR barcode='$kode'");    
    } 
    $isi = $query->row_array();

      if ($isi != '') {
      if ($status_pel == 'Dealer') {
      $harga = $isi['hj_dealer'];  
      }elseif ($status_pel == 'User') {
      $harga = $isi['hj_user'];
      }
      $jumlah = $isi['stok']+1;

        ?>
        <input type="hidden" name="tipe" class="form-control" value="<?php echo $isi['tipe_item']; ?>">
        <div class="form-group label-floating">
            <label class=" ">URAIAN</label>
            <input type="text" name="uraian" class="form-control" value="<?php echo $isi['nama_item']; ?>" readonly style="background-color: transparent;">
        </div>
        <div class="form-group label-floating">
            <label class=" ">HARGA</label>
            <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input autocomplete="off" name="harga" type="text" class="form-control" value="<?php echo $harga; ?>" id="hargabar" style="background-color: transparent;">
            </div>
        </div>
      <?php if ($isi['tipe_item'] == 'Jasa') { ?>
        <div autocomplete="off" class="form-group label-floating" style="display:none;">
            <label class=" ">JUMLAH</label>
            <input name="jumlah" id="jumbar" type="number" class="form-control" value="1" readonly>
        </div>
      <?php }else{ ?>
        <?php if ($jumlah == 0 OR $jumlah <= 0) { ?>
        <div class="form-group label-floating" style="">
            <label class=" ">JUMLAH</label>
            <input autocomplete="off" name="jumlah" type="number" class="form-control" required oninvalid="this.setCustomValidity('Data masih kosong atau jumlah melebihi stok yang tersedia')"  oninput="setCustomValidity('')" placeholder="-Stok Habis-" readonly>
        </div>
        <?php }else{ ?>
        <div class="form-group label-floating" style="">
            <label class=" ">JUMLAH</label>
            <input autocomplete="off" name="jumlah" type="number" class="form-control" id="jumbar" required oninvalid="this.setCustomValidity('Data masih kosong atau jumlah melebihi stok yang tersedia')"  oninput="setCustomValidity('')"onchange="totbar();" max="<?php echo $jumlah;?>" min="1" value="<?php if($isi['tipe_item']=='Jasa'){echo'1';} ?>">
        </div>  
        <?php } ?>
      <?php } ?>
        <div class="form-group label-floating">
            <label class=" ">DISKON</label>
            <div class="input-group">
                <input autocomplete="off" name="diskon" class="form-control" placeholder="0%" id="disbar" onkeyup="totbar();">
                <span class="input-group-addon"><i class="fa fa-percent"></i></span>
            </div>
            <div class="input-group">
                <span class="input-group-addon">Rp.</span>
                <input autocomplete="off" name="brdiskon_pr" class="form-control" onkeyup="distotbar();" id="brdiskon_pr">
                </div>
        </div>
      <?php if ($isi['tipe_item'] == 'Jasa') { ?>
        <div class="form-group label-floating">
            <label class=" ">TOTAL</label>
            <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input autocomplete="off" name="total" type="text" class="form-control" placeholder="0" id="totharbar" readonly style="background-color: transparent;" value="<?php echo $harga; ?>">
            </div> 
        </div>  
      <?php }else{ ?>
        <div class="form-group label-floating">
            <label class=" ">TOTAL</label>
            <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            <input autocomplete="off" name="total" type="text" class="form-control" placeholder="0" id="totharbar" readonly style="background-color: transparent;" value="<?php if($isi['tipe_item']=='Jasa'){echo $harga;} ?>">
            </div> 
        </div>  
      <?php } ?>

        <?php
      }else{
        ?>
        <div class="form-group label-floating">
            <label class=" ">URAIAN</label>
            <input type="text" name="" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled>
        </div>
        <div class="form-group label-floating">
            <label class=" ">HARGA</label>
            <input name="" type="text" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled>
        </div>
        <div class="form-group label-floating">
            <label class=" ">JUMLAH</label>
            <input name="" type="text" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled>
        </div>
        <div class="form-group label-floating">
            <label class=" ">DISKON</label>
            <input name="" type="text" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled> 
        </div>
        <div class="form-group label-floating">
            <label class=" ">TOTAL</label>
            <input name="" type="text" class="form-control" placeholder="-Kode Item Tidak Diketahui-" disabled> 
        </div>
        <?php
      }
    }
  //END ISI TAMBAH
//END TAMBAH PRODUK PENJUALAN

//VIEW PEMBELIAN
  public function view() {
    $id = $this->input->post('id');
    $where = array(
      'id'=>$id
      );
    $field  = $this->umum_model->tampil_filter('pembelian',$where);
    $record = $field->row_array(); 
    ?>
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Data Pembelian</h4>
      </div>
      <div class="modal-body">
                        <div class="form-horizontal">
                          <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                          <div class="form-group">
                            <label class="control-label col-sm-4">KODE PEMBELIAN:</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="kode_pembelian" value="<?php echo $record['kode_pembelian']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">NAMA SUPPLIER:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama_supplier"  required oninvalid="this.setCustomValidity('Nama supplier harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nama_supplier']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">TYPE PRODUK:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="tipe_produk" required oninvalid="this.setCustomValidity('Tipe produk belum di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['tipe_produk']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">NAMA PRODUK:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama_produk" required oninvalid="this.setCustomValidity('Nama produk harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nama_produk']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">QTY:</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" id="q" onkeyup="hitung2();" name="qty" required oninvalid="this.setCustomValidity('Qty harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['qty']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA BELI:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="h" onkeyup="hitung2();" name="harga_beli" required oninvalid="this.setCustomValidity('Harga beli harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['harga_beli']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">DISKON:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="dis" onkeyup="hitung2();" name="diskon" value="<?php echo $record['diskon']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">TOTAL:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="tot" name="total" readonly value="<?php echo $record['total']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">SALES/TEKNISI:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="sales" required oninvalid="this.setCustomValidity('Sales harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['sales']; ?>" readonly>
                            </div>
                          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      </div>
    </div>
    <?php
  }
//END VIEW PEMBELIAN

//EDIT PRODUK
  public function produk_edit() {
    $kategori = $this->umum_model->tampil('kategori_produk')->result();
    $jenis = $this->umum_model->tampil('jenis_produk')->result();
    $id = $this->input->post('id');
    $where = array(
      'id'=>$id
      );
    $field  = $this->umum_model->tampil_filter('produk',$where);
    $record = $field->row_array(); 
    ?>
    <?php echo form_open('produk/update'); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data Produk</h4>
      </div>
      <div class="modal-body">
         <div class="form-horizontal">
          <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                          <div class="form-group">
                            <label class="control-label col-sm-4">KODE ITEM:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="kode_item"  onkeyup="validasi();" id="ek_item" value="<?php echo $record['kode_item']; ?>">
                              <span id="epesan" style="display:none;color: white;position: absolute;margin-top: -64px;z-index: 1;background-color:rgba(255, 2, 2, 0.7);padding: 5px 23px;border-top-left-radius: 5px;border-top-right-radius: 5px;">Kode item sudah ada</span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">TIPE PRODUK:</label>
                            <div class="col-sm-5">
                              <select disabled name="kategori" class="form-control">
                                <option <?php if($record['tipe_item']=='Barang'){echo'selected';} ?>>Barang</option>
                                <option <?php if($record['tipe_item']=='Jasa'){echo'selected';} ?>>Jasa</option>
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">BARCODE:</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="barcode" value="<?php echo $record['barcode']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">KATEGORI:</label>
                            <div class="col-sm-5">
                              <select name="kategori" class="form-control">
                                <?php foreach($kategori as $kategori){ ?>
                                <option <?php if($record['kategori']==$kategori->nama_kategori){echo'selected';} ?>><?php echo $kategori->nama_kategori ?></option>
                              <?php } ?> 
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">JENIS ITEM:</label>
                            <div class="col-sm-7">
                            <select name="jenis_item" class="form-control">
                                <?php foreach($jenis as $jenis){ ?>
                                <option <?php if($record['jenis_item']==$jenis->nama_jenis){echo'selected';} ?>><?php echo $jenis->nama_jenis ?></option>
                              <?php } ?> 
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">NAMA ITEM:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama_item" required oninvalid="this.setCustomValidity('Nama item harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nama_item']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA POKOK:</label>
                            <div class="col-sm-4">
                              <input autocomplete="off" type="text" class="form-control" name="harga_pokok" required oninvalid="this.setCustomValidity('Harga pokok harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['harga_pokok']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA JUAL USER:</label>
                            <div class="col-sm-4">
                              <input autocomplete="off" type="text" class="form-control" name="hj_user" required oninvalid="this.setCustomValidity('Harga jual user harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['hj_user']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA JUAL DEALER:</label>
                            <div class="col-sm-4">
                              <input autocomplete="off" type="text" class="form-control" name="hj_dealer" required oninvalid="this.setCustomValidity('Harga jual dealer')"  oninput="setCustomValidity('')" value="<?php echo $record['hj_dealer']; ?>">
                            </div>
                          </div>
                           <div class="form-group" id="sm" style="<?php if($record['tipe_item']=='Jasa'){echo 'display:none;';} ?>">
                            <label class="control-label col-sm-4">STOK MINIMAL:</label>
                            <div class="col-sm-4">
                              <input autocomplete="off" type="text" class="form-control" name="stok" id="stok" value="<?php echo $record['stok_minimal']; ?>">
                            </div>
                          </div>
      </div>
       <div class="modal-footer">
        <button id="ecek" type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      </div>
      <?php echo form_close(); ?> 
<script >    
    function validasi(){
    var kode_item = $("#ek_item").val();
    $.ajax({
        url: '<?php echo base_url()?>produk/validation',
        type: 'POST',
        data:"kode_item="+kode_item ,
        }).success(function (data) {
        var json = data,
        obj = JSON.parse(json);

        
        if (obj.cek != '0') {
          $('#epesan').show();
          $('#ecek').hide();
        }else{
          $('#ecek').show();
          $('#epesan').hide('');
        }
        });
        } 
</script>
    <?php
  }
//END EDIT PRODUK

//VIEW PRODUK
  public function produk_view() {
    $kategori = $this->umum_model->tampil('kategori_produk')->result();
    $id = $this->input->post('id');
    $where = array(
      'id'=>$id
      );
    $field  = $this->umum_model->tampil_filter('produk',$where);
    $record = $field->row_array(); 
    ?>
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Data Produk</h4>
      </div>
      <div class="modal-body">
       <div class="form-horizontal">
          <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                          <div class="form-group">
                            <label class="control-label col-sm-4">KODE ITEM:</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="kode_item" required oninvalid="this.setCustomValidity('Kode item harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['kode_item']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">TIPE PRODUK:</label>
                            <div class="col-sm-5">
                              <input readonly type="text" class="form-control" name="tipe_item" value="<?php echo $record['tipe_item']; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">BARCODE:</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="barcode" required oninvalid="this.setCustomValidity('Barcode harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['barcode']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">KATEGORI:</label>
                            <div class="col-sm-5">
                              <select name="kategori" class="form-control" readonly>
                                <?php foreach($kategori as $kategori){ ?>
                                <option <?php if($record['kategori']==$kategori->nama_kategori){echo'selected';} ?>><?php echo $kategori->nama_kategori ?></option>
                              <?php } ?> 
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">JENIS ITEM:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="jenis_item" required oninvalid="this.setCustomValidity('Jenis item harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['jenis_item']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">NAMA ITEM:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama_item" required oninvalid="this.setCustomValidity('Nama item harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nama_item']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA POKOK:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="harga_pokok" required oninvalid="this.setCustomValidity('Harga pokok harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['harga_pokok']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA JUAL USER:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="hj_user" required oninvalid="this.setCustomValidity('Harga jual user harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['hj_user']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA JUAL DEALER:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="hj_dealer" required oninvalid="this.setCustomValidity('Harga jual dealer')"  oninput="setCustomValidity('')" value="<?php echo $record['hj_dealer']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group" id="sm">
                            <label class="control-label col-sm-4">STOK MINIMAL:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="stok" id="stok" value="<?php echo $record['stok_minimal']; ?>" readonly>
                            </div>
                          </div>
      </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      </div>
    </div>
    <?php
  }
//END VIEW PRODUK

//EDIT DISKON BARANG
  public function edit_diskon_barang() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('penjualan',$where);
  $record = $field->row_array(); 
    ?>
    <?php echo form_open('penjualan/edit_diskon_barang'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Diskon Produk <?php echo $record['kode_item'] ?></h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
                 <input type="hidden" name="did" value="<?php echo $record['id']; ?>">
                 <input type="hidden" name="dkode_transaksi" value="<?php echo $record['kode_transaksi']; ?>">
                 <input type="hidden" id="djum_br" name="djumlah" value="<?php echo $record['jumlah']; ?>">
                 <input type="hidden" id="dhar_br" name="dharga" value="<?php echo $record['harga']; ?>">
                 <div class="form-group">
                    <label class="control-label col-sm-2">Diskon:</label>
                    <div class="col-sm-3">          
                    <div class="input-group">
                    <input autocomplete="off" type="text" id="perc_br" onkeyup="konversi_dis();" class="form-control" placeholder="0 %" name="ddiskon" value="<?php echo $record['diskon']; ?>" style="width:50px;">
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    <span class="input-group-addon">Rp.</span>
                    <input autocomplete="off" name="ddesimal" class="form-control" onkeyup="konversi_des();" id="des_br" value="<?php echo $record['diskon_des']; ?>">
                    </div>
                    </div>
                </div>
          </div>
          </div>
    </div>
    <script>
    function konversi_dis(){
    var dis = $('#perc_br').val();
    var jum = $('#djum_br').val();
    var har = $('#dhar_br').val();
    if(dis != ''){
    $('#des_br').val('');
     tot = jum * har;
     dis_br = (tot * dis) / 100;
    }
    $('#des_br').val(dis_br);
    }
    function konversi_des(){
    var dis = $('#des_br').val();
    var jum = $('#djum_br').val();
    var har = $('#dhar_br').val();
    if(dis != ''){
    $('#perc_br').val('');
     tot = jum * har;
     dis_br = (dis /tot) * 100;
    }
    $('#perc_br').val(dis_br);
    }
    </script>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php echo form_close(); ?>

    <?php
  }
//END EDIT DISKON BARANG

//EDIT DISKON BARANG
  public function edit_diskon_barang_pembelian() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('pembelian',$where);
  $record = $field->row_array(); 
    ?>
    <?php echo form_open('pembelian/edit_diskon_barang'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Diskon Produk <?php echo $record['kode_item'] ?></h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
                 <input type="hidden" name="did" value="<?php echo $record['id']; ?>">
                 <input type="hidden" name="dkode_pembelian" value="<?php echo $record['kode_pembelian']; ?>">
                 <input type="hidden" id="djum_br" name="dqty" value="<?php echo $record['qty']; ?>">
                 <input type="hidden" id="dhar_br" name="dharga" value="<?php echo $record['harga_beli']; ?>">
                 <div class="form-group">
                    <label class="control-label col-sm-2">Diskon:</label>
                    <div class="col-sm-3">          
                    <div class="input-group">
                    <input autocomplete="off" type="text" id="perc_br" onkeyup="konversi_dis();" class="form-control" placeholder="0 %" name="ddiskon" value="<?php echo $record['diskon_percen']; ?>" style="width:50px;">
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    <span class="input-group-addon">Rp.</span>
                    <input autocomplete="off" name="ddesimal" class="form-control" onkeyup="konversi_des();" id="des_br" value="<?php echo $record['diskon']; ?>">
                    </div>
                    </div>
                </div>
          </div>
          </div>
    </div>
    <script>
    function konversi_dis(){
    var dis = $('#perc_br').val();
    var jum = $('#djum_br').val();
    var har = $('#dhar_br').val();
    if(dis != ''){
    $('#des_br').val('');
     tot = jum * har;
     dis_br = (tot * dis) / 100;
    }
    $('#des_br').val(dis_br);
    }
    function konversi_des(){
    var dis = $('#des_br').val();
    var jum = $('#djum_br').val();
    var har = $('#dhar_br').val();
    if(dis != ''){
    $('#perc_br').val('');
     tot = jum * har;
     dis_br = (dis /tot) * 100;
    }
    $('#perc_br').val(dis_br);
    }
    </script>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php echo form_close(); ?>

    <?php
  }
//END EDIT DISKON BARANG

//EDIT SERVIS
  public function servis() {
    $kode = $this->input->post('id');
  $where = array(
      'kode_servis'=>$kode
      );
  $field  = $this->umum_model->tampil_filter('servis',$where);
  $pel    = $this->umum_model->tampil('pelanggan')->result();
  $kategori    = $this->umum_model->tampil('kategori_servis')->result();
  $statusservis    = $this->umum_model->tampil('status_servis')->result();
  $peg    = $this->umum_model->tampil('pegawai')->result();
  $record = $field->row_array(); 
    ?>
              <?php echo form_open('servis/update') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Servis</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                    <div class="col-lg-4"  style="margin-left: 20px;">
                        <div class="form-group label-floating">                        
                            <label class=" ">Kode Servis</label>
                            <label class="form-control"><?php echo $record['kode_servis'] ?></label>
                            <input name="kode_servis" type="hidden" value="<?php echo $record['kode_servis'] ?>">
                        </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Nama Pelanggan :</label>        
                                        <select style="background-color: transparent;" name="nama_pelanggan" class="form-control">
                                        <option disabled>-pilih-</option>
                                        <?php foreach($pel as $pel){ ?>
                                        <option value="<?php echo $pel->nama_pelanggan?>" <?php if ($record['nama_pelanggan'] == $pel->nama_pelanggan) {echo 'selected';}?>><?php echo $pel->nama_pelanggan?></option>
                                        <?php } ?>
                                        </select>
                          </div>

                          <div class="form-group label-floating">   
                                  <label class="control-label">Kategori Servis :</label>         
                                  <select  name="kategori" class="form-control">
                                  <option selected disabled>-pilih-</option>
                                  <?php foreach($kategori as $kategori){ ?>
                                  <option <?php if ($record['kategori'] == $kategori->nama_kategori) {echo 'selected';}?>><?php echo $kategori->nama_kategori?></option>
                                  <?php } ?>
                                  </select>
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Unit Servis :</label>
                            <input type="text" name="unit_servis" class="form-control" placeholder="Nama Unit"  value="<?php echo $record['unit'] ?>">            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">SNID :</label>
                            <input type="text" name="snid" class="form-control" placeholder="snid" value="<?php echo $record['snid'] ?>">            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Keluhan :</label>
                            <textarea name="keluhan" class="form-control" placeholder="keluhan"><?php echo $record['keluhan'] ?></textarea>            
                          </div>
                        </div>
                        <div class="col-lg-4"  style="margin-left: 20px;">
                            <div class="form-group label-floating">   
                            <label class="control-label">Kelengkapan :</label>
                            <textarea name="kelengkapan" class="form-control" placeholder="kelengkapan"><?php echo $record['kelengkapan'] ?></textarea>            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Status Garansi :</label>
                            <select type="text" name="status_garansi" class="form-control" id="sgr" onchange="stsgr();">
                            <option selected disabled>-pilih-</option>
                            <option <?php if ($record['status_garansi'] == 'Garansi') {echo 'selected';}?>>Garansi</option>
                            <option <?php if ($record['status_garansi'] == 'Tidak Garansi') {echo 'selected';}?>>Tidak Garansi</option>
                            </select>
                          </div>
                            <div class="form-group label-floating" id="tgr" style="<?php if($record['status_garansi']!='Garansi'){echo "display: none";} ?>">   
                               <label class="control-label">Tanggal Garansi :</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                <input type="text" class="form-control pull-right" id="datepicker3" name="batas_garansi" value="<?php echo $record['batas_garansi'];?>">
                                </div>         
                            </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Catatan Servis:</label>
                            <textarea name="catatan" class="form-control" placeholder="catatan"><?php echo $record['catatan'] ?></textarea>            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Status Servis:</label>
                                    <select  name="status_servis" class="form-control" required="" oninvalid="this.setCustomValidity('Data masih kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-pilih-</option>
                                    <?php foreach($statusservis as $statusservis){ ?>
                                    <option <?php if ($record['status_servis'] == $statusservis->nama_status) {echo 'selected';}?>><?php echo $statusservis->nama_status ?></option>
                                    <?php } ?> 
                                    </select>
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Sales / Teknisi:</label>
                                    <select  name="nama_pegawai" class="form-control" required="" oninvalid="this.setCustomValidity('Data masih kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-pilih-</option>
                                    <?php foreach($peg as $peg){ ?>
                                    <option <?php if ($record['nama_pegawai'] == $peg->nama_pegawai) {echo 'selected';}?>><?php echo $peg->nama_pegawai ?></option>
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
         <script>
          $(document).ready(function(){
             //Date picker
            $('#datepicker3').datepicker({
              autoclose: true
            });
            //Date picker
            $('#datepicker_pegawai').datepicker({
              autoclose: true
            });
          });
        </script>
    <script>
                                      function stsgr(){
                                    var stgr = $("#sgr").val();
                                  if (stgr == 'Garansi') {
                                  $("#tgr").show();  
                                  }else{
                                  $("#tgr").hide();  
                                  }
                                  };
    </script>
    <?php
  }
//END EDIT SERVIS

//VIEW SERVIS
  public function viewservis() {
    $kode = $this->input->post('id');
  $where = array(
      'kode_servis'=>$kode
      );
  $field  = $this->umum_model->tampil_filter('servis',$where);
  $pel    = $this->umum_model->tampil('pelanggan')->result();
  $kategori    = $this->umum_model->tampil('kategori_servis')->result();
  $statusservis    = $this->umum_model->tampil('status_servis')->result();
  $peg    = $this->umum_model->tampil('pegawai')->result();
  $record = $field->row_array(); 
    ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Data Servis</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                    <div class="col-lg-4"  style="margin-left: 20px;">
                        <div class="form-group label-floating">                        
                            <label class=" ">Kode Servis</label>
                            <label class="form-control"><?php echo $record['kode_servis'] ?></label>
                            <input  name="kode_servis" type="hidden" value="<?php echo $record['kode_servis'] ?>">
                        </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Nama Pelanggan :</label>        
                                        <select  disabled style="background-color: transparent;" name="nama_pelanggan" class="form-control">
                                        <option disabled>-pilih-</option>
                                        <?php foreach($pel as $pel){ ?>
                                        <option value="<?php echo $pel->nama_pelanggan?>" <?php if ($record['nama_pelanggan'] == $pel->nama_pelanggan) {echo 'selected';}?>><?php echo $pel->nama_pelanggan?></option>
                                        <?php } ?>
                                        </select>
                          </div>
                          <div class="form-group label-floating">   
                                  <label class="control-label">Kategori Servis :</label>         
                                  <select disabled style="background-color: transparent;" name="kategori" class="form-control">
                                  <option selected disabled>-pilih-</option>
                                  <?php foreach($kategori as $kategori){ ?>
                                  <option <?php if ($record['kategori'] == $kategori->nama_kategori) {echo 'selected';}?>><?php echo $kategori->nama_kategori?></option>
                                  <?php } ?>
                                  </select>
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Unit Servis :</label>
                            <input readonly style="background-color: transparent;" type="text" name="unit_servis" class="form-control" placeholder="Nama Unit"  value="<?php echo $record['unit'] ?>">            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">SNID :</label>
                            <input readonly style="background-color: transparent;" type="text" name="snid" class="form-control" placeholder="snid" value="<?php echo $record['snid'] ?>">            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Keluhan :</label>
                            <textarea readonly style="background-color: transparent;" name="keluhan" class="form-control" placeholder="keluhan"><?php echo $record['keluhan'] ?></textarea>            
                          </div>
                        </div>
                        <div class="col-lg-4"  style="margin-left: 20px;">
                            <div class="form-group label-floating">   
                            <label class="control-label">Kelengkapan :</label>
                            <textarea readonly style="background-color: transparent;" name="kelengkapan" class="form-control" placeholder="kelengkapan"><?php echo $record['kelengkapan'] ?></textarea>            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Status Garansi :</label>
                            <select disabled style="background-color: transparent;" type="text" name="status_garansi" class="form-control" placeholder="Nama Unit" id="status_garansi" onchange="statusgr();">
                            <option selected disabled>-pilih-</option>
                            <option <?php if ($record['status_garansi'] == 'Garansi') {echo 'selected';}?>>Garansi</option>
                            <option <?php if ($record['status_garansi'] == 'Tidak Garansi') {echo 'selected';}?>>Tidak Garansi</option>
                            </select>
                          </div>
                          <div id="tanggal_garansi" <?php if ($record['status_garansi'] != 'Garansi') { echo 'style="display: none;"'; } ?>>
                          <div class="form-group label-floating">   
                            <label class="control-label">Tanggal Garansi :</label>
                            <input readonly style="background-color: transparent;" type="date" name="batas_garansi" class="form-control" placeholder="Nama Unit"  value="<?php echo $record['batas_garansi'] ?>">            
                          </div>
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Catatan Servis:</label>
                            <textarea readonly style="background-color: transparent;" name="catatan" class="form-control" placeholder="catatan"><?php echo $record['catatan'] ?></textarea>            
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Status Servis:</label>
                                    <select disabled style="background-color: transparent;" name="status_servis" class="form-control" required="" oninvalid="this.setCustomValidity('Data masih kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-pilih-</option>
                                    <?php foreach($statusservis as $statusservis){ ?>
                                    <option <?php if ($record['status_servis'] == $statusservis->nama_status) {echo 'selected';}?>><?php echo $statusservis->nama_status ?></option>
                                    <?php } ?> 
                                    </select>
                          </div>
                          <div class="form-group label-floating">   
                            <label class="control-label">Sales / Teknisi:</label>
                                    <select disabled style="background-color: transparent;" name="nama_pegawai" class="form-control" required="" oninvalid="this.setCustomValidity('Data masih kosong')" oninput="setCustomValidity('')">
                                    <option selected disabled>-pilih-</option>
                                    <?php foreach($peg as $peg){ ?>
                                    <option <?php if ($record['nama_pegawai'] == $peg->nama_pegawai) {echo 'selected';}?>><?php echo $peg->nama_pegawai ?></option>
                                    <?php } ?> 
                                    </select>
                          </div>
                    </div>
              </div>
              </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php
  }
//END VIEW SERVIS

//EDIT PELANGGAN
  public function pelanggan_edit() {
  $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('pelanggan',$where);
  $record = $field->row_array(); 
    ?>
              <?php echo form_open('pelanggan/update') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Pelanggan</h4>
        </div>
              <div class="modal-body">
              <div class="container">
                <div class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-2">KODE PELANGGAN:</label>
                    <div class="col-sm-2">          
                      <input type="text" class="form-control" name="kode_plg" value="<?php echo $record['kode_plg']; ?>">
                    </div>
                  </div>
                   <div class="form-group">
              <label class="control-label col-sm-2">NAMA PELANGGAN:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_pelanggan" value="<?php echo $record['nama_pelanggan'];?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">STATUS:</label>
              <div class="col-sm-3">          
              <select name="status" class="form-control">
                <option <?php if ($record['status']=='Dealer') {echo 'selected';} ?> >Dealer</option>
                <option <?php if ($record['status']=='User') {echo 'selected';} ?> >User</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">TANGGAL LAHIR:</label>
              <div class="col-sm-2">   
               <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir" value="<?php echo date('d/m/Y',strtotime($record['tanggal_lahir']));?>">
                </div>
                <!-- /.input group -->       
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">ALAMAT:</label>
              <div class="col-sm-3">          
              <textarea name="alamat" class="form-control"><?php echo $record['alamat'];?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KOTA</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="kota" value="<?php echo $record['kota'];?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.TELP/HP</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="no_hp" value="<?php echo $record['nomor_hp'];?>">
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
        <script>
          $(document).ready(function(){
             //Date picker
            $('#datepicker').datepicker({
              autoclose: true
            })
          });
        </script>

    <?php
  }
//END PELANGGAN

//VIEW PELANGGAN
  public function pelanggan_view() {
    $id = $this->input->post('id');
    $where = array(
      'id'=>$id
      );
    $field  = $this->umum_model->tampil_filter('pelanggan',$where);
    $record = $field->row_array(); 
    ?>
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Data Pelanggan</h4>
      </div>
      <div class="modal-body">
        <div class="container">
       <div class="form-horizontal">
          <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
          <div class="form-group">
                    <label class="control-label col-sm-2">KODE PELANGGAN:</label>
                    <div class="col-sm-2">          
                      <input type="text" class="form-control" name="kode_plg" value="<?php echo $record['kode_plg']; ?>" readonly>
                    </div>
                  </div>
                   <div class="form-group">
              <label class="control-label col-sm-2">NAMA PELANGGAN:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_pelanggan" value="<?php echo $record['nama_pelanggan'];?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">STATUS:</label>
              <div class="col-sm-3">          
              <select name="status" class="form-control" readonly>
                <option <?php if ($record['status']=='Dealer') {echo 'selected';} ?> >Dealer</option>
                <option <?php if ($record['status']=='User') {echo 'selected';} ?> >User</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">TANGGAL LAHIR:</label>
              <div class="col-sm-2">          
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir" value="<?php echo date('d/m/Y',strtotime($record['tanggal_lahir']));?>" readonly>
                </div>
                <!-- /.input group -->   
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">ALAMAT:</label>
              <div class="col-sm-3">          
              <textarea name="alamat" class="form-control" readonly><?php echo $record['alamat'];?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KOTA</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="kota" value="<?php echo $record['kota'];?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.TELP/HP</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="no_hp" value="<?php echo $record['nomor_hp'];?>" readonly>
              </div>
            </div>
      </div>
    </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      </div>
    </div>
    <?php
  }
//END VIEW PELANGGAN

//EDIT DATA PEGAWAI
  public function pegawai_edit() {
    $id = $this->input->post('id');
    $where = array(
      'id'=>$id
      );
    $field  = $this->umum_model->tampil_filter('pegawai',$where);
    $record = $field->row_array(); 
    ?>
    <?php echo form_open('pegawai/update'); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Data Pegawai</h4>
      </div>
      <div class="modal-body">
        <div class="container">
    <div class="form-horizontal">
             <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
      <div class="form-group">
              <label class="control-label col-sm-2">KODE KARYAWAN:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_pegawai" value="<?php echo $record['kode_pegawai'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA KARYAWAN:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_pegawai" value="<?php echo $record['nama_pegawai'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">TANGGAL LAHIR:</label>
              <div class="col-sm-2">          
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker_pegawai" name="tgl_lahir" value="<?php echo date('d/m/Y',strtotime($record['tgl_lahir']));?>" >
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">ALAMAT:</label>
              <div class="col-sm-3">          
              <textarea name="alamat" class="form-control"><?php echo $record['alamat'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NOMOR HP:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nomor_hp" value="<?php echo $record['nomor_hp'] ?>">
              </div>
            </div>
                        <div class="form-group">
              <label class="control-label col-sm-2">JABATAN:</label>
              <div class="col-sm-3">          
                  <input type="text" name="status" class="form-control" value="<?php echo $record['status'] ?>">
              </div>
            </div>
            <div class="form-group" id="gaji_pokok" >
                <label class="control-label col-sm-2">TUNJANGAN:</label>
              <div class="col-sm-2">
                <div class="checkbox">
                  <input type="checkbox" id="c_gp" style="margin-top: 0px;" <?php if($record['gaji_pokok']!= 0 ){echo 'checked';} ?>><b>Gaji Pokok</b>
                </div>
                  <input autocomplete="off" name="gaji_pokok" type="text" class="form-control" value="<?php echo $record['gaji_pokok'] ?>" id="gp" style="<?php if($record['gaji_pokok']== 0 ){echo 'display: none;';} ?>">
            </div>
          </div>
          <div class="form-group" id="uang_kehadiran">
            <label class="control-label col-sm-2"></label>
           <div class="col-sm-2"> 
            <div class="checkbox">
              <input type="checkbox" id="c_uk" style="margin-top: 0px;" <?php if($record['uang_kehadiran']!= 0 ){echo 'checked';} ?>><b>Uang Kehadiran</b>
            </div>
            <input autocomplete="off" name="uang_kehadiran" type="text" class="form-control" value="<?php echo $record['uang_kehadiran'] ?>" id="uk" style="<?php if($record['uang_kehadiran']== 0 ){echo 'display: none;';} ?>">
          </div>
        </div>
        <div class="form-group" id="uang_makan">
          <label class="control-label col-sm-2"></label>
          <div class="col-sm-2">
            <div class="checkbox">
              <input type="checkbox" id="c_um" style="margin-top: 0px;" <?php if($record['uang_makan']!= 0 ){echo 'checked';} ?>><b>Uang Makan</b>
            </div>
            <input autocomplete="off" name="uang_makan" type="text" class="form-control" value="<?php echo $record['uang_makan'] ?>" id="um" style="<?php if($record['uang_makan']== 0 ){echo 'display: none;';} ?>">
        </div>
      </div>
      <div class="form-group" id="prosentase">
        <label class="control-label col-sm-2"></label>
       <div class="col-sm-2">
           <div class="checkbox">
              <input type="checkbox" id="c_pr" style="margin-top: 0px;" <?php if($record['prosentase']!= 0 ){echo 'checked';} ?>><b>Prosentase</b>
            </div>
          <div class="input-group" id="pr" style="<?php if($record['prosentase']== 0 ){echo 'display: none;';} ?>">
            <input autocomplete="off" name="prosentase" type="text" id="prsn" class="form-control" value="<?php echo $record['prosentase']?>">
            <span class="input-group-addon"><i class="fa fa-percent"></i></span>
          </div>   
      </div>
    </div>
  </div>
  </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      </div>
      <?php echo form_close(); ?> 

  <script>
    $(document).ready(function () {

      $("#c_gp").change(function() {
        if(this.checked) {
            $("#gp").show();
            }else{
              $("#gp").hide();
              $("#gp").val('0');
            }
        });

      $("#c_uk").change(function() {
        if(this.checked) {
            $("#uk").show();
            }else{
              $("#uk").hide();
              $("#uk").val('0');
            }
        });

        $("#c_um").change(function() {
        if(this.checked) {
            $("#um").show();
            }else{
              $("#um").hide();
              $("#um").val('0');
            }
        });

        $("#c_pr").change(function() {
        if(this.checked) {
            $("#pr").show();
            }else{
              $("#pr").hide();
              $("#prsn").val('0');
            }
        });
        
      $("#gp").click(function(){
      $("#gp").val('');
      })
      $("#uk").click(function(){
      $("#uk").val('');
      })
      $("#um").click(function(){
      $("#um").val('');
      })
      $("#prsn").click(function(){
      $("#prsn").val('');
      })
    });
  </script>
           <script>
          $(document).ready(function(){
            //Date picker
            $('#datepicker_pegawai').datepicker({
              autoclose: true
            });
          });
        </script>
    <?php
  }
// END EDIT PEGAWAI

//VIEW DATA PEGAWAI
  public function pegawai_view() {
    $id = $this->input->post('id');
    $where = array(
      'id'=>$id
      );
    $field  = $this->umum_model->tampil_filter('pegawai',$where);
    $record = $field->row_array(); 
    ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Data Pegawai</h4>
      </div>
      <div class="modal-body">
        <div class="container">
    <div class="form-horizontal">
             <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
      <div class="form-group">
              <label class="control-label col-sm-2">KODE KARYAWAN:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_pegawai" value="<?php echo $record['kode_pegawai'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA KARYAWAN:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_pegawai" value="<?php echo $record['nama_pegawai'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">TANGGAL LAHIR:</label>
              <div class="col-sm-2">          
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir" value="<?php echo date('d/m/Y',strtotime($record['tgl_lahir']));?>" readonly>
                </div>
                <!-- /.input group -->
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">ALAMAT:</label>
              <div class="col-sm-3">          
              <textarea name="alamat" class="form-control" readonly><?php echo $record['alamat'] ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NOMOR HP:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nomor_hp" value="<?php echo $record['nomor_hp'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JABATAN:</label>
              <div class="col-sm-3">          
                 <input type="text" class="form-control"  name="status" value="<?php echo $record['status'] ?>" readonly>
              </div>
            </div>  
            <div class="form-group">
                <label class="control-label col-sm-2">TUNJANGAN:</label>
          <div class="form-group" id="gaji_pokok" style="<?php if($record['gaji_pokok']== 0 ){echo 'display: none;';} ?> margin-left:0px ;">
           <div class="col-sm-2"> 
            <label class="label-floating">Gaji Pokok:</label>
              <input name="gaji_pokok" type="text" class="form-control" value="<?php echo $record['gaji_pokok'] ?>" id="gp" readonly>
          </div>
        </div>
          <div class="form-group" id="uang_kehadiran" style="<?php if($record['uang_kehadiran']== 0 ){echo 'display: none;';} ?> margin-left:-2px ;">
            <?php if ($record['gaji_pokok']!=0) { ?>
            <label class="control-label col-sm-2"></label>
            <?php } ?>
           <div class="col-sm-2"> 
            <label class="label-floating">Uang Kehadiran:</label>
            <input name="uang_kehadiran" type="text" class="form-control" value="<?php echo $record['uang_kehadiran'] ?>" id="uk" readonly>
          </div>
        </div>
        <div class="form-group" id="uang_makan" style="<?php if($record['uang_makan']== 0 ){echo 'display: none;';} ?> margin-left:-2px ;">
          <?php if ($record['gaji_pokok']!=0) { ?>
          <label class="control-label col-sm-2"></label>
          <?php } ?>
          <div class="col-sm-2">
            <label class="label-floating">Uang Makan:</label>
            <input name="uang_makan" type="text" class="form-control" value="<?php echo $record['uang_makan'] ?>" id="um" readonly>
        </div>
      </div>
      <div class="form-group" id="prosentase" style="<?php if($record['prosentase']== 0 ){echo 'display: none;';} ?> margin-left:-2px ;">
        <?php if ($record['gaji_pokok']!=0) { ?>
        <label class="control-label col-sm-2"></label>
        <?php } ?>
       <div class="col-sm-2">
        <label class="label-floating">Prosentase:</label>
          <div class="input-group" id="pr" >
            <input name="prosentase" type="text" id="prsn" class="form-control" value="<?php echo $record['prosentase']?>" readonly>
            <span class="input-group-addon"><i class="fa fa-percent"></i></span>
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
    <?php
  }
// END VIEW PEGAWAI

//EDIT DATA SUPPLIER
  public function supplier_edit() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('supplier',$where);
  $record = $field->row_array(); 
    ?>
    <?php echo form_open('supplier/update'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Supplier</h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
               <div class="form-group">
              <label class="control-label col-sm-2">KODE SUPPLIER:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_supplier" value="<?php echo $record['kode_supplier'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA SUPPLIER:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_supplier"  required oninvalid="this.setCustomValidity('Nama supplier harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nama_supplier'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KOTA/NEGARA:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control"  name="kota_negara"  required oninvalid="this.setCustomValidity('kota/negara harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['kota_negara'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.TLP/HP:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nomor_hp"  required oninvalid="this.setCustomValidity('Nomor tlp harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nomor_hp'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KONTAK PERSON:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kontak_person" value="<?php echo $record['kontak_person'] ?>">
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-2">ACC:</label>
              <div class="col-sm-3">          
              <textarea name="acc" class="form-control"><?php echo $record['acc'] ?></textarea>
              </div>
            </div> 
          </div>
          </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php echo form_close(); ?>

    <?php
  }
//END EDIT DATA SUPPLIER 

//VIEW DATA SUPPLIER
  public function supplier_view() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('supplier',$where);
  $record = $field->row_array(); 
    ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Data Supplier</h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
               <div class="form-group">
              <label class="control-label col-sm-2">KODE SUPPLIER:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_supplier" value="<?php echo $record['kode_supplier'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA SUPPLIER:</label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_supplier"  required oninvalid="this.setCustomValidity('Nama supplier harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nama_supplier'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KOTA/NEGARA:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control"  name="kota_negara"  required oninvalid="this.setCustomValidity('kota/negara harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['kota_negara'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.TLP/HP:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nomor_hp"  required oninvalid="this.setCustomValidity('Nomor tlp harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nomor_hp'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KONTAK PERSON:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kontak_person" value="<?php echo $record['kontak_person'] ?>" readonly>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-2">ACC:</label>
              <div class="col-sm-3">          
              <textarea name="acc" class="form-control" readonly><?php echo $record['acc'] ?></textarea>
              </div>
            </div> 
          </div>
          </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>

    <?php
  }
//END VIEW DATA SUPPLIER 

//EDIT KAS KELUAR
  public function kas_keluar_edit() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('kas_keluar',$where);
  $record = $field->row_array(); 
    ?>
    <?php echo form_open('kas_keluar/update'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Kas Keluar</h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
             <div class="form-group">
              <label class="control-label col-sm-2">KODE TRANSAKSI:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_transaksi" value="<?php echo $record['kode_transaksi'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KODE AKUN:</label>
              <div class="col-sm-3">          
                <select name="kode_akun" id="kode_akun" class="form-control" onchange="otomatis();">
                  <?php $kode_akun = $this->umum_model->tampil('kode_akuntansi')->result(); foreach ($kode_akun as $kode_akun) { ?>
                    <option <?php if($record['kode_akun']==$kode_akun->kode){echo 'selected';} ?> value="<?php echo $kode_akun->kode ?>"><?php echo $kode_akun->kode ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA AKUN:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control" id="nama_akun"  name="nama_akun" value="<?php echo $record['nama_akun']; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.BUKTI:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control"  name="no_bukti"  required oninvalid="this.setCustomValidity('No.Bukti harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['no_bukti']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NOMINAL:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nominal"  required oninvalid="this.setCustomValidity('Nominal harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['nominal']; ?>">
              </div>
            </div>
          </div>
          </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php echo form_close(); ?>
      <script type="text/javascript">
        function otomatis(){
        var kode_akun = $("#kode_akun").val();
        $.ajax({
        url: '<?php echo base_url()?>kas_keluar/load_akun',
        type: 'POST',
        data:"kode_akun="+kode_akun ,
        }).success(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#nama_akun').val(obj.nama);
        });
        } 
      </script>
    <?php
  }
//END EDIT DATA KAS KELUAR

//VIEW KAS KELUAR
  public function kas_keluar_view() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('kas_keluar',$where);
  $record = $field->row_array(); 
    ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Kas Keluar</h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
             <div class="form-group">
              <label class="control-label col-sm-2">KODE TRANSAKSI:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_transaksi" value="<?php echo $record['kode_transaksi'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">KODE AKUN:</label>
              <div class="col-sm-3">          
                <select name="kode_akun" id="kode_akun" class="form-control" onchange="otomatis();" disabled>
                  <?php $kode_akun = $this->umum_model->tampil('kode_akuntansi')->result(); foreach ($kode_akun as $kode_akun) { ?>
                    <option <?php if($record['kode_akun']==$kode_akun->kode){echo 'selected';} ?> value="<?php echo $kode_akun->kode ?>"><?php echo $kode_akun->kode ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA AKUN:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control" id="nama_akun"  name="nama_akun" value="<?php echo $record['nama_akun']; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NO.BUKTI:</label>
              <div class="col-sm-3">          
                <input type="text" class="form-control"  name="no_bukti"  required oninvalid="this.setCustomValidity('No.Bukti harus di isi')"  oninput="setCustomValidity('')" value="<?php echo $record['no_bukti']; ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NOMINAL:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="nominal"  required oninvalid="this.setCustomValidity('Nominal harus di isi')"  oninput="setCustomValidity('')" value="<?php echo number_format($record['nominal']); ?>" readonly>
              </div>
            </div>
          </div>
          </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php
  }
//END VIEW DATA KAS KELUAR

//EDIT PENGGAJIAN
  public function penggajian_edit() {
  $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('penggajian',$where);
  $record = $field->row_array(); 
    ?>
    <?php echo form_open('penggajian/update'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Penggajian</h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
             <div class="form-group">
              <label class="control-label col-sm-2">KODE PENGGAJIAN:</label>
              <div class="col-sm-2">          
                <input type="text" class="form-control"  name="kode_penggajian" value="<?php echo $record['kode_penggajian'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">NAMA PEGAWAI:</label>
              <div class="col-sm-3">          
              <select name="nama_pegawai" class="form-control" id="nama_pegawai" onchange="otomatis_jabatan();">
                <option selected value="<?php echo $record['nama_pegawai']; ?>"><?php echo $record['nama_pegawai']; ?></option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JUMLAH KEHADIRAN:</label>
              <div class="col-sm-1">          
                <input autocomplete="off" type="text" class="form-control"  name="jumlah_kehadiran" value="<?php echo $record['jumlah_kehadiran'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JUMLAH KETERLAMBATAN:</label>
              <div class="col-sm-1">          
                <input autocomplete="off" type="text" class="form-control"  name="jumlah_keterlambatan" value="<?php echo $record['jumlah_keterlambatan']; ?>">
              </div>
              <div class="col-sm-1" style="margin-left:-20px; margin-top: 5px;">
                X
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control"  name="denda" placeholder="Jumlah denda" style="margin-left:-80px; " value="20000">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">HUTANG/KASBON:</label>
              <div class="col-sm-2">          
                <input autocomplete="off" type="text" class="form-control"  name="kasbon" value="<?php echo $record['kasbon']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">BONUS:</label>
              <div class="col-sm-2">          
                <input autocomplete="off" type="text" class="form-control"  name="bonus" value="<?php echo $record['bonus']; ?>">
              </div>
            </div>
          </div>
          </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php echo form_close(); ?>

    <?php
  }
//END EDIT PENGGAJIAN

// DROP PENCARIAN
  public function drop_pencarian(){
    $kode   = $this->input->post('kode');
    $kata = str_split($kode);
    if($kata[0] == '' OR $kata[0] == '-' OR $kata[0] == ' '){
    $query  = $this->db->query("SELECT * FROM produk WHERE kode_item LIKE '%$kode%' OR nama_item LIKE '%$kode%'");
    }else{
    $query  = $this->db->query("SELECT * FROM produk WHERE kode_item LIKE '%$kode%' OR barcode LIKE '%$kode%' OR nama_item LIKE '%$kode%'");
    }
    $produk = $query->result();
    $cek    = $query->num_rows();
    if($kode!=''){
    ?>
    <style type="text/css">.drop_pencarian {position: absolute;z-index: 1;margin-top: -30px;border-radius: 3px;background: rgba(255, 255, 255, 0);margin-bottom: 20px;width: 100%;}.drop_body {border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;padding: 10px 68px 10px 0px;}.drop_isi {padding: 0px;background: rgba(255, 255, 255, 1);overflow-wrap: break-word;padding-right: 0px;border: 1px solid #ccc;border-top: 0px solid #ccc;max-height: 200px;overflow-y:scroll;box-shadow: 0px 2px 10px 0px rgba(0, 0, 0, 0.3);}.isi_drop {margin-bottom: 0px;padding: 0px;}.isi_drop li {list-style: none;}.isi_drop li a {display: block;text-decoration: none; color: #404040;}.isi_drop li a:hover {background-color: #3c8dbc;color:#ffffff;box-shadow: inset 0px -2px 10px 0px rgba(0, 0, 0, 0.3);}.link_drop {padding: 10px 10px 10px 15px;}.content_drop {display: inline-block;}</style>
    <div class="drop_pencarian">
        <div class="drop_body"> 
            <div class="drop_isi">
            <?php
            if ($cek>0) {
            ?>
            <ul class="isi_drop">
            <?php foreach ($produk as $produk) { ?>
            <li><a class="link_drop" id="getdatadrop" data-id="<?php echo $produk->kode_item ?>"><span class="content_drop" style="width:100px;"><?php echo $produk->kode_item ?></span><span class="content_drop" style="width:150px;"><?php echo $produk->barcode ?></span></span><span class="content_drop" style="width:200px;" ><?php echo $produk->nama_item ?></span></a></li>
            <?php } ?>
            </ul>
            <?php
            }else{
            echo "<p style='margin: 15px;'><i class='glyphicon glyphicon-info-sign'>&nbsp;Pencarian Tidak Ditemukan</i></p>";
            }
            ?>
            </div>
        </div>
    </div>
    <?php
    }
  }
//END DROP PENCARIAN

// PENCARIAN
  public function pencarian(){
    $kode   = $this->input->post('kode');
    $kata = str_split($kode);
    if($kata[0] == '' OR $kata[0] == '-' OR $kata[0] == ' '){
    $query  = $this->db->query("SELECT * FROM produk WHERE kode_item LIKE '%$kode%' OR tipe_item LIKE '%$kode%' OR jenis_item LIKE '%$kode%' OR nama_item LIKE '%$kode%' OR kategori LIKE '%$kode%' OR harga_pokok LIKE '%$kode%' OR hj_user LIKE '%$kode%' OR hj_dealer LIKE '%$kode%'");
    }else{
    $query  = $this->db->query("SELECT * FROM produk WHERE kode_item LIKE '%$kode%' OR barcode LIKE '%$kode%' OR tipe_item LIKE '%$kode%' OR jenis_item LIKE '%$kode%' OR nama_item LIKE '%$kode%' OR kategori LIKE '%$kode%' OR harga_pokok LIKE '%$kode%' OR hj_user LIKE '%$kode%' OR hj_dealer LIKE '%$kode%'");
    }
    $produk = $query->result();
    $cek    = $query->num_rows();
    if($kode!=''){
    ?>
    <div class="box box-default" id="box">
        <div class="box-header">
          <i class="glyphicon glyphicon-search"></i>
          <h3 class="box-title">Pencarian produk</h3>
        </div>
        <div class="box-body" style="padding: 0px 30px 20px 30px;"> 
            <div style="<?php if($cek == 1){echo 'height:105px;';}elseif($cek > 1){echo 'height:230px;overflow-y:scroll;';} ?> overflow-wrap: break-word;padding-right:10px;">
            <?php
            if ($cek>0) {
            ?>
            <div class="form-horizontal" >
            <table class="col-xs-6" style="width: 100%;">
            <?php foreach ($produk as $produk) { ?>
            <tr>
              <td width="30%">Kode Barang</td>
              <td> :&nbsp; </td>
              <td><?php echo $produk->kode_item ?></td>
            </tr>
            <tr>
              <td>Nama Barang</td>
              <td> :&nbsp; </td>
              <td><?php echo $produk->nama_item ?></td>
            </tr>
            <tr>
              <td>Harga User</td>
              <td> :&nbsp; </td>
              <td><?php echo number_format($produk->hj_user) ?></td>
            </tr>
            <tr>
              <td>Harga Dealer</td>
              <td> :&nbsp; </td>
              <td><?php echo number_format($produk->hj_dealer) ?></td>
            </tr>
            <tr>
              <td>Stok</td>
              <td> :&nbsp; </td>
              <td><?php echo $produk->stok ?></td>
            </tr>
            <tr style="height: 10px"></tr>
            <tr style="<?php if($cek == 1){echo '';}elseif($cek > 1){echo 'border-bottom:1px solid #cccccc;';} ?>"><td colspan="3"></td></tr>
            <tr style="height: 10px"></tr>
            <?php } ?>
            </table>
            </div>
            <?php
            }else{
            echo "<p><i class='glyphicon glyphicon-info-sign'>&nbsp;Pencarian Tidak Ditemukan</i></p>";
            }
            ?>
            </div>
        </div>
    </div>
    <?php
    }
  }
//END PENCARIAN

//DATA PIUTANG
 public function piutang_view() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('hutang',$where);
  $record = $field->row_array(); 
    ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Data Piutang</h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
             <div class="form-group">
              <label class="control-label col-sm-2">KODE TRANSAKSI:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_transaksi" value="<?php echo $record['kode_transaksi'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2"><?php if($record['jenis']=='piutang'){echo "NAMA PELANGGAN:";}else{ echo "NAMA SUPPLIER:";}?></label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_pelanggan" value="<?php echo $record['nama'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">TANGGAL TRANSAKSI:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="tgl_transaksi" value="<?php echo $record['tgl_transaksi'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">TANGGAL JATUH TEMPO:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="tgl_jatuh_tempo" value="<?php echo $record['tgl_jatuh_tempo'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JUMLAH:</label>
              <div class="col-sm-2">          
              <input autocomplete="off" type="text" class="form-control"  name="jumlah_hutang" value="<?php echo number_format($record['jumlah_hutang']); ?>" readonly>
              </div>
            </div>
          </div>
          </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php
  }
//END VIEW DATA PIUTANG

public function piutang_bayar() {
    $id = $this->input->post('id');
  $where = array(
      'id'=>$id
      );
  $field  = $this->umum_model->tampil_filter('hutang',$where);
  $record = $field->row_array(); 
    ?>
          <?php echo form_open('piutang/bayar'); ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pembayaran</h4>
        </div>
        <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
             <div class="form-group">
              <label class="control-label col-sm-2">KODE TRANSAKSI:</label>
              <div class="col-sm-2">          
              <input type="text" class="form-control"  name="kode_transaksi" value="<?php echo $record['kode_transaksi'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2"><?php if($record['jenis']=='piutang'){echo "NAMA PELANGGAN:";}else{ echo "NAMA SUPPLIER:";}?></label>
              <div class="col-sm-3">          
              <input type="text" class="form-control"  name="nama_pelanggan" value="<?php echo $record['nama'] ?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">JUMLAH BAYAR:</label>
              <div class="col-sm-2">          
              <input autocomplete="off" type="text" class="form-control"  name="jml_bayar" id="jml_bayar" onkeyup="hitung_sisa();">
              <input type="hidden" name="sisa_hutang" id="sisa"  value="<?php echo $record['jumlah_hutang'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2"><?php if($record['jenis']=='piutang'){echo "SISA PIUTANG:";}else{ echo "SISA HUTANG:";}?></label>
              <div class="col-sm-2">          
              <input autocomplete="off" type="text" class="form-control"  name="sisa" id="sisa2" readonly value="<?php echo $record['jumlah_hutang'] ?>" >
              </div>
            </div>
    </div>
  </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
    </div>
    <?php echo form_close(); ?>
    <!--Script penjumlahan total-->
      <script>
        $(document).ready(function(){
          $('#modal-edit').on('shown.bs.modal', function () {
            $('#jml_bayar').focus();
          })  
        });
        function hitung_sisa() {
          var jml_bayar = $("#jml_bayar").val();
          var sisa_hutang = $("#sisa").val();
          sisa = sisa_hutang - jml_bayar; 
          $("#sisa2").val(sisa);
        }
      </script>
    <!--End-->
    <?php
  }



//FILTER
 public function laporan_filter_produk(){
  $value = $this->input->post('value');
  if ($value == 'tipe_item') {
  ?>
  <select name="kontak" class="form-control select2" multiple data-placeholder="Value" style="width: 100%">
  <option value="none">All</option>
  <option >Barang</option>
  <option >Jasa</option>
  </select>
  <?php
  }else{
  $query = $this->db->query("SELECT produk.".$value." FROM produk GROUP BY ".$value."");
  $valiu = $query->result();
  $i = 0;
  ?>
  <select name="kontak" class="form-control select2" multiple data-placeholder="Value" style="width: 100%">
  <option value="none">All</option>
  <?php foreach ($valiu as $valiu) { 
  $valiu2 = $query->row_array($i); ?>
  <option><?php echo $valiu2[$value] ?></option>
  
  <?php $i++; } ?>
  </select>
  <?php
  }
 }
//END FILTER

//VIEW LAPORAN PEMBELIAN
  public function lap_pembelian_view() {
    $id = $this->input->post('id');
    $where = array(
      'kode_pembelian'=>$id
      );
    $field  = $this->umum_model->tampil_filter('pembelian_total',$where)->row_array();
    $field2 = $this->umum_model->tampil_filter('pembelian',$where)->result();
    ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Data Pembelian</h4>
        </div>
        <div class="modal-body">
                    <section class="content">
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                </div>
                </div>   
                    <div class="row" style="margin: auto;">
                        <div class="col-md-1"></div>
                        
                        <div class="col-md-4">
                        <table border="0">
                        <tr>
                        <td style="padding-bottom: 5px;">Nomor Pembelian</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['kode_pembelian'] ?></b></td>
                        <br>
                        </tr>
                        <tr>
                        <td style="padding-bottom: 5px;">Nama Supplier</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['nama_supplier'] ?></b></td>
                        </tr>
                        </table>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                        <table border="0">
                        <tr>
                        <td style="padding-bottom: 5px;">Tanggal Pembelian</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php $date=date_create($field['tanggal_pembelian']);echo date_format($date,"d-m-Y"); ?></b></td>
                        </tr>
                        <tr>
                        <td style="padding-bottom: 5px;">Nama Pegawai</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['sales'] ?></b></td>
                        <br>
                        </tr>
                        <tr>
                        <td style="padding-bottom: 5px;">Operator</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['op'] ?></b></td>
                        
                        </tr>
                        </table>
                        
                        </div>
                        <div class="col-md-1"></div>
                        
                    </div>
                </div>
                <br>
                <div class="box-body" >
                    <div class="table-responsive">
                        <table id="dataTables-example" class="table table-bordered table-striped now" >
                        <thead class="text-primary">
                        <th>NO</th>
                        <th>KODE PRODUK</th>
                        <th>NAMA PRODUK</th>
                        <th>JUMLAH</th>
                        <th>HARGA</th>
                        <th>DISKON</th>
                        <th>Total</th>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($field2 as $field2){ ?>
                        <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $field2->kode_item ?></td>
                        <td><?php echo $field2->nama_produk ?></td>
                        <td><?php echo $field2->qty ?></td>
                        <td><?php echo 'Rp. '.number_format($field2->harga_beli) ?></td>
                        <td><?php echo 'Rp. '.number_format($field2->diskon) ?></td>
                        <td><?php echo 'Rp. '.number_format($field2->total) ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box">
                    <div class="row" style="padding: 10px">
                        <div class="col-lg-7">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Total Harga</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input class="form-control" name="total_akhir" value="<?php echo $field['total'] ?>" readonly id="d"></div>
                                    </div>
                            </div>
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Tunai / DP</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="cash" type="text" class="form-control" onkeyup="bayar();" id="e" value="<?php echo $field['cash'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="kredit" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Kredit</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="kredit" type="text" class="form-control" readonly id="kr" value="<?php echo $field['kredit'] ?>"></div>
                                </div>
                            </div>
                            </div>
                            <div id="kembalian" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Kembalian</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="kembalian" type="text" class="form-control" readonly id="f" value="<?php echo $field['kembalian'] ?>">
                                    </div>
                                </div>
                            </div>
                            </div>                                 
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-lg-12">
                                <span>Catatan</span>
                                <textarea name="catatan" type="text" class="form-control" id="g" readonly><?php echo $field['catatan'] ?></textarea>
                                </div>
                            </div>
                            <div id="jkredit" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Jatuh Tempo</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                         <i class="fa fa-calendar"></i>
                                      </div>
                                      <input name="jatuh_tempo" type="text" id="datepicker" class="form-control" value="<?php echo date('d/m/Y',strtotime($field['jatuh_tempo'])) ?>" readonly>
                                      </div>                                     
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"  style="padding: 10px 20px 20px 10px;">
                    <div class="col-md-12">
                    </div>
                    </div>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
            </div>
      </div>

    <script type="text/javascript">
      $(document).ready(function () {
      <?php if ($field['kredit'] >0 ) { ?>
        $("#kredit").show();
        $("#jkredit").show();
      <?php }else{ ?>
        $("#kembalian").show();
      <?php } ?>
      });
    </script>
    <?php
  }
//END VIEW LAPORAN PEMBELIAN
 public function edit_retur(){
  $id = $this->input->post('id');
  $where = array(
      'id_retur' => $id,
      );
  $field  = $this->db->query("SELECT * FROM barang_retur INNER JOIN produk ON produk.id=barang_retur.id_produk WHERE id_retur ='$id' ");
  $record = $field->row_array();
    ?>
        <?php echo form_open('retur/proses') ?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Retur Barang</h4>
        </div>
        <div class="modal-body">
           <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-4">KODE RETUR:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="kode_retur" value="<?php echo $record['kode_retur'] ?>" readonly>
                  <input type="hidden" name="id_retur" value="<?php echo $record['id_retur'] ?>">
                </div>
              </div>
          </div>
          <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-4">KODE PRODUK:</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="kode_produk" value="<?php echo $record['kode_item'] ?>" readonly>
                  <input type="hidden" name="id_produk" value="<?php echo $record['id'] ?>">
                </div>
              </div>
          </div>
          <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-4">NAMA PRODUK:</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_produk" value="<?php echo $record['nama_item'] ?>" readonly>
                </div>
              </div>
          </div>
          <div class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-4">PROSES RETUR:</label>
                <div class="col-sm-4">
                  <select name="proses" class="form-control" id="proses">
                    <option disabled selected>--</option>
                    <option>Tukar barang</option>
                    <option>Kembali uang</option>
                  </select>
                </div>
              </div>
          </div>
          <div class="form-horizontal" id="qty_retur" style="display: none;">
              <div class="form-group">
                <label class="control-label col-sm-4">QTY:</label>
                <div class="col-sm-2">
                  <input type="text" name="qty" class="form-control" value="<?php echo $record['qty'] ?>" readonly>
                </div>
              </div>
          </div>
          <div class="form-horizontal" id="retur" style="display: none;">
              <div class="form-group">
                <label class="control-label col-sm-4">KEMBALI STOK:</label>
                <div class="col-sm-2">
                  <input type="number" name="kembali_stok" class="form-control" id="kembali_stok" max="<?php echo $record['qty'] ?>" min="0">
                </div>
              </div>
          </div
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        </div>                    
      <?php echo form_close() ?>
      <script>
        $(document).ready(function(){
          $("#proses").change(function(){
          if ($("#proses").val()=='Tukar barang'){
               $("#qty_retur").show();
               $("#retur").show();
             }
          if ($("#proses").val()=='Kembali uang'){
               $("#qty_retur").hide();
               $("#retur").hide();
               $("#kembali_stok").val('');
             }
          })
        });
      </script>  
  <?php 

  }

}

