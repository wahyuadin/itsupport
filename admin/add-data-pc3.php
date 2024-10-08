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
                                    <label for="kodepc" class="col-sm-2 col-form-label">Barcode Asset</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kodepc" class="form-control" id="kodepc" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namapc" class="col-sm-2 col-form-label">Computer Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namapc" class="form-control" id="namapc" required>
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

<?php
include "templates/footer.php";
?>

<?php
if (isset($_POST['simpan'])) {
    $kodepc = $_POST['kodepc'];
    $namapc = $_POST['namapc'];

    $query = "INSERT INTO komputer (kodepc, namapc) VALUES ('$kodepc', '$namapc')";
    $result = mysqli_query($conn, $query);
    $idpc = mysqli_insert_id($conn);
    if ($result) {
        echo "<script>alert('Data Komputer Berhasil Ditambahkan');</script>";
        echo "<script>location='add-detail-pc.php&idpc=" . $idpc . "';</script>";
    } else {
        echo "<script>alert('Data Komputer Gagal Ditambahkan');</script>";
        echo "<script>location='data-pc.php';</script>";
    }
    // if (addDataPc($_POST)) {
    // $query = "INSERT INTO pc (namapc) VALUES ('$namapc')";
    // $result = mysqli_query($conn, $query);
    // $idpc = mysqli_insert_id($conn);
    // return $result;

    //     echo "<script>alert('Data Berhasil Disimpan.'); window.location='add-detail-pc.php&idpc=" . $idpc . "';</script>";
    // } else {
    //     echo "<script>alert('Data Gagal Disimpan.'); window.location='add-detail-pc.php';</script>";
    // }
}
?>