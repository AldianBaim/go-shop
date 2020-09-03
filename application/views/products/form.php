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
                        <li class="breadcrumb-item active">Product</li>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Table Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo base_url('products/form/' . $id = ($product) ? $product->id : ""); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo ($product) ? $product->name : "" ?>" placeholder="Product Name">
                                <?php echo form_error('name', '<small class="text-danger pl-1">', '</small>') ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="category">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="0" disabled>Select</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?php echo $category->id ?>" <?php echo ($product) ? ($product->category == $category->name ? "selected" : "") : "" ?>><?php echo $category->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="price">Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" class="form-control" name="price" value="<?php echo ($product) ? $product->price : "" ?>">
                                    </div>
                                    <?php echo form_error('price', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-10 text-center">
                                    <label for="description">Description Product</label>
                                    <textarea name="description" id="description" class="form-control" rows="4"><?php echo ($product) ? $product->description : "" ?></textarea>
                                    <?php echo form_error('description', '<small class="text-danger pl-1">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group mt-4 row">
                                <?php if ($product) : ?>
                                    <div class="col-md-4">
                                        <img src="<?php echo base_url('assets/image/product/' . $product->image) ?>" class="img-thumbnail" alt="">
                                    </div>
                                <?php endif ?>
                                <div class="col-md-8 mt-4">
                                    <label>Image Product</label>
                                    <input type="file" class="form-control" name="image" id="preview_image">
                                </div>

                                <!-- <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="<?php echo base_url('assets/image/product/iphone-x.jpg') ?>" id="load_image" class="img-thumbnail" width="400px" alt="">
                                    </div>
                                </div> -->

                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-outline-info">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /End Table -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Set Image To Page -->
<script>
    function readImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#load_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_image").change(function() {
        readImage(this);
    });
</script>