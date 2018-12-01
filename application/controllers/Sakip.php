<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sakip extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('MBerita');
        $this->load->model('MKonten');
        $this->load->model('MNav');
    }
    
	public function index()
	{
       $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['konten'] = $this->MKonten->getDataSakipt();
        $data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
		$this->load->view('sakip/sakip2017', $data);
        $this->load->view('footer');
	}
    
    public function sakip2018(){
        $data2['menus'] = $this->MNav->getAllMenuFront();
        $data['konten'] = $this->MKonten->getDataSakipd();
        $data['all_data'] = $this->MBerita->getAllData();
        $this->load->view('header', $data2);
		$this->load->view('sakip/sakip2018', $data);
        $this->load->view('footer');
    }
}
?>