<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library("pagination");
        $this->load->model('MBerita');
        $this->load->model('MNav');
        $this->load->model('MKonten');
        $this->load->model('MStatistik');
    }
    
	public function index()
	{
        $params = array();
        $limit_per_page = 11;
        $start_index = $this->uri->segment(3);
        $total_records = $this->MBerita->Count();
        
        
        if($total_records > 0){
            
             
            $config['base_url'] = base_url() . "index.php/berita/index/";
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
            $params["results"] = $this->MBerita->limitBerita($config['per_page'], $start_index);
            $data2['menus'] = $this->MNav->getAllMenuFront();
            $params['tamu'] = $this->MKonten->getAlldataTamu();
              $params['h'] = $this->MStatistik->getAllDataStat();
            $params['online'] = $this->MStatistik->getDataToday();
        $params['hits'] = $this->MStatistik->getHits();
            $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if(empty($found_ip)){
            $params['validate'] = 0;
        } else {
            $params['validate'] = 1;
        }
            
            //$params["links"] = $this->pagination->create_links();
        }
        
        //$data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
		$this->load->view('berita', $params);
        $this->load->view('service');
        $this->load->view('footer');
	}
    
    public function showBerita(){
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        $id = $this->uri->segment(3);
        $data['all_data'] = $this->MBerita->getAllData();
        $data['h'] = $this->MStatistik->getAllDataStat();
        $data['online'] = $this->MStatistik->getDataToday();
        $data['hits'] = $this->MStatistik->getHits();
        if(empty($found_ip)){
            $data['validate'] = 0;
        } else {
            $data['validate'] = 1;
        }
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['ambilid']= $this->MBerita->ambilIddata($id);
        $this->MStatistik->updateHits($ip_address);
        $this->load->view('header', $data2);
        $this->load->view('kontenberita',$data);
        $this->load->view('footer');
        
    }
    
   
    
}
