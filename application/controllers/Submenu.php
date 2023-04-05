<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Menumodel');
        $this->load->model('Submenumodel');
        // if (!$this->session->userdata('kode')) {
        //     $this->session->set_flashdata('akun_error', 'Maaf Kamu Belum login. Login untuk mengakses fitur');
        //     redirect('auth');
        // }
        // is_logged_in();
        // web_track_traffic();
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
        $data['title'] = "Submenu - E-Raport";
        $data['submenu'] = $this->Submenumodel->get_submenu();
        $data['menu'] = $this->Menumodel->get_menu();
        $data['submenu_join'] = $this->Submenumodel->join_menu_submenu();
        $this->load->view('layout/header', $data);
        $this->load->view('content/submenu/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules(
            'menu_id',
            'Menu',
            'required',
            [
                'required' => '%s is Required!'
            ]
        );
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required',
            [
                'required' => '%s is Required!'
            ]
        );
        $this->form_validation->set_rules(
            'url',
            'URL',
            'required',
            [
                'required' => '%s is Required!'
            ]
        );


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat data yang kosong. Silahkan lengkapi data');
            redirect('Submenu/Index');
        } else {
            $this->Submenumodel->tambah();
            $this->session->set_flashdata('message', 'Data Berhasil ditambah');
            redirect('Submenu/Index');
        }
    }

    public function ubah()
    {
        $this->form_validation->set_rules(
            'menu_id',
            'Menu',
            'required',
            [
                'required' => '%s is Required!'
            ]
        );
        $this->form_validation->set_rules(
            'title',
            'Title',
            'required',
            [
                'required' => '%s is Required!'
            ]
        );
        $this->form_validation->set_rules(
            'url',
            'URL',
            'required',
            [
                'required' => '%s is Required!'
            ]
        );


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat data yang kosong. Silahkan lengkapi data');
            redirect('Submenu/Index');
        } else {
            $this->Submenumodel->ubah();
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            redirect('Submenu/Index');
        }
    }

    public function hapus()
    {
        $this->form_validation->set_rules(
            'id',
            'ID',
            'required',
            [
                'required' => '%s is required!',
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat data yang kosong. Silahkan lengkapi data');
            redirect('Submenu/Index');
        } else {
            $this->Submenumodel->hapus();
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            redirect('Submenu/Index');
        }
    }
    
}