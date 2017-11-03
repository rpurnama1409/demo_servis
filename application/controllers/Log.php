<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	function __construct(){
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');		
		$this->load->model('servis_model');
	}

	function index(){
		$check = $this->session->userdata('nama');
		if($check != '')
		{
			redirect('home');
		}else{
		$kode = $this->input->post('kode_servis');
			if ($kode == '') {
			$where = array('kode_servis' => ' ', );
			}else{
			$where = array('kode_servis' => $kode, );
			}
		$data = array( 
			'title' => 'Halaman Login - Service Center',
			'field' => $this->servis_model->tampil_filter($where)->result(),
			);
			$this->load->view('login',$data);
		}
	}
	function in(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$cek = $this->login_model->cek($username, $password);
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$sess_data['id'] = $data->id;
				$sess_data['nama'] = $data->nama;
				$sess_data['username'] = $data->username;
				$sess_data['time'] = $data->tanggal;
				$sess_data['level'] = $data->level;
				$this->session->set_userdata($sess_data);
			}
			$id = $this->session->userdata('id');
			$where = array('id' => $id );
			$date['tanggal'] = date("Y-m-d H:i:s");
			$this->login_model->update($date,$where);
			redirect('home');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf, username dan password salah.');
			redirect('log');
		}
	}

	function out(){
		$this->session->sess_destroy();
		redirect('log');
	}
}
