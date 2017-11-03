<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutang extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');

	}

	public function bayar(){
		$sisa 	   = $this->input->post('sisa');
		$jml_bayar = $this->input->post('jml_bayar');

		$where = array('id' 			=> $this->input->post('id') , );
		if ($sisa<=0) {
			$data = array('jumlah_hutang' 	=> $sisa,
						  'jumlah_bayar' 	=> $jml_bayar,
						  'status'			=> 'LUNAS'
						 );
		}else{
			$data = array('jumlah_hutang' 	=> $sisa ,
						  'jumlah_bayar' 	=> $jml_bayar,
						 );	
		}
		
		$this->umum_model->update('hutang',$data,$where);
		$this->session->set_flashdata('sukses','Data Pembayaran disimpan');
		redirect('home');
	}

}
