<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_operator extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['kon'] != 'Y' OR $check['konop'] != 'Y' OR $check['konoplo'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

	public function index() {
		$tabel = $this->db->query("SELECT * FROM level_operator");
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Level Operator - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Konfigurasi',
						'url2'				=> '#link',
						'head2'				=> 'Operator',
						'url3'				=> 'Level_operator',
						'head3'				=> 'Level Operator',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Level Operator',
						'delete'			=> 'level_operator/delete/',
						'tambah'			=> 'level_operator/tambah',
						'field'				=> $tabel->result(),
						'load_edit'			=> 'loader_data/level_operator',
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'konfigurasi/operator/level_operator/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
		$data = array(
			'level' 		=> $this->input->post('level'),		//Nama Fasilitas
			'dslt'	 		=> $this->input->post('dslt'),		//Last Task
			'dsltp'	 		=> $this->input->post('dsltp'),		//Last Task (Penjualan)
			'dslts'	 		=> $this->input->post('dslts'),		//Last Task (Servis)
			'dsltl'	 		=> $this->input->post('dsltl'),		//Last Task (Login)
			'dssbm'	 		=> $this->input->post('dssbm'),		//Stok Barang Minim
			'dssbmr'	 	=> $this->input->post('dssbmr'),	//Stok Barang Minim (Reorder)
			'dshp'	 		=> $this->input->post('dshp'),		//Hutang Dan piutang
			'dshph'	 		=> $this->input->post('dshph'),		//Tabel Hutang
			'dshphv'	 	=> $this->input->post('dshphv'),	//Tabel Hutang (View)
			'dshphb'	 	=> $this->input->post('dshphb'),	//Tabel Hutang (Bayar)
			'dshpp'	 		=> $this->input->post('dshpp'),		//Tabel Piutang
			'dshppv'	 	=> $this->input->post('dshppv'),	//Tabel Piutang (View)
			'dshppb'	 	=> $this->input->post('dshppb'),	//Tabel Piutang (Bayar)
			'dspy'	 		=> $this->input->post('dspy'),		//Pelanggan Yang ulang Tahun
			'kon'	 		=> $this->input->post('kon'),		//Menu Konfigurasi
			'konkp' 		=> $this->input->post('konkp'),		//Kategori Produk
			'konkpt' 		=> $this->input->post('konkpt'),	//Kategori Produk (Tambah)
			'konkpu' 		=> $this->input->post('konkpu'),	//Kategori Produk (Update)
			'konkpd' 		=> $this->input->post('konkpd'),	//Kategori Produk (Delete)
			'konjp' 		=> $this->input->post('konjp'),		//Jenis Produk
			'konjpt' 		=> $this->input->post('konjpt'),	//Jenis Produk (Tambah)
			'konjpu' 		=> $this->input->post('konjpu'),	//Jenis Produk (Update)
			'konjpd' 		=> $this->input->post('konjpd'),	//Jenis Produk (Delete)
			'konks' 		=> $this->input->post('konks'),		//Kategori Servis
			'konkst' 		=> $this->input->post('konkst'),	//Kategori Servis (Tambah)
			'konksu' 		=> $this->input->post('konksu'),	//Kategori Servis (Update)
			'konksd' 		=> $this->input->post('konksd'),	//Kategori Servis (Delete)
			'konss' 		=> $this->input->post('konss'),		//Status Servis
			'konsst' 		=> $this->input->post('konsst'),	//Status Servis (Tambah)
			'konssu' 		=> $this->input->post('konssu'),	//Status Servis (Update)
			'konssd' 		=> $this->input->post('konssd'),	//Status Servis (Delete)
			'konkoa' 		=> $this->input->post('konkoa'),	//Kode Akuntansi
			'konkoat' 		=> $this->input->post('konkoat'),	//Kode Akuntansi (Tambah)
			'konkoau' 		=> $this->input->post('konkoau'),	//Kode Akuntansi (Update)
			'konkoad' 		=> $this->input->post('konkoad'),	//Kode Akuntansi (Delete)
			'konop' 		=> $this->input->post('konop'),		//Operator
			'konopdo' 		=> $this->input->post('konopdo'),	//Data Operator
			'konopdot' 		=> $this->input->post('konopdot'),	//Data Operator (Tambah)
			'konopdou' 		=> $this->input->post('konopdou'),	//Data Operator (Update)
			'konopdod' 		=> $this->input->post('konopdod'),	//Data Operator (Delete)
			'konoplo' 		=> $this->input->post('konoplo'),	//Level Operator
			'konoplot' 		=> $this->input->post('konoplot'),	//Level Operator (Tambah)
			'konoplou' 		=> $this->input->post('konoplou'),	//Level Operator (Update)
			'konoplod' 		=> $this->input->post('konoplod'),	//Level Operator (Delete)
			'pr' 			=> $this->input->post('pr'),		//Produk
			'prt' 			=> $this->input->post('prt'),		//Produk (Tambah)
			'pru' 			=> $this->input->post('pru'),		//Produk (Update)
			'prd' 			=> $this->input->post('prd'),		//Produk (Delete)
			'prv' 			=> $this->input->post('prv'),		//Produk (View)
			'prh' 			=> $this->input->post('prh'),		//Produk (Histori)
			's' 			=> $this->input->post('s'),			//Servis
			'st' 			=> $this->input->post('st'),		//Servis (Tambah)
			'su' 			=> $this->input->post('su'),		//Servis (Detail)
			'sd' 			=> $this->input->post('sd'),		//Servis (Delete)
			'sv' 			=> $this->input->post('sv'),		//Servis (view)
			'sh' 			=> $this->input->post('sh'),		//Servis (TR)
			'p' 			=> $this->input->post('p'),			//Penjualan
			'pt' 			=> $this->input->post('pt'),		//Penjualan (Tambah)
			'pu' 			=> $this->input->post('pu'),		//Penjualan (Detail)
			'pd' 			=> $this->input->post('pd'),		//Penjualan (Delete)
			'pv' 			=> $this->input->post('pv'),		//Penjualan (View)
			'tp' 			=> $this->input->post('tp'),		//Penjualan (Tambah Barang untuk Dijual)
			'epd' 			=> $this->input->post('epd'),		//Penjualan (Edit Diskon Barang)
			'dp' 			=> $this->input->post('dp'),		//Penjualan (Delete Barang yang Ditambahkan)
			'pem' 			=> $this->input->post('pem'),		//Pembelian
			'pemt' 			=> $this->input->post('pemt'),		//Pembelian (Tambah)
			'pemu' 			=> $this->input->post('pemu'),		//Pembelian (Detail)
			'pemd' 			=> $this->input->post('pemd'),		//Pembelian (Delete)
			'pemv' 			=> $this->input->post('pemv'),		//Pembelian (View)
			'pemtb' 		=> $this->input->post('pemtb'),		//Pembelian (Tambah Barang)
			'pemdb' 		=> $this->input->post('pemdb'),		//Pembelian (Delete Barang)
			'pemedis' 		=> $this->input->post('pemedis'),	//Pembelian (Edit diskon)
			'ak' 			=> $this->input->post('ak'),		//Akuntansi
			'akkake' 		=> $this->input->post('akkake'),	//Kas Keluar
			'akkaket' 		=> $this->input->post('akkaket'),	//Kas Keluar (Tambah)
			'akkakeu' 		=> $this->input->post('akkakeu'),	//Kas Keluar (Edit)
			'akkaked' 		=> $this->input->post('akkaked'),	//Kas Keluar (Delete)
			'akkakev' 		=> $this->input->post('akkakev'),	//Kas Keluar (View)
			'akpeng' 		=> $this->input->post('akpeng'),	//Penggajian
			'akpengt' 		=> $this->input->post('akpengt'),	//Penggajian (Tambah)
			'akpengu' 		=> $this->input->post('akpengu'),	//Penggajian (Edit)
			'akpengd' 		=> $this->input->post('akpengd'),	//Penggajian (Delete)
			'akpengv' 		=> $this->input->post('akpengv'),	//Penggajian (View)
			'mem' 			=> $this->input->post('mem'),		//Member
			'mempel' 		=> $this->input->post('mempel'),	//Pelanggan
			'mempelt' 		=> $this->input->post('mempelt'),	//Pelanggan (Tambah)
			'mempelu' 		=> $this->input->post('mempelu'),	//Pelanggan (Update)
			'mempeld' 		=> $this->input->post('mempeld'),	//Pelanggan (Delete)
			'mempelv' 		=> $this->input->post('mempelv'),	//Pelanggan (View)
			'mempeg' 		=> $this->input->post('mempeg'),	//Pegawai
			'mempegt' 		=> $this->input->post('mempegt'),	//Pegawai (Tambah)
			'mempegu' 		=> $this->input->post('mempegu'),	//Pegawai (Update)
			'mempegd' 		=> $this->input->post('mempegd'),	//Pegawai (Delete)
			'mempegv' 		=> $this->input->post('mempegv'),	//Pegawai (View)
			'memsup' 		=> $this->input->post('memsup'),	//Supplier 
			'memsupt' 		=> $this->input->post('memsupt'),	//Supplier (Tambah)
			'memsupu' 		=> $this->input->post('memsupu'),	//Supplier (Update)
			'memsupd' 		=> $this->input->post('memsupd'),	//Supplier (Delete)
			'memsupv' 		=> $this->input->post('memsupv'),	//Supplier (View)
			'lap' 			=> $this->input->post('lap'),		//Laporan
			'lapp' 			=> $this->input->post('lapp'),		//Laporan Penjualan
			'laphis' 		=> $this->input->post('laphis'),	//Laporan Servis
			'lappem' 		=> $this->input->post('lappem'),	//Laporan Pembelian
			'lappro' 		=> $this->input->post('lappro'),	//Laporan Produk
		);
		$this->umum_model->input_data('level_operator',$data);
		$this->session->set_flashdata('sukses','Level Operator Telah Ditambahkan.');
		redirect('level_operator');		
	}

	public function delete($where){
		$data = array('id' => $where);
		$this->umum_model->delete('level_operator',$data,'id');
		$this->session->set_flashdata('sukses','Data Level Operator Telah Dihapus');
		redirect('level_operator');
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
			'level' 		=> $this->input->post('level'),		//Nama Fasilitas
			'dslt'	 		=> $this->input->post('dslt'),		//Last Task
			'dsltp'	 		=> $this->input->post('dsltp'),		//Last Task (Penjualan)
			'dslts'	 		=> $this->input->post('dslts'),		//Last Task (Servis)
			'dsltl'	 		=> $this->input->post('dsltl'),		//Last Task (Login)
			'dssbm'	 		=> $this->input->post('dssbm'),		//Stok Barang Minim
			'dssbmr'	 	=> $this->input->post('dssbmr'),	//Stok Barang Minim (Reorder)
			'dshp'	 		=> $this->input->post('dshp'),		//Hutang Dan piutang
			'dshph'	 		=> $this->input->post('dshph'),		//Tabel Hutang
			'dshphv'	 	=> $this->input->post('dshphv'),	//Tabel Hutang (View)
			'dshphb'	 	=> $this->input->post('dshphb'),	//Tabel Hutang (Bayar)
			'dshpp'	 		=> $this->input->post('dshpp'),		//Tabel Piutang
			'dshppv'	 	=> $this->input->post('dshppv'),	//Tabel Piutang (View)
			'dshppb'	 	=> $this->input->post('dshppb'),	//Tabel Piutang (Bayar)
			'dspy'	 		=> $this->input->post('dspy'),		//Pelanggan Yang ulang Tahun
			'kon'	 		=> $this->input->post('kon'),		//Menu Konfigurasi
			'konkp' 		=> $this->input->post('konkp'),		//Kategori Produk
			'konkpt' 		=> $this->input->post('konkpt'),	//Kategori Produk (Tambah)
			'konkpu' 		=> $this->input->post('konkpu'),	//Kategori Produk (Update)
			'konkpd' 		=> $this->input->post('konkpd'),	//Kategori Produk (Delete)
			'konjp' 		=> $this->input->post('konjp'),		//Jenis Produk
			'konjpt' 		=> $this->input->post('konjpt'),	//Jenis Produk (Tambah)
			'konjpu' 		=> $this->input->post('konjpu'),	//Jenis Produk (Update)
			'konjpd' 		=> $this->input->post('konjpd'),	//Jenis Produk (Delete)
			'konks' 		=> $this->input->post('konks'),		//Kategori Servis
			'konkst' 		=> $this->input->post('konkst'),	//Kategori Servis (Tambah)
			'konksu' 		=> $this->input->post('konksu'),	//Kategori Servis (Update)
			'konksd' 		=> $this->input->post('konksd'),	//Kategori Servis (Delete)
			'konss' 		=> $this->input->post('konss'),		//Status Servis
			'konsst' 		=> $this->input->post('konsst'),	//Status Servis (Tambah)
			'konssu' 		=> $this->input->post('konssu'),	//Status Servis (Update)
			'konssd' 		=> $this->input->post('konssd'),	//Status Servis (Delete)
			'konkoa' 		=> $this->input->post('konkoa'),	//Kode Akuntansi
			'konkoat' 		=> $this->input->post('konkoat'),	//Kode Akuntansi (Tambah)
			'konkoau' 		=> $this->input->post('konkoau'),	//Kode Akuntansi (Update)
			'konkoad' 		=> $this->input->post('konkoad'),	//Kode Akuntansi (Delete)
			'konop' 		=> $this->input->post('konop'),		//Operator
			'konopdo' 		=> $this->input->post('konopdo'),	//Data Operator
			'konopdot' 		=> $this->input->post('konopdot'),	//Data Operator (Tambah)
			'konopdou' 		=> $this->input->post('konopdou'),	//Data Operator (Update)
			'konopdod' 		=> $this->input->post('konopdod'),	//Data Operator (Delete)
			'konoplo' 		=> $this->input->post('konoplo'),	//Level Operator
			'konoplot' 		=> $this->input->post('konoplot'),	//Level Operator (Tambah)
			'konoplou' 		=> $this->input->post('konoplou'),	//Level Operator (Update)
			'konoplod' 		=> $this->input->post('konoplod'),	//Level Operator (Delete)
			'pr' 			=> $this->input->post('pr'),		//Produk
			'prt' 			=> $this->input->post('prt'),		//Produk (Tambah)
			'pru' 			=> $this->input->post('pru'),		//Produk (Update)
			'prd' 			=> $this->input->post('prd'),		//Produk (Delete)
			'prv' 			=> $this->input->post('prv'),		//Produk (View)
			'prh' 			=> $this->input->post('prh'),		//Produk (Histori)
			's' 			=> $this->input->post('s'),			//Servis
			'st' 			=> $this->input->post('st'),		//Servis (Tambah)
			'su' 			=> $this->input->post('su'),		//Servis (Detail)
			'sd' 			=> $this->input->post('sd'),		//Servis (Delete)
			'sv' 			=> $this->input->post('sv'),		//Servis (view)
			'sh' 			=> $this->input->post('sh'),		//Servis (TR)
			'p' 			=> $this->input->post('p'),			//Penjualan
			'pt' 			=> $this->input->post('pt'),		//Penjualan (Tambah)
			'pu' 			=> $this->input->post('pu'),		//Penjualan (Detail)
			'pd' 			=> $this->input->post('pd'),		//Penjualan (Delete)
			'pv' 			=> $this->input->post('pv'),		//Penjualan (View)
			'tp' 			=> $this->input->post('tp'),		//Penjualan (Tambah Barang untuk Dijual)
			'epd' 			=> $this->input->post('epd'),		//Penjualan (Edit Diskon Barang)
			'dp' 			=> $this->input->post('dp'),		//Penjualan (Delete Barang yang Ditambahkan)
			'pem' 			=> $this->input->post('pem'),		//Pembelian
			'pemt' 			=> $this->input->post('pemt'),		//Pembelian (Tambah)
			'pemu' 			=> $this->input->post('pemu'),		//Pembelian (Detail)
			'pemd' 			=> $this->input->post('pemd'),		//Pembelian (Delete)
			'pemv' 			=> $this->input->post('pemv'),		//Pembelian (View)
			'pemtb' 		=> $this->input->post('pemtb'),		//Pembelian (Tambah Barang)
			'pemdb' 		=> $this->input->post('pemdb'),		//Pembelian (Delete Barang)
			'pemedis' 		=> $this->input->post('pemedis'),	//Pembelian (Edit diskon)
			'ak' 			=> $this->input->post('ak'),		//Akuntansi
			'akkake' 		=> $this->input->post('akkake'),	//Kas Keluar
			'akkaket' 		=> $this->input->post('akkaket'),	//Kas Keluar (Tambah)
			'akkakeu' 		=> $this->input->post('akkakeu'),	//Kas Keluar (Edit)
			'akkaked' 		=> $this->input->post('akkaked'),	//Kas Keluar (Delete)
			'akkakev' 		=> $this->input->post('akkakev'),	//Kas Keluar (View)
			'akpeng' 		=> $this->input->post('akpeng'),	//Penggajian
			'akpengt' 		=> $this->input->post('akpengt'),	//Penggajian (Tambah)
			'akpengu' 		=> $this->input->post('akpengu'),	//Penggajian (Edit)
			'akpengd' 		=> $this->input->post('akpengd'),	//Penggajian (Delete)
			'akpengv' 		=> $this->input->post('akpengv'),	//Penggajian (View)
			'mem' 			=> $this->input->post('mem'),		//Member
			'mempel' 		=> $this->input->post('mempel'),	//Pelanggan
			'mempelt' 		=> $this->input->post('mempelt'),	//Pelanggan (Tambah)
			'mempelu' 		=> $this->input->post('mempelu'),	//Pelanggan (Update)
			'mempeld' 		=> $this->input->post('mempeld'),	//Pelanggan (Delete)
			'mempelv' 		=> $this->input->post('mempelv'),	//Pelanggan (View)
			'mempeg' 		=> $this->input->post('mempeg'),	//Pegawai
			'mempegt' 		=> $this->input->post('mempegt'),	//Pegawai (Tambah)
			'mempegu' 		=> $this->input->post('mempegu'),	//Pegawai (Update)
			'mempegd' 		=> $this->input->post('mempegd'),	//Pegawai (Delete)
			'mempegv' 		=> $this->input->post('mempegv'),	//Pegawai (View)
			'memsup' 		=> $this->input->post('memsup'),	//Supplier 
			'memsupt' 		=> $this->input->post('memsupt'),	//Supplier (Tambah)
			'memsupu' 		=> $this->input->post('memsupu'),	//Supplier (Update)
			'memsupd' 		=> $this->input->post('memsupd'),	//Supplier (Delete)
			'memsupv' 		=> $this->input->post('memsupv'),	//Supplier (View)
			'lap' 			=> $this->input->post('lap'),		//Laporan
			'lapp' 			=> $this->input->post('lapp'),		//Laporan Penjualan
			'laphis' 		=> $this->input->post('laphis'),	//Laporan Servis
			'lappem' 		=> $this->input->post('lappem'),	//Laporan Pembelian
			'lappro' 		=> $this->input->post('lappro'),	//Laporan Produk
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('level_operator',$data,$where);
		$this->session->set_flashdata('sukses','Data Level Operator Telah Diubah');
		redirect('level_operator');
	}

}
