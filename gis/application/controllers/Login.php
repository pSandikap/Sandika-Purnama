<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }
 
    function index(){
        $this->load->view('login');
    }
 
    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek_user=$this->Login_model->user($username,$password);
        if($cek_user->num_rows() > 0){ 
            $data=$cek_user->row_array();
            $this->session->set_userdata('masuk',TRUE);
             if($data['akses']=='regional'){ 
                $this->session->set_userdata('akses','regional');
                $this->session->set_userdata('ses_username',$data['username']);
                $this->session->set_userdata('ses_nama',$data['nama']);
                redirect('admin');

                }else{                   
                $this->session->set_userdata('akses','admin');
                $this->session->set_userdata('ses_username',$data['username']);
                $this->session->set_userdata('ses_nama',$data['nama']);
                redirect('super');    
                }
                 
        }else{ //jika login sebagai mahasiswa
            $url=base_url();
            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
            redirect($url);
        }
    }

 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url();
        redirect($url);
    }
 
}