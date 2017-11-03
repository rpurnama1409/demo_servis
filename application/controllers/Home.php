<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');	
		$this->load->model('barang_model');	
		$this->load->model('login_model');	
		$this->load->model('penjualan_model');	
		$this->load->model('servis_model');	
		$this->load->model('kode_model');	
		$check = $this->session->userdata('level');
		if($check == '')
		{
			redirect('log/out');
		}
	}
	public function index() {
	$where2 = array('MONTH(tanggal_lahir)' => date('m') ,
					'DAY(tanggal_lahir)'	 => date('d')
					 );
	$daftar_ultah = $this->umum_model->tampil_filter('pelanggan',$where2);
	$where = array('level' 	 => $this->session->userdata('level'));
	$where3 = array('jenis'	 => 'piutang',
					'status' => 'BELUM LUNAS',
					);

	$where4 = array('jenis'	 => 'hutang',
					'status' => 'BELUM LUNAS',
					);
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Dashboard - Service Center',
						'url'				=> 'admin/home',
						'head'				=> 'Dashboard',
						'url2'				=> '#',
						'head2'				=> '',
						'url3'				=> '#',
						'head3'				=> '',
						'bnyk'				=> $this->barang_model->jumlah(),
						'tambah'			=> 'pembelian/tambah',
						'kode_supplier'		=> $this->kode_model->kode_supplier(),
						'kode_pembelian' 	=> $this->kode_model->kode_pembelian(),
						'supplier_barang'	=> $this->umum_model->tampil('supplier')->result(),
						'sales'				=> $this->umum_model->tampil('pegawai')->result(),
						'nama' 				=> $this->session->userdata('nama'),
						'field'				=> $this->barang_model->stok(),
						'last3'				=> $this->penjualan_model->tampil_limit()->result(),
						'last2'				=> $this->servis_model->tampil_limit()->result(),
						'last'				=> $this->login_model->tampil_limit()->result(),
						'piutang'			=> $this->umum_model->tampil_filter('hutang',$where3)->result(),
						'hutang'			=> $this->umum_model->tampil_filter('hutang',$where4)->result(),
						'isi'				=> 'home',
						'view'				=> 'loader_data/piutang_view',
						'load_edit'			=> 'loader_data/piutang_bayar',
						'daftar_ultah'		=> $daftar_ultah->result(),
						'cek'				=> $daftar_ultah->num_rows(),
			);
		$this->load->view('layout/wrapper',$data);
	}
}
