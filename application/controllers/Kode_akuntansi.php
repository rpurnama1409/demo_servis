<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode_akuntansi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['kon'] != 'Y' OR $check['konkoa'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

	public function index() {
		$tabel = $this->umum_model->tampil('kode_akuntansi');
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Kode Akuntansi - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Konfigurasi',
						'url2'				=> 'kode_akuntansi',
						'head2'				=> 'Kode Akuntansi',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Kode Akuntansi',
						'tambah'			=> 'kode_akuntansi/tambah',
						'delete'			=> 'kode_akuntansi/delete/',
						'field'				=> $tabel->result(),
						'load_edit'			=> 'loader_data/kode_akuntansi',
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'konfigurasi/kode_akuntansi/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
		$data = array(
			'kode' 				=> $this->input->post('kode'),
			'nama_akuntansi' 	=> $this->input->post('nama_akuntansi'),
		);
		$this->umum_model->input_data('kode_akuntansi',$data);
		$this->session->set_flashdata('sukses','Data Kode Akuntansi Telah Ditambahkan.');
		redirect('kode_akuntansi');		
	}

	public function delete($where){
		$data = array('id' => $where);
		$this->umum_model->delete('kode_akuntansi',$data,'id');
		$this->session->set_flashdata('sukses','Data Kode Akuntansi Telah Dihapus');
		redirect('kode_akuntansi');
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
			'kode' 				=> $this->input->post('kode'),
			'nama_akuntansi' 	=> $this->input->post('nama_akuntansi'),
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('kode_akuntansi',$data,$where);
		$this->session->set_flashdata('sukses','Data Kode Akuntansi Telah Diubah');
		redirect('kode_akuntansi');
	}
}
