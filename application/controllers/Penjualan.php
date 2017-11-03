<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penjualan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('penjualan_model');
		$this->load->model('kode_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['p'] != 'Y' OR $log = '')
		{
			redirect('log/out');
		}
	}

//INDEX
	public function index() {
		$printfaktur = $this->session->userdata('printfak');
		$kodetrans = $this->session->userdata('kodetrans');
		if ($printfaktur == 'Y') {
		$print = 'penjualan/nota/'.$kodetrans;
		$this->session->unset_userdata('printfak');
		$this->session->unset_userdata('kodetrans');
		}else{
		$print = '';	
		}
		$where = array('level' => $this->session->userdata('level'));
		$item	= $this->umum_model->tampil('produk');
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Penjualan - Demo Servis',
						'url'				=> 'penjualan',
						'head'				=> 'Penjualan',
						'url2'				=> '#',
						'head2'				=> '',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Data Penjualan',
						'tambah'			=> 'penjualan/tambah',
						'edit'				=> 'penjualan/edit/',
						'delete'			=> 'penjualan/delete/',
						'view'				=> 'penjualan/view/',
						'printpenjualan'	=>  $print,
						'nama' 				=> $this->session->userdata('nama'),
						'field'				=> $this->penjualan_model->tampil_total()->result(),
						'kode'				=> $this->kode_model->kode_penjualan(),
						'kode_pelanggan'	=> $this->kode_model->kode_pelanggan(),
						'pel'				=> $this->umum_model->tampil('pelanggan')->result(),
						'peg'				=> $this->umum_model->tampil('pegawai')->result(),
						'valitem'			=> $item->row_array(),
						'field2'			=> $this->umum_model->tampil('penjualan')->result(),
						'isi'				=> 'penjualan/list'
			);
		$this->load->view('layout/wrapper',$data);
	}
//END INDEX

//TAMBAH
	public function tambah(){
		$where 		= $this->input->post('kode_transaksi');
		$jumlah 	= $this->input->post('jumlah');
		$kode 		= $this->input->post('kode_item');
		$tipe		= $this->input->post('tipe');
		$total 		= $this->input->post('total');
		$barcode = $kode;
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
	//simpan penjualan
		$data1 = array(
			'kode_transaksi' 	=> $where,
			'kode_item' 		=> $kode_item,
			'uraian' 			=> $this->input->post('uraian'),
			'tipe' 				=> $tipe,
			'jumlah' 			=> $jumlah,
			'harga' 			=> $this->input->post('harga'),
			'diskon' 			=> $this->input->post('diskon'),
			'diskon_des' 			=> $this->input->post('brdiskon_pr'),
			'total' 			=> $total,
			'tanggal' 			=> date("Y-m-d H:i:s"),
		);
		$this->umum_model->input_data('penjualan',$data1);
	//simpan total penjualan
		$data2 = array(
			'kode_transaksi' 	=> $where,
			'tanggal' 			=> date("Y-m-d H:i:s"),
			'nama_pelanggan' 	=> $this->input->post('nama_pelanggan'),
			'status' 			=> $this->input->post('status'),
			'nama_pegawai' 		=> $this->input->post('nama_pegawai'),
			'operator'			=> $this->session->userdata('nama'),
			'total_harga'		=> $total,
			'total_akhir'		=> $total,
			'kredit'		=> $total,
		);
	//simpan temp kode
		$data3 = array(
			'kode' 	=> $where,
			);
	//update data stok
		$where2 = array('kode_item' => $kode_item, );
		$stok = $this->umum_model->tampil_filter('produk',$where2)->row_array();
		
	//Simpan Pendapatan
		$where3 = array('kode_transaksi' => $where,);
		$id = $this->umum_model->tampil_filter('penjualan',$where3)->row_array();
		if ($tipe == 'Jasa') {
		$kodeakun   = $stok['pendapatan_jasa'];
		$data5 = array(
			'id_penjualan'   	=> $id['id'],
			'kode_akuntansi' 	=> $kodeakun,
			'kode_transaksi' 	=> $where,
			'kode_item' 		=> $kode_item,
			'nama_pegawai'		=> $this->input->post('nama_pegawai'),
			'pendapatan' 		=> $total,
			'tanggal' 			=> date("Y-m-d H:i:s"),
			);
		}elseif($tipe == 'Barang'){
		$hr   = $stok['harga_pokok'];
		$hpp  = $jumlah * $hr;
		$pendapatan = $total - $hpp;
		$kodeakun   = $stok['pendapatan_jual'];
		$data5 = array(
			'id_penjualan'   	=> $id['id'],
			'kode_akuntansi' 	=> $kodeakun,
			'kode_transaksi' 	=> $where,
			'kode_item' 		=> $kode_item,
			'nama_pegawai'		=> $this->session->userdata('nama'),
			'pendapatan' 		=> $pendapatan,
			'tanggal' 			=> date("Y-m-d H:i:s"),
			);
		}
		
		$this->umum_model->input_data('penjualan_total',$data2);
		$this->umum_model->input_data('temp_kode_tr',$data3);
		$this->umum_model->input_data('pendapatan',$data5);	
		$this->session->set_flashdata('sukses','Data Penjualan telah ditambahkan');
		redirect('penjualan/edit/'.$where);
	}
//END TAMBAH

//EDIT
	public function edit($where){
		$where2 	= array('level' => $this->session->userdata('level'));
		$item		= $this->umum_model->tampil('produk');
		$tambah 	= $this->input->post('include');
		$ukuran 	= $this->input->post('size');
		$field 		= $this->penjualan_model->tampil_total_filter($where)->row_array();
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
						'url'				=> 'penjualan',
						'head'				=> 'Penjualan',
						'url2'				=> 'penjualan/edit',
						'head2'				=> 'Edit',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'pop'       		=> 'penjualan/edit/',
						'nama' 				=> $this->session->userdata('nama'),
						'level'				=> $this->session->userdata('level'),
						'tabel'				=> 'Edit Data Penjualan '.$where,
						'include' 			=> $include,
						'size' 				=> $size,
						'checkout'			=> 'penjualan/checkout',
						'checkoutprint'		=> 'penjualan/checkout_print',
						'simpan' 			=> 'penjualan/tambah_detail',
						'load_edit'			=> 'loader_data/edit_diskon_barang',
						'tombol'			=> $button,
						'where' 			=> $where,
						'field2'			=> $this->penjualan_model->tampil_filter($where)->result(),
						'field'				=> $field,
						'hide'              => $hide,
						'item'				=> $this->umum_model->tampil('produk')->result(),
						'jumlah'			=> $this->penjualan_model->total_filter($where),
						'isi'				=> 'penjualan/edit'
		);
		$penj = $this->penjualan_model->tampil_total_filter($where)->row_array();
		$sess_data['kode_transaksi'] = $where;
		$sess_data['nama_pelanggan'] = $penj['nama_pelanggan'];
		$sess_data['status_pelanggan'] = $penj['status'];
		$this->session->set_userdata($sess_data);
        $this->load->view('layout/wrapper',$data);
	}
//END EDIT

//TAMBAH DETAIL
    public function tambah_detail(){
    $where  = $this->input->post('kode_transaksi');
    $kode   = $this->input->post('kode_item');
    $jumlah = $this->input->post('jumlah');
    $total  = $this->input->post('total');
	$tipe		= $this->input->post('tipe');
    $date=date_create($this->input->post('tanggal'));
  	$tanggal = date_format($date,"Y-m-d");
		$barcode = $kode;
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

    //simpan penjualan
		$data1 = array(
			'kode_transaksi' 	=> $where,
			'kode_item' 		=> $kode_item,
			'uraian' 			=> $this->input->post('uraian'),
			'tipe' 				=> $this->input->post('tipe'),
			'jumlah' 			=> $jumlah,
			'harga' 			=> $this->input->post('harga'),
			'diskon' 			=> $this->input->post('diskon'),
			'diskon_des' 		=> $this->input->post('brdiskon_pr'),
			'total' 			=> $total,
			'tanggal' 			=> $tanggal,
		);
		$query = $this->db->query("SELECT SUM(total) as total_akhir FROM penjualan WHERE kode_transaksi='$where'");
		$total_akhir = $query->row_array();
		$data2 = array(
			'total_akhir' 			=> $total_akhir['total_akhir']+$total,
			'kredit' 				=> $total_akhir['total_akhir']+$total,
			'cash'					=> '0',
			'diskon'				=> '0',
			'diskon_des'			=> '0',
			'ppn'					=> '0',
		);
		$this->umum_model->input_data('penjualan',$data1);
		$where2 = array('kode_transaksi' => $where , );
		$this->umum_model->update('penjualan_total',$data2,$where2 );
		
	//Simpan Pendapatan
		$where2 = array('kode_item' => $kode_item,);
		$stok = $this->umum_model->tampil_filter('produk',$where2)->row_array();
		$where3 = array('kode_transaksi' => $where,);
		$id = $this->umum_model->tampil_filter('penjualan',$where3)->row_array();
		if ($tipe == 'Jasa') {
		$kodeakun   = $stok['pendapatan_jasa'];
		$data5 = array(
			'id_penjualan'   	=> $id['id'],
			'kode_akuntansi' 	=> $kodeakun,
			'kode_transaksi' 	=> $where,
			'kode_item' 		=> $kode_item,
			'nama_pegawai'		=> $this->input->post('nama_pegawai'),
			'pendapatan' 		=> $total,
			'tanggal' 			=> $tanggal,
			);
		}elseif($tipe == 'Barang'){
		
		$hr   = $stok['harga_pokok'];
		$hpp  = $jumlah * $hr;
		$pendapatan = $total - $hpp;
		$kodeakun   = $stok['pendapatan_jual'];
		$data5 = array(
			'id_penjualan'   	=> $id['id'],
			'kode_akuntansi' 	=> $kodeakun,
			'kode_transaksi' 	=> $where,
			'kode_item' 		=> $kode_item,
			'nama_pegawai'		=> $this->input->post('nama_pegawai'),
			'pendapatan' 		=> $pendapatan,
			'tanggal' 			=> date("Y-m-d H:i:s"),
			);
		}
		
		$this->umum_model->input_data('pendapatan',$data5);	
		$this->session->set_flashdata('sukses','Data Penjualan telah ditambahkan');
		redirect('penjualan/edit/'.$where);
    }
// END TAMBAH DETAIL

//DELETE
	public function delete($where){
		$data = array('kode_transaksi' => $where);
		$this->umum_model->delete('penjualan',$data,'kode_transaksi');
		$this->umum_model->delete('penjualan_total',$data,'kode_transaksi');
		$this->umum_model->delete('pendapatan',$data,'kode_transaksi');
		$this->umum_model->delete('biaya_potong_jual',$data,'kode_transaksi');
		$this->session->set_flashdata('sukses','Data Kategori Produk Telah Dihapus');
		redirect('penjualan');
	}
//END DELETE

//DELETE BARANG
	public function delete_barang($where){
		$data = array('id' => $where);
		$item = $this->umum_model->tampil_filter('penjualan',$data)->row_array();
		$kode = $item['kode_transaksi'];
		$where3 = array(
			'id_penjualan' => $where,
			 );
		$this->umum_model->delete('penjualan',$data,'id');
		$this->umum_model->delete('pendapatan',$where3,'id_penjualan');
		$this->session->set_flashdata('sukses','Data Kategori Produk Telah Dihapus');
		redirect('penjualan/edit/'.$kode);
	}
//END DELETE BARANG

//CHECKOUT
 	public function checkout(){
 		$print  = $this->input->post('print');
		$kode = $this->input->post('kode_transaksi');
		$diskon = $this->input->post('diskon');
		$total_harga = $this->input->post('total_harga');
	    $date=date_create($this->input->post('jatuh_tempo'));
	  	$tanggal = date_format($date,"Y-m-d");

		$data = array(
			'kode_transaksi' 	=> $kode,
			'total_harga' 		=> $total_harga,
			'diskon' 			=> $diskon,
            'diskon_des' 			=> $this->input->post('diskon_rp'),
			'ppn' 				=> $this->input->post('ppn'),
			'total_akhir' 		=> $this->input->post('total_akhir'),
			'cash' 				=> $this->input->post('cash'),
			'kredit' 			=> $this->input->post('kredit'),
			'jatuh_tempo' 		=> $tanggal,
			'kembalian' 		=> $this->input->post('kembalian'),
			'catatan' 			=> $this->input->post('catatan'),
		);
	//BIAYA POTONG JUAL
		$where = array(
			'kode_transaksi' => $kode,
			);
		$harga_potong = ($diskon * $total_harga) / 100;
		$data2 = array(
			'kode_transaksi' 	=> $kode,
			'persen' 			=> $diskon,
			'harga_potong'		=> $harga_potong,
			);
		$cekpotongan = $this->umum_model->tampil_filter('biaya_potong_jual',$where);
		if ($cekpotongan->num_rows() == 1) {
		$this->umum_model->update('biaya_potong_jual',$data2,$where);
		}else{
		$this->umum_model->input_data('biaya_potong_jual',$data2);		
		}

		$this->umum_model->update('penjualan_total',$data,$where);
		$sess_data['printfak'] = $print;
		$sess_data['kodetrans'] = $kode;
		$this->session->set_userdata($sess_data);
		//simpan data ke tabel hutang
		if ($this->input->post('kredit')>0) {
			$data3 = array( 'jenis'			  => 'piutang',// jika supplier maka 'piutang' diganti dengan -> 'hutang'
							'tgl_transaksi'   => date('Y-m-d'),
							'tgl_jatuh_tempo' => $tanggal, 
							'nama'  		  =>  $this->input->post('nama_pelanggan'), 
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

		if ($print == "Y") {
			//proses update stok
			$cekfil  = $this->umum_model->tampil_filter('penjualan',$where);
			$cekpenjualan = $cekfil->result();
			foreach ($cekpenjualan as $cekpenjualan) {
			    $kodecek = $cekpenjualan->kode_item;
				$whereitem = array(
			      'kode_item'=>$kodecek
			      );
			    $cekfil2  = $this->umum_model->tampil_filter('produk',$whereitem);
			    $cekrecord2 = $cekfil2->row_array();
			    if($cekrecord2['tipe_item']=='Barang'){
			    $ceksisa_stok = $cekrecord2['stok'];
			    $cekstok_update = $ceksisa_stok - $cekpenjualan->jumlah;
			    $datack = array(
			    	'stok' => $cekstok_update,
			    	 );
				$this->umum_model->update('produk',$datack,$whereitem);
			    }
		    }
		}

		$this->session->set_flashdata('sukses','Data Penjualan telah Disimpan');
		redirect('penjualan');
	}
//END CHECKOUT

//VIEW
	public function view($where){
		$where2 	= array('level' => $this->session->userdata('level'));
		$tambah 	= $this->input->post('include');
		$ukuran 	= $this->input->post('size');
		$field 		= $this->penjualan_model->tampil_total_filter($where)->row_array();
		if ($field['kredit'] >= 1) {
		$hide = '#kembalian';
		}else{
		$hide = '#kredit';
		}
		$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where2)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Tambah Penjualan - Demo Servis',
						'url'				=> 'penjualan',
						'head'				=> 'Penjualan',
						'url2'				=> 'penjualan/edit',
						'head2'				=> 'Edit',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'pop'       		=> 'penjualan/edit/',
						'nama' 				=> $this->session->userdata('nama'),
						'level'				=> $this->session->userdata('level'),
						'tabel'				=> 'Edit Data Penjualan '.$where,
						'checkout'			=> 'penjualan/checkout',
						'simpan' 			=> 'penjualan/tambah_detail',
						'where' 			=> $where,
						'field2'			=> $this->penjualan_model->tampil_filter($where)->result(),
						'field'				=> $field,
						'hide'              => $hide,
						'item'				=> $this->umum_model->tampil('produk')->result(),
						'jumlah'			=> $this->penjualan_model->total_filter($where),
						'isi'				=> 'penjualan/view'
		);
		$penj = $this->penjualan_model->tampil_total_filter($where)->row_array();
		$sess_data['kode_transaksi'] = $where;
		$sess_data['nama_pelanggan'] = $penj['nama_pelanggan'];
		$sess_data['status_pelanggan'] = $penj['status'];
		$this->session->set_userdata($sess_data);
        $this->load->view('layout/wrapper',$data);
	}
//END VIEW

//NOTA
	 function nota($kode)
    {
        $this->load->library('cfpdf');
        $where			=  $kode;
        $tampil			= $this->penjualan_model->tampil_filter($where);
        $record			= $tampil->row_array();
        $jm				= $this->penjualan_model->tampil_total_filter($where)->row_array();
        $jum			= $this->penjualan_model->jumlah_penjualan($where);
        $id 			= array('nama_pelanggan' => $jm['nama_pelanggan'] );
        $pelanggan 		= $this->umum_model->tampil_filter('pelanggan',$id)->row_array();
        $pdf=new FPDF('L','mm','A5');
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(14);
        $pdf->Text(79, 10, 'NOTA PENJUALAN',0,0,'C');
        $pdf->Text(80, 15, 'SERVIS CENTER',0,0,'C');
        //$pdf->Text(10, 30, $periode);
        $pdf->ln(10);
        $pdf->SetFontSize(10);
        $pdf->Cell(50,7,'Nomor   : '.$where,0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'    Nama : '.$pelanggan['nama_pelanggan'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'Kasir   : '.$jm['nama_pegawai'],0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'  Alamat : '.$pelanggan['alamat'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'Tanggal : '. $jm['tanggal'],0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'  Status : '.$pelanggan['status'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'',0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'      Hp : '.$pelanggan['nomor_hp'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'',0,0,'L');$pdf->Cell(75,7,'',0,0,'L');
        $pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->ln(7);
        $pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        $pdf->Cell(17, 5, 'KODE', 0,0);
        $pdf->Cell(3, 5,'|',0,0,'L');
        $pdf->Cell(25, 5, 'URAIAN', 0,0);
        $pdf->Cell(9, 5,'|',0,0,'L');
        $pdf->Cell(24, 5, 'JUMLAH', 0,0);
        $pdf->Cell(13, 5,'|',0,0,'L');
        $pdf->Cell(27, 5, 'DISKON', 0,0);
        $pdf->Cell(12, 5,'|',0,0,'L');
        $pdf->Cell(22, 5, 'HARGA', 0,0);
        $pdf->Cell(10, 5,'|',0,0,'L');
        $pdf->Cell(25, 5, 'TOTAL', 0,0);
        $pdf->ln(4);
		$pdf->Cell(17, 5,'PRODUK',0,0,'L');
		$pdf->Cell(3, 5,'|',0,0,'L');
		$pdf->Cell(25, 5,'',0,0,'L');
		$pdf->Cell(5, 5,'|',0,0,'L');
        $pdf->Cell(13, 5, '', 0,0);
        $pdf->Cell(15, 5, '', 0,0);
		$pdf->Cell(5, 5,'|',0,0,'L');
        $pdf->Cell(22, 5, '', 0,0);
        $pdf->Cell(13, 5, '', 0,0);
        $pdf->Cell(13, 5,'|',0,0,'L');
        $pdf->Cell(21, 5,'',0,0,'L');
        $pdf->Cell(3, 5,'|',0,0,'L');
        $pdf->Cell(25, 5,'',0,1,'L');
        $pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        $i = 0;
        $next = 12;
        for ($i=0; $i < $jum; $i++) { 
  		$record2	= $tampil->row_array($i);
        $pdf->Cell(20, 5, $record2['kode_item'], 0,0);
        $pdf->Cell(35, 5, substr($record2['uraian'],'0','10'), 0,0);
        $pdf->Cell(34, 5, $record2['jumlah'], 0,0,'L');
        $pdf->Cell(42, 5, 'Rp. '.number_format($record2['harga'],0), 0,0,'L');
        $pdf->Cell(30, 5, number_format($record2['diskon'],0).'%', 0,0,'L');
        $pdf->Cell(25, 5, 'Rp. '.number_format($record2['total'],0), 0,0,'L');
	    $pdf->ln(5);

  		if ($i == $next) {
  		$pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        $next = $next + 11;
  		$pdf->AddPage();
        $pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(14);
        $pdf->Text(79, 10, 'NOTA PENJUALAN',0,0,'C');
        $pdf->Text(80, 15, 'SERVIS CENTER',0,0,'C');
        //$pdf->Text(10, 30, $periode);
        $pdf->ln(10);
        $pdf->SetFontSize(10);
        $pdf->Cell(50,7,'Nomor   : '.$where,0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'    Nama : '.$pelanggan['nama_pelanggan'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'Kasir   : '.$jm['nama_pegawai'],0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'  Alamat : '.$pelanggan['alamat'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'Tanggal : '. $jm['tanggal'],0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'  Status : '.$pelanggan['status'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'',0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'      Hp : '.$pelanggan['nomor_hp'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'',0,0,'L');$pdf->Cell(75,7,'',0,0,'L');
        $pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->ln(7);
        $pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        $pdf->Cell(17, 5, 'KODE', 0,0);
        $pdf->Cell(3, 5,'|',0,0,'L');
        $pdf->Cell(25, 5, 'URAIAN', 0,0);
        $pdf->Cell(9, 5,'|',0,0,'L');
        $pdf->Cell(24, 5, 'JUMLAH', 0,0);
        $pdf->Cell(13, 5,'|',0,0,'L');
        $pdf->Cell(27, 5, 'DISKON', 0,0);
        $pdf->Cell(12, 5,'|',0,0,'L');
        $pdf->Cell(22, 5, 'HARGA', 0,0);
        $pdf->Cell(10, 5,'|',0,0,'L');
        $pdf->Cell(25, 5, 'TOTAL', 0,0);
        $pdf->ln(4);
		$pdf->Cell(17, 5,'PRODUK',0,0,'L');
		$pdf->Cell(3, 5,'|',0,0,'L');
		$pdf->Cell(25, 5,'',0,0,'L');
		$pdf->Cell(5, 5,'|',0,0,'L');
        $pdf->Cell(13, 5, '', 0,0);
        $pdf->Cell(15, 5, '', 0,0);
		$pdf->Cell(5, 5,'|',0,0,'L');
        $pdf->Cell(22, 5, '', 0,0);
        $pdf->Cell(13, 5, '', 0,0);
        $pdf->Cell(13, 5,'|',0,0,'L');
        $pdf->Cell(21, 5,'',0,0,'L');
        $pdf->Cell(3, 5,'|',0,0,'L');
        $pdf->Cell(25, 5,'',0,1,'L');
        $pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
        
  		}
        }
        // end
        $pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        $pdf->Cell(149,7,'SUB TOTAL',0,0,'R');$pdf->Cell(36,7,'Rp. '.number_format($jm['total_harga'],0),0,0,'R');
        $pdf->myUser($this->session->userdata("nama"));
        
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(14);
        $pdf->Text(79, 10, 'NOTA PENJUALAN',0,0,'C');
        $pdf->Text(80, 15, 'SERVIS CENTER',0,0,'C');
        //$pdf->Text(10, 30, $periode);
        $pdf->ln(10);
        $pdf->SetFontSize(10);
        $pdf->Cell(50,7,'Nomor   : '.$where,0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'    Nama : '.$pelanggan['nama_pelanggan'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'Kasir   : '.$jm['nama_pegawai'],0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'  Alamat : '.$pelanggan['alamat'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'Tanggal : '. $jm['tanggal'],0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'  Status : '.$pelanggan['status'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'',0,0,'L');$pdf->Cell(75,7,'',0,0,'L');$pdf->Cell(75,7,'      Hp : '.$pelanggan['nomor_hp'],0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(50,7,'',0,0,'L');$pdf->Cell(75,7,'',0,0,'L');
        $pdf->SetFont('Courier','','L');
        $pdf->SetFontSize(10);
        $pdf->ln(7);
        $pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        $pdf->Cell(70, 5, 'SUB TOTAL', 0,0);
        $pdf->Cell(45, 5, 'DISKON FAKTUR', 0,0);
        $pdf->Cell(47, 5, 'PAJAK', 0,0);
        $pdf->Cell(40, 5, 'GRAND', 0,1);
        $pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        // tampilkan dari database
        $pdf->SetFont('Courier','','L');
		$pdf->Cell(70,7,'Rp. '.number_format($jm['total_harga'],0),0,0,'L');
        $pdf->Cell(45,7,number_format($jm['diskon'],0).'%',0,0,'L');
        if ($jm['ppn'] == 10) {$ppn = 'YA';}else{$ppn = 'TIDAK';}
        $pdf->Cell(40,7,$ppn,0,0,'L');
        $pdf->Cell(30,7,'Rp. '.number_format($jm['total_akhir'],0),0,0,'L');
        $pdf->ln(5);
        $pdf->Cell(10, 2,'---------------------------------------------------------------------------------------','',1);
        $pdf->Cell(165,7,'TUNAI / DP     Rp. ',0,0,'R');$pdf->Cell(20,7,number_format($jm['cash'],0),0,0,'R');
		if ($jm['kredit'] >= 1) {
        $pdf->ln(5);
        $pdf->Cell(165,7,'KREDIT         Rp. ',0,0,'R');$pdf->Cell(20,7,number_format($jm['kredit'],0),0,0,'R');
		$pdf->Text(11, 72, 'JATUH TEMPO :',0,0,'C');
        $pdf->Text(40, 72, $jm['jatuh_tempo'].'',0,0,'C');
		}else{
        $pdf->ln(5);
        $pdf->Cell(165,7,'Kembalian   Rp. ',0,0,'R');$pdf->Cell(20,7,number_format($jm['kembalian'],0),0,0,'R');
		}
        $pdf->Text(11, 67, 'CATATAN :',0,0,'C');
        $pdf->Text(31, 67, $jm['catatan'].'',0,0,'C');
        $pdf->ln(25);
        $pdf->Cell(70,7,'Penerima',0,0,'C');$pdf->Cell(50,7,'',0,0,'L');$pdf->Cell(35,7,'Hormat Kami',0,0,'C');
        $pdf->ln(20);
        $pdf->Cell(71,7,'(.........)',0,0,'C');$pdf->Cell(50,7,'',0,0,'L');$pdf->Cell(34,7,'(.........)',0,0,'C');
        $pdf->Output();
    }
//END NOTA

//EDIT DISKON
    public function edit_diskon_barang(){
   		$id   		 = $this->input->post('did');
   		$kode 		 = $this->input->post('dkode_transaksi');
		$jumlah 	 = $this->input->post('djumlah');
		$harga 		 = $this->input->post('dharga');
		$diskon 	 = $this->input->post('ddiskon');
		$datatotal 	 = $jumlah * $harga;
		$datadiskon  = ($datatotal * $diskon) / 100; 
		$hasildiskon = $datatotal - $datadiskon;
		$data = array(
			'jumlah' => $jumlah,
			'harga'  => $harga,
			'diskon' => $diskon,
			'diskon_des' => $datadiskon,
			'total'  => $hasildiskon,
		);
		$where = array(
			'id' => $id
			);
		$this->umum_model->update('penjualan',$data,$where);
		redirect('penjualan/edit/'.$kode);	
    }
//END EDIT DISKON

}