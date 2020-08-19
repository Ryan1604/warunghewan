<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_cart($id)
    {

        $id_auth        = $this->session->userdata('id');
        $role           = $this->session->userdata('role');
        if ($id_auth) {
            if ($role === '2') {
                $result         = $this->db->query("SELECT * FROM produk WHERE id_produk = $id");
                if ($result->num_rows() > 0) {
                    $data    = $result->row_array();
                    // Ambil data dari Database 
                    $qty                = $data['min_order'];
                    $harga              = $data['harga'];
                }

                $data = array(
                    'id_auth'              => $id_auth,
                    'id_produk'            => $id,
                    'qty'                  => $qty,
                    'subtotal'             => $harga * $qty
                );

                $result2         = $this->db->query("SELECT * FROM cart WHERE id_produk = $id AND id_auth = $id_auth");
                if ($result2->num_rows() > 0) {
                    $data2    = $result2->row_array();
                    // Ambil data dari Database 
                    $count = $this->db->query("SELECT * FROM cart WHERE id_auth = $id_auth")->num_rows();
                    echo json_encode([
                        'status'    => 'gagal',
                        'data'      => $count
                    ]);
                } else {
                    $this->db->insert('cart', $data);
                    $count = $this->db->query("SELECT * FROM cart WHERE id_auth = $id_auth")->num_rows();
                    echo json_encode([
                        'status'    => 'sukses',
                        'data'      => $count
                    ]);
                }
            } else {
                echo json_encode([
                    'status'    => 'beda'
                ]);
            }
        } else {
            echo json_encode([
                'status'    => 'belum'
            ]);
        }
    }

    public function delete_cart($id)
    {
        $id_auth    = $this->session->userdata('id');
        $delete = $this->db->query("DELETE FROM cart WHERE id_auth = $id_auth AND id_produk = $id");
        if ($delete) {
            $count = $this->db->query("SELECT * FROM cart WHERE id_auth = $id_auth")->num_rows();
            echo json_encode([
                'status'    => 'sukses',
                'data'      => $count
            ]);
        }
    }

    public function update_cart()
    {
        $id_cart    = $_POST['id_cart'];
        $subtotal    = $_POST['subtotal'];
        $qty    = $_POST['qty'];

        $id_array = explode(",", $id_cart);
        $subtotal_array = explode(",", $subtotal);
        $qty_array = explode(",", $qty);

        for ($i = 0; $i < count($id_array); $i++) {
            $query = $this->db->query("UPDATE cart SET qty = $qty_array[$i], subtotal = $subtotal_array[$i] WHERE id_cart = $id_array[$i]");
        }

        $id_auth = $this->session->userdata('id');
        $count = $this->db->query("SELECT * FROM cart WHERE id_auth = $id_auth")->num_rows();
        echo json_encode([
            'status'    => 'sukses',
            'data'      => $count,
            'total'     => $this->db->query("SELECT sum(subtotal) as total FROM cart")->result()
        ]);
    }


    public function checkout()
    {
        $total          = $_POST['total'];
        $id_auth        = $this->session->userdata('id');
        $id_produk      = $_POST['id_produk'];
        $subtotal       = $_POST['subtotal'];
        $qty            = $_POST['qty'];

        $id_array = explode(",", $id_produk);
        $subtotal_array = explode(",", $subtotal);
        $qty_array = explode(",", $qty);

        $cek    = $this->db->query("SELECT * FROM transaksi WHERE id_auth = $id_auth AND status = 1");

        if ($cek->num_rows() > 0) {
            $data    = $cek->row_array();
            // Ambil data dari Database 
            $id                 = $data['id_transaksi'];

            $this->db->query("UPDATE transaksi SET status = 0 WHERE id_transaksi = $id");
        }
        $table = "transaksi";
        $field = "no_invoice";

        $today = date('y.md');

        $prefix = "INV/" . $today;

        $lastCode = $this->M_Kode->generate($prefix, $table, $field);
        if ($lastCode) {
            $noUrut = (int) substr($lastCode['no_invoice'], -3, 3);
        } else {
            $noUrut = 0;
        }

        $noUrut++;
        $no_invoice = $prefix . sprintf('%03s', $noUrut);

        $random = rand(500, 999);

        $final_total = $total + $random;

        $data = array(
            'no_invoice'          => $no_invoice,
            'id_auth'             => $id_auth,
            'tanggal'             => date('Y-m-d'),
            'status'              => 1,
            'total'               => $final_total
        );

        $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();

        for ($i = 0; $i < count($id_array); $i++) {
            $query = $this->db->query("INSERT INTO transaksi_detail (id_transaksi_detail, id_transaksi, id_produk, qty, subtotal) VALUES(NULL, $id_transaksi, $id_array[$i],$qty_array[$i], $subtotal_array[$i])");
            if ($query) {
                $this->db->query("DELETE FROM cart WHERE id_auth = $id_auth");
            }
        }
        echo json_encode([
            'status' => 'sukses',
        ]);
    }

    public function konfirmasi()
    {
        $data = array(
            'title' => "Warung Hewan"
        );
        $id_auth        = $this->session->userdata('id');
        $data['admin']         = $this->db->query("SELECT * FROM transaksi INNER JOIN auth ON transaksi.id_auth = auth.id_auth WHERE transaksi.id_auth = $id_auth AND status = 1")->result();
        $this->load->view('konfirmasi', $data);
    }

    public function cart()
    {
        if ($this->session->userdata('role') === '1') {
            redirect('/');
        } else {
            $data = array(
                'title' => "Warung Hewan"
            );
            $data['admin']          = $this->db->get_where('auth', ['id_auth' => $this->session->userdata('id')])->row_array();

            $data['produk']         = $this->db->query("SELECT * FROM produk INNER JOIN satuan ON produk.id_satuan = satuan.id_satuan")->result();

            $data['total']          = $this->db->query("SELECT sum(subtotal) as total FROM cart")->result();

            $id_auth                = $this->session->userdata('id');
            if ($id_auth == '') {
                $data['count']          = '0';
            } else {
                $data['count']          = $this->db->query("SELECT * FROM cart WHERE id_auth = $id_auth")->num_rows();
                $data['cart']           = $this->db->query("SELECT * FROM cart INNER JOIN produk ON cart.id_produk = produk.id_produk INNER JOIN satuan ON produk.id_satuan = satuan.id_satuan WHERE id_auth = $id_auth")->result();
            }

            $this->load->view('cart', $data);
        }
    }
}
