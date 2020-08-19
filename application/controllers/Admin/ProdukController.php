<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdukController extends CI_Controller
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
				'title' => "Data Produk"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM category INNER JOIN produk ON category.id_category = produk.id_category INNER JOIN satuan ON produk.id_satuan = satuan.id_satuan ")->result();
			$this->load->view('pages/Admin/produk/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Produk"
			);
			$data['category']	 	= $this->db->query("SELECT * FROM category")->result();
			$data['satuan']		 	= $this->db->query("SELECT * FROM satuan")->result();
			$this->load->view('pages/Admin/produk/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name         	  = $this->input->post('name');
		$category         = $this->input->post('category');
		$satuan           = $this->input->post('satuan');
		$harga         	  = $this->input->post('harga');
		$min         	  = $this->input->post('min');
		$desc         	  = $this->input->post('desc');
		$img 			  = $_FILES['img'];

		if ($img = '') {
			// Jika Field Kosong
			$img = 'default.png';
		} else {
			// Jika Field Ada
			$config['upload_path']		= './assets/img/produk';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img')) {
				$img = $this->upload->data('file_name');
			} else {
				$img = 'default.png';
			}
		}

		$data = array(
			'id_category'		  => $category,
			'id_satuan'			  => $satuan,
			'nama_produk'		  => $name,
			'harga'				  => $harga,
			'desc'				  => $desc,
			'img'				  => $img,
			'min_order'			  => $min
		);

		$this->db->insert('produk', $data);
		redirect('admin/produk');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Produk"
			);
			$data['admin'] 			= $this->db->query("SELECT * FROM produk INNER JOIN satuan ON produk.id_satuan = satuan.id_satuan WHERE id_produk='$id'")->result();
			$data['category']	 	= $this->db->query("SELECT * FROM category")->result();
			$data['satuan']		 	= $this->db->query("SELECT * FROM satuan")->result();
			$this->load->view('pages/Admin/produk/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id         	  = $this->input->post('id');
		$name         	  = $this->input->post('name');
		$category         = $this->input->post('category');
		$satuan           = $this->input->post('satuan');
		$harga         	  = $this->input->post('harga');
		$min         	  = $this->input->post('min');
		$desc         	  = $this->input->post('desc');
		$img 			  = $_FILES['img'];

		$result			  = $this->M_Produk->check_img($id);

		if ($result->num_rows() > 0) {
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
		}

		if ($img) {
			// Jika Field ada
			$config['upload_path']		= './assets/img/produk';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img')) {
				$img = $this->upload->data('file_name');
				$this->db->set('img', $img);
				if ($foto != 'default.png') {
					$target_file	= './assets/img/produk/' . $foto;
					unlink($target_file);
				}
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = array(
			'id_category'		  => $category,
			'id_satuan'			  => $satuan,
			'nama_produk'		  => $name,
			'harga'				  => $harga,
			'desc'				  => $desc,
			'min_order'			  => $min
		);

		$where = array('id_produk' => $id);
		$this->db->update('produk', $data, $where);
		redirect('admin/produk');
	}

	public function delete($id)
	{
		$result					= $this->M_Produk->check_img($id);

		if ($result->num_rows() > 0) {
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
		}

		if ($foto != 'default.png') {
			$target_file	= './assets/img/produk/' . $foto;
			unlink($target_file);
		}
		$where = array('id_produk' => $id);
		$this->db->delete('produk', $where);
		redirect('admin/produk');
	}

	public function search()
	{
		$id_satuan = $_GET['id_satuan'];

		$result				= $this->db->query("SELECT * FROM satuan WHERE id_satuan = '$id_satuan'")->row_array();

		echo json_encode($result);
	}

	public function detail($id)
	{

		$result	 	= $this->db->query("SELECT * FROM produk WHERE id_produk = $id");
		if ($result->num_rows() > 0) {
			$data	= $result->row_array();
			// Ambil data dari Database 
			$category				= $data['id_category'];
			$nama					= $data['nama_produk'];
		}

		$id_auth       			 	= $this->session->userdata('id');
		$data['admin']	        	= $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();

		if ($id_auth) {
			$data['count'] 			= $this->db->query("SELECT * FROM cart WHERE id_auth = $id_auth")->num_rows();
		} else {
			$data['count']			= 0;
		}

		$data['produk']	 			= $this->db->query("SELECT * FROM satuan INNER JOIN produk ON satuan.id_satuan = produk.id_satuan INNER JOIN category ON produk.id_category = category.id_category WHERE id_produk = $id")->result();

		$data['produk_lainya']	 	= $this->db->query("SELECT * FROM satuan INNER JOIN produk ON satuan.id_satuan = produk.id_satuan INNER JOIN category ON produk.id_category = category.id_category WHERE id_produk NOT IN ($id) AND produk.id_category = $category")->result();
		$data['title'] 				= $nama;
		$this->load->view('detail.php', $data);
	}
}
