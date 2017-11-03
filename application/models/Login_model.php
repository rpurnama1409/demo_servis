<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model{
		public function __construct(){
		$this->load->database();
	}
	public function tampil()
	{
		$this->db->order_by("tanggal", "asc");
		return $this->db->get('data_operator');
	}
	function cek($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('data_operator');
	}
	function cek_pegawai($pegawai){
		$this->db->where('nama', $pegawai);
		return $this->db->get('data_operator');
	}
		public function update($data,$where){
		$this->db->where($where);
		$this->db->update('data_operator',$data);
	}
	public function tampil_limit()
	{
		$this->db->order_by("tanggal", "asc");
		$this->db->limit(10);
		return $this->db->get('data_operator');	
	}
}