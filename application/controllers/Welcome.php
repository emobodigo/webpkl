<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model("Carousel");
        $this->load->model('MBerita');
        $this->load->model('MKonten');
        $this->load->model('MNav');
        $this->load->model('MStatistik');
    }
    
	public function index()
	{
        $data2['menus'] = $this->MNav->getAllMenuFront();
        //$data2['child'] = $this->MNav->getChild();
        $data['tamu'] = $this->MKonten->getAlldataTamu();
        $data['all_data'] = $this->MBerita->getAllData();
        $data['datagambar'] = $this->Carousel->gambarSlider();
        $this->visitor();
        $this->load->view('header', $data2);
		$this->load->view('index', $data);
        $this->load->view('footer');
	}
    
    public function getData(){
        //$data['konten'] = $this->MKonten->getDataPPID();
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['h'] = $this->MStatistik->getAllDataStat();
        $data['online'] = $this->MStatistik->getDataToday();
        $data['hits'] = $this->MStatistik->getHits();
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if(empty($found_ip)){
            $data['validate'] = 0;
        } else {
            $data['validate'] = 1;
        }
        $this->load->view('header2', $data2);
		$this->load->view('ppid', $data);
        $this->load->view('service');
        $this->load->view('footer');
        
    }
    public function linked(){
        //$data['konten'] = $this->MKonten->getDataPPID();
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['h'] = $this->MStatistik->getAllDataStat();
        $data['online'] = $this->MStatistik->getDataToday();
        $data['hits'] = $this->MStatistik->getHits();
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if(empty($found_ip)){
            $data['validate'] = 0;
        } else {
            $data['validate'] = 1;
        }
        $this->load->view('header2', $data2);
		$this->load->view('informasiberkala', $data);
        $this->load->view('service');
        $this->load->view('footer');
        
    }
    
    public function nav()
	{
        $id = $this->uri->segment(3);
        $data['konten'] = $this->MKonten->ambilHal($id);
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['h'] = $this->MStatistik->getAllDataStat();
        $data['online'] = $this->MStatistik->getDataToday();
        $data['hits'] = $this->MStatistik->getHits();
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if(empty($found_ip)){
            $data['validate'] = 0;
        } else {
            $data['validate'] = 1;
        }
       // $this->hits($ip_address);
        $this->load->view('header2', $data2);
		$this->load->view('profil/profiltj', $data);
        $this->load->view('service');
        $this->load->view('footer');
	}
    
    public function vote(){
        $selected = $this->input->post('vote');
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if (empty($found_ip)) {
                switch($selected){
                    case 1:
                        $data['vote'] = $selected;
                        $data['ip'] = $ip_address;
                        $data['slug'] = "Bermanfaat Sekali";
                        $this->MStatistik->addvote($data);
                        $this->session->set_flashdata('sukses','Terima Kasih telah berpartisipasi');
                        break;
                    case 2:
                        $data{'vote'} = $selected;
                        $data['ip'] = $ip_address;
                        $data['slug'] = "Cukup Bermanfaat";
                        $this->MStatistik->addvote($data);
                        $this->session->set_flashdata('sukses','Terima Kasih telah berpartisipasi');
                        break;
                    case 3:
                        $data{'vote'} = $selected;
                        $data['ip'] = $ip_address;
                        $data['slug'] = "Kurang Bermanfaat";
                        $this->MStatistik->addvote($data);
                        $this->session->set_flashdata('sukses','Terima Kasih telah berpartisipasi');
                        break;
                    case 4:
                        $data{'vote'} = $selected;
                        $data['ip'] = $ip_address;
                        $data['slug'] = "Tidak Bermanfaat";
                        $this->MStatistik->addvote($data);
                        $this->session->set_flashdata('sukses','Terima Kasih telah berpartisipasi');
                        break;
                    default:
                    break;
                }
            } else {
               $this->session->set_flashdata('fail','Anda sudah melakukan vote');
            }
        redirect($_SERVER['HTTP_REFERER'], "refresh");
    }
    
    public function visitor(){
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip2($ip_address);
        if(empty($found_ip)){
            $data['ip'] = $ip_address;
            date_default_timezone_set('Asia/Jakarta');
            $data['tanggal'] = date("Y-m-d", time());
            $this->MStatistik->addData($data);
        }
    }
    
     public function hits($ip){
       $hasil = $this->MStatistik->selectHits($ip);
         foreach($hasil as $k){
                $hasil2 = $k->hits;
            }
        $tambah = $hasil2 + 1;
       $data['hits'] = $tambah;
       $this->MStatistik->updateHits($ip,$data);
        //var_dump($data['hits']);
    }
    

    
}
