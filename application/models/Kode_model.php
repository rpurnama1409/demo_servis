<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kode_model extends CI_Model
{
	public function __construct(){
		$this->load->database();
	}
	public function kode_penjualan(){
            $this->db->select('Right(penjualan.kode_transaksi,4) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('penjualan');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;
            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "PNJ".$kodemax;
            return $kodejadi;
    }
    public function kode_servis()
    {
   $karakter = '1234567890';   
    $string = '';   
    for($i = 0; $i < 6; $i++) {   
    $pos = rand(0, strlen($karakter)-1);   
    $string .= $karakter{$pos};   
    }   
    $where = array('kode' => $string );
    $this->db->where($where);
    $query = $this->db->get('temp_kode_sr');
    if($query->num_rows() <> 0){
        //jika kode ternyata sudah ada.
        $data = $query->row();
        $kode = intval($data->kode) + 1;
        $kodejadi = "S".$kode;    
    }else{
    //    jika kode belum ada
        $kode = $string;
        $kodejadi = "S".$kode;
    }
    return $kodejadi;        
    }

    public function kode_pk()
    {
    $karakter = '1234567890';   
    $string = '';   
    for($i = 0; $i < 6; $i++) {   
    $pos = rand(0, strlen($karakter)-1);   
    $string .= $karakter{$pos};   
    }   
    $where = array('kode' => $string );
    $this->db->where($where);
    $query = $this->db->get('temp_kode_tr');
    if($query->num_rows() <> 0){
        //jika kode ternyata sudah ada.
        $data = $query->row();
        $kode = intval($data->kode) + 1;
        $kodejadi = "K".$kode;    
    }else{
    //    jika kode belum ada
        $kode = $string;
        $kodejadi = "K".$kode;
    }
    return $kodejadi;        
    }

    function kode_pegawai(){
          $this->db->select('Right(pegawai.kode_pegawai,4) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('pegawai');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "PG".$kodemax;
            return $kodejadi;

    }

    function kode_pembelian(){
        $this->db->select('Right(pembelian.kode_pembelian,4) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('pembelian');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "PMB".$kodemax;
            return $kodejadi;
    }
    function kode_pelanggan(){
        $this->db->select('Right(pelanggan.kode_plg,4) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('pelanggan');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "PLG".$kodemax;
            return $kodejadi;
    }

    function kode_supplier(){
        $this->db->select('Right(supplier.kode_supplier,4) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('supplier');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "SPL".$kodemax;
            return $kodejadi;
    }
    
    function kode_akun(){
        $this->db->select('Right(kas_keluar.kode_akun,5) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('kas_keluar');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,5,"0",STR_PAD_LEFT);
            $kodejadi  = "BY".$kodemax;
            return $kodejadi;
    }
    function kode_penggajian(){
        $this->db->select('Right(penggajian.kode_penggajian,4) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('penggajian');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "GJ".$kodemax;
            return $kodejadi;
    }
    function kode_retur(){
        $this->db->select('Right(barang_retur.kode_retur,4) as kode ',false);
            $this->db->order_by('id_retur', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('barang_retur');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }
            $kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
            $kodejadi  = "RTR".$kodemax;
            return $kodejadi;
    }
}