<?php

class M_user extends CI_model
{

    public function blackspot()
    {
        $query = $this->db->get('blackspot');
        return $query->result();
    }

    public function get_all_black(){
        $this->db->select('*');
        $this->db->order_by('tahun', 'DESC');
        $this->db->from('blackspot');
        return $this->db->get()->result();
    
    }

    public function all_black(){
        $this->db->select('blackspot.*, kasus.*, blackspot.patokan, kasus.tanggal, blackspot.tahun as tahun_black, SUM(blackspot.aek) as totalsemua_aek, COUNT(blackspot.idblack) as total_data, COUNT(kasus.id) as total_idkasus, COUNT(blackspot.aek) as total_kasus, SUM(kasus.luka_ringan) as lr_aek, SUM(kasus.luka_berat) as lb_aek, SUM(kasus.meninggal) as m_aek, SUM(kasus.rugi) as r_aek');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left');
        $this->db->group_by('kasus.id');
        $query=$this->db->get();
        return $query->result();
    }

    public function count_kasus(){
        $this->db->select('blackspot.*, kasus.*, blackspot.patokan, blackspot.idblack, blackspot.daerah_jalan, COUNT(kasus.id) as total_idkasus, COUNT(kasus.idkasus) as total_kasus, SUM(blackspot.aek) as total_aek, SUM(kasus.luka_ringan) as lr_aek, SUM(kasus.luka_berat) as lb_aek, SUM(kasus.meninggal) as m_aek, SUM(kasus.rugi) as r_aek');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $query=$this->db->get();
        return $query->result();
    }

    public function count_black(){
        $this->db->select('*, SUM(blackspot.ucl) as totalsemua_ucl, SUM(blackspot.aek) as totalsemua_aek, COUNT(blackspot.daerah_jalan) as total_jalan, COUNT(blackspot.kecamatan) as total_kecamatan, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun');
        $this->db->from('blackspot');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_status(){
        $this->db->select('*, COUNT(blackspot.status) as tot_rawan');
        $this->db->from('blackspot');
        $this->db->where('blackspot.status = "0"');

        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_aman(){
        $this->db->select('*, COUNT(blackspot.status) as tot_aman');
        $this->db->from('blackspot');
        $this->db->where('blackspot.status = "1"');
        
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_proses(){     
        $this->db->select('*, COUNT(blackspot.status) as tot_proses');
        $this->db->from('blackspot');
        $this->db->where('blackspot.status = "2"');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kecamatan(){
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $query=$this->db->get();
        return $query->result();
    }

    public function count_kec_20(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $this->db->where('blackspot.tahun = "2020"');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kec_21(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $this->db->where('blackspot.tahun = "2021"');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kec_22(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $this->db->where('blackspot.tahun = "2022"');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kec_23(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $this->db->where('blackspot.tahun = "2023"');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kec_24(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $this->db->where('blackspot.tahun = "2024"');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_tahun(){
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.kecamatan) as total_kecamatan');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.tahun');
        $query=$this->db->get();
        return $query->result();
    }

    public function kasus_black(){
        $this->db->select('*');
        $this->db->order_by('kasus.tanggal', 'DESC');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        return $this->db->get()->result();
    }

    public function count_kat_status(){
        $this->db->select('*, COUNT(blackspot.status) as tot_rawan');
        $this->db->from('blackspot');
        $this->db->where('blackspot.status = "0"');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.tahun');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kat_aman(){
        $this->db->select('*, COUNT(blackspot.status) as tot_aman, SUM(blackspot.aek) as totalsemua_aek, SUM(blackspot.ucl) as totalsemua_ucl');
        $this->db->from('blackspot');
        $this->db->where('blackspot.status = "1"');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.tahun');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kat_proses(){     
        $this->db->select('*, COUNT(blackspot.status) as tot_proses');
        $this->db->from('blackspot');
        $this->db->where('blackspot.status = "1"');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.tahun');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function laporuser()
    {
        $query = $this->db->get('lapor');
        return $query->result();
    }

    public function get_all_lapor(){
        $this->simple_login->cek_login();
        $this->db->select('*');
        $this->db->from('lapor');
        $this->db->order_by('tanggal_isi', 'DESC');
        return $this->db->get()->result();
    }

    public function kasus()
    {
        $query = $this->db->get('kasus');
        return $query->result();
    }

    public function get_all_kasus(){
        $this->db->select('*');
        $this->db->from('kasus');
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get()->result();
    }

    // Print tabel lapor user
    public function printlapor(){
        $this->db->select('*');
        $this->db->from('lapor');
        return $this->db->get()->result();
    }

    public function detail($data) {
        $this->db->select('kasus.*, blackspot.*');
        $this->db->from('kasus');
        $this->db->where('idkasus', $data);
        $this->db->join('blackspot', 'blackspot.idblack = kasus.id');
        return $this->db->get()->row();
    }

    public function jalan($data) {
        $this->db->select('*');
        $this->db->from('kasus');
        $this->db->where('idkasus', $data);
        return $this->db->get()->row();
    }

}