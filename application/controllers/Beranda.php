<?php

class Beranda extends CI_Controller {
        
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Beranda_model');
        
    }

    public function index($nama = '')
    {
        $id = $this->session->userdata('id');
        $data['judul'] = "BelajarO : $nama";
        $data['kelas'] = $this->Beranda_model->daftarKelas($id); //pokoknya ngambil tabel kelas
        $data['profil'] = $this->Beranda_model->profil();
        $this->load->view('templates/header', $data);
        $this->load->view('beranda/index', $data);
        $this->load->view('templates/footer');
        $this->Beranda_model->index();
    } 

    public function edit_siswa()
    {
        $data['judul'] = "BelajarO : Edit Profil Siswa";
        $data['profil'] = $this->Beranda_model->profil();
        $this->load->view('templates/header', $data);
        $this->load->view('beranda/edit_siswa', $data);
        $this->Beranda_model->edit_siswa();
        $this->load->view('templates/footer');
    }
    
    public function edit_guru()
    {
        $username = $this->session->userdata('username');
        $data['judul'] = "BelajarO : Edit Profil Guru";
        $data['profil'] = $this->Beranda_model->profil();
        $this->load->view('templates/header', $data);
        $this->load->view('beranda/edit_guru', $data);
        $this->Beranda_model->edit_guru();
        $this->load->view('templates/footer');
    } 

    public function tambahKelas() {
        $this->Beranda_model->tambahKelas();
        redirect('beranda');
    }

    public function gabungKelas(){
        $this->Beranda_model->tambahKelas();
        redirect('beranda');
    }
}