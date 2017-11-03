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
             
          <div class="<?php if ($akses['akkaket'] == 'Y'){ echo 'col-lg-10';}?> box-header">
          <h3 class="box-title"><?php echo $tabel ?></h3>
          </div>
          <?php if ($akses['akkaket'] == 'Y'): ?>
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
                        <th>TANGGAL</th>
                        <th>NO.BUKTI</th>
                        <th>URAIAN</th>
                        <th>NOMINAL</th>
                        <?php if ($akses['akkakeu'] == 'Y' OR $akses['akkakev'] == 'Y' OR $akses['akkaked'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                    </thead>
                    <tbody>
                     <?php $i=1; foreach($field as $field){ ?>
                            <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php $tanggal = $field->tanggal; echo date('d-m-Y',strtotime($tanggal)) ?></td>
                            <td><?php echo $field->no_bukti ?></td>
                            <td><?php echo $field->nama_akun ?></td>
                            <td><?php echo number_format($field->nominal) ?></td>
                        <?php if ($akses['akkakeu'] == 'Y' OR $akses['akkakev'] == 'Y' OR $akses['akkaked'] == 'Y'): ?>
                            <td>
                            <center>
                        <?php if ($akses['akkakeu'] == 'Y'): ?>
                            <a data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $field->id; ?>" id="getdata" class="edit">
                            <i class="fa fa-pencil"></i></a>
                            &nbsp;
                        <?php endif ?>
                        <?php if ($akses['akkakev'] == 'Y'): ?>
                            <a data-toggle="modal" data-target="#modal-view" data-id="<?php echo $field->id; ?>" id="getdataview">
                            <i class="fa fa-sticky-note-o"></i></a>
                            &nbsp;
                        <?php endif ?>
                        <?php if ($akses['akkaked'] == 'Y'): ?>
                            <a href="<?php echo base_url('kas_keluar/hapus/'.$field->id) ?>" onclick="return confirm('apakah data akan dihapus?')">
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