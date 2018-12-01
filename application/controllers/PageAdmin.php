<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageAdmin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('MKonten');
        $this->load->model('MNav');
        $this->load->model('MTamu');
    }
    
	public function index()
	{
        $sesi = $this->session->userdata('hak');
        if($sesi == 2 || $sesi == 1){
        $data['menu'] = $this->MNav->getAllMenu();
        //$data2['child'] = $this->MNav->getChild();
            $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
		$this->load->view('admin/page', $data);
        } else {
        $this->session->set_flashdata('error','Anda tidak memiliki hak akses');
        //redirect('login');
        redirect($_SERVER['HTTP_REFERER']);
        }
	}
    
    public function showEditPage(){
        $id = $this->uri->segment(3);
        $data['ambilid']= $this->MNav->ambilHalaman($id);
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/editpage',$data);
    }
    
     public function showEditMenu(){
        $id = $this->uri->segment(3);
        $data['ambilid']= $this->MNav->ambilMenuid($id);
         $data['menu'] = $this->MNav->getAllMenuSub();
         $data['action'] = site_url('pageadmin/updateNav');
         $data1['reader'] = $this->MTamu->getRead();
        // $data['selected'] = $this->input->post('menu') ? $this->input->post('menu') : '';
         $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/editnav',$data);
    }
    
    public function updateNav(){
        $par = $this->input->post('parent');
        $idb = $this->input->post('idmenu');
        if(strlen($idb) == 3 || strlen($idb) == 4){
            if($par == 0){
            $ubah = $this->MNav->takeLastId();
            foreach($ubah as $m){
                $ubah2 = $m->idmenu;
            }
            $b = intval($ubah2);
            if($b < 9){
                $awal = $b+1;
                $newId = "0".$awal;
            } else {
            $newId = $b+1;
            }
            $data['idmenu'] = $newId;
            $data['level'] = 1;
            $data['punyasub'] = '0';
            $d = $this->MNav->ambilSub($idb);
            $data['menu'] = $d;
            $data['submenu'] = '';
            $data['file'] = "welcome/nav/";
            $data['parentId'] = $this->input->post('parent');
            $data['level'] = 1;
            $data['punyasub'] = '0';
            $this->MNav->updateMenu($idb, $data); 
            //echo $this->db->last_query();
            $this->session->set_flashdata('sukses','Navigasi berhasil di Update menjadi Single Menu');
            } elseif($par == "99"){
            $ubah = $this->MNav->takeLastId();
            foreach($ubah as $m){
            $ubah2 = $m->idmenu;
            }
            $b = intval($ubah2);
            if($b < 9){
            $awal = $b+1;
            $newId = "0".$awal;
            } else {
            $newId = $b+1;
            }
            $data['idmenu'] = $newId;
            $data['level'] = 1;
            $data['punyasub'] = '1';
            $d = $this->MNav->ambilSub($idb);
            $data['menu'] = $d;
            $data['submenu'] = '';
            $data['level'] = 1;
            $data['punyasub'] = '1';
            $data['parentId'] = $this->input->post('parent');
            $this->MNav->updateMenu($idb, $data); 
            echo $this->db->last_query();
            $this->session->set_flashdata('sukses','Navigasi berhasil di Update menjadi Menu dengan Sub');
             } else {
                $data['level'] = 2;
                $data['punyasub'] = '0';
                $d = $this->MNav->ambilSub($idb);
                $data['submenu'] = $d;
                $data['parentId'] = $this->input->post('parent');
                 $this->MNav->updateMenu($idb, $data);
               
                $this->session->set_flashdata('sukses','Navigasi berhasil di Update menjadi Submenu');
             }
        } else {
            if($par == 0){
            $data['level'] = 1;
            $data['punyasub'] = '0';
            $data['file'] = "welcome/nav/";
            $data['parentId'] = $this->input->post('parent');
            $data['level'] = 1;
            $data['punyasub'] = '0';
            $this->MNav->updateMenu($idb, $data); 
        
            $this->session->set_flashdata('sukses','Navigasi berhasil di Update menjadi Single Menu');
        } else if($par == '99'){
            $data['level'] = 1;
            $data['punyasub'] = '1';
            $data['level'] = 1;
            $data['punyasub'] = '1';
            $data['parentId'] = $this->input->post('parent');
            $this->MNav->updateMenu($idb, $data); 
            echo $this->db->last_query();
            $this->session->set_flashdata('sukses','Navigasi berhasil di Update menjadi Menu dengan Sub');
        } else {
               $data['level'] = 2;
               $data['punyasub'] = '0';
                $tes6 = $this->MNav->takeParentId($par);
            foreach($tes6 as $k){
                $tes7 = $k->idmenu;
            }
            $leng = strlen($tes7);
            $potong = substr($tes7, 2, $leng);
            $int = intval($potong);
            if(substr($potong, 0, 1) == '0' && $int < 9){
                $new = $int+1;
                $baru = "0".$new;
            } else {
                $baru = $int+1;
            }
            $akhir = $par.$baru;
            $data['idmenu'] = $akhir;
               $d = $this->MNav->ambilNamaMenu($idb);
               $data['submenu'] = $d;
               $data['menu'] = '';
               $data['parentId'] = $this->input->post('parent');
               $this->MNav->updateMenu($idb, $data); 
               
               $this->session->set_flashdata('sukses','Navigasi berhasil di Update menjadi Submenu');
            }
        }   
        
        //redirect('pageadmin/navigate', "refresh");
    }
    
    public function updatePage(){
        $data['judul'] = $this->input->post('judul');
        $data['detail'] = $this->input->post('editor1');
        $idb = $this->input->post('idhal');
        $this->MNav->updateHalaman($idb, $data);
         $this->session->set_flashdata('sukses','Halaman berhasil di Update');
        redirect('pageadmin', "refresh");
    }
    
    public function navigate(){
        $sesi = $this->session->userdata('hak');
        if($sesi == 2 || $sesi == 1){
        $data['menu'] = $this->MNav->getAllMenuNav();
        foreach($data['menu'] as $menu){
            if($menu->parentId == 0) {
                $menu->kosong = 'No Parent';
            } else if($menu->parentId == "99") {
                $menu->kosong = 'No Parent With Sub';
            } else {
                $menu->kosong = $this->MNav->test($menu->parentId);
            }
        }
        //$data2['child'] = $this->MNav->getChild();
            $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
		$this->load->view('admin/navigasi', $data);
        } else {
        $this->session->set_flashdata('error','Anda tidak memiliki hak akses');
        //redirect('login');
        redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    public function showAddpage(){
        $data['menu'] = $this->MNav->getAllMenuSub();
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/addpage', $data);
    }
    
    public function tambahhalaman(){
        $coba = $this->input->post('parent');
        if($coba == 0){
            $data['judul'] = $this->input->post('judul');
            $data['detail'] = $this->input->post('editor1');
            date_default_timezone_set('Asia/Jakarta');
            $data['tglupdate'] = date("Y-m-d h:i:s", time());
            $id_hal = $this->MKonten->create('thalaman', $data);
            $data2['menu'] = $this->input->post('judul');
            $data2['punyasub'] = '0';
            $data2['idmenu'] = $this->MKonten->incre();
            $tes = $this->MNav->takeParentId($coba);
            foreach($tes as $k){
                $tes2 = $k->idmenu;
           }
//            $a = substr($tes2, 0, 1);
            $b = intval($tes2);
            if($b < 9){
                $awal = $b+1;
                $newId = "0".$awal;
            } else {
            $newId = $b+1;
            }
            $data2['idmenu'] = $newId;
            $data2['file'] = "welcome/nav/";
            $data2['level'] = 1;
            $data2['aktif'] = '1';
            $data2['parentId'] = $this->input->post('parent');
            $data2['idhal'] = $id_hal;
            $id_hal = $this->MKonten->create('tmenu', $data2);
            $this->session->set_flashdata('sukses','Halaman Menu Berhasil ditambahkan');
        } else if($coba == "99") {
            $data['judul'] = $this->input->post('judul');
            $data['detail'] = $this->input->post('editor1');
            date_default_timezone_set('Asia/Jakarta');
            $data['tglupdate'] = date("Y-m-d h:i:s", time());
            $id_hal = $this->MKonten->create('thalaman', $data);
            $data2['menu'] = $this->input->post('judul');
            $data2['punyasub'] = '1';
            $tes = $this->MNav->takeParentId2($coba);
            foreach($tes as $k){
                $tes2 = $k->idmenu;
           }
//            $a = substr($tes2, 0, 1);
            $b = intval($tes2);
            if($b < 9){
                $awal = $b+1;
                $newId = "0".$awal;
            } else {
            $newId = $b+1;
            }
            $data2['idmenu'] = $newId;
            $data2['file'] = "welcome/nav/";
            $data2['level'] = 1;
            $data2['aktif'] = '1';
            $data2['parentId'] = $this->input->post('parent');
            $data2['idhal'] = $id_hal;
            $id_hal = $this->MKonten->create('tmenu', $data2);
            $this->session->set_flashdata('sukses','Halaman Menu Dengan Sub Berhasil ditambahkan');
        } else {
            $data['judul'] = $this->input->post('judul');
            $data['detail'] = $this->input->post('editor1');
            date_default_timezone_set('Asia/Jakarta');
            $data['tglupdate'] = date("Y-m-d h:i:s", time());
            $id_hal = $this->MKonten->create('thalaman', $data);
            $data2['submenu'] = $this->input->post('judul');
            $data2['punyasub'] = '0';
            $data2['level'] = 2;
            $data2['aktif'] = '1';
            $data2['parentId'] = $this->input->post('parent');
            $par = $this->input->post('parent');
            $tes3 = $this->MNav->takeParentId($par);
            foreach($tes3 as $k){
                $tes4 = $k->idmenu;
            }
            $leng = strlen($tes4);
            $potong = substr($tes4, 2, $leng);
            $int = intval($potong);
            if(substr($potong, 0, 1) == '0' && $int < 9){
                $new = $int+1;
                $baru = "0".$new;
            } else {
                $baru = $int+1;
            }
            $akhir = $par.$baru;
            $data2['idmenu'] = $akhir;
            $data2['idhal'] = $id_hal;
            $id_hal = $this->MKonten->create('tmenu', $data2);
            $this->session->set_flashdata('sukses','Halaman Submenu Berhasil ditambahkan');
        }
        redirect('pageadmin', "refresh");
    }
    
    public function deleteMenus(){
        $id = $this->uri->segment(3);
        $idhal = $this->MNav->ambilDeleteHal($id);
        $data['aktif'] = 0;
        $this->MNav->updateMenu($id, $data);
        $this->MNav->deleteMenu($id);
        $this->MNav->deleteHal($idhal);
        $this->session->set_flashdata('sukses','Halaman berhasil dihapus');
        redirect('pageadmin', "refresh");
    }
    
    
}
