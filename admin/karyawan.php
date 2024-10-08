<?php
include "templates/header.php";
include "templates/sidebar.php";
$karyawan = query("SELECT a.*, b.divisi FROM pengguna a JOIN divisi b ON a.unitkerja = b.id");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Karyawan</li>
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
                <h3 class="card-title">Data Karyawan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addkaryawan"><i class="fa fa-plus"></i>
                        Add Data
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table_user" width="100%">
                        <thead align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($karyawan as $row) :
                            ?>
                                <tr align="center">
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['jabatan']; ?></td>
                                    <td><?= $row['divisi']; ?></td>
                                    <td><?= $row['statkary']; ?></td>
                                    <td>
                                        <a href="#" data-toggle='modal' data-target='#editkaryawan<?= $row['idkary'] ?>' type="button" class="btn btn-light"><i class="far fa-edit"></i> Edit</a> &nbsp;
                                    </td>
                                    <td>
                                        <a href="karyawan.php?delete=<?= $row['idkary']; ?>" type="button" onclick="return confirm('Yakin Data Dihapus?')" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editkaryawan<?= $row['idkary'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                        <div class="col-sm-8">
                                                            <input type="hidden" class="form-control" name="idkary" id="idkary" value="<?= $row['idkary'] ?>" required>
                                                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $row['nama'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                                        <div class="col-sm-8">
                                                            <select class="custom-select" name="jabatan" id="jabatan">
                                                                <option <?= $row['jabatan'] == "KARYAWAN" ? "selected" : "" ?> value="KARYAWAN">KARYAWAN</option>
                                                                <option <?= $row['jabatan'] == "STAFF" ? "selected" : "" ?> value="STAFF">STAFF</option>
                                                                <option <?= $row['jabatan'] == "SENIOR OFFICER" ? "selected" : "" ?> value="SENIOR OFFICER">SENIOR OFFICER</option>
                                                                <option <?= $row['jabatan'] == "ASSISTEN MANAGER" ? "selected" : "" ?> value="ASSISTEN MANAGER">ASSISTEN MANAGER</option>
                                                                <option <?= $row['jabatan'] == "MANAGER" ? "selected" : "" ?> value="MANAGER">MANAGER</option>
                                                                <option <?= $row['jabatan'] == "DIREKSI-KOMISARIS" ? "selected" : "" ?> value="DIREKSI-KOMISARIS">DIREKSI-KOMISARIS</option>
                                                                <option <?= $row['jabatan'] == "LAIN-LAIN" ? "selected" : "" ?> value="LAIN-LAIN">LAIN-LAIN</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="unitkerja" class="col-sm-4 col-form-label">Unit Kerja</label>
                                                        <div class="col-sm-8">
                                                            <select class="custom-select" name="unitkerja" id="unitkerja">
                                                                <?php
                                                                $sql = mysqli_query($conn, "SELECT * FROM divisi ORDER BY divisi ASC");
                                                                while ($data = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?php echo $data['id']; ?>" <?php
                                                                                if (($row['unitkerja'] == $data['id'])) {
                                                                                    echo 'selected = "selected"';
                                                                                }
                                                                                ?>>
                                                                        <?php echo $data['divisi']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="statkary" class="col-sm-4 col-form-label">Status</label>
                                                        <div class="col-sm-8">
                                                            <select class="custom-select" name="statkary" id="statkary">
                                                                <option <?= $row['statkary'] == "AKTIF" ? "selected" : "" ?> value="AKTIF">AKTIF</option>
                                                                <option <?= $row['statkary'] == "TIDAK AKTIF" ? "selected" : "" ?> value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                                                    <button type="submit" class="btn btn-outline-success" name="update"><i class="fa fa-save"></i> Save Data</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
<div class="modal fade" id="addkaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="jabatan" id="jabatan">
                                <option value="KARYAWAN">KARYAWAN</option>
                                <option value="STAFF">STAFF</option>
                                <option value="SENIOR OFFICER">SENIOR OFFICER</option>
                                <option value="ASSISTEN MANAGER">ASSISTEN MANAGER</option>
                                <option value="MANAGER">MANAGER</option>
                                <option value="DIREKSI-KOMISARIS">DIREKSI-KOMISARIS</option>
                                <option value="LAIN-LAIN">LAIN-LAIN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unitkerja" class="col-sm-4 col-form-label">Departemen</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="unitkerja" id="unitkerja" required>
                                <option value="" disabled selected>Pilih Departemen</option>
                                <?php
                                $data = query("SELECT * FROM divisi ORDER BY divisi ASC");
                                foreach ($data as $d) :
                                ?>
                                    <option value="<?= $d['id'] ?>"><?= $d['divisi'] ?> </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="statkary" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="statkary" id="statkary">
                                <option value="AKTIF">AKTIF</option>
                                <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                <option value="PINDAH">PINDAH</option>
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
<?php
include "templates/footer.php";
if (isset($_POST['simpan'])) {
    if (addKaryawan($_POST)) {
        echo "<script>alert('Data Berhasil Disimpan.'); window.location='karyawan.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan.'); window.location='karyawan.php';</script>";
    }
}
if (isset($_POST['update'])) {
    if (updateKaryawan($_POST)) {
        echo "<script>alert('Data Berhasil Diubah'); window.location='karyawan.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah.'); window.location='karyawan.php';</script>";
    }
}
if (isset($_GET['delete'])) {
    if (deleteKaryawan($_GET)) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location='karyawan.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus.'); window.location='karyawan.php';</script>";
    }
}
?>