<div id="carouselExampleCaptions" class="carousel slide">
  
  <div class="carousel-inner">

    <?php foreach ($slider as $key => $value): ?>

    <div class="carousel-item <?php echo $key==0 ? "active" : "" ?>">
      <img src="<?php echo $this->config->item("url_slider"). $value["foto_slider"]?>" class="d-block w-100">
      <div class="carousel-caption d-none d-md-block">
        <?php echo $value['caption_slider']?>
      </div>
    </div>
    <?php endforeach ?>
    

    </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<section class="py-5" style="background-color: #e7edeb;">
  <div class="container">
    <h5 class="text-center mb-5">Kategori Produk</h5>
    <div class="row text-center">
      <?php foreach ($kategori as $key => $value): ?>
        <div class="col-md-4 ext-center">
          <a href="<?php echo base_url("kategori/detail/".$value["id_kategori"]) ?>" class="text-decoration-none">
         <img src="<?php echo $this->config->item("url_kategori").$value["foto_kategori"]?>" class="w-50
          rounded-circle"> 
          <h5 class="mt-3"><?php echo $value['nama_kategori']?></h5>
          </a>
        </div>
        <?php endforeach ?>
    </div>
  </div>
</section>

<section class="py-5" style="background-color: #e7edeb;">
    <div class="container">
        <h5 class="text-center mb-5">Produk Terpopuler</h5>
        <div class="row">
          <?php foreach ($produk as $key => $value): ?>
            <div class="col-md-3">
              <a href="<?php echo base_url("produk/detail/".$value["id_produk"]) ?>" class="text-decoration-none">
                <div class="card mb-3 border-0 shadow">
                  <img src="<?php echo $this->config->item("url_produk").$value["foto_produk"] ?>">
                  <div class="card-body text-center">
                    <h6><?php echo $value['nama_produk'] ?></h6>
                    <!-- Menampilkan rating bintang -->
                    <div class="mb-2">
                      <?php 
                      $rating = isset($value['rating_produk']) ? $value['rating_produk'] : 0; // Default rating 0
                      for ($i = 1; $i <= 5; $i++): 
                        if ($i <= $rating): ?>
                          <i class="fa fa-star text-warning"></i>
                        <?php else: ?>
                          <i class="fa fa-star text-secondary"></i>
                        <?php endif;
                      endfor; 
                      ?>
                    </div>
                    <span>Rp. <?php echo number_format($value['harga_produk']) ?></span>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach ?>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: #e7edeb;">
  <div class="container">
    <h5 class="text-center mb-5" style="font-family: 'Montserrat', sans-serif; font-weight: 700;">Kenapa Harus Eco NaturaLuxe?</h5>
    <div class="row text-center">
      <?php foreach ($artikel as $key => $value): ?>
        <div class="col-md-3">
         <img src="<?php echo $this->config->item("url_artikel").$value["foto_artikel"]?>" class="w-100"> 
          <h6 style="font-weight: 700; font-family: 'Montserrat', sans-serif;" class="mt-3"><?php echo $value['judul_artikel']?></h6>
          <p style="font-family: 'Montserrat', sans-serif; font-size: 14px;"></p>
        </div>
        <?php endforeach ?>
    </div>
  </div>
</section>