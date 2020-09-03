<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $titlePage; ?></h1>
    </div>

    <div class="row">
        <table class="table table-hover table-striped">
            <tr>
                <th>NO</th>
                <th>PRODUCT NAME</th>
                <th>ITEM TOTAL</th>
                <th>PRICE</th>
                <th>SUBTOTAL</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($this->cart->contents() as $items) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $items['name']; ?></td>
                    <td><?= $items['qty']; ?></td>
                    <td align="right">Rp. <?= number_format($items['price'], 0, ',', '.'); ?></td>
                    <td align="right">Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" align="right">TOTAL :</td>
                <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <a href="<?= base_url('home/cart_delete'); ?>" class="btn btn-sm btn-danger mr-1"> <i class="fas fa-trash"></i> Delete Cart</a>
        <a href="<?= base_url('home/checkout'); ?>" class="btn btn-sm btn-success"> <i class="fas fa-dollar"></i>Next</a>
    </div>
</div>