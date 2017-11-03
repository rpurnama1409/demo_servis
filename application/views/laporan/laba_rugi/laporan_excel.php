<?php 
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=Laporan_penjualan.xls");

?>

<table border="1" width="100%">

<thead>
<tr>
	<th colspan="8" style="align-content: center;">LAPORAN TRANSAKSI PENJUALAN</th>
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
	<th>No</th>
	<th>Kode Transaksi</th>
	<th>Tanggal</th>
	<th colspan="2">Nama Pelanggan</th>
	<th colspan="2">Nama Pegawai</th>
	<th>Total Transaksi</th>
</tr>

</thead>

<tbody>

<?php $i=1; $total=0; foreach($field as $field) { ?>

<tr>
	<td><?php echo $i++ ?></td>
    <td><?php echo $field->kode_transaksi ?></td>
	<td><?php echo $field->tanggal ?></td>
    <td colspan="2"><?php echo $field->nama_pelanggan ?></td>
    <td colspan="2"><?php echo $field->nama_pegawai ?></td>
    <td><?php echo $field->total_akhir ?></td>
    <?php $total=$total+$field->total_akhir; ?>
 </tr>


<?php } ?>
<tr>
	<td colspan="7"><b>Total</b></td>
	<td><?php echo $total; ?></td>
</tr>
</tbody>

</table>