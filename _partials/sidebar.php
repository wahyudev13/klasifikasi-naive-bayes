<!--?php  
//Membuat batasan waktu sesion untuk user di PHP 
$timeout = 1; // Set timeout menit
$timeout = $timeout * 600; // Ubah menit ke detik
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        header("location:login.php");
    }
}
$_SESSION['start_time'] = time();
?-->
<?php

if(!isset($_SESSION['akses'])){
  header("location:login.php");
}
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="img/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">SISTEM KLASIFIKASI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><b><?php echo $_SESSION['nama']?></b> </a>
                <p style="color:#ced2d6"><?php
          if ($_SESSION['akses'] == 'admin'){
            echo"Administrator";
          }else {
            echo "Seksi Kesejahteraan";
          }
          ?></p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="index.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!--li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Surat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="list_memo_masuk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="list_memo_keluar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
            </ul>
          </li-->


                <li class="nav-header">Data Uji</li>

                <li class="nav-item">
                    <a href="listuji.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Calon Penerima (Uji)
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="hasilakhir.php" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Hasil Akhir
                        </p>
                    </a>
                </li>
                <?php if ($_SESSION['akses']=='admin') : ?>
                <li class="nav-header">Data Training</li>

                <li class="nav-item">
                    <a href="listPenduduk.php" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Training
                        </p>
                    </a>
                </li>
                <?php endif ?>
                <li class="nav-header">Proses</li>
                <?php if ($_SESSION['akses']=='admin') : ?>
                <li class="nav-item">
                    <a href="probabilitas.php" class="nav-link">
                        <i class="nav-icon fas fa-balance-scale-left"></i>
                        <p>
                            Probabilitas Data Training
                        </p>
                    </a>
                </li>
                <?php endif ?>
                <li class="nav-item">
                    <a href="datauji.php" class="nav-link">
                        <i class="nav-icon fas fa-balance-scale"></i>
                        <p>
                            Perhitungan Data Uji
                        </p>
                    </a>
                </li>





                <li class="nav-header">Manajemen</li>
                <?php if ($_SESSION['akses']=='admin') : ?>
                <li class="nav-item">
                    <a href="listuser.php" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Kelola Pengguna
                        </p>
                    </a>
                </li>
                <?php endif ?>
                
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fa fa-chevron-circle-left nav-icon"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>