<?php
defined('BASEPATH') OR exit('No direct script ccess allowed');

class Madmin extends CI_Model {

    function login($inputan) {
        $username = $inputan['username'];
        $password = $inputan['password'];
        $password = sha1($password);

        //cek ke database
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();

        //jk tdk kosong, maka ada
        if (!empty($cekadmin)) {
            //membuat tiket bioskop yg dipakai selama keliling apk 
            $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
            $this->session->set_userdata("username", $cekadmin["username"]);
            $this->session->set_userdata("nama", $cekadmin["nama"]);
            return "ada";
        } else {
            return "gak ada";
        }
    }
    function ubah($inputan, $id_admin) {

        //jk tdk kosong password , mk enkripsi
        if (!empty($inputan["password"])) {
            $inputan['password'] = sha1($inputan['password']);
        } else {
            unset($inputan['password']);
        }

        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $inputan);
        $this->db->where('id_admin', $id_admin);
        $q = $this->db->get('admin');
        $cekadmin = $q->row_array();
        //buat tiket lgi
        $this->session->set_userdata("id_admin", $cekadmin["id_admin"]);
        $this->session->set_userdata("username", $cekadmin["username"]);
        $this->session->set_userdata("nama", $cekadmin["nama"]);
    }
}