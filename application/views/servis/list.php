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
             
      <div class="<?php if ($akses['st'] == 'Y'){ echo 'col-lg-10';}?> box-header">
      <h3 class="box-title"><?php echo $tabel ?></h3>
      </div>
      <?php if ($akses['st'] == 'Y'): ?>
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
                        <th>KODE SERVIS</th>
                        <th>TANGGAL</th>
                        <th>NAMA PELANGGAN</th>
                        <th>UNIT</th>
                        <th>NO.SNID</th>
                        <th>STATUS</th>
                        <?php if ($akses['su'] == 'Y' OR $akses['sv'] == 'Y' OR $akses['sh'] == 'Y' OR $akses['sd'] == 'Y'): ?>
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
                            <td><?php echo $field->unit ?></td>
                            <td><?php echo $field->snid ?></td>
                            <td><?php echo $field->status_servis ?></td>
                            <?php if ($akses['su'] == 'Y' OR $akses['sv'] == 'Y' OR $akses['sh'] == 'Y' OR $akses['sd'] == 'Y'): ?>
                            <td>
                            <center>
                            <?php if ($akses['su'] == 'Y'): ?>
                             <a title="Edit Data" data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $field->kode_servis; ?>" id="getdata"><i class="fa fa-pencil"></i></a>
                            &nbsp;
                            <?php endif ?>
                            <?php if ($akses['sv'] == 'Y'): ?>
                             <a title="View Data" data-toggle="modal" data-target="#modal-view" data-id="<?php echo $field->kode_servis; ?>" id="getdataview"><i class="fa fa-sticky-note-o"></i></a>
                            &nbsp;
                            <?php endif ?>
                            <?php if ($akses['sh'] == 'Y'): ?>
                            <a href="<?php echo base_url($trs.$field->snid) ?>" title="Transaksi Buka Nota">
                            <i class="fa fa-file-text-o"></i>
                            </a>
                            &nbsp;
                            <?php endif ?>
                            <?php if ($akses['sd'] == 'Y'): ?>
                              <a title="Delete Data" href="<?php echo base_url($delete.$field->kode_servis) ?>" onclick="return confirm('apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
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
<?php $this->load->view('assets/edit_lg') ?>
<?php $this->load->view('assets/view_lg') ?>