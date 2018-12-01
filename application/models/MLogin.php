<?php
class MLogin extends CI_Model{
    public $table = 'tadmin';
    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
    
    public function sessuser($username){
        $this->db->where('username', $username);
        $hasil = $this->db->get($this->table)->row();
        return $hasil;
    }
    
    public function loggedin(){
        return (bool) $this->session->userdata('loggedin');
    }
}
?>