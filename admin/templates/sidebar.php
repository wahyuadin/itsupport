<?php
//session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../auth/login.php");
    exit(); // Use exit() after header to stop further execution
}

// Include function.php only if it's not already included
if (!function_exists('query')) {
    include '../function.php';
}

$id = $_SESSION["login"]["user_id"];
// Die(); // Commented out, as this will prevent the code below from executing
$data = query("SELECT * FROM user WHERE user_id = '$id'")[0];
$role = isset($_SESSION["login"]["role"]) ? $_SESSION["login"]["role"] : '';

// Perform the query only if the "role" index is defined
if (empty($role)) {
    $role = query("SELECT Role FROM user WHERE user_id = '$id'")[0];
} else {
    // Handle the case where "role" index is not set, e.g., set a default value
    $role = 'default_role'; // You can change this to an appropriate default value
}

?>
   <!-- Sidebar Menu -->

   <?php if ($role['Role'] == 'Administrator') {?>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-folder"></i>
                    <p>
                        Master Data
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <!---<li class="nav-item">
                        <a href="kategori.php" class="nav-link">
                            <i class="far fa-folder nav-icon"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="merk.php" class="nav-link">
                            <i class="fas fa-folder-open nav-icon"></i>
                            <p>Merk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="komponen.php" class="nav-link">
                            <i class="far fa-folder-open nav-icon"></i>
                            <p>Komponen</p>
                        </a>
                    </li> --->
                    <li class="nav-item">
                        <a href="karyawan.php" class="nav-link">
                            <i class="fas fa-user-tie nav-icon"></i>
                            <p>Karyawan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!---<li class="nav-item">
                <a href="data-pc.php" class="nav-link">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>
                        Data Komputer
                    </p>
                </a>
            </li>--->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>
                        Inventory
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="form_inventory.php" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Data Inventory</p>
                        </a>
                    </li>
                </ul>       
            </li>            
            <li class="nav-item">
                <a href="data-pengaduan.php" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Data Pengaduan
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="filter.php" class="nav-link">
                    <i class="nav-icon fas fa-search"></i>
                    <p>
                        Filter Report
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Data Admin
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="data-admin.php" class="nav-link">
                            <i class="far fa-id-card nav-icon"></i>
                            <p>Data Akun</p>
                        </a>
                    </li>
                   
                </ul>
            </li>
        </ul>
    </nav>



    <?php } else { ?>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
                <!---<li class="nav-item">
                    <a href="data-pc2.php" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p>
                            Data Komputer
                        </p>
                    </a>
                </li> --->
                <li class="nav-item">
                    <a href="form-pengaduan2.php" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Form Report
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="filter.php" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Filter Report
                        </p>
                    </a>
                </li> 
            </ul>
        </nav>



 


    <?php } ?>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>