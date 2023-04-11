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
        $this->load->model('Menumodel');
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
        $data['menu'] = $this->Menumodel->get_menu();
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
        $this->form_validation->set_rules(
            'Username',
            'username',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[5]|matches[passwordconfirm]',
            [
                'required' => '%s Harus DIisi',
                'min_length' => 'Password minimum 5 karakter',
                'matches'   => 'password tidak sama'
            ]
        );
        $this->form_validation->set_rules(
            'passwordconfirm',
            'password confirm',
            'required|trim|min_length[5]|matches[password]',
            [
                'required' => '%s Harus Diisi',
                'matches' => 'password tidak sama',
                'min_length' => 'password minimum 5 karakter'
            ]
        );
        $this->form_validation->set_rules(
            'Role_id',
            'role_id',
            'required',
            [
                'required' => '%s Harus Diisi!!!'
            ]
            );

        if($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add User -  E-raport';
            $data['get_user'] = $this->Usermodel->get_user();
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
			$this->load->view('content/user/tambah', $data);
			$this->load->view('layout/footer', $data);
        } else {
            $this->usermodel-tambah();
            $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
            redirect('User/index');
        }
    }
    public function ubah()
    {

    }

    public function hapus()
    {

    }
}