<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_operator extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['kon'] != 'Y' OR $check['konop'] != 'Y' OR $check['konopdo'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

	public function index() {
		$tabel = $this->umum_model->tampil('data_operator');
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Data Operator - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Konfigurasi',
						'url2'				=> '#link',
						'head2'				=> 'Operator',
						'url3'				=> 'data_operator',
						'head3'				=> 'Data Operator',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Data Operator',
						'tambah'			=> 'data_operator/tambah',
						'delete'			=> 'data_operator/delete/',
						'field'				=> $tabel->result(),
						'pegawai' 			=> $this->umum_model->tampil('pegawai')->result(),
						'level' 			=> $this->umum_model->tampil('level_operator')->result(),	
						'load_edit'			=> 'loader_data/data_operator',
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'konfigurasi/operator/data_operator/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
		$data = array(
			'nama'		 	=> $this->input->post('nama'),
			'username' 		=> $this->input->post('username'),
			'password' 		=> md5($this->input->post('password')),
			'level' 		=> $this->input->post('level'),
		);
		$this->umum_model->input_data('data_operator',$data);
		$this->session->set_flashdata('sukses','Data Operator Telah Ditambahkan.');
		redirect('data_operator');		
	}

	public function delete($where){
		$data = array('id' => $where);
		$this->umum_model->delete('data_operator',$data,'id');
		$this->session->set_flashdata('sukses','Data Operator Telah Dihapus');
		redirect('data_operator');
	}

	public function update(){
		$id = $this->input->post('id');
		$password = $this->input->post('password');
		if ($password == '') {
		$data = array(
			'nama'		 	=> $this->input->post('nama'),
			'username' 		=> $this->input->post('username'),
			'level' 		=> $this->input->post('level'),
		);
		}else{
		$data = array(
			'nama'		 	=> $this->input->post('nama'),
			'username' 		=> $this->input->post('username'),
			'password' 		=> md5($password),
			'level' 		=> $this->input->post('level'),
		);
		}
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('data_operator',$data,$where);
		$this->session->set_flashdata('sukses','Data Operator Telah Diubah');
		redirect('data_operator');
	}

}
