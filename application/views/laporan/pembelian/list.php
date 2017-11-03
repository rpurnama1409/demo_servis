<section class="content">
      <div class="row">
        <div class="col-lg-12">
          <div class="box">
            <div class=" box-header">
              <h3 class="box-title"><?php echo $tabel ?></h3>
                <br>
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"  >
                <?php echo form_open(base_url($tampil)); ?>
                <div class="col-xs-12 col-sm-12 col-md-3">
                  <div class="form-group"  style="margin-top: 22px;">
                    <label>Mulai Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="tanggal1">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div class="form-group"  style="margin-top: 22px;">
                    <label>Sampai Tanggal</label>
                     <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker2" name="tanggal2">
                        </div>
                        <!-- /.input group -->
                  </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                  <div style="margin:auto;margin-top: 50px"></div>
                    <button type="submit" class="btn btn-primary btn-sm">
                    Filter
                    </button>
                    <?php echo form_close(); ?>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <a href="<?php echo base_url($pdf) ?>" class="btn btn-primary btn-sm" title="Cetak PDF">
                    <i class="fa fa-print"></i>
                    </a>
                    &nbsp;
                    <a href="<?php echo base_url($excel) ?>" class="btn btn-primary btn-sm" title="Cetak Excel">
                    <i class="fa fa-file-text-o"></i>
                    </a>
                  </div>
                </div>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped now" >
                    <thead class="text-primary">
                        <th>NO</th>
                        <th>KODE TRANSAKSI</th>
                        <th>TANGGAL</th>
                        <th>NAMA SUPPLIER</th>
                        <th>NAMA PEGAWAI</th>
                        <th>TOTAL TRANSAKSI</th>
                        <th>STATUS PEMBAYARAN</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($field as $field){ ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $field->kode_pembelian ?></td>
                            <td><?php echo date('d-m-Y', strtotime($field->tanggal_pembelian)); ?></td>
                            <td><?php echo $field->nama_supplier ?></td>
                            <td><?php echo $field->sales ?></td>
                            <td><?php echo number_format($field->total); ?></td>
                            <td><?php if($field->kredit>0){echo 'BELUM LUNAS';}else{echo 'LUNAS';} ?></td>
                            <td>
                              <center>
                                <?php if ($akses['pv'] == 'Y'): ?>
                                  <a data-toggle="modal" data-target="#modal-view" data-id="<?php echo $field->kode_pembelian; ?>" id="getdataview" title="Detail data"><i class="fa fa-sticky-note-o"></i></a>
                                <?php endif ?>
                              </center>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php $this->load->view('assets/view_lg'); ?>
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