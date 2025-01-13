<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
        $this->load->model('Mkeranjang');
        $this->load->model('Mmember');
        $this->load->model('Mongkir');
        $this->load->model('Madmin');
    }

    public function checkout($id_admin_jual)
    {
        // Ambil data keranjang
        $data["keranjang"] = $this->Mkeranjang->tampil_member($id_admin_jual);

        // Hitung total berat produk
        $total_berat = 0;
        foreach ($data["keranjang"] as $pk) {
            $berat = $pk['jumlah'] * $pk['berat_produk'];
            $total_berat += $berat;
        }

        // Ambil data penjual (admin) dengan ID valid sementara
        $valid_admin_id = 1; // Ganti dengan ID admin yang valid dari tabel `admin`
        $data["penjual"] = $this->Madmin->detail($valid_admin_id) ?? [
            "nama" => "Penjual tidak ditemukan",
            "nama_distrik" => "N/A",
            "alamat" => "N/A"
        ];

        // Ambil data pembeli
        $id_member_beli = $this->session->userdata("id_member");
        $data["pembeli"] = $this->Mmember->detail($id_member_beli) ?? [
            "nama_member" => "Pembeli tidak ditemukan",
            "nama_distrik_member" => "N/A",
            "alamat_member" => "N/A",
            "wa_member" => "N/A"
        ];

        // Dapatkan ongkir berdasarkan lokasi
        $origin = $data["penjual"]["kode_distrik_member"] ?? '';
        $destination = $data["pembeli"]["kode_distrik_member"] ?? '';
        $data["biaya"] = $this->Mongkir->biaya($origin, $destination, $total_berat);

        // Validasi form ongkir
        $this->form_validation->set_rules("ongkir", "Ongkir", "required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {
            $ongkir_index = $this->input->post("ongkir");
            $ongkir_terpilih = $data["biaya"]["costs"][$ongkir_index];

            // Proses checkout
            $id_transaksi = $this->Mkeranjang->checkout(
                $data["keranjang"], 
                $data["penjual"], 
                $data["pembeli"], 
                $data["biaya"]["name"], 
                $ongkir_terpilih
            );

            $this->session->set_flashdata('pesan_sukses', 'Transaksi telah dibuat');
            redirect('transaksi/detail/' . $id_transaksi, 'refresh');
        }

        $this->load->view("header");
        $this->load->view("checkout", $data);
    }
}
