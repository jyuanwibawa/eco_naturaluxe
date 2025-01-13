<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtransaksi extends CI_Model {

    // Fungsi untuk menampilkan semua data transaksi
    function tampil() {
        $query = $this->db->get('transaksi');
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan informasi penjual berdasarkan ID member
    function penjual($id_member) {
        $this->db->select('nama, distrik, alamat');
        $this->db->where('id_member', $id_member);
        $query = $this->db->get('member');
        return $query->row_array();
    }

    // Fungsi untuk mendapatkan informasi pembeli berdasarkan ID member
    function pembeli($id_member) {
        $this->db->select('nama AS nama_pembeli, distrik AS distrik_pembeli, alamat AS alamat_pembeli, no_telepon AS kontak_pembeli');
        $this->db->where('id_member', $id_member);
        $query = $this->db->get('member');
        return $query->row_array();
    }

    // Fungsi untuk mendapatkan detail transaksi tertentu
    function detail($id_transaksi) {
        $this->db->select('t.*, 
            m.nama AS pembeli, 
            mj.nama AS penjual, 
            t.status_transaksi, 
            t.resi_ekspedisi');
        $this->db->from('transaksi t');
        $this->db->join('member m', 't.id_member_beli = m.id_member', 'left'); // Pembeli
        $this->db->join('member mj', 't.id_member_jual = mj.id_member', 'left'); // Penjual
        $this->db->where('t.id_transaksi', $id_transaksi);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Fungsi untuk mendapatkan rincian transaksi berdasarkan ID transaksi
    function transaksi_detail($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
        $query = $this->db->get('transaksi_detail');
        return $query->result_array();
    }

    // Fungsi untuk mengubah status transaksi menjadi lunas
    function set_lunas($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->set('status_transaksi', 'lunas');
        $this->db->update('transaksi');
    }

    // Fungsi untuk memperbarui nomor resi ekspedisi
    function update_resi($resi, $id_transaksi) {
        $data['resi_ekspedisi'] = $resi;
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', $data);
    }

    // Fungsi untuk mengirim rating dari pembeli ke transaksi detail
    function kirim_rating($input) {
        $list_id_transaksi_detail = $input['id_transaksi_detail'];
        $list_jumlah_rating = $input['jumlah_rating'];
        $list_ulasan_rating = $input['ulasan_rating'];

        foreach ($list_id_transaksi_detail as $key => $id) {
            $data['waktu_rating'] = date("Y-m-d H:i:s");
            $data['jumlah_rating'] = $list_jumlah_rating[$key];
            $data['ulasan_rating'] = $list_ulasan_rating[$key];

            $this->db->where('id_transaksi_detail', $id);
            $this->db->update('transaksi_detail', $data);
        }
    }
}
