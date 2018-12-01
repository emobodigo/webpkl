<?php 
class MBerita extends CI_Model {
    public function getAllData(){
        $data = $this->db->query("SELECT * FROM news ORDER BY iddata DESC");
        //$data = $this->db->get(news);
        return $data->result();
        //return array("all_data"=>$result);
    }
    
    public function ambiliddata($id){
        $query = $this->db->where('iddata',$id)
            ->get('news');
        return $query;
    }
    
    public function Count(){
        return $this->db->get('news')->num_rows();
    }
    
    public function getAllDataBerita(){
        return $this->db->count_all('news');
    }
    
    public function limitBerita($limit, $start){
        $this->db->select('*');
        $this->db->order_by('iddata','DESC');
        //$q1 = $this->db->query("SELECT * FROM news ORDER BY iddata DESC");
        return $query = $this->db->get('news',$limit, $start)->result();
        
    }
    
    public function ambilBerita($id){
        $query = $this->db->query("SELECT * FROM news WHERE iddata = '$id'");
        return $query;
    }
    
    function updateBerita($id,$data){
        $this->db->where('iddata',$id);
        $this->db->update('news',$data);
    }
    
    public function add($data){
        $this->db->insert('news',$data);
    }
    
     public function delete($id, $nama){
                $this->db->where('iddata', $id);

                unlink("upload/".$nama);

                $this->db->delete('news', array('iddata' => $id));
        }
    
    public function ambilNama($id){
        $this->db->select('foto1')->from('news')->where('iddata', $id);
       $query = $this->db->get();
         if ($query->num_rows() > 0) {
         return $query->row()->foto1;
     }
     return false;
    }
    
}

?>