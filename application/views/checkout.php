<!-- Begin Page Content -->
<div class="container-fluid mx-4 my-3">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $titlePage; ?></h1>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="btn btn-success d-block">
                <label for="">Total your cart : Rp. <?= $cart; ?> </label>
            </div>
            <?php if ($cart != 'No item yet') : ?>
                <form action="<?= base_url('home/checkout') ?>" method="post">
                    <div class="form-group mt-3 text-center">
                        <label class="text-bolder">Form input address and payment method</label>
                    </div>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" name="fullname" id="fullname">
                        <?= form_error('fullname', '<small class="text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address">
                        <?= form_error('address', '<small class="text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Delivery Service</label>
                        <select name="delivery_service" class="form-control">
                            <option value="0" selected disabled>Select</option>
                            <option value="JNE">JNE</option>
                            <option value="TIKI">TIKI</option>
                            <option value="J&T">J&T</option>
                            <option value="GOJEK">GOJEK</option>
                            <option value="GRAB">GRAB</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Payment Method</label>
                        <select name="payment_method" class="form-control">
                            <option value="0" selected disabled>Select</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="MANDIRI">MANDIRI</option>
                        </select>
                    </div>
                    <div class="form-group mb-5 text-right">
                        <button type="button" class="btn btn-outline-success mt-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-dollar-sign"></i> Buy Now</button>
                    </div>

                    <!-- Modal Payment Method-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">CHECKOUT</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Payment Total</label>
                                        <input type="text" class="form-control" value="Rp. <?php echo $cart ?>" disabled>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            <?php endif; ?>
        </div>
    </div>
</div>