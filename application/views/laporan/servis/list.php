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
                        <input type="checkbox" name="periode" value="periode" id="periode">Periode
                     </div> 
                     <div class="col-sm-2"  style="padding-left: 0px; display: none;" id="speriode">
                        <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="tanggal1" placeholder="Mulai Tanggal">
                      </div>
                      <!-- /.input group -->
                      <br>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker2" name="tanggal2" placeholder="Sampai Tanggal">
                      </div>
                      <!-- /.input group -->
                     </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-xs-12">
                     <div class="checkbox">
                        <input type="checkbox" name="np" value="nama_pelanggan" id="np">Nama Pelanggan
                     </div> 
                     <div class="col-sm-2"  style="padding-left: 0px; display: none;" id="snp">
                        <input type="text" name="nama_pelanggan" class="form-control" placeholder="Masukan Nama pelanggan">
                     </div>
                    </div>
                  </div>
                   <div class="form-group">
                    <div class="col-xs-12">
                     <div class="checkbox">
                        <input type="checkbox" name="ss" value="status_servis" id="jenis">Status Servis
                     </div> 
                     <div class="col-sm-2"  style="padding-left: 0px; display: none;" id="sjenis">
                        <select name="status_servis[]" class="select2 form-control" multiple style="width: 100%;">
                          <?php foreach ($status as $status) { ?>
                            <option><?php echo $status->nama_status ?></option>
                          <?php } ?>
                        </select>
                     </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12">
                     <div class="checkbox">
                        <input type="checkbox" name="ks" value="kategori" id="kategori">Kategori Servis
                     </div> 
                     <div class="col-sm-2"  style="padding-left: 0px; display: none;" id="skategori">
                        <select name="kategori[]" class="select2 form-control" multiple style="width: 100%;">
                          <?php foreach ($kategori as $kategori) { ?>
                            <option><?php echo $kategori->nama_kategori ?></option>
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
                      <option value="kode_servis">Kode Servis</option>
                      <option value="nama_pelanggan">Nama Pelanggan</option>
                      <option value="kategori">Kategori Servis</option>
                      <option value="unit">Unit Servis</option>
                      <option value="status_garansi">Status Garansi</option>
                      <option value="batas_garansi">Batas Garansi</option>
                      <option value="snid">SNID</option>
                      <option value="status_servis">Status Servis</option>
                      <option value="nama_pegawai">Nama Pegawai</option>
                      <option value="operator">Operator</option>

                      </select>
                  </div>
                  <div class="form-group"  id="valurut" style="display: none;">
                      <select class="form-control" name="valurut">
                      <option value="asc">Ascending</option>
                      <option value="desc">Descending</option>
                      </select>
                  </div>
                  <div class="form-group pull-right">
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
        <a type="button" class="btn btn-block btn-danger btn-sm" href="<?php echo base_url('laporan_servis/pdf'); ?>">
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
                        <th>KODE SERVIS</th>
                        <th>TANGGAL</th>
                        <th>NAMA PELANGGAN</th>
                        <th>STATUS SERVIS</th>
                        <th>KATEGORI</th>
                        <th>UNIT</th>
                        <th>STATUS</th>
                        <?php if ($akses['su'] == 'Y' OR $akses['sv'] == 'Y' OR $akses['sd'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($field as $field){ ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $field->kode_servis ?></td>
                            <td><?php $date=date_create($field->tanggal);echo date_format($date,"d-m-Y"); ?></td>
                            <td><?php echo $field->nama_pelanggan ?></td>
                            <td><?php echo $field->status_servis ?></td>
                            <td><?php echo $field->kategori ?></td>
                            <td><?php echo $field->unit ?></td>
                            <td><?php echo $field->status_servis ?></td>
                            <?php if ($akses['su'] == 'Y' OR $akses['sv'] == 'Y' OR $akses['sd'] == 'Y'): ?>
                            <td>
                            <center>
                            <?php if ($akses['sv'] == 'Y'): ?>
                             <a title="View Data" data-toggle="modal" data-target="#modal-view" data-id="<?php echo $field->kode_servis; ?>" id="getdataview"><i class="fa fa-sticky-note-o"></i></a>
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
  </div>
  <!-- /.row -->
</section>
<?php $this->load->view('assets/view_lg') ?>