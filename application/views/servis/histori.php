<section class="content">
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
          <h3 class="box-title"><?php echo $tabel ?></h3>
      </div>   
      <div class="row" style="margin: auto;">
        <div class="col-md-1"></div>
        <div class="col-md-4">
          <table border="0">
          <tr>
          <td style="padding-bottom: 5px;">Nama Pelanggan</td>
          <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
          <td style="padding-bottom: 5px;"><b><?php echo $field['nama_pelanggan'] ?></b></td>
          <br>
          </tr>
          <tr>
          <td style="padding-bottom: 5px;">SNID</td>
          <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
          <td style="padding-bottom: 5px;"><b><?php echo $field['snid'] ?></b></td>
          </tr>
          </table>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
          <table border="0">
          <tr>
          <td style="padding-bottom: 5px;">Nama Pegawai</td>
          <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
          <td style="padding-bottom: 5px;"><b><?php echo $field['nama_pegawai'] ?></b></td>
          <br>
          </tr>
          <tr>
          <td style="padding-bottom: 5px;">Operator</td>
          <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
          <td style="padding-bottom: 5px;"><b><?php echo $field['operator'] ?></b></td>
          </tr>
          </table>
        </div>
        <div class="col-md-1"></div>
      </div>
    <br>
    <div class="box-body" >
      <div class="table-responsive">
        <table id="dataTables-example" class="table table-bordered table-striped now" >
        <thead class="text-primary">
          <th>NO</th>
          <th>KODE SERVIS</th>
          <th>TANGGAL SERVIS</th>
          <th>UNIT SERVIS</th>
          <th>KELUHAN</th>
          <th>KELENGKAPAN</th>
          <th>CATATAN</th>
          <th>STATUS GARANSI</th>
          <th>BATAS GARANSI</th>
          <th>STATUS SERVIS</th>
          </thead>
          <tbody>
          <?php $i=1; foreach($field2 as $field2){ ?>
          <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $field2->kode_servis ?></td>
          <td><?php $date=date_create($field2->tanggal);echo date_format($date,"d-m-Y"); ?></td>
          <td><?php echo $field2->unit ?></td>
          <td><?php echo $field2->keluhan ?></td>
          <td><?php echo $field2->kelengkapan ?></td>
          <td><?php echo $field2->catatan ?></td>
          <td><?php echo $field2->status_garansi ?></td>
          <td><?php echo $field2->batas_garansi ?></td>
          <td><?php echo $field2->status_servis ?></td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</section>