<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Copy extends CI_Controller {

    public function __construct(){
        parent::__construct();  
        $this->load->library('session');
        $this->load->library(array('form_validation'));
      	$this->load->helper(array('url','form'));
       	$this->load->model('M_user'); //call model	
    } 
    public function index() {
       // $this->load->view('copy_view');
        $data = array(
            'title' => 'copytext',
            'isi' => 'layout2/vi_userlapor'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
    }

    public function get_text() {
        // Misalkan teks yang ingin disalin adalah dari database atau bisa juga dari variabel
        $text = "Ini adalah teks yang akan disalin ke clipboard.";
        
        // Mengirim teks sebagai JSON
        echo json_encode(['text' => $text]);
    }
}
?>