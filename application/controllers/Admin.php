<?php
defined('BASEPATH') or exit('Akses langsung tidak diperbolehkan');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();  // Memanggil konstruktor parent dengan benar
    }

    public function index()
    {
        $data = array(
            'menu' => 'backend/menu',
            'content' => 'backend/adminKonten',
            'title' => 'Admin',
        );
        $this->load->view('template', $data);  // Memuat tampilan 'template'
    }
}
