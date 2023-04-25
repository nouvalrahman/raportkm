<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kelasmodel');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = "Kelas - E-Raport";
        $data['kelas'] = $this->Kelasmodel->get_kelas();
        $this->load->view('layout/header', $data);
        $this->load->view('content/kelas/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
        // var_dump($data);
        // die;
    }
}

?>