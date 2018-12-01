<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('MBerita');
        $this->load->model('MDownload');
        $this->load->model('MTamu');
        $this->load->model('MUser');
        $this->load->model('MStatistik');
        $this->load->model('Carousel');
        $this->load->library("pagination");
        $this->load->helper('ckeditor');
        $this->load->library('upload');
        $this->load->model('MNav');
        
    }
    
	public function index()
	{
        //$this->load->view('admin/navbar');
        $sesi = $this->session->userdata('hak');
        if($sesi == 1 || $sesi == 3 || $sesi == 2){
        $data['menus'] = $this->MNav->getAllMenu();
        $data['jumlah'] = $this->MNav->getCount();
        $data['allnews'] = $this->MBerita->getAllDataBerita();
        $data['alltamu'] = $this->MTamu->getAllDataPesan();
        $data['alluser'] = $this->MUser->getAllDataUser();
        $data['allvisitor'] = $this->MStatistik->getAllDataStat();
        $data['slider'] = $this->Carousel->gambarSlider();
        $data1['reader'] = $this->MTamu->getRead();
        $jumlah = $this->MStatistik->total();
        $pembagi = $this->MStatistik->sb();
        $hasil = $pembagi/$jumlah * 100;
        $pembagi2 = $this->MStatistik->cb();
        $hasil2 = $pembagi2/$jumlah * 100;
        $pembagi3 = $this->MStatistik->kb();
        $hasil3 = $pembagi3/$jumlah * 100;
        $pembagi4 = $this->MStatistik->tb();
        $hasil4 = $pembagi4/$jumlah * 100;
        $data['satu'] = $hasil;
        $data['dua'] = $hasil2;
        $data['tiga'] = $hasil3;
        $data['empat'] = $hasil4;
        $this->load->view('admin/side-left',$data1);
		$this->load->view('admin/index', $data);
        } else {
            $this->session->set_flashdata('error','Restricted access area');
            redirect('login');
            //redirect($_SERVER['HTTP_REFERER']);
        }
       
        
        //$this->load->view('admin/index');
	}
    
    public function goBerita(){
        $sesi = $this->session->userdata('hak');
        if($sesi == 3 || $sesi == 1){
        $params = array();
        $limit_per_page = 6;
        $start_index = $this->uri->segment(3);
        $total_records = $this->MBerita->Count();
        
        if($total_records > 0){
            
             
            $config['base_url'] = base_url() . "index.php/admin/goBerita/";
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
            $params["results"] = $this->MBerita->limitBerita($config['per_page'], $start_index);
            
            //$params["links"] = $this->pagination->create_links();
        }
            $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/news', $params);
        } else {
            $this->session->set_flashdata('error','Anda tidak memiliki hak akses');
            //redirect('login');
            redirect($_SERVER['HTTP_REFERER']);
        }
       
    }
    
    public function showEditBerita(){
        $id = $this->uri->segment(3);
        $data['ambilid']= $this->MBerita->ambilberita($id);
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/editberita',$data);
    }
    
    
    
    public function update(){
         $idb = $this->input->post('iddata');
        $name2 = $this->MBerita->ambilNama($idb);
            $image = $_FILES["filefoto"]["name"];
            $namafile = $_FILES['filefoto']['name'];
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
            $config['max_width'] = 8000;
            $config['max_height'] = 8000;
            $config['file_name'] = $namafile;
            
            //$this->load->library('upload');
            $this->upload->initialize($config);
        if(!empty($image)){
            unlink("upload/".$name2);
		    $this->upload->do_upload('filefoto');
                        $gambar = $this->upload->data();
                        $data['judul'] = $this->input->post('judul');
                        $data['deskripsi'] = $this->input->post('deskripsi');
                        $data['detailnews'] = $this->input->post('editor1');
                        $data['foto1'] = $gambar['file_name'];
                       
                        $res = $this->MBerita->updateBerita($idb, $data);
                            $this->session->set_flashdata('success','Data Berhasil diEdit');
    
        } else {
                        $data['judul'] = $this->input->post('judul');
                        $data['deskripsi'] = $this->input->post('deskripsi');
                        $data['detailnews'] = $this->input->post('editor1');
                        $this->MBerita->updateBerita($idb, $data);
                            $this->session->set_flashdata('success','Data Berhasil diEdit, tanpa perubahan foto');
                        
        }

           redirect("admin/goBerita", "refresh");;
        
    }
    
    public function tambahBerita(){
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/addberita');
    }
    
    public function tambah(){
        $image = $_FILES["filefoto"]["name"];
           $namafile = $_FILES['filefoto']['name'];
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1024 * 8;
            $config['max_width'] = 5000;
            $config['max_height'] = 5000;
            $config['file_name'] = $namafile;
            
            //$this->load->library('upload');
            $this->upload->initialize($config);
        if(!empty($image)){
		    $this->upload->do_upload('filefoto');
                        $gambar = $this->upload->data();
                        $data['judul'] = $this->input->post('judul');
                        $data['deskripsi'] = $this->input->post('deskripsi');
                        $data['detailnews'] = $this->input->post('editor1');
                        $data['foto1'] = $gambar['file_name'];
                        $data['detailyn'] = $this->input->post('detailno');
                        $data['editorial'] = $this->input->post('editorial');
                        date_default_timezone_set('Asia/Jakarta');
                        $data['tglposting'] = date("Y-m-d h:i:s", time());
                        $this->MBerita->add($data);
                            $this->session->set_flashdata('success','Data Berhasil diTambahkan');
                        
    
            } else {
                        $data['judul'] = $this->input->post('judul');
                        $data['deskripsi'] = $this->input->post('deskripsi');
                        $data['detailnews'] = $this->input->post('editor1');
                        $data['detailyn'] = $this->input->post('detailno');
                        $data['editorial'] = $this->input->post('editorial');
                        date_default_timezone_set('Asia/Jakarta');
                        $data['tglposting'] = date("Y-m-d h:i:s", time());
                        $this->MBerita->add($data);
                        $this->session->set_flashdata('warning','Data Berhasil diTambahkan tanpa foto, silahkan edit untuk menambah foto');
        }

           redirect("admin/goBerita", "refresh");;
    }
    
    public function hapusBerita(){
        $id = $this->uri->segment(3);
        $name = $this->MBerita->ambilNama($id);
       $this->MBerita->delete($id, $name);

            $this->session->set_flashdata('hapus','Data Berhasil dihapus');
       
        redirect('admin/goBerita');
    }
    
    public function uploadAdmin(){
        $sesi = $this->session->userdata('hak');
        if($sesi == 3 || $sesi == 1){
        $params = array();
        $limit_per_page = 20;
        $start_index = $this->uri->segment(3);
        $total_records = $this->MDownload->Count();
        
        if($total_records > 0){
            
             
            $config['base_url'] = base_url() . "index.php/admin/uploadAdmin/";
            $config['total_rows'] = $total_records;
            $config['per_page'] = $limit_per_page;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
            $params["results"] = $this->MDownload->limitDownload($config['per_page'], $start_index);
            
            //$params["links"] = $this->pagination->create_links();
        }
            $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
         $this->load->view('admin/file', $params);
        } else {
            $this->session->set_flashdata('error','Anda tidak memiliki hak akses');
            //redirect('login');
            redirect($_SERVER['HTTP_REFERER']);
        }
       
    }
    
    public function upload(){
        $file = $_FILES["file"]["name"];
            $namafile = $_FILES['file']['name'];
            $config['upload_path'] = './upload/file/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 1024 * 10;
           // $config['max_width'] = 5000;
            //$config['max_height'] = 5000;
            $config['file_name'] = $namafile;
            
            //$this->load->library('upload');
            $this->upload->initialize($config);
        if(!empty($file)){
		    $this->upload->do_upload('file');
                        $file1 = $this->upload->data();
                        $data['deskripsi'] = $this->input->post('deskripsi');
                        $data['namafile'] = $file1['file_name'];
                        $data['idjenis'] = $this->input->post('jenis');
                        $this->MDownload->addfile($data);
                            $this->session->set_flashdata('upload','Data Berhasil diupload');
                        
    
            } else {
                        $data['deskripsi'] = $this->input->post('deskripsi');
                        $data['namafile'] = $file1['file_name'];
                        $this->MDownload->addfile($data);
                        $this->session->set_flashdata('warning','File tidak diupload, silahkan edit.');
        }
        redirect('admin/uploadAdmin', "refresh");
 
    }
    
    public function updateupload(){
         $idb = $this->input->post('iddata');
        $nama4 = $this->MDownload->ambilNama($idb);
        $file = $_FILES["file"]["name"];
            $namafile = $_FILES["file"]["name"];
            $config['upload_path'] = './upload/file/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 1024 * 10;
           // $config['max_width'] = 5000;
            //$config['max_height'] = 5000;
            $config['file_name'] = $namafile;
            
            //$this->load->library('upload');
            $this->upload->initialize($config);
        if(!empty($file)){
            unlink("upload/file/".$nama4);
		    $this->upload->do_upload('file');
                        $file1 = $this->upload->data();
                        $data['deskripsi'] = $this->input->post('deskripsi');
                        $data['namafile'] = $file1['file_name'];
                        $data['idjenis'] = $this->input->post('jenis');
                       
                        $this->MDownload->updatefile($idb, $data);
                        $this->session->set_flashdata('upload','Data Berhasil diedit');
            } else {
                        $data['deskripsi'] = $this->input->post('deskripsi');
                        $data['idjenis'] = $this->input->post('jenis');
                        $this->MDownload->updatefile($idb, $data);
                        $this->session->set_flashdata('warning','Data berhasil diedit tanpa perubahan file');
        }
        redirect('admin/uploadAdmin', "refresh");
 
    }
    
    public function deletefile(){
        $id = $this->uri->segment(3);
        $nama1 = $this->MDownload->ambilNama($id); 
       $this->MDownload->delete($id, $nama1);

            $this->session->set_flashdata('upload','File Berhasil dihapus');
       
        redirect('admin/uploadAdmin',"refresh");
    }
    
    public function showEditFile(){
        $id = $this->uri->segment(3);
        $data['ambilid']= $this->MDownload->ambiliddatadownload($id);
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/editupload',$data);
    }
    
    public function showEditSlideshow(){
        $id = $this->uri->segment(3);
        $data['ambilid']= $this->Carousel->ambilIdData($id);
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/editslideshow',$data);
    }
    
     public function viewtambahupload(){
         $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/tambahupload');
    }
    
    public function viewtambahSlideshow(){
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/tambahslideshow');
    }
    
    public function uploadSlideshow(){
        $file = $_FILES["foto"]["name"];
            $namafile = $_FILES['foto']['name'];
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1024 * 10;
           // $config['max_width'] = 5000;
            //$config['max_height'] = 5000;
            $config['file_name'] = $namafile;
            
            //$this->load->library('upload');
            $this->upload->initialize($config);
        if(!empty($file)){
		    $this->upload->do_upload('foto');
                        $file1 = $this->upload->data();
                        $data['caption'] = $this->input->post('caption');
                        $data['foto1'] = $file1['file_name'];
                        $this->Carousel->addfile($data);
                            $this->session->set_flashdata('upload','Slideshow Berhasil diupload');
                        
    
            } else {
                        $data['caption'] = $this->input->post('caption');
                        $this->Carousel->addfile($data);
                        $this->session->set_flashdata('warning','Foto tidak diupload, silahkan edit.');
        }
        redirect('admin', "refresh");
 
    } 
    
    public function UpdateSlideshow(){
        $idb = $this->input->post('id');
        $nama2 = $this->Carousel->ambilNama($idb);
        $file = $_FILES["foto"]["name"];
            $namafile = $_FILES['foto']['name'];
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 1024 * 10;
           // $config['max_width'] = 5000;
            //$config['max_height'] = 5000;
            $config['file_name'] = $namafile;
            
            //$this->load->library('upload');
            $this->upload->initialize($config);
        if(!empty($file)){
            unlink("images/".$nama2);
		    $this->upload->do_upload('foto');
                        $file1 = $this->upload->data();
                        $data['caption'] = $this->input->post('caption');
                        $data['foto1'] = $file1['file_name'];
                        $this->Carousel->updateSlide($idb,$data);
                            $this->session->set_flashdata('upload','Slideshow Berhasil Diedit');
            } else {
                        $data['caption'] = $this->input->post('caption');
                        $this->Carousel->updateSlide($idb,$data);
                        $this->session->set_flashdata('warning','Data diedit tanpa perubahan foto');
        }
        redirect('admin', "refresh");
 
    }
    
    public function deleteSlideshow(){
        $id = $this->uri->segment(3);
        $nama = $this->Carousel->ambilNama($id);
        $this->Carousel->delete($id, $nama);
        $this->session->set_flashdata('upload','Foto Slideshow berhasil dihapus');
        redirect('admin', "refresh");
    }
    
    
    
}
