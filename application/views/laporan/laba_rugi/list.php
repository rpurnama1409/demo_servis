          <?php echo form_close(); ?>
          <?php 
          if($this->session->flashdata('sukses')){
          echo '<div class="alert alert-success" style="margin : 10px 15px 0px 15px ;">';
          echo $this->session->flashdata('sukses');
          echo '</div>';
          }
          ?>
<section class="content">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="box" style="min-height: 300px;">
        <div class="col-lg-10 col-md-10 box-header">
          <h3 class="box-title"><?php echo $tabel ?></h3>
        </div>
          <div class="col-lg-2 col-md-2 col-xs-4" style=" padding-top: 7px;">
            <a href="<?php echo base_url($pdf) ?>" target="_blank" class="btn btn-block btn-danger btn-sm" title="Cetak PDF">
            <i class="fa fa-print"></i> PDF
            </a>
          </div>
        <br>
        <div class="box-body" >
          <?php echo form_open(base_url($tampil)); ?>
          <div class="col-lg-12 col-md-12" style="padding: 0px 50px;">
            <div class=" form-group"  style="margin-top: 22px;">
              <label>Mulai Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" name="tanggal1">
              </div>
            </div>
            <div class=" form-group"  style="margin-top: 22px;">
              <label>Sampai Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker2" name="tanggal2">
              </div>
            </div>
            <div class="pull-right form-group"  style="margin-top: 22px;padding: 25px 0px;">
              <button type="submit" class="btn btn-primary">
              Filter
              </button>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>