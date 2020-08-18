<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Produk extends CI_Model
{

	public function check_img($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id);
		$query = $this->db->get();

		return $query;
	}
}
