<?php
// session.start();
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_model');
    }

    // public function index() {
    //     $data['judul'] = 'BelajarO';
    //     $this->load->view('home', $data);
    //     $this->load->view('templates/footer');
    // }

    public function signup_siswa(){

        $this->form_validation->set_rules('s_username', 'Username', 'required|is_unique[siswa.username]');
        $this->form_validation->set_rules('s_password', 'Password', 'required');
        $this->form_validation->set_rules('s_rpassword', 'Repeat Password', 'required|matches[s_password]');

        if ($this->form_validation->run() == FALSE){
            $data['judul'] = 'BelajarO : Daftar';
            $this->load->helper('url');
            $this->load->view('templates/header', $data);
            $this->load->view('home/signup_siswa');
            $this->load->view('templates/footer');
        }else{
            $this->Auth_model->signup_siswa();
            redirect('beranda/edit_siswa');
        }
    }

    public function login_siswa()
    {
        $this->Auth_model->login_siswa();
    }

    public function signup_guru(){

        $this->form_validation->set_rules('g_username', 'Username', 'required|is_unique[guru.username]');
        $this->form_validation->set_rules('g_password', 'Password', 'required');
        $this->form_validation->set_rules('g_rpassword', 'Repeat Password', 'required|matches[g_password]');

        if ($this->form_validation->run() == FALSE){
            $data['judul'] = 'BelajarO : Daftar';
            $this->load->helper('url');
            $this->load->view('templates/header', $data);
            $this->load->view('home/signup_guru');
            $this->load->view('templates/footer');
        }else{
            $this->Auth_model->signup_guru();
            redirect('beranda/edit_guru');
        }
    }

    public function login_guru()
    {
        $this->Auth_model->login_guru();
    }

    public function logout()
    {
        $this->Auth_model->logout();
        redirect(base_url());
    }
    
    
}
