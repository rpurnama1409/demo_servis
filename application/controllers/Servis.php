<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servis extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('penjualan_model');
		$this->load->model('kode_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['s'] != 'Y' OR $log = '')
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
						'title' 			=> 'Servis - Demo Servis',
						'url'				=> 'servis',
						'head'				=> 'Servis',
						'url2'				=> '#',
						'head2'				=> '',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Data Servis',
						'tambah'			=> 'servis/tambah',
						'edit'				=> 'servis/edit/',
						'delete'			=> 'servis/delete/',
						'view'				=> 'servis/view/',
						'trs'				=> 'servis/trs/',
						'load_edit'			=> 'loader_data/servis',
						'view'			=> 'loader_data/viewservis',
						'kode'				=> $this->kode_model->kode_servis(),
						'nama' 				=> $this->session->userdata('nama'),
						'kode_pelanggan'	=> $this->kode_model->kode_pelanggan(),
						'pel'				=> $this->umum_model->tampil('pelanggan')->result(),
						'statusservis'		=> $this->umum_model->tampil('status_servis')->result(),
						'peg'				=> $this->umum_model->tampil('pegawai')->result(),
						'kategori'			=> $this->umum_model->tampil('kategori_servis')->result(),
						'field'				=> $this->umum_model->tampil('servis')->result(),
						'isi'				=> 'servis/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
	 $batas_garansi = date('Y-m-d',strtotime( $this->input->post('batas_garansi')));
	$data = array(
		'kode_servis' 			=> $this->input->post('kode_servis'),
		'nama_pelanggan' 		=> $this->input->post('nama_pelanggan'),
		'kategori' 				=> $this->input->post('kategori'),
		'unit' 					=> $this->input->post('unit_servis'),
		'status_garansi' 		=> $this->input->post('status_garansi'),
		'batas_garansi' 		=> $batas_garansi,
		'snid' 					=> $this->input->post('snid'),
		'keluhan' 				=> $this->input->post('keluhan'),
		'kelengkapan' 			=> $this->input->post('kelengkapan'),
		'catatan' 				=> $this->input->post('catatan'),
		'status_servis' 		=> $this->input->post('status_servis'),
		'nama_pegawai' 			=> $this->input->post('nama_pegawai'),
		'operator' 				=> $this->session->userdata('nama'),
		'tanggal' 				=> date("Y-m-d"),

	);
	$this->umum_model->input_data('servis',$data);
	$this->session->set_flashdata('sukses','Data Servis Telah Ditambahkan.');
	redirect('servis');		
	}
	
	public function delete($where){
		$data = array('kode_servis' => $where);
		$this->umum_model->delete('servis',$data,'kode_servis');
		$this->session->set_flashdata('sukses','Data Servis Telah Dihapus');
		redirect('servis');
	}

	public function trs($snid) {
		$where = array('level' => $this->session->userdata('level'));
		$data = array('snid' => $snid,);
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Transaksi Buka Nota - Demo Servis',
						'url'				=> 'servis',
						'head'				=> 'Servis',
						'url2'				=> 'servis/trs',
						'head2'				=> 'Transaksi Buka Nota',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Transaksi Buka Nota',
						'nama' 				=> $this->session->userdata('nama'),
						'field'				=> $this->umum_model->tampil_filter('servis',$data,'snid')->row_array(),
						'field2'			=> $this->umum_model->tampil_filter('servis',$data,'snid')->result(),
						'isi'				=> 'servis/histori'
			);
		$this->load->view('layout/wrapper',$data);
	}
	
	public function update(){
	 $kode_servis = $this->input->post('kode_servis');
	 $batas_garansi = date('Y-m-d',strtotime( $this->input->post('batas_garansi')));
	$data = array(
		'kode_servis' 			=> $kode_servis,
		'nama_pelanggan' 		=> $this->input->post('nama_pelanggan'),
		'kategori' 				=> $this->input->post('kategori'),
		'unit' 					=> $this->input->post('unit_servis'),
		'status_garansi' 		=> $this->input->post('status_garansi'),
		'batas_garansi' 		=> $batas_garansi,
		'snid' 					=> $this->input->post('snid'),
		'keluhan' 				=> $this->input->post('keluhan'),
		'kelengkapan' 			=> $this->input->post('kelengkapan'),
		'catatan' 				=> $this->input->post('catatan'),
		'status_servis' 		=> $this->input->post('status_servis'),
		'nama_pegawai' 			=> $this->input->post('nama_pegawai'),
		'operator' 				=> $this->session->userdata('nama'),
		'tanggal' 				=> date("Y-m-d"),

	);
	
	$where = array('kode_Servis' => $kode_servis);
	$this->umum_model->update('servis',$data,$where);
	$this->session->set_flashdata('sukses','Data Servis Telah Ditambahkan.');
	redirect('servis');		
	}
}
