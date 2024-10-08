<?php
include "templates/header.php";
include "templates/sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Pengaturan Akun</a></li>
                        <li class="breadcrumb-item active">Data Admin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengguna</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table_user" width="100%">
                        <thead align="center">
                            <th>User Id</th>
                            <th>Username</th>
                            <th width="240">Role</th>
                            <th>Photo</th>
                            <th width="100">Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $data = query("SELECT * FROM user");
                            foreach ($data as $d) :
                            ?>
                                <tr align="center">
                                    <td><?php echo $d['user_id']; ?></td>
                                    <td><?php echo $d['username']; ?></td>
                                    <td><?php echo $d['Role']; ?></td>
                                    <td><img src="../assets/img/profile/<?= $d['img']; ?>" alt="user image" width="50" height="50"></td>
                                    <?php
                                    if ($d['status'] == 1) { ?>
                                        <td><span href="#" class="badge badge-pill badge-success" style="width: 100px;">Activated</span></td>
                                    <?php } else { ?>
                                        <td><span href="#" class="badge badge-pill badge-danger" style="width: 100px;">Disactivated</span></td>
                                    <?php } ?>
                                    <td>
                                        <?php
                                        if ($d['username'] !== 'admin' and $d['username'] !== 'ADMIN') {
                                        ?>
                                            <a href="delete-acc.php?id=<?php echo $d['user_id']; ?>" class="btn btn-sm btn-outline-danger mb-2" style="width: 100px;"><span class="fas fa-trash-alt mr-2"></span>Delete</a>
                                            <?php
                                            if ($d['status'] == 0) {
                                            ?>
                                                <a href="active-acc.php?user_id=<?php echo $d['user_id']; ?>" class="btn btn-sm btn-outline-success mb-2 mr-2" style="width: 100px;"><span class="fas fa-check mr-2"></span>Active</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="nonactive-acc.php?user_id=<?php echo $d['user_id']; ?>" class="btn btn-sm btn-outline-secondary mb-2 mr-2" style="width: 100px;"><span class="fas fa-times mr-2"></span>Non-active</a>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                        <tfoot align="center">
                            <th>User Id</th>
                            <th>Username</th>
                            <th width="240">Role</th>
                            <th>Photo</th>
                            <th width="100">Status</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?php
include "templates/footer.php";
?>