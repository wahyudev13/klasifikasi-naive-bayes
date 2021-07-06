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
                            <h1 class="m-0 text-dark">Pengguna </h1>
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
                                <h3 class="card-title"><button type="button" onclick="history.back();"
                                        class="btn btn-block btn-outline-primary"><i
                                            class="fas fa-arrow-alt-circle-left"></i></i> Kembali</button></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form role="form" method="POST" action="inputpengguna.php">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama">Nama </label>
                                            <input type="text" name="nama" class="form-control" id="nama"
                                                placeholder="Nama Pengguna" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username </label>
                                            <input type="text" name="username" class="form-control" id="username"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Akses </label>
                                            <select class="custom-select" name="akses">
                                                <option value="admin">Admin</option>
                                                <option value="pemdes">Seksi Pemdes</option>

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