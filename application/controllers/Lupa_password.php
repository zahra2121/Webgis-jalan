<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupa_password extends CI_Controller
{
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'lupapassword',
                'isi' => 'layout2/vi_lupa_password'
            );
            $this->load->view('layout2/vi_wrapper', $data, FALSE);
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->m_login->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('sukses', 'email address salah, silakan coba lagi.');
                redirect(site_url('login'), 'refresh');
            }

            //build token   

            $token = $this->m_login->insertToken($userInfo->iduser);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . '/lupa_password/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';

            $message = '';
            $message .= '<strong>Terimakasih telah menghubungi kami. Untuk mengatur ulang kata sandi, klik tautan dibawah ini.</strong><br>';
            $message .= '<strong>Silakan klik link ini:</strong> ' . $link;

            $data = array(
                'title' => 'message',
                'message' => $message,
                'isi' => 'layout2/vi_tokens'
            );
            $this->load->view('layout2/vi_wrapper', $data, FALSE);

            // echo "<center>
            //     <h3 class='font-weight-light'><b>Token Password</b></h3>
            //     <p>". $message. "</p>
            // </center><br><br>";

            exit;

        }
    }

    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->m_login->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->session->set_flashdata('sukses', 'Token tidak valid atau kadaluarsa');
            redirect(site_url('login'), 'refresh');
        }

        $data = array(
            'title' => 'resetpassword',
            'isi' => 'layout2/vi_reset_password',
            'nama' => $user_info->nama,
            'email' => $user_info->email,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout2/vi_wrapper', $data, FALSE);
        } else {

            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = md5($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            $cleanPost['iduser'] = $user_info->iduser;
            unset($cleanPost['passconf']);
            if (!$this->m_login->updatePassword($cleanPost)) {
                $this->session->set_flashdata('sukses', 'Update password gagal.');
            } else {
                $this->session->set_flashdata('sukses', 'Password anda sudah  
             diperbaharui. Silakan login.');
            }
            redirect(site_url('login'), 'refresh');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }


}