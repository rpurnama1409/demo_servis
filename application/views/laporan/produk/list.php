<section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Filter Berdasarkan</h3>
                <hr style="margin-top: 0px;margin-bottom: 0px;">
            </div>
            <div class="box-body" >
            <?php echo form_open($filter) ?>
                  <div class="container">
                  <div class="form-group">
                    <div class="col-xs-12">
                     <div class="checkbox">
                        <input type="checkbox" name="all" value="semua" id="all">All
                     </div>
                     <div class="col-sm-2" style="padding-left: 0px; ">
                     </div> 
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-xs-12">
                     <div class="checkbox">
                        <input type="checkbox" name="tp" value="tipe_item" id="tipe">Tipe Produk
                     </div> 
                     <div class="col-sm-2"  style="padding-left: 0px; display: none;" id="stipe">
                        <select id="vtipe" name="tipe_item[]" class="select2 form-control" multiple style="width: 100%;">
                          <option>Barang</option>
                          <option>Jasa</option>
                        </select>
                     </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-xs-12">
                     <div class="checkbox">
                        <input type="checkbox" name="kp" value="kategori" id="kategori">Kategori Produk
                     </div> 
                     <div class="col-sm-2"  style="padding-left: 0px; display: none;" id="skategori">
                        <select name="kategori_item[]" class="select2 form-control" multiple style="width: 100%;">
                          <?php foreach ($kategori as $kategori) { ?>
                            <option><?php echo $kategori->nama_kategori ?></option>
                          <?php } ?>
                        </select>
                     </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-xs-12">
                     <div class="checkbox">
                        <input type="checkbox" name="jn" value="jenis_item" id="jenis">Jenis Produk
                     </div> 
                     <div class="col-sm-2"  style="padding-left: 0px; display: none;" id="sjenis">
                        <select name="jenis_item[]" class="select2 form-control" multiple style="width: 100%;">
                          <?php foreach ($jenis as $jenis) { ?>
                            <option><?php echo $jenis->nama_jenis ?></option>
                          <?php } ?>
                        </select>
                     </div>
                    </div>
                  </div>
                  </div>
                  <br>
                  <div class="form-group pull-right">
                  <button type="submit" class="btn btn-primary">Filter</button>
                  </div>

            <?php echo form_close() ?>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Urutkan Berdasarkan</h3>
                <hr style="margin-top: 0px;margin-bottom: 0px;">
            </div>
            <div class="box-body" >
            <?php echo form_open($urut) ?>
                  <div class="form-group">
                      <select class="form-control" name="lapurut" id="carurut" onchange="idlapurut();">
                      <option value="none">None</option>
                      <option value="kode_item">Kode Produk</option>
                      <option value="barcode">Barkode</option>
                      <option value="tipe_item">Jenis Produk</option>
                      <option value="kategori">Kategori Produk</option>
                      <option value="jenis_item">Jenis Produk</option>
                      <option value="nama_item">Nama Produk</option>
                      <option value="harga_pokok">Harga Pokok</option>
                      <option value="hj_user">Harga Jual User</option>
                      <option value="hj_dealer">Harga Jual Dealer</option>
                      <option value="stok">Stok</option>
                      </select>
                  </div>
                  <div class="form-group"  id="valurut" style=display:none;"">
                      <select class="form-control" name="valurut">
                      <option value="ASC">Ascending</option>
                      <option value="DESC">Descending</option>
                      </select>
                  </div>
                  <div class="form-group pull-right"">
                  <button type="submit" class="btn btn-primary">Urut</button>
                  </div>
            <?php echo form_close() ?>
            </div>
          </div>
        </div>
        <script type="text/javascript">
          function idlapurut(){
            var filter = $('#carurut').val();
            if (filter != 'none') {
            $('#valurut').show();
            }else{
            $('#valurut').hide();  
            }
          }
        </script>
        <div class="col-md-9">
          <div class="box">
            <div class="col-md-10 box-header">
                <h3 class="box-title"><?php echo $tabel ?></h3>
            </div>   
                  <div class="small-box">
        <div class="col-md-2 col-xs-3" style=" padding-top: 7px;">
        <a type="button" class="btn btn-block btn-danger btn-sm" href="<?php echo base_url('laporan_produk/pdf');?>">
        <i class="fa fa-print"></i> Print / PDF
        </a>
        </div>
      </div>
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
                        <th>TIPE</th>
                        <th>KATEGORI</th>
                        <th>JENIS</th>
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
                            <td><?php echo $field->tipe_item ?></td>
                            <td><?php echo $field->kategori ?></td>
                            <td><?php echo $field->jenis_item ?></td>
                            <td><?php echo $field->stok ?></td>
                            <td><?php echo number_format($field->hj_user); ?></td>
                            <td><?php echo number_format($field->hj_dealer );?></td>
                            <?php if ($akses['pru'] == 'Y' OR $akses['prv'] == 'Y' OR $akses['prh'] == 'Y' OR $akses['prd'] == 'Y'): ?>
                            <td>
                            <center>
                              <?php if ($akses['prv'] == 'Y'): ?>
                              <a data-toggle="modal" data-target="#modal-view" data-id="<?php echo $field->id; ?>" id="getdataview" title="Detail data"><i class="fa fa-sticky-note-o"></i></a>
                              &nbsp;
                              <?php endif ?>
                            </center>
                            </td>
                            <?php endif ?>
                        </tr>                   
                    <?php } ?>
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
                    <?php $this->load->view('assets/view'); ?>