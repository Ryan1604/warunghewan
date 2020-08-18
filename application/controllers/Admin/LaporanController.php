<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
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
                'title' => "Data Laporan"
            );
            $id_auth    = $this->session->userdata('id');
            $data['admin']             = $this->db->query("SELECT * FROM transaksi INNER JOIN auth ON transaksi.id_auth = auth.id_auth  WHERE status = 2")->result();
            $this->load->view('pages/admin/laporan/index.php', $data);
        } else {
            redirect('/');
        }
    }
}
