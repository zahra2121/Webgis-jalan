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
        $this->db->from('blackspot');
        $this->db->order_by('tahun', SORT_DESC);
        return $this->db->get()->result();
    }

    public function count_kasus(){
        $this->db->select('blackspot.*, kasus.*, blackspot.idblack, blackspot.daerah_jalan, COUNT(kasus.id) as total_idkasus, COUNT(kasus.idkasus) as total_kasus, SUM(blackspot.aek) as total_aek, SUM(kasus.luka_ringan) as lr_aek, SUM(kasus.luka_berat) as lb_aek, SUM(kasus.meninggal) as m_aek, SUM(kasus.rugi) as r_aek');
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
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        return $this->db->get()->result();
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

    // function grafik admin
    function get_data_stok(){
        $query = $this->db->query("SELECT merk,SUM(stok) AS stok FROM barang GROUP BY merk");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

}