<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {

  // SET SUPER GLOBAL
  var $CI = NULL;

  /**
   * Class constructor
   *
   * @return   void
   */
  public function __construct() {
        $this->CI =& get_instance();
  }

  public function login($username, $password) {

      //cek username dan password
      $query = $this->CI->db->get_where('user',array('username'=>$username,'password'=>md5($password)));

      if($query->num_rows() == 1) {
          //ambil data user berdasar username
          $row  = $this->CI->db->query('SELECT * FROM user where username = "'.$username.'"');
          $admin = $row->row();
          $iduser   = $admin->iduser;
          $email = $admin->email;
          $namapengguna = $admin->nama;

          //set session user
          $this->CI->session->set_userdata('username', $username);
          $this->CI->session->set_userdata('id_login', uniqid(rand()));
          $this->CI->session->set_userdata('iduser', $iduser);
          $this->CI->session->set_userdata('email', $email);
          $this->CI->session->set_userdata('nama', $namapengguna);


                if($row->num_rows() > 0){
                    $x = $row->row_array();
                    if($x['status']=='1'){
                        $this->CI->session->set_userdata('logged',TRUE);
                        $this->CI->session->set_userdata('username',$username);
                        $id=$x['iduser'];
                        if($x['level']=='1'){ //Admin
                            $user = $x['username'];
                            $ema = $x['email'];
                            $nama = $x['nama'];

                            $this->CI->session->set_userdata('access','Admin');
                            $this->CI->session->set_userdata('iduser',$id);
                            $this->CI->session->set_userdata('username',$user);
                            $this->CI->session->set_userdata('email',$ema);
                            $this->CI->session->set_userdata('nama',$nama);
                             
                            //redirect ke halaman dashboard
                            redirect(site_url('home'));

                        }else if($x['level']=='2'){ //User lapor
                            $user = $x['username'];
                            $ema = $x['email'];
                            $nama = $x['nama'];
                            $this->CI->session->set_userdata('access','User Lapor');
                            $this->CI->session->set_userdata('id',$id);
                            $this->CI->session->set_userdata('username',$user);
                            $this->CI->session->set_userdata('email',$ema);
                            $this->CI->session->set_userdata('nama',$nama);
                            
                            //redirect ke halaman lapor
                            redirect(site_url('user/lapor'));

                        }
                    }else{
                        $url=site_url('login');
                        echo  $this->CI->session->set_flashdata('sukses','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                        <p>Uupps!</p>
                        <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                        redirect($url);
                    }
                }else{
                    $url=site_url('login');
                    echo  $this->CI->session->set_flashdata('sukses','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                        <p>Uupps!</p>
                        <p>Password yang kamu masukan salah.</p>');
                    redirect($url);
                }

       
      }else{

          //jika tidak ada, set notifikasi dalam flashdata.
          $this->CI->session->set_flashdata('sukses','Username atau password anda salah, silakan coba lagi.. ');

          //redirect ke halaman login
          redirect(site_url('login'));
      }
       return false;
   }

  /**
   * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
   * login
   */
  public function cek_login() {

      //cek session username
      if($this->CI->session->userdata('username') == '') {

          //set notifikasi
          $this->CI->session->set_flashdata('sukses','Anda belum login');

          //alihkan ke halaman login
          redirect(site_url('login'));
      }
      else{

      }
  }

  /**
   * Hapus session, lalu set notifikasi kemudian di alihkan
   * ke halaman login
   */
  public function logout() {
    $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
    $this->CI->session->sess_destroy();
    $this->CI->session->unset_userdata('username');
    $this->CI->session->unset_userdata('email');
    $this->CI->session->unset_userdata('name');
    $this->CI->session->unset_userdata('id_login');
    $this->CI->session->unset_userdata('id');
    redirect(site_url('login'));
  }


}