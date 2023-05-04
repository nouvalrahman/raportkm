<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kelasmodel');
        $this->load->model('Jurusanmodel');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = "Kelas - E-Raport";
        $data['kelas'] = $this->Kelasmodel->get_kelas();
        $data['jurusanid'] = $this->Jurusanmodel->get_jurusan();
        $data['kelasjoin'] = $this->Kelasmodel->join_kelas_jurusan();
        $this->load->view('layout/header', $data);
        $this->load->view('content/kelas/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
        // var_dump($data);
        // die;
    }
    public function tambah()
    {
        $this->form_validation->set_rules
        (
            'kelas',
            'Kelas',
            'required',
            [
                'required' => '%s harus diisi'
            ]
        );

        $this->form_validation->set_rules
        (
            'jurusanid',
            'Jurusanid',
            'required',
            [
                'required' => '%s harus diisi'
            ]
        );

        if($this->form_validation->run() == FALSE ){
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Kelas/tambah');
        } else {
            $this->Kelasmodel->tambah();
            $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
            redirect('Kelas/index');
        }

    }

    public function ubah()
    {
        $this->form_validation->set_rules
        (
            'id',
            'Id',
            'required',
            [
                'required' => '%s Harus diisi'
            ]
        );

        $this->form_validation->set_rules
        (
            'kelas',
            'Kelas',
            'required',
            [
                'required' => '%s harus Diisi'
            ]
        );

        $this->form_validation->set_rules
        (
            'jurusanid',
            'Jurusanid',
            'required',
            [
                'required' => '%s Harus diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Kelas/ubah');
        } else {
            $this->Kelasmodel->ubah();
            $this->session->set_flashdata('message', 'Data Berhasil Diubah');
            redirect('Kelas/index');
        }
    }

    public function hapus()
    {
        $this->form_validation->set_rules(
            'Id',
            'id',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Kelas/hapus');
        } else {
            $this->Kelasmodel->hapus();
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
            redirect('Kelas/index');
        }
    }
}

?>