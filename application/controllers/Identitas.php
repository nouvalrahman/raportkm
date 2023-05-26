<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Identitasmodel');
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
        $data['title'] = "Identtias Sekolah - E-Raport";
        $data['identitas'] = $this->Identitasmodel->get_identitas();
        $this->load->view('layout/header', $data);
        $this->load->view('content/identitas/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
        // var_dump($data);
        // die;
    }
    public function tambah()
    {
        $this->form_validation->set_rules(
            'tglraport',
            'Tglraport',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'kepsek',
            'Kepsek',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'sekolah',
            'Sekolah',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Identitas/tambah');
        } else {
            $this->Mapelmodel->tambah();
            $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
            redirect('Identitas/index');
        }

    }
    public function ubah()
    {
        $this->form_validation->set_rules(
            'tglraport',
            'Tglraport',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'kepsek',
            'Kepsek',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'sekolah',
            'Sekolah',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
            redirect('Identitas/ubah');
        } else {
            $this->Identitasmodel->ubah();
            $this->session->set_flashdata('message', 'Data Berhasil Diubah');
            redirect('Identitas/index');
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
            redirect('identitas/hapus');
        } else {
            $this->Mapelmodel->hapus();
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
            redirect('Identitas/index');
        }
    }
}