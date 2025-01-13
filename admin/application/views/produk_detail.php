<div class="container py-3">
    <div class="row">
        <div class="col-md-6">
        <img src="<?php echo $this->config->item("url_produk").$produk["foto_produk"]?>" class="w-100">
        </div>
        <div class="col-md-6">
            <h1><?php echo $produk["nama_produk"]?></h1>
            <span class="badge bg-dark"><?php echo $produk["nama_kategori"]?></span>
            <p class="lead"><?php echo number_format($produk["harga_produk"])?></p>

            <?php if ($produk["id_admin"]!==$this->session->userdata("id_admin")): ?>
            <form class="my-2" method="post">

            </form>
            <?php endif ?>
            
            <br>
            <p><?php echo $produk["deskripsi_produk"]?></p>
        </div>
    </div>
</div>