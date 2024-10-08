<?php
include "templates/header.php";
include "templates/sidebar.php";

$id_kary = isset($_GET['edit']) ? $_GET['edit'] : 0;

$data_cok = query("SELECT * FROM pengguna 
JOIN pc ON pengguna.idkary = pc.idpengguna 
JOIN divisi ON pengguna.unitkerja = divisi.id WHERE pengguna.idkary = '$id_kary' AND pc.is_delete = '0' ");
$id_pc = $data_cok[0]['idpc'];
$data_detail_komputer = query("SELECT rakitan.idrakitan,rakitan.barcode,rakitan.jumlah,komponen.idkategori='1' AS Motherboard, komponen.idkategori='2' AS Processor, komponen.idkategori='3' AS HarDisk, komponen.idkategori='4' AS Memory, komponen.tipe,komponen.spesifikasi,komponen.keterangan, komponen.stats, merk.namamerk, kategori.namakategori 
FROM rakitan 
JOIN komponen ON rakitan.idkomponen = komponen.idkomponen 
LEFT JOIN merk ON komponen.idmerk = merk.idmerk 
LEFT JOIN kategori ON komponen.idkategori = kategori.idkategori
WHERE rakitan.idpc = '$id_pc'");
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Komputer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="data-pc.php">Data Komputer</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="" method="POST" >
                <input type="hidden" name="idpc" value="<?= $id_pc ?>">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">Data User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <!-- <form> -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="idpengguna" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="idpengguna" id="select_users" required>
                                            <option value="" disabled selected>Pilih User</option>
                                            <?php
                                            $data = query("SELECT * FROM pengguna");
                                            foreach ($data as $d) :
                                            ?>
                                                <option <?php echo (!empty($data_cok) ? ($data_cok[0]['idkary'] == $d['idkary'] ? "selected" : "") : "") ?> value="<?= $d['idkary'] ?>"><?= $d['nama'] ?> </option>

                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?php echo !empty($data_cok) ? $data_cok[0]['jabatan'] : ""  ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unitkerja" class="col-sm-2 col-form-label">Unit Kerja</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="unitkerja" class="form-control" value="<?php echo !empty($data_cok) ? $data_cok[0]['unitkerja'] : ""  ?>" id="unitkerja" readonly>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="input-group col-sm-10">
                                        <input type="text" name="email" class="form-control" id="email"> -->
                                <!-- <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2"> -->
                                <!-- <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">@citra.co.id</span>
                                        </div>
                                    </div> -->
                                <!-- <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="email">
                                    </div> -->
                                <!-- </div> -->
                            </div>
                            <!-- </form> -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col left -->
                    <!-- right column -->
                    <div class="col-md-6">
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
                                        <input type="text" name="namapc" value="<?php echo !empty($data_cok) ? $data_cok[0]['namapc'] : ""  ?>" class="form-control" id="namapc" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ipaddress" class="col-sm-3 col-form-label">IP Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="ipaddress" value="<?php echo !empty($data_cok) ? $data_cok[0]['ipaddress'] : ""  ?>" class="form-control" id="ipaddress" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="internet" class="col-sm-3 col-form-label">Akses Internet</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="internet" id="internet">
                                        <option <?php echo (!empty($data_cok) ? ($data_cok[0]['internet'] == 'TIDAK' ? "selected" : "") : "") ?> value="TIDAK">TIDAK</option>
                                        <option <?php echo (!empty($data_cok) ? ($data_cok[0]['internet'] == 'YA' ? "selected" : "") : "") ?> value="YA">YA</option>

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
             
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- isi table dari script append -->
                                    <?php foreach($data_detail_komputer as $key) { 
                                        $komponen = "";
                                        if($key['Motherboard'] == 1){
                                            $komponen = "Motherboard";
                                        }
                                        else if($key['Processor'] == 1){
                                            $komponen = "Processor";
                                        }
                                        else if($key['Memory'] == 1){
                                            $komponen = "Memory";
                                        }
                                        else if($key['HarDisk'] == 1){
                                            $komponen = "HarDisk";
                                        }   
                                    ?>
                                        <tr>
                                            <td><?php echo $komponen ?></td>
                                            <td><?= $key['namamerk'] ?></td>
                                            <td><?= $key['tipe'] ?></td>
                                            <td><?= $key['spesifikasi'] ?></td>
                                            <td><?= $key['keterangan'] ?></td>
                                            <td><?= $key['barcode'] ?></td>
                                            <td><?= $key['jumlah'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Catatan</span>
                                </div>
                                <textarea name="catatan" class="form-control"><?= $data_cok[0]['catatan'] ?></textarea>
                            </div>
                            <p style="color:red; font-size:75%; font-style:italic;"><span style="color:red;">*</span>Apabila nomor barcode tidak ada maka mengikuti barcode komputer.</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-success" name="simpan"><i class="fa fa-save"></i> Save Data</button>
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

/* On Change Users */
$('#select_users').change(function(e) {
    e.preventDefault()
    let formData = {id_user: this.value}
    $.ajax({
        type: 'POST',
        url: "ajax/ajax-user.php",
        data: formData,
        success: (result) => {
            let parse = JSON.parse(result)
            $('#jabatan').val(parse.jabatan)
            $('#unitkerja').val(parse.unitkerja)
        },
        error: (err) => {
            console.log(err)
        }
    })
});

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

<?php
if (isset($_POST['simpan'])) {
    if (UpdateDataPc($_POST)) {
        echo "<script>alert('Data Berhasil Disimpan.'); window.location='data-pc.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan.'); window.location='data-pc.php';</script>";
    }
}
?>

