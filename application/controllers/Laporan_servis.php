<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_servis extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
		$this->load->model('laporan_model');
        $log = $this->session->userdata('level');
        $where = array('level' => $log);
        $check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
        if($check['lap'] != 'Y' OR $check['laphis'] != 'Y' OR $log = '')
        {
            redirect('log/out');
        }
	}

	public function index() {
		$lapfilter_servis 	= $this->session->userdata('lapfilter_servis');
		$tambahan   = $this->session->userdata('valurut_servis');
		if ($tambahan != '') {
		if ($lapfilter_servis != '') {
		$lapfilter_servis 	.= $tambahan;
		}else{
		$sort = 'SELECT * FROM servis ';
		$sort .= $tambahan;
		}
		}

		if ($lapfilter_servis != '') {
		$field = $this->db->query($lapfilter_servis)->result();	
		$sess_data['queryservis'] = $lapfilter_servis;
		$this->session->set_userdata($sess_data);
		}else{
		if ($tambahan != '') {
		$field = $this->db->query($sort)->result();
		$sess_data['queryservis'] = $sort;
		$this->session->set_userdata($sess_data);
		}else{
		$semua = "SELECT * FROM servis";
		$field = $this->db->query($semua)->result();	
		$sess_data['queryservis'] = $semua;
		$this->session->set_userdata($sess_data);
		}
		}
		
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Laporan Servis - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Laporan',
						'url2'				=> 'laporan_servis',
						'head2'				=> 'Laporan Servis',
						'url3'				=> '#',
						'tabel'				=> 'Tabel Laporan Servis',
						'tambah'			=> 'servis/tambah',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'filter'			=> 'laporan_servis/filter',
						'urut'				=> 'laporan_servis/urut',
						'field'				=> $field,
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'laporan/servis/list',
						'view'				=> 'loader_data/viewservis',
						'kategori'			=> $this->umum_model->tampil('kategori_servis')->result(),
						'status'			=> $this->umum_model->tampil('status_servis')->result(),
			);
		$this->load->view('layout/wrapper',$data);
	}

	public function filter() {
		//semua
		$all 	 = $this->input->post('all');
		if($all!=''){
			$isi = 'SELECT * FROM servis ';
		//set session
		$sess_data['lapfilter_servis'] = $isi;
		$this->session->set_userdata($sess_data);
		$this->session->unset_userdata('tanggal_servis1');
		$this->session->unset_userdata('tanggal_servis2');
		redirect('laporan_servis');
		}elseif($this->input->post('periode')!=''){
			$tanggal1 = date('Y-m-d', strtotime($this->input->post('tanggal1')));
			$tanggal2 = date('Y-m-d', strtotime($this->input->post('tanggal2')));
			$isi = "SELECT * FROM servis WHERE tanggal BETWEEN date('" . $tanggal1 . "') AND  date('" . $tanggal2 . "')";
		//set session
		$sess_data['lapfilter_servis'] = $isi;
		$sess_data['tanggal_servis1'] = $tanggal1;
		$sess_data['tanggal_servis2'] = $tanggal2;
		$this->session->set_userdata($sess_data);
		redirect('laporan_servis');
		}
		else{
		$this->session->unset_userdata('tanggal_servis1');
		$this->session->unset_userdata('tanggal_servis2');
		//post filter
		$filter1 = $this->input->post('np');
		$filter2 = $this->input->post('ss');
		$filter3 = $this->input->post('ks');
    	//post value
		$tipe = $this->input->post('nama_pelanggan');
		$jenis = $this->input->post('status_servis');
		$kategori = $this->input->post('kategori');
		//1
		if($filter1!='' AND $filter2!='' AND $filter3!=''){
			$isi = 'SELECT * FROM servis WHERE '.$filter1.' IN( ';
			$isi .= "' '";		
			$isi .= ",'".$tipe."'";
			$isi .= ') ';
			$isi .= 'AND '.$filter2.' IN( ';
			$isi .= "' '";		
			foreach ($jenis as $jenis_item) {
			$isi .= ",'".$jenis_item."'";
			}
			$isi .= ') ';
			$isi .= 'AND '.$filter3.' IN( ';
			$isi .= "' '";		
			foreach ($kategori as $kategori_item) {
			$isi .= ",'".$kategori_item."'";
			}
			$isi .= ') ';
		}
		//1-2
		elseif($filter1!='' AND $filter2!=''){
			$isi = 'SELECT * FROM servis WHERE '.$filter1.' IN( ';
			$isi .= "' '";		
			$isi .= ",'".$tipe."'";
			$isi .= ') ';
			$isi .= 'AND '.$filter2.' IN( ';
			$isi .= "' '";		
			foreach ($jenis as $jenis_item) {
			$isi .= ",'".$jenis_item."'";

			}
			$isi .= ') ';
		}
			//1-3
			elseif($filter1!='' AND $filter3!=''){
			$isi = 'SELECT * FROM servis WHERE '.$filter1.' IN( ';
			$isi .= "' '";		
			$isi .= ",'".$tipe."'";
			$isi .= ') ';
			$isi .= 'AND '.$filter3.' IN( ';
			$isi .= "' '";		
			foreach ($kategori as $kategori_item) {
			$isi .= ",'".$kategori_item."'";
			}
			$isi .= ') ';
		}
		//2-3
		elseif($filter2!='' AND $filter3!=''){
			$isi = 'SELECT * FROM servis WHERE '.$filter2.' IN( ';
			$isi .= "' '";		
			foreach ($jenis as $jenis_item) {
			$isi .= ",'".$jenis_item."'";
			}
			$isi .= ') ';
			$isi .= 'AND '.$filter3.' IN( ';
			$isi .= "' '";		
			foreach ($kategori as $kategori_item) {
			$isi .= ",'".$kategori_item."'";
			}
			$isi .= ') ';
		}
		//1
		elseif($filter1!=''){
			$isi = 'SELECT * FROM servis WHERE '.$filter1.' IN( ';
			$isi .= "' '";		
			$isi .= ",'".$tipe."'";
			$isi .= ') ';
		}
		//2
		elseif($filter2!=''){
			$isi = 'SELECT * FROM servis WHERE '.$filter2.' IN( ';
			$isi .= "' '";		
			foreach ($jenis as $jenis_item) {
			$isi .= ",'".$jenis_item."'";
			}
			$isi .= ') ';
		}
		//3
		elseif($filter3!=''){
			$isi = 'SELECT * FROM servis WHERE '.$filter3.' IN( ';
			$isi .= "' '";		
			foreach ($kategori as $kategori_item) {
			$isi .= ",'".$kategori_item."'";
			}
			$isi .= ') ';
		}
		
		//set session
		$sess_data['lapfilter_servis'] = $isi;
		$this->session->set_userdata($sess_data);
		//redirect index
		redirect('laporan_servis');
		}
       
	}

	public function urut() {
	$lapurut = $this->input->post('lapurut');
	$valurut_servis = $this->input->post('valurut_servis');
	if ($lapurut != 'none') {
	$isi = 'ORDER BY '.$lapurut.' '.$valurut_servis;
	$sess_data['valurut_servis'] = $isi;
	$this->session->set_userdata($sess_data);
	}else{
	$this->session->unset_userdata('valurut_servis');
	}
	redirect('laporan_servis');
	}

	public function unsetall(){
		$this->session->unset_userdata('valurut_servis');
		$this->session->unset_userdata('lapfilter_servis');
	}

    function pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->myUser($this->session->userdata("nama"));
        $pdf->SetFont('Arial','B','L');
        $periode1 = $this->session->userdata('tanggal_servis1');
        $periode2 = $this->session->userdata('tanggal_servis2');
        $query = $this->session->userdata('queryservis');
        $field = $this->db->query("$query");
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(18);
        $pdf->Cell(190,7,'LAPORAN DATA SERVIS',0,1,'C');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(16);
        $pdf->Setlinewidth(0.7);
        $pdf->line(0,32,210,32);
        $pdf->Setlinewidth(0);
        $pdf->Cell(190,7,'Demo Servis',0,1,'C');
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(14);
        $pdf->Cell(190,7,'Jl. Anggrek No. 53 Sumedang',0,1,'C');
        if ($periode1 != '' OR $periode2 != '') {
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(12);
        $pdf->text(10,38,'Periode :');
        $pdf->text(71,38,'Sampai Dengan');
        $pdf->SetFont('Arial','B','L');
        $pdf->text(30,38,date('d-m-Y',strtotime($periode1)));
        $pdf->text(105,38,date('d-m-Y', strtotime($periode2)));    
        }
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'Kode Servis', 1,0);
        $pdf->Cell(33, 7, 'Nama Pelanggan', 1,0);
        $pdf->Cell(37, 7, 'Unit Servis', 1,0);
        $pdf->Cell(40, 7, 'Keluhan', 1,0);
        $pdf->Cell(40, 7, 'Teknisi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $jum = $field->num_rows(); 
        $next=31;
        $subtotal=0;
        for ($i=0; $i < $jum; $i++) { 
        $data = $field->row_array($i);
        $no = $i+1;
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(30, 7, $data['kode_servis'], 1,0);
            $pdf->Cell(33, 7, $data['nama_pelanggan'] , 1,0);
            $pdf->Cell(37, 7, $data['unit'], 1,0);
            $pdf->Cell(40, 7, $data['keluhan'], 1,0);
            $pdf->Cell(40, 7, $data['nama_pegawai'], 1,1,'R');
        if ($i == $next) {
        $next = $next + 35;
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'Kode Servis', 1,0);
        $pdf->Cell(33, 7, 'Nama Pelanggan', 1,0);
        $pdf->Cell(37, 7, 'Unit Servis', 1,0);
        $pdf->Cell(40, 7, 'Keluhan', 1,0);
        $pdf->Cell(40, 7, 'Teknisi', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        }
        }
        // end
        $pdf->Output();
    }
}