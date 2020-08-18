<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
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
				'title' => "Data Kategori"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM category")->result();
			$this->load->view('pages/Admin/category/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Kategori"
			);
			$this->load->view('pages/Admin/category/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name         	  = $this->input->post('name');

		$data = array(
			'name_category'		  => $name
		);

		$this->db->insert('category', $data);
		redirect('admin/category');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Kategori"
			);

			$data['admin'] 			= $this->db->query("SELECT * FROM category WHERE id_category='$id'")->result();
			$this->load->view('pages/Admin/category/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id         	  		  	= $this->input->post('id');
		$name         	  			= $this->input->post('name');

		$data = array(
			'name_category'		  => $name
		);
		$where = array('id_category' => $id);
		$this->db->update('category', $data, $where);
		redirect('admin/category');
	}

	public function delete($id)
	{
		$where = array('id_category' => $id);
		$this->db->delete('category', $where);
		redirect('admin/category');
	}
}
