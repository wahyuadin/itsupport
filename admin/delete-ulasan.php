<?php
require '../function.php';

$id = $_GET['id'];
$id_pengaduan = $_GET['id_pengaduan'];

if (deleteUlasan($id) > 0) {
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'detail-pengaduan.php?id=$id_pengaduan';
        </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus');
            document.location.href = 'detail-pengaduan.php?id=$id_pengaduan';
        </script>";
}
?>