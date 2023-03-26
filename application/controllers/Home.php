<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

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

		$data['title'] = "Sign-In E-raport";
		$this->load->view('layout/header', $data);
		$this->load->view('auth/login', $data);
		$this->load->view('layout/footer', $data);


	}
	public function login()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required',
			[
				'required' => 'Username Wajib diisi',
			]
		);
		$this->form_validation->set_rules(
			'password',
			'password',
			'required|trim',
			[
				'required' => 'Password wajib diisi'
			]
		);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Sign-In E-raport";
			$this->load->view('layout/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('layout/footer', $data);
		} else {
			// $this->login();
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar');
			$this->load->view('content/dashboard');
			$this->load->view('layout/footer');
		}
		;

	}

	public function register()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required',
			[
				'required' => 'Username harus diisi'
			]
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim|min_length[3]|matches[passwordconfirm]',
			[
				'required' => 'password harus diisi',
				'min_length' => 'Password minimum 3 karakter',
				'matches' => 'password tidak sama'
			]
		);
		$this->form_validation->set_rules(
			'passwordconfirm',
			'password confirm',
			'required|trim|min_length[3]|matches[password]',
			[
				'required' => 'password konfirmasi harus diisi',
				'min_length' => 'password minimum 3 karakter',
				'matches' => 'password tidak sama'

			]
		);
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Sign-In E-raport";
			$this->load->view('layout/header', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('layout/footer', $data);
		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nama' => htmlspecialchars($this->input->post('nama')),
				'is_active' => 1,
				'role_id' => 1,
			];
			// var_dump($data);
			// die;

			$this->db->insert('user', $data);
			$this->session->set_flashdata('user', 'Registrasi berhasil');
			redirect('home/login');
		}
		;
	}
}