<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h4">
                        <a href="<?php echo base_url('products') ?>" class="btn btn-primary rounded-circle"><i class="fas fa-angle-left"></i></a>
                    </div>
                    <h1><?php echo $titlePage; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Table -->
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Product Description
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <span for="">Product Name</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $product->name; ?></label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <span for="">Category</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $product->category; ?></label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <span for="">Price</span>
                            </div>
                            <div class="col-md-8">
                                <label for="">Rp. <?php echo number_format($product->price); ?></label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <span for="">Desciption</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $product->description; ?></label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <span for="">Product Image</span>
                            </div>
                            <div class="col-md-8">
                                <img src="<?php echo base_url('assets/image/product/' . $product->image) ?>" width="60%" class="img-thumbnail" alt="<?php echo $product->name ?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <span for="">Product Status</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $product->record_status; ?></label>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->