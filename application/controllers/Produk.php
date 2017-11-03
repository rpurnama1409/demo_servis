<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['pr'] != 'Y' OR $log = '')
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
						'title' 			=> 'Produk - Demo Servis',
						'url'				=> 'produk',
						'head'				=> 'Produk',
						'url2'				=> '#',
						'head2'				=> '',
						'url3'				=> '#',
						'tabel'				=> 'Tabel Data Produk',
						'tambah'			=> 'produk/tambah',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'field'				=> $this->umum_model->tampil('produk')->result(),
						'kategori'			=> $this->umum_model->tampil('kategori_produk')->result(),
						'jenis'				=> $this->umum_model->tampil('jenis_produk')->result(),
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'produk/list',
						'load_edit'			=> 'loader_data/produk_edit',
						'view'				=> 'loader_data/produk_view',
			);
		$this->load->view('layout/wrapper',$data);
	}

		public function tambah(){
		$tipe_item = $this->input->post('tipe_item');
		if($tipe_item == 'Jasa'){
		$stok = '1';
		}else{
		$stok = '0';
		}
		$data = array(
			'kode_item'			=> $this->input->post('kode_item'),
			'barcode'		    => $this->input->post('barcode'),
			'tipe_item'			=> $tipe_item,
			'kategori'			=> $this->input->post('kategori'),
			'jenis_item' 		=> $this->input->post('jenis_item'),
			'nama_item' 		=> $this->input->post('nama_item'),
			'harga_pokok' 		=> $this->input->post('harga_pokok'),
			'hj_user'			=> $this->input->post('hj_user'),
			'hj_dealer'			=> $this->input->post('hj_dealer'),
			'stok_minimal'		=> $this->input->post('stok'),
			'stok'      		=> $stok,
			'hpp'				=> $this->input->post('hpp'),
			'pendapatan_jual'	=> $this->input->post('pendapatan_jual'),
			'pendapatan_jasa'	=> $this->input->post('pendapatan_jasa'),
			'persediaan'		=> $this->input->post('persediaan')

		);
		$this->umum_model->input_data('produk',$data);
		$this->session->set_flashdata('sukses','Data produk telah ditambahkan');
		redirect('produk');
	}

	public function update(){
		$id 				= $this->input->post('id');
		$data = array(
			'kode_item'			=> $this->input->post('kode_item'),
			'barcode'		    => $this->input->post('barcode'),
			'kategori'			=> $this->input->post('kategori'),
			'jenis_item' 		=> $this->input->post('jenis_item'),
			'nama_item' 		=> $this->input->post('nama_item'),
			'harga_pokok' 		=> $this->input->post('harga_pokok'),
			'hj_user'			=> $this->input->post('hj_user'),
			'hj_dealer'			=> $this->input->post('hj_dealer'),
			'stok_minimal'		=> $this->input->post('stok'),
			'hpp'				=> $this->input->post('hpp'),
			'pendapatan_jual'	=> $this->input->post('pendapatan_jual'),
			'pendapatan_jasa'	=> $this->input->post('pendapatan_jasa'),
			'persediaan'		=> $this->input->post('persediaan')
			);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('produk',$data,$where);
		$this->session->set_flashdata('sukses','Data produk telah diubah');
		redirect('produk');
	}

	public function hapus($id){
		$data = array('id' => $id);
		$this->umum_model->delete('produk',$data,'id');
		$this->session->set_flashdata('sukses','Data Produk telah dihapus');
		redirect('produk');
	}

		public function history($id) {
				$data = array('id' => $id);
				$load_produk = $this->umum_model->tampil_filter('produk',$data);
				$produk 	 = $load_produk->row_array();
				$nama_produk = $produk['nama_item'];
				$where = array('nama_produk' => $nama_produk );
				$wherel = array('level' => $this->session->userdata('level'));
				$data  = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$wherel)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'History pembelian  - Demo Servis',
						'url'				=> 'produk',
						'head'				=> 'Produk',
						'url2'				=> 'history',
						'head2'				=> 'History pembelian',
						'url3'				=> '#',
						'tabel'				=> 'Tabel History Pembelian Produk',
						'tambah'			=> 'produk/tambah',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'nama_produk'		=> $produk['nama_item'],
						'field'				=> $this->umum_model->tampil_filter('pembelian',$where)->result(),
						'kategori'			=> $this->umum_model->tampil('kategori_produk')->result(),
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'produk/history',
						'load_edit'			=> 'loader_data/produk_edit',
						'view'				=> 'loader_data/produk_view',
			);

		$this->load->view('layout/wrapper',$data);
	}

	public function cari_barang(){
	$barcode = $this->input->post('barcode');
    $kata = str_split($barcode);
    if($kata[0] == '' OR $kata[0] == '-' OR $kata[0] == ' '){
    $field  = $this->db->query("SELECT * FROM produk WHERE kode_item='$barcode'");    
    }else{
    $field  = $this->db->query("SELECT * FROM produk WHERE kode_item='$barcode' OR barcode='$barcode' AND tipe_item='Barang'");
    } 
    $record = $field->row_array(); 
		$data = array(
            'nama'      =>  $record['nama_item'],
            'jenis'   	=>  $record['jenis_item'],
        	'id'		=> $record['id']);
 echo json_encode($data);
	}

	  public function validation(){
    $kode_item = $this->input->post('kode_item');
    $query = $this->db->query("SELECT * FROM produk WHERE kode_item='$kode_item'");
    $cek = $query->num_rows();
    $data = array('cek' => $cek, );

    echo json_encode($data);
  }
}

