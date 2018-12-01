<?php
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();
        $this->load->model('MLogin');
	}
    
    function index(){
        $this->MLogin->loggedin() == FALSE || redirect('admin');
        $this->load->view('admin/login');
    }
 
	function aksi_login(){
        $username = $this->input->post('username');
		$password = $this->input->post('password');
        $hasil = $this->MLogin->sessuser($username);
        $where = array(
			'username' => $username,
			'passwd' => md5($password)
			);
        $cek = $this->MLogin->cek_login("tadmin",$where)->num_rows();
		if($cek > 0){
           switch($hasil->hak){
               case 1:
                $data_session = array(
				'username' => $username,
				'loggedin' => TRUE,
                'hak' => $hasil->hak,
                'nama' => $hasil->nama,
                'jabatan' => $hasil->jabatan
				);
 
			$this->session->set_userdata($data_session);
                   $this->session->set_flashdata('login','Anda telah login sebagai Administrator');
 
			redirect('admin');
            break;
               case 2:
                   $data_session = array(
				'username' => $username,
				'loggedin' => TRUE,
                'hak' => $hasil->hak,
                'nama' => $hasil->nama,
                'jabatan' => $hasil->jabatan
				);
 
			$this->session->set_userdata($data_session);
                   $this->session->set_flashdata('login','Anda telah login sebagai Operator');
 
			redirect('pageadmin');
                   break;
               case 3:
                   $data_session = array(
				'username' => $username,
				'loggedin' => TRUE,
                'hak' => $hasil->hak,
                'nama' => $hasil->nama,
                'jabatan' => $hasil->jabatan
				);
 
			$this->session->set_userdata($data_session);
                   $this->session->set_flashdata('login','Anda telah login sebagai Editor');
 
			redirect('admin/goBerita');
                   break;
               default: break;
           }
			
 
		}else{
			$this->session->set_flashdata('gagal','Username dan Password anda salah');
            redirect('login',"refresh");
		}
	}

        
	
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
 
    
    public function signup(){
        $this->load->view('Vheaderguest');
        $this->load->view('Vsignup');
        $this->load->view('footer.html');
    }
 
}
?>