<?php 
class MStatistik extends CI_Model {
    public function getAllDataStat(){
        return $this->db->count_all('statistik');
    }
    
    public function addvote($data){
        $this->db->insert('poll',$data);
    }
    
    function check_ip($ip)
	{
		$this->db->where('ip', $ip);
		$result = $this->db->get('poll');
		if ($result->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
    
    function check_ip2($ip)
	{
        $date = new DateTime("now");
       $curr_date = $date->format('Y-m-d ');
		$this->db->where('ip', $ip);
        $this->db->where('DATE(tanggal)',$curr_date);
		$result = $this->db->get('statistik');
		if ($result->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
    
    public function total(){
        return $this->db->get('poll')->num_rows();
    }
    
    public function sb(){
        $where = 1;
        $this->db->where('vote', $where);
        $this->db->from('poll');
        $data = $this->db->count_all_results();
        return $data;
    }
    
    public function cb(){
        $where = 2;
        $this->db->where('vote', $where);
        $this->db->from('poll');
        $data = $this->db->count_all_results();
        return $data;
    }
    
    public function kb(){
        $where = 3;
        $this->db->where('vote', $where);
        $this->db->from('poll');
        $data = $this->db->count_all_results();
        return $data;
    }
    
    public function tb(){
        $where = 4;
        $this->db->where('vote', $where);
        $this->db->from('poll');
        $data = $this->db->count_all_results();
        return $data;
    }
    
    public function addData($data){
        $this->db->insert('statistik',$data);
    }
    
    public function updateHits($ip){

//        $this->db->where('ip',$ip);
//        $this->db->update('statistik',$data);
        $this->db->where("ip",$ip);
        $this->db->select('hits');
        $count = $this->db->get('statistik')->row();
        //increase hits
        $this->db->where("ip",$ip);
        $this->db->set('hits', ($count->hits + 1));
        $this->db->update('statistik');
    }
    
    public function selectHits($ip){
        $query = $this->db->query("SELECT hits FROM statistik WHERE ip = '$ip'");
        return $query->result();
    }
    
    function getDataToday() {
       $date = new DateTime("now");
       $curr_date = $date->format('Y-m-d ');
       $this->db->where('DATE(tanggal)',$curr_date);
       $this->db->from('statistik');
       $data = $this->db->count_all_results();
       return $data;
    }
    
    function getHits(){
        $date = new DateTime("now");
       $curr_date = $date->format('Y-m-d ');
        $this->db->select('SUM(hits) AS total', FALSE);
        $this->db->where('DATE(tanggal)',$curr_date);
        $query = $this->db->get('statistik');
        $result = $query->result();
        return $result[0]->total;
    }
    
}
?>