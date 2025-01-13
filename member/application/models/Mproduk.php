<?php
class Mproduk extends CI_Model {
    
    function tampil() {
        $q = $this->db->get('produk');
        return $q->result_array();
    }
    function tampil_produk_terbaru() {
        $this->db->order_by('id_produk', 'desc');
        $q = $this->db->get('produk',4,0);
        return $q->result_array();
    }
    function produk_member($id_member) {
        $this->db->where('id_member', $id_member);
        $q = $this->db->get('produk');
        return $q->result_array();
    }
    function simpan($inputan) {
        $config['upload_path'] = $this->config->item('assets_produk');;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto_produk")) {
            $upload_data = $this->upload->data();
            $inputan['foto_produk'] = $upload_data["file_name"];
        } else {
            $error = $this->upload->display_errors();
            return array('error' => $error);
        }

        $inputan['id_member'] = $this->session->userdata("id_member");
        $this->db->insert('produk', $inputan);
        return array('success' => true);
    }
    function detail($id_produk) {
        // detail produk sesuai id_produk dan id_mmber yg login
        $this->db->where('id_member', $this->session->userdata("id_member"));
        $this->db->where('id_produk', $id_produk);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get('produk');
        return $q->row_array();
    }
    function ubah($inputan, $id) {
        $config['upload_path'] = $this->config->item('assets_produk');
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto_produk")) {
            $upload_data = $this->upload->data();
            $inputan['foto_produk'] = $upload_data["file_name"];
        }
        // query update
        // ubah produk sesuai id_produk dan id_mmber yg login
        $this->db->where('id_member', $this->session->userdata("id_member"));
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $inputan);
        return array('success' => true);
    }
    function hapus($id_produk) {
        // hps produk sesuai id_produk dan id_mmber yg login
        $this->db->where('id_member', $this->session->userdata("id_member"));
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
    function detail_umum($id_produk) {
        $this->db->where('id_produk', $id_produk);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $q = $this->db->get('produk');
        return $q->row_array();
    }
}
?>