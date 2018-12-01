<?php
class MDownload extends CI_Model {
    
    
    function rowsatu(){
        
        $coba = $this->db->query('SELECT * FROM tjenisfile WHERE CHAR_LENGTH(idjenis) < 3 AND idjenis < 06');
        return $coba->result();
    }
    
    function rowdua($tes){
        $temp = $tes.'%';
        $coba2 = $this->db->query("SELECT * FROM `tjenisfile` WHERE idjenis LIKE '$temp'");
        return $coba2->result();
    }
    
    function counts($id){
        $this->db->select('*');
        $this->db->where("idjenis ='.$id'");
        $query = $this->db->get('tdownload');
        return $query->num_rows();
    }
    
     public function ambiliddata($id){
        $query = $this->db->where('idjenis',$id)
            ->get('tjenisfile');
        return $query;
    }
    
    public function ambiliddatadownload($id){
        $query = $this->db->where('iddata',$id)
            ->get('tdownload');
        return $query;
    }
    
    public function showrinci($id){
        $query = $this->db->query("SELECT * FROM tdownload WHERE idjenis = $id");
        return $query->result();
    }
    
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('tdownload');
        if(array_key_exists('iddata',$params) && !empty($params['iddata'])){
            $this->db->where('iddata',$params['iddata']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }
    
   public function addfile($data){
        $this->db->insert('tdownload',$data);
    }
    
     public function Count(){
        return $this->db->get('tdownload')->num_rows();
    }
    
     public function limitDownload($limit, $start){
        $this->db->select('*');
        $this->db->order_by('iddata','DESC');
        //$q1 = $this->db->query("SELECT * FROM news ORDER BY iddata DESC");
        return $query = $this->db->get('tdownload',$limit, $start)->result();
        
    }
    
   public function delete($id, $nama){
                $this->db->where('iddata', $id);

                unlink("upload/file/".$nama);

                $this->db->delete('tdownload', array('iddata' => $id));
        }
    
     public function ambilNama($id){
        $this->db->select('namafile')->from('tdownload')->where('iddata', $id);
       $query = $this->db->get();
         if ($query->num_rows() > 0) {
         return $query->row()->namafile;
     }
     return false;
    }
    
    function updatefile($id,$data){
        $this->db->where('iddata',$id);
        $this->db->update('tdownload',$data);
    }
}
?>