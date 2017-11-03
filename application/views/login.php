<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Demo </b>Servis</a>
  </div>
<?php
        if($this->session->flashdata('pesan') <> ''){
        ?>
          <div class="alert alert-dismissible alert-danger">
            <?php echo $this->session->flashdata('pesan');?>
          </div>
        <?php
        }
        ?>
<div class="row">
<!--TODOLIST-->
    <section class="col-lg-12 connectedSortable">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-2" data-toggle="tab">Login</a></li>
              <li class="active"><a href="#tab_2-2" data-toggle="tab">Cek Servis</a></li>  
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_2-2">
                <div class="login-box-body">
                  <?php echo form_open('log') ?>
                  <p class="login-box-msg">Cek Servis Barang Disini.</p>
                    <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Kode Servis" name="kode_servis"  required oninvalid="this.setCustomValidity('Kode servis masih kosong')"  oninput="setCustomValidity('')">
                    <span class="fa fa-user form-control-feedback"></span>
                    </div>
                    <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Check</button>
                    </div>
                    <!-- /.col -->
                    </div>
                  <?php echo form_close() ?>
                </div>
                <div class="login-box-msg" style="padding: 10px 0px 10px 0px;">
                  <center>
                  <?php foreach ($field as $field) { ?>
                  <div style="color:#888;">
                  <p class="login-box-msg">Kode servis <?php echo $field->kode_servis ?></p>
                    <table width="300" border="0" style="word-wrap: break-word;">
                    <tr>
                    <td style="width: 8%;"></td>
                    <td style="width: 45%;"  valign="top">Nama Pelanggan</td>
                    <td style="width: 7%;"  valign="top"> : </td>
                    <td style="width: 40%;"  valign="top"><?php echo $field->nama_pelanggan ?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td  valign="top">Unit Servis</td>
                    <td valign="top"> : </td>
                    <td valign="top"><?php echo $field->unit ?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td valign="top">Kategori</td>
                    <td valign="top"> : </td>
                    <td valign="top"><?php echo $field->kategori ?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td valign="top">SNID</td>
                    <td valign="top"> : </td>
                    <td valign="top"><?php echo $field->snid ?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td valign="top">Keluhan</td>
                    <td valign="top"> : </td>
                    <td valign="top"><?php echo $field->keluhan ?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td valign="top">Status Garansi</td>
                    <td valign="top">:</td>
                    <?php if($field->status_garansi == 'Garansi'){ ?>
                    <td valign="top"><?php $date=date_create($field->batas_garansi);echo date_format($date,"d-m-Y"); ?></td>
                    <?php }else{ ?>
                    <td valign="top"><?php echo $field->status_garansi ?></td>
                    <?php } ?>
                    </tr>
                    <tr>
                    <td></td>
                    <td valign="top">Status Servis : </td>
                    <td valign="top">:</td>
                    <td valign="top"><?php echo $field->status_servis ?></td>
                    </tr>
                    </table>
                  </div>
                  <?php } ?>
                  </center>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_1-2">
                <div class="login-box-body">
                  <p class="login-box-msg">Input Username And Password</p>
                  <?php echo form_open('log/in') ?>
                    <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username"  required oninvalid="this.setCustomValidity('Username masih kosong')"  oninput="setCustomValidity('')">
                    <span class="fa fa-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required oninvalid="this.setCustomValidity('Password masih kosong')"  oninput="setCustomValidity('')">
                    <span class="fa fa-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                    </div>
                  <?php echo form_close() ?>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
  </section>
</div>


  <!-- /.login-logo -->
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
