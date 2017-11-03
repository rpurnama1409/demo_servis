</div>
  <!--</div>-->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2017 <a href="<?php echo base_url() ?>">demo_servis.com</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<!-- ./wrapper -->

<!-- Morris.js charts -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
     <!-- DATA TABLE SCRIPTS -->
<script src="<?php echo base_url() ?>assets/custom/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/custom/dataTables/dataTables.bootstrap.js"></script>

<script>
    $(document).ready(function () {
      
      $('.alert').delay(1000).slideUp(500);

       $("#c_gp").change(function() {
        if(this.checked) {
            $("#gp").show();
            }else{
              $("#gp").hide();
              $("#gp").val('0');
            }
        });

      $("#c_uk").change(function() {
        if(this.checked) {
            $("#uk").show();
            }else{
              $("#uk").hide();
              $("#uk").val('0');
            }
        });

        $("#c_um").change(function() {
        if(this.checked) {
            $("#um").show();
            }else{
              $("#um").hide();
              $("#um").val('0');
            }
        });

        $("#c_pr").change(function() {
        if(this.checked) {
            $("#pr").show();
            }else{
              $("#pr").hide();
              $("#prsn").val('0');
            }
        });


        //validasi filter produk
         $("#tipe").change(function() {
        if(this.checked) {
            $("#stipe").show();
            }else{
              $("#stipe").hide();
            }
        });

        $("#periode").change(function() {
        if(this.checked) {
            $("#speriode").show();
            $("#kategori").prop('disabled',true);
            $("#np").prop('disabled',true);
            $("#jenis").prop('disabled',true);
            $("#skategori").hide();
            $("#snp").hide();
            $("#sjenis").hide();
            }else{
              $("#speriode").hide();
              $("#kategori").prop('disabled',false);
              $("#np").prop('disabled',false);
              $("#jenis").prop('disabled',false);
            }
        });

         $("#kategori").change(function() {
        if(this.checked) {
            $("#skategori").show();
            }else{
              $("#skategori").hide();
            }
        });
         $("#jenis").change(function() {
        if(this.checked) {
            $("#sjenis").show();
            }else{
              $("#sjenis").hide();
            }
        });
         $("#np").change(function() {
        if(this.checked) {
            $("#snp").show();
            }else{
              $("#snp").hide();
            }
        });

         //end filter produk

      $("#gp").click(function(){
      $("#gp").val('');
      })
      $("#uk").click(function(){
      $("#uk").val('');
      })
      $("#um").click(function(){
      $("#um").val('');
      })
      $("#prsn").click(function(){
      $("#prsn").val('');
      })
      $("#bonus").click(function(){
      $("#bonus").val('');
      })
      $("#terlambat").click(function(){
      $("#terlambat").val('');
      })
      $("#kasbon").click(function(){
      $("#kasbon").val('');
      })
      $("#jk").click(function(){
      $("#jk").val('');
      })
      if ($("#status").val()=='Kepala teknisi'){
               $("#gaji_pokok").show();
               $("#uang_kehadiran").show();
               $("#uang_makan").show();
               $("#prosentase").show();
             }
             if($("#status").val()=='Kepala administrasi'){
               $("#gaji_pokok").show();
               $("#uang_kehadiran").show();
               $("#uang_makan").hide();
               $("#prosentase").hide();
             }
             if($("#status").val()=='Magang'){
               $("#gaji_pokok").hide();
               $("#uang_kehadiran").show();
               $("#uang_makan").hide();
               $("#prosentase").hide();
             }

     $("#status").change(function (){
          if ($("#status").val()=='Kepala teknisi'){
               $("#gaji_pokok").show();
               $("#uang_kehadiran").show();
               $("#uang_makan").show();
               $("#prosentase").show();
             }
             if($("#status").val()=='Kepala administrasi'){
               $("#gaji_pokok").show();
               $("#uang_kehadiran").show();
               $("#uang_makan").hide();
               $("#prosentase").hide();
             }
             if($("#status").val()=='Magang'){
               $("#gaji_pokok").hide();
               $("#uang_kehadiran").show();
               $("#uang_makan").hide();
               $("#prosentase").hide();
             }
            })
    $('#dataTables-example').dataTable();
    $('#dataTables-example1').dataTable();
        $('.select2').select2();
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
        $('#datepicker2').datepicker({
      autoclose: true
    })
        $('#datepicker3').datepicker({
      autoclose: true
    })
  });
</script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- ./wrapper -->

<script type="text/javascript">
//Jumlah Detail penjualan
  function total() {
  var a = $('#a').val();
  var b = $('#b').val();
  var c = $('#c').val();
  var e = $('#e').val();
  var dis = 0;
  var ppn = 0;
  var jum = 0;
  if (b != '') {
  $('#diskon_rp').val('');
  dis = a * b / 100;
  jum = a - dis;
    if (c != '') {
    ppn = jum * c / 100;
    d = -(-(jum) - ppn);
    $('#diskon_rp').val(dis);
    }else{
    d = jum;
    $('#diskon_rp').val(dis);    
    }
  }else{
    if (c != '') {
    ppn = a * c / 100;
    d = -(-(a) - ppn);
    }
  }
  };

  function diskondes(){
  var prs = $('#diskon_rp').val();
  var a = $('#a').val();
  var c = $('#c').val();
  var e = $('#e').val();
  var dis = 0;
  var ppn = 0;
  var jum = 0;

  if (prs!='') {
  $('#b').val('');
  persen = (prs / a) * 100;   
  jum = a - prs;
    if (c != '') {
    ppn = jum * c / 100;
    d = -(-(jum) - ppn);
    $('#b').val(persen);
    }else{
    d = jum;
    $('#b').val(persen);    
    }
  }else{
    if (c != '') {
    ppn = a * c / 100;
    d = -(-(a) - ppn);
    }
  }
  $('#d').val(d);
  }

  function bayar(){
  var d = $('#d').val();
  var e = $('#e').val();
  if (e != '') {
  var f = e - d;
  }
  if (f >= 0) {
  $("#kredit").hide();
  $("#jkredit").hide();
  $("#kembalian").show();
  $('#f').val(f);  
  $('#kr').val('');
  }else{
  var plus = -(f);
  $("#kredit").show();
  $("#jkredit").show();
  $("#kembalian").hide();
  $('#f').val('');  
  $('#kr').val(plus);
  }
  if (f <= -(1)) { var g = '(BELUM LUNAS) '}
  if (f >= 0) { var g = '(LUNAS) '}
  $('#g').val(g);
  }
//END Jumlah Detail Penjualan
</script>

<script type="text/javascript">
function nama(){
      var value = $("#nama_pelanggan").val();
  $.ajax({
      type: "POST",
      url : "<?php echo base_url('loader_data/pelanggan'); ?>",
      data: "value="+value,
      success: function(msg){$('#status').html(msg);}
    })
  $.ajax({
      type: "POST",
      url : "<?php echo base_url('loader_data/kode_item'); ?>",
      data: "value="+value,
      success: function(msg){$('#tkode_item').html(msg);}
    })
}  
</script>
<script type="text/javascript">
function isi(){
      var value = $("#kode_item").val();
      var value2 = $("#status_pelanggan").val();      
  $.ajax({
      type: "POST",
      url : "<?php echo base_url('loader_data/isi1'); ?>",
      data: "value="+value+"&value2="+value2,
      success: function(msg){$('#isi1').html(msg);}
    })
  $.ajax({
      type: "POST",
      url : "<?php echo base_url('loader_data/isi2'); ?>",
      data: "value="+value+"&value2="+value2,
      success: function(msg){$('#isi2').html(msg);}
    })
  }
</script>
<script type="text/javascript">
function isitot(){
      var value = $("#kodeitem").val();
      var value2 = $("#statuspelanggan").val();      
  $.ajax({
      type: "POST",
      url : "<?php echo base_url('loader_data/isitambah'); ?>",
      data: "value="+value+"&value2="+value2,
      success: function(msg){$('#isitam').html(msg);}
    })
  }
</script>
<script type="text/javascript">
  function totbar() {
  var hargabar  = $('#hargabar').val();
  var jumbar    = $('#jumbar').val();
  var disbar    = $('#disbar').val();
  
  if (jumbar != '') {
  $('#brdiskon_pr').val('');
  jum = hargabar * jumbar;
    if (disbar != '') {
      dis = (jum * disbar) / 100;
      tot = jum - dis;
      $('#brdiskon_pr').val(dis);
    }else{
      tot = jum;
    }
  }else{
    tot = hargabar;
  }
  $('#totharbar').val(tot);
  };
  function distotbar() {
  var hargabar  = $('#hargabar').val();
  var jumbar    = $('#jumbar').val();
  var brdis     = $('#brdiskon_pr').val();
  
  if (jumbar != '') {
  $('#disbar').val('');
  jum = hargabar * jumbar;
    if (brdis != '') {
      dis = (brdis / jum) * 100;
      tot = jum - brdis;
      $('#disbar').val(dis);
    }else{
      tot = jum;
    }
  }else{
    tot = hargabar;
  }
  $('#totharbar').val(tot);
  };
</script>
<script>
$(document).ready(function(){
  
  $(document).on('click', '#getdata', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader
    
    $.ajax({
      url: '<?php echo base_url($load_edit)?>',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dynamic-content').html('');    
      $('#dynamic-content').html(data); // load response 
      $('#modal-loader').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
    });
    
  });
});
</script>
<script>
$(document).ready(function(){
  
  $(document).on('click', '#getdataview', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#dynamic-contentview').html(''); // leave it blank before ajax call
    $('#modal-loaderview').show();      // load ajax loader
    
    $.ajax({
      url: '<?php echo base_url($view)?>',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dynamic-contentview').html('');    
      $('#dynamic-contentview').html(data); // load response 
      $('#modal-loaderview').hide();      // hide ajax loader 
    })
    .fail(function(){
      $('#dynamic-contentview').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loaderview').hide();
    });
    
  });
});
</script>
<script>
function tothitng() {
    var qty = $("#qty").val();
    var harga = $("#harga").val();
    if(qty != ''){
    jum = harga * qty;
    $("#disper").val('0');
    $("#diskon").val('0');
    }
    $("#total").val(jum);
}

function htgdis() {
    var qty = $("#qty").val();
    var harga = $("#harga").val();
    var disper = $("#disper").val();
    
    if(qty != ''){
    $("#diskon").val('');
    jum = harga * qty;
        if (disper != '') {
          dis = (jum * disper) / 100;
          tot = jum - dis;
          $('#diskon').val(dis);
        }else{
          tot = jum;
        }
    }else{
    tot = hargabar;    
    }
    $("#total").val(tot);
}
function hitung() {
    var qty = $("#qty").val();
    var harga = $("#harga").val();
    var diskon = $("#diskon").val();
    
    if(qty != ''){
    $("#disper").val('');
    jum = harga * qty;    
        if (diskon != '') {
          dis = (diskon / jum) * 100;
          tot = jum - diskon;
          $("#disper").val(dis);
        }else{
          tot = jum;
        }
    }else{
    tot = hargabar;    
    }
    $("#total").val(tot);
}
</script>

 <script type="text/javascript">
    function isi_otomatis(){
    var barcode = $("#barcode").val();
    $.ajax({
    url: '<?php echo base_url()?>produk/cari_barang',
    type: 'POST',
    data:"barcode="+barcode ,
    }).success(function (data) {
    var json = data,
    obj = JSON.parse(json);
    $('#nama_produk').val(obj.nama);
    $('#id_produk').val(obj.id);
    })
    }
  </script>

<script type="text/javascript">
function pospel(){
      var value = $("#pkode_pelanggan").val();      
      var value2 = $("#pnama_pelanggan").val();
      var value3 = $("#pstatus").val();      
      var value4 = $("input[name=tgl_lahir]:text").val();
      var value5 = $("#palamat").val();
      var value6 = $("#pkota").val();
      var value7 = $("#pno_hp").val();      
  $.ajax({
      type: "POST",
      url : "<?php echo base_url('pelanggan/pelanggan_baru'); ?>",
      data: "value="+value+"&value2="+value2+"&value3="+value3+"&value4="+value4+"&value5="+value5+"&value6="+value6+"&value7="+value7,
      success: function(msg){
    window.location = window.location.href + "?openmodal=1";}
    })
  }
</script>

<script type="text/javascript">
function possup(){
      var value = $("#tamkode_supplier").val();      
      var value2 = $("#tamnama_supplier").val();
      var value3 = $("#tamkota_negara").val();      
      var value4 = $("#tamnomor_hp").val();
      var value5 = $("#tamkontak_person").val();
      var value6 = $("#tamacc").val();
  $.ajax({
      type: "POST",
      url : "<?php echo base_url('supplier/supplier_baru'); ?>",
      data: "value="+value+"&value2="+value2+"&value3="+value3+"&value4="+value4+"&value5="+value5+"&value6="+value6,
      success: function(msg){
    window.location = window.location.href + "?openmodal=1";}
    })
  }
</script>

 <script type="text/javascript">
  function otomatis(){
  var kode_akun = $("#kode_akun").val();
  $.ajax({
  url: '<?php echo base_url()?>kas_keluar/load_akun',
  type: 'POST',
  data:"kode_akun="+kode_akun ,
  }).success(function (data) {
  var json = data,
  obj = JSON.parse(json);
  $('#nama_akun').val(obj.nama);
  });
  }
</script>

<script>
  $(document).ready(function(){
    $("#tipe_item").change(function (){
        if($("#tipe_item").val()=='Barang'){
          $("#hp").show();
          $("#sm").show();
          $("#hpp").show();
          $("#pjual").show();
          $("#pjasa").hide();
          $("#persediaan").show();
          $("#vhpp").val('5-1100');
          $("#vpjual").val('4-1100');
          $("#vpjasa").val('-');
          $("#vpersediaan").val('1-1301');
          $("#barcode").val('');
        }
        if($("#tipe_item").val()=='Jasa'){
          $("#hp").hide();
          $("#sm").hide();
          $("#hpp").hide();
          $("#vhpp").val('-');
          $("#pjual").hide();
          $("#vpjual").val('-');
          $("#persediaan").hide();
          $("#vpersediaan").val('-');
          $("#pjasa").show();
          $("#vpjasa").val('4-2000');
          $("#barcode").val('-');
          $("#stok").val('1');
        }
    })
  });
</script>

<script>
$(document).ready(function(){
  
  $(document).on('click','#getdatadrop', function(e){
    
    e.preventDefault();
    
    var kode = $(this).data('id');   // it will get id of clicked row
    
    $.ajax({
      url: '<?php echo base_url('loader_data/pencarian')?>',
      type: 'POST',
      data: 'kode='+kode,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);
      $('#datacari').val('');    
      $('#drop-search').hide();  
      $('#isidata').html('');    
      $('#isidata').html(data); // load response 
    })
    $('#box-search').show();
  });
});
</script>

<script>
$(document).ready(function(){
  
  $(document).on('click','#getdatacari', function(e){
    
    e.preventDefault();
    
    var kode = $('#datacari').val();   // it will get id of clicked row
    
    $.ajax({
      url: '<?php echo base_url('loader_data/pencarian')?>',
      type: 'POST',
      data: 'kode='+kode,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#datacari').val('');    
      $('#isidata').html('');    
      $('#isidata').html(data); // load response 
    })
    $('#box-search').show();
  });
});
</script>

<script>
$(document).ready(function(){
  
  $(document).keyup('#getdatacari', function(e){
    
    e.preventDefault();
    
    var kode = $('#datacari').val();   // it will get id of clicked row
    
    $.ajax({
      url: '<?php echo base_url('loader_data/drop_pencarian')?>',
      type: 'POST',
      data: 'kode='+kode,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dropdata').html('');    
      $('#dropdata').html(data); // load response 
    })
    $('#drop-search').show();
  });
});
</script>


<script type="text/javascript">
    function otomatis_jabatan(){
    var nama_pegawai = $("#pengnama_pegawai").val();
    $.ajax({
    url: '<?php echo base_url()?>penggajian/load_pegawai',
    type: 'POST',
    data:"nama_pegawai="+nama_pegawai ,
    }).success(function (data) {
    var json = data,
    obj = JSON.parse(json);
    $('#jabatan').val(obj.jabatan);
    });
    }
  </script>

<script type="text/javascript">
function idlapfilter(){
      var value = $('#carfilter').val();
  $.ajax({
      type: "POST",
      url : "<?php echo base_url('loader_data/laporan_filter_produk'); ?>",
      data: "value="+value,
      success: function(msg){$('#valfilter').html(msg);}
    })
  }
</script>

<script >    
    function validasi(){
    var kode_item = $("#k_item").val();
    $.ajax({
        url: '<?php echo base_url()?>produk/validation',
        type: 'POST',
        data:"kode_item="+kode_item ,
        }).success(function (data) {
        var json = data,
        obj = JSON.parse(json);

        
        if (obj.cek != '0') {
          $('#pesan').show();
          $('#cek').hide();
        }else{
          $('#cek').show();
          $('#pesan').hide('');
        }
        });
        } 
</script>

  </body>
</html>