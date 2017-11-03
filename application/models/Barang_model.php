<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Barang_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}


	public function stok()
	{
		$this->db->where("stok <= stok_minimal AND tipe_item = 'Barang'");
		$this->db->order_by("stok", "asc");
		return $this->db->get('produk');
	}
	public function jumlah()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where("stok <= stok_minimal AND tipe_item = 'Barang'");
		$this->db->limit(9);
		return $this->db->count_all_results();
	}
}