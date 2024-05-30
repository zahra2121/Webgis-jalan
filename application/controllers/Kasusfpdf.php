<?php

// CETAK DATA KASUS DATA

defined('BASEPATH') OR exit('No direct script access allowed');
class Kasusfpdf extends CI_Controller {
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
        $pdf->Cell(0,7,'B. Daftar Kasus Kecelakaan Lalu Lintas Di Kabupaten Bantul',0,1);

        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,7,'NO.',1,0,'C');
        $pdf->Cell(20,7,'TANGGAL',1,0,'C');
        $pdf->Cell(20,7,'JAM',1,0,'C');
        $pdf->Cell(210,7,'ALAMAT',1,0,'C');
        $pdf->Cell(30,7,'LUKA RINGAN',1,0,'C');
        $pdf->Cell(30,7,'LUKA BERAT',1,0,'C');
        $pdf->Cell(30,7,'MENINGGAL',1,0,'C');
        $pdf->Cell(40,7,'KERUGIAN MATERIL',1,0,'C');
        
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','',9);

        $kasus = $this->db->query("SELECT kasus.*, blackspot.* FROM kasus JOIN blackspot WHERE kasus.id = blackspot.idblack")->result();
        $no=0;
        foreach ($kasus as $data){
            $no++;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(20,6,$data->tanggal,1,0, 'C');
            $pdf->Cell(20,6,$data->jam,1,0, 'C');
            $pdf->Cell(210,6,$data->daerah_jalan,1,0);
            $pdf->Cell(30,6,$data->luka_ringan,1,0,'C');
            $pdf->Cell(30,6,$data->luka_berat,1,0,'C');
            $pdf->Cell(30,6,$data->meninggal,1,0,'C');
            $pdf->Cell(40,6,$data->rugi,1,1,'C');
          
	    }
        $pdf->Output();
    }
}