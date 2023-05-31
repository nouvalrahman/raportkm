<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gurumengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('usermodel');
        $this->load->model('mapelmodel');
        $this->load->model('tapelmodel');
        $this->load->model('gurumengajarmodel');
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
        $data['title'] = "Guru Mengajar - E-Raport";
        $data['guru'] = $this->usermodel->get_guru();
        $data['mapel'] = $this->mapelmodel->get_mapel();
        $data['tapel'] = $this->tapelmodel->get_tapel();
        $data['semester'] = $this->tapelmodel->get_semester();
        $data['gurumengajar'] = $this->gurumengajarmodel->join_guru_mapel_kelas_tapel_semester();
        $this->load->view('layout/header', $data);
        $this->load->view('content/gurumengajar/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
        // var_dump($data['guru']);
        // die;
    }
    public function tambah()
    {
        $this->form_validation->set_rules(
            'userid',
            'Userid',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'mapelid',
            'Mapelid',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'kelasid',
            'Kelasid',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'tapelid',
            'Tapelid',
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
            redirect('Gurumengajar/tambah');
        } else {
            $this->Gurumengajarmodel->tambah();
            $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
            redirect('Gurumengajar/index');
        }

    }
    public function ubah()
    {
        $this->form_validation->set_rules(
            'userid',
            'Userid',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'mapelid',
            'Mapelid',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'kelasid',
            'Kelasid',
            'required',
            [
                'required' => '%s Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'tapelid',
            'Tapelid',
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
            redirect('Identitas/ubah');
        } else {
            $this->Gurumengajarmodel->ubah();
            $this->session->set_flashdata('message', 'Data Berhasil Diubah');
            redirect('Identitas/index');
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
            $this->session->set_flashdata('message_error', 'Maaf, Data tidak berhasil dihapus ');
            redirect('Gurumengajar/hapus');
        } else {
            $this->Gurumengajarmodel->hapus();
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
            redirect('Gurumengajar/index');
        }
    }
}