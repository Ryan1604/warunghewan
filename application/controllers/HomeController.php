<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in' !== TRUE)) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = array(
            'title' => "Warung Hewan"
        );
        $data['admin']          = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();

        $data['produk']         = $this->db->query("SELECT * FROM produk INNER JOIN satuan ON produk.id_satuan = satuan.id_satuan")->result();

        $id_auth                = $this->session->userdata('id');
        if ($id_auth !== NULL) {
            $data['count']          = $this->db->query("SELECT * FROM cart WHERE id_auth = $id_auth")->num_rows();
        } else {
            $data['count']          = '0';
        }

        $this->load->view('home', $data);
    }
}
