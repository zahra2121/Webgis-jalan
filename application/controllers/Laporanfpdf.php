<?php

// CETAK DATA BLACKSPOT DATA

defined('BASEPATH') OR exit('No direct script access allowed');
class Laporanfpdf extends CI_Controller {
    function __construct(){
        //parent::__construct();  
        $this->load->library('session');
        $this->load->library(array('form_validation'));
      	$this->load->helper(array('url','form'));
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
	function index()
	{

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm','A3');
        $pdf->AddPage();
        $pdf->SetFont('Times','B',16);
        $pdf->Cell(0,7,'SISTEM INFORMASI GEOGRAFIS',0,1,'C');
        $pdf->Cell(0,7,'PEMETAAN TITIK LOKASI DAERAH RAWAN KECELAKAAN LALU LINTAS',0,1,'C');
        $pdf->Cell(0,7,'KABUPATEN BANTUL, DAERAH ISTIMEWA YOGYAKARTA',0,1,'C');

        $pdf->Cell(10,15,'',0,1);
        $pdf->SetFont('Times','B',14);
        $pdf->Cell(0,7,'A. Daftar Titik Blackspot Kecelakaan Lalu Lintas Di Kabupaten Bantul',0,1);

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,7,'NO.',1,0,'C');
        $pdf->Cell(20,7,'TAHUN',1,0,'C');
        $pdf->Cell(30,7,'KECAMATAN',1,0,'C');
        $pdf->Cell(210,7,'ALAMAT',1,0,'C');
        $pdf->Cell(40,7,'LATITUDE',1,0,'C');
        $pdf->Cell(40,7,'LONGITUDE',1,0,'C');
        $pdf->Cell(50,7,'STATUS JALAN',1,0,'C');
        
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',9);
        $blackpot = $this->db->get('blackspot')->result();
        $no=0;
        foreach ($blackpot as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(20,6,$data->tahun,1,0, 'C');
            $pdf->Cell(30,6,$data->kecamatan,1,0, 'C');
            $pdf->Cell(210,6,$data->daerah_jalan,1,0);
            $pdf->Cell(40,6,$data->pusat_lat,1,0);
            $pdf->Cell(40,6,$data->pusat_long,1,0);

            if($data->status == '0'){
                $pdf->Cell(50,6,"DAERAH RAWAN",1,1);
            }
            elseif($data->status == '1'){
                $pdf->Cell(50,6,"BUKAN DAERAH RAWAN",1,1);
            }
            else{
                $pdf->Cell(50,6,"PROSES",1,1);
            }
            
            
	    }
        $pdf->Output();
    }
}