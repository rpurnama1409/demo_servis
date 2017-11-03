<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_keluar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('kode_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['ak'] != 'Y' OR $check['akkake'] != 'Y' OR $log = '')
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
						'title' 			=> 'Kas Keluar - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Akuntansi',
						'url2'				=> 'kas keluar',
						'head2'				=> 'Kas keluar',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Kas Keluar',
						'tambah'			=> 'kas_keluar/tambah',
						'delete'			=> 'kas_keluar/delete/',
						'field'				=> $this->umum_model->tampil('kas_keluar')->result(),
						'load_edit'			=> 'loader_data/kas_keluar_edit',
						'view'				=> 'loader_data/kas_keluar_view',
						'nama' 				=> $this->session->userdata('nama'),
						'kode_transaksi'	=> $this->kode_model->kode_akun(),
						'kode_akun'			=> $this->umum_model->tampil('kode_akuntansi')->result(),
						'isi'				=> 'akuntansi/kas_keluar/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
	$data = array(
		'kode_transaksi' => $this->input->post('kode_transaksi'),
		'kode_akun' => $this->input->post('kode_akun'),
		'nama_akun' => $this->input->post('nama_akun'),
		'tanggal' 	=> date('Y-m-d'),
		'no_bukti' 	=> $this->input->post('no_bukti'),
		'nominal' 	=> $this->input->post('nominal'),
	);
	$this->umum_model->input_data('kas_keluar',$data);
	$this->session->set_flashdata('sukses','Data Kas Keluar Telah Ditambahkan');
	redirect('kas_keluar');		
	}

	public function hapus($where){
		$data = array('id' => $where);
		$this->umum_model->delete('kas_keluar',$data,'id');
		$this->session->set_flashdata('sukses','Data Kas Keluar Telah Dihapus');
		redirect('kas_keluar');
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
		'kode_transaksi' => $this->input->post('kode_transaksi'),
		'kode_akun' => $this->input->post('kode_akun'),
		'nama_akun' => $this->input->post('nama_akun'),
		'tanggal' 	=> date('Y-m-d'),
		'no_bukti' 	=> $this->input->post('no_bukti'),
		'nominal' 	=> $this->input->post('nominal'),
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('kas_keluar',$data,$where);
		$this->session->set_flashdata('sukses','Data Kas Keluar Telah Diubah');
		redirect('kas_keluar');
	}
	public function load_akun(){
	$kode_akun = $this->input->post('kode_akun');
	$where = array(
      'kode'=>$kode_akun
      );
    $field  = $this->umum_model->tampil_filter('kode_akuntansi',$where);
    $record = $field->row_array(); 

		$data = array(
            'nama'      =>  $record['nama_akuntansi']);
	 echo json_encode($data);
	}
}
