<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('MBerita');
        $this->load->model('MKonten');
        $this->load->model('MNav');
        $this->load->model('MStatistik');
    }
    
	public function index()
	{
        $id = $this->uri->segment(2);
        $data['konten'] = $this->MKonten->ambilHal($id);
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['h'] = $this->MStatistik->getAllDataStat();
        $this->load->view('header', $data2);
		$this->load->view('profil/profiltj', $data);
        $this->load->view('service');
        $this->load->view('footer');
	}
    
    public function tugaspokok(){
        $data['konten'] = $this->MKonten->getDataTupoksi();
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $this->load->view('header', $data2);
        $this->load->view('profil/tugaspokok', $data);
        $this->load->view('service');
        $this->load->view('footer');
    }
    
    public function struktur(){
        $data['konten'] = $this->MKonten->getDataStruktur();
        $data['all_data'] = $this->MBerita->getAllData();
       $data2['menus'] = $this->MNav->getAllMenuFront();
        $this->load->view('header', $data2);
        $this->load->view('profil/strukturorganisasi', $data);
        $this->load->view('service');
        $this->load->view('footer');
    }
    
    public function sdm(){
        $data['konten'] = $this->MKonten->getDataSdm();
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $this->load->view('header', $data2);
        $this->load->view('profil/sdm', $data);
        $this->load->view('service');
        $this->load->view('footer');
    }
    
    public function prestasi(){
        $data['konten'] = $this->MKonten->getDataPrestasi();
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $this->load->view('header', $data2);
        $this->load->view('profil/prestasi', $data);
        $this->load->view('service');
        $this->load->view('footer');
    }
}