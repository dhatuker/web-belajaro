<?php

class Kelas_model extends CI_model{

    public function __construct()
    {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('upload');
    }
    
    public function ambilKelas(){
        $id = $this->input->get('id');
        $query = $this->db->get_where('kelas', ['id' => $id])->row_array();
        return $query;
    }

    public function ambilTimeline(){
        $id = $this->input->get('id');
        $query = $this->db->query("SELECT * FROM tugas JOIN kelas ON kelas.id = tugas.id_kelas WHERE kelas.id = '$id';");
        return $query;
    }

    public function tambahTugas(){
        
        $data = [
            "nama" => $this->input->post('namaTugas'),
            "id_kelas" => $this->input->get('id'),
            "jam_deadline" => $this->input->post('jam_deadline'),
            "tgl_deadline" => $this->input->post('tgl_deadline')        
        ];
    
        $this->db->insert('tugas', $data);
        
    }

        public function tambahMateri(){ 
            $data = [
                "nama" => $this->input->post('namaMateri'),
                "id_kelas" => $this->input->get('id'),
                "deskripsi" => $this->input->post('m_deskripsi')
            ];
        
            $this->db->insert('materi', $data);
    }

    public function ambilTugas(){ 
        $id = $this->input->get('id');
        $query = $this->db->query("SELECT * FROM tugas where id_kelas = '$id';");
        return $query;
    }

    public function ambilMateri(){
        $id = $this->input->get('id');
        $query = $this->db->query("SELECT * FROM materi where id_kelas = '$id';");
        return $query;    
    }

    public function tampilTugas(){ 
        $id = $this->input->get('id');
        $query = $this->db->query("SELECT * FROM tugas where id = '$id';");
        return $query;
    }

    public function tampilMateri(){ 
        $id = $this->input->get('id');
        $query = $this->db->query("SELECT * FROM materi where id = '$id';");
        return $query;
    }

    public function editMateri(){
        $id = $this->input->get('id'); 
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        if($nama != null){
            $this->db->query("UPDATE materi SET nama = '$nama' WHERE id = '$id';");
        }
        if($deskripsi != null){
            $this->db->query("UPDATE materi SET deskripsi = '$deskripsi' WHERE id = '$id';");
        }
    }

    public function editTugas(){
        $id = $this->input->get('id');
        $nama = $this->input->post('nama');
        $jam = $this->input->post('jam_deadline');
        $tanggal = $this->input->post('tgl_deadline');
        if($nama != null){
            $this->db->query("UPDATE tugas SET nama = '$nama' WHERE id = '$id';");
        }
        if($jam != null){
            $this->db->query("UPDATE tugas SET jam_deadline = '$jam' WHERE id = '$id';");
        }
        if($tanggal != null){
            $this->db->query("UPDATE tugas SET tgl_deadline = '$tanggal' WHERE id = '$id';");
        }
    }

    public function hapusMateri(){
        $id = $this->input->get('id');
        $this->db->query("DELETE FROM materi WHERE id='$id';");
    }

    public function hapusTugas(){
        $id = $this->input->get('id'); 
        $this->db->query("DELETE FROM tugas WHERE id='$id';");
    }

    public function ambilSiswa(){
        $id = $this->input->get('id');
        $query = $this->db->query("SELECT siswa.nama FROM siswa JOIN siswa_kelas ON siswa.id = siswa_kelas.id_siswa 
        JOIN kelas ON siswa_kelas.id_kelas = kelas.id WHERE kelas.id = '$id';");
        return $query;
    }


    // private function _uploadFile()
    // {
    // $config['upload_path']          = './upload/filetugas/';
    // $config['allowed_types']        = 'pdf|docx';
    // $config['file_name']            = $this->id_tugas;
    // $config['overwrite']			= true;

    // $this->load->library('upload', $config);

    // if ($this->upload->do_upload('file')) {
    //     return $this->upload->data("file_name");
    // }
    // return "default.jpg";
    // }

    // public function save()
    // {
    //     $kode = $this->input->post('kode_kelas');
    //     $data = [
    //         "id_kelas"=> $this->db->query("SELECT id FROM kelas WHERE kode = '$kode';"),
    //         "id_siswa" => $this->session->userdata('id')
    //     ];

    //         $this->db->insert('siswa_kelas', $data);
    //     $this->file=$this->_uploadFile();

    // }



}