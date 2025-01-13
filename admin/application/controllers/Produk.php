<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("id_admin")) {
            redirect('/', 'refresh');
        }
        $this->load->model('Mproduk');
    }

    function index() {
        $id_admin = $this->session->userdata("id_admin");
        $data["produk"] = $this->Mproduk->produk_admin($id_admin);

        $this->load->view('header');
        $this->load->view('produk_tampil', $data);
        $this->load->view('footer');
    }

    function tambah() {
        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->tampil();

        $inputan = $this->input->post();
        if ($inputan) {
            $this->Mproduk->simpan($inputan);
            $this->session->set_flashdata('pesan_sukses', 'Produk berhasil ditambahkan');
            redirect('produk', 'refresh');
        }

        $this->load->view('header');
        $this->load->view('produk_tambah', $data); // Perbaikan path view
        $this->load->view('footer');
    }

    function edit($id_produk) {
        $this->load->model('Mproduk');
        $data['produk'] = $this->Mproduk->detail($id_produk);

        $this->load->model('Mkategori');
        $data['kategori'] = $this->Mkategori->tampil();

        $inputan = $this->input->post();
        if($inputan) {
            $this->Mproduk->ubah($inputan, $id_produk);
            $this->session->set_flashdata('pesan_sukses', 'produk tersimpan');
            redirect('produk','refresh');
        }

        $this->load->view('header');
        $this->load->view('produk_edit', $data);
        $this->load->view('footer');
    }

    function hapus($id_produk) {
        $this->Mproduk->hapus($id_produk);

        $this->session->set_flashdata('pesan_sukses', 'Produk berhasil dihapus');
        redirect('produk', 'refresh');
    }

    function detail($id_produk) {
		$this->load->model("Mproduk");
		$data['produk'] = $this->Mproduk->detail_umum($id_produk);

		$inputan = $this->input->post();
		if($inputan) {
			$this->load->model("Mkeranjang");
			$this->Mkeranjang->simpan($inputan, $id_produk);

			$this->session->set_flashdata('pesan_sukses', 'produk masuk ke keranjang belanja');
			redirect('', 'refresh');
		}
		$this->load->view('header');
		$this->load->view('produk_detail', $data);
		$this->load->view('footer');
	}
}
