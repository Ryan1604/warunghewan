<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Dashboard"
			);
			$data['admin'] 			= $this->db->query("SELECT * FROM transaksi")->num_rows();
			$data['cust'] 			= $this->db->query("SELECT * FROM auth WHERE role = 2")->num_rows();
			$data['produk'] 		= $this->db->query("SELECT * FROM produk ")->num_rows();
			$this->load->view('pages/Admin/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
