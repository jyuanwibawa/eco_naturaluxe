<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Eco NaturaLuxe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS Kustom untuk Navbar */
        .bg-custom {
            background-color: #074027 !important;
        }
        .navbar-brand, .nav-link {
            text-align: center; /* Pusatkan teks */
        }
        .navbar-nav {
            margin: 0 auto; /* Pusatkan item navbar */
        }
        .navbar-brand img {
            width: 40px; /* Atur lebar gambar sesuai kebutuhan */
            height: auto; /* Menjaga proporsi gambar */
            margin-right: 10px; /* Beri jarak antara gambar dan teks */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom mb-3">
        <div class="container">
            <!-- Gambar pada Navbar -->
            <a href="" class="navbar-brand">
                <img src="assets/logo_login.png" alt="Logo"> Eco NaturaLuxe
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="naff">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url('home') ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('artikel') ?>" class="nav-link">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('slider') ?>" class="nav-link">Slider</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('kategori') ?>" class="nav-link">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('produk') ?>" class="nav-link">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('member') ?>" class="nav-link">Konsumen</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('transaksi') ?>" class="nav-link">Transaksi</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url('akun') ?>" class="nav-link">
                            <?php echo $this->session->userdata('nama') ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('logout') ?>" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
