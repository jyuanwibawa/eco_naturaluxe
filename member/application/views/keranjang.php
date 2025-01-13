<style>
    /* Gaya khusus untuk tombol hijau */
    .custom-button-green {
        background-color: #074027; /* Warna hijau */
        color: white; /* Warna teks putih */
        font-size: 1.5rem; /* Ukuran font besar */
        padding: 10px 25px; /* Padding tombol */
        width: 200px; /* Lebar tombol */
        text-align: center; /* Teks di tengah */
        border-radius: 10px; /* Sudut membulat */
        border: none; /* Tanpa border default */
    }
    .custom-button-green:hover {
        background-color: #218838; /* Warna hijau lebih gelap saat hover */
    }
</style>

<div class="container">
    <?php foreach ($keranjang as $key => $per_penjual): ?>
        <div class="mb-5">
            <h3><?php echo $per_penjual["nama_member"]?></h3>
            <table class="table table-sm table-bordered">
                <?php foreach ($per_penjual['produk'] as $k => $per_produk): ?>
                    <tr>
                        <td>
                            <img src="<?php echo $this->config->item("url_produk").$per_produk["foto_produk"]?>" width="70"><br> 
                            <?php echo $per_produk['nama_produk']?>
                        </td>
                        <td><?php echo number_format($per_produk['harga_produk'])?></td>
                        <td><?php echo $per_produk['jumlah']?></td>
                        <td>
                            <a href="<?php echo base_url("keranjang/hapus/".$per_produk["id_keranjang"])?>" class="btn btn-danger">Hapus</a>
                            <a href="<?php echo base_url("keranjang/detail/".$per_produk["id_keranjang"])?>" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
            <a href="<?php echo base_url("keranjang/checkout/".$per_penjual["id_member"])?>" class="btn btn-lg custom-button-green">Bayar</a>
        </div>
    <?php endforeach ?>
</div>
