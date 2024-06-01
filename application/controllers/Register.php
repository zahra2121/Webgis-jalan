<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
      	$this->load->helper(array('url','form'));
       	$this->load->model('m_login'); //call model	
	}
 
	public function index(){
		$data1 = array(
            'title' => 'register',
            'isi' => 'layout2/vi_register'
        );
		$this->load->view('layout2/vi_wrapper', $data1, FALSE);
	}

	public function input_user(){
		//validasi form
        // $this->form_validation->set_rules('nama', 'Nama', 'required', [
        //     'required' => '%s Wajib Diisi'
        // ]);
        // $this->form_validation->set_rules('email', 'Email', 'required', [
        //     'required' => '%s Wajib Diisi'
        // ]);
        // $this->form_validation->set_rules('username', 'Username', 'required', [
        //     'required' => '%s Wajib Diisi'
        // ]);
        // $this->form_validation->set_rules('password', 'Password', 'required', [
        //     'required' => '%s Wajib Diisi'
        // ]);
        // $this->form_validation->set_rules('no_hp', 'No_hp', 'required', [
        //     'required' => '%s Wajib Diisi'
        // ]);

        if($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(
                'title' => 'inputuser',
                'isi' => 'layout2/vi_register'
            );
            $this->load->view('layout2/vi_wrapper', $data, FALSE);
        }
        else{
            //form akan diisi
            $data = array(
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'no_hp' => $this->input->post('no_hp'),
                //'level' => $this->input->post('level'),
            );
            
            $this->m_login->daftar($data);
            $this->session->set_flashdata('pesan', 'Daftar Akun Berhasil !!');
            
            redirect('login');
        }
        
	}
}

?>