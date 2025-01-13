<div class="container">
    <h5>Data Pembelian</h5>
    <table class="table table-bordered" id="tabelku">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transaksi)): ?>
                <?php foreach ($transaksi as $key => $value): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= date('d M Y H:i', strtotime($value['tanggal_transaksi'])) ?></td>
                        <td><?= number_format($value['total_transaksi']) ?></td>
                        <td>
                            <span class="badge <?= $value['status_transaksi'] === 'Sukses' ? 'bg-success' : 'bg-warning' ?>">
                                <?= $value['status_transaksi'] ?>
                            </span>
                            <h6>Resi: <?= $value["resi_ekspedisi"] ?></h6>
                        </td>
                        <td>
                            <a href="<?= base_url("transaksi/detail/" . $value["id_transaksi"]) ?>" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Data transaksi tidak tersedia</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
