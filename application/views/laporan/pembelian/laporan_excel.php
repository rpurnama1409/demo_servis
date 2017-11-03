<?php 
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=Laporan_pembelian.xls");

?>

<table border="1" width="100%">

<thead>
<tr>
	<th colspan="8" style="align-content: center;">LAPORAN TRANSAKSI PEMBELIAN</th>
</tr>
<tr>
	<th colspan="8">DEMO SERVIS</th>
</tr>
<tr>
	<th colspan="8"><i>Jl. Anggrek No.53 Sumedang</i></th>
</tr>
<?php if ($periode1!='' OR $periode2!=''){?>
<tr>
	<th colspan="8">Periode: <?php echo $periode1.' s/d '.$periode2 ?></th>
</tr>
<?php } ?>
<tr>
	<th>NO</th>
	<th>KODE PEMBELIAN</th>
	<th>TANGGAL</th>
	<th colspan="2">NAMA SUPPLIER</th>
	<th colspan="2">NAMA PEGAWAI</th>
	<th colspan="2">TOTAL TRANSAKSI</th>
</tr>

</thead>

<tbody>

<?php $i=1; $total=0; foreach($field as $field) { ?>

<tr>
	<td><?php echo $i++ ?></td>
    <td><?php echo $field->kode_pembelian ?></td>
	<td><?php echo date('d-m-Y', strtotime($field->tanggal_pembelian)); ?></td>
    <td colspan="2"><?php echo $field->nama_supplier ?></td>
    <td colspan="2"><?php echo $field->sales ?></td>
    <td colspan="2"><?php echo number_format($field->total) ?></td>
    <?php $total=$total+$field->total; ?>
 </tr>


<?php } ?>
<tr>
	<td colspan="8"><b>Total</b></td>
	<td><?php echo $total; ?></td>
</tr>
</tbody>

</table>