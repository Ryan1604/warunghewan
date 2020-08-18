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

    public function index()
    {
        if ($this->session->userdata('role') === '1') {
            $data = array(
                'title' => "Data Transaksi"
            );
            $id_auth    = $this->session->userdata('id');
            $data['admin']             = $this->db->query("SELECT * FROM transaksi")->result();
            $this->load->view('pages/admin/transaksi/index.php', $data);
        } else {
            redirect('/');
        }
    }

    public function detail($id)
    {
        if ($this->session->userdata('role') === '1') {
            $data = array(
                'title' => "Data Transaksi"
            );
            $id_auth    = $this->session->userdata('id');
            $data['detail']             = $this->db->query("SELECT * FROM produk INNER JOIN transaksi_detail ON produk.id_produk = transaksi_detail.id_produk INNER JOIN transaksi ON transaksi_detail.id_transaksi = transaksi.id_transaksi WHERE transaksi.id_transaksi= $id")->result();
            $this->load->view('pages/Admin/transaksi/detail.php', $data);
        } else {
            redirect('/');
        }
    }

    public function gagal($id)
    {
        $data = array(
            'status'          => 0
        );
        $where = array('id_transaksi' => $id);
        $this->db->update('transaksi', $data, $where);
        redirect('admin/transaksi');
    }

    public function confirm($id)
    {
        $data = array(
            'status'          => 2
        );
        $where = array('id_transaksi' => $id);
        $this->db->update('transaksi', $data, $where);
        redirect('admin/transaksi');
    }
}
