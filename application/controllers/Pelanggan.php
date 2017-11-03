<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('kode_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['mem'] != 'Y' OR $check['mempel'] != 'Y' OR $log = '')
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
						'title' 			=> 'Pelanggan - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Member',
						'url2'				=> 'pelanggan',
						'head2'				=> 'Pelanggan',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel data pelanggan',
						'tambah'			=> 'pelanggan/tambah',
						'field' 			=> $this->umum_model->tampil('pelanggan')->result(),
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'member/pelanggan/list',
						'load_edit'			=> 'loader_data/pelanggan_edit',
						'view'				=> 'loader_data/pelanggan_view',
						'kode_pelanggan' 	=> $this->kode_model->kode_pelanggan()
			);
		$this->load->view('layout/wrapper',$data);
	}
	public function tambah(){
	$date=date_create($this->input->post('tgl_lahir'));
  	$tanggal = date_format($date,"Y-m-d");
	
	$data = array(
		'kode_plg' => $this->input->post('kode_plg'),
		'nama_pelanggan' => $this->input->post('nama_pelanggan'),
		'alamat'		 => $this->input->post('alamat'),
		'kota'			 => $this->input->post('kota'),
		'tanggal_lahir'  => $tanggal,
		'status'		 => $this->input->post('status'),
		'nomor_hp'		 => $this->input->post('no_hp') 
	);
	$this->umum_model->input_data('pelanggan',$data);
	$this->session->set_flashdata('sukses','Data Pelanggan Telah Ditambahkan.');
	redirect('pelanggan');		
	}

		public function update(){
		$id = $this->input->post('id');
  	$date=date_create($this->input->post('tgl_lahir'));
  	$tanggal = date_format($date,"Y-m-d");
		$data = array(
			'kode_plg' => $this->input->post('kode_plg'),
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'alamat'		 => $this->input->post('alamat'),
			'kota'			 => $this->input->post('kota'),
			'tanggal_lahir'  => $tanggal,
			'status'		 => $this->input->post('status'),
			'nomor_hp'		 => $this->input->post('no_hp') 
		);

		$where = array(
			'id' => $id
			);
		$this->umum_model->update('pelanggan',$data,$where);
		$this->session->set_flashdata('sukses','Data Pelanggan telah diubah');
		redirect('pelanggan');
	}

		public function hapus($id){
		$data = array('id' => $id);
		$this->umum_model->delete('pelanggan',$data,'id');
		$this->session->set_flashdata('sukses','Data Pelanggan telah dihapus');
		redirect('pelanggan');
	}

  public function pelanggan_baru(){
  	$date=date_create($this->input->post('value4'));
  	$tanggal = date_format($date,"Y-m-d");
  $data = array(
    'kode_plg' 			=> $this->input->post('value'),
    'nama_pelanggan' 	=> $this->input->post('value2'),
    'alamat'     		=> $this->input->post('value5'),
    'kota'       		=> $this->input->post('value6'),
    'tanggal_lahir'  	=> $tanggal,
    'status'     		=> $this->input->post('value3'),
    'nomor_hp'     		=> $this->input->post('value7') 
  );
  $this->umum_model->input_data('pelanggan',$data);
  }

}
