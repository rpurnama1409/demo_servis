<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembelian_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

		public function total_filter($where)
	{
		$this->db->select('SUM(total) as total');
		$this->db->from('pembelian');
		$this->db->where('kode_pembelian',$where);
		return $this->db->get()->row()->total;
	}	

		function tampil_pertanggal($tanggal1,$tanggal2)
    {
        $this->db->select('*');
		$this->db->from('pembelian_total');

		$this->db->where("checkout = 'Y' AND tanggal_pembelian BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')");
		return $this->db->get()->result();
    }

    public function jumlah()
	{
		$this->db->select('*');
		$this->db->from('pembelian_total');
		$this->db->where("checkout='Y'");
		return $this->db->count_all_results();
	}
	
		public function jumlah_pertanggal($tanggal1,$tanggal2)
	{
		$this->db->select('*');
		$this->db->from('pembelian_total');
		$this->db->where("checkout='Y' AND tanggal_pembelian BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')");
		return $this->db->count_all_results();
	}

	function tampil_pertanggal_row($tanggal1,$tanggal2)
    {
        $this->db->select('*');
		$this->db->from('pembelian_total');
		$this->db->where("checkout='Y' AND tanggal_pembelian BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')");
		return $this->db->get();
    }
	public function tampil_tot()
	{
		$this->db->select('*');
		$this->db->where("checkout='Y'");
		$this->db->order_by("tanggal_pembelian", "desc");
		return $this->db->get('pembelian_total');
	}
}
