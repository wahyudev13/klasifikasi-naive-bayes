
<?php 
session_start();
if($_SESSION['akses'] == 'pemdes')
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
            <h1 class="m-0 text-dark">Edit Penduduk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Penduduk</li>
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
            <h3 class="card-title"><button type="button" onclick="history.back();" class="btn btn-block btn-outline-primary"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</button></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form" method="POST" action="updatePdk.php">
            <?php
                include "koneksi2.php";
                $id_penduduk = $_GET['id_penduduk'];
                $query_mysql = mysqli_query($host,"SELECT * FROM tb_penduduk WHERE id_penduduk='$id_penduduk'")or die(mysqli_error());
                while($data = mysqli_fetch_array($query_mysql)){
            ?>
             <input type="hidden" value="<?php echo $data['id_penduduk'];?>" name="id_penduduk">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">No KK </label>
                    <input type="number" name="kk" class="form-control" id="exampleInputEmail1" placeholder="No KK" value="<?php echo $data["no_kk"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="">NIK </label>
                    <input type="number" name="nik" class="form-control" id="exampleInputEmail1" placeholder="NIK" value="<?php echo $data["nik"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama" value="<?php echo $data["nama"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Nama" value="<?php echo $data["alamat"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pekerjaan</label>
                    <select class="custom-select" name="pekerjaan">
                          <option <?php if($data['jenis_pkj'] == 'PETANI') {echo "selected";} ?> value="Petani">Petani</option>
                          <option <?php if($data['jenis_pkj'] == 'PEDAGANG') {echo "selected";} ?> value="Pedagang">Pedagang</option>
                          <option <?php if($data['jenis_pkj'] == 'WIRASWASTA') {echo "selected";} ?> value="Wiraswasta">Wiraswasta</option>
                          <option <?php if($data['jenis_pkj'] == 'PNS') {echo "selected";} ?> value="PNS">PNS</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Penghasilan</label>
                    <input type="text" name="penghasilan" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Penghasilan" value="<?php echo $data["jml_phsl"]; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah ART</label>
                    <input type="number" name="art" class="form-control" id="exampleInputEmail1" placeholder="Jumlah ART" value="<?php echo $data["jml_art"]; ?>">
                  </div>
                  <div class="form-group">
                        <label for="penggeluaran">Jumlah penggeluaran perhari</label>
                        <select class="custom-select" name="penggeluaran" id="penggeluaran">
                            <option <?php if($data['pengeluaran'] == 'kurangRp.50.000') {echo "selected";} ?> value="kurangRp.50.000">< Rp.50.000</option>
                            <option <?php if($data['pengeluaran'] == 'Rp.50.000 – Rp.100.000') {echo "selected";} ?> value="Rp.50.000 – Rp.100.000">Rp.50.000 – Rp.100.000</option>
                            <option <?php if($data['pengeluaran'] == 'lebihRp.100.000') {echo "selected";} ?> value="lebihRp.100.000">> Rp.100.000</option>
                        </select>
                        </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Tempat Tinggal</label>
                    <select class="custom-select" name="tempat">
                          <option <?php if($data['status_tmpt'] == 'NUMPANG') {echo "selected";} ?> value="Numpang">Numpang</option>
                          <option <?php if($data['status_tmpt'] == 'SEWA') {echo "selected";} ?> value="Sewa">Sewa</option>
                          <option <?php if($data['status_tmpt'] == 'MILIK SENDIRI') {echo "selected";} ?> value="Milik Sendiri">Milik Sendiri</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label>Klasifikasi</label>
                    <select class="custom-select" name="klasifikasi">
                          <option <?php if($data['klasifikasi'] == 'LAYAK') {echo "selected";} ?> value="Layak">Layak</option>
                          <option <?php if($data['klasifikasi'] == 'TIDAK LAYAK') {echo "selected";} ?> value="Tidak Layak">Tidak Layak</option>
                        </select>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <?php } ?>

                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
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
