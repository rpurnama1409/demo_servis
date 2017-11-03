<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tanggal_helper');
		$this->load->model('umum_model');
		$this->load->model('kode_model');
		$log = $this->session->userdata('level');
		$where = array('level' => $log);
		$check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
		if($check['ak'] != 'Y' OR $check['akpeng'] != 'Y' OR $log = '')
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
						'title' 			=> 'Penggajian - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Akuntansi',
						'url2'				=> 'penggajian',
						'head2'				=> '',
						'url3'				=> '#',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'tabel'				=> 'Tabel Penggajian',
						'tambah'			=> 'penggajian/tambah',
						'delete'			=> 'penggajian/delete/',
						'field'				=> $this->umum_model->tampil('penggajian')->result(),
						'load_edit'			=> 'loader_data/penggajian_edit',
						'view'				=> 'loader_data/penggajian_view',
						'nama' 				=>  $this->session->userdata('nama'),
						'kode_penggajian'	=>  $this->kode_model->kode_penggajian(),
						'pegawai'			=> 	$this->umum_model->tampil('pegawai')->result(),
						'isi'				=> 'akuntansi/penggajian/list'
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function tambah(){
		//open data pegawai
		$where = array('nama_pegawai' => $this->input->post('nama_pegawai'), );
		$field  = $this->umum_model->tampil_filter('pegawai',$where);
		$record = $field->row_array();
		//var inputan penggajian
		$nama_pegawai		  = $this->input->post('nama_pegawai');
		$gapok 				  = $record['gaji_pokok'];
		$um					  = $record['uang_makan'];
		$uk					  = $record['uang_kehadiran'];
		$jumlah_kehadiran     = $this->input->post('jumlah_kehadiran');
		$jumlah_keterlambatan = $this->input->post('jumlah_keterlambatan');
		$denda 				  = $this->input->post('denda');
		$bonus				  = $this->input->post('bonus');
		$kasbon				  = $this->input->post('kasbon');
		$prosentase 		  = $record['prosentase'];
		//penjumlahan 
		$uang_makan 	= $um * $jumlah_kehadiran;
		$uang_kehadiran = $uk * $jumlah_kehadiran;
		$total_denda 	= $denda * $jumlah_keterlambatan;
		//hitung prosentase
		$bulan = date('m');
		$tahun = date('Y');
      	$query = $this->db->query("SELECT SUM(pendapatan)AS total_service FROM pendapatan WHERE kode_akuntansi = '4-2000' AND nama_pegawai = '$nama_pegawai' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
        foreach ($query->result() as $query) {
        $total_service =  $query->total_service;
         }
        $jumlah_prosentase = $total_service * $prosentase / 100;
		//hitung total gaji
		$debit  = $gapok + $uang_makan + $uang_kehadiran + $bonus + $jumlah_prosentase;
		$kredit =  $kasbon + $total_denda;
		$total_gaji = $debit - $kredit;  

		//simpan data gaji
		$data = array('kode_penggajian'  	 => $this->input->post('kode_penggajian'),
					  'nama_pegawai' 	 	 => $nama_pegawai,
					  'tanggal' 		 	 => date('Y-m-d'),
					  'op'				 	 => $this->session->userdata('level'),
					  'akuntansi' 		 	 => '6-3001',
					  'gaji_pokok'		 	 => $gapok,
					  'uang_kehadiran' 	 	 => $uang_kehadiran,
					  'uang_makan'		 	 => $uang_makan,
					  'uang_prosentase'  	 => $jumlah_prosentase,
					  'bonus'			 	 => $bonus,
					  'jumlah_kehadiran' 	 => $jumlah_kehadiran,
					  'jumlah_keterlambatan' => $jumlah_keterlambatan,
					  'terlambat'		 	 => $total_denda,
					  'denda'			 	 => $denda,
					  'kasbon'			 	 => $kasbon,
					  'total_gaji'  	  	 => $total_gaji
				);
		$this->umum_model->input_data('penggajian',$data);
		$this->session->set_flashdata('sukses','Data Penggajian Telah Ditambahkan');
		redirect('penggajian');	
	}

	public function update(){
		$id = $this->input->post('id');
		//open data pegawai
		$where = array('nama_pegawai' => $this->input->post('nama_pegawai'), );
		$field  = $this->umum_model->tampil_filter('pegawai',$where);
		$record = $field->row_array();
		//var inputan penggajian
		$nama_pegawai		  = $this->input->post('nama_pegawai');
		$gapok 				  = $record['gaji_pokok'];
		$um					  = $record['uang_makan'];
		$uk					  = $record['uang_kehadiran'];
		$jumlah_kehadiran     = $this->input->post('jumlah_kehadiran');
		$jumlah_keterlambatan = $this->input->post('jumlah_keterlambatan');
		$denda 				  = $this->input->post('denda');
		$bonus				  = $this->input->post('bonus');
		$kasbon				  = $this->input->post('kasbon');
		$prosentase 		  = $record['prosentase'];
		//penjumlahan 
		$uang_makan 	= $um * $jumlah_kehadiran;
		$uang_kehadiran = $uk * $jumlah_kehadiran;
		$total_denda 	= $denda * $jumlah_keterlambatan;
		//hitung prosentase
		$bulan = date('m');
		$tahun = date('Y');
      	$query = $this->db->query("SELECT SUM(pendapatan)AS total_service FROM pendapatan WHERE kode_akuntansi = '4-2000' AND nama_pegawai = '$nama_pegawai' AND MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
        foreach ($query->result() as $query) {
        $total_service =  $query->total_service;
         }
        $jumlah_prosentase = $total_service * $prosentase / 100;
		//hitung total gaji
		$debit  = $gapok + $uang_makan + $uang_kehadiran + $bonus + $jumlah_prosentase;
		$kredit =  $kasbon + $total_denda;
		$total_gaji = $debit - $kredit;  

		//simpan data gaji
		$data = array('kode_penggajian'  	 => $this->input->post('kode_penggajian'),
					  'nama_pegawai' 	 	 => $nama_pegawai,
					  'tanggal' 		 	 => date('Y-m-d'),
					  'op'				 	 => $this->session->userdata('level'),
					  'akuntansi' 		 	 => '6-3001',
					  'gaji_pokok'		 	 => $gapok,
					  'uang_kehadiran' 	 	 => $uang_kehadiran,
					  'uang_makan'		 	 => $uang_makan,
					  'uang_prosentase'  	 => $jumlah_prosentase,
					  'bonus'			 	 => $bonus,
					  'jumlah_kehadiran' 	 => $jumlah_kehadiran,
					  'jumlah_keterlambatan' => $jumlah_keterlambatan,
					  'terlambat'		 	 => $total_denda,
					  'denda'			 	 => $denda,
					  'kasbon'			 	 => $kasbon,
					  'total_gaji'  	 	 => $total_gaji
				);
		$where2 = array(
		 'id' => $id
		);
		$this->umum_model->update('penggajian',$data,$where2);
		$this->session->set_flashdata('sukses','Data Penggajian Telah Di ubah');
		redirect('penggajian');	
	}

	public function hapus($id){
		$data = array('id' => $id);
		$this->umum_model->delete('penggajian',$data,'id');
		$this->session->set_flashdata('sukses','Data Penggajian telah dihapus');
		redirect('penggajian');
	}

	public function load_pegawai(){
	$nama_pegawai = $this->input->post('nama_pegawai');
	$where = array(
      'nama_pegawai'=>$nama_pegawai
      );
    $field  = $this->umum_model->tampil_filter('pegawai',$where);
    $record = $field->row_array(); 

		$data = array(
            'jabatan'      =>  $record['status']);
	 echo json_encode($data);
	}

    public function slip_gaji($kode)
    {
        $this->load->library('cfpdf');
        $where          =  $data = array( 
                        'id' => $kode
                            );
        $tampil         = $this->umum_model->tampil_filter('penggajian',$where);;
        $record         = $tampil->row_array();
        $where2         = array('nama_pegawai' => $record['nama_pegawai'] );
        $tampil2            = $this->umum_model->tampil_filter('pegawai',$where2);;
        $record2            = $tampil2->row_array();
        $uang_kehadiran = $record['uang_kehadiran']; 
        $uang_makan     = $record['uang_makan'];
        $catatan1       = '1. DIWAJIBKAN UNTUK SELALU ABSEN DI MESIN ABSEN, BAIK DATANG ATAU PULANG';
        $catatan2       ='2. TIDAK ABSEN, DIANGGAP TIDAK MASUK';
        $pendapatan_jasa= $record['uang_prosentase'];
        $subtotal       = $record['gaji_pokok'] + $uang_kehadiran + $uang_makan + $record['uang_prosentase'] + $record['bonus'];
        $denda          = $record['kasbon'];
        $kasbon         = $record['terlambat'];
        $subtotal_kredit= $denda + $kasbon;
        $total_gaji     = $subtotal - $subtotal_kredit;
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(14);
        $pdf->Text(90, 10, 'SLIP GAJI',0,0,'C');
        $pdf->SetFontSize(10);
        $pdf->Text(20,20, 'BULAN PENGGAJIAN',0,0,'C');
        $pdf->Text(62,20, ':',0,0,'C');
        $pdf->Text(67,20, bulan(),0,0,'C');
        $pdf->Text(20,27, 'KODE KARYAWAN',0,0,'C');
        $pdf->Text(62,27, ':',0,0,'C');
        $pdf->Text(67,27, $record2['kode_pegawai'],0,0,'C');
        $pdf->Text(20,34, 'NAMA KARYAWAN',0,0,'C');
        $pdf->Text(62,34, ':',0,0,'C');
        $pdf->Text(67,34, $record2['nama_pegawai'],0,0,'C');
        $pdf->Text(20,41, 'JABATAN',0,0,'C');
        $pdf->Text(62,41, ':',0,0,'C');
        $pdf->Text(67,41, $record2['status'],0,0,'C');
        $pdf->Text(140,20, 'TANGGAL',0,0,'C');
        $pdf->Text(163,20, ':',0,0,'C');
        $pdf->Text(167,20, $record['tanggal'],0,0,'C');
        $pdf->Text(140,27, 'OP',0,0,'C');
        $pdf->Text(163,27, ':',0,0,'C');
        $pdf->Text(167,27, $record['op'],0,0,'C');
        $pdf->Text(140,34, 'AKUNTANSI',0,0,'C');
        $pdf->Text(163,34, ':',0,0,'C');
        $pdf->Text(167,34, $record['akuntansi'],0,0,'C');
        $pdf->Ln(38);
        $pdf->Cell(70,5,'URAIAN',1,0,'C');
        $pdf->Cell(40,5,'NOMINAL',1,0,'C');
        $pdf->Cell(40,5,'JUMLAH MASUK',1,0,'C');
        $pdf->Cell(35,5,'TOTAL',1,0,'C');
        $pdf->Ln(5);
        $pdf->SetFont('','B');
        $pdf->Cell(185,5,'DEBIT',1,0,'L');
        $pdf->SetFont('');
        if($record2['gaji_pokok']!=0){
        $pdf->Ln(5);
        $pdf->Cell(70,5,'GAJI POKOK',1,0,'L');
        $pdf->Cell(40,5,number_format($record['gaji_pokok']),1,0,'C');
        $pdf->Cell(40,5,'1',1,0,'C');
        $pdf->Cell(35,5,number_format($record['gaji_pokok']),1,0,'C');
        $pdf->Ln(5);
        }else{
            $pdf->Ln(5);
        }
        if ($record2['uang_kehadiran']!=0) {
        $pdf->Cell(70,5,'UANG KEHADIRAN',1,0,'L');
        $pdf->Cell(40,5,number_format($record['uang_kehadiran']),1,0,'C');
        $pdf->Cell(40,5,$record['jumlah_kehadiran'],1,0,'C');
        $pdf->Cell(35,5,number_format($uang_kehadiran),1,0,'C');
        }
        if ($record2['uang_makan']!=0) {
        $pdf->Ln(5);
        $pdf->Cell(70,5,'UANG MAKAN',1,0,'L');
        $pdf->Cell(40,5,number_format($record['uang_makan']),1,0,'C');
        $pdf->Cell(40,5,$record['jumlah_kehadiran'],1,0,'C');
        $pdf->Cell(35,5,number_format($uang_makan),1,0,'C');
        }
        if ($record2['prosentase']!=0) {
        $pdf->Ln(5);
        $pdf->Cell(70,5,'PROSENTASE',1,0,'L');
        $pdf->Cell(40,5,$record['prosentase']."%",1,0,'C');
        $pdf->Cell(40,5,number_format($record['uang_prosentase']*$record2['prosentase']),1,0,'C');
        $pdf->Cell(35,5,number_format($record['uang_prosentase']),1,0,'C');
        }
        $pdf->Ln(5);
        $pdf->Cell(70,5,'BONUS',1,0,'L');
        $pdf->Cell(40,5,' ',1,0,'C');
        $pdf->Cell(40,5,number_format($record['bonus']),1,0,'C');
        $pdf->Cell(35,5,number_format($record['bonus']),1,0,'C');

        $pdf->Ln(5);
        $pdf->SetFont('','B');
        $pdf->Cell(150,5,'SUB TOTAL DEBIT',1,0,'C');
        $pdf->Cell(35,5, number_format($subtotal) ,1,0,'C');
        $pdf->SetFont('');

        $pdf->Ln(8);
        $pdf->SetFont('','B');
        $pdf->Cell(185,5,'KREDIT',1,0,'L');
        $pdf->SetFont('');
        $pdf->Ln(5);
        $pdf->Cell(70,5,'TERLAMBAT LEBIH DARI 1 JAM',1,0,'L');
        $pdf->Cell(40,5,number_format($record['denda']),1,0,'C');
        $pdf->Cell(40,5,$record['terlambat']/$record['denda'],1,0,'C');
        $pdf->Cell(35,5,number_format($record['terlambat']),1,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(70,5,'CICILAN HUTANG/KASBON',1,0,'L');
        $pdf->Cell(40,5,'',1,0,'C');
        $pdf->Cell(40,5,'',1,0,'C');
        $pdf->Cell(35,5,number_format($record['kasbon']),1,0,'C');

        $pdf->Ln(5);
        $pdf->SetFont('','B');
        $pdf->Cell(150,5,'SUB TOTAL KREDIT',1,0,'C');
        $pdf->Cell(35,5, number_format($subtotal_kredit) ,1,0,'C');
        $pdf->SetFont('');

        $pdf->Ln(7);
        $pdf->Cell(185,0.5,'',1,0,'C');
        $pdf->Ln(3);
        $pdf->SetFont('','B');
        $pdf->Cell(150,5,'TOTAL GAJI',1,0,'C');
        $pdf->Cell(35,5,number_format($total_gaji) ,1,0,'C');
        $pdf->SetFont('');
        $pdf->Text(90,133,'Mengetahui,',1,0,0,'C');
        $pdf->Text(12,143,'Bag.Administrasi',1,0,0,'C');
        $pdf->Text(22,170,'MARIAMA',1,0,0,'C');
        $pdf->Text(170,143,'Nama Pegawai/',1,0,0,'C');
        $pdf->Text(175,150,'Penerima',1,0,0,'C');
        $pdf->Text(170,170,$record['nama_pegawai'],1,1,0,'C');
        $pdf->Text(12,195,'Catatan:',1,1,0,'C');
        $pdf->Text(12,199,$catatan1,1,1,0,'C');
        $pdf->Text(12,203,$catatan2,1,1,0,'C');
        $pdf->Output();
    }
}
