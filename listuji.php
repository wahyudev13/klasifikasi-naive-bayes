<?php 
session_start();

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
            <h1 class="m-0 text-dark">Data Calon Penerima </h1>
            <a>Daftar Penerima Bansos</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calon Penerima</li>
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
          <?php if ($_SESSION['akses']=='pemdes') : ?>
            <div class="card-header">
            <?php if (isset($_GET['error'])) { 
                    if($_GET['error'] == "gagal"){
                    echo '<div class="alert alert-danger" role="alert">
                          <p style="color:#fff;padding:0px" class="login-box-msg">
                          Import Gagal, Pastikan Upload Fiel Excel
                          </p>
                         </div>';
                    }elseif ($_GET['error'] == "berhasil") {
                        echo '<div class="alert alert-success" role="alert">
                          <p style="color:#fff;padding:0px" class="login-box-msg">
                            Berhasil Import Data
                          </p>
                         </div>';
                    }
                }?>
            <div class="row">
                <div class="col-md-8">
                 <button type="button" onclick="window.location.href='formPenerima.php'" class="btn  btn-outline-primary">
                 <i class="fas fa-plus"></i> Tambah Data</button>
                 <button type="submit" id="del-uji" name="hapusAll" class="btn  btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button><br>
                  
                </div> 
                
                <div class="col-md-4">
                  <form method="post" enctype="multipart/form-data" action="imDatacalon.php"> 
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="filecalon" type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required>
                        <label class="custom-file-label" for="inputGroupFile04">File dengan fomat .xlsx</label>
                      </div>
                      <div class="input-group-append">
                        <button name="uploadcalon" class="btn btn-block btn-primary" type="submit" id="inputGroupFileAddon04">Import</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <?php endif ?>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped nowrap responsive">
                <thead>
                <tr>
                <?php if ($_SESSION['akses']=='pemdes') : ?>
                  <th><input type="checkbox" id="check-all" ></th>
                <?php endif ?>
                  <th>No</th>
                  <th>No KK</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Pekerjaan</th>
                  <th>Penghasilan</th>
                  <th>Tanggungan</th>
                  <th>Pengeluaran</th>
                  <th>Tempat Tinggal</th>
                  <th>Label</th>
                  <?php if ($_SESSION['akses']=='pemdes') : ?>
                  <th>Aksi</th>
                  <?php endif ?>
                </tr>
                </thead>
                <tbody>
                  <?php
                    include "koneksi2.php";
                    $query_mysql = mysqli_query($host,"SELECT * FROM tb_uji")or die(mysqli_error());
                    $no = 1;
                    while($data = mysqli_fetch_array($query_mysql)){            
                  ?>
                    <tr>
                      <?php if ($_SESSION['akses']=='pemdes') : ?>
                        <td><input type="checkbox" class='check-item' name="id_uji[]" value="<?php echo $data['id_uji']; ?>"></td>
                      <?php endif ?>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['no_kk']; ?></td>
                      <td> <?php echo $data['nik']; ?></td>
                      <td> <?php echo $data['nama']; ?></td>
                      <td> <?php echo $data['alamat']; ?></td>
                      <td> <?php echo $data['jenis_pkj']; ?></td>
                      <td> <?php echo $data['jml_phsl']; ?></td>
                      <td> <?php echo $data['jml_art']; ?> </td>
                      <td> <?php echo $data['pengeluaran']; ?> </td>
                      <td> <?php echo $data['status_tmpt']; ?> </td>
                      <td> <?php echo $data['kelas_asli']; ?> </td>
                      <?php if ($_SESSION['akses']=='pemdes') : ?>
                      <td style="text-align:center;">
                        <a href="deletePenerima.php?id_uji=<?php echo $data['id_uji']; ?>" style="color:white" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fas fa-trash"></i></a>
                      </td>
                      <?php endif ?>
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
