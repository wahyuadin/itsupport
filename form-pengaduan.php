<?php
include 'templates/header.php';
require 'function.php';

class PengaduanForm
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function generateId()
    {
        $query = mysqli_query($this->conn, "SELECT max(id) as kodeTerbesar FROM pengaduan");
        $r = mysqli_fetch_array($query);
        if (isset($r)) {
            $kodeBarang = $r['kodeTerbesar'];
        } else {
            $kodeBarang = 1;
        }

        $urutan = ($kodeBarang > 0) ? (int) substr($kodeBarang, 5, 5) : 0;
        $urutan++;
        $huruf = "SNMC-";
        $kodeBarang = $huruf . sprintf("%04s", $urutan);
        return $kodeBarang;
    }

    public function getDivisiData()
    {
        return query("SELECT * FROM divisi ORDER BY divisi ASC");
    }

    public function insertPengaduan($postData)
    {
        return insertPengaduan($postData);
    }
}

$pengaduanForm = new PengaduanForm($conn);

if (isset($_POST['submit'])) {
    if ($pengaduanForm->insertPengaduan($_POST) > 0) {
        echo "<script>alert('Data laporan Anda berhasil terkirim.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data laporan Anda gagal terkirim.'); window.location='form-pengaduan.php';</script>";
    }
}

$kodeBarang = $pengaduanForm->generateId();
$divisiData = $pengaduanForm->getDivisiData();
?>
<h1 style="margin-top: -40px;">Form Pengaduan</h1>
<form action="" method="POST">
    <div class="form-row p-3">
        <div class="form-group">
            <label for="id">Nomor Laporan</label>
            <input type="text" name="id" id="id" class="form-control" value="<?= $kodeBarang; ?>" style="cursor: default;" readonly>
            <p style="color:red; font-size:75%; font-style:italic;"><span style="color:red;">*</span>Harap catat nomor ini untuk melakukan pengecekan mandiri melalui kolom pencarian.</p>
            <div>
                <div class="form-group">
                    <label for="nama">Nama Pelapor</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                    <div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <!-- <input type="text" name="jabatan" id="jabatan" class="form-control" required> -->
                            <select class="custom-select" name="jabatan" id="jabatan">
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="KARYAWAN">KARYAWAN</option>
                                <option value="STAFF">STAFF</option>
                                <option value="SENIOR OFFICER">SENIOR OFFICER</option>
                                <option value="ASSISTEN MANAGER">ASSISTEN MANAGER</option>
                                <option value="MANAGER">MANAGER</option>
                                <option value="DIREKSI-KOMISARIS">DIREKSI-KOMISARIS</option>
                                <option value="LAIN-LAIN">LAIN-LAIN</option>
                            </select>
                            <div>
                                <div class="form-group">
                                    <label for="dept">Departemen</label>
                                    <!-- <input type="text" name="dept" id="dept" class="form-control" required> -->
                                    <select class="custom-select" name="dept" id="dept">
                                        <option value="" disabled selected>Pilih Departemen</option>
                                        <?php
                                        $data = query("SELECT * FROM divisi ORDER BY divisi ASC");
                                        foreach ($data as $d) :
                                        ?>
                                            <option value="<?= $d['divisi'] ?>"><?= $d['divisi'] ?> </option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <div>
                                        <div class="form-group">
                                            <label for="nama_barang">Kendala</label>
                                            <div class="custom-file">
                                                <input type="file" name="nama_barang" class="custom-file-input" id="nama_barang" style="cursor: pointer;">
                                                <label class="custom-file-label" for="foto">Pilih foto...</label>
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <label for="ket">Keterangan</label>
                                                    <textarea name="ket" id="ket" class="form-control" required></textarea>
                                                    <div>
                                                        <button class="btn btn-outline-success mt-3 mr-3" type="submit" name="submit" style="width: 100px;"><span class="fas fa-check mr-2"></span>Kirim</button>
                                                        <button class="btn btn-outline-danger mt-3" type="reset" name="reset" style="width: 130px;"><span class="fas fa-undo mr-2"></span>Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include 'templates/footer.php';
?>