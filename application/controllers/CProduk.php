<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProduk extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('MBerita');
        $this->load->model('MKonten');
        $this->load->model('MNav');
    }
    
	public function index()
	{
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['konten'] = $this->MKonten->getDataTelecenter();
        $data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
		$this->load->view('vproduk/telecenter', $data);
        $this->load->view('service');
        $this->load->view('footer');
	}
    
    public function hasilK(){
        $data['konten'] = $this->MKonten->getDataHasilKegiatan();
        $data['all_data'] = $this->MBerita->getAllData();
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $this->load->view('header', $data2);
        $this->load->view('vproduk/hasilkegiatan', $data);
        $this->load->view('service');
        $this->load->view('footer');
    }
    
    public function produkA(){
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['konten'] = $this->MKonten->getDataProdukAplikasi();
        $data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
        $this->load->view('vproduk/produkaplikasi', $data);
        $this->load->view('service');
        $this->load->view('footer');
    }
    
   
    
    
}
?>