<?php

// CETAK DATA RIWAYAT LAPORAN DATA

defined('BASEPATH') OR exit('No direct script access allowed');
class Laporfpdf extends CI_Controller {
    function __construct(){
        parent::__construct();  
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
        $pdf->Cell(0,7,'C. Daftar Riwayat Laporan Kecelakaan Lalu Lintas Di Kabupaten Bantul',0,1);

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(10,7,'NO.',1,0,'C');
        $pdf->Cell(40,7,'LAPORAN',1,0,'C');
        $pdf->Cell(170,7,'ALAMAT',1,0,'C');
        $pdf->Cell(20,7,'TANGGAL',1,0,'C');
        $pdf->Cell(20,7,'JAM',1,0,'C');
        $pdf->Cell(80,7,'TITIK LOKASI (LAT,LONG)',1,0,'C');
        $pdf->Cell(60,7,'DOKUMENTASI',1,0,'C');
        
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',9);
        $lapor = $this->db->get('lapor')->result();
        $no=0;
    
        foreach ($lapor as $data){
            $no++;
            //$jumlah = $data->luka_ringan + $data->luka_berat + $data->meninggal;
           
            $pdf->MultiCell(10,7,$no . "\n",1,0, 'C');
            $pdf->MultiCell(40,7,$data->tanggal_isi . "\n",1,0);
            $pdf->MultiCell(170,7,$data->alamat . "\n",1,0);
            $pdf->MultiCell(20,7,$data->tgl_kejadian . "\n",1,0);
            $pdf->MultiCell(20,7,$data->jam . "\n",1,0,'C');

            $x = $pdf->GetX();
            $y = $pdf->GetY();
            $pdf->MultiCell(80, 7, $data->link_maps . "\nLat: " . $data->latitude . ", Long: " . $data->longitude, 1);
            $pdf->SetXY($x + 80, $y); // Adjust X based on MultiCell width
            $pdf->MultiCell(60,6,$data->foto . "\n",1,1);
            
	    }
        $pdf->Output();
    }
}