<?php
class MUser extends CI_Model {
   
    function getUser(){
        $data = $this->db->query("SELECT * FROM tadmin ORDER BY idadmin");
        return $data->result();
    }
    
    public function ambilUser($id){
        $query = $this->db->query("SELECT * FROM tadmin WHERE idadmin = '$id'");
        return $query;
    }
    
    function updateUser($id,$data){
        $this->db->where('idadmin',$id);
        $this->db->update('tadmin',$data);
    }
    
     public function add($data){
        $this->db->insert('tadmin',$data);
    }
    
    public function getAllDataUser(){
        return $this->db->count_all('tadmin');
    }
    
    
}
?>