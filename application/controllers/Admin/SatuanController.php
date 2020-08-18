<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SatuanController extends CI_Controller
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
				'title' => "Data Satuan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM satuan")->result();
			$this->load->view('pages/Admin/satuan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Satuan"
			);
			$this->load->view('pages/Admin/satuan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name         	  = $this->input->post('name');

		$data = array(
			'nama_satuan'		  => $name
		);

		$this->db->insert('satuan', $data);
		redirect('admin/satuan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Satuan"
			);

			$data['admin'] 			= $this->db->query("SELECT * FROM satuan WHERE id_satuan='$id'")->result();
			$this->load->view('pages/Admin/satuan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id         	  		  	= $this->input->post('id');
		$name         	  			= $this->input->post('name');

		$data = array(
			'nama_satuan'		  => $name
		);
		$where = array('id_satuan' => $id);
		$this->db->update('satuan', $data, $where);
		redirect('admin/satuan');
	}

	public function delete($id)
	{
		$where = array('id_satuan' => $id);
		$this->db->delete('satuan', $where);
		redirect('admin/satuan');
	}
}
