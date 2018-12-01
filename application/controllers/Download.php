<?php
class Download extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('MDownload');
        $this->load->model('MBerita');
        $this->load->model('MKonten');
        $this->load->model('MNav');
        $this->load->model('MStatistik');
        $this->load->helper('download');
    }
    
    function index(){
        $data['coba'] = $this->MDownload->rowsatu();
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['online'] = $this->MStatistik->getDataToday();
        $data['hits'] = $this->MStatistik->getHits();
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if(empty($found_ip)){
            $data['validate'] = 0;
        } else {
            $data['validate'] = 1;
        }
        $data['h'] = $this->MStatistik->getAllDataStat();
        $this->load->view('header', $data2);
		$this->load->view('download', $data);
        $this->load->view('service');
        $this->load->view('footer');
    }
    
    function multiview(){
        $id = $this->uri->segment(3);
        $data['ambilid'] = $this->MDownload->ambiliddata($id);
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $ip_address = $this->input->ip_address();
        $found_ip = $this->MStatistik->check_ip($ip_address);
        if(empty($found_ip)){
            $data['validate'] = 0;
        } else {
            $data['validate'] = 1;
        }
        $data['h'] = $this->MStatistik->getAllDataStat();
        $data['online'] = $this->MStatistik->getDataToday();
        $data['hits'] = $this->MStatistik->getHits();
         $this->load->view('header', $data2);
		$this->load->view('rincidownload', $data);
        $this->load->view('service');
        $this->load->view('footer');
    }
    
    public function unduh(){
        $file = $this->uri->segment(3);
        $this->load->helper('download');
        $data = file_get_contents("upload/file/.$file"); // Read the file's contents
        force_download($file, $data);
        redirect('download', "refresh");
    }
}
?>