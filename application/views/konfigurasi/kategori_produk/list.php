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
      <div class="<?php if ($akses['konkpt'] == 'Y'){ echo 'col-lg-10';}?> box-header">
      <h3 class="box-title"><?php echo $tabel ?></h3>
      </div>
      <?php if ($akses['konkpt'] == 'Y'): ?>
      <div class="small-box">
        <div class="col-lg-2 col-xs-3" style=" padding-top: 7px;">
        <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-default">
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
                        <th>KATEGORI PRODUK</th>
                        <?php if ($akses['konkpu'] == 'Y' OR $akses['konkpd'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($field as $field){ ?>
                            <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $field->nama_kategori ?></td>
                            <?php if ($akses['konkpu'] == 'Y' OR $akses['konkpd'] == 'Y'): ?>
                            <td>
                            <center>
                            <?php if ($akses['konkpu'] == 'Y'): ?>
                             <a data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $field->id; ?>" id="getdata"><i class="fa fa-pencil"></i></a>
                            &nbsp;
                            <?php endif ?>
                            <?php if ($akses['konkpd'] == 'Y'): ?>
                              <a href="<?php echo base_url($delete.$field->id) ?>" onclick="return confirm('apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
                            <?php endif ?>
                            </center>
                            </td>
                            <?php endif ?>
                        </tr>
                    <?php $i++; } ?>
                    <?php if ($akses['konkpu'] == 'Y'): ?>
                      <?php $this->load->view('assets/edit'); ?>
                    <?php endif ?>
                    </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>