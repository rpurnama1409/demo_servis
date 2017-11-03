<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Umum_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}

	public function tampil($table)
	{
		$this->db->order_by("id", "desc");
		return $this->db->get($table);
	}
	public function tampil_filter($table,$where)
	{
		$this->db->order_by("id", "desc");
		$this->db->where($where);
		return $this->db->get($table);
	}
	public function input_data($table,$data){
		$this->db->insert($table,$data);
	}

	public function edit_data($table,$where){
		return $this->db->get_where($table,$where);
	}
	public function update($table,$data,$where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function delete($table,$data,$where){
	$this->db->where($where,$data[$where]);
	$this->db->delete($table,$data);
	}
	public function delete_multi($table,$data,$where){
	$this->db->where($where);
	$this->db->delete($table,$data);
	}
	public function total_data($where)
	{
		$this->db->select('*');
		$this->db->from($where);
		return $this->db->count_all_results();
	}
	public function laporan($table,$wherefil,$whereval,$datafil,$dataval)
	{
		$this->db->where($wherefil,$whereval);
		$this->db->order_by($datafil,$dataval);
		return $this->db->get($table);
	}
	public function laporan_filter($table,$wherefil,$whereval)
	{
		$this->db->where($wherefil,$whereval);
		return $this->db->get($table);
	}
	public function laporan_urut($table,$datafil,$dataval)
	{
		$this->db->order_by($datafil,$dataval);
		return $this->db->get($table);
	}
	public function retur(){
		$data = array();
		$this->db->select("*");
		$this->db->from("barang_retur");
		$this->db->join("produk", "produk.id = barang_retur.id_produk");
		$this->db->join("supplier", "supplier.id = barang_retur.id_supplier");
		$this->db->where("status","list_retur");
		$this->db->order_by("tanggal","desc");
		return $this->db->get();
	}

}