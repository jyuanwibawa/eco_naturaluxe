<?php
class Mkategori extends CI_Model {
	function tampil() {
	$q = $this->db->get("kategori");
	$d = $q->result_array();
	return $d;
	}

	function simpan($inputan) {
		//kita urusi dulu upload foto_kategori
		$config['upload_path'] = $this->config->item("assets_kategori");
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload',$config);

		//adegan ngupload foto_kategori
		$ngupload = $this->upload->do_upload("foto_kategori");

		//jika ngupload, maka dptkan nama fotnya utk ditampung ke db
		if($ngupload) {
			$inputan['foto_kategori'] = $this->upload->data("file_name");
		}

		//query simpan data ke tabel kategori
		//insert into kategori bla bla
		$this->db->insert('kategori', $inputan);
	}

	function hapus($id_kategori) {
		//delete form keategori where id_kategori=5
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete('kategori');
	}

	function detail($id_kategori) {
		//select * form kategori where id_kategori=4
		$this->db->where('id_kategori',$id_kategori);
		$q = $this->db->get('kategori');
		$d = $q->row_array();

		return $d;
	}

	function edit($inputan, $id_kategori) {
		//ngurusi foto_kategori jika pengguna upload foto

		$config['upload_path'] = $this->config->item("assets_kategori");
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library("upload", $config);

		//adegan ngupload
		$ngupload = $this->upload->do_upload("foto_kategori");

		//jk ngupload
		if ($ngupload) {
			$inputan['foto_Kategori'] = $this->upload->data("file_name");
		}

		//query upload data sesuai id_kategori
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori', $inputan);
	}
}