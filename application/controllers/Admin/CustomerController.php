<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Customer"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM auth WHERE role = 2")->result();
			$this->load->view('pages/Admin/customer/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
