<?php 
class M_login extends CI_model
{
  	public function index()
	{
		$this->load->view('layout2/vi_login');
	}

	function daftar($data){
         $this->db->insert('user',$data);
    }

    public function getuser($data) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('iduser', $data);
        return $this->db->get()->row();
    }

    function query_validasi_username($username){
    	$result = $this->db->query("SELECT * FROM user WHERE username='$username'");
        return $result;
    }

    function query_validasi_password($username,$password){
    	$result = $this->db->query("SELECT * FROM user WHERE username='$username' AND password= '$password'");
        return $result;
    }


    //Start: method tambahan untuk reset code  
    public function getUserInfo($idtoken)
    {
        $q = $this->db->get_where('user', array('iduser' => $idtoken), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $idtoken . ')');
            return false;
        }
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('user', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    public function insertToken($iduser)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'iduser' => $iduser,
            'dibuat' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $iduser;
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.iduser' => $uid
        ), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->dibuat;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserInfo($row->iduser);
            return $user_info;
        } else {
            return false;
        }
    }

    public function updatePassword($post)
    {
        $this->db->where('iduser', $post['iduser']);
        $this->db->update('user', array('password' => $post['password']));
        return true;
    }
    //End: method tambahan untuk reset code  


 
} 
?>