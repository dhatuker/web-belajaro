<?php

class About extends CI_Controller {
    public function index()
    {
        $data['judul'] = 'BelajarO : Tentang Kami';
        $this->load->helper('url');
        $this->load->view('templates/header', $data);
        $this->load->view('about/index');
        $this->load->view('templates/footer');
    } 
    /* why dis dude wont start properly */
}