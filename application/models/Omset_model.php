<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Omset_model extends CI_Model
{
	public function omset(){
	$tahun=date('Y');
	return $this->db->query("SELECT MONTH(tanggal) AS bulan, SUM(total_akhir) AS omset FROM penjualan_total WHERE YEAR(tanggal)='$tahun' GROUP BY MONTH(tanggal)");
	}
}
?>