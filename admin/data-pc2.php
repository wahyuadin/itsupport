<?php
include "templates/header.php";
include "templates/sidebar.php";
$data = query("SELECT pengguna.nama, pengguna.idkary,pengguna.jabatan,
pengguna.statkary,divisi.divisi,pc.idpc,pc.namapc,pc.ipaddress,pc.internet,pc.catatan,rakitan.idrakitan,
rakitan.barcode,rakitan.jumlah,kategori.namakategori AS Motherboard, komponen.spesifikasi AS Processor,
komponen.hdd AS HarDisk, komponen.ram AS Memory, komponen.tipe,komponen.spesifikasi,
komponen.keterangan, komponen.stats, merk.namamerk, kategori.namakategori 
FROM pengguna 
JOIN pc ON pengguna.idkary = pc.idpengguna 
JOIN divisi ON pengguna.unitkerja = divisi.id 
LEFT JOIN rakitan ON pc.idpc = rakitan.idpc 
LEFT JOIN komponen ON rakitan.idkomponen = komponen.idkomponen 
LEFT JOIN merk ON komponen.idmerk = merk.idmerk 
LEFT JOIN kategori ON komponen.idkategori = kategori.idkategori
WHERE pc.is_delete = '0'    
");

if(isset($_GET['delete-pc']))
{
    $id_pc = $_GET['delete-pc'];
    deleteDatapc($id_pc);
    echo "<script>alert('Data Berhasil Disimpan.'); window.location='data-pc.php';</script>";
    
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Komputer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Komputer</li>
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
                <h3 class="card-title">Data Komputer</h3>
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
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table_user" width="100%">
                        <thead align="center">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">User</th>
                                <th rowspan="2">Divisi</th>
                                <th colspan="4">Hardware</th>
                                <th colspan="2">Software</th>
                            </tr>
                            <tr>
                                <th>Motherboard</th>
                                <th>Processor</th>
                                <th>Hard Disk</th>
                                <th>Memory</th>
                                <th>Operating System</th>
                                <th>Office</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($data as $key): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $key['nama'] ?></td>
                                <td><?= $key['divisi'] ?></td>
                                <td><?= $key['Motherboard'].' | '.$key['tipe']?></td>
                                <td><?= $key['Processor']?></td>
                                <td><?= $key['HarDisk']?></td>
                                <td><?= $key['Memory']?></td>
                                <td><?= $key['namamerk'] ?></td>
                                <td><?= $key['namapc'] ?></td>
                                <div class="modal fade" id="ModalDelete<?= $key['idpc'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete PC</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                           <b>Apakah Anda Yakin Menghapus Data ?<?= $key['nama'] ?></b> 
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <a class="btn btn-primary" href="?delete-pc=<?= $key['idpc'] ?>">Yakin !!!</a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </tr>
                        <?php endforeach ?>
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
<?php
include "templates/footer.php";
?>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>