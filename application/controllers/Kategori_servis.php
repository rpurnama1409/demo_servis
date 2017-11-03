<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_servis extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['kon'] != 'Y' OR $check['konks'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

	public function index() {
		$tabel = $this->umum_model->tampil('kategori_servis');
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Kategori Servis - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Konfigurasi',
						'url2'				=> 'kategori_servis',
						'head2'				=> 'Kategori Servis',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Kategori Servis',
						'tambah'			=> 'kategori_servis/tambah',
						'delete'			=> 'kategori_servis/delete/',
						'field'				=> $tabel->result(),
						'load_edit'			=> 'loader_data/kategori_servis',
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'konfigurasi/kategori_servis/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
	$data = array(
		'nama_kategori' => $this->input->post('nama_kategori'),
	);
	$this->umum_model->input_data('kategori_servis',$data);
	$this->session->set_flashdata('sukses','Data Kategori Servis Telah Ditambahkan.');
	redirect('kategori_servis');		
	}

	public function delete($where){
		$data = array('id' => $where);
		$this->umum_model->delete('kategori_servis',$data,'id');
		$this->session->set_flashdata('sukses','Data Kategori Servis Telah Dihapus');
		redirect('kategori_servis');
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
		'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('kategori_servis',$data,$where);
		$this->session->set_flashdata('sukses','Data Kategori Servis Telah Diubah');
		redirect('kategori_servis');
	}

}
