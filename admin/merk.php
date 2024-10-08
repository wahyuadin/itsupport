<?php
include "templates/header.php";
include "templates/sidebar.php";
$merk = query("SELECT * FROM merk");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MERK</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Master Data</a></li>
                        <li class="breadcrumb-item active">Merk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card col-sm-9 mx-auto">
            <div class="card-header">
                <h3 class="card-title">Data Merk</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addmerk"><i class="fa fa-plus"></i>
                        Add Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="card-tools">
                    <table class="table table-hover">
                        <thead>
                            <tr align="center">
                                <th scope="col">No</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($merk as $row) :
                            ?>
                                <tr align="center">
                                    <td><?= $no; ?></td>
                                    <td><?= $row['namamerk']; ?></td>
                                    <td><a href="#" data-toggle='modal' data-target='#editmerk<?= $row['idmerk'] ?>' type="button" class="btn btn-light"><i class="far fa-edit"></i> Edit</a></td>
                                    <td><a href="merk.php?delete=<?= $row['idmerk']; ?>" type="button" onclick="return confirm('Yakin Data Dihapus?')" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete</a></td>
                                </tr>
                                <!-- Modal Update -->
                                <div class="modal fade" id="editmerk<?= $row['idmerk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Merk</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" class="form-control" name="idmerk" id="idmerk" value="<?= $row['idmerk']; ?>" required>
                                                            <input type="text" class="form-control" name="merk" id="merk" value="<?= $row['namamerk']; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                                                    <button type="submit" class="btn btn-outline-success" name="ubah"><i class="fa fa-save"></i> Update Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Update -->
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- Modal add -->
<div class="modal fade" id="addmerk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Merk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="merk" id="merk" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                    <button type="submit" class="btn btn-outline-success" name="simpan"><i class="fa fa-save"></i> Save Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal add -->
<?php
include "templates/footer.php";
if (isset($_POST['simpan'])) {
    if (addMerk($_POST)) {
        echo "<script>alert('Data Berhasil Disimpan.'); window.location='merk.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan.'); window.location='merk.php';</script>";
    }
}
if (isset($_POST['ubah'])) {
    if (editMerk($_POST)) {
        echo "<script>alert('Data Berhasil Diubah.'); window.location='merk.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah.'); window.location='merk.php';</script>";
    }
}
if (isset($_GET['delete'])) {
    if (deleteMerk($_GET)) {
        echo "<script>alert('Data Berhasil Dihapus.'); window.location='merk.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus.'); window.location='merk.php';</script>";
    }
}
?>