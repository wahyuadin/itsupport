<?php
include "templates/header.php";
include "templates/sidebar.php";

// Ambil data inventory beserta nama karyawan dari tabel pengguna
$inventory = query("SELECT i.*, p.idkary FROM inventory i JOIN pengguna p ON i.n_pengguna = p.idkary");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inventory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Inventory</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!--- content --->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Inventory</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addinventory"><i class="fa fa-plus"></i> Add Data</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table_user" width="100%">
                        <thead align="center">
                            <th>No</th>
                            <th>ID Inventory</th>
                            <th>Pengguna</th>
                            <th>Jenis Perangkat</th>
                            <th>Lokasi</th>
                            <th>Tgl Pembelian</th>
                            <th>Keterangan</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($inventory as $row) :
                            ?>
                            <tr align="center">
                                <td><?= $no; ?></td>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['nama_pengguna']; ?></td> <!-- Nama Karyawan -->
                                <td><?= $row['j_device']; ?></td>
                                <td><?= $row['lokasi']; ?></td>
                                <td><?= $row['t_beli']; ?></td>
                                <td><?= $row['ket']; ?></td>
                                <td>
                                    <a href="#" data-toggle='modal' data-target='#editInventory<?= $row['id'] ?>' type="button" class="btn btn-light"><i class="far fa-edit"></i> Edit</a> &nbsp;
                                </td>
                                <td>
                                    <a href="form_inventory.php?delete=<?= $row['id']; ?>" type="button" onclick="return confirm('Yakin Data Dihapus?')" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                            <!-- Edit Inventory Modal -->
                            <div class="modal fade" id="editInventory<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Inventory</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="id_inventory" class="col-sm-4 col-form-label">ID Inventory</label>
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" name="id" id="id" value="<?= $row['id'] ?>" required>
                                                        <input type="text" class="form-control" name="id_inventory" id="id_inventory" value="<?= $row['id'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="n_pengguna" class="col-sm-4 col-form-label">Pengguna</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="n_pengguna" id="n_pengguna" value="<?= $row['nama_pengguna'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="j_device" class="col-sm-4 col-form-label">Jenis Perangkat</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="j_device" id="j_device" value="<?= $row['j_device'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lokasi" class="col-sm-4 col-form-label">Lokasi</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?= $row['lokasi'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="t_beli" class="col-sm-4 col-form-label">Tanggal Beli</label>
                                                    <div class="col-sm-8">
                                                        <input class="custom-select" name="t_beli" id="t_beli" value="<?= $row['t_beli'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
                                                    <div class="col-sm-8">
                                                        <select class="custom-select" name="ket" id="ket">
                                                            <option <?= $row['ket'] == "aktif" ? "selected" : "" ?> value="aktif">Aktif</option>
                                                            <option <?= $row['ket'] == "tidak aktif" ? "selected" : "" ?> value="tidak aktif">Tidak Aktif</option>
                                                            <option <?= $row['ket'] == "pindah" ? "selected" : "" ?> value="pindah">Pindah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                                <button type="submit" class="btn btn-outline-success" name="update"><i class="fa fa-save"></i>Save Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
</section>
</div>
                    <!-- Add Form Inventori dengan Ukuran Lebih Kecil -->
                    <div class="modal fade" id="addinventory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <!-- ID Barang -->
                                        <div class="form-group mb-3">
                                            <label for="id">ID Inventory</label>
                                            <input type="text" name="id" id="id" class="form-control" required>
                                        </div>
                                        <!--- Pengguna PJ --->
                                        <div class="form-group mb-3">
                                            <label for="id">Pengguna</label>
                                            <select class="custom-select" name="n_pengguna" id="n_pengguna">
                                                <option value="" disabled selected>Pilih Pengguna</option>
                                                <?php
                                                    $pengguna = query("SELECT idkary, nama FROM pengguna");
                                                        foreach ($pengguna as $p) {
                                                        echo "<option value='{$p['idkary']}'>{$p['nama']}</option>";
                                                        }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- Jenis Perangkat -->
                                        <div class="form-group mb-3">
                                            <label for="j_device">Jenis Perangkat</label>
                                            <!--- <input type="text" name="j_device" id="j_device" class="form-control" placeholder="Masukkan jenis perangkat" required> --->
                                            <select class="custom-select" name="j_device" id="j_device">
                                                <option value="" disabled selected>Pilih Jenis Perangkat</option>
                                                <option value="Laptop">Laptop</option>
                                                <option value="PC">PC</option>
                                                <option value="Router">Router</option>
                                                <option value="Printer">Printer</option>
                                                <option value="Ipad">Ipad</option>
                                                <option value="Switch">Switch</option>
                                                <option value="LAIN-LAIN">LAIN-LAIN</option>
                                            </select>
                                        </div>

                                        <!-- Lokasi -->
                                        <div class="form-group mb-3">
                                            <label for="lokasi">Lokasi</label>
                                            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Masukkan lokasi" required>
                                        </div>

                                        <!-- Tanggal Pembelian -->
                                        <div class="form-group mb-3">
                                            <label for="t_beli">Tanggal Pembelian</label>
                                            <input type="date" name="t_beli" id="t_beli" class="form-control" required>
                                        </div>

                                        <!-- Keterangan -->
                                        <div class="form-group mb-3">
                                            <label for="ket">Keterangan</label>
                                            <select class="custom-select" name="ket" id="ket">
                                            <!---<textarea name="ket" id="ket" class="form-control" rows="4" placeholder="Masukkan keterangan" required></textarea> --->
                                                <option value="" disabled selected>Pilih Keterangan</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                                <option value="Pindah">Pindah</option>
                                            </select>    
                                        </div>

                                        <!-- Tombol -->
                                        <div class="d-flex justify-content-between">
                                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>  Simpan</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<?php
include "templates/footer.php";
if (isset($_POST['submit'])) {
    if (insertInventory($_POST)) {
        echo "<script>alert('Data Berhasil Disimpan.'); window.location='form_inventory.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan.'); window.location='form_inventory.php';</script>";
    }
}
if (isset($_POST['update'])) {
    if (updateInventory($_POST)) {
        echo "<script>alert('Data Berhasil Diubah'); window.location='form_inventory.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah.'); window.location='form_inventory.php';</script>";
    }
}
if (isset($_GET['delete'])) {
    if (deleteInventory($_GET)) {
        echo "<script>alert('Data Berhasil Dihapus'); window.location='form_inventory.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus.'); window.location='form_inventory.php';</script>";
    }
}
?>