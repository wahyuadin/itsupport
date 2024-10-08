<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_helpdesk";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insertPengaduan($data)
{
    global $conn;
    date_default_timezone_set('Asia/Jakarta');
    $id = $data['id'];
    $np = htmlspecialchars($data["nama"]);
    $jp = htmlspecialchars($data["jabatan"]);
    $dp = htmlspecialchars($data["dept"]);
    $nb = htmlspecialchars($data["nama_barang"]);
    $ket = mysqli_real_escape_string($conn, $data["ket"]);
    $status = "Sedang diajukan";
    $ket_petugas = "-";
    $tgl_lapor = date('Y-m-d H:i:s', time());;

    mysqli_query($conn, "INSERT INTO pengaduan VALUES('$id', null, '$np', '$jp', '$dp', '$nb', '$ket', '$status', '$ket_petugas', '$tgl_lapor', null, null)");
    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $name = htmlspecialchars($data["Role"]);
    $nip = htmlspecialchars($data["nip"]);
    $img = "default.jpg";
    $status = "0";

    $cek = mysqli_query($conn, "SELECT username, user_id FROM user WHERE username = '$username' OR user_id = '$nip'");

    if (mysqli_fetch_assoc($cek)) {
        echo "<script>alert('Username $username or NIK $nip was already registered!');</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES('$nip', '$username', '$password', '$name', '$img', '$status')");

    return mysqli_affected_rows($conn);
}

function updatePass($data)
{
    global $conn;

    $id = $data['id'];
    $password_baru = mysqli_real_escape_string($conn, $data["password_baru"]);
    $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
    mysqli_query($conn, "UPDATE user SET password='$password_baru' WHERE user_id='$id'");

    return mysqli_affected_rows($conn);
}

function updatePengaduan($data)
{
    global $conn;

    date_default_timezone_set('Asia/Jakarta');
    $id = $data['id'];
    $status = $data['status'];
    $ket_petugas = $data['ket_petugas'];
    $timestamp = date('Y-m-d H:i:s', time());
    if ($status == 'Sedang diproses') {
        mysqli_query($conn, "UPDATE pengaduan SET status = '$status', ket_petugas='$ket_petugas', tgl_proses = '$timestamp' WHERE id='$id'");
    } elseif ($status == 'Selesai diproses') {
        mysqli_query($conn, "UPDATE pengaduan SET status = '$status', ket_petugas='$ket_petugas', tgl_selesai = '$timestamp' WHERE id='$id'");
    }

    return mysqli_affected_rows($conn);
}

function updatePhoto($data)
{
    global $conn;

    $id = $_SESSION['login']['user_id'];

    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        echo "<script>alert('Ekstensi tidak diperbolehkan atau Anda belum memilih file apapun.'); window.location='profil.php';</script>";
    } else {
        if ($ukuran < 2044070) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/img/profile/' . $rand . '_' . $filename);

            mysqli_query($conn, "UPDATE user SET img = '$xx' WHERE user_id='$id'");
        } else {
            echo "<script>alert('Size file terlalu beasr! Size yang diperbolehkan tidak melebihi 2 MB.'); window.location='profil.php';</script>";
        }
    }
    return mysqli_affected_rows($conn);
}

function deleteUser($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE user_id = '$id'");
    return mysqli_affected_rows($conn);
}

function deletePengaduan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pengaduan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}

function searchPengaduan($keyword)
{
    global $conn;
    $data = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id = '$keyword'");
    return mysqli_affected_rows($conn);
}
// Kategori
function addKategori($data)
{
    global $conn;

    $kategori = htmlspecialchars($data['kategori']);
    $query = "INSERT INTO kategori (namakategori) VALUES ('$kategori')";
    $result = mysqli_query($conn, $query);
    return $result;
}
function editKategori($data)
{
    global $conn;

    $idkategori = $data['idkategori'];
    $kategori = htmlspecialchars($data['kategori']);
    $query = "UPDATE kategori SET namakategori = '$kategori' WHERE idkategori='$idkategori'";
    $result = mysqli_query($conn, $query);
    return $result;
}
function deleteKategori($data)
{
    global $conn;

    $idkategori = $data['delete'];
    $query = "DELETE FROM kategori WHERE idkategori='$idkategori'";
    $result = mysqli_query($conn, $query);
    return $result;
}
// Merk
function addMerk($data)
{
    global $conn;

    $merk = htmlspecialchars($data['merk']);
    $query = "INSERT INTO merk (namamerk) VALUES ('$merk')";
    $result = mysqli_query($conn, $query);
    return $result;
}
function editMerk($data)
{
    global $conn;

    $idmerk = $data['idmerk'];
    $merk = htmlspecialchars($data['merk']);
    $query = "UPDATE merk SET namamerk = '$merk' WHERE idmerk='$idmerk'";
    $result = mysqli_query($conn, $query);
    return $result;
}
function deleteMerk($data)
{
    global $conn;

    $idmerk = $data['delete'];
    $query = "DELETE FROM merk WHERE idmerk='$idmerk'";
    $result = mysqli_query($conn, $query);
    return $result;
}
// Komponen
function addKomponen($data)
{
    global $conn;

    $kategori = htmlspecialchars($data['kategori']);
    $merk = htmlspecialchars($data['merk']);
    $tipe = htmlspecialchars($data['tipe']);
    $spesifikasi = htmlspecialchars($data['spesifikasi']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $ram = htmlspecialchars($data['ram']);
    $hdd = htmlspecialchars($data['hdd']);
    $stats = htmlspecialchars($data['stats']);
    $query = "INSERT INTO komponen (idkategori,idmerk,tipe,spesifikasi,keterangan,hdd,ram,stats) VALUES ('$kategori','$merk','$tipe','$spesifikasi','$keterangan','$hdd','$ram','$stats')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        die;
    }else {
        # code...
        return $result;
    }
    
}
function editKomponen($data)
{
    global $conn;

    $idkomponen = htmlspecialchars($data['idkomponen']);
    $kategori = htmlspecialchars($data['kategori']);
    $merk = htmlspecialchars($data['merk']);
    $tipe = htmlspecialchars($data['tipe']);
    $spesifikasi = htmlspecialchars($data['spesifikasi']);
    $keterangan = htmlspecialchars($data['keterangan']);
    $hdd = htmlspecialchars($data['hdd']);
    $ram = htmlspecialchars($data['ram']);
    $stats = htmlspecialchars($data['stats']);
    $query = "UPDATE komponen SET idkategori = '$kategori',idmerk = '$merk',hdd = '$hdd',ram = '$ram',tipe = '$tipe',spesifikasi = '$spesifikasi',keterangan = '$keterangan',stats = '$stats'  WHERE idkomponen='$idkomponen'";
    $result = mysqli_query($conn, $query);
    return $result;
}
function deleteKomponen($data)
{
    global $conn;

    $idkomponen = $data['delete'];
    $query = "DELETE FROM komponen WHERE idkomponen='$idkomponen'";
    $result = mysqli_query($conn, $query);
    return $result;
}
// Karyawan
function addKaryawan($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $jabatan = htmlspecialchars($data['jabatan']);
    $unitkerja = htmlspecialchars($data['unitkerja']);
    $statkary = htmlspecialchars($data['statkary']);
    $query = "INSERT INTO pengguna (nama,jabatan,unitkerja,statkary) VALUES ('$nama','$jabatan','$unitkerja','$statkary')";
    $result = mysqli_query($conn, $query);
    return $result;
}

function updateKaryawan($data)
{
    global $conn;

    $idkary = htmlspecialchars($data['idkary']);
    $nama = htmlspecialchars($data['nama']);
    $jabatan = htmlspecialchars($data['jabatan']);
    $unitkerja = htmlspecialchars($data['unitkerja']);
    $statkary = htmlspecialchars($data['statkary']);
    $query = "UPDATE pengguna SET nama = '$nama',jabatan = '$jabatan',unitkerja = '$unitkerja',statkary = '$statkary' WHERE idkary='$idkary'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function deleteKaryawan($data)
{
    global $conn;

    $idkary = $data['delete'];
    $query = "DELETE FROM pengguna WHERE idkary='$idkary'";
    $result = mysqli_query($conn, $query);
    return $result;
}

//pc
function deleteDatapc($id_pc = null)
{
    global $conn;

    if ($id_pc != null) {
        $query = "DELETE FROM pc WHERE idpc='$id_pc'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
}
{

}

function UpdateDataPc($data)
{
    global $conn;

    // Check if the key 'usrlogin' exists in the $data array
    $usrlogin = isset($data['usrlogin']) ? htmlspecialchars($data['usrlogin']) : '';

    $idpc = htmlspecialchars($data['idpc']);
    $idpengguna = htmlspecialchars($data['idpengguna']);
    $namapc = htmlspecialchars($data['namapc']);
    $ipaddress = htmlspecialchars($data['ipaddress']);
    $internet = htmlspecialchars($data['internet']);
    $catatan = htmlspecialchars($data['catatan']);

    $idkomponenArray = isset($data['idkomponen']) ? array_map('htmlspecialchars', $data['idkomponen']) : [];
    
    $barcodeArray = isset($data['barcode']) ? array_map('htmlspecialchars', $data['barcode']) : [];
    
    $jumlahArray = isset($data['jumlah']) ? array_map('htmlspecialchars', $data['jumlah']) : [];
    
    
    

    $query = "UPDATE pc SET idpengguna='$idpengguna', namapc='$namapc', usrlogin='$usrlogin', ipaddress='$ipaddress', internet='$internet', catatan='$catatan' WHERE idpc='$idpc'";
    $result = mysqli_query($conn, $query);
    $idpc = mysqli_insert_id($conn);

  for ($count = 0; $count < count($idkomponenArray); $count++) {
        $idrakitan = $idkomponenArray[$count];   
        $idkomponen = $idkomponenArray[$count];
        $barcode = $barcodeArray[$count];
        $jumlah = $jumlahArray[$count];
        $query = "UPDATE rakitan SET idpc='$idpc', idkomponen='$idkomponen', barcode='$barcode', jumlah='$jumlah' WHERE idrakitan='$idrakitan'";
        $result = mysqli_query($conn, $query);
    }

    return $result;
}

function addDataPc($data)
{
    global $conn;

    // Check if the key 'usrlogin' exists in the $data array
    $usrlogin = isset($data['usrlogin']) ? htmlspecialchars($data['usrlogin']) : '';

    $idpengguna = htmlspecialchars($data['idpengguna']);
    $namapc = htmlspecialchars($data['namapc']);
    $ipaddress = htmlspecialchars($data['ipaddress']);
    $internet = htmlspecialchars($data['internet']);
    $catatan = htmlspecialchars($data['catatan']);

    $idkomponenArray = isset($data['idkomponen']) ? array_map('htmlspecialchars', $data['idkomponen']) : [];
    
    $barcodeArray = isset($data['barcode']) ? array_map('htmlspecialchars', $data['barcode']) : [];
    
    $jumlahArray = isset($data['jumlah']) ? array_map('htmlspecialchars', $data['jumlah']) : [];
    
    
    

    $query = "INSERT INTO pc (idpengguna, namapc, usrlogin, ipaddress, internet, catatan) VALUES ('$idpengguna', '$namapc', '$usrlogin', '$ipaddress', '$internet', '$catatan')";
    $result = mysqli_query($conn, $query);
    $idpc = mysqli_insert_id($conn);
    var_dump($idpengguna);
    $query2 = "INSERT INTO master (user,divisi,motherboard,processor,hdd,ram,os,office) VALUES ('$idpengguna', '','$namapc')";

  for ($count = 0; $count < count($idkomponenArray); $count++) {
        $idkomponen = $idkomponenArray[$count];
        $barcode = $barcodeArray[$count];
        $jumlah = $jumlahArray[$count];
        $query = "INSERT INTO rakitan (idpc, idkomponen, barcode, jumlah) VALUES ('$idpc', '$idkomponen', '$barcode', '$jumlah')";
        $result = mysqli_query($conn, $query);
    }

    return $result;
}



function getIdpcByRakitanId($idrakitan)
{
    global $conn;

    $query = "SELECT idpc FROM rakitan WHERE idrakitan = '$idrakitan'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['idpc'];
    } else {
        return null;
    }
}


function getUlasanByid($id) {
    global $conn;

    $data = mysqli_query($conn, "SELECT pengaduan.id_keur_relasi AS pengaduan_id, ulasan.id AS ulasan_id, pengaduan.*, ulasan.* FROM pengaduan
    INNER JOIN ulasan ON ulasan.pengaduan_id = pengaduan.id_keur_relasi
    WHERE pengaduan.id_keur_relasi = '$id' ORDER BY pengaduan.id_keur_relasi DESC");
    $rows = [];
    while ($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }
    return $rows;
}

function deleteUlasan($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM ulasan WHERE id = '$id'");
    return mysqli_affected_rows($conn);
}


