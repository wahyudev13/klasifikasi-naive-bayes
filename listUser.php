<?php session_start();?>
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
            <h1 class="m-0 text-dark">Pengguna  </h1>
            <a>Daftar user pasa sistem</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
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
            <div class="card-header">
              <h3 class="card-title"><button type="button" onclick="window.location.href='formPengguna.php'" class="btn btn-block btn-outline-primary"><i class="fas fa-plus"></i> Tambah Data</button></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pengguna</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    include "koneksi2.php";
                    $query_mysql = mysqli_query($host,"SELECT * FROM user")or die(mysqli_error());
                    $no = 1;
                    while($data = mysqli_fetch_array($query_mysql)){
                     
                  ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td> <?php echo $data['username']; ?></td>
                  <td> <?php echo $data['akses']; ?></td>
                 
                  <td style="text-align:center;">
                    <a href="editPengguna.php?id_user=<?php echo $data['id_user']; ?>" style="color:white" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="deletePengguna.php?id_user=<?php echo $data['id_user']; ?>" style="color:white" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fas fa-trash"></i></a>
                  </td>
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
