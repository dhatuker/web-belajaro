<?php

class Auth_model extends CI_model{

    //PUNYA SISWA
    public function signup_siswa(){
        
        $data = [
            "username" => $this->input->post('s_username', true),
            "password" => password_hash($this->input->post('s_password', true), PASSWORD_DEFAULT)
        ];

        $username = $this->input->post('s_username');

            $this->db->insert('siswa', $data);
            $user = $this->db->get_where('siswa', ['username' => $username])->row_array();
            $data = ['username' => $user['username']];
            $this->session->set_userdata($data);
            $id = $this->db->query("SELECT id FROM siswa WHERE username='$username'")->row_array();
            $data2 = ['id' => $id['id']];
            $this->session->set_userdata($data2);
            $status = ['status' => 'siswa'];
            $this->session->set_userdata($status);       
        
    }

    public function login_siswa(){
        
        $password = $this->input->post('s_password');
        $username = $this->input->post('s_username');
        $user = $this->db->get_where('siswa', ['username' => $username])->row_array();

        if ($user) { //jika user ada
            if (password_verify($password, $user['password'])) {    
                $data = [
                    'username' => $user['username']
                ];
                $status = ['status' => 'siswa'];
                $this->session->set_userdata($status); 
                $this->session->set_userdata($data);
                $id = $this->db->query("SELECT id FROM siswa WHERE username='$username'")->row_array();
                $data2 = ['id' => $id['id']];
                $this->session->set_userdata($data2);
                redirect('beranda');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password
                </div>');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username is not registered
            </div>');
            redirect(base_url());
        }
    }

    

    //PUNYA GURU
    public function signup_guru(){
        
        $data = [
            "username" => $this->input->post('g_username', true),
            "password" => password_hash($this->input->post('g_password', true), PASSWORD_DEFAULT)
        ];
        $this->db->insert('guru', $data);
        $username = $this->input->post('g_username');
        $user = $this->db->get_where('guru', ['username' => $username])->row_array();
        $data1 = ['username' => $user['username']];
        $this->session->set_userdata($data1);
        $id = $this->db->query("SELECT id FROM guru WHERE username='$username'")->row_array();
        $data2 = ['id' => $id['id']];
        $this->session->set_userdata($data2);
        $status = ['status' => 'guru'];
        $this->session->set_userdata($status);  
    }

    public function login_guru(){
        
        $username = $this->input->post('g_username');
        $password = $this->input->post('g_password');

        $user = $this->db->get_where('guru', ['username' => $username])->row_array();

        if ($user) { //jika user ada
            if (password_verify($password, $user['password'])) {    
                $data = [
                    'username' => $user['username']
                ];
                $status = ['status' => 'guru'];
                $this->session->set_userdata($status); 
                $this->session->set_userdata($data);
                $id = $this->db->query("SELECT id FROM guru WHERE username='$username'")->row_array();
                $data2 = ['id' => $id['id']];
                $this->session->set_userdata($data2);
                redirect('beranda');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password
                </div>');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username is not registered
            </div>');
            redirect(base_url());
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('username');
    }
    
}
