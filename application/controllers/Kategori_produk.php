<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['kon'] != 'Y' OR $check['konkp'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

	public function index() {
		$tabel = $this->umum_model->tampil('kategori_produk');
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Kategori Produk - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Konfigurasi',
						'url2'				=> 'kategori_produk',
						'head2'				=> 'Kategori Produk',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Kategori Produk',
						'tambah'			=> 'kategori_produk/tambah',
						'delete'			=> 'kategori_produk/delete/',
						'load_edit'			=> 'loader_data/kategori_produk',
						'field'				=> $tabel->result(),
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'konfigurasi/kategori_produk/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
	$data = array(
		'nama_kategori' => $this->input->post('nama_kategori'),
	);
	$this->umum_model->input_data('kategori_produk',$data);
	$this->session->set_flashdata('sukses','Data Kategori Produk Telah Ditambahkan.');
	redirect('kategori_produk');		
	}

	public function delete($where){
		$data = array('id' => $where);
		$this->umum_model->delete('kategori_produk',$data,'id');
		$this->session->set_flashdata('sukses','Data Kategori Produk Telah Dihapus');
		redirect('kategori_produk');
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
		'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('kategori_produk',$data,$where);
		$this->session->set_flashdata('sukses','Data Kategori Produk Telah Diubah');
		redirect('kategori_produk');
	}
}
