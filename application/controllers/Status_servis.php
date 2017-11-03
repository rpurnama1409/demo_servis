<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_servis extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['kon'] != 'Y' OR $check['konss'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

	public function index() {
		$tabel = $this->umum_model->tampil('status_servis');
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Status Servis - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Konfigurasi',
						'url2'				=> 'status_servis',
						'head2'				=> 'Status Servis',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Status Servis',
						'tambah'			=> 'status_servis/tambah',
						'delete'			=> 'status_servis/delete/',
						'field'				=> $tabel->result(),
						'load_edit'			=> 'loader_data/status_servis',
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'konfigurasi/status_servis/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
	$data = array(
		'nama_status' => $this->input->post('nama_status'),
	);
	$this->umum_model->input_data('status_servis',$data);
	$this->session->set_flashdata('sukses','Data Status Servis Telah Ditambahkan.');
	redirect('status_servis');		
	}

	public function delete($where){
		$data = array('id' => $where);
		$this->umum_model->delete('status_servis',$data,'id');
		$this->session->set_flashdata('sukses','Data Status Servis Telah Dihapus');
		redirect('status_servis');
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
		'nama_status' => $this->input->post('nama_status'),
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('status_servis',$data,$where);
		$this->session->set_flashdata('sukses','Data Status Servis Telah Diubah');
		redirect('status_servis');
	}
}