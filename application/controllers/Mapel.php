<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Mapelmodel');
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
        $data['title'] = "Mata Pelajaran - E-Raport";
        $data['mapel'] = $this->Mapelmodel->get_mapel();
        $this->load->view('layout/header', $data);
        $this->load->view('content/mapel/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
        // var_dump($data);
        // die;
    }
    public function tambah()
    {
        $this->form_validation->set_rules(
            'mata_pelajaran',
            'Mata_pelajaran',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'kelompok',
            'Kelompok',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Mapel/tambah');
        } else {
            $this->Mapelmodel->tambah();
            $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
            redirect('Mapel/index');
        }

    }
    public function ubah()
    {
        $this->form_validation->set_rules(
            'mata_pelajaran',
            'Mata_pelajaran',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]

        );
        $this->form_validation->set_rules(
            'kelompok',
            'Kelompok',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Mapel/ubah');
        } else {
            $this->Mapelmodel->ubah();
            $this->session->set_flashdata('message', 'Data Berhasil Diubah');
            redirect('Mapel/index');
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
            $this->session->set_flashdata('message_error', 'Maaf, Data tidak berhasil dihapus ');
            redirect('Mapel/hapus');
        } else {
            $this->Mapelmodel->hapus();
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
            redirect('Mapel/index');
        }
    }
}