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
                        <li class="breadcrumb-item active">Detail User</li>
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
                            User Description
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <span for="">Fullname</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $user->fullname; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span for="">Email</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $user->email; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span for="">User Role</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $user->role; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span for="">User Status</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo $user->record_status; ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span for="">Date Created</span>
                            </div>
                            <div class="col-md-8">
                                <label for=""><?php echo date('d F Y', strtotime($user->date_created)); ?></label>
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