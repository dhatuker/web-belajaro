<?php

class Contact extends CI_Controller {
    public function index()
    {
        $data['judul'] = 'BelajarO : Kontak Kami';
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('contact/index');
        $this->load->view('templates/footer');
    } 
}