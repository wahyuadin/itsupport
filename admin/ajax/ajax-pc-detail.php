<?php
include '../../function.php';

$data = $_POST['data'];
$idkategori = $_POST['kategori'] ?? "";
$idmerk = $_POST['merk'] ?? "";
$tipe = $_POST['tipe'] ?? "";
$spesifikasi = $_POST['spesifikasi'] ?? "";

?>
<?php
if ($data == "merk") {
?>

    <select id="merk">
        <option value="">Pilih Merk</option>
        <?php
        $merk = mysqli_query($conn, "SELECT a.idmerk, b.namamerk FROM komponen a JOIN merk b ON a.idmerk=b.idmerk WHERE idkategori='" . $idkategori . "' GROUP BY a.idmerk");
        ?>
        <?php
        while ($d = mysqli_fetch_array($merk)) {
        ?>
            <option value="<?= $d['idmerk']; ?>"><?= $d['namamerk']; ?></option>
        <?php
        }
        ?>
    </select>

<?php
} else if ($data == "tipe") {
?>

    <select id="tipe">
        <option value="">Tipe</option>
        <?php
        $tipe = mysqli_query($conn, "SELECT tipe FROM komponen WHERE idmerk='" . $idmerk . "' GROUP BY tipe");
        while ($d = mysqli_fetch_array($tipe)) {
        ?>
            <option value="<?= $d['tipe']; ?>"><?= $d['tipe']; ?></option>
        <?php
        }
        ?>
    </select>

<?php
} else if ($data == "spesifikasi") {
?>
    <select id="spesifikasi">
        <option value="">Spesifikasi</option>
        <?php
        $spesifikasi = mysqli_query($conn, "SELECT spesifikasi FROM komponen WHERE tipe='" . $tipe . "' ");
        while ($d = mysqli_fetch_array($spesifikasi)) {
        ?>
            <option value="<?= $d['spesifikasi']; ?>"><?= $d['spesifikasi']; ?></option>
        <?php
        }
        ?>
    </select>

<?php
} else if ($data == "keterangan") {
?>

    <?php
    $keterangan = mysqli_query($conn, "SELECT idkomponen,keterangan FROM komponen WHERE spesifikasi='" . $spesifikasi . "' ");
    $d = mysqli_fetch_array($keterangan);
    ?>

    <input type="text" class="form-control" id="keterangan" value="<?= $d['keterangan'] ?>">
    <input type="text" class="form-control" id="idkomponen" name="idkomponen[]" value="<?= $d['idkomponen'] ?>">

<?php
}
?>