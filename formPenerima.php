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
            <h1 class="m-0 text-dark">Form Calon Penerima</h1>
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
            <div class="card-header">
            <h3 class="card-title"><button type="button" onclick="history.back();" class="btn btn-block btn-outline-primary"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</button></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form" method="POST" action="inputPenerima.php">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kk">No KK </label>
                            <input type="number" name="kk" class="form-control" id="kk" placeholder="No KK" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik">NIK </label>
                            <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK" required>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label >Status Tempat Tinggal</label>
                        <select class="custom-select" name="pekerjaan">
                            <option value="Petani">Petani</option>
                            <option value="Pedagang">Pedagang</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="PNS">PNS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label for="penghasilan">Penghasilan</label>
                            <input type="number" name="penghasilan" class="form-control" id="penghasilan" placeholder="Penghasilan" required>
                        </div>
                    </div>
                </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="art">Anggota Rumah</label>
                            <input type="number" name="art" class="form-control" id="art" placeholder="Anggota Rumah" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="penggeluaran">Jumlah penggeluaran perhari</label>
                        <select class="custom-select" name="penggeluaran" id="penggeluaran">
                            <option value="kurangRp.50.000">< Rp.50.000</option>
                            <option value="Rp.50.000 – Rp.100.000">Rp.50.000 – Rp.100.000</option>
                            <option value="lebihRp.100.000">> Rp.100.000</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Status Tempat Tinggal</label>
                    <select class="custom-select" name="tempat">
                          <option value="Numpang">Numpang</option>
                          <option value="Sewa">Sewa</option>
                          <option value="Milik Sendiri">Milik Sendiri</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label>Label</label>
                    <select class="custom-select" name="label">
                          <option value="Layak">Layak</option>
                          <option value="Tidak Layak">Tidak Layak</option>
                          
                        </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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
