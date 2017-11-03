<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_produk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['kon'] != 'Y' OR $check['konjp'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

	public function index() {
	$tabel = $this->umum_model->tampil('jenis_produk');
	$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Jenis Produk - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Konfigurasi',
						'url2'				=> 'jenis_produk',
						'head2'				=> 'Jenis Produk',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Jenis Produk',
						'tambah'			=> 'jenis_produk/tambah',
						'delete'			=> 'jenis_produk/delete/',
						'field'				=> $tabel->result(),
						'load_edit'			=> 'loader_data/jenis_produk',
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'konfigurasi/jenis_produk/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
		$data = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
		);
		$this->umum_model->input_data('jenis_produk',$data);
		$this->session->set_flashdata('sukses','Data Jenis Produk Telah Ditambahkan');
		redirect('jenis_produk');		
	}

	public function delete($where){
		$data = array('id' => $where);
		$this->umum_model->delete('jenis_produk',$data,'id');
		$this->session->set_flashdata('sukses','Data Jenis Produk Telah Dihapus');
		redirect('jenis_produk');
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('jenis_produk',$data,$where);
		$this->session->set_flashdata('sukses','Data Jenis Produk telah diubah');
		redirect('jenis_produk');
	}
}
