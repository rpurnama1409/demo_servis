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
                        <th>KODE RETUR</th>
                        <th>KODE ITEM</th>                    
                        <th>NAMA BARANG</th>
                        <th>QTY</th>
                        <th>SUPPLIER</th>
                        <th>TANGGAL RETUR</th>
                        <?php if ($akses['pru'] == 'Y' OR $akses['prv'] == 'Y' OR $akses['prh'] == 'Y' OR $akses['prd'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                    </thead>
                    <tbody>
                       <?php $i=1; foreach($field as $field){ ?>
                            <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $field->kode_retur ?></td>
                            <td><?php echo $field->kode_item ?></td>
                            <td><?php echo $field->nama_item ?></td>
                            <td><?php echo $field->qty ?></td>
                            <td><?php echo $field->nama_supplier ?></td>
                            <td><?php echo date('d-m-Y',strtotime($field->tanggal)); ?></td>
                            <?php if ($akses['pru'] == 'Y' OR $akses['prv'] == 'Y' OR $akses['prh'] == 'Y' OR $akses['prd'] == 'Y'): ?>
                            <td>
                            <center>
                              <?php if ($akses['pru'] == 'Y'): ?>
                              <a data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $field->id_retur; ?>" id="getdata"><i class="fa fa-retweet"></i></a>
                              &nbsp;
                              <?php endif ?>
                            </center>
                            </td>
                            <?php endif ?>
                        </tr>                   
                    <?php } ?>
                    <?php if ($akses['pru'] == 'Y'): ?>
                    <?php $this->load->view('assets/edit'); ?>
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