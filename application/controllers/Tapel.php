<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Tapelmodel');
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
        $data['title'] = "Tahun Pelajaran - E-Raport";
        $data['tapel'] = $this->Tapelmodel->get_tapel();
        $data['tapeljoin'] = $this->Tapelmodel->join_tapel_semester();
        $data['semester'] = $this->Tapelmodel->get_semester();
        $this->load->view('layout/header', $data);
        $this->load->view('content/tapel/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
        // var_dump($data['semester']);
        // die;
    }
    public function tambah()
    {
        $this->form_validation->set_rules(
            'tahunpelajaran',
            'Tahunpelajaran',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'semesterid',
            'Semesterid',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Tapel/tambah');
        } else {
            $this->Tapelmodel->tambah();
            $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
            redirect('Tapel/index');
        }

    }
    public function ubah()
    {
        $this->form_validation->set_rules(
            'tahunpelajaran',
            'Tahunpelajaran',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]

        );
        $this->form_validation->set_rules(
            'semesterid',
            'Semesterid',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Tapel/index');
        } else {
            $this->Tapelmodel->ubah();
            $this->session->set_flashdata('message', 'Data Berhasil Diubah');
            redirect('Tapel/index');
        }
    }

    public function hapus()
    {
        $this->form_validation->set_rules(
            'id',
            'Id',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'maaf data tidak terhapus ');
            redirect('Tapel/index');
        } else {
            $this->Tapelmodel->hapus();
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
            redirect('Tapel/index');
        }
    }
}