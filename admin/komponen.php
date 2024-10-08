<?php
include "templates/header.php";
include "templates/sidebar.php";
$komponen = query("SELECT a.*, b.namakategori,c.namamerk FROM komponen a JOIN kategori b ON a.idkategori=b.idkategori JOIN merk c ON a.idmerk=c.idmerk");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Komponen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Master Data</a></li>
                        <li class="breadcrumb-item active">Komponen</li>
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
                <h3 class="card-title">Daftar Komponen</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addkomponen"><i class="fa fa-plus"></i>
                        Add Data
                    </button>
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
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Spesifikasi</th>
                            <th>Keterangan</th>
                            <th>Hardisk</th>
                            <th>RAM</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($komponen as $row) :
                            ?>
                                <tr align="center">
                                    <td><?= $no; ?></td>
                                    <td><?= $row['namakategori']; ?></td>
                                    <td><?= $row['namamerk']; ?></td>
                                    <td><?= $row['tipe']; ?></td>
                                    <td><?= $row['spesifikasi']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td><?= $row['hdd']; ?></td>
                                    <td><?= $row['ram']; ?></td>
                                    <td><?= $row['stats']; ?></td>
                                    <td>
                                        <a href="#" data-toggle='modal' data-target='#editkomponen<?= $row['idkomponen'] ?>' type="button" class="btn btn-light"><i class="far fa-edit"></i> Edit</a> &nbsp;
                                        <a href="komponen.php?delete=<?= $row['idkomponen']; ?>" type="button" onclick="return confirm('Yakin Data Dihapus?')" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                    </td>
                                </tr>
                                <!-- Modal edit -->
                                <div class="modal fade" id="editkomponen<?= $row['idkomponen'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Komponen</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" class="form-control" name="idkomponen" id="idkomponen" value="<?= $row['idkomponen'] ?>" required>
                                                            <input type="hidden" class="form-control" name="idkategori" id="idkategori" value="<?= $row['idkategori'] ?>" required>
                                                            <select class="custom-select" name="kategori" id="kategori" required>
                                                                <?php
                                                                $sql = mysqli_query($conn, "SELECT * FROM kategori");
                                                                while ($data = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?php echo $data['idkategori']; ?>" <?php
                                                                                                                        if (($row['idkategori'] == $data['idkategori'])) {
                                                                                                                            echo 'selected = "selected"';
                                                                                                                        }
                                                                                                                        ?>>
                                                                        <?php echo $data['namakategori']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" class="form-control" name="idmerk" id="idmerk" value="<?= $row['idmerk'] ?>" required>
                                                            <select class="custom-select" name="merk" id="merk" required>
                                                                <?php
                                                                $sql = mysqli_query($conn, "SELECT * FROM merk");
                                                                while ($data = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?php echo $data['idmerk']; ?>" <?php
                                                                                                                    if (($row['idmerk'] == $data['idmerk'])) {
                                                                                                                        echo 'selected = "selected"';
                                                                                                                    }
                                                                                                                    ?>>
                                                                        <?php echo $data['namamerk']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="tipe" id="tipe" value="<?= $row['tipe'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="spesifikasi" class="col-sm-4 col-form-label">Spesifikasi</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" value="<?= $row['spesifikasi'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $row['keterangan'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="keterangan" class="col-sm-4 col-form-label">Hardisk</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="hdd" id="keterangan" value="<?= $row['hdd'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="keterangan" class="col-sm-4 col-form-label">RAM</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="ram" id="keterangan" value="<?= $row['ram'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="stats" class="col-sm-4 col-form-label">Status</label>
                                                        <div class="col-sm-8">
                                                            <select class="custom-select" name="stats" id="stats">
                                                                <option <?= $row['stats'] == "AKTIF" ? "selected" : "" ?> value="AKTIF">AKTIF</option>
                                                                <option <?= $row['stats'] == "TIDAK AKTIF" ? "selected" : "" ?> value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                                                    <button type="submit" class="btn btn-outline-success" name="ubah"><i class="fa fa-save"></i> Save Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal edit -->
                            <?php
                                $no++;
                            endforeach;
                            ?>
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
<div class="modal fade" id="addkomponen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Komponen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="kategori" id="kategori" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <?php
                                $kategori = query("SELECT * FROM kategori");
                                foreach ($kategori as $row) :
                                ?>
                                    <option value="<?= $row['idkategori'] ?>"><?= $row['namakategori'] ?> </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="merk" id="merk" required>
                                <option value="" disabled selected>Pilih Merk</option>
                                <?php
                                $merk = query("SELECT * FROM merk");
                                foreach ($merk as $row) :
                                ?>
                                    <option value="<?= $row['idmerk'] ?>"><?= $row['namamerk'] ?> </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tipe" id="tipe" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="spesifikasi" class="col-sm-4 col-form-label">Spesifikasi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Hardisk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="hdd" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">RAM</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ram" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stats" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="stats" id="stats">
                                <option value="AKTIF">AKTIF</option>
                                <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                            </select>
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
    if (addKomponen($_POST)) {
        echo "<script>alert('Data Berhasil Disimpan.'); window.location='komponen.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan.'); window.location='komponen.php';</script>";
    }
}
if (isset($_POST['ubah'])) {
    if (editKomponen($_POST)) {
        echo "<script>alert('Data Berhasil Diubah.'); window.location='komponen.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah.'); window.location='komponen.php';</script>";
    }
}
if (isset($_GET['delete'])) {
    if (deleteKomponen($_GET)) {
        echo "<script>alert('Data Berhasil Dihapus.'); window.location='komponen.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus.'); window.location='komponen.php';</script>";
    }
}
?>