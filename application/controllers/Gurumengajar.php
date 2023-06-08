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
        $this->load->model('kelasmodel');
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
        // $data = [
            //     'user' => $this->input->get('nama'),
            //     'tapel' => $this->input->get('tahunpelajaran'),
            //     'semester' => $this->input->get('semesterid'),
            // ];
        $data['title'] = "Guru Mengajar - E-Raport";
        $data['guru'] = $this->usermodel->get_guru();
        $data['mapel'] = $this->mapelmodel->get_mapel();
        // $datauser = $this->db->get_where('user', ['username' == $data['user']]);
        $data['tapel'] = $this->tapelmodel->get_tapel();
        $data['kelas'] = $this->kelasmodel->get_kelas();
        $data['semester'] = $this->tapelmodel->get_semester();
        $data['gurumengajar'] = $this->gurumengajarmodel->join_guru_mapel_kelas_tapel_semester();
        // $data['gurumengajarid'] = $this->gurumengajarmodel->get_gurumengajarid();
        $this->load->view('layout/header', $data);
        $this->load->view('content/gurumengajar/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
        // var_dump($data['gurumengajarid']);
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
                $this->gurumengajarmodel->tambah();
                $this->session->set_flashdata('message', 'Data Berhasil Ditambahkan');
                redirect('Gurumengajar/index');
            }
            
        }
        
        public function setguru()
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
                        
                        
                    // $datauser = [
                         //     $this->db->select('user.id', 'nama'),
                        //     $this->db->from('user'),
                        //     $this->db->where('user.id' == $data['user']),
                        //     result_array()
                        // ];
        $datasession = [
            'user' => $this->input->post('userid'),
            'tapel' => $this->input->post('tapelid'),
            'semester' => $this->input->post('semesterid'),
            'nama' => $this->usermodel->get_user('nama')
            ];

            // $namasesi = [
            //     'nama' => $this->db->get_where('user', 'id' == $datasession['user'])->result_array()
            // ];
                            
            if ($this->form_validation->run() == FALSE) {
                 $this->session->set_flashdata('message_error', 'Terdapat Data yang kosong, Silahkan Lengkapi data ');
                 redirect('Gurumengajar/index');
            } else {
            $this->session->set_userdata($datasession);
            $this->session->set_flashdata('message', 'Data Berhasil Disimpan');
            $data['title'] = "Guru Mengajar - E-Raport";
            $data['mapel'] = $this->mapelmodel->get_mapel();
            $data['guru'] = $this->usermodel->get_guru();
            $data['tapel'] = $this->tapelmodel->get_tapel();
            $data['sessi'] = $this->db->get_where('user', 'id' == $datasession['user'])->result_array();
            $data['kelas'] = $this->kelasmodel->get_kelas();
            $data['semester'] = $this->tapelmodel->get_semester();
            $data['gurumengajar'] = $this->gurumengajarmodel->join_guru_mapel_kelas_tapel_semester();
            // $data['gurumengajarid'] = $this->gurumengajarmodel->get_gurumengajarid();
            $this->load->view('layout/header', $data);
            $this->load->view('content/gurumengajar/index', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('layout/footer', $data);
            // var_dump($data['gurumengajarid']);
            // die;
        }
    }

    public function unset()
    {
        $data['title'] = "Guru Mengajar - E-Raport";
        $data['guru'] = $this->usermodel->get_guru();
        $data['mapel'] = $this->mapelmodel->get_mapel();
        $data['unset'] = $this->session->unset_userdata($datasession);
        $data['tapel'] = $this->tapelmodel->get_tapel();
        $data['kelas'] = $this->kelasmodel->get_kelas();
        $data['semester'] = $this->tapelmodel->get_semester();
        $data['gurumengajar'] = $this->gurumengajarmodel->join_guru_mapel_kelas_tapel_semester();
        // $data['gurumengajarid'] = $this->gurumengajarmodel->get_gurumengajarid();
        $this->load->view('layout/header', $data);
        $this->load->view('content/gurumengajar/index', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/footer', $data);
        var_dump($data['unset']);
        die;
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