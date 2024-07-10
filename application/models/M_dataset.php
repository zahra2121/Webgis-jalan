<?php
class M_dataset extends CI_model
{
    public function dataset(){
        $query = $this->db->get('blackspot');
        return $query->result();
    }

    public function all_lapor(){
        $this->db->select('*');
        $this->db->from('lapor');
        $this->db->join('user', 'lapor.iduser = user.iduser', 'left');
        return $this->db->get()->result();
    }

    public function all_user(){
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }

    public function all_black(){
        $this->db->select('blackspot.*, kasus.*, kasus.tanggal, blackspot.patokan as patok_black, blackspot.tahun as tahun_black, SUM(blackspot.aek) as totalsemua_aek, COUNT(blackspot.idblack) as total_data, COUNT(kasus.id) as total_idkasus, COUNT(blackspot.aek) as total_kasus, SUM(kasus.luka_ringan) as lr_aek, SUM(kasus.luka_berat) as lb_aek, SUM(kasus.meninggal) as m_aek, SUM(kasus.rugi) as r_aek');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left');
        $this->db->group_by('kasus.id');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function all_peta(){
        $this->db->select('blackspot.*, kasus.*, kasus.tanggal, blackspot.patokan, COUNT(blackspot.idblack) as total_data, COUNT(kasus.id) as total_idkasus');
        $this->db->from('kasus');
        $this->db->join('blackspot', 'kasus.id = blackspot.idblack', 'left');
        $this->db->group_by('kasus.idkasus');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kasus(){
        $this->db->select('blackspot.*, kasus.*, blackspot.idblack, blackspot.daerah_jalan, COUNT(kasus.id) as total_idkasus, COUNT(kasus.idkasus) as total_kasus, SUM(blackspot.aek) as total_aek, SUM(kasus.luka_ringan) as lr_aek, SUM(kasus.luka_berat) as lb_aek, SUM(kasus.meninggal) as m_aek, SUM(kasus.rugi) as r_aek');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left');
        $query=$this->db->get();
        return $query->result();
    }

    public function count_black(){
        $this->db->select('*, blackspot.patokan, SUM(blackspot.aek) as totalsemua_aek, SUM(blackspot.ucl) as totalsemua_ucl, COUNT(blackspot.daerah_jalan) as total_jalan, COUNT(blackspot.kecamatan) as total_kecamatan, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun');
        $this->db->from('blackspot','left');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function counting(){
        $this->db->select('*, SUM(blackspot.ucl) as totalsemua_ucl, SUM(blackspot.aek) as totalsemua_aek, COUNT(blackspot.daerah_jalan) as total_jalan, COUNT(blackspot.idblack) as total_data');
        $this->db->from('blackspot');
        $this->db->group_by('blackspot.idblack');
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

    public function count_tahun(){
        $this->db->select('blackspot.*, kasus.*, blackspot.kecamatan, COUNT(blackspot.idblack) as total_data, COUNT(kasus.id) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.tahun');
        $query=$this->db->get();
        return $query->result();
    }

    public function count_kat_status(){
        $this->db->select('blackspot.*, kasus.*, blackspot.kecamatan, COUNT(blackspot.status) as total_rawan');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $this->db->where('blackspot.status = "0"');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kat_aman(){
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.status) as tot_aman, COUNT(blackspot.status="0") as total_rawan, COUNT(blackspot.status="1") as total_aman, COUNT(blackspot.status="2") as total_proses');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        //$this->db->where('blackspot.status = "1"');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kat_proses(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.status) as total_proses');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $this->db->where('blackspot.status = "2"');
        $query=$this->db->get();
        return $query->result(); 
    }
    

    public function count_kecamatan(){
        $this->db->select('blackspot.*, kasus.*, blackspot.kecamatan, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.id) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $this->db->group_by('blackspot.kecamatan');
        $query=$this->db->get();
        return $query->result();
    }

    public function count_kec_20(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left');
        $this->db->where('blackspot.tahun = 2020');
        $this->db->group_by('blackspot.kecamatan');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kec_21(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left');
        $this->db->where('blackspot.tahun = 2021');
        $this->db->group_by('blackspot.kecamatan');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kec_22(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left');
        $this->db->where('blackspot.tahun = 2022');
        $this->db->group_by('blackspot.kecamatan');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kec_23(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left');
        $this->db->where('blackspot.tahun = 2023');
        $this->db->group_by('blackspot.kecamatan');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function count_kec_24(){     
        $this->db->select('blackspot.*, kasus.*, COUNT(blackspot.idblack) as total_data, COUNT(blackspot.tahun) as total_tahun, COUNT(kasus.idkasus) as total_idkasus');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left');
        $this->db->where('blackspot.tahun = 2024');
        $this->db->group_by('blackspot.kecamatan');
        $query=$this->db->get();
        return $query->result(); 
    }

    public function tampil_kasus($data){
        $this->db->select('COUNT(kasus.idkasus) as total_kasus');
        $this->db->from('blackspot');
        $this->db->where('blackspot.idblack', $data);
        $this->db->join('kasus', 'blackspot.idblack = kasus.id');
        $query=$this->db->get();
        return $query->result();
    }

    public function all_kasus(){
        $this->db->select('kasus.*, blackspot.*, blackspot.patokan, blackspot.daerah_jalan, blackspot.idblack');
        $this->db->from('kasus');
        $this->db->join('blackspot', 'kasus.id = blackspot.idblack');
        return $this->db->get()->result();
    }

    public function all_inputkasus(){
        $this->db->select('*, blackspot.daerah_jalan, blackspot.idblack');
        $this->db->from('blackspot');
        $this->db->group_by('blackspot.idblack');
        return $this->db->get()->result();
    }

    public function all_updatekasus($data){
        $this->db->select('kasus.*, blackspot.*, blackspot.daerah_jalan, blackspot.idblack');
        $this->db->from('blackspot');
        $this->db->join('kasus', 'blackspot.idblack = kasus.id', 'left',$data);
        $this->db->group_by('kasus.id');
        return $this->db->get()->result();
    }

    public function detailadmin($data) {
        $this->db->select('blackspot.*, kasus.*');
        $this->db->from('kasus');
        $this->db->where('blackspot.idblack', $data);
        $this->db->join('blackspot', 'kasus.id = blackspot.idblack');
        $this->db->group_by('kasus.id');
        return $this->db->get()->row(); 
    }

    public function getdetail($data) {
        $this->db->select('*, COUNT(blackspot.aek) as total_kasus, SUM(kasus.luka_ringan) as lr_aek, SUM(kasus.luka_berat) as lb_aek, SUM(kasus.meninggal) as m_aek, SUM(kasus.rugi) as r_aek');
        $this->db->from('kasus');
        $this->db->where('kasus.idkasus', $data);
        $this->db->join('blackspot', 'blackspot.idblack = kasus.id');
        $this->db->group_by('kasus.id');
        $query=$this->db->get();
        return $query->row(); 
    }

    public function getdaftar($data) {
        $this->db->select('*');
        $this->db->from('kasus');
        $query=$this->db->get();
        return $query->row(); 
    }

    public function getdetaillapor($data) {
        $this->db->select('lapor.*, user.*, user.iduser, user.nama');
        $this->db->from('lapor');
        $this->db->where('lapor.idlapor', $data);
        $this->db->join('user', 'lapor.iduser = user.iduser');
        return $this->db->get()->row();
    }

    public function getkasus() {
        $this->db->select('kasus.id, kasus.idkasus');
        $this->db->from('kasus');
        $this->db->where('kasus.id');
        $this->db->join('blackspot', 'blackspot.idblack = kasus.id');
        $query=$this->db->get();
        return $query->row(); 
    }

    public function insert_lapor($data) {
        $this->db->insert('lapor', $data);
    }

    public function insert_black($data) {
        $this->db->insert('blackspot', $data);
    }

    public function insert_kasus($data) {
        $this->db->insert('kasus', $data);
    } 
    
    public function insert_user($data) {
        $this->db->insert('user', $data);
    }

    //DAFTAR USER

	public function detail_user($data) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('iduser', $data);
        return $this->db->get()->row();
    }

    public function update_user($data){
        $this->db->where('iduser', $data['iduser']);
        $this->db->update('user', $data);
    }

    public function delete_user($data) {
        $this->db->where('iduser', $data['iduser']);
        $this->db->delete('user', $data);
    }

    //LAPORAN USER

	public function detail_lapor($data) {
        $this->db->select('*');
        $this->db->from('lapor');
        $this->db->where('idlapor', $data);
        return $this->db->get()->row();
    }

    public function update_lapor($data){
        $this->db->where('idlapor', $data['idlapor']);
        $this->db->update('lapor', $data);
    }

    public function delete_lapor($data) {
        $this->db->where('idlapor', $data['idlapor']);
        $this->db->delete('lapor', $data);
    }

    //BLACK SPOT

    public function detail_black($data) {
        $this->db->select('*');
        $this->db->from('blackspot');
        $this->db->where('idblack', $data);
        return $this->db->get()->row();
    }

    public function update_black($data){
        $this->db->where('idblack', $data['idblack']);
        $this->db->update('blackspot', $data);
    }

    public function delete_black($data) {
        $this->db->where('idblack', $data['idblack']);
        $this->db->delete('blackspot', $data);
    }

    //KASUS KECELAKAAN

	public function detail_kasus($data) {
        $this->db->select('*');
        $this->db->from('kasus');
        $this->db->where('idkasus', $data);
        return $this->db->get()->row();
    }

    public function detail_semua($data) {
        $this->db->select('kasus.*, blackspot.idblack, blackspot.patokan, blackspot.daerah_jalan');
        $this->db->from('kasus');
        $this->db->where('idkasus', $data);
        $this->db->join('blackspot', 'blackspot.idblack = kasus.id');
        return $this->db->get()->result();
    }

    public function update_kasus($data){
        $this->db->where('idkasus', $data['idkasus']);
        $this->db->update('kasus', $data);
    }

    public function delete_kasus($data) {
        $this->db->where('idkasus', $data['idkasus']);
        $this->db->delete('kasus', $data);
    }

    

}

?>