<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Tanggal_model extends CI_Model {

function tanggal($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);  //memecah variabel berdasarkan -
        $tanggal = $pecah[2];
        $bln = $pecah[1];
if ($bln == 1) {
$bulan = 'Januari';
}elseif ($bln == 2) {
$bulan = 'Februari';
}elseif ($bln == 3) {
$bulan = 'Maret';
}elseif ($bln == 4) {
$bulan = 'April';
}elseif ($bln == 5) {
$bulan = 'Mei';
}elseif ($bln == 6) {
$bulan = 'Juni';
}elseif ($bln == 7) {
$bulan = 'Juli';
}elseif ($bln == 8) {
$bulan = 'Agustus';
}elseif ($bln == 9) {
$bulan = 'September';
}elseif ($bln == 10) {
$bulan = 'Oktober';
}elseif ($bln == 11) {
$bulan = 'November';
}elseif ($bln == 12) {
$bulan = 'Desember';
}
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }

}