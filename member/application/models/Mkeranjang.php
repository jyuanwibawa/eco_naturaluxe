<?php
class Mkeranjang extends CI_Model {
    
    function simpan($inputan, $id_produk) {
        $this->db->where('id_produk', $id_produk);
        $qp = $this->db->get('produk');
        $dp = $qp->row_array();

        $inputan["id_produk"] = $id_produk;
        $inputan["id_member"] = $this->session->userdata("id_member");
        
        // cek dulu apakah member ini sudah memiliki produk ini di keranjang
        $this->db->where('keranjang.id_member', $this->session->userdata("id_member")); // Tambahkan nama tabel
        $this->db->where('keranjang.id_produk', $id_produk);
        $qk = $this->db->get('keranjang');
        $dk = $qk->row_array();

        if (empty($dk)) {
            $this->db->insert('keranjang', $inputan);
        } else {
            $this->db->where('keranjang.id_member', $this->session->userdata("id_member")); // Tambahkan nama tabel
            $this->db->where('keranjang.id_produk', $id_produk);
            $this->db->update('keranjang', $inputan);
        }
    }

    function tampil() {
        // Mengambil daftar keranjang berdasarkan id_member yang login
        $this->db->where('keranjang.id_member', $this->session->userdata("id_member")); // Tambahkan nama tabel
        $this->db->join('member', 'keranjang.id_member = member.id_member', 'left');
        $this->db->group_by('member.id_member');
        $qmj = $this->db->get('keranjang');
        $dmj = $qmj->result_array();

        $output = array();
        foreach ($dmj as $key => $per_penjual) {
            $this->db->where('keranjang.id_member', $this->session->userdata("id_member")); // Tambahkan nama tabel
            $this->db->where('keranjang.id_member', $per_penjual["id_member"]);
            $this->db->join('produk', 'keranjang.id_produk = produk.id_produk', 'left');
            $qkp = $this->db->get('keranjang');
            $dkp = $qkp->result_array();

            $per_penjual["produk"] = $dkp;

            $output[] = $per_penjual;
        }
        return $output;
    }

    function hapus($id_keranjang) {
        $this->db->where('keranjang.id_keranjang', $id_keranjang); // Tambahkan nama tabel
        $this->db->where('keranjang.id_member', $this->session->userdata("id_member")); // Tambahkan nama tabel
        $this->db->delete('keranjang');
    }

    function tampil_member($id_member) {
        $this->db->where('keranjang.id_member', $id_member); // Tambahkan nama tabel
        $this->db->where('keranjang.id_member', $this->session->userdata("id_member")); // Tambahkan nama tabel
        $this->db->join('produk', 'keranjang.id_produk = produk.id_produk', 'left');
        $q = $this->db->get('keranjang');
        $dk = $q->result_array();

        return $dk;
    }

    function checkout($keranjang, $member, $nama_ekspedisi, $ongkirterpilih) {
        $totalbelanja = 0;
        $totalberat = 0;
        foreach ($keranjang as $key => $value) {
            $totalbelanja += $value['jumlah'] * $value['harga_produk'];
            $totalberat += $value['jumlah'] * $value['berat_produk'];
        }
        
        $m['kode_transaksi'] = date("YmdHis") . rand(1111, 9999);
        $m['id_member'] = $member['id_member']; 
        $m['tanggal_transaksi'] = date("Y-m-d H:i:s");
        $m['belanja_transaksi'] = $totalbelanja; 
        $m['status_transaksi'] = "pesan"; 
        $m['ongkir_transaksi'] = $ongkirterpilih['cost'][0]['value']; 
        $m['total_transaksi'] = $totalbelanja + $ongkirterpilih['cost'][0]['value'];
        $m['bayar_transaksi'] = $totalbelanja + $ongkirterpilih['cost'][0]['value'];
        $m['distrik_pengirim'] = $member['nama_distrik_member'];
        $m['nama_pengirim'] = $member['nama_member'];
        $m['wa_pengirim'] = $member['wa_member'];
        $m['alamat_pengirim'] = $member['alamat_member'];
        $m['distrik_penerima'] = $member['nama_distrik_member'];
        $m['nama_penerima'] = $member['nama_member'];
        $m['wa_penerima'] = $member['wa_member'];
        $m['alamat_penerima'] = $member['alamat_member'];
        $m['nama_ekspedisi'] = $nama_ekspedisi;
        $m['layanan_ekspedisi'] = $ongkirterpilih['description'];
        $m['estimasi_ekspedisi'] = $ongkirterpilih['cost'][0]['value'];
        $m['berat_ekspedisi'] = $totalberat;

        $this->db->insert('transaksi', $m);

        $id_transaksi = $this->db->insert_id();
        foreach ($keranjang as $key => $value) {
            $td['id_transaksi'] = $id_transaksi;
            $td['id_produk'] = $value['id_produk'];
            $td['nama'] = $value['nama_produk'];
            $td['harga'] = $value['harga_produk'];
            $td['jumlah'] = $value['jumlah'];        

            $this->db->insert('transaksi_detail', $td);
        }
        $this->db->where('keranjang.id_member', $member['id_member']); // Tambahkan nama tabel
        $this->db->delete('keranjang');

        return $id_transaksi;
    }
}