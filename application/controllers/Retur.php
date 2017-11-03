<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('kode_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['pr'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

	public function index() {
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Retur barang - Demo Servis',
						'url'				=> 'retur',
						'head'				=> 'Retur',
						'url2'				=> '#',
						'head2'				=> '',
						'url3'				=> '#',
						'tabel'				=> 'Tabel Data Retur Barang',
						'tambah'			=> 'retur/tambah',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'field'				=> $this->umum_model->retur()->result(),
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'retur/list',
						'load_edit'			=> 'loader_data/edit_retur',
						'kode_retur' 		=> $this->kode_model->kode_retur(),
						'sales'				=> $this->umum_model->tampil('pegawai')->result(),
						'supplier'			=> $this->umum_model->tampil('supplier')->result(),
				);
		$this->load->view('layout/wrapper',$data);
	}
	public function tambah(){
		$qty 		= $this->input->post('qty');
		$id_produk  = $this->input->post('id_produk');
		$tanggal 	= date('Y-m-d',strtotime($this->input->post('tanggal'))); 
		//pengurangan stok produk
		$where 	= array('id' => $id_produk , );
		$produk = $this->umum_model->tampil_filter('produk',$where)->row_array();
		$stok_update = $produk['stok']-$qty;
		//update stok
		$where2 = array(
			'id' => $id_produk
			);
		$data2  = array('stok' => $stok_update , );
		$this->umum_model->update('produk',$data2,$where2);
		//simpan data di tabel retur	
			$data = array(
			'kode_retur'	=> $this->input->post('kode_retur'),
			'id_produk'		=> $id_produk,
			'id_supplier'	=> $this->input->post('id_supplier'),
			'qty'			=> $qty,
			'tanggal'		=> $tanggal,
			'status'		=> 'list_retur',
			'sales/teknisi'	=> $this->input->post('sales'),

		);
		$this->umum_model->input_data('barang_retur',$data);
		$this->session->set_flashdata('sukses','Data Retur barang disimpan');
		redirect('retur');
	}
	public function proses(){
		$qty = $this->input->post('qty');
		$kembali_stok = $this->input->post('kembali_stok');
		$id_produk  = $this->input->post('id_produk');
		$id_retur  = $this->input->post('id_retur');
		//pengembalian stok produk
		$where 	= array('id' => $id_produk , );
		$produk = $this->umum_model->tampil_filter('produk',$where)->row_array();
		$stok_update = $produk['stok']+$kembali_stok;
		//update stok
		$where2 = array(
			'id' => $id_produk
			);
		$data2  = array('stok' => $stok_update , );
		$this->umum_model->update('produk',$data2,$where2);
		//update status retur
		$where3 = array(
			'id_retur' => $id_retur
			);
		if($kembali_stok<$qty){
			$status = 'kembali stok sebagian';
		}elseif($kembali_stok==$qty){
			$status = 'kembali stok';
		}elseif ($kembali_stok=='') {
			$status = 'kembali uang';
		}
		$data3  = array('status' => $status , );
		$this->umum_model->update('barang_retur',$data3,$where3);
		$this->session->set_flashdata('sukses','Data Retur barang disimpan');
		redirect('retur');
	}
}

