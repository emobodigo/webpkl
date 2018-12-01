<?php 
class MKonten extends CI_Model {
    
    public function ambilHal($id){
        $query = $this->db->query("SELECT * FROM thalaman WHERE idhal = '$id'");
        return $query;
    }
    
    
     public function getDataKontak(){
        $data = $this->db->get('tsitus');
        return $data->result();
    }
    
    public function getDataBukuTamu($limit, $start){
        $this->db->select('*');
        $this->db->order_by('id','DESC');
        //$q1 = $this->db->query("SELECT * FROM news ORDER BY iddata DESC");
        return $query = $this->db->get('tb_btamu',$limit, $start)->result();
        
    }
    
    public function getAlldataTamu(){
        $data = $this->db->query("SELECT * FROM tb_btamu ORDER BY id DESC");
        return $data->result();
    }
    
    public function CountTamu(){
        return $this->db->get('tb_btamu')->num_rows();
    }
    
    
    function create($table,$data){
    $query = $this->db->insert($table, $data);
    return $this->db->insert_id();// return last insert id
}
    
    public function incre(){
        $query = '0';             
        $this->db->select('idmenu');
        $this->db->like('idmenu', $query, 'after');
        $data = $this->db->get('tmenu')->row();
        
        $number = (int) substr($data->idmenu, 0, 2);
        var_dump($data->idmenu);
        $number++;
        return $number;
    }
    
    
  
    
   
    
}

?>