<?php
include "templates/header.php";
include "templates/sidebar.php";

// Fetch data for Laporan Belum Diproses
$dataBelumDiproses = mysqli_query($conn, "SELECT COUNT(id) AS jmlh_belum_diproses FROM pengaduan WHERE status = 'Sedang diajukan'");
$viewBelumDiproses = mysqli_fetch_array($dataBelumDiproses);

// Fetch data for Laporan Sedang Diproses
$dataSedangDiproses = mysqli_query($conn, "SELECT COUNT(id) AS jmlh_sedang_diproses FROM pengaduan WHERE status = 'Sedang Diproses'");
$viewSedangDiproses = mysqli_fetch_array($dataSedangDiproses);

// Fetch data for Laporan Selesai Diproses
$dataSelesaiDiproses = mysqli_query($conn, "SELECT COUNT(id) AS jmlh_selesai_diproses FROM pengaduan WHERE status = 'Selesai Diproses'");
$viewSelesaiDiproses = mysqli_fetch_array($dataSelesaiDiproses);

// Fetch data for Total Laporan
$dataTotalLaporan = mysqli_query($conn, "SELECT COUNT(id) AS jmlh_total_laporan FROM pengaduan");
$viewTotalLaporan = mysqli_fetch_array($dataTotalLaporan);

$karyawan = mysqli_query($conn, "SELECT COUNT(idkary) AS karyawan FROM pengguna");
$viewkaryawan = mysqli_fetch_array($karyawan);

$kategori = mysqli_query($conn, "SELECT COUNT(idkategori) AS kategori FROM kategori");
$viewkategori = mysqli_fetch_array($kategori);

$merk = mysqli_query($conn, "SELECT COUNT(idmerk) AS merk FROM merk");
$viewmerk = mysqli_fetch_array($merk);

$komponen = mysqli_query($conn, "SELECT COUNT(idkomponen) AS komponen FROM komponen");
$viewkomponen = mysqli_fetch_array($komponen);
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active"></li>
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
        <h3 class="card-title">Home</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>

      <div class="bg-blue-700 p-4 text-black text-center">
        <div class="flex items-center justify-center">
          <img alt="Company Logo" class="rounded-full mr-4" height="50" src="../assets/img/ptbmj.png" width="70"/>
          <div>
            <h4 class="text-xl font-semibold">
              PT. Bukit Muria Jaya
            </h4>
            <p>JL. Resinda Raya, Telukjambe Timur, Karawang, Jawa Barat</p>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             <img width="64" height="64" src="https://img.icons8.com/arcade/64/settings.png" alt="settings"/>
              <div class="info-box-content">
                <span class="info-box-text">Laporan Belum Diproses</span>
                <span class="info-box-number">
                <center><?php echo $viewBelumDiproses['jmlh_belum_diproses']; ?></center> 
      
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             <img width="64" height="64" src="https://img.icons8.com/arcade/64/settings.png" alt="settings"/>
              <div class="info-box-content">
                <span class="info-box-text">Laporan Sedang Diproses</span>
                <span class="info-box-number">
               <center><?php echo $viewSedangDiproses['jmlh_sedang_diproses']; ?></center> 
                
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             <img width="64" height="64" src="https://img.icons8.com/arcade/64/settings.png" alt="settings"/>
              <div class="info-box-content">
                <span class="info-box-text">Laporan Selesai Diproses</span>
                <span class="info-box-number">
                <center><?php echo $viewSelesaiDiproses['jmlh_selesai_diproses']; ?></center>
                
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             <img width="64" height="64" src="https://img.icons8.com/arcade/64/settings.png" alt="settings"/>
              <div class="info-box-content">
                <center><span class="info-box-text">Total Laporan</span></center>
                <span class="info-box-number">
                <center><?php echo $viewTotalLaporan['jmlh_total_laporan']; ?></center>
                
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             <img width="64" height="64" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-setting-computer-programming-icons-flaticons-lineal-color-flat-icons.png" alt="external-setting-computer-programming-icons-flaticons-lineal-color-flat-icons"/>.
              <div class="info-box-content">
                <center><span class="info-box-text">Karyawan</span></center>
                <span class="info-box-number">
                <center><?php echo $viewkaryawan['karyawan']; ?></center>
                  
                </span>
              </div>
            </div>
          </div>
          <!---<div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             <img width="64" height="64" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-setting-computer-programming-icons-flaticons-lineal-color-flat-icons.png" alt="external-setting-computer-programming-icons-flaticons-lineal-color-flat-icons"/>
              <div class="info-box-content">
                <center><span class="info-box-text">Kategori</span></center>
                <span class="info-box-number">
                <center><?php echo $viewkategori['kategori']; ?></center>
                  
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             <img width="64" height="64" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-setting-computer-programming-icons-flaticons-lineal-color-flat-icons.png" alt="external-setting-computer-programming-icons-flaticons-lineal-color-flat-icons"/>
              <div class="info-box-content">
                <center><span class="info-box-text">Merk</span></center>
                <span class="info-box-number">
                <center><?php echo $viewmerk['merk']; ?></center>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
             <img width="64" height="64" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-setting-computer-programming-icons-flaticons-lineal-color-flat-icons.png" alt="external-setting-computer-programming-icons-flaticons-lineal-color-flat-icons"/>
              <div class="info-box-content">
                <center><span class="info-box-text">Komponen</span></center>
                <span class="info-box-number">
                 <center><?php echo $viewkomponen['komponen']; ?></center> 
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>--->

  </section>
  <!-- End Main content -->
</div>

<?php
include "templates/footer.php";
?>



