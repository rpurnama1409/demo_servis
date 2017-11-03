<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pembelian extends CI_Controller {
	public function __construct(){
	parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('pembelian_model');
		$this->load->model('kode_model');
        $this->load->model('tanggal_model');
        $log = $this->session->userdata('level');
        $where = array('level' => $log);
        $check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
        if($check['lap'] != 'Y' OR $check['lappem'] != 'Y' OR $log = '')
        {
            redirect('log/out');
        }
	}
	public function index() {	
        $ptanggal1 = $this->input->post('tanggal1');
        $ptanggal2 = $this->input->post('tanggal2');
        $tanggal1 = date('Y-m-d',strtotime($ptanggal1));
        $tanggal2 = date('Y-m-d',strtotime($ptanggal2));
        $where = array('checkout' => 'Y', );
		if ($ptanggal1 == '' OR $ptanggal2 == '') {
		$this->session->unset_userdata('tanggal1');
        $this->session->unset_userdata('tanggal2');
        $field = $this->umum_model->tampil_filter('pembelian_total',$where)->result();
		}else{
        $sess_data['tanggal1']  = $tanggal1;
        $sess_data['tanggal2']  = $tanggal2;
        $this->session->set_userdata($sess_data);
        $field = $this->pembelian_model->tampil_pertanggal($tanggal1,$tanggal2);
		}
        $where = array('level' => $this->session->userdata('level'));
		$data = array(
                    'akses'             => $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
					'title' 	=> 'Laporan Pembelian - Service Center',
					'url'		=> '#',
					'head'		=> 'Laporan',
					'url2'		=> 'laporan_pembelian',
					'head2'		=> 'Pembelian',
					'url3'		=> '#',
					'head3'		=> '',
                    'url4'              => '#',
                    'head4'             => '',
					'nama' 		=> $this->session->userdata('nama'),
					'level'     => $this->session->userdata('level'),
                    'tabel'		=> 'Tabel Data Laporan Pembelian',
					'tampil'	=> 'laporan_pembelian',
					'pdf'		=> 'laporan_pembelian/pdf/',
					'excel'		=> 'laporan_pembelian/excel/',
					'field'		=> $field,
                    'view'      => 'loader_data/lap_pembelian_view',
					'isi'		=> 'laporan/pembelian/list',
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
        }else{
        $periode1= $this->tanggal_model->tanggal($this->session->userdata("tanggal1"));
        $periode2= $this->tanggal_model->tanggal($this->session->userdata("tanggal2"));    
        }
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(18);
        $pdf->Cell(190,7,'LAPORAN TRANSAKSI PEMBELIAN',0,1,'C');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(16);
        $pdf->Setlinewidth(0.7);
        $pdf->line(0,32,210,32);
        $pdf->Setlinewidth(0);
        $pdf->Cell(190,7,'Demo Servis',0,1,'C');
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(14);
        $pdf->Cell(190,7,'Jl. Anggrek No. 53 Sumedang',0,1,'C');
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->text(10,38,'Periode :');
        if ($tanggal1 == '' OR $tanggal2 == '') {
        $pdf->SetFont('Arial','B','L');
        $pdf->text(30,38,$periode);
        }else{
        $pdf->text(71,38,'Sampai Dengan');
        $pdf->SetFont('Arial','B','L');
        $pdf->text(30,38,$periode1);
        $pdf->text(105,38,$periode2);    
        }
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'Nofak', 1,0);
        $pdf->Cell(30, 7, 'Tanggal', 1,0);
        $pdf->Cell(40, 7, 'Pelanggan', 1,0);
        $pdf->
        Cell(40, 7, 'Operator', 1,0);
        $pdf->Cell(40, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        if ($tanggal1 == '' OR $tanggal2 == '') {
        $db = $this->pembelian_model->tampil_tot();
        $jum = $this->pembelian_model->jumlah(); 
        }else{
        $db = $this->pembelian_model->tampil_pertanggal_row($tanggal1,$tanggal2);
        $jum = $this->pembelian_model->jumlah_pertanggal($tanggal1,$tanggal2); 
        }
        $next=31;
        $total=0;
        for ($i=0; $i < $jum; $i++) { 
        $data = $db->row_array($i);
        $no = $i+1;
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(30, 7, $data['kode_pembelian'], 1,0);
            $pdf->Cell(30, 7, date('d-m-Y',  strtotime( $data['tanggal_pembelian'])) , 1,0);
            $pdf->Cell(40, 7, $data['nama_supplier'], 1,0);
            $pdf->Cell(40, 7, $data['sales'], 1,0);
            $pdf->Cell(40, 7, number_format($data['total']), 1,1,'R');
            $total=$total+$data['total'];
        if ($i == $next) {
        $next = $next + 35;
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'Nofak', 1,0);
        $pdf->Cell(30, 7, 'Tanggal', 1,0);
        $pdf->Cell(40, 7, 'Pelanggan', 1,0);
        $pdf->
        Cell(40, 7, 'Operator', 1,0);
        $pdf->Cell(40, 7, 'Total Transaksi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        }
        }
        // end
        $pdf->Cell(150,7,'Total',1,0,'L');
        $pdf->Cell(40,7,'Rp. '.number_format($total),1,0,'R');
        $pdf->Output();
    }
    public function excel(){
        $tanggal1 =  $this->session->userdata('tanggal1');
        $tanggal2 =  $this->session->userdata('tanggal2');

        $where = array('checkout' => 'Y' , );
        if ($tanggal1=='' OR $tanggal2=='') {
            $data = array( 'title' => 'Laporan Penjualan',
            'field' => $this->umum_model->tampil_filter('pembelian_total',$where)->result(),
            'periode1' => $tanggal1,
            'periode2' => $tanggal2
            );
            $this->load->view('laporan/pembelian/laporan_excel',$data);
        }else{
        $data = array( 'title' => 'Laporan Penjualan',
        'field'     => $this->pembelian_model->tampil_pertanggal($tanggal1,$tanggal2),
        'periode1'  => $tanggal1,
        'periode2'  => $tanggal2
        );
        $this->load->view('laporan/pembelian/laporan_excel',$data);
        }
    }

}