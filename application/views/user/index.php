<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
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
                        <h3 class="card-title">Data table User</h3>

                        <div class="card-tools">
                            <a href="<?php echo base_url('users/add') ?>" class="mr-3"><i class="fas fa-plus"></i></a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php if ($this->session->message) : ?>
                            <div><?php echo $this->session->message; ?></div>
                        <?php endif; ?>
                        <table class="table table-striped" id="example1">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Record Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?php echo $user->fullname; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td>
                                            <?php if ($user->role_id == 1) {
                                                echo "<span class='badge badge-warning'>Administrator</span>";
                                            } else {
                                                echo "<span class='badge badge-info'>User</span>";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $user->record_status; ?></td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php echo base_url('users/detail/' . $user->id) ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="<?php echo base_url('users/edit/' . $user->id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="<?php echo base_url('users/delete/' . $user->id) ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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