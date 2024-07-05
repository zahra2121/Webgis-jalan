<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends CI_Controller {

    function __construct(){
		parent::__construct();		
		$this->load->model('M_dataset');
        
        if($this->session->userdata('logged') !=TRUE){
            $this->simple_login->cek_login();
            
		};
	} 
 
	public function index(){
        $data = array(
            'title' => 'home',
            'black' => $this->M_dataset->all_black(),
            'countkasus' => $this->M_dataset->count_kasus(),
            'countblack' => $this->M_dataset->count_black(),
            'countrawan' => $this->M_dataset->count_status(),
            'countaman' => $this->M_dataset->count_aman(),
            'countproses' => $this->M_dataset->count_proses(),
            'counttahun' => $this->M_dataset->count_tahun(),
            'countkec' => $this->M_dataset->count_kecamatan(),
            'countkatrawan' => $this->M_dataset->count_kat_status(),
            'countkataman' => $this->M_dataset->count_kat_aman(),
            'countkatproses' => $this->M_dataset->count_kat_proses(),
            'isi' => 'v_home'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    // LAPORAN USER
	public function inputlapor(){
		//validasi form
        $this->form_validation->set_rules('tgl_kejadian', 'Tanggal Kejadian', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('jam', 'Waktu Kejadian', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('luka_ringan', 'Jumlah Luka Ringan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('luka_berat', 'Jumlah Luka Berat', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('meninggal', 'Jumlah Meninggal', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('rugi', 'Jumlah Kerugian Materil', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('link_maps', 'Link Maps', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        // $this->form_validation->set_rules('foto', 'Foto', 'required', [
        //     'required' => '%s Wajib Diisi'
        // ]);
        

        if($this->form_validation->run() == FALSE) {
            $cek = $this->session->userdata('level');
            //jika validasi gagal atau tidak lolos validasi
            $data = array(
                'title' => 'inputlapor',
                'isi' => 'layout2/vi_userlapor'
            );
            if($cek == '1'){
                $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                $this->load->view('layout2/vi_wrapper', $data, FALSE);
            }
        }
        else{
            if ($this->input->method() === 'post') {
                
                $file_name = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
                $config['upload_path']          = FCPATH.'/assets/user_lapor/';
                $config['allowed_types']        = 'jpg|jpeg|png|JPG|JPEG|PNG';
                $config['file_name']            = $file_name;
                $config['overwrite']            = true;
                $config['max_size']             = 4096; // 4MB
                
        
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
        
                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('pesan', $error);
                    redirect('home/inputlapor');    

                } else {
                    $uploaded_data = $this->upload->data();
        
                    //form akan diisi
                    $data = array(
                        'iduser' => $this->session->userdata('iduser'),
                        'tgl_kejadian' => $this->input->post('tgl_kejadian'),
                        'jam' => $this->input->post('jam'),
                        'alamat' => $this->input->post('alamat'),
                        'kecamatan' => $this->input->post('kecamatan'),
                        'luka_ringan' => $this->input->post('luka_ringan'),
                        'luka_berat' => $this->input->post('luka_berat'),
                        'rugi' => $this->input->post('rugi'),
                        'meninggal' => $this->input->post('meninggal'),
                        'link_maps' => $this->input->post('link_maps'),
                        //'foto' => $this->input->post('foto'),
                        'foto' => $uploaded_data['file_name'],
                    );
            
                    $this->M_dataset->insert_lapor($data);

                    if($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan', 'Laporan Berhasil ditambahkan, Menunggu Proses Verifikasi Data');
                                            
                    }
                    redirect('user/lapor');
                }
            }
        
        }
        
	}

    // public function edit_lapor($data){
    //     //validasi form
    //     // $this->form_validation->set_rules('tgl_kejadian', 'Tanggal Kejadian', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('jam', 'Waktu Kejadian', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('luka_ringan', 'Jumlah Luka Ringan', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('luka_berat', 'Jumlah Luka Berat', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('meninggal', 'Jumlah Meninggal', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('rugi', 'Jumlah Kerugian Materil', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('link_maps', 'Link Maps', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);
    //     // $this->form_validation->set_rules('foto', 'Foto', 'required', [
    //     //     'required' => '%s Wajib Diisi'
    //     // ]);

    //     if($this->form_validation->run() == FALSE) {
    //         //jika validasi gagal atau tidak lolos validasi
    //         $data = array(
    //             'title' => 'editlapor',
    //             'lapor' => $this->M_dataset->detail_lapor($data),
    //             'detaillapor' => $this->M_dataset->getdetaillapor($data),
    //             'isi' => 'layout/v_editlapor'
    //         );
    //         $this->load->view('layout/v_wrapper', $data, FALSE);
    //     } 
    //     else{
    //         //form akan diisi
    //         $data = array(
    //             'idlapor' => $data,
    //             'iduser' => $this->input->post('iduser'),
    //             'nama' => $this->input->post('nama'),
    //             'tgl_kejadian' => $this->input->post('tgl_kejadian'),
    //             'jam' => $this->input->post('jam'),
    //             'alamat' => $this->input->post('alamat'),
    //             'kecamatan' => $this->input->post('kecamatan'),
    //             'luka_ringan' => $this->input->post('luka_ringan'),
    //             'luka_berat' => $this->input->post('luka_berat'),
    //             'rugi' => $this->input->post('rugi'),
    //             'meninggal' => $this->input->post('meninggal'),
    //             'status_lapor' => $this->input->post('status_lapor'),
    //         );
    //         $this->M_dataset->update_lapor($data);
    //         $this->session->set_flashdata('pesan', 'Data Laporan Berhasil di Perbaharui !!');
            
    //         redirect('home/lapor');
    //     }
	// }

	public function lapor(){
		$data = array(
            'title' => 'lapor',
            'lapor' => $this->M_dataset->all_lapor(),
            'isi' => 'layout/v_lapor'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
	}

    public function hapus_lapor($data)
    {
        $data = array('idlapor' => $data);
        $this->M_dataset->delete_lapor($data);
        $this->session->set_flashdata('pesan', 'Data Laporan Berhasil di Hapus!!');
            
        redirect('home/lapor');
    }

    public function editlapor($data){
        if($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(
                'title' => 'editlapor',
                'detaillapor' => $this->M_dataset->getdetaillapor($data),
                'isi' => 'layout/v_editlapor'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } 
        else{
            //form akan diisi
            $data = array(
                'idlapor' => $data,
                'iduser' => $this->input->post('iduser'),
                'nama' => $this->input->post('nama'),
                'tgl_kejadian' => $this->input->post('tgl_kejadian'),
                'jam' => $this->input->post('jam'),
                'alamat' => $this->input->post('alamat'),
                'kecamatan' => $this->input->post('kecamatan'),
                'luka_ringan' => $this->input->post('luka_ringan'),
                'luka_berat' => $this->input->post('luka_berat'),
                'rugi' => $this->input->post('rugi'),
                'meninggal' => $this->input->post('meninggal'),
                'status_lapor' => $this->input->post('status_lapor')
            );
            $this->M_dataset->update_lapor($data);
            $this->session->set_flashdata('pesan', 'Data Lapor Berhasil di Perbaharui !!');
            
            redirect('home/lapor');
        }
           
	}


    // BLACKSPOT

    public function blackspot(){
		$data = array(
            'title' => 'blackspot',
            'blackspot' => $this->M_dataset->all_black(),
            'countkasus' => $this->M_dataset->count_kasus(),
            'countblack' => $this->M_dataset->count_black(),
            'counting' => $this->M_dataset->counting(),
            'isi' => 'layout/v_blackspot'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        
	}

    // KASUS

    public function kasus(){
		$data = array(
            'title' => 'kasus',
            'kasus' => $this->M_dataset->all_kasus(),
            'countkasus' => $this->M_dataset->count_kasus(),
            'isi' => 'layout/v_kasus'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
	}

    public function detailadmin($data){
        $data = array(
            'title' => 'detailadmin',
            'detailadmin' => $this->M_dataset->getdetail($data),
            'detaildaftar' => $this->M_dataset->getdaftar($data),
            'tampilkasus' => $this->M_dataset->tampil_kasus($data),
            'isi' => 'layout/v_detailadmin'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);

        //form akan diisi
        $data = array(
            'idkasus' => $data,
            'id' => $this->input->post('id'),
            'idblack' => $this->input->post('idblack'),
            'tanggal' => $this->input->post('tanggal'),
            'jam' => $this->input->post('jam'),
            'tahun' => $this->input->post('tahun'),
            'pusat_lat' => $this->input->post('pusat_lat'),
            'pusat_long' => $this->input->post('pusat_long'),
            'luka_ringan' => $this->input->post('luka_ringan'),
            'luka_berat' => $this->input->post('luka_berat'),
            'rugi' => $this->input->post('rugi'),
            'meninggal' => $this->input->post('meninggal'),
            'status' => $this->input->post('status'),
            'aek' => $this->input->post('aek'),
            'ucl' => $this->input->post('ucl'),
        ); 
           
	}

    public function input_blackspot(){
		//validasi form
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('daerah_jalan', 'Daerah Jalan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('pusat_lat', 'Titik Latitude', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('pusat_long', 'Titik Longitude', 'required', [
            'required' => '%s Wajib Diisi'
        ]);

        if($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(
                'title' => 'inputblackspot',
                'isi' => 'layout/v_inputblack'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }
        else{
            //form akan diisi
            $data = array(
                'tahun' => $this->input->post('tahun'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kabupaten' => $this->input->post('kabupaten'),
                'daerah_jalan' => $this->input->post('daerah_jalan'),
                'pusat_lat' => $this->input->post('pusat_lat'),
                'pusat_long' => $this->input->post('pusat_long'),
            );
            
            $this->M_dataset->insert_black($data);
            $this->session->set_flashdata('pesan', 'Data Blackspot Titik Lokasi Berhasil di Tambahkan !!');
            
            redirect('home/blackspot');
        }
        
	}

    public function input_kasus(){
		//validasi form
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('jam', 'Jam', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('luka_ringan', 'Luka Ringan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('luka_berat', 'Luka Berat', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('meninggal', 'Meninggal', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('rugi', 'Kerugian Materil', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('id', 'Pilihan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);

        if($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(
                'title' => 'inputkasus',
                'input_id' => $this->M_dataset->all_inputkasus(),
                'isi' => 'layout/v_inputkasus'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }
        else{
            //form akan diisi
            $data = array(
                'id' => $this->input->post('id'),
                'tanggal' => $this->input->post('tanggal'),
                'jam' => $this->input->post('jam'),
                'luka_ringan' => $this->input->post('luka_ringan'),
                'luka_berat' => $this->input->post('luka_berat'),
                'meninggal' => $this->input->post('meninggal'),
                'rugi' => $this->input->post('rugi'),
            );
           
            $this->M_dataset->insert_kasus($data);
            $this->session->set_flashdata('pesan', 'Data Kasus Berhasil di Tambahkan !!');
            
            redirect('home/kasus');
        }
        
	}

    public function jumlah_kasus($n1,$n2,$n3,$n4){
        $this->load->model('M_dataset');
        $data['luka_ringan']= $n1;
        $data['luka_berat']= $n2;
        $data['meninggal']= $n3;
        $data['rugi']= $n4;
        $data['jumlah_kasus']= $this->M_dataset->jumlah_kasus($n1,$n2,$n3,$n4);

        $this->load->view('layout/v_blackspot', $data);
        
    }

    public function jumlah_asset(){
        $query['total_asset'] = $this->M_dataset->totaldata();

        $this->load->view('layout/v_blackspot', $query);
    }


    public function edit_blackspot($data){
	    //validasi form
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('daerah_jalan', 'Daerah Jalan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('pusat_lat', 'Titik Latitude', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('pusat_long', 'Titik Longitude', 'required', [
            'required' => '%s Wajib Diisi'
        ]);

        if($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(
                'title' => 'editblackspot',
                'blackspot' => $this->M_dataset->detail_black($data),
                'isi' => 'layout/v_editblackspot'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } 
        else{
            //form akan diisi
            $data = array(
                'idblack' => $data,
                'tahun' => $this->input->post('tahun'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kabupaten' => $this->input->post('kabupaten'),
                'daerah_jalan' => $this->input->post('daerah_jalan'),
                'pusat_lat' => $this->input->post('pusat_lat'),
                'pusat_long' => $this->input->post('pusat_long'),
            
            );
            $this->M_dataset->update_black($data);
            $this->session->set_flashdata('pesan', 'Data Blackspot Berhasil di Perbaharui !!');
            
            redirect('home/blackspot');
        }
	}

    public function hapus_black($data)
    {
        $data = array('idblack' => $data);
        $this->M_dataset->delete_black($data);
        $this->session->set_flashdata('pesan', 'Blackspot Lokasi Berhasil di Hapus!!');
            
        redirect('home/blackspot');
    }


    public function edit_kasus($data){
	    //validasi form
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('jam', 'Jam', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('luka_ringan', 'Luka Ringan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('luka_berat', 'Luka Berat', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('meninggal', 'Meninggal', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('rugi', 'Kerugian Materil', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('id', 'Pilihan', 'required', [
            'required' => '%s Wajib Diisi'
        ]);

        if($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(
                'title' => 'editkasus',
                'kasus' => $this->M_dataset->detail_kasus($data),
                'blackspot' => $this->M_dataset->detail_black($data),
                'update_id' => $this->M_dataset->all_updatekasus($data),
                'isi' => 'layout/v_editkasus'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } 
        else{
            //form akan diisi
            $data = array(
                'idkasus' => $data,
                'id' => $this->input->post('id'),
                'tanggal' => $this->input->post('tanggal'),
                'jam' => $this->input->post('jam'),
                'luka_ringan' => $this->input->post('luka_ringan'),
                'luka_berat' => $this->input->post('luka_berat'),
                'meninggal' => $this->input->post('meninggal'),
                'rugi' => $this->input->post('rugi'),
            
            );
            $this->M_dataset->update_kasus($data);
            $this->session->set_flashdata('pesan', 'Data Kasus Berhasil di Perbaharui !!');
            
            redirect('home/kasus');
        }
	}

    public function hapus_kasus($data)
    {
        $data = array('idkasus' => $data);
        $this->M_dataset->delete_kasus($data);
        $this->session->set_flashdata('pesan', 'Kasus Berhasil di Hapus!!');
            
        redirect('home/kasus');
    }


    // DAFTAR USER

    public function daftar_user(){
		$data = array(
            'title' => 'daftaruser',
            'daftaruser' => $this->M_dataset->all_user(),
            'isi' => 'layout/v_daftaruser'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
	}

    public function hapus_user($data)
    {
        $data = array('iduser' => $data);
        $this->M_dataset->delete_user($data);
        $this->session->set_flashdata('pesan', 'Data User Berhasil di Hapus!!');
            
        redirect('home/daftar_user');
    }

    public function edit_user($data){
	    //validasi form
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('level', 'Level', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => '%s Wajib Diisi'
        ]);
        

        if($this->form_validation->run() == FALSE) {
            //jika validasi gagal atau tidak lolos validasi
            $data = array(
                'title' => 'edituser',
                'daftaruser' => $this->M_dataset->detail_user($data),
                'isi' => 'layout/v_edituser'
            );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        } 
        else{
            //form akan diisi
            $data = array(
                'iduser' => $data,
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'no_hp' => $this->input->post('no_hp'),
                'level' => $this->input->post('level'),
                'status' => $this->input->post('status'),
            
            );
            $this->M_dataset->update_user($data);
            $this->session->set_flashdata('pesan', 'Data User Berhasil di Perbaharui !!');
            
            redirect('home/daftar_user');
        }
	}


}

?>