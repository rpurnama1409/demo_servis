<script type="text/javascript">
    $(document).ready(function () {
    <?php if ($hide == '#kredit') { ?>
    $("#kembalian").show();
    <?php }else{ ?>
    $("#kredit").show();
    $("#jkredit").show();
    <?php } ?>
    });
</script>
<section class="content">
    <div class="row">
        <?php if ($akses['pemtb'] == 'Y'): ?>
        <?php if($include != ''){include('tambah_detail.php');}?>
        <?php endif ?>
        <div class="col-md-<?php echo $size ?>">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                <div class="row">
                <div class="col-md-10">
                <h3 class="box-title"><?php echo $tabel ?></h3>
                </div>
                <?php if ($akses['pemtb'] == 'Y'): ?>
                <div class="col-md-2">
                    <?php echo form_open($pop.$where) ?>
                    <?php if ($include == '') {
                    echo "<input type='hidden' name='size' value='9'>";
                    echo "<input type='hidden' name='include' value='Tambah'>";
                    }elseif ($include == 'Tambah') {
                    echo "<input type='hidden' name='size' value='12'>";
                    echo "<input type='hidden' name='include' value=''>";
                    } ?>
                    <button type="submit" class="btn btn-block btn-success btn-sm"><?php echo $tombol ?></button>
                    <?php echo form_close() ?>
                </div>
                <?php endif ?>
                </div>   
                    <div class="row" style="margin: auto;">
                        <div class="col-md-1"></div>
                        
                        <div class="col-md-4">
                        <table border="0">
                        <tr>
                        <td style="padding-bottom: 5px;">Nomor Pembelian</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['kode_pembelian'] ?></b></td>
                        <br>
                        </tr>
                        <tr>
                        <td style="padding-bottom: 5px;">Nama Supplier</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['nama_supplier'] ?></b></td>
                        </tr>
                        </table>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                        <table border="0">
                        <tr>
                        <td style="padding-bottom: 5px;">Tanggal Pembelian</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php $date=date_create($field['tanggal_pembelian']);echo date_format($date,"d-m-Y"); ?></b></td>
                        </tr>
                        <tr>
                        <td style="padding-bottom: 5px;">Sales / Teknisi</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['sales'] ?></b></td>
                        <br>
                        </tr>
                        <tr>
                        <td style="padding-bottom: 5px;">Operator</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['op'] ?></b></td>
                        
                        </tr>
                        </table>                        
                        </div>
                        <div class="col-md-1"></div>
                        
                    </div>
                </div>
                <br>
                <div class="box-body" >
                    <div class="table-responsive">
                        <table id="dataTables-example" class="table table-bordered table-striped now" >
                        <thead class="text-primary">
                        <th>NO</th>
                        <th>KODE PRODUK</th>
                        <th>NAMA PRODUK</th>
                        <th>JUMLAH</th>
                        <th>HARGA</th>
                        <th>DISKON</th>
                        <th>Total</th>
                        <?php if ($akses['pemdb'] == 'Y'): ?>
                        <th>ACTION</th>
                        <?php endif ?>
                        </thead>
                        <tbody>
                        <?php $i=1; foreach($field2 as $field2){ ?>
                        <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $field2->kode_item ?></td>
                        <td><?php echo $field2->nama_produk ?></td>
                        <td><?php echo $field2->qty ?></td>
                        <td><?php echo 'Rp. '.number_format($field2->harga_beli) ?></td>
                        <td>
                        <?php if ($akses['pemedis'] == 'Y'): ?>
                        <div class="input-group">
                        <?php endif ?>
                        <?php echo number_format($field2->diskon_percen).' %' ?>
                        &nbsp;
                        <?php if ($akses['pemedis'] == 'Y'): ?>
                        <span class="input-group-addon" style="border-style: none;background-color:transparent;padding: 0px;">
                            <a data-toggle="modal" data-target="#modal-edit" data-id="<?php echo $field2->id; ?>" id="getdata"><i class="fa fa-pencil" title="Edit Diskon"></i></a>
                        </span>
                        </div>
                        <?php endif ?>
                        </td>
                        <td><?php echo 'Rp. '.number_format($field2->total) ?></td>
                        <?php if ($akses['pemdb'] == 'Y'): ?>
                        <td>
                        <center>
                        <a title="Delete / Batal Barang" href="<?php echo base_url('pembelian/hapus_barang/'.$field2->id) ?>" onclick="return confirm('apakah data akan dihapus?')"><i class="fa fa-trash"></i></a>
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
        </div>
        <div class="col-md-12">
            <div class="box">
                    <?php echo form_open($checkout) ?>
                    <div class="row" style="padding: 10px">
                        <div class="col-lg-7">
                            <input name="kode_pembelian" type="hidden" value="<?php echo $where ?>">
                            <input name="nama_supplier" type="hidden" value="<?php echo $field['nama_supplier'] ?>">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Total Harga</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input autocomplete="off" class="form-control" name="total_akhir" value="<?php echo $jumlah ?>" readonly id="d"></div>
                                    </div>
                            </div>
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Tunai / DP</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input autocomplete="off" name="cash" type="text" class="form-control" onkeyup="bayar();" id="e" value="<?php echo $field['cash'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="kredit" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Kredit</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="kredit" type="text" class="form-control" readonly id="kr" value="<?php echo $field['kredit'] ?>"></div>
                                </div>
                            </div>
                            </div>
                            <div id="kembalian" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Kembalian</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="kembalian" type="text" class="form-control" readonly id="f" value="<?php echo $field['kembalian'] ?>">
                                    </div>
                                </div>
                            </div>
                            </div>                                 
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-lg-12">
                                <span>Catatan</span>
                                <textarea name="catatan" type="text" class="form-control" id="g"><?php echo $field['catatan'] ?></textarea>
                                </div>
                            </div>
                            <div id="jkredit" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Jatuh Tempo</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                         <i class="fa fa-calendar"></i>
                                      </div>
                                      <input name="jatuh_tempo" type="text" id="datepicker" class="form-control" >
                                      </div> 
                                    
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"  style="padding: 10px 20px 20px 10px;">
                    <div class="col-md-12">
                        <div class="pull-right" style="margin-left:10px;">
                        <button type="submit" class="btn btn-primary" value="T" name="print">Simpan</button>
                        </div>
                        <div class="pull-right" style="margin-left:10px;">
                        <button type="submit" class="btn btn-primary" value="Y" name="print">Checkout</button>
                        </div>
                    </div>
                    </div>
                    <?php echo form_close() ?>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<?php $this->load->view('assets/edit') ?>