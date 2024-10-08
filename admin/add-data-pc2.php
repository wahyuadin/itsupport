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
                    <div class="col-md-12">
                        <div class="card card-light">
                            <div class="card-header">
                                <h3 class="card-title">Data Komputer</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="barcode" class="col-sm-2 col-form-label">Barcode Asset</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="barcode" class="form-control" id="barcode" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namapc" class="col-sm-2 col-form-label">Computer Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namapc" class="form-control" id="namapc" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="motherboard" class="col-sm-2 col-form-label">Motherboard</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="idkategori" id="idkategori" placeholder="Kategori">
                                            <input type="text" class="form-control" name="idmerk" id="idmerk" placeholder="Merk">
                                            <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe">
                                            <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi">
                                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                            <input type="number" class="form-control text-right" name="jumlah" id="jumlah" placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div>
                                        <!-- <input type="text" id="val-button" name="val_button">
                                        <button type="button" id="button-1" onClick="populateInputHidden()" value="1"></button> -->
                                        <button type="button" class="btn btn-outline-primary" id="btn-komponen" name="btn-komponen" onClick="populateInputHidden()" value="1" data-toggle="modal" data-target="#modal-komponen" data-komponen="Motherboard">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="processor" class="col-sm-2 col-form-label">Processor</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="idkategori" id="idkategori" placeholder="Kategori">
                                            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk">
                                            <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe">
                                            <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi">
                                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                            <input type="number" class="form-control text-right" name="jumlah" id="jumlah" placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary" id="btn-komponen" name="btn-komponen" onClick="populateInputHidden()" value="2" data-toggle="modal" data-target="#modal-komponen" data-komponen="Processor">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harddisk" class="col-sm-2 col-form-label">Hard Disk</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="idkategori" id="idkategori" placeholder="Kategori">
                                            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk">
                                            <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe">
                                            <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi">
                                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                            <input type="number" class="form-control text-right" name="jumlah" id="jumlah" placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-komponen" data-komponen="Hard Disk">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="memory" class="col-sm-2 col-form-label">Memory</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="idkategori" id="idkategori" placeholder="Kategori">
                                            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk">
                                            <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe">
                                            <input type="text" class="form-control" name="spesifikasi" id="spesifikasi" placeholder="Spesifikasi">
                                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                            <input type="number" class="form-control text-right" name="jumlah" id="jumlah" placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-komponen" data-komponen="Memory">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="operatingsystem" class="col-sm-2 col-form-label">Operating System</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="operatingsystem" class="form-control" id="operatingsystem">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-komponen" data-komponen="Operating System">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="office" class="col-sm-2 col-form-label">Office</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="office" class="form-control" id="office">
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-komponen" data-komponen="Office">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-outline-success" name="simpan"><i class="fa fa-save"></i> Save Data</button>
                </div>
                <!-- </form> -->
                <!-- </div> -->
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- End Main content -->
</div>
<!-- End Content Wrapper. Contains page content -->
<!-- modal add komponen -->
<div class="modal fade" id="modal-komponen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="merk" id="merk" required>
                            <option value="" disabled selected>Pilih</option>
                            <?php
                            $idkategori = //ambil dari input text idkategori bisa gak???
                                $merk = query("SELECT a.*, b.namamerk FROM komponen a JOIN merk b ON a.idmerk=b.idmerk WHERE a.idkategori='$idkategori' GROUP BY b.namamerk");
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
                        <select class="custom-select" name="tipe" id="tipe" required>
                            <option value="" disabled selected>Pilih</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="spesifikasi" class="col-sm-4 col-form-label">Spesifikasi</label>
                    <div class="col-sm-8">
                        <select class="custom-select" name="spesifikasi" id="spesifikasi" required>
                            <option value="" disabled selected>Pilih</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" name="keterangan" id="keterangan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                    <div class="col-sm-8">
                        <input class="form-control text-right" type="number" name="jumlah" id="jumlah" min="1">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-warning">Reset</button>
                <button type="button" class="btn btn-outline-success" name="simpan"><i class="fa fa-save"></i> Save Data</button>
            </div>
        </div>
    </div>
</div>
<?php
include "templates/footer.php";
?>
<script>
    $('#modal-komponen').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('komponen') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Pilih ' + recipient)
        // modal.find('.modal-body b').text(recipient)
    })

    function populateInputHidden() {
        const buttonVal = document.querySelector('#btn-komponen').value;
        const inputHidden = document.querySelector('#idkategori');
        inputHidden.value = buttonVal;
    }
</script>

<?php
if (isset($_POST['simpan'])) {
    if (addDataPc($_POST)) {
        echo "<script>alert('Data Berhasil Disimpan.'); window.location='data-pc.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Disimpan.'); window.location='data-pc.php';</script>";
    }
}
?>