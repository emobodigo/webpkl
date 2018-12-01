<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interaksi extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('MBerita');
        $this->load->model('MKonten');
        $this->load->library("pagination");
        $this->load->model('MNav');
        $this->load->model('MTamu');
        $this->load->model('MStatistik');
    }
    
	public function index()
	{
        $params = array();
        $limit_per_page = 4;
        $start_index = $this->uri->segment(3);
        $total_records = $this->MKonten->CountTamu();
        
        if($total_records > 0){
            
             
            $config['base_url'] = base_url() . "index.php/interaksi/index/";
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
            $params["results"] = $this->MKonten->getDataBukuTamu($config['per_page'], $start_index);
            
            //$params["links"] = $this->pagination->create_links();
        }
        $params['all_data'] = $this->MBerita->getAllData();
        $params['online'] = $this->MStatistik->getDataToday();
        $params['hits'] = $this->MStatistik->getHits();
          $params['h'] = $this->MStatistik->getAllDataStat();
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if(empty($found_ip)){
            $params['validate'] = 0;
        } else {
            $params['validate'] = 1;
        }
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $this->load->view('header', $data2);
		$this->load->view('interaksi/buku-tamu', $params);
        $this->load->view('service');
        $this->load->view('footer');
	}
    
    public function kontakc()
	{
        
        $data['konten'] = $this->MKonten->getDataKontak();
        $data['all_data'] = $this->MBerita->getAllData();
          $data['h'] = $this->MStatistik->getAllDataStat();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['online'] = $this->MStatistik->getDataToday();
        $data['hits'] = $this->MStatistik->getHits();
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if(empty($found_ip)){
            $params['validate'] = 0;
        } else {
            $params['validate'] = 1;
        }
        $this->load->view('header', $data2);
		$this->load->view('interaksi/kontak', $data);
        $this->load->view('service');
        $this->load->view('footer');
	}
    
    public function tamu(){
        $data['nama'] = $this->input->post('nama');
        $data['kota'] = $this->input->post('kota');
        $data['email'] = $this->input->post('email');
        $data['pesan'] = $this->input->post('komentar');
        $data['reply'] = "Pesan belum dibalas";
        $data['dibaca'] = 0;
        date_default_timezone_set('Asia/Jakarta');
        $data['tanggal'] = date("d/m/Y", time());
        $this->MTamu->add($data);
        redirect('interaksi');
    }
    
    public function admintamu(){
        $sesi = $this->session->userdata('hak');
        if($sesi == 3 || $sesi == 1){
        $params = array();
        $limit_per_page = 6;
        $start_index = $this->uri->segment(3);
        $total_records = $this->MTamu->Count();
        
        if($total_records > 0){
            
             
            $config['base_url'] = base_url() . "index.php/interaksi/admintamu/";
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
            $params["results"] = $this->MTamu->limitTamu($config['per_page'], $start_index);
            
            
            //$params["links"] = $this->pagination->create_links();
        }
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/tamuadmin', $params);
        } else {
            $this->session->set_flashdata('error','Anda tidak memiliki hak akses');
            //redirect('login');
            redirect($_SERVER['HTTP_REFERER']);
        }
       
    }
    
    public function balas(){
        $id = $this->uri->segment(3);
        $data['ambilid']= $this->MTamu->ambilTamu($id);
        $data3['dibaca'] = 1;
        $this->MTamu->updateTamu($id,$data3);
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/balasview', $data);
    }
    
    public function reply(){
        $idb = $this->input->post('id');
        $data2['reply'] = $this->input->post('deskripsi');
//        var_dump($data['reply']);
        $this->MTamu->updateTamu($idb, $data2);
        //echo $this->db->last_query();
        $this->session->set_flashdata('sukses','Pesan berhasil di-reply');
       redirect('interaksi/admintamu', "refresh");
    }
}
    

?>