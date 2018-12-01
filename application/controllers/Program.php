<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('MBerita');
        $this->load->model('MKonten');
        $this->load->model('MNav');
    }
    
	public function index()
	{
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['konten'] = $this->MKonten->getDataArsitektur();
        $data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
		$this->load->view('program/arsitektur', $data);
        $this->load->view('service');
        $this->load->view('footer');
	}
    public function hasilp()
	{
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['konten'] = $this->MKonten->getDataHasilPembangunan();
        $data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
		$this->load->view('program/hasilpembangunan', $data);
        $this->load->view('service');
        $this->load->view('footer');
	}
    public function renja()
	{
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['konten'] = $this->MKonten->getDataRenja();
        $data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
		$this->load->view('program/renja', $data);
        $this->load->view('service');
        $this->load->view('footer');
	}
    public function rencanaStrategis()
	{
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['konten'] = $this->MKonten->getDataRencanaStrategis();
        $data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
		$this->load->view('program/rencanastrategis', $data);
        $this->load->view('service');
        $this->load->view('footer');
	}
}
?>