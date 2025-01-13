<div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginLabel">Masuk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url("welcome") ?>">
          <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email_member" class="form-control" value="<?php echo set_value("email_member") ?>">
            <div class="text-danger small">
              <?php echo form_error('email_member') ?>
            </div>
          </div>
          <div class="mb-3">
            <label>Kata Sandi</label>
            <input type="password" name="password_member" class="form-control" value="<?php echo set_value('password') ?>">
            <div class="text-danger small">
              <?php echo form_error('password_member') ?>
            </div>
          </div>
          <button class="btn btn-primary">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="bg-header text-white py-3">
  <div class="container">
      <div class="row">
        <!-- Kolom Kiri: Kontak -->
        <div class="col-md-6">
          <p><i class="me-2 bi bi-instagram"></i> econaturaluxe</p>
          <p><i class="me-2 bi bi-envelope"></i> econaturaluxe@gmail.com</p>
          <p><i class="me-2 bi bi-telephone"></i> +62 823456789</p>
          <p><i class="me-2 bi bi-geo-alt"></i> Nitiprayan rt 01, Ngestiharjo, Kasihan, Bantul, Daerah Istimewa Yogyakarta</p>
        </div>

         <!-- Kolom Kanan: Tentang Kami -->
        <div class="col-md-6 text-md-end">
          <h5 class="mb-4">Tentang Kami</h5>
          <div class="d-flex justify-content-md-end">
            <div class="me-4 text-center">
              <a href="<?php echo base_url('faq.php'); ?>" class="text-white" style="text-decoration: none;">
                  <i class="bi bi-question-circle" style="font-size: 2rem;"></i>
                  <p>FAQ</p>
              </a>
            </div>
          <div class="me-4 text-center">
            <i class="bi bi-lightbulb" style="font-size: 2rem;"></i>
            <p>Tips</p>
          </div>
          <div class="text-center">
            <i class="bi bi-person" style="font-size: 2rem;"></i>
            <p>Solusi</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <script>new DataTable("#tabelku")</script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success"); </script>
    <?php endif ?>
    <?php if($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error"); </script>
    <?php endif ?>
  </body>
</html>