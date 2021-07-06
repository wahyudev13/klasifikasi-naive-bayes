<?php 
session_start();
if($_SESSION['akses']=='pemdes')
{
    header("location:index.php");
}
$error ="";
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
            <h1 class="m-0 text-dark">Data Penerima (Training)</h1>
            <a>Daftar Penerima Bansos Sebelumnya</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penduduk</li>
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
            
              <div class="row">
                <div class="col-md-8">
                 <button type="button" onclick="window.location.href='formPenduduk.php'" class="btn  btn-outline-primary">
                 <i class="fas fa-plus"></i> Tambah Data</button>
                 <button type="submit" id="btn-delete" name="hapusAll" class="btn  btn-outline-danger"><i class="fas fa-trash"></i> Hapus</button><br>
                  <span class="text-danger"><?= $error ?></span>
                </div> 
                
                <div class="col-md-4">
                  <form method="post" enctype="multipart/form-data" action="importdata.php"> 
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="filemhsw" type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required>
                        <label class="custom-file-label" for="inputGroupFile04">File dengan fomat .xlsx</label>
                      </div>
                      <div class="input-group-append">
                        <button name="upload" class="btn btn-block btn-primary" type="submit" id="inputGroupFileAddon04">Import</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
            <form method="post" id="form-delete">
                <table id="example1" class="table table-bordered table-striped nowrap responsive">
                  <thead>
                  <tr>
                    <th><input type="checkbox" id="check-all" ></th>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Pekerjaan</th>
                    <th>Penghasilan</th>
                    <th>Tanggungan</th>
                    <th>Pengeluaran</th>
                    <th>Tempat Tinggal</th>
                    <th>Klasifikasi</th>
                    <th>Aksi</th>
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
                        <td><input type="checkbox" class='check-item' name="id_penduduk[]" value="<?php echo $data['id_penduduk']; ?>"></td>
                        <td> <?php echo $no++; ?></td>
                        <td> <?php echo $data['nama']; ?></td>
                        <td> <?php echo $data['alamat']; ?></td>
                        <td> <?php echo $data['jenis_pkj']; ?></td>
                        <td> <?php echo $data['jml_phsl']; ?></td>
                        <td> <?php echo $data['jml_art']; ?> </td>
                        <td> <?php echo $data['pengeluaran']; ?> </td>
                        <td> <?php echo $data['status_tmpt']; ?> </td>
                        <td> <?php echo $data['klasifikasi']; ?> </td>
                        <td style="text-align:center;">
                          <a href="editPenduduk.php?id_penduduk=<?php echo $data['id_penduduk']; ?>" style="color:white" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                          <a href="deletePenduduk.php?id_penduduk=<?php echo $data['id_penduduk']; ?>" style="color:white" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus item ini ?')"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php }?>
                </table>
                
                <!--div-- class="card-footer">
                  <button type="submit" id="btn-delete" name="hapusAll" class="btn btn-primary">Hapus</button><br>
                </!--div-->
              </form>
              
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
