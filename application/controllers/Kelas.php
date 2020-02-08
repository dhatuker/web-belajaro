<?php

class Kelas extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Kelas_model');
    }

    public function index()
    {
        $data['kelas'] = $this->Kelas_model->ambilKelas();
        $data['judul'] = "BelajarO : Kelas";
        $data['anggota'] = $this->Kelas_model->ambilSiswa();
        $data['materi'] = $this->Kelas_model->ambilMateri();
        $data['tugas'] = $this->Kelas_model->ambilTugas();
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('templates/footer');
    } 

    public function materi(){
        $data['kelas'] = $this->Kelas_model->ambilKelas();
        $data['judul'] = "BelajarO : Materi";
        $data['materi'] = $this->Kelas_model->tampilMateri();
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('kelas/materi', $data);
        $this->load->view('templates/footer');
    }

    public function tugas(){
        $data['kelas'] = $this->Kelas_model->ambilKelas();
        $data['judul'] = "BelajarO : Tugas";
        $data['tugas'] = $this->Kelas_model->tampilTugas();
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('kelas/tugas', $data);
        $this->load->view('templates/footer');
    }

    public function tambahTugas(){ 
        $id = $this->input->get('id');
        $this->Kelas_model->tambahTugas();
        redirect("kelas?id=$id");
    }

    public function tambahMateri(){
        $id = $this->input->get('id'); 
        $this->Kelas_model->tambahMateri();
        redirect("kelas?id=$id");
    }

    public function editMateri(){
        $id = $this->input->get('id'); 
        $this->Kelas_model->editMateri();
        redirect("Kelas/materi?id=$id");
    }

    public function editTugas(){
        $id = $this->input->get('id'); 
        $this->Kelas_model->editTugas();
        redirect("Kelas/tugas?id=$id");
    }

    public function hapusMateri(){
        $id = $this->input->get('id');
        $idkelas = $this->db->query("SELECT id_kelas FROM materi WHERE id='$id';")->row_array();
        $idbeneran = $idkelas['id_kelas'];
        $this->Kelas_model->hapusMateri();
        redirect("Kelas?id=$idbeneran");
    }

    public function hapusTugas(){
        $id = $this->input->get('id');
        $idkelas = $this->db->query("SELECT id_kelas FROM tugas WHERE id='$id';")->row_array();
        $idbeneran = $idkelas['id_kelas'];
        $this->Kelas_model->hapusTugas();
        redirect("Kelas?id=$idbeneran");
    } 

}