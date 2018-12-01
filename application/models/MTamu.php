<?php
class MTamu extends CI_Model{
    public function add($data){
        $this->db->insert('tb_btamu',$data);
    }
    
    public function Count(){
        return $this->db->get('tb_btamu')->num_rows();
    }
    
    public function limitTamu($limit, $start){
        $this->db->select('*');
        $this->db->order_by('id','DESC');
        //$q1 = $this->db->query("SELECT * FROM news ORDER BY iddata DESC");
        return $query = $this->db->get('tb_btamu',$limit, $start)->result();
        
    }
    
     public function ambilTamu($id){
        $query = $this->db->query("SELECT * FROM tb_btamu WHERE id = '$id'");
        return $query;
    }
    
    function updateTamu($id,$data){
        $this->db->where('id',$id);
        $this->db->update('tb_btamu',$data);
    }
    
    public function getAllDataPesan(){
        return $this->db->count_all('tb_btamu');
    }
    
    public function getRead(){
        $a = 0;
        $this->db->where('dibaca', $a);
        $this->db->from('tb_btamu');
        $data = $this->db->count_all_results();
        return $data;
    }
}
?>