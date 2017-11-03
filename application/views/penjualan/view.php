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
                        <td style="padding-bottom: 5px;">Nomor Transaksi</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['kode_transaksi'] ?></b></td>
                        <br>
                        </tr>
                        <tr>
                        <td style="padding-bottom: 5px;">Nama Pelanggan</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['nama_pelanggan'] ?></b></td>
                        </tr>
                        <tr>
                        <td style="padding-bottom: 5px;">Status Pelanggan</td>
                        <td align="center" style="padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php echo $field['status'] ?></b></td>
                        </tr>
                        </table>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                        <table border="0">
                        <tr>
                        <td style="padding-bottom: 5px;">Tanggal Transaksi</td>
                        <td align="center" style="width: 30px;padding-bottom: 5px;"> : </td>
                        <td style="padding-bottom: 5px;"><b><?php $date=date_create($field['tanggal']);echo date_format($date,"d-m-Y"); ?></b></td>
                        </tr>
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
                </div>
                <br>
                <div class="box-body" >
                    <div class="table-responsive">
                        <table id="dataTables-example" class="table table-bordered table-striped now" >
                        <thead class="text-primary">
                        <th>NO</th>
                        <th>KODE PRODUK</th>
                        <th>URAIAN</th>
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
                        <td><?php echo $field2->uraian ?></td>
                        <td><?php echo $field2->jumlah ?></td>
                        <td><?php echo 'Rp. '.number_format($field2->harga) ?></td>
                        <td><?php echo $field2->diskon.'%' ?></td>
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
                            <input name="kode_transaksi" type="hidden" value="<?php echo $where ?>">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Total Harga</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input class="form-control" name="total_harga" value="<?php echo $jumlah ?>" readonly></div>
                                    </div>
                            </div>
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Diskon</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <input  name="diskon" class="form-control" value="<?php echo $field['diskon'] ?>" readonly>
                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>PPN</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <input type="text" name="ppn" class="form-control" value="<?php echo $field['ppn']; ?>" readonly>
                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Total Akhir</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="total_akhir" type="text" class="form-control" readonly value="<?php echo $field['total_akhir'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Tunai / DP</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="cash" type="text" class="form-control" value="<?php echo $field['cash'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="kredit">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Kredit</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="kredit" type="text" class="form-control" readonly value="<?php echo $field['kredit'] ?>"></div>
                                </div>
                            </div>
                            </div>
                            <div id="kembalian">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Kembalian</span></div>
                                <div class="col-md-7" style="padding-top: 5px;">
                                    <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input name="kembalian" type="text" class="form-control" readonly value="<?php echo $field['kembalian'] ?>">
                                    </div>
                                </div>
                            </div>
                            </div>                                 
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-lg-12">
                                <span>Catatan</span>
                                <textarea name="catatan" type="text" class="form-control" readonly><?php echo $field['catatan'] ?></textarea>
                                </div>
                            </div>
                            <div id="jkredit">
                            <div class="form-group label-floating" style="padding-top: 10px;">
                                <div class="col-md-5" style="padding-top: 5px;"><span>Jatuh Tempo</span></div>
                                <div class="col-md-7" style="padding-top: 5px;"><input name="jatuh_tempo" type="date" class="form-control" value="<?php echo $field['jatuh_tempo'] ?>" readonlys></div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"  style="padding: 10px 20px 20px 10px;">
                    <div class="col-md-12">
                        <div class="pull-right" style="margin-left:10px;">
                        <a href="<?php echo base_url('penjualan') ?>" class="btn btn-primary">Kembali</a>
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