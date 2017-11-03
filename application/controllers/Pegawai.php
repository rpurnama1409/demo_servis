<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('kode_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['mem'] != 'Y' OR $check['mempeg'] != 'Y' OR $log = '')
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
						'title' 			=> 'Pegawai - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Member',
						'url2'				=> 'pegawai',
						'head2'				=> 'Pegawai',
						'nama' 				=> $this->session->userdata('nama'),
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'edit'				=> 'pegawai/update',
						'tabel'				=> 'Tabel Data Pegawai',
						'tambah'			=> 'pegawai/tambah',
						'load_edit'			=> 'loader_data/pegawai_edit',
						'view'				=> 'loader_data/pegawai_view',
						'field'				=> $this->umum_model->tampil('pegawai')->result(),
						'kode_pegawai' 		=> $this->kode_model->kode_pegawai(),
						'isi'				=> 'member/pegawai/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
	$ptgl_lahir = $this->input->post('tgl_lahir');
	$tgl_lahir = date('Y-m-d', strtotime($ptgl_lahir));

	//simpan
		$data = array(
			'kode_pegawai'	=> $this->input->post('kode_pegawai'),
			'nama_pegawai' 	=> $this->input->post('nama_pegawai'),
			'alamat' 		=> $this->input->post('alamat'),
			'tgl_lahir'		=> $tgl_lahir,
			'status' 		=> $this->input->post('status'),
			'nomor_hp' 		=> $this->input->post('nomor_hp'),
			'gaji_pokok'	=> $this->input->post('gaji_pokok'),
			'uang_kehadiran'=> $this->input->post('uang_kehadiran'),
			'uang_makan'	=> $this->input->post('uang_makan'),
			'prosentase'	=> $this->input->post('prosentase')

		);
		$this->umum_model->input_data('pegawai',$data);
		$this->session->set_flashdata('sukses','Data Pegawai telah ditambahkan');
		redirect('pegawai');
	}

		public function update(){
		$id   = $this->input->post('id');
		$ptgl_lahir = $this->input->post('tgl_lahir');
		$tgl_lahir = date('Y-m-d', strtotime($ptgl_lahir));
		$data = array(
			'kode_pegawai'	=> $this->input->post('kode_pegawai'),
			'nama_pegawai' 	=> $this->input->post('nama_pegawai'),
			'alamat' 		=> $this->input->post('alamat'),
			'tgl_lahir'		=> $tgl_lahir,
			'status' 		=> $this->input->post('status'),
			'nomor_hp' 		=> $this->input->post('nomor_hp'),
			'gaji_pokok'	=> $this->input->post('gaji_pokok'),
			'uang_kehadiran'=> $this->input->post('uang_kehadiran'),
			'uang_makan'	=> $this->input->post('uang_makan'),
			'prosentase'	=> $this->input->post('prosentase')
			);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('pegawai',$data,$where);
		$this->session->set_flashdata('sukses','Data Pegawai telah diubah');
		redirect('pegawai');
	}	

		public function hapus($id){
		$data = array('id' => $id);
		$this->umum_model->delete('pegawai',$data,'id');
		$this->session->set_flashdata('sukses','Data Pegawai telah dihapus');
		redirect('pegawai');
	}
}
