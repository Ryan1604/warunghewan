<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('login');
		}
	}

	public function detail($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Pesanan Saya"
			);
			$id_auth	= $this->session->userdata('id');
			$data['detail'] 			= $this->db->query("SELECT * FROM produk INNER JOIN transaksi_detail ON produk.id_produk = transaksi_detail.id_produk INNER JOIN transaksi ON transaksi_detail.id_transaksi = transaksi.id_transaksi WHERE transaksi.id_transaksi= $id")->result();
			$this->load->view('pages/User/transaksi/detail.php', $data);
		} else {
			redirect('/');
		}
	}
}
