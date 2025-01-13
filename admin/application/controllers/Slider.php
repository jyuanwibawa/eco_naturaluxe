<?php
class Slider extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("id_admin")) {
            redirect('/', 'refresh');
        }
    }

    function index() {
        // Panggil model Mslider
        $this->load->model("Mslider");
        $data["slider"] = $this->Mslider->tampil();
        $this->load->view("header");
        $this->load->view("slider_tampil", $data);
        $this->load->view("footer");
    }

    function tambah() {
        $inputan = $this->input->post();

        // Form validation nama slider
        $this->form_validation->set_rules("caption_slider", "Caption Slider", "required");

        // Atur pesan dalam bahasa Indonesia
        $this->form_validation->set_message("required", "%s wajib diisi");

        // Jika ada inputan
        if ($this->form_validation->run() == TRUE) {
            $this->load->model('Mslider');
            $this->Mslider->simpan($inputan);
            $this->session->set_flashdata('pesan_sukses', 'Data slider tersimpan');
            redirect('slider', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("slider_tambah");
        $this->load->view("footer");
    }

    function hapus($id_slider) {
        $this->load->model('Mslider');
        $this->Mslider->hapus($id_slider);
        $this->session->set_flashdata('pesan_sukses', 'Slider telah terhapus');
        redirect('slider', 'refresh');
    }

    function edit($id_slider) {
        $this->load->model("Mslider");
        $data['slider'] = $this->Mslider->detail($id_slider);

        $inputan = $this->input->post();

        // Form validation nama slider
        $this->form_validation->set_rules("caption_slider", "Caption Slider", "required");

        // Atur pesan dalam bahasa Indonesia
        $this->form_validation->set_message("required", "%s wajib diisi");

        if ($this->form_validation->run() == TRUE) {
            $this->load->model('Mslider');
            $this->Mslider->edit($inputan, $id_slider);
            $this->session->set_flashdata('pesan_sukses', 'Slider telah diubah');
            redirect('slider', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("slider_edit", $data);  // Memperbaiki nama view menjadi slider_edit
        $this->load->view("footer");
    }
}
