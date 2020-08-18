<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('role') === '2') {
			redirect('/');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'title' => "Login"
				);
				$this->load->view('login/index', $data);
			} else {
				$this->_login();
			}
		}
	}

	private function _login()
	{
		$email		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$user		= $this->db->get_where('auth', ['email' => $email, 'role' => 2])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data	= array(
					'id'		=> $user['id_auth'],
					'name'		=> $user['name'],
					'email'		=> $user['email'],
					'img'		=> $user['img'],
					'role'		=> $user['role'],
					'logged_in'	=> TRUE
				);

				$this->session->set_userdata($data);
				redirect('/');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
			redirect('login');
		}
	}

	public function register()
	{
		if ($this->session->userdata('role') === '2') {
			redirect('/');
		} else {
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[auth.email]', [
				'is_unique'	=> 'This email has already registered!'
			]);
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password dont match!',
				'min_length' => 'Password too short'
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

			if ($this->form_validation->run() == false) {
				$data = array(
					'title' => "Register"
				);
				$this->load->view('login/register', $data);
			} else {
				$data = array(
					'name' 		=> htmlspecialchars($this->input->post('name', true)),
					'email' 	=> htmlspecialchars($this->input->post('email', true)),
					'password' 	=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'img'	 	=> 'default.png',
					'role' 		=> 2
				);

				$this->db->insert('auth', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun anda berhasil di daftarkan. Silahkan login.</div>');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
