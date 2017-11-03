<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penjualan_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil_filter($where)
	{
		$this->db->where('kode_transaksi',$where);
		return $this->db->get('penjualan');
	}
	public function tampil_total()
	{
		$this->db->order_by("tanggal", "desc");
		return $this->db->get('penjualan_total');
	}
	public function tampil_total_filter($where)
	{
		$this->db->order_by("tanggal", "desc");
		$this->db->where('kode_transaksi',$where);
		return $this->db->get('penjualan_total');
	}
		public function total_filter($where)
	{
		$this->db->select('SUM(total) as total');
		$this->db->from('penjualan');
		$this->db->where('kode_transaksi',$where);
		return $this->db->get()->row()->total;
	}
	public function delete($data){
	$this->db->where('kode_transaksi',$data['kode_transaksi']);
	$this->db->delete('penjualan',$data);
	$this->db->delete('penjualan_total',$data);
	}
	public function tampil_limit()
	{
		$this->db->order_by("tanggal", "desc");
		$this->db->limit(10);
		return $this->db->get('penjualan_total');	
	}
	function tampil_pertanggal($tanggal1,$tanggal2)
    {
        $this->db->select('*');
		$this->db->from('penjualan_total');

		$this->db->where("tanggal BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')");
		return $this->db->get()->result();
    }
	function tampil_pertanggal_periode($tanggal1,$tanggal2)
    {
        $this->db->select('*');
		$this->db->from('penjualan_total');
		$this->db->where("tanggal BETWEEN DATE_SUB(date('" . $tanggal . "'),INTERVAL " .  $keyword . " day) AND  date('" . $tanggal2 . "')");
		return $this->db->get()->result();
    }

	public function jumlah_pertanggal($tanggal1,$tanggal2)
	{
		$this->db->select('*');
		$this->db->from('penjualan_total');
		$this->db->where("tanggal BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')");
		return $this->db->count_all_results();
	}
	public function jumlah()
	{
		$this->db->select('*');
		$this->db->from('penjualan_total');
		return $this->db->count_all_results();
	}
	
	public function jumlah_penjualan($where)
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->where('kode_transaksi',$where);	
		return $this->db->count_all_results();
	}

	function tampil_pertanggal_row($tanggal1,$tanggal2)
    {
        $this->db->select('*');
		$this->db->from('penjualan_total');
		$this->db->where("tanggal BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')");
		return $this->db->get();
    }
	public function tampil_tot()
	{
		$this->db->select('*');
		$this->db->order_by("tanggal", "desc");
		return $this->db->get('penjualan_total');
	}
	public function tampil_id($where)
	{
		$this->db->where('id',$where);
		return $this->db->get('penjualan');
	}
}