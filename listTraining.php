<?php 
session_start();
if($_SESSION['akses']=='pemdes')
{
    header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <?php
    include'_partials/header.php';
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php
    include'_partials/navbar.php';
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include'_partials/sidebar.php';
  ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Training</h1>
            <a>Daftar Data Training</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Training</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped nowrap">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Pekerjaan</th>
                  <th>Penghasilan</th>
                  <th>Tanggungan</th>
                  <th>pengeluaran</th>
                  <th>Tempat Tinggal</th>
                  <th>Klasifikasi</th> 
                </tr>
                </thead>
                <tbody>
                  <?php
                    include "koneksi2.php";
                    $query_mysql = mysqli_query($host,"SELECT * FROM tb_penduduk")or die(mysqli_error());
                    $no = 1;
                    while($data = mysqli_fetch_array($query_mysql)){
                  ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  
                  <td> <?php echo $data['nama']; ?></td>
                 
                  <td> <?php echo $data['jenis_pkj']; ?></td>
                  <td> <?php echo $data['jml_phsl']; ?></td>
                  <td> <?php echo $data['jml_art']; ?></td>
                  <td> <?php echo $data['pengeluaran']; ?> </td>
                  <td> <?php echo $data['status_tmpt']; ?> </td>
                  <td> <?php echo $data['klasifikasi']; ?> </td>
                  
                </tr>
                    <?php }?>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include'_partials/footer.php';
  ?>

</div>
<!-- ./wrapper -->

<?php
    include'_partials/js.php';
  ?>
</body>
</html>
