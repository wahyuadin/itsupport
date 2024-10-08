<?php
include 'templates/header.php';
require 'function.php';

class KeluhanStatus
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getStatusData($keyword)
    {
        return query("SELECT * FROM pengaduan WHERE id = '$keyword'");
    }

    public function postUlasan($data) {
        return mysqli_query($this->conn ,"INSERT INTO ulasan (pengaduan_id, nama, deskripsi) VALUES ('$data[pengaduan_id]', '$data[nama]', '$data[deskripsi]')");
    }

    public function getDataUlasan($id) {
        return getUlasanByid($id);
    }

}
$keluhanStatus = new KeluhanStatus($conn);

if (isset($_POST['ulasan'])) {
    $data = [
        'pengaduan_id'  => htmlspecialchars($_POST['pengaduan_id']),
        'nama'          => htmlspecialchars($_POST['nama']),
        'deskripsi'     => htmlspecialchars($_POST['deskripsi']),
    ];
    if ($keluhanStatus->postUlasan($data)) {
        echo "<script>alert('Berhasil tambah data Ulasan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data update failed or you did not make any changes!'); window.location='index.php';</script>";
    }
}



?>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<h1 class="display-4" style="margin-top: -50px;">Status Keluhan Anda</h1>

<div data-aos="fade-right" data-aos-duration="1000" class="row">
    <div class="col">
        <?php
        $keyword = $_POST['keyword'];
        $data = $keluhanStatus->getStatusData($keyword);
        if ($data) {
            foreach ($data as $d) :
        ?>
             <div class="table-responsive">
                <table  class="table table-bordered" style="width: 600px;" >
                    <tr>
                        <th>Nomor Laporan</th>
                        <td><?= $d['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lapor</th>
                        <td><?= $d['tgl_lapor']; ?></td>
                    </tr>
                    <?php if ($d['status'] == 'Sedang diajukan') { ?>
                        <tr>
                            <th>Status</th>
                            <td><?= $d['status']; ?></td>
                        </tr>
                    <?php } elseif ($d['status'] == 'Sedang diproses') { ?>
                        <tr>
                            <th>Status</th>
                            <td><?= $d['status']; ?></td>
                        </tr>
                        <tr>
                            <th>Waktu Proses</th>
                            <td><?= $d['tgl_proses']; ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <th>Waktu Selesai</th>
                            <td><?= $d['tgl_selesai']; ?></td>
                        </tr>
                        <tr>
                            <th>Total Durasi</th>
                            <?php 
                                $date1 = new DateTime($d['tgl_lapor']);
                                $date2 = new DateTime($d['tgl_selesai']);
    
                                $interval = $date1->diff($date2);
                            ?>
                            <td><?= "$interval->d Hari, $interval->h jam, $interval->i menit, $interval->s detik"; ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th>Nama Pelapor</th>
                        <td><?= $d['n_pelapor']; ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td><?= $d['j_pelapor']; ?></td>
                    </tr>
                    <tr>
                        <th>Unit Kerja</th>
                        <td><?= $d['d_pelapor']; ?></td>
                    </tr>
                    <tr>
                        <th>Kendala</th>
                        <td><img class="data" src="../assets/img/upload/<?= $d['n_barang']; ?>" alt="barang" width="50" height="50" style="border: 1px solid black;border-radius: 2%;"></td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td><?= $d['ket']; ?></td>
                    </tr>
                    <tr>
                        <th><b><u>Catatan dari IT Helpdesk</u></b></th>
                        <td><?= $d['ket_petugas']; ?></td>
                    </tr>
                </table>
                </div>
                <br>
                <a href="index.php" class="btn btn-sm btn-primary" style="width: 80px;"><span class="fas fa-arrow-left mr-2"></span>Back</a>
                <?php if ($d['status'] == 'Selesai diproses') { ?>
                    <button type="button" class="btn btn-sm btn-warning" style="color:white" data-toggle="modal" data-target="#exampleModal"><i class="far fa-sticky-note"></i> Tambah Ulasan</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Ulasan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nomor Laporan</label>
                                    <input type="text" class="form-control" value="<?= $d['id']; ?>" placeholder="Example input placeholder" readonly>
                                    <input type="text" name="pengaduan_id" class="form-control" value="<?= $d['id_keur_relasi']; ?>" placeholder="Example input placeholder" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nama Pelapor</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $d['n_pelapor']; ?>" placeholder="Example input placeholder" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Deskripsi Ulasan</label>
                                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="5" required></textarea>
                                    <p><span class="text-danger">*</span>Wajib diisi</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="ulasan"  class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- end modal -->
                <?php } ?>
        <?php
            endforeach;
        } else {
            return '<p>Data laporan tidak ditemukan.</p>'; 
        }
        ?>
    </div>
</div>
<?php if ($data[0]['status'] == 'Selesai diproses') { ?>
    <div style="margin-top: 200px; width: 120%;">
        <h4><center>TESTIMONIAL</center></h4>
        <h2 class="mb-5"><center>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</center></h2>
       
        <?php foreach ($keluhanStatus->getDataUlasan($data[0]['id_keur_relasi']) as $ulasanItem) { ?>
        <div class="card mt-4">
            <div class="card-body" style="background-color: #e6e6e6;">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img style="margin-left: 30px;" class="img-fluid rounded-circle" src="../assets/img/upload/<?= $d['n_barang']; ?>" alt="nama_barang" width="140" height="140">
                    </div>
                    <div class="col-md-10">
                        <h5 class="card-title"><?= $ulasanItem['nama']; ?></h5>
                        <p class="card-text"><?= $ulasanItem['deskripsi']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
<?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
    });
</script>
<script>
    const scriptURL = '<https://script.google.com/macros/s/AKfycbwEmWNlm00S4Mi7eYm-44Lf2HAESV3Nn_s7nB9rsbC-edRODluWWBrkJnHbCEpvs3pONA/exec>';
    const form = document.forms['contact-me'];

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        fetch(scriptURL, { method: 'POST', body: new FormData(form) })
            .then((response) => console.log('Success!', response))
            .catch((error) => console.error('Error!', error.message));
    });
</script>
<?php
include 'templates/footer.php';
?>
