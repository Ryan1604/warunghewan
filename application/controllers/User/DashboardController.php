<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('login');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Pesanan Saya"
			);
			$id_auth	= $this->session->userdata('id');
			$data['admin'] 			= $this->db->query("SELECT * FROM transaksi WHERE id_auth= $id_auth")->result();
			$this->load->view('pages/User/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
