<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #E7EDEB; /* Warna latar belakang */
        }
        .header {
            color: #214032;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        #grafik-member-distrik {
            width: 100%;
            height: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-leaf"></i> Admin Eco NaturaLuxe</h1>
        <p>Selamat datang di dashboard Admin</p>
    </div>

    <div class="container">
        <!-- Bagian Informasi Tambahan -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <h5 class="card-title text-center">Informasi Terbaru</h5>
                    <h6 class="card-title text-center">Selamat datang di Eco NaturaLuxe. 
                        Di sini Anda dapat mengelola member, transaksi, dan produk yang terdaftar.</h6>
                </div>
            </div>
        </div>

        <!-- Bagian Grafik Member Berdasarkan Distrik -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <h5 class="card-title text-center">Jumlah Penjualan Berdasarkan Kota</h5>
                    <div id="grafik-member-distrik"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        Highcharts.chart('grafik-member-distrik', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Jumlah Penjualan Berdasarkan Kota'
            },
            tooltip: {
                valueSuffix: 'orang'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [
                {
                    name: 'Jumlah',
                    colorByPoint: true,
                    data: [
                        <?php foreach ($jumlah_member_distrik as $key => $value): ?> {
                            name: '<?php echo $value['nama_distrik_member']?>',
                            y: <?php echo $value['jumlah'] ?>
                        },
                        <?php endforeach ?>
                    ]
                }
            ]
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
