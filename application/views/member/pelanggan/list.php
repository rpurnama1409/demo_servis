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
          <div class="<?php if ($akses['mempelt'] == 'Y'){ echo 'col-lg-10';}?> box-header">
          <h3 class="box-title"><?php echo $tabel ?></h3>
          </div>
          <?php if ($akses['mempelt'] == 'Y'): ?>
            <div class="small-box">
            <div class="col-lg-2 col-xs-3" style=" padding-top: 7px;">
              <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i>
                     Tambah</button>
            </div>
            </div>
          <?php endif ?>
            <br>
            
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped now" >
                    <thead class="text-primary">
                        <th>NO.</th>
                        <th>KODE</th>
                        <th>NAMA</th>
                        <th>STATUS</th>
                        <th>KOTA</th>
                        <th>TGL.LAHIR</th>
                        <th>NO./HP</th>
                        <?php if ($akses['mempelu'] == 'Y' OR $akses['mempelv'] == 'Y' OR $akses['mempeld'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                    </thead>
                    <tbody>
                     <?php $i=1; foreach($field as $field){ ?>
                            <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $field->kode_plg ?></td>
                            <td><?php echo $field->nama_pelanggan ?></td>
                            <td><?php echo $field->status ?></td>
                            <td><?php echo $field->kota ?></td>
                            <td><?php echo date('d-m-Y',strtotime($field->tanggal_lahir)); ?></td>
                            <td><?php echo $field->nomor_hp ?></td>
                        <?php if ($akses['mempelu'] == 'Y' OR $akses['mempelv'] == 'Y' OR $akses['mempeld'] == 'Y'): ?>
                            <td>
                            <center>
                        <?php if ($akses['mempelu'] == 'Y'): ?>
                            <a data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $field->id; ?>" id="getdata">
                            <i class="fa fa-pencil"></i></a>
                            &nbsp;
                        <?php endif ?>
                        <?php if ($akses['mempelv'] == 'Y'): ?>
                            <a data-toggle="modal" data-target="#modal-view" data-id="<?php echo $field->id; ?>" id="getdataview">
                            <i class="fa fa-sticky-note-o"></i></a>
                            &nbsp;
                        <?php endif ?>
                        <?php if ($akses['mempeld'] == 'Y'): ?>
                            <a href="<?php echo base_url('pelanggan/hapus/'.$field->id) ?>" onclick="return confirm('apakah data akan dihapus?')">
                            <i class="fa fa-trash"></i></a>
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
              <?php include 'tambah.php' ?>
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