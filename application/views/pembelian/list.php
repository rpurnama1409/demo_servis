
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
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
             
            <div class="<?php if ($akses['pemt'] == 'Y'){ echo 'col-lg-10';}?> box-header">
                <h3 class="box-title"><?php echo $tabel ?></h3>
            </div>
            <?php if ($akses['pemt'] == 'Y'): ?>
            <div class="small-box">
            <div class="col-lg-2 col-xs-3" style=" padding-top: 7px;">
            <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" href="#stack1">
                    <i class="fa fa-plus"></i>
                     Tambah</button>
            </div>
            </div>
            <?php include'tambah.php'; ?>
            <?php endif ?>
            <br>
            
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped now" >
                    <thead class="text-primary">
                        <th>NO</th>
                        <th>KODE</th>                    
                        <th>TANGGAL</th>
                        <th>NAMA SUPPLIER</th>
                        <th>SALES/TEKNISI</th>
                        <th>OP</th>
                        <?php if ($akses['pemu'] == 'Y' OR $akses['pemv'] == 'Y' OR $akses['pemd'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach($field as $field){ ?>
                            <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $field->kode_pembelian ?></td>
                            <td><?php echo date('d-m-Y', strtotime($field->tanggal_pembelian)); ?></td>
                            <td><?php echo $field->nama_supplier ?></td>
                            <td><?php echo $field->sales ?></td>
                            <td><?php echo $field->op ?></td>
                            <?php if ($akses['pemu'] == 'Y' OR $akses['pemv'] == 'Y' OR $akses['pemd'] == 'Y'): ?>
                            <td>
                            <center>
                            <?php if ($akses['pemu'] == 'Y'): ?>
                            <?php if ($field->checkout != 'Y'): ?>
                            <a href="<?php echo base_url($edit.$field->kode_pembelian) ?>" title="Edit Data">
                            <i class="fa fa-pencil"></i>
                            </a>
                            &nbsp;
                            <?php endif ?>
                            <?php endif ?>
                            <?php if ($akses['pemv'] == 'Y'): ?>
                            <a href="<?php echo base_url($view.$field->kode_pembelian) ?>" title="View Data">
                            <i class="fa fa-sticky-note-o"></i>
                            </a>
                            &nbsp;
                            <?php endif ?>
                            <?php if ($akses['pemd'] == 'Y'): ?>
                              <a href="<?php echo base_url($delete.$field->kode_pembelian) ?>" onclick="return confirm('apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
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