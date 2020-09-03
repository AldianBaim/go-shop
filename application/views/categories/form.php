<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h4">
                        <a href="<?php echo base_url('categories') ?>" class="btn btn-primary rounded-circle"><i class="fas fa-angle-left"></i></a>
                    </div>
                    <h1><?php echo $titlePage; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                        <h3 class="card-title">Form Table Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo base_url('categories/form/' . $id = ($category) ? $category->id : ""); ?>" method="post">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo ($category) ? $category->name : "" ?>" placeholder="Category Name">
                                <?php echo form_error('name', '<small class="text-danger pl-1">', '</small>') ?>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-outline-info">Submit</button>
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