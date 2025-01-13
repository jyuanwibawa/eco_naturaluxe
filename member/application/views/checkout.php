<div class="container">
    <h3>Pembelian</h3>

    <table class="table">
        <tbody>
        <?php $total = 0; ?>
        <?php foreach ($keranjang as $k => $per_produk): ?>
            <?php $subtotal = $per_produk['jumlah'] * $per_produk['harga_produk']?>
            <?php $total += $subtotal; ?>
                <tr>
                    <td>
                        <img src="<?php echo $this->config->item("url_produk") . $per_produk["foto_produk"] ?>" width="70"><br>
                        <?php echo $per_produk['nama_produk'] ?>
                    </td>
                    <td><?php echo number_format($per_produk['harga_produk']) ?></td>
                    <td><?php echo $per_produk['jumlah'] ?></td>
                    <td><?php echo number_format($subtotal) ?></td>
                </tr>
        <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th><?php echo number_format($total) ?></th>
            </tr>
        </tfoot>
    </table>

    <div class="row">
        <!-- Sender Details -->
        <div class="col-md-4">
            <h4>Dikirim oleh</h4>
            <span><?php echo $penjual["nama"] ?></span>
            <h6><?php echo $penjual["nama_distrik"] ?></h6>
            <span><?php echo $penjual["alamat"] ?></span>
        </div>
        
        <!-- Receiver Details -->
        <div class="col-md-4">
            <h4>Diterima oleh</h4>
            <span><?php echo $pembeli["nama_member"] ?></span>
            <h6><?php echo $pembeli["nama_distrik_member"] ?></h6>
            <span><?php echo $pembeli["alamat_member"] ?></span>
            <h6><?php echo $pembeli["wa_member"] ?></h6>
        </div>
        
        <!-- Shipping Details -->
        <div class="col-md-4">
            <h4>Pengiriman</h4>
            <form method="post">
                <select class="form-control mb-3" name="ongkir" required>
                    <option value="">Pilih</option>
                    <?php foreach ($biaya['costs'] as $key => $value): ?>
                        <option value="<?php echo $key ?>">
                            <?php echo $value['description'] ?>
                            (<?php echo number_format($value['cost'][0]['value']) ?>)
                            - <?php echo $value['cost'][0]['etd'] ?> hari
                        </option>
                    <?php endforeach ?>
                </select>
                <div class="text-muted text-danger"><?php echo form_error("ongkir") ?></div>
                <button class="btn btn-primary">Bayar Sekarang</button>
            </form>
        </div>
    </div>
</div>
