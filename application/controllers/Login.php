<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
	
	public function __construct(){
        //parent::__construct();  
        $this->load->library('session');
        $this->load->library(array('form_validation'));
      	$this->load->helper(array('url','form'));
       	$this->load->model('M_login'); //call model	
    } 
 
	public function index(){
		$data = array(
            'title' => 'login',
            'isi' => 'layout2/vi_login'
        );
        $this->load->view('layout2/vi_wrapper', $data, FALSE);
   }

   public function input_login(){
    $data = array(
        'title' => 'login',
        'isi' => 'layout2/vi_login'
    );

    // Fungsi Login
    $valid = $this->form_validation;
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $valid->set_rules('username','username','required');
    $valid->set_rules('password','password','required');

    if($valid->run()) {
       
        $this->simple_login->login($username,$password,site_url('home'), site_url('login'));

    }
    
    $this->load->view('layout2/vi_wrapper', $data, FALSE);
}

    public function logout(){
        $this->simple_login->logout();
    } 

    
	
}

?>