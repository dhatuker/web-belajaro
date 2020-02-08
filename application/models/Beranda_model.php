<?php

class Beranda_model extends CI_model{

    public function index(){
        $this->session->unset_userdata('id_kelas');
    }

    public function edit_siswa(){
        $username = $this->session->userdata('username');
        $nama = $this->input->post('s_nama');
        if($nama != null){
            $this->db->query("UPDATE siswa SET nama = '$nama' WHERE username = '$username';");
        }
        $telp = $this->input->post('s_telp');
        if($telp != null){
            $this->db->query("UPDATE siswa SET telp = '$telp' WHERE username = '$username';");
        }
        $email = $this->input->post('s_email');
        if($email != null){
            $this->db->query("UPDATE siswa SET email = '$email' WHERE username = '$username';");
        }  
        if($email !=null or $telp != null or $nama != null){
            redirect('beranda');
        }
    }

    public function profil(){
        $username = $this->session->userdata('username');

        if($this->session->userdata('status') == 'guru') { 
            $query = $this->db->query("SELECT * FROM guru where username = '$username';");
        }
        if($this->session->userdata('status') == 'siswa') { 
            $query = $this->db->query("SELECT * FROM siswa where username = '$username';");
        }
        return $query;    
    }

    public function profil_guru(){
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT * FROM guru where username = '$username';");
        return $query;    
    }

    public function edit_guru(){
        $username = $this->session->userdata('username');
        $nama = $this->input->post('g_nama');
        if($nama != null){
            $this->db->query("UPDATE guru SET nama = '$nama' WHERE username = '$username';");
        }
        $telp = $this->input->post('g_telp');
        if($telp != null){
            $this->db->query("UPDATE guru SET telp = '$telp' WHERE username = '$username';");
        }
        $email = $this->input->post('g_email');
        if($email != null){
            $this->db->query("UPDATE guru SET email = '$email' WHERE username = '$username';");
        }  
        if($email !=null or $telp != null or $nama != null){
            redirect('beranda');
        }
        
    }

    
    public function tambahKelas() {
        
        $username = $this->session->userdata('username');
        $id = $this->session->userdata('id');

        //$idguru = implode($this->db->query("SELECT id FROM guru WHERE username='$username'"));
        if($this->session->userdata('status') == 'guru'){
            $data = [
                "nama" => $this->input->post('namaKelas'),
                "kode" => $this->input->post('kode_k'),
                "id_guru" => $id
            ];
                $this->db->insert('kelas', $data);
        }
        if($this->session->userdata('status') == 'siswa'){
            $kode = $this->input->post("kode_kelas");
            $idkelas = $this->db->query("SELECT id FROM kelas where kode='$kode';")->row_array();
            
            $data = [
                "id_siswa" => $id,
                "id_kelas" => $idkelas['id']
            ];

            $this->db->insert('siswa_kelas', $data);
            
        }
    }

    public function daftarKelas($id) {
        if($this->session->userdata('status') == 'guru'){
            $query = $this->db->query("SELECT * FROM kelas where id_guru = '$id';");
        }
        if($this->session->userdata('status') == 'siswa'){
            $query = $this->db->query( "SELECT * FROM kelas JOIN siswa_kelas ON kelas.id = siswa_kelas.id_kelas WHERE siswa_kelas.id_siswa = '$id';");
        }
        return $query;
    }

    public function gabungKelas(){
        $kode = $this->input->post('kode_kelas');
        $data = [
            "id_kelas"=> $this->db->query("SELECT id FROM kelas WHERE kode = '$kode';"),
            "id_siswa" => $this->session->userdata('id')
        ];

            $this->db->insert('siswa_kelas', $data);

    }
    
}
