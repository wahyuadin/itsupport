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
                    <h1>Add Data Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="karyawan.php">Data Karyawan</a></li>
                        <li class="breadcrumb-item active">Add Data</li>
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
                <h3 class="card-title">Add Data</h3>
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
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik" class="form-control" id="nik" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="company" class="col-sm-2 col-form-label">Company</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="company" id="company">
                                <option value="CMNP">CMNP</option>
                                <option value="CPI">CPI</option>
                                <option value="CMNPRO">CMNPRO</option>
                                <option value="GI">GI</option>
                                <option value="LAIN-LAIN">LAIN-LAIN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="divisi" class="col-sm-2 col-form-label">Divisi</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="divisi" id="divisi" required>
                                <option value="" disabled selected>Pilih Divisi</option>
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
                        <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="departemen" id="departemen">

                            </select>
                            <!-- <div id="loading" style="margin-top: 15px;">
                                <img src="../assets/img/loading.gif" width="10"> <small>Loading...</small>
                            </div> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="seksi" class="col-sm-2 col-form-label">Seksi</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="seksi" id="seksi">

                            </select>
                            <!-- <div id="loading_" style="margin-top: 15px;">
                                <img src="../assets/img/loading.gif" width="10"> <small>Loading...</small>
                            </div> -->
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="departemen" class="col-sm-2 col-form-label">Departemen</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="departemen" id="departemen">
                            <?php
                            $data = query("SELECT a.*, b.kodedivisi as dvs FROM departemen a JOIN divisi b ON a.divisi=b.id ORDER BY kodedivisi ASC");
                            foreach ($data as $d) :
                            ?>
                                    <option value="<?= $d['id'] ?>"><?= $d['dvs'] ?>-<?= $d['departemen'] ?> </option>
                                <?php
                            endforeach;
                                ?>
                            </select>
                        </div>
                    </div> -->
                    <!-- <div class="form-group row">
                        <label for="seksi" class="col-sm-2 col-form-label">Seksi</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="seksi" id="seksi">
                                <?php
                                $data = query("SELECT a.*, b.kodedivisi as dvs, c.departemen as dpt FROM seksi a JOIN divisi b ON a.divisi=b.id JOIN departemen c ON a.departemen=c.id ORDER BY kodedivisi ASC");
                                foreach ($data as $d) :
                                ?>
                                    <option value="<?= $d['id'] ?>"><?= $d['dvs'] ?>-<?= $d['dpt'] ?>-<?= $d['seksi'] ?> </option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="jabatan" id="jabatan">
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
                        <label for="statkary" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="statkary" id="statkary">
                                <option value="AKTIF">AKTIF</option>
                                <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="card-footer border-top bg-gray-dark">
                <div class="col-sm-10">
                    <button type="button" class="btn btn-outline-danger" onClick="window.location='karyawan.php'"><i class="fas fa-ban"></i> Cancel</button>
                    <button type="reset" class="btn btn-outline-warning"><i class="fas fa-undo"></i> Reset</button>
                    <button type="submit" name="simpan" class="btn btn-outline-success"><i class="fas fa-save"></i> Save</button>
                </div>
            </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<?php
// if (isset($_POST['simpan'])) {
//     if (insertkaryawan($_POST)) {
//         echo "<script>alert('Data Berhasil Disimpan.'); window.location='karyawan.php';</script>";
//     } else {
//         echo "<script>alert('Data Gagal Disimpan.'); window.location='karyawan.php';</script>";
//     }
// }
// if (isset($_POST['update'])) {
//     if (updatekaryawan($_POST)) {
//         echo "<script>alert('Data Berhasil Diubah'); window.location='karyawan.php';</script>";
//     } else {
//         echo "<script>alert('Data Gagal Diubah.'); window.location='karyawan.php';</script>";
//     }
// }
// if (isset($_GET['delete'])) {
//     if (deletekaryawan($_GET)) {
//         echo "<script>alert('Data Berhasil Dihapus'); window.location='karyawan.php';</script>";
//     } else {
//         echo "<script>alert('Data Gagal Dihapus.'); window.location='karyawan.php';</script>";
//     }
// }
include "templates/footer.php";
?>
<!-- <script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        // Kita sembunyikan dulu untuk loadingnya
        $("#loading").hide();

        $("#divisi").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#departemen").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "ajax/option_departemen.php", // Isi dengan url/path file php yang dituju
                data: {
                    divisi: $("#divisi").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya
                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#departemen").html(response.data_departemen).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        // Kita sembunyikan dulu untuk loadingnya
        $("#loading_").hide();

        $("#departemen").change(function() { // Ketika user mengganti atau memilih data provinsi
            $("#seksi").hide(); // Sembunyikan dulu combobox kota nya
            $("#loading_").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "ajax/option_seksi.php", // Isi dengan url/path file php yang dituju
                data: {
                    departemen: $("#departemen").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading_").hide(); // Sembunyikan loadingnya

                    // set isi dari combobox kota
                    // lalu munculkan kembali combobox kotanya
                    $("#seksi").html(response.data_seksi).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        // sembunyikan form kabupaten, kecamatan dan desa
        $("#departemen").hide();
        $("#seksi").hide();

        // ambil data kabupaten ketika data memilih provinsi
        $('body').on("change", "#divisi", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=departemen";
            $.ajax({
                type: 'POST',
                url: "ajax/get_unitkerja.php",
                data: data,
                success: function(hasil) {
                    $("#departemen").html(hasil);
                    $("#departemen").show();
                    $("#seksi").hide();
                }
            });
        });

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#departemen", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=seksi";
            $.ajax({
                type: 'POST',
                url: "ajax/get_unitkerja.php",
                data: data,
                success: function(hasil) {
                    $("#seksi").html(hasil);
                    $("#seksi").show();
                }
            });
        });
    });
</script>