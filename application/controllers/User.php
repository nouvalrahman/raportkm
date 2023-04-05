<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Usermodel');
        $this->load->model('Rolemodel');
        $this->load->library('session');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $data['title'] = "User - E-Raport";
        $data['user'] = $this->Usermodel->get_user();
        $data['role'] = $this->Rolemodel->get_role();
        $data['user_join'] = $this->Usermodel->join_user_role();
        // var_dump($data['user_join']);
        // die;
        $this->load->view('layout/header', $data);
        $this->load->view('content/user/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
    }
    public function tambah()
    {
        
    }
    public function ubah()
    {
        
    }

    public function hapus()
    {
        
    }
}