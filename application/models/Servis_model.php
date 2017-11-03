<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Servis_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil_filter($where)
	{
		$this->db->where($where);
		$this->db->order_by("tanggal", "desc");
		return $this->db->get('servis');
	}
	public function jumlah($where)
	{
		$this->db->select('*');
		$this->db->from('servis');
		$this->db->where($where);
		return $this->db->count_all_results();
	}
	public function tampil_limit()
	{
		$this->db->order_by("tanggal", "desc");
		$this->db->limit(10);
		return $this->db->get('servis');	
	}
	function cetak_tandaterima($where)
	{
		$this->db->select('*');
		$this->db->from('servis');
		$this->db->join('pelanggan','servis.nama_pelanggan = pelanggan.nama_pelanggan');
	    $this->db->where($where);
	    return $this->db->get();
	}
	public function tampil()
	{
		$this->db->order_by("tanggal", "desc");
		return $this->db->get('servis');
	}
}