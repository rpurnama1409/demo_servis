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
             
            <div class="col-lg-10 box-header">
                <h3 class="box-title"><?php echo $tabel.'&nbsp'.$nama_produk; ?></h3>
            </div>
            <div class="small-box">
                </div>

            <br>
            
            <!-- /.box-header -->
            <div class="box-body" >
            <div class="table-responsive">
              <table id="dataTables-example" class="table table-bordered table-striped now" >
                    <thead class="text-primary">
                        <th>NO</th>
                        <th>SUPPLIER</th>                    
                        <th>TANGGAL PEMBELIAN</th>
                        <th>QTY</th>
                        <th>HARGA</th>
                    </thead>
                    <tbody>
                                              <?php $i=1; foreach($field as $field){ ?>
                            <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $field->nama_supplier ?></td>
                            <td><?php echo $field->tanggal_pembelian ?></td>
                            <td><?php echo $field->qty ?></td>
                            <td><?php echo $field->harga_beli ?></td>
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