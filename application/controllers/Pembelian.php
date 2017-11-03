<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('kode_model');
		$this->load->model('pembelian_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['pem'] != 'Y' OR $log = '')
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
						'title' 			=> 'Pembelian - Demo Servis',
						'url'				=> 'pembelian',
						'head'				=> 'Pembelian',
						'url2'				=> '#',
						'head2'				=> '',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel pembelian',
						'supplier_barang'	=> $this->umum_model->tampil('supplier')->result(),
						'tambah'			=> 'pembelian/tambah',
						'edit'				=> 'pembelian/edit/',					
						'delete'			=> 'pembelian/hapus/',					
						'field'				=> $this->umum_model->tampil('pembelian_total')->result(),
						'sales'				=> $this->umum_model->tampil('pegawai')->result(),
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'pembelian/list',
						'load_edit'			=> 'loader_data/pembelian_edit',
						'view'				=> 'pembelian/view/',
						'kode_supplier'	=> $this->kode_model->kode_supplier(),
						'kode_pembelian' 	=> $this->kode_model->kode_pembelian()
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
		$where = $this->input->post('kode_pembelian');
		$barcode = $this->input->post('barcode');
		$bar = array(
	      'barcode'=>$barcode
	      );
	    $field  = $this->umum_model->tampil_filter('produk',$bar);
	    if ($field->num_rows() == 1) {
	    $record = $field->row_array();
	    $kode_item = $record['kode_item'];
	    }else{
	    $kode_item = $barcode;	
	    }
		$data = array(
			'kode_pembelian'	=> $where,
			'tanggal_pembelian' => date('Y-m-d'),
			'nama_supplier' 	=> $this->input->post('nama_supplier'),
			'kode_item' 		=> $kode_item,
			'nama_produk' 		=> $this->input->post('nama_produk'),
			'qty'				=> $this->input->post('qty'),
			'harga_beli'		=> $this->input->post('harga_beli'),
			'diskon'			=> $this->input->post('diskon'),
			'diskon_percen'		=> $this->input->post('diskon_percen'),
			'total'				=> $this->input->post('total'),
			'sales'				=> $this->input->post('sales'),
			'op'				=> $this->session->userdata('nama')

		);
		$data2 = array(
			'kode_pembelian'	=> $where,
			'tanggal_pembelian' => date('Y-m-d'),
			'nama_supplier' 	=> $this->input->post('nama_supplier'),
			'total'				=> $this->input->post('total'),
			'kredit'			=> $this->input->post('total'),
			'sales'				=> $this->input->post('sales'),
			'op'				=> $this->session->userdata('nama')
		);
		$this->umum_model->input_data('pembelian',$data);
		$this->umum_model->input_data('pembelian_total',$data2);
		$this->session->set_flashdata('sukses','Data Pembelian telah ditambahkan');
		redirect('pembelian/edit/'.$where);
	}

//TAMBAH DETAIL
    public function tambah_detail(){
		$where = $this->input->post('kode_pembelian');
		$barcode = $this->input->post('barcode');
		$bar = array(
	      'barcode'=>$barcode
	      );
	    $field  = $this->umum_model->tampil_filter('produk',$bar);
	    if ($field->num_rows() == 1) {
	    $record = $field->row_array();
	    $kode_item = $record['kode_item'];
	    }else{
	    $kode_item = $barcode;	
	    }
		$data = array(
			'kode_pembelian'	=> $this->input->post('kode_pembelian'),
			'tanggal_pembelian' => $this->input->post('tanggal'),
			'tanggal_ubah'		=> date('Y-m-d'),
			'nama_supplier' 	=> $this->input->post('nama_supplier'),
			'kode_item' 		=> $kode_item,
			'nama_produk' 		=> $this->input->post('nama_produk'),
			'qty'				=> $this->input->post('qty'),
			'harga_beli'		=> $this->input->post('harga_beli'),
			'diskon'			=> $this->input->post('diskon'),
			'diskon_percen'		=> $this->input->post('diskon_percen'),
			'total'				=> $this->input->post('total'),
			'sales'				=> $this->input->post('sales'),
			'op'				=> $this->input->post('op'),

		);

		$query = $this->db->query("SELECT SUM(total) as total_akhir FROM pembelian WHERE kode_pembelian='$where'");
		$total_akhir = $query->row_array();
		$data2 = array(
			'total'     			=> $total_akhir['total_akhir']+$this->input->post('total'),
			'kredit' 				=> $total_akhir['total_akhir']+$this->input->post('total'),
			'cash'					=> '0',
		);
		$where2 = array('kode_pembelian' => $where , );
		$this->umum_model->update('pembelian_total',$data2,$where2 );
		$this->umum_model->input_data('pembelian',$data);
		$this->session->set_flashdata('sukses','Data Penjualan telah ditambahkan');
		redirect('pembelian/edit/'.$where);
    }

// END TAMBAH DETAIL
	public function hapus($kode){
		$data = array('kode_pembelian' => $kode);
		$this->umum_model->delete('pembelian',$data,'kode_pembelian');
		//hapus data hutang
		$data2 = array('kode_transaksi' => $kode);
		$this->umum_model->delete('hutang',$data2,'kode_transaksi');
		$this->umum_model->delete('pembelian_total',$data,'kode_pembelian');
		$this->session->set_flashdata('sukses','Data Pembelian telah dihapus');
		redirect('pembelian');
	}

	public function hapus_barang($id){
		$data = array('id' => $id);
		$item = $this->umum_model->tampil_filter('pembelian',$data)->row_array();
		$kode = $item['kode_pembelian'];
		$this->umum_model->delete('pembelian',$data,'id');
		$this->session->set_flashdata('sukses','Data Pembelian telah dihapus');
		redirect('pembelian/edit/'.$kode);
	}

//EDIT
	public function edit($where){
		$kodewhere  = array('kode_pembelian' => $where, );
		$where2 	= array('level' => $this->session->userdata('level'));
		$tambah 	= $this->input->post('include');
		$ukuran 	= $this->input->post('size');
		$field 		= $this->umum_model->tampil_filter('pembelian_total',$kodewhere)->row_array();
		if ($field['kredit'] >= 1) {
		$hide = '#kembalian';
		}else{
		$hide = '#kredit';
		}
		if ($tambah != '') {
					$include		= $tambah;
					$size			= $ukuran;
					$button			= 'Batal';
					}else{
					$include		= '';
					$size			= 12;
					$button			= 'Tambah';							
		}
		$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where2)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Tambah Penjualan - Demo Servis',
						'url'				=> 'pembelian',
						'head'				=> 'Pembelian',
						'url2'				=> 'pembelian/edit',
						'head2'				=> 'Edit',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'pop'       		=> 'pembelian/edit/',
						'nama' 				=> $this->session->userdata('nama'),
						'level'				=> $this->session->userdata('level'),
						'tabel'				=> 'Edit Data Pembelian '.$where,
						'include' 			=> $include,
						'size' 				=> $size,
						'checkout'			=> 'pembelian/checkout',
						'checkoutprint'		=> 'pembelian/checkout_print',
						'simpan' 			=> 'pembelian/tambah_detail',
						'load_edit'			=> 'loader_data/edit_diskon_barang_pembelian',
						'tombol'			=> $button,
						'where' 			=> $where,
						'field2'			=> $this->umum_model->tampil_filter('pembelian',$kodewhere)->result(),
						'field'				=> $field,
						'hide'              => $hide,
						'item'				=> $this->umum_model->tampil('produk')->result(),
						'jumlah'			=> $this->pembelian_model->total_filter($where),
						'isi'				=> 'pembelian/edit'
		);
		$sess_data['kode_pembelian'] = $where;
		$this->session->set_userdata($sess_data);
        $this->load->view('layout/wrapper',$data);
	}
//END EDIT

//VIEW
	public function view($where){
		$kodewhere  = array('kode_pembelian' => $where, );
		$where2 	= array('level' => $this->session->userdata('level'));
		$field 		= $this->umum_model->tampil_filter('pembelian_total',$kodewhere)->row_array();
		if ($field['kredit'] >= 1) {
		$hide = '#kembalian';
		}else{
		$hide = '#kredit';
		}

		$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where2)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Edit Penjualan - Demo Servis',
						'url'				=> 'pembelian',
						'head'				=> 'Pembelian',
						'url2'				=> 'pembelian/edit',
						'head2'				=> 'Edit',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'pop'       		=> 'pembelian/edit/',
						'nama' 				=> $this->session->userdata('nama'),
						'level'				=> $this->session->userdata('level'),
						'tabel'				=> 'Edit Data Pembelian '.$where,
						'where' 			=> $where,
						'field2'			=> $this->umum_model->tampil_filter('pembelian',$kodewhere)->result(),
						'field'				=> $field,
						'hide'              => $hide,
						'item'				=> $this->umum_model->tampil('produk')->result(),
						'jumlah'			=> $this->pembelian_model->total_filter($where),
						'isi'				=> 'pembelian/view'
		);
		$sess_data['kode_transaksi'] = $where;
		$this->session->set_userdata($sess_data);
        $this->load->view('layout/wrapper',$data);
	}
//END VIEW

//EDIT DISKON
    public function edit_diskon_barang(){
   		$id   		 = $this->input->post('did');
   		$kode 		 = $this->input->post('dkode_pembelian');
		$jumlah 	 = $this->input->post('dqty');
		$harga 		 = $this->input->post('dharga');
		$diskon 	 = $this->input->post('ddiskon');
		$datatotal 	 = $jumlah * $harga;
		$datadiskon  = ($diskon * $datatotal) / 100; 
		$hasildiskon = $datatotal - $datadiskon;
		$data = array(
			'diskon'        => $datadiskon,
			'diskon_percen'	=> $diskon,
			'total'         => $hasildiskon,
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('pembelian',$data,$where);
		redirect('pembelian/edit/'.$kode);	
    }
//END EDIT DISKON

 	public function test(){
		$where = array('kode_pembelian' => 'PMB0001' );
			 	
			//proses update stok

 	}

//CHECKOUT
 	public function checkout(){
 		$print   = $this->input->post('print');
		$kode 	 = $this->input->post('kode_pembelian');
		$diskon  = $this->input->post('diskon');
		$date 	 = date_create($this->input->post('jatuh_tempo'));
		$tanggal = date_format($date,'Y-m-d');
		$data 	 = array(
			'kode_pembelian' 	=> $kode,
			'total' 			=> $this->input->post('total_akhir'),
			'cash' 				=> $this->input->post('cash'),
			'kredit' 			=> $this->input->post('kredit'),
			'jatuh_tempo' 		=> $tanggal,
			'kembalian' 		=> $this->input->post('kembalian'),
			'catatan' 			=> $this->input->post('catatan'),
		);
		$where = array('kode_pembelian' => $kode );
		$this->umum_model->update('pembelian_total',$data,$where);

		if ($print == "Y") {
			//proses update stok
			$field  = $this->umum_model->tampil_filter('pembelian',$where);
			$pembelian = $field->result();
			foreach ($pembelian as $pembelian) {
			    $kode_item = $pembelian->kode_item;
				$harga = $pembelian->harga_beli;
				$whereitem = array(
			      'kode_item'=>$kode_item
			      );
			    $field  = $this->umum_model->tampil_filter('produk',$whereitem);
			    $record2 = $field->row_array();
			    $sisa_stok = $record2['stok'];
			    $harga_jual = $record2['harga_pokok'];
			    $stok_update = $sisa_stok + $pembelian->qty;
			    $harga_new	=  (($harga_jual * $sisa_stok) + ($harga * $pembelian->qty)) / $stok_update;
			    $data2 = array(
			    	'stok' => $stok_update,
			    	'harga_pokok' => $harga_new,
			    	 );
				$this->umum_model->update('produk',$data2,$whereitem);
		    }
		$checkout['checkout'] = 'Y';
		$this->umum_model->update('pembelian_total',$checkout,$where);
		}
		//simpan data ke tabel hutang
		$pjatuh_tempo = $this->input->post('jatuh_tempo');
		$jatuh_tempo = date('Y-m-d', strtotime($pjatuh_tempo));
		if ($this->input->post('kredit')>0) {
			$data3 = array( 'jenis'			  => 'hutang',// jika supplier maka 'piutang' diganti dengan -> 'hutang'
							'tgl_transaksi'   => date('Y-m-d'),
							'tgl_jatuh_tempo' =>  $jatuh_tempo,
							'nama'  		  =>  $this->input->post('nama_supplier'), 
							'kode_transaksi'  => $kode,
							'jumlah_hutang'	  => $this->input->post('kredit'),
							'status'		  => 'BELUM LUNAS'
						);
			$kodetr = array('kode_transaksi' => $kode );
			$field  = $this->umum_model->tampil_filter('hutang',$kodetr);
			if ($field->num_rows() == 1) {
			$this->umum_model->update('hutang',$data3,$kodetr);
			}else{
			$this->umum_model->input_data('hutang',$data3);	
			}
		}
		$this->session->set_flashdata('sukses','Data Pembelian telah Disimpan');
		redirect('pembelian');
	}
//END CHECKOUT
}
