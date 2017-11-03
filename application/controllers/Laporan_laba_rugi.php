<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_laba_rugi extends CI_Controller {
	public function __construct(){
	parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('penjualan_model');
		$this->load->model('kode_model');
        $this->load->model('tanggal_model');
        $log = $this->session->userdata('level');
        $where = array('level' => $log);
        $check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
        if($check['lap'] != 'Y' OR $check['lapp'] != 'Y' OR $log = '')
        {
            redirect('log/out');
        }
	}

    public function index() {   
        $ptanggal1 = $this->input->post('tanggal1');
        $ptanggal2 = $this->input->post('tanggal2');
        $tanggal1 = date('Y-m-d',strtotime($ptanggal1));
        $tanggal2 = date('Y-m-d',strtotime($ptanggal2));
		if ($ptanggal1 == '' OR $ptanggal2 == '') {
		$this->session->unset_userdata('tanggal1');
        $this->session->unset_userdata('tanggal2');
		}else{
        $sess_data['tanggal1']  = $tanggal1;
        $sess_data['tanggal2']  = $tanggal2;
        $this->session->set_userdata($sess_data);
        $this->session->set_flashdata('sukses','Tanggal Telah Di set');
		}
        $where = array('level' => $this->session->userdata('level'));
		$data = array(
                    'akses'             => $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
					'title' 	=> 'Laporan Laba Rugi - Service Center',
					'url'		=> '#',
					'head'		=> 'Laporan',
					'url2'		=> 'admin/laporan_laba_rugi',
					'head2'		=> 'Laporan Laba Rugi',
					'url3'		=> '#',
					'head3'		=> '',
                    'url4'              => '#',
                    'head4'             => '',
					'nama' 		=> $this->session->userdata('nama'),
					'level'     => $this->session->userdata('level'),
                    'tabel'		=> 'Set Data Laporan Laba Rugi',
					'tampil'	=> 'laporan_laba_rugi',
					'pdf'		=> 'laporan_laba_rugi/pdf/',
					'excel'		=> 'laporan_labarugi/excel/',
					'isi'		=> 'laporan/laba_rugi/list',
					);
		$this->load->view('layout/wrapper',$data);
	}

    function pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->myUser($this->session->userdata("nama"));
        $pdf->SetFont('Arial','B','L');
        $tanggal1=  $this->session->userdata('tanggal1');
        $tanggal2=  $this->session->userdata('tanggal2');
        if ($tanggal1 == '' OR $tanggal2 == '') {
        $periode='Keseluruhan';
        $pendapatan_barang = $this->db->query("SELECT sum(pendapatan.pendapatan) as barang FROM pendapatan WHERE kode_akuntansi='4-1100'")->row_array();
        $pendapatan_jasa = $this->db->query("SELECT sum(pendapatan.pendapatan) as jasa FROM pendapatan WHERE kode_akuntansi='4-2000'")->row_array();
        $penjasa = $this->db->query("SELECT * FROM pendapatan WHERE kode_akuntansi='4-2000'");
        $pegawai = $this->db->query("SELECT * FROM pegawai")->result();
        $penjualan = $this->db->query("SELECT * FROM penjualan");
        $produk = $this->db->query("SELECT * FROM produk where tipe_item='Barang'")->result();
        }else{
        $periode1 = $this->tanggal_model->tanggal($tanggal1);
        $periode2 = $this->tanggal_model->tanggal($tanggal2);    
        $pendapatan_barang = $this->db->query("SELECT sum(pendapatan.pendapatan) as barang FROM pendapatan WHERE kode_akuntansi='4-1100' AND tanggal BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')")->row_array();
        $pendapatan_jasa = $this->db->query("SELECT sum(pendapatan.pendapatan) as jasa FROM pendapatan WHERE kode_akuntansi='4-2000' AND tanggal BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')")->row_array();
        $penjasa = $this->db->query("SELECT * FROM pendapatan WHERE kode_akuntansi='4-2000' AND tanggal BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')");
        $pegawai = $this->db->query("SELECT * FROM pegawai")->result();
        $penjualan = $this->db->query("SELECT * FROM penjualan WHERE tanggal BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')");
        $produk = $this->db->query("SELECT * FROM produk where tipe_item='Barang'")->result();
        }
        //Menghitung Harga Pokok Penjualan
            $jml = $penjualan->num_rows();
            $modal = 0;
            $tawal = 0;
            $takhir = 0;
            foreach ($produk as $produk) {
                for ($i=0; $i < $jml; $i++) { 
                $penj = $penjualan->row_array($i);
                if ($penj['kode_item'] == $produk->kode_item) {
                    $modal = $penj['jumlah'] * $produk->harga_pokok;
                }else{$modal = 0;}
                $tawal = -(-($tawal) - $modal);
                }
            $takhir = -(-($takhir) - $tawal);
            }
        //END Menghitung Harga Pokok Penjualan
        //Menghitung Komisi Penjualan 
            $kjml = $penjasa->num_rows();
            $kmodal = 0;
            $ktawal = 0;
            $ktakhir = 0;
            foreach ($pegawai as $pegawai) {
                for ($i=0; $i < $kjml; $i++) { 
                $pendapjasa = $penjasa->row_array($i);
                if ($pendapjasa['nama_pegawai'] == $pegawai->nama_pegawai) {
                    $kmodal = ($pendapjasa['pendapatan'] * $pegawai->prosentase) / 100;
                }else{$kmodal = 0;}
                $ktawal = -(-($ktawal) - $kmodal);
                }
            $ktakhir = -(-($ktakhir) - $ktawal);
            }
        //END Menghitung Komisi Penjualan 

        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(16);
        $pdf->Setlinewidth(0.7);
        $pdf->Setlinewidth(0);
        $pdf->Cell(190,7,'Demo Servis',0,1,'L');
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(14);
        $pdf->Cell(190,7,'Jl. Anggrek No. 53 Sumedang',0,1,'L');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(18);
        $pdf->text(68,34,'LAPORAN LABA RUGI');
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        if ($tanggal1 == '' OR $tanggal2 == '') {
        $pdf->SetFont('Arial','','L');
        $pdf->text(81,42,'Periode :');
        $pdf->text(99,42,$periode);
        }else{
        $pdf->text(54,42,'Periode :');
        $pdf->text(108,42,'s/d');
        $pdf->SetFont('Arial','','L');
        $pdf->text(74,42,$periode1);
        $pdf->text(116,42,$periode2);    
        }
        $pdf->line(0,45,210,45);
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(11);
        $pdf->text(16,55,'PENDAPATAN');
        $pdf->text(16,62,'HPP');
        $pdf->text(24,69,'PENDAPATAN DAGANG');
        $pdf->SetFont('Arial','','L');
        $pdf->text(32,76,'PENDAPATAN JUAL');
        $pdf->SetFont('Arial','B','L');
        $pdf->text(24,83,'TOTAL PENDAPATAN DAGANG');
        $pdf->SetFont('Arial','','L');
        $pdf->text(24,90,'PENDAPATAN JASA');
        $pdf->SetFont('Arial','B','L');
        $pdf->text(24,97,'TOTAL PENDAPATAN');
        $pdf->text(32,108,'HPP');
        $pdf->SetFont('Arial','','L');
        $pdf->text(40,115,'HARGA POKOP PENJUALAN');
        $pdf->SetFont('Arial','','L');
        $pdf->text(40,122,'KOMISI PENJUALAN');
        $pdf->SetFont('Arial','B','L');
        $pdf->text(32,129,'TOTAL HPP');
        $pdf->SetFont('Arial','B','L');
        $pdf->text(16,140,'TOTAL HPP');
        $pdf->SetFont('Arial','B','L');
        $pdf->text(16,147,'LABA KOTOR');
        $pdf->SetFont('Arial','B','L');
        $pdf->text(16,160,'LABA RUGI');
        $pdf->SetFont('Arial','');
        $pdf->ln(47);
        $pdf->SetX(155);
        $pdf->Cell(30, 7, number_format($pendapatan_barang['barang']), 0,0,'R');
        $pdf->ln(7.5);
        $pdf->SetX(155);
        $pdf->Cell(30, 7, number_format($pendapatan_barang['barang']), 0,0,'R');
        $pdf->ln(7);
        $pdf->SetX(155);
        $pdf->Cell(30, 7, number_format($pendapatan_jasa['jasa']), 0,0,'R');
        $pdf->ln(7);
        $pdf->SetX(155);
        $pendapatan = $pendapatan_barang['barang'] + $pendapatan_jasa['jasa'];
        $pdf->Cell(30, 7, number_format($pendapatan), 0,0,'R');
        $pdf->ln(18);
        $pdf->SetX(155);
        $pdf->Cell(30, 7, number_format($takhir), 0,0,'R');
        $pdf->ln(7);
        $pdf->SetX(155);
        $pdf->Cell(30, 7, number_format($ktakhir), 0,0,'R');
        $pdf->ln(7);
        $pdf->SetX(155);
        $totalhppawal = $takhir + $ktakhir;
        $pdf->Cell(30, 7, number_format($totalhppawal), 0,0,'R');
        $pdf->ln(11);
        $pdf->SetX(155);
        $pdf->Cell(30, 7, number_format($totalhppawal), 0,0,'R');
        $pdf->ln(7);
        $pdf->SetX(155);
        $labakotor = $pendapatan - $totalhppawal ;
        $pdf->Cell(30, 7, number_format($labakotor), 0,0,'R');
        $pdf->ln(13);
        $pdf->SetX(155);
        $pdf->Cell(30, 7, number_format($labakotor), 0,0,'R');
        $pdf->Output(); 
    }

    public function excel(){
        $tanggal1 =  $this->session->userdata('tanggal1');
        $tanggal2 =  $this->session->userdata('tanggal2');
        if ($tanggal1=='' OR $tanggal2=='') {
            $data = array( 'title' => 'Laporan Penjualan',
            'field' => $this->umum_model->tampil('penjualan_total')->result(),
            'periode1' => $tanggal1,
            'periode2' => $tanggal2
            );
            $this->load->view('laporan/penjualan/laporan_excel',$data);
        }else{
        $data = array( 'title' => 'Laporan Penjualan',
        'field' => $this->penjualan_model->tampil_pertanggal($tanggal1,$tanggal2),
        'periode1' => $tanggal1,
        'periode2' => $tanggal2
        );
        $this->load->view('laporan/penjualan/laporan_excel',$data);
        }
    }

}