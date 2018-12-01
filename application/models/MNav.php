<?php 
class MNav extends CI_Model {
    
        protected $_table_name = 'idmenu';
        protected $_primary_key = 'id';
        protected $_primary_filter = 'intval';
        protected $_order_by = 'orders';

    public function getAllMenu(){
        $data = $this->db->query("SELECT * FROM tmenu WHERE aktif = 1");
        //$data = $this->db->get(news);
        return $data->result();
        //return array("all_data"=>$result);
    } 
    
    public function getAllMenuNav(){
        $data = $this->db->query("SELECT * FROM tmenu WHERE aktif = 1 AND NOT idmenu = 00 and NOT idmenu = 06 and NOT idmenu = 08");
        //$data = $this->db->get(news);
        return $data->result();
        //return array("all_data"=>$result);
    }
    
    public function getAllMenuFront(){
        $data = $this->db->query("SELECT * FROM tmenu WHERE aktif = 1 and level = 1");
        //$data = $this->db->get(news);
        return $data->result();
        //return array("all_data"=>$result);
    }
    public function getAllMenuSub(){
        $data = $this->db->query("SELECT * FROM tmenu WHERE aktif = 1 and level = 1 and punyasub = 1");
        //$data = $this->db->get(news);
        return $data->result();
        //return array("all_data"=>$result);
    }
    
    public function getChild($id){
        $this->db->select('*');
        $this->db->where('parentId', $id);
        $this->db->where('aktif', 1);
        return $this->db->get('tmenu')->result();
    }
    
    public function getMenuAdmin(){
        $data = $this->db->query("SELECT * FROM tmenu WHERE aktif = 1 and level = 1 EXCEPT SELECT menu FROM tmenu WHERE aktif = 1 and level = 1 and idmenu = 00 and idmenu = 06 and idmenu = 08");
        return $data->result();
    }
    
    public function getCount(){
        $data = $this->db->query("SELECT COUNT(menu)FROM tmenu WHERE aktif = 1 and level = 1");
        return $data->result();
    }
    
    public function ambilHalaman($id){
        $query = $this->db->query("SELECT * FROM thalaman WHERE idhal = '$id'");
        return $query;
    }
    public function takeParentId($id){
        $query = $this->db->query("SELECT idmenu FROM tmenu WHERE parentId = '$id' OR parentId = '99' ORDER BY idmenu DESC LIMIT 1");
        return $query->result();
    }
    public function takeParentId2($id){
        $query = $this->db->query("SELECT idmenu FROM tmenu WHERE parentId = '$id' OR parentId = '0'  ORDER BY idmenu DESC LIMIT 1");
        return $query->result();
    }
    
     public function takeLastId(){
        $query = $this->db->query("SELECT idmenu FROM `tmenu` where CHAR_LENGTH(idmenu) < 3 ORDER BY idmenu DESC LIMIT 1");
        return $query->result();
    }
    
     public function ambilMenu($id){
        $query = $this->db->query("SELECT * FROM tmenu WHERE idhal = '$id'");
        return $query;
    }
    public function ambilMenuid($id){
        $query = $this->db->query("SELECT * FROM tmenu WHERE idmenu = '$id'");
        return $query;
    }
    
     public function ambilSub($id){
        $this->db->select('submenu')->from('tmenu')->where('idmenu', $id);
       $query = $this->db->get();
         if ($query->num_rows() > 0) {
         return $query->row()->submenu;
     }
     return false;
    }
    
     public function ambilDeleteHal($id){
        $this->db->select('idhal')->from('tmenu')->where('idmenu', $id);
       $query = $this->db->get();
         if ($query->num_rows() > 0) {
         return $query->row()->idhal;
     }
     return false;
    }
    
    public function ambilNamaMenu($id){
        $this->db->select('menu')->from('tmenu')->where('idmenu', $id);
       $query = $this->db->get();
         if ($query->num_rows() > 0) {
         return $query->row()->menu;
     }
     return false;
    }
    
     public function parentdd(){
      $this->db->select('*');
         $this->db->where('parentId', 0);
         $this->db->where('aktif', 1);
         $data = $this->db->get('tmenu');
      $dd = array(0 => 'No Parent');
         if($data->num_rows() > 0) {
             foreach($data->result() as $row){
                 $dd[$row->idmenu] = $row->menu;
             }
         }
         return $dd;
    }
    
    function test($id){
        $this->db->select('menu');
        $this->db->where('idmenu', $id);
        $data = $this->db->get('tmenu')->row();
        return $data->menu;
        
    }

    function updateHalaman($id,$data){
        $this->db->where('idhal',$id);
        $this->db->update('thalaman',$data);
    }
    
    function updateMenu($id,$data){
        $this->db->where('idmenu',$id);
        $this->db->update('tmenu',$data);
    }
    
    public function deleteMenu($id){
        $query = $this->db->delete('tmenu', array('idmenu' => $id));
        return $query;
    }
    
    public function deleteHal($id){
        $query = $this->db->delete('thalaman', array('idhal' => $id));
        return $query;
    }
    
   
}
?>