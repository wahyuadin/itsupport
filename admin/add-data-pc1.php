<?php
include "templates/header.php";
include "templates/sidebar.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Data Komputer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="data-pc.php">Data Komputer</a></li>
                        <li class="breadcrumb-item active">Add Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="" method="POST">
                <div class="row">
                    <!-- right column -->
                    <div class="col-md-12">
                        <!-- Horizontal Form -->
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">Data Komputer</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <!-- <form> -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="namapc" class="col-sm-3 col-form-label">Computer Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="namapc" class="form-control" id="namapc">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="usrlogin" class="col-sm-3 col-form-label">User Login</label>
                                    <div class="input-group col-sm-9">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">citra\</span>
                                        </div>
                                        <!-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> -->
                                        <input type="text" name="usrlogin" class="form-control" id="usrlogin">
                                    </div>
                                    <!-- <div class="col-sm-9">
                                        <input type="text" name="usrlogin" class="form-control" id="usrlogin">
                                    </div> -->
                                </div>
                                <div class="form-group row">
                                    <label for="ipaddress" class="col-sm-3 col-form-label">IP Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="ipaddress" class="form-control" id="ipaddress">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="internet" class="col-sm-3 col-form-label">Akses Internet</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="internet" id="internet">
                                            <option value="TIDAK">TIDAK</option>
                                            <option value="YA">YA</option>
                                        </select>
                                        <!-- <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" aria-label="Checkbox for following text input">
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="internet" class="col-sm-3 col-form-label">User</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="internet" id="internet">
                                            <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM pengguna");
                                            while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                <option value="<?php echo $data['id']; ?>">
                                                    <?php echo $data['nama']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                            <!-- </form> -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col right -->
                </div>
                <!-- /.row -->
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Data Detail Komputer</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- <form> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="item_table">
                                <thead align="center">
                                    <tr>
                                        <th>Komponen</th>
                                        <th>Merk</th>
                                        <th>Tipe</th>
                                        <th>Spesifikasi</th>
                                        <th>Keterangan</th>
                                        <th>Barcode</th>
                                        <th>Jumlah</th>
                                        <!-- <th>Komponen</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- isi table dari script append -->
                                </tbody>
                            </table>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Catatan</span>
                                </div>
                                <textarea name="catatan" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success" name="simpan"><i class="fa fa-save"></i> Save Data</button>
                        <button type="button" id="add" name="add" class="btn btn-outline-primary add"><i class="fa fa-plus"></i> Add Data</button>
                    </div>
                    <!-- </form> -->
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- End Main content -->
</div>
<?php
include "templates/footer.php";
?>
<script>
    $(document).ready(function() {
        var count = 0;

        $(document).on('click', '.add', function() {
            count++;
            var html = '';
            html += '<tr>';
            html += '<td><select class="custom-select kategori" name="kategori[]"  id="kategori' + count + '">';
            html += '<option value="" disabled selected>Pilih Kategori</option>';
            <?php
            $data = query("SELECT a.idkategori, b.namakategori FROM komponen a JOIN kategori b ON a.idkategori=b.idkategori GROUP BY b.namakategori ORDER BY b.idkategori ASC");
            foreach ($data as $d) :
            ?>
                html += '<option value="<?= $d['idkategori'] ?>"><?= $d['namakategori'] ?></option>';
            <?php
            endforeach;
            ?>
            html += '</select></td>';
            html += '<td><select name="merk[]" class="form-control merk" id="merk' + count + '"><option value="">Pilih Merk</option></select></td>';
            html += '<td><select class="custom-select tipe" name="tipe[]" id="tipe' + count + '"><option value="" disabled selected>Tipe</option></select></td>';
            html += '<td><select class="custom-select spesifikasi" name="spesifikasi[]" id="spesifikasi' + count + '"><option value="" disabled selected>Spesifikasi</option></select></td>';
            // html += '<td><select class="custom-select keterangan" name="keterangan[]" id="keterangan' + count + '"><option value="" disabled selected>Keterangan</option></select></td>';
            html += '<td id="keterangan' + count + '"></td>';
            // html += '<td><input type="text" name="keterangan[]" class="form-control" id="keterangan' + count + '" placeholder="Keterangan"></td>';
            html += '<td><input type="text" name="barcode[]" class="form-control" id="barcode' + count + '" placeholder="Barcode"></td>';
            html += '<td><input type="number" name="jumlah[]" class="form-control text-right" id="jumlah' + count + '" placeholder="1" min="1"></td>';
            // html += '<td><input type="text" name="komponen[]" class="form-control" id="komponen' + count + '"></td>';
            html += '<td align="center"><button type="button" name="remove" id=remove' + count + ' class="btn btn-sm btn-outline-danger remove"><i class="far fa-trash-alt"></i> Delete</button></td>';
            html += '</tr>';
            $('tbody').append(html);
        });

        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
        });

        $(document).on("change", ".kategori", function() {
            var id = $(this).val();
            var data = "kategori=" + id + "&data=merk";
            $.ajax({
                type: 'POST',
                url: "ajax/ajax-pc-detail.php",
                data: data,
                success: function(hasil) {
                    $("#merk" + count).html(hasil);
                    $("#merk" + count).show();
                }
            });
        });
        $(document).on("change", ".merk", function() {
            var id = $(this).val();
            var data = "merk=" + id + "&data=tipe";
            $.ajax({
                type: 'POST',
                url: "ajax/ajax-pc-detail.php",
                data: data,
                success: function(hasil) {
                    $("#tipe" + count).html(hasil);
                    $("#tipe" + count).show();
                }
            });
        });
        $(document).on("change", ".tipe", function() {
            var id = $(this).val();
            var data = "tipe=" + id + "&data=spesifikasi";
            $.ajax({
                type: 'POST',
                url: "ajax/ajax-pc-detail.php",
                data: data,
                success: function(hasil) {
                    $("#spesifikasi" + count).html(hasil);
                    $("#spesifikasi" + count).show();
                }
            });
        });
        $(document).on("change", ".spesifikasi", function() {
            var id = $(this).val();
            var data = "spesifikasi=" + id + "&data=keterangan";
            $.ajax({
                type: 'POST',
                url: "ajax/ajax-pc-detail.php",
                data: data,
                success: function(hasil) {
                    $("#keterangan" + count).html(hasil);
                    // console.log(hasil)
                    // $("#keterangan" + count).show();
                }
            });
        });
    });
</script>
<!-- <script>
    $(document).ready(function() {
        var count = 0;
        $(document).on('click', '.add', function() {
            count++;
            var html = '';
            html += '<tr>';
            html += '<td><select class="custom-select komponen" name="idkomponen[]"  id="komponen' + count + '">';
            html += '<option value="" disabled selected>Pilih Komponen</option>';
            <?php
            $data = query("SELECT a.*, b.namakategori, c.namamerk FROM komponen a JOIN kategori b ON a.idkategori=b.idkategori JOIN merk c ON a.idmerk=c.idmerk ORDER BY b.namakategori, c.namamerk ASC");
            foreach ($data as $d) :
            ?>
                html += '<option value="<?= $d['idkomponen'] ?>"><?= $d['idkomponen'] ?>||<?= $d['namakategori'] ?>||<?= $d['namamerk'] ?>||<?= $d['tipe'] ?>||<?= $d['spesifikasi'] ?> </option>';
            <?php
            endforeach;
            ?>
            html += '</select></td>';
            html += '<td><input type="text" name="barcode[]" class="form-control" id="barcode' + count + '" placeholder="Barcode"></td>';
            html += '<td><input type="number" name="jumlah[]" class="form-control text-right" id="jumlah' + count + '" placeholder="1" min="1"></td>';
            html += '<td align="center"><button type="button" name="remove" id=remove' + count + ' class="btn btn-sm btn-outline-danger remove"><i class="far fa-trash-alt"></i> Delete</button></td>';
            html += '</tr>';
            $('tbody').append(html);
        });

        $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
        });

        // $(document).on("change", ".kategori", function() {
        //     var id = $(this).val();
        //     var data = "kategori=" + id + "&data=merk";
        //     $.ajax({
        //         type: 'POST',
        //         url: "ajax/ajax-pc-detail.php",
        //         data: data,
        //         success: function(hasil) {
        //             $("#merk" + count).html(hasil);
        //             $("#merk" + count).show();
        //         }
        //     });
        // });
        // $(document).on("change", ".merk", function() {
        //     var id = $(this).val();
        //     var data = "merk=" + id + "&data=tipe";
        //     $.ajax({
        //         type: 'POST',
        //         url: "ajax/ajax-pc-detail.php",
        //         data: data,
        //         success: function(hasil) {
        //             $("#tipe" + count).html(hasil);
        //             $("#tipe" + count).show();
        //         }
        //     });
        // });
        // $(document).on("change", ".tipe", function() {
        //     var id = $(this).val();
        //     var data = "tipe=" + id + "&data=spesifikasi";
        //     $.ajax({
        //         type: 'POST',
        //         url: "ajax/ajax-pc-detail.php",
        //         data: data,
        //         success: function(hasil) {
        //             $("#spesifikasi" + count).html(hasil);
        //             $("#spesifikasi" + count).show();
        //         }
        //     });
        // });
        // $(document).on("change", ".spesifikasi", function() {
        //     var id = $(this).val();
        //     var data = "spesifikasi=" + id + "&data=keterangan";
        //     $.ajax({
        //         type: 'POST',
        //         url: "ajax/ajax-pc-detail.php",
        //         data: data,
        //         success: function(hasil) {
        //             $("#keterangan" + count).val(hasil);
        //             // $("#keterangan" + count).show();
        //         }
        //     });
        // });
    });
</script> -->
<?php
if (isset($_POST['simpan'])) {
    if (addDataPc($_POST)) {
        echo "<script>alert('Data Berhasil Disimpan.'); window.location='data-pc.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan.'); window.location='data-pc.php';</script>";
    }
}
?>