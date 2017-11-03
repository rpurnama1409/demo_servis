<section class="content">
<div class="row">
<section class="col-lg-12">
<?php 
if($this->session->flashdata('sukses')){
echo '<div id="alert" class="alert alert-info" style="margin : 10px 10px 0px 10px ;">';
echo $this->session->flashdata('sukses');
echo '</div>';
}
?>
<br>
<form>
  <div class="input-group">
    <input autocomplete="off" id="datacari" type="text" class="form-control" placeholder="Masukan Kode Produk Atau Scan Kode Barcode">
    <div class="input-group-btn">
      <button  id="getdatacari" class="btn btn-default" style="background-color: #ffffff;height:34px;border-left-style:none;box-shadow: inset 0 1px 1px rgba(0,0,0,.075); ">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
<br>
<div id="drop-search" style="display:none;"><div id="dropdata"></div></div>
<div id="box-search" style="display:none;"><div id="isidata"></div></div>
</section>
<?php if ($akses['dssbm'] == 'Y'): ?>
<section class="col-lg-12 connectedSortable">
    <div class="box box-danger">
      <div class="box-header">
      <i class="fa fa-truck"></i>
      <h3 class="box-title">Stok Produk minim</h3>
       </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="card-content table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>NO</th>
                    <th>KODE PRODUK</th>
                    <th>NAMA PRODUK</th>
                    <th>STOK</th>
                    <?php if ($akses['dssbmr'] == 'Y'): ?>
                    <th>RE-ORDER</th>
                    <?php endif ?>
                </thead>
                <tbody>
                <?php for ($i=1; $i <= $bnyk;) { ?>
                <?php $n = $i - 1;$qty = $field->row_array($n); ?>
                        <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $qty['kode_item'] ?></td>
                        <td><input type="hidden" id="rnama<?php echo $i ?>" value="<?php echo $qty['nama_item'] ?>"><?php echo $qty['nama_item'] ?></td>
                        <td><?php echo $qty['stok'] ?></td>
                        <?php if ($akses['dssbmr'] == 'Y'): ?>
                        <td>
                            <center>
                            <input type="hidden" id="rtipe<?php echo $i ?>" value="<?php echo $qty['jenis_item'] ?>">
                             <button style="border-style: none;background-color: transparent;" title="Reorder"  data-toggle="modal" href="#stack1" id="rbarcode<?php echo $i ?>" value="<?php echo $qty['barcode'] ?>"><i class="fa fa-plus"></i></button>
                            </center>
                        </td>
                        <?php endif ?>
                        </tr>
                <script type="text/javascript">
                $("#<?php echo 'rbarcode'.$i ?>").click(function(){
                  var rbar = $('#rbarcode<?php echo $i ?>').val();
                  var rnam = $('#rnama<?php echo $i ?>').val();
                  var rtip = $('#rtipe<?php echo $i ?>').val();
                  $('#barcode').val(rbar);
                  $('#jenis_produk').val(rtip);
                  $('#nama_produk').val(rnam);});</script>
                <?php  $i++;} ?>
                </tbody>
            </table>
        </div>
      </div>
      <?php $this->load->view('pembelian/tambah'); ?>
      
      <!-- /.box-body -->
    </div>
  </section>
<?php endif ?>
<?php if ($akses['dshp'] == 'Y'): ?>
  <section class="col-lg-12 connectedSortable">
    <div class="box box-warning">
      <div class="box-header">
      <i class="ion ion-clipboard"></i>
      <h3 class="box-title">Daftar Hutang Dan Piutang Jatuh Tempo</h3>
       </div>
      <!-- /.box-header -->
      <div class="box-body">
      <?php if ($akses['dshph'] == 'Y'): ?>
      <label>Tabel Piutang</label>
        <div class="card-content table-responsive">
            <table class="table table-hover" id="dataTables-example">
                <thead class="text-warning">
                    <th>NO</th>
                    <th>TGL TRANSAKSI</th>
                    <th>TGL JATUH TEMPO</th>
                    <th>KODE TRANSAKSI</th>
                    <th>NAMA PELANGGAN</th>
                    <th>JUMLAH</th>
                    <?php if ($akses['dshphv'] == 'Y' OR $akses['dshphb'] == 'Y'): ?>
                    <th>ACTION</th>
                    <?php endif ?>
                </thead>
                <tbody>
                  <?php $i=1; foreach($piutang as $piutang){ ?>
                        <tr>
                          <td><?php echo $i++ ?></td>
                          <td><?php echo date('d-m-Y', strtotime($piutang->tgl_transaksi)); ?></td>
                          <td><?php echo date('d-m-Y', strtotime($piutang->tgl_jatuh_tempo)); ?></td>
                          <td><?php echo $piutang->kode_transaksi ?></td>
                          <td><?php echo $piutang->nama ?></td>
                          <td><?php echo number_format($piutang->jumlah_hutang); ?></td>
                        <?php if ($akses['dshphv'] == 'Y' OR $akses['dshphb'] == 'Y'): ?>
                         <td>
                            <center>
                            <?php if ($akses['dshphv'] == 'Y'): ?>
                             <a title="view" data-toggle="modal" data-target="#modal-view" data-id="<?php echo $piutang->id; ?>" id="getdataview"><i class="fa fa-sticky-note-o"></i></a>
                             &nbsp;&nbsp;&nbsp;
                            <?php endif ?>
                             <?php if ($akses['dshphb'] == 'Y'): ?>
                             <a title="Bayar" data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $piutang->id; ?>" id="getdata"><i class="fa fa-money"></i></a>
                             <?php endif ?>
                            </center>
                        </td>
                        <?php endif ?>
                        </tr>
                
                  <?php } ?>
                    <?php $this->load->view('assets/edit'); ?>
                    <?php $this->load->view('assets/view'); ?>
                </tbody>
            </table>
        </div>
        <br>
      <?php endif ?>
      <?php if ($akses['dshpp'] == 'Y'): ?>
      <label>Tabel Hutang</label>
        <div class="card-content table-responsive">
            <table class="table table-hover" id="dataTables-example1">
                <thead class="text-warning">
                    <th>NO</th>
                    <th>TGL TRANSAKSI</th>
                    <th>TGL JATUH TEMPO</th>
                    <th>KODE TRANSAKSI</th>
                    <th>NAMA SUPPLIER</th>
                    <th>JUMLAH</th>
                    <?php if ($akses['dshppv'] == 'Y' OR $akses['dshppb'] == 'Y'): ?>
                    <th>ACTION</th>
                    <?php endif ?>
                </thead>
                <tbody>
                    <?php $i=1; foreach($hutang as $hutang){ ?>
                        <tr>
                          <td><?php echo $i++ ?></td>
                          <td><?php echo date('d-m-Y', strtotime($hutang->tgl_transaksi)); ?></td>
                          <td><?php echo date('d-m-Y', strtotime($hutang->tgl_jatuh_tempo)); ?></td>
                          <td><?php echo $hutang->kode_transaksi ?></td>
                          <td><?php echo $hutang->nama ?></td>
                          <td><?php echo number_format($hutang->jumlah_hutang); ?></td>
                        <?php if ($akses['dshppv'] == 'Y' OR $akses['dshppb'] == 'Y'): ?>
                         <td>
                            <center>
                            <?php if ($akses['dshppv'] == 'Y'): ?>
                             <a title="view" data-toggle="modal" data-target="#modal-view" data-id="<?php echo $hutang->id; ?>" id="getdataview"><i class="fa fa-sticky-note-o"></i></a>
                             &nbsp;&nbsp;&nbsp;
                             <?php endif ?>
                             <?php if ($akses['dshppb'] == 'Y'): ?>
                             <a title="Bayar" data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $hutang->id; ?>" id="getdata"><i class="fa fa-money"></i></a>
                             <?php endif ?>
                            </center>
                        </td>
                        <?php endif ?>
                        </tr>
                
                    <?php } ?>
                </tbody>
            </table>
        </div>
      <?php endif ?>
      </div>
      <!-- /.box-body -->
    </div>
  </section>
 <?php endif ?>
 <?php if ($akses['dspy'] == 'Y'): ?> 
  <section class="col-lg-12 connectedSortable">
    <div class="box box-success ">
      <div class="box-header">
      <i class="fa fa-birthday-cake"></i>
      <h3 class="box-title">Daftar Pelanggan Yang Berulang Tahun</h3>
       </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="card-content table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>NO</th>
                    <th>NAMA PELANGGAN</th>
                    <th>STATUS</th>
                    <th>TANGGAL LAHIR</th>
                    <th>UMUR</th>
                    <th>NOMOR TELEPON / HP</th>
                </thead>
                <?php if ($cek>0) { ?>
                <?php $i=1; foreach ($daftar_ultah as $daftar_ultah) { ?>
                <tbody>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $daftar_ultah->nama_pelanggan ?></td>
                  <td><?php echo $daftar_ultah->status ?></td>
                  <td><?php echo $daftar_ultah->tanggal_lahir ?></td>
                  <td><?php $pecah = explode("-",$daftar_ultah->tanggal_lahir);$umur = date("Y") - $pecah[0];echo $umur.' Tahun'; ?></td>
                  <td><?php echo $daftar_ultah->nomor_hp ?></td>
                </tbody>
                <?php } ?>
                <?php }else{ ?>
                <tbody>
                  <td colspan="6"><center>Tidak ada pelanggan yang berulang tahun hari ini</center></td>
                </tbody>
                <?php } ?>
            </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </section>
  <?php endif ?>
<?php if ($akses['dslt'] == 'Y'): ?>
  <section class="col-lg-12 connectedSortable">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <?php if ($akses['dsltl'] == 'Y'): ?>
              <li><a href="#tab_1-2" data-toggle="tab">Login</a></li>
              <?php endif ?>
              <?php if ($akses['dslts'] == 'Y'): ?>
              <li><a href="#tab_2-2" data-toggle="tab">Servis</a></li>
              <?php endif ?>
              <?php if ($akses['dsltp'] == 'Y'): ?>
              <li class="active"><a href="#tab_3-1" data-toggle="tab">Penjualan</a></li>
              <?php endif ?>
              <li class="pull-left header"><i class="fa fa-th"></i>Last Task</li>
            </ul>
            <div class="tab-content">
              <?php if ($akses['dsltp'] == 'Y'): ?>
              <div class="tab-pane active" id="tab_3-1">
                <table class="table">
                  <tbody>
                  <?php foreach ($last3 as $last3) { ?>
                    <tr>
                      <td><?php
                      echo "<b>";
                      echo $last3->kode_transaksi;
                      echo "</b>";
                      echo " Oleh ";
                      echo "<b>";
                      echo $last3->operator;
                      echo "</b>";
                      echo " pada tanggal dan jam ";
                      echo "<b>";
                      echo $last3->tanggal;
                      echo "</b>";
                      ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <?php endif ?>
              <?php if ($akses['dslts'] == 'Y'): ?>
              <div class="tab-pane" id="tab_2-2">
                <table class="table">
                  <tbody>
                  <?php foreach ($last2 as $last2) { ?>
                    <tr>
                      <td><?php
                      echo "<b>";
                      echo $last2->kode_servis;
                      echo "</b>";
                      echo " Oleh ";
                      echo "<b>";
                      echo $last2->operator;
                      echo "</b>";
                      echo " pada tanggal dan jam ";
                      echo "<b>";
                      echo $last2->tanggal;
                      echo "</b>";
                      ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <?php endif ?>
              <?php if ($akses['dsltl'] == 'Y'): ?>
              <div class="tab-pane" id="tab_1-2">
                <table class="table">
                  <tbody>
                  <?php foreach ($last as $last) { ?>
                    <tr>
                      <td><?php  echo "<b>"; echo $last->nama; echo "</b>"; ?> </td> 
                      <td><?php echo "Terakhir login :"; ?></td>
                      <td><?php  echo "<b>"; echo $last->tanggal;  echo "</b>";?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php endif ?>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        
  </section>
<?php endif ?>

</div>
</section>