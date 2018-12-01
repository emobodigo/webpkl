<?php
class User extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('MUser');
        $this->load->model('MTamu');
    }
    
    function index(){
        $sesi = $this->session->userdata('hak');
        if($sesi == 2 || $sesi == 1){
        $data['user'] = $this->MUser->getUser();
            $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/user', $data);
        } else {
        $this->session->set_flashdata('error','Anda tidak memiliki hak akses');
        //redirect('login');
        redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
   public function showEditUser(){
        $sesi = $this->session->userdata('hak');
        if($sesi == 2 || $sesi == 1){
        $id = $this->uri->segment(3);
        $jabatanhak = array("Administrator"=>"1", "Operator"=>"2", "Editor"=>"3"); 
        $data['user'] = $this->MUser->getUser();
        foreach($data['user'] as $users){
            switch($users->hak){
                case 1:
                    $users->jabatan = 'Administrator';
                    break;
                case 2:
                    $users->jabatan = 'Operator';
                    break;
                case 3:
                    $users->jabatan = 'Editor';
                default: break;
            }
        }
        $data['ambilid']= $this->MUser->ambilUser($id);
            $data1['reader'] = $this->MTamu->getRead();
       $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/edituser',$data);
        } else {
        $this->session->set_flashdata('error','Anda tidak memiliki hak akses');
        //redirect('login');
        redirect($_SERVER['HTTP_REFERER']);
        }   
    }
    
     public function updateUser(){
        $data['username'] = $this->input->post('username');
        $data['passwd'] = $this->input->post('passwd');
        $data['nama'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['hak'] = $this->input->post('jabatan');
        $tes = $this->input->post('jabatan');
         switch($tes){
              case 1:
                    $hakyu = "Administrator";
                 break;
                case 2:
                    $hakyu = "Operator";
                    break;
                case 3:
                    $hakyu = "Editor";
                default: break;   
         }
        $data['jabatan'] = $hakyu;
        $idb = $this->input->post('idadmin');
        $this->MUser->updateUser($idb, $data);
        redirect('user', "refresh");
    }
    
    public function tambahUser(){
        $data1['reader'] = $this->MTamu->getRead();
        $this->load->view('admin/side-left',$data1);
        $this->load->view('admin/adduser');
    }
    
    public function addUser(){
        $data['username'] = $this->input->post('username');
        $data['passwd'] = md5($this->input->post('passwd'));
        $data['nama'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['hak'] = $this->input->post('jabatan');
        $tes = $this->input->post('jabatan');
         switch($tes){
              case 1:
                    $hakyu = "Administrator";
                 break;
                case 2:
                    $hakyu = "Operator";
                    break;
                case 3:
                    $hakyu = "Editor";
                default: break;   
         }
        $data['jabatan'] = $hakyu;
        $this->MUser->add($data);
        redirect('user', "refresh");
    }
}
?>
