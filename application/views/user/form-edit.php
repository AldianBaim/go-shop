<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="h4">
                        <a href="<?php echo base_url('users') ?>" class="btn btn-primary rounded-circle"><i class="fas fa-angle-left"></i></a>
                    </div>
                    <h1><?php echo $titlePage; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                        <h3 class="card-title">Form Table User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?php echo base_url('users/edit/' . $user->id) ?>" method="post">
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" name="fullname" class="form-control" id="fullname" value="<?php echo $user->fullname ?>" placeholder="fullname here ..">
                                <?php echo form_error('fullname', '<small class="text-danger pl-1">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?php echo $user->email ?>" placeholder="sample@gmail.com">
                                <?php echo form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <select name="role_id" class="form-control" id="role_id">
                                    <option value="1" <?php echo ($user->role_id == 1 ? "selected" : "") ?>>Administrator</option>
                                    <option value="2" <?php echo ($user->role_id == 2 ? "selected" : "") ?>>User</option>
                                </select>
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