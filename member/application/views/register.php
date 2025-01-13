<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f6f7;
            font-family: Montserrat;
        }
        .register-container {
            max-width: 900px;
            margin: 50px auto;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .register-image {
            background-color: #004d40;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
        }
        .register-image img {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .register-image h1 {
            font-size: 24px;
            font-weight: bold;
        }
        .form-container {
            padding: 40px;
        }
        .form-container h5 {
            font-weight: bold;
            color: #004d40;
            margin-bottom: 20px;
        }
        .form-container input,
        .form-container select,
        .form-container textarea {
            border-radius: 20px;
            background-color: #e8f0f2;
        }
        .btn-primary {
            background-color: #004d40;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 16px;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #004d40;
        }
        .small-text {
            font-size: 12px;
            color: gray;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="register-container row">
            <div class="register-image col-md-6">
                <img src="assets/logo_login.png" alt="Eco NaturaLuxe Logo">
                <h1>Eco NaturaLuxe</h1>
            </div>
            <div class="form-container col-md-6">
                <h5 class="text-center">PENDAFTARAN AKUN</h5>
                <form method="post">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email_member" class="form-control" placeholder="Masukkan Email Anda" value="<?php echo set_value("email_member")?>">
                        <span class="text-muted"><?php echo form_error("email_member")?></span>
                    </div>
                    <div class="mb-3">
                        <label>Kata Sandi</label>	
                        <input type="text" name="password_member" class="form-control" placeholder="Masukkan kata Sandi" value="<?php echo set_value("password_member")?>">
                        <span class="text-muted"><?php echo form_error("password_member	")?></span>
                    </div>
                    <div class="mb-3">
                        <label>Nama</label>	
                        <input type="text" name="nama_member" class="form-control" placeholder="Masukkan Nama Lengkap" value="<?php echo set_value("nama_member")?>">
                        <span class="text-muted"><?php echo form_error("nama_member")?></span>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                            <textarea class="form-control" name="alamat_member" placeholder="Masukkan Alamat Lengkap">
                                <?php echo set_value("alamat_member")?></textarea>
                            <span class="text-muted"><?php echo form_error("alamat_member")?></span>
                    </div>
                    <div class="mb-3">
                        <label>Nomor Telp</label>
                        <input type="text" name="wa_member" class="form-control" placeholder="Masukkan Nomor Telepon" value="<?php echo set_value("wa_member")?>">
                        <span class="text-muted"><?php echo form_error("wa_member")?></span>
                    </div>
                    <div class="mb-3">
                        <label>Kota/Kabupaten</label>
                        <select class="form-control form-select" name="city_id">
                            <option value="">Pilih</option>
                            <?php foreach ($distrik as $key => $value): ?>

                            <option value="<?php echo $value["city_id"]?>" 
                            <?php echo $value["city_id"]==set_value("city_id")? "selected" : ""?> >
                                <?php echo $value["type"] ?>
                                <?php echo $value["city_name"] ?>
                                <?php echo $value["province"] ?>
                            </option>
                            <?php endforeach?>
                        </select>
                        <span class="text-muted"><?php echo form_error("city_id")?></span>
                    </div>
                    <p class="small-text">Dengan ini anda menyetujui ketentuan penggunaan dan pemberitahuan privasi Tim kami!</p>
                    <button class="btn btn-primary">DAFTAR</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>