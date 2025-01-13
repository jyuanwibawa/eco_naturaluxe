<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {
    public function detail($id_admin) {
        $this->db->select('nama, nama_distrik, alamat');
        $this->db->from('admin');
        $this->db->where('id_admin', $id_admin);
        $query = $this->db->get();
        return $query->row_array();
    }
}

