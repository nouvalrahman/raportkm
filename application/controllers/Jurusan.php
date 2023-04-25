<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Jurusanmodel');
    }

    public function index()
    {
        $data['title'] = "Jurusan - E-Raport";
        $data['jurusan'] = $this->Jurusanmodel->get_jurusan();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('content/jurusan/index', $data);
        $this->load->view('layout/footer', $data);
    }
    public function tambah()
    {
        $this->form_validation->set_rules(
            'jurusan',
            'Jurusan',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data Yang kosong, Silahkan isi terlebih dahulu');
            redirect('Jurusan/tambah');
        } else {
            $this->Jurusanmodel->tambah();
            $this->session->set_flashdata('message', 'Data Berhasil DItambahkan');
            redirect('Jurusan/Index');
        }
    }

    public function ubah()
    {
        // $this->form_validation->set_rules(
        //     'id',
        //     'ID',
        //     'required'
        //     [
        //         'required' => '%s harus Diisi'
        //     ]
        //     );

        $this->form_validation->set_rules(
            'jurusan',
            'Jurusan',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Jurusan/index');
        } else {
            $this->Jurusanmodel->ubah();
            $this->session->set_flashdata('message', 'Data Berhasil Diubah');
            redirect('Jurusan/index');
        }
    }

    public function hapus()
    {
        $this->form_validation->set_rules(
            'id',
            'ID',
            'required',
            [
                'required' == '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data Yang kosong, SIlahkan Isi terlebih dahulu');
            redirect('Jurusan/index');
        } else {
            $this->jurusanmodel->hapus();
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
            redirect('Jurusan/index');
        }
    }
}

?>