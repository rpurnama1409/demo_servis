<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_produk extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('umum_model');
        $log = $this->session->userdata('level');
        $where = array('level' => $log);
        $check = $this->umum_model->tampil_filter('level_operator',$where)->row_array();
        if($check['lap'] != 'Y' OR $check['lappro'] != 'Y' OR $log = '')
        {
            redirect('log/out');
        }
	}

	public function index() {
		$lapfilter 	= $this->session->userdata('lapfilter');
		$tambahan   = $this->session->userdata('valurut');
		if ($tambahan != '') {
		if ($lapfilter != '') {
		$lapfilter 	.= $tambahan;
		}else{
		$sort = 'SELECT * FROM produk ';
		$sort .= $tambahan;
		}
		}
		
		if ($lapfilter != '') {
		$field = $this->db->query("$lapfilter")->result();	
		$sess_data['queryproduk'] = $lapfilter;
		$this->session->set_userdata($sess_data);
		}else{
		if ($tambahan != '') {
		$field = $this->db->query("$sort")->result();
		$sess_data['queryproduk'] = $sort;
		$this->session->set_userdata($sess_data);
		}else{
		$semua = "SELECT * FROM produk";
		$field = $this->db->query("$semua")->result();	
		$sess_data['queryproduk'] = $semua;
		$this->session->set_userdata($sess_data);
		}
		}
		$where = array('level' => $this->session->userdata('level'));
				$data = array(
						'akses' 			=> $this->umum_model->tampil_filter('level_operator',$where)->row_array(),
						'judul'				=> 'Demo Servis',
						'sjudul'			=> 'DS',
						'title' 			=> 'Laporan Produk - Demo Servis',
						'url'				=> '#link',
						'head'				=> 'Laporan',
						'url2'				=> 'laporan_produk',
						'head2'				=> 'Laporan Produk',
						'url3'				=> '#',
						'tabel'				=> 'Tabel Laporan Produk',
						'tambah'			=> 'produk/tambah',
						'head3'				=> '',
						'url4'				=> '#',
						'head4'				=> '',
						'filter'			=> 'laporan_produk/set',
						'urut'				=> 'laporan_produk/urut',
						'field'				=> $field,
						'nama' 				=> $this->session->userdata('nama'),
						'isi'				=> 'laporan/produk/list',
						'view'				=> 'loader_data/produk_view',
						'kategori'			=> $this->umum_model->tampil('kategori_produk')->result(),
						'jenis'				=> $this->umum_model->tampil('jenis_produk')->result(),
			);
		$this->load->view('layout/wrapper',$data);
	}


	public function test2(){
	?>
	<form method="post" action="<?php echo base_url('laporan_produk/test') ?>">
	<select name"value[]" multiple>
  <option value="kode_item">Kode Produk</option>
  <option value="barcode">Barkode</option>
  <option value="tipe_item">Tipe Produk</option>
  <option value="kategori">Kategori Produk</option>
  <option value="jenis_item">Jenis Produk</option>
  <option value="nama_item">Nama Produk</option>
	</select>
	<input type="submit" placeholder="Simpan"></input>
	</form>
	<?php
	}


	public function filter() {

	}

	public function urut() {
	$lapurut = $this->input->post('lapurut');
	$valurut = $this->input->post('valurut');
	if ($lapurut != 'none') {
	$isi = 'ORDER BY '.$lapurut.' '.$valurut;
	$sess_data['valurut'] = $isi;
	$this->session->set_userdata($sess_data);
	}else{
	$this->session->unset_userdata('valurut');
	}
	redirect('laporan_produk');
	}

	public function set(){

		//semua
		$all 	 = $this->input->post('all');
		if($all!=''){
			$isi = 'SELECT * FROM produk ';
				//set session
		$sess_data['lapfilter'] = $isi;
		$this->session->set_userdata($sess_data);
		redirect('laporan_produk');
		}else{
		//post filter
		$filter1 = $this->input->post('tp');
		$filter3 = $this->input->post('kp');
		$filter2 = $this->input->post('jn');
		//post value
		$tipe = $this->input->post('tipe_item');
		$jenis = $this->input->post('jenis_item');
		$kategori = $this->input->post('kategori_item');
		//1
		if($filter1!='' AND $filter2!='' AND $filter3!=''){
						$isi = 'SELECT * FROM produk WHERE '.$filter1.' IN( ';
			$isi .= "' '";		
			foreach ($tipe as $tipe_item) {
			$isi .= ",'".$tipe_item."'";
			}
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
			$isi = 'SELECT * FROM produk WHERE '.$filter1.' IN( ';
			$isi .= "' '";		
			foreach ($tipe as $tipe_item) {
			$isi .= ",'".$tipe_item."'";
			}
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
			$isi = 'SELECT * FROM produk WHERE '.$filter1.' IN( ';
			$isi .= "' '";		
			foreach ($tipe as $tipe_item) {
			$isi .= ",'".$tipe_item."'";
			}
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
			$isi = 'SELECT * FROM produk WHERE '.$filter2.' IN( ';
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
			$isi = 'SELECT * FROM produk WHERE '.$filter1.' IN( ';
			$isi .= "' '";		
			foreach ($tipe as $tipe_item) {
			$isi .= ",'".$tipe_item."'";
			}
			$isi .= ') ';
		}
		//2
		elseif($filter2!=''){
			$isi = 'SELECT * FROM produk WHERE '.$filter2.' IN( ';
			$isi .= "' '";		
			foreach ($jenis as $jenis_item) {
			$isi .= ",'".$jenis_item."'";
			}
			$isi .= ') ';
		}
		//3
		elseif($filter3!=''){
			$isi = 'SELECT * FROM produk WHERE '.$filter3.' IN( ';
			$isi .= "' '";		
			foreach ($kategori as $kategori_item) {
			$isi .= ",'".$kategori_item."'";
			}
			$isi .= ') ';
		}
		
		//set session
		$sess_data['lapfilter'] = $isi;
		$this->session->set_userdata($sess_data);
		//redirect index
		redirect('laporan_produk');
		}
       
	}
	//end tes

    function pdf()
    {
        $this->load->library('cfpdf');
        $pdf=new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->myUser($this->session->userdata("nama"));
        $pdf->SetFont('Arial','B','L');
        $query = $this->session->userdata('queryproduk');
        $field = $this->db->query("$query");
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(18);
        $pdf->Cell(190,7,'LAPORAN DATA PRODUK',0,1,'C');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(16);
        $pdf->Setlinewidth(0.7);
        $pdf->line(0,32,210,32);
        $pdf->Setlinewidth(0);
        $pdf->Cell(190,7,'Demo Servis',0,1,'C');
        $pdf->SetFont('Arial','','L');
        $pdf->SetFontSize(14);
        $pdf->Cell(190,7,'Jl. Anggrek No. 53 Sumedang',0,1,'C');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'Kode Produk', 1,0);
        $pdf->Cell(43, 7, 'Nama Produk', 1,0);
        $pdf->Cell(37, 7, 'Stok Tersedia', 1,0);
        $pdf->
        Cell(35, 7, 'Harga Pokok (Rp.)', 1,0);
        $pdf->Cell(35, 7, 'Total (Rp.)', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $jum = $field->num_rows(); 
        $next=31;
        $subtotal=0;
        for ($i=0; $i < $jum; $i++) { 
        $data = $field->row_array($i);
        $no = $i+1;
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(30, 7, $data['kode_item'], 1,0);
            $pdf->Cell(43, 7, $data['nama_item'] , 1,0);
            $pdf->Cell(37, 7, $data['stok'], 1,0);
            $pdf->Cell(35, 7, $data['harga_pokok'], 1,0);
            $pdf->Cell(35, 7, number_format(($total = $data['stok'] * $data['harga_pokok'])), 1,1,'R');
            $subtotal = $subtotal + $total;
        if ($i == $next) {
        $next = $next + 35;
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10,'','',1);
        $pdf->Cell(10, 7, 'No', 1,0);
        $pdf->Cell(30, 7, 'Kode Produk', 1,0);
        $pdf->Cell(33, 12, 'Nama Produk', 1,0);
        $pdf->Cell(37, 7, 'Stok Tersedia', 1,0);
        $pdf->
        Cell(40, 7, 'Harga Pokok', 1,0);
        $pdf->Cell(40, 7, 'Total', 1,1);
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        }
        }
        // end
        $pdf->Cell(150,7,'Total Modal',1,0,'L');
        $pdf->Cell(40,7,'Rp. '.number_format($subtotal),1,0,'R');
        $pdf->Output();
    }
}