<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

    public function index()
    {
        $this->load->model('Mkeranjang');
        $data["keranjang"] = $this->Mkeranjang->tampil();

        $this->load->view("header");
        $this->load->view("keranjang", $data);
    }

    public function hapus($id_keranjang)
    {
        $this->load->model('Mkeranjang');
        $this->Mkeranjang->hapus($id_keranjang);

        $this->session->set_flashdata('pesan_sukses', 'Produk telah dihapus dari keranjang');
        redirect('keranjang', 'refresh');
    }

    public function checkout($id_member_jual)
    {
        $this->load->model('Mkeranjang');
        $this->load->model('Mmember');
        $this->load->model('Mongkir');

        $data["keranjang"] = $this->Mkeranjang->tampil_member($id_member_jual);

        // Hitung total berat produk
        $total_berat = 0;
        foreach ($data["keranjang"] as $pk) {
            $berat = $pk['jumlah'] * $pk['berat_produk'];
            $total_berat += $berat;
        }

        // Ambil data penjual dan pembeli
        $data["penjual"] = $this->Mmember->detail($id_member_jual);
        $id_member_beli = $this->session->userdata("id_member");
        $data["pembeli"] = $this->Mmember->detail($id_member_beli);

        // Dapatkan ongkir berdasarkan lokasi
        $origin = $data["penjual"]["kode_distrik_member"];
        $destination = $data["pembeli"]["kode_distrik_member"];
        $data["biaya"] = $this->Mongkir->biaya($origin, $destination, $total_berat);

        // Validasi form ongkir
        $this->form_validation->set_rules("ongkir", "Ongkir", "required");
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {
            $ongkir_index = $this->input->post("ongkir");
            $ongkir_terpilih = $data["biaya"]["costs"][$ongkir_index];

            // Proses checkout
            $this->load->model('Mkeranjang');
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
