<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('kode_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['mem'] != 'Y' OR $check['memsup'] != 'Y' OR $log = '')
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
						'title' 			=> 'Supplier - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Member',
						'url2'				=> 'supplier',
						'head2'				=> 'Supplier',
						'url3'				=> '#',
						'head3'				=> '',
						'tabel'				=> 'Tabel Data Supplier',
						'tambah'			=> 'supplier/tambah',
						'field' 			=> $this->umum_model->tampil('supplier')->result(),
						'url4'				=> '#',
						'head4'				=> '',
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'member/supplier/list',
						'load_edit'			=> 'loader_data/supplier_edit',
						'view'				=> 'loader_data/supplier_view',
						'kode_supplier' 	=> $this->kode_model->kode_supplier()
			);
		$this->load->view('layout/wrapper',$data);
	}
	public function tambah(){
	$data = array(
		'kode_supplier'	 => $this->input->post('kode_supplier'),
		'nama_supplier'  => $this->input->post('nama_supplier'),
		'kota_negara'	 => $this->input->post('kota_negara'),
		'nomor_hp'		 => $this->input->post('nomor_hp'), 
		'kontak_person'  => $this->input->post('kontak_person'),
		'acc'		     => $this->input->post('acc')	
	);
	$this->umum_model->input_data('supplier',$data);
	$this->session->set_flashdata('sukses','Data Supplier Telah Ditambahkan.');
	redirect('supplier');		
	}

	public function supplier_baru(){
	$data = array(
		'kode_supplier'	 => $this->input->post('value'),
		'nama_supplier'  => $this->input->post('value2'),
		'kota_negara'	 => $this->input->post('value3'),
		'nomor_hp'		 => $this->input->post('value4'), 
		'kontak_person'  => $this->input->post('value5'),
		'acc'		     => $this->input->post('value6')	
	);
	$this->umum_model->input_data('supplier',$data);
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
		'kode_supplier'	 => $this->input->post('kode_supplier'),
		'nama_supplier'  => $this->input->post('nama_supplier'),
		'kota_negara'	 => $this->input->post('kota_negara'),
		'nomor_hp'		 => $this->input->post('nomor_hp'), 
		'kontak_person'  => $this->input->post('kontak_person'),
		'acc'		     => $this->input->post('acc')	
		);

		$where = array(
			'id' => $id
			);
		$this->umum_model->update('supplier',$data,$where);
		$this->session->set_flashdata('sukses','Data Supplier telah diubah');
		redirect('supplier');
	}

	public function hapus($id){
		$data = array('id' => $id);
		$this->umum_model->delete('supplier',$data,'id');
		$this->session->set_flashdata('sukses','Data Supplier telah dihapus');
		redirect('supplier');
	}
}
