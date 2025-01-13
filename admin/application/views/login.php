<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eco Naturaluxe Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: #eef3eb;
        font-family: Montserrat, bold;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .login-container {
        display: flex;
        width: 100vw; /* Lebar penuh layar */
        height: 100vh; /* Tinggi penuh layar */
        background-color: #ffffff;
        border-radius: 0; /* Hilangkan radius untuk tampilan full layar */
        box-shadow: none; /* Opsional: Hilangkan bayangan */
        overflow: hidden;
      }

      .brand-section {
        background-color: #074027;
        color: #ffffff;
        text-align: center;
        padding: 60px 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }


      .brand-section h1 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .brand-section p {
        font-size: 18px;
        font-weight: lighter;
      }

      .form-section {
        flex: 1;
        padding: 50px 40px;
        background-color: #eef3eb;
      }

      .form-section h2 {
        font-size: 24px;
        margin-bottom: 30px;
        color: #003d2c;
        font-weight: bold;
        text-shadow: 1px 1px #dfe4de;
      }

      .form-control {
        background-color: #e9f0e9;
        border: 1px solid #d1d9d1;
        border-radius: 8px;
        padding: 10px;
      }

      .form-control:focus {
        box-shadow: none;
        outline: none;
        border-color: #99b799;
      }

      .btn-primary {
        background-color: #074027;
        border: none;
        border-radius: 8px;
        padding: 12px;
        width: 100%;
        font-weight: bold;
        font-size: 16px;
      }

      .btn-primary:hover {
        background-color: #074027;
      }

      label {
        font-weight: bold;
        color: #074027
      }

      .form-section h2 {
        font-size: 43px; 
        margin-bottom: 30px;
        color: #003d2c;
        font-weight: bold;
        text-shadow: 5px 5px #dfe4de;
        text-align: center;
      }

      .form-control::placeholder {
        color: #a3b2a3;
        font-size: 13px;
      }
    </style>
  </head>
  <body>
  <div class="login-container">
    <div class="brand-section">
      <img src="assets/login.png" alt="Eco NaturaLuxe" class="img-fluid">
    </div>
    <div class="form-section">
        <br> <br>
      <h2>SELAMAT DATANG</h2>
      <form method="post">
        <div class="mb-4">
          <label>Email</label>
          <input type="text" name="username" class="form-control" placeholder="Masukkan email Anda" value="<?php echo set_value('username'); ?>">
          <div class="text-danger">
            <?php echo form_error('username'); ?>
          </div>
        </div>
        <div class="mb-4">
          <label>Kata Sandi</label>
          <input type="password" name="password" class="form-control" placeholder="Masukkan kata sandi Anda" value="<?php echo set_value('password'); ?>">
          <div class="text-danger">
            <?php echo form_error('password'); ?>
          </div>
        </div>
        <br> <br> <br> <br> <br> <br> <br> <br> <br>
        <button type="submit" class="btn btn-primary">MASUK</button>
      </form>
    </div>
  </div>
</body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php if ($this->session->flashdata('pesan_sukses')): ?>
    <script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");</script>
    <?php endif ?>

    <?php if ($this->session->flashdata('pesan_gagal')): ?>
    <script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");</script>
    <?php endif ?>
  </body>
</html>