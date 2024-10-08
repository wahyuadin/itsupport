<?php
include "templates/header.php";
include "templates/sidebar.php";

if (isset($_POST['submit'])) {
  if (updatePengaduan($_POST) > 0) {
    echo "<script>alert('Update data successfully!'); window.location='data-pengaduan.php';</script>";
  } else {
    echo "<script>alert('Data update failed or you did not make any changes!'); window.location='data-pengaduan.php';</script>";
  }
}

$id = $_GET['id'];
$data = query("SELECT * FROM pengaduan WHERE id = '$id'");
foreach ($data as $d) :

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pengaduan <?= $d['id']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Report</a></li>
              <li class="breadcrumb-item active">Bulanan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <form action="" method="POST">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-2">
                  <label for="id">Nomor Pengaduan :</label>
                  <input type="text" name="id" id="id" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['id']; ?>" readonly>
                </div>
                <div class="col-md-2">
                  <label for="tgl">Tanggal Pengaduan :</label>
                  <input type="text" name="tgl" id="tgl" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['tgl_lapor']; ?>" readonly>
                </div>
                <?php if (isset($d['tgl_proses'])) { ?>
                  <div class="col-md-2">
                    <label for="tgl">Tanggal Diproses :</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['tgl_proses']; ?>" readonly>
                  </div>
                <?php }?>
                <?php if (isset($d['tgl_selesai'])) { ?>
                  <div class="col-md-2">
                    <label for="tgl">Tanggal Selesai :</label>
                    <input type="text" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['tgl_selesai']; ?>" readonly>
                  </div>
                <?php }?>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="np">Nama Pelapor :</label>
                  <input type="text" name="np" id="np" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['n_pelapor']; ?>" readonly>
                </div>
                <div class="col-md-4">
                  <label for="jp">Jabatan :</label>
                  <input type="text" name="jp" id="jp" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['j_pelapor']; ?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="dp">Departemen :</label>
                  <input type="text" name="dp" id="dp" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['d_pelapor']; ?>" readonly>
                </div>
                <div class="col-md-12">
                  <label for="nb">Report Barang :</label>
                  <img src="../assets/img/upload/<?= $d['n_barang']; ?>" alt="barang" width="100" height="100" style="border: 1px solid black;border-radius: 2%;"readonly> 
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <label for="ket">Keterangan :</label>
                  <textarea name="ket" id="ket" class="form-control mb-3 bg-transparent" style="cursor: default;" readonly><?= $d['ket']; ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" style="border: 1px solid #ced4da; border-radius: 5px; margin: 7px 7px; padding: 7px 10px;">
                  <p><b>Status :</b></p>
                  <?php
                  if ($d['status'] == 'Sedang diajukan') {
                  ?>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Sedang diajukan" id="opt1" name="status" class="custom-control-input" checked>
                      <label class="custom-control-label" for="opt1">Sedang diajukan</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Sedang diproses" id="opt2" name="status" class="custom-control-input">
                      <label class="custom-control-label" for="opt2">Sedang diproses</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Selesai diproses" id="opt3" name="status" class="custom-control-input" disabled>
                      <label class="custom-control-label" for="opt3">Selesai diproses</label>
                    </div>
                  <?php
                  } elseif ($d['status'] == 'Sedang diproses') {
                  ?>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Sedang diajukan" id="opt1" name="status" class="custom-control-input" disabled>
                      <label class="custom-control-label" for="opt1">Sedang diajukan</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Sedang diproses" id="opt2" name="status" class="custom-control-input" checked>
                      <label class="custom-control-label" for="opt2">Sedang diproses</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Selesai diproses" id="opt3" name="status" class="custom-control-input">
                      <label class="custom-control-label" for="opt3">Selesai diproses</label>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Sedang diajukan" id="opt1" name="status" class="custom-control-input" disabled>
                      <label class="custom-control-label" for="opt1">Sedang diajukan</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Sedang diproses" id="opt2" name="status" class="custom-control-input" disabled>
                      <label class="custom-control-label" for="opt2">Sedang diproses</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="Selesai diproses" id="opt3" name="status" class="custom-control-input" checked>
                      <label class="custom-control-label" for="opt3">Selesai diproses</label>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <label for="ket_petugas">Catatan dari petugas :</label>
                  <textarea name="ket_petugas" id="ket_petugas" class="form-control mb-2"><?= $d['ket_petugas']; ?></textarea>
                </div>
              </div>
              <?php if ($d['status'] == 'Selesai diproses') {?>
                <div class="row">
                  <div class="col-md-12 mt-2">
                    <label for="ket_petugas">Data Ulasan:</label>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="table2">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1;
                            // var_dump(getUlasanByid($d['id_keur_relasi'])); die;
                            foreach (getUlasanByid($d['id_keur_relasi']) as $ulasanItem) { ?>
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $ulasanItem['nama'] ?></td>
                              <td><?= $ulasanItem['deskripsi'] ?></td>
                              <td><a href="delete-ulasan.php?id=<?= $ulasanItem['ulasan_id']; ?>&id_pengaduan=<?= $d['id']; ?>" onclick="return confirm('Yakin Data Dihapus?')" class="btn btn-sm btn-outline-danger" style="font-size: 15px; width: 80px;"><i class="fas fa-trash-alt mr-1"></i>Delete</a></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <button type="submit" value="submit" name="submit" class="btn btn-outline-success mr-2" style="width: 100px;">
                    <span class="fas fa-check mr-2"></span>
                    Save
                  </button>
                  <button type="reset" value="reset" class="btn btn-outline-danger mr-2" style="width: 100px;">
                    <span class="fas fa-times mr-2"></span>
                    Reset
                  </button>
                  <a href="#" class="btn btn-outline-primary" onclick="history.back()" style="width: 100px;">
                    <span class="fas fa-arrow-left mr-2"></span>
                    Back
                  </a>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      <?php
    endforeach;
      ?>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <?php
  include "templates/footer.php";
  ?>