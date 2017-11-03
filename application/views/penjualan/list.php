<?php 
if($this->session->flashdata('sukses')){
echo '<div class="alert alert-success" style="margin : 10px 15px 0px 15px ;">';
echo $this->session->flashdata('sukses');
echo '</div>';
}
?>
<?php
    if(@$_GET['openmodal'] == 1){ ?>
        <script>
                 $(function(){
                     $('#stack1').modal('show');
                 });
        </script>
<?php         
    }
?>
<?php if ($printpenjualan != ''): ?>
<script type="text/javascript">
$(document).ready(function(){
setInterval(window.open("<?php echo base_url($printpenjualan) ?>"), 60000);
});
</script>
<?php endif ?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
             
      <div class="<?php if ($akses['pt'] == 'Y'){ echo 'col-lg-10';}?> box-header">
      <h3 class="box-title"><?php echo $tabel ?></h3>
      </div>
      <?php if ($akses['pt'] == 'Y'): ?>
      <div class="small-box">
        <div class="col-lg-2 col-xs-4" style=" padding-top: 7px;">
        <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" href="#stack1">
        <i class="fa fa-plus"></i>Tambah
        </button>
        </div>
      </div>
      <div><?php include 'tambah.php' ?></div>
      <?php endif ?>
      <br>
            
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped now" >
                    <thead class="text-primary">
                        <th>NO</th>
                        <th>KODE TRANSAKSI</th>
                        <th>TANGGAL</th>
                        <th>NAMA PELANGGAN</th>
                        <th>SALES/TEKNISI</th>
                        <th>OP</th>
                        <?php if ($akses['pu'] == 'Y' OR $akses['pv'] == 'Y' OR $akses['pd'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($field as $field){ ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $field->kode_transaksi ?></td>
                            <td><?php $date=date_create($field->tanggal);echo date_format($date,"d-m-Y"); ?></td>
                            <td><?php echo $field->nama_pelanggan ?></td>
                            <td><?php echo $field->nama_pegawai ?></td>
                            <td><?php echo $field->operator ?></td>
                            <?php if ($akses['pu'] == 'Y' OR $akses['pv'] == 'Y' OR $akses['pd'] == 'Y'): ?>
                            <td>
                            <center>
                            <?php if ($akses['pu'] == 'Y'): ?>
                            <a href="<?php echo base_url($edit.$field->kode_transaksi) ?>" title="Edit Data">
                            <i class="fa fa-pencil"></i>
                            </a>
                            &nbsp;
                            <?php endif ?>
                            <?php if ($akses['pv'] == 'Y'): ?>
                            <a href="<?php echo base_url($view.$field->kode_transaksi) ?>" title="View Data">
                            <i class="fa fa-sticky-note-o"></i>
                            </a>
                            &nbsp;
                            <?php endif ?>
                            <?php if ($akses['pd'] == 'Y'): ?>
                              <a href="<?php echo base_url($delete.$field->kode_transaksi) ?>" onclick="return confirm('apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
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