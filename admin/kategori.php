<?php
include "templates/header.php";
include "templates/sidebar.php";
$kategori = query("SELECT * FROM kategori");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>KATEGORI</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Master Data</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
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
                <h3 class="card-title">Data Kategori</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addkategori"><i class="fa fa-plus"></i>
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
                                <th scope="col">Kategori</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kategori as $row) :
                            ?>
                                <tr align="center">
                                    <td><?= $no; ?></td>
                                    <td><?= $row['namakategori']; ?></td>
                                    <td><a href="#" data-toggle='modal' data-target='#editkategori<?= $row['idkategori'] ?>' type="button" class="btn btn-light"><i class="far fa-edit"></i> Edit</a></td>
                                    <td><a href="kategori.php?delete=<?= $row['idkategori']; ?>" type=" button" onclick="return confirm('Yakin Data Dihapus?')" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete</a></td>
                                </tr>
                                <!-- Modal update -->
                                <div class="modal fade" id="editkategori<?= $row['idkategori'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" class="form-control" name="idkategori" id="idkategori" value="<?= $row['idkategori']; ?>" required>
                                                            <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $row['namakategori'] ?>" required>
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
                                <!-- End Modal update -->
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
<div class="modal fade" id="addkategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kategori" id="kategori" required>
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
    if (addKategori($_POST)) {
        echo "<script>alert('Data Berhasil Disimpan.'); window.location='kategori.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan.'); window.location='kategori.php';</script>";
    }
}
if (isset($_POST['ubah'])) {
    if (editKategori($_POST)) {
        echo "<script>alert('Data Berhasil Diubah.'); window.location='kategori.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah.'); window.location='kategori.php';</script>";
    }
}
if (isset($_GET['delete'])) {
    if (deleteKategori($_GET)) {
        echo "<script>alert('Data Berhasil Dihapus.'); window.location='kategori.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus.'); window.location='kategori.php';</script>";
    }
}
?>