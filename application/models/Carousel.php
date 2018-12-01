<?php 
class Carousel extends CI_Model {
    public function gambarSlider(){
        $data = $this->db->get('tsshow');
        return $data->result();
        //return array("all_data"=>$result);
    }
    
    public function addfile($data){
        $this->db->insert('tsshow',$data);
    }
    
    public function delete($id, $nama){
                $this->db->where('id', $id);

                unlink("images/".$nama);

                $this->db->delete('tsshow', array('id' => $id));
        }
    
    public function ambilNama($id){
        $this->db->select('foto1')->from('tsshow')->where('id', $id);
       $query = $this->db->get();
         if ($query->num_rows() > 0) {
         return $query->row()->foto1;
     }
     return false;
    }
    
    public function ambilIdData($id){
        $query = $this->db->where('id',$id)
            ->get('tsshow');
        return $query;
    }
    
    function updateSlide($id,$data){
        $this->db->where('id',$id);
        $this->db->update('tsshow',$data);
    }
    
}

?>