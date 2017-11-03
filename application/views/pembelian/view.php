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
        <div class="col-md-12">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                <div class="row">
                <div class="col-md-10">
                <h3 class="box-title"><?php echo $tabel ?></h3>
                </div>
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
                        <td style="padding-bottom: 5px;">Nama Pegawai</td>
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
                        <?php echo 'Rp. '.number_format($field2->diskon) ?>
                        </div>
                        </td>
                        <td><?php echo 'Rp. '.number_format($field2->total) ?></td>
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
                    <div class="row" style="padding: 10px">
                        <div class="col-lg-7">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Total Harga</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input class="form-control" name="total" value="<?php echo $jumlah ?>" readonly  style="background-color: transparent;"id="d"></div>
                                    </div>
                            </div>
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Tunai / DP</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input readonly style="background-color: transparent;" name="cash" type="text" class="form-control" value="<?php echo $field['cash'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div id="kredit" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Kredit</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input readonly style="background-color: transparent;" name="kredit" type="text" class="form-control" readonly id="kr" value="<?php echo $field['kredit'] ?>"></div>
                                </div>
                            </div>
                            </div>
                            <div id="kembalian" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Kembalian</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input readonly style="background-color: transparent;" name="kembalian" type="text" class="form-control" readonly id="f" value="<?php echo $field['kembalian'] ?>">
                                    </div>
                                </div>
                            </div>
                            </div>                                 
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-lg-12">
                                <span>Catatan</span>
                                <textarea disabled style="background-color: transparent;" name="catatan" type="text" class="form-control" id="g"><?php echo $field['catatan'] ?></textarea>
                                </div>
                            </div>
                            <div id="jkredit" style="display: none;">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Jatuh Tempo</span></div>
                                <div class="col-md-7" style="padding-top: 5px;"><input readonly style="background-color: transparent;" name="jatuh_tempo" type="date" class="form-control" value="<?php echo $field['jatuh_tempo'] ?>"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"  style="padding: 10px 20px 20px 10px;">
                    <div class="col-md-12">
                        <div class="pull-right" style="margin-left:10px;">
                        <a href="<?php echo base_url('pembelian') ?>" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    </div>
            </div>
            <!-- /.box-body -->
        </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>