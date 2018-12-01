<?php
class MY_Model extends CI_Model {
    
    protected $table_name = '';
    protected $primary_key = 'id';
    protected $primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $timestamps = FALSE;
    
    function __construct(){
        parent::__construct();
    }
    
    public function get($id = NULL, $single = FALSE){
        if($id != null){
            $filter = $this->primary_filter;
            $id = $filter($id);
            $this->db->where($this->primary_key, $id);
            $method = 'row';
        } elseif($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        
        if (!count($this->db->order_by($this->_order_by))) {
            $this->db->order_by($this->_order_by);
        }
        return $this->db->get($this->table_name)->$method();
    }
    
    public function get_by($where, $single = FALSE){
        $this->db->where($where);
        return $this->get(NULL, $single);
    }
    
    public function save($data, $id = NULL){
        //set timestampt
        if($this->timestamps == TRUE){
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }
        
        //insert
        if($id === NULL){
            !isset($data[$this->primary_key]) || $data[$this->primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->table_name);
            $id = $this->db->insert_id();
        }
        
        //update
         else {
             $filter = $this->primary_filter;
             $id = $filter($id);
             $this->db->set($data);
             $this->db->where($this->primary_key, $id);
             $this->db->update($this->table_name);
         }
        return $id;
    }
    
    public function delete($id){
        $filter = $this->primary_filter;
        $id = $filter($id);
        
        if(!$id){
            return FALSE;
        }
        $this->db->where($this->primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->table_name);
    }
}
?>
