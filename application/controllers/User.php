<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
	
	function __construct(){
		//parent::__construct();
        $this->CI =& get_instance();
        $this->load->model('m_user');
	}
 
	public function index(){
		$data = array(
            'title' => 'user',
            'blackspot' => $this->M_user->get_all_black(),
            'countkasus' => $this->M_user->count_kasus(),
            'countblack' => $this->M_user->count_black(),
            'countrawan' => $this->M_user->count_status(),
            'countaman' => $this->M_user->count_aman(),
            'countproses' => $this->M_user->count_proses(),
            'allkecamatan' => $this->M_user->count_kecamatan(),
            'alltahun' => $this->M_user->count_tahun(),
            'isi' => 'vi_user'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
	}

    public function kasus(){
		$data = array(
            'title' => 'kasus',
            'kasus' => $this->M_user->get_all_kasus(),
            'isi' => 'layout2/vi_detail'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
	}

    public function lapor(){
		$data = array(
            'title' => 'lapor',
            'lapor' => $this->M_user->get_all_lapor(),
            'isi' => 'layout2/vi_tabellapor'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
	}

    public function userlapor(){
		$data = array(
            'title' => 'userlapor',
            'isi' => 'layout2/vi_userlapor'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
	}

    // BLACK SPOT
    public function tabelsemua(){
		$data = array(
            'title' => 'tabelsemua',
            'tabelsemua' => $this->M_user->kasus_black(),
            'isi' => 'layout2/vi_tabelsemua'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
	}

    public function blackspot(){
		$data = array(
            'title' => 'blackspot',
            'blackspot' => $this->M_user->get_all_black(),
            'isi' => 'vi_user'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
	}

    public function detail($data){
        $data = array(
            'title' => 'detail',
            'detail' => $this->M_user->detail($data),
            'isi' => 'layout2/vi_detail'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);

        //form akan diisi
        $data = array(
            'idkasus' => $data,
            'id' => $this->input->post('id'),
            'tanggal' => $this->input->post('tanggal'),
            'jam' => $this->input->post('jam'),
            'tahun' => $this->input->post('tahun'),
            'pusat_lat' => $this->input->post('pusat_lat'),
            'pusat_long' => $this->input->post('pusat_long'),
            'luka_ringan' => $this->input->post('luka_ringan'),
            'luka_berat' => $this->input->post('luka_berat'),
            'rugi' => $this->input->post('rugi'),
            'meninggal' => $this->input->post('meninggal'),
        ); 
           
	}

    // TABEL KASUS
    public function tabelsemua_kasus(){
		$data = array(
            'title' => 'tabelkasus',
            'tabelkasus' => $this->M_user->get_all_kasus(),
            'isi' => 'layout2/vi_tabelsemua'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
	}

    public function detailkasus($data){
        $data1 = array(
            'title' => 'detailkasus',
            'detailjalan' => $this->M_user->detail($data),
            'isi' => 'layout2/vi_detail',
        );
        $this->load->view('layout2/vi_wrapper', $data1, FALSE); 
        
        //form akan diisi
        $data = array(
            'idblack' => $data,
            'daerah_jalan' => $this->input->post('daerah_jalan'),
            'tahun' => $this->input->post('tahun'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'pusat_lat' => $this->input->post('pusat_lat'),
            'pusat_long' => $this->input->post('pusat_long'),
            'status' => $this->input->post('status'),
        );  
        
	}

    public function printmarker(){
       // Load all views as normal
       $data = array(
        'title' => 'Data Titik Lokasi Daerah Rawan Kecelakaan Lalu Lintas di Kab. Bantul',
        'printmarker' => $this->M_user->printmarker(),
        'isi' => 'layout2/vi_printmarker'
       );

       $this->load->view('cetakmarker', $data);
       // Get output html
       $html = $this->output->get_output();
   
       // Load library
       $this->load->library('dompdf_gen');
   
       // Convert to PDF
       $this->dompdf->load_html($html);
       $this->dompdf->render();
       $this->dompdf->stream("cetakmarker" . ".pdf", array ('Attachment' => 0));
    }
}

?>