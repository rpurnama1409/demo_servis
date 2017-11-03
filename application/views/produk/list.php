<?php 
if($this->session->flashdata('sukses')){
echo '<div class="alert alert-success" style="margin : 10px 15px 0px 15px ;">';
echo $this->session->flashdata('sukses');
echo '</div>';
}
?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
             
            <div class="<?php if ($akses['prt'] == 'Y'){ echo 'col-lg-10';}?> box-header">
                <h3 class="box-title"><?php echo $tabel ?></h3>
            </div>
            <?php if ($akses['prt'] == 'Y'): ?>
            <div class="small-box">
            <div class="col-lg-2 col-xs-3" style=" padding-top: 7px;">
                    <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i>
                     Tambah</button>
            </div>
            </div>
             <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <?php echo form_open($tambah) ?>
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Tambah Data Produk</h4>
                    </div>
                    <div class="modal-body">
                       <div class="form-horizontal">
                          <div class="form-group">
                            <label class="control-label col-sm-4">KODE ITEM:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="kode_item"  onkeyup="validasi();" id="k_item">
                              <span id="pesan" style="display:none;color: white;position: absolute;margin-top: -64px;z-index: 1;background-color:rgba(255, 2, 2, 0.7);padding: 5px 23px;border-top-left-radius: 5px;border-top-right-radius: 5px;">Kode item sudah ada</span>
                            </div>
                          </div>
                            <div class="form-group">
                            <label class="control-label col-sm-4">TIPE PRODUK:</label>
                            <div class="col-sm-5">
                              <select required oninvalid="this.setCustomValidity('Data ini masih kosong')"  oninput="setCustomValidity('')" name="tipe_item" class="form-control" id="tipe_item" >
                                <option selected disabled>Pilih tipe item--</option>
                                <option>Barang</option>
                                <option>Jasa</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">BARCODE:</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" id="barcode" name="barcode" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">KATEGORI:</label>
                            <div class="col-sm-5">
                              <select required oninvalid="this.setCustomValidity('Data ini masih kosong')"  oninput="setCustomValidity('')" name="kategori" class="form-control">
                                <option selected disabled>Pilih kategori--</option>
                                <?php foreach($kategori as $kategori){ ?>
                                <option><?php echo $kategori->nama_kategori ?></option>
                              <?php } ?> 
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">JENIS PRODUK:</label>
                            <div class="col-sm-7">
                              <select required oninvalid="this.setCustomValidity('Data ini masih kosong')"  oninput="setCustomValidity('')" name="jenis_item" class="form-control">
                                <option selected disabled>Pilih kategori--</option>
                                <?php foreach($jenis as $jenis){ ?>
                                <option><?php echo $jenis->nama_jenis ?></option>
                              <?php } ?> 
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">NAMA PRODUK:</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="nama_item" required oninvalid="this.setCustomValidity('Nama item harus di isi')"  oninput="setCustomValidity('')">
                            </div>
                          </div>
                          <div class="form-group" id="hp">
                            <label class="control-label col-sm-4">HARGA POKOK:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="harga_pokok">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA JUAL USER:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="hj_user" required oninvalid="this.setCustomValidity('Harga jual user harus di isi')"  oninput="setCustomValidity('')">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-sm-4">HARGA JUAL DEALER:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="hj_dealer" required oninvalid="this.setCustomValidity('Harga jual dealer')"  oninput="setCustomValidity('')">
                            </div>
                          </div>
                           <div class="form-group" id="sm">
                            <label class="control-label col-sm-4">STOK MINIMAL:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="stok" id="stok">
                            </div>
                          </div>
                          <div class="form-group" id="hpp" style="display: none;">
                            <label class="control-label col-sm-4">HARGA POKOK PENJUALAN:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="vhpp" name="hpp" value="5-1100" readonly>
                            </div>
                          </div>
                          <div class="form-group" id="pjual" style="display: none;">
                            <label class="control-label col-sm-4">PENDAPATAN JUAL:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="vpjual" name="pendapatan_jual" value="4-1100" readonly>
                            </div>
                          </div>
                          <div class="form-group" id="pjasa" style="display: none;">
                            <label class="control-label col-sm-4">PENDAPATAN JASA:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="vpjasa" name="pendapatan_jasa" value="4-2000" readonly>
                            </div>
                          </div>
                          <div class="form-group" id="persediaan" style="display: none;">
                            <label class="control-label col-sm-4">PERSEDIAAN:</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="vpersediaan" name="persediaan" value="1-1301" readonly>
                            </div>
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button id="cek" type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    </div>
                    <?php echo form_close(); ?> 
                    </div>
                  </div>
                  
                </div>
              </div>
              <?php endif ?>
            <br>
            
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped now" >
                    <thead class="text-primary">
                        <th>NO</th>
                        <th>KODE ITEM</th>                    
                        <th>BARCODE</th>
                        <th>NAMA BARANG</th>
                        <th>STOK</th>
                        <th>USER</th>
                        <th>DEALER</th>
                        <?php if ($akses['pru'] == 'Y' OR $akses['prv'] == 'Y' OR $akses['prh'] == 'Y' OR $akses['prd'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                    </thead>
                    <tbody>
                       <?php $i=1; foreach($field as $field){ ?>
                            <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $field->kode_item ?></td>
                            <td><?php echo $field->barcode ?></td>
                            <td><?php echo $field->nama_item ?></td>
                            <td><?php echo $field->stok ?></td>
                            <td><?php echo number_format($field->hj_user); ?></td>
                            <td><?php echo number_format($field->hj_dealer); ?></td>
                            <?php if ($akses['pru'] == 'Y' OR $akses['prv'] == 'Y' OR $akses['prh'] == 'Y' OR $akses['prd'] == 'Y'): ?>
                            <td>
                            <center>
                              <?php if ($akses['pru'] == 'Y'): ?>
                              <a data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $field->id; ?>" id="getdata" title="Edit data"><i class="fa fa-pencil"></i></a>
                              &nbsp;
                              <?php endif ?>
                              <?php if ($akses['prv'] == 'Y'): ?>
                              <a data-toggle="modal" data-target="#modal-view" data-id="<?php echo $field->id; ?>" id="getdataview" title="Detail data"><i class="fa fa-sticky-note-o"></i></a>
                              &nbsp;
                              <?php endif ?>
                              <?php if ($akses['prh'] == 'Y'): ?>
                              <?php if ($field->tipe_item != 'Jasa'): ?>
                              <a href="<?php echo base_url('produk/history/'.$field->id) ?>" title="history"><i class="fa fa-history"></i></a>
                              &nbsp;
                              <?php endif ?>
                              <?php endif ?>
                              <?php if ($akses['prd'] == 'Y'): ?>
                              <a href="<?php echo base_url('produk/hapus/'.$field->id) ?>" onclick="return confirm('apakah data akan dihapus?')" title="Hapus data"><i class="fa fa-trash"></i></a>
                              <?php endif ?>
                            </center>
                            </td>
                            <?php endif ?>
                        </tr>                   
                    <?php } ?>
                    <?php if ($akses['pru'] == 'Y'): ?>
                    <?php $this->load->view('assets/edit'); ?>
                    <?php endif ?>
                    <?php if ($akses['prv'] == 'Y'): ?>
                    <?php $this->load->view('assets/view'); ?>
                    <?php endif ?>
                    </tbody>
              </table>
            </div>
            </div>

        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>