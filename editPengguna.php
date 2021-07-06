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
                            <h1 class="m-0 text-dark">Edit Pengguna </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Pengguna</li>
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
                                <form role="form" method="POST" action="updatePenggunna.php">
                                    <?php
                include "koneksi2.php";
                $id_user = $_GET['id_user'];
                $query_mysql = mysqli_query($host,"SELECT * FROM user WHERE id_user='$id_user'")or die(mysqli_error());
                while($data = mysqli_fetch_array($query_mysql)){
            ?>
                                    <input type="hidden" value="<?php echo $data['id_user'];?>" name="id_user">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama </label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                                value="<?php echo $data["nama"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username </label>
                                            <input type="text" name="username" class="form-control"
                                                id="exampleInputEmail1" value="<?php echo $data["username"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control" id="Password1"
                                                value="<?php echo $data["password"]; ?>">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox"
                                                    onclick="myFunction()" id="customCheckbox1" value="option1">
                                                <label for="customCheckbox1" class="custom-control-label">Show
                                                    Password</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Akses </label>
                                            <select class="custom-select" name="akses">
                                                <option <?php if($data['akses'] == 'admin') {echo "selected";} ?>
                                                    value="admin">Admin</option>
                                                <option <?php if($data['akses'] == 'pemdes') {echo "selected";} ?>
                                                    value="pemdes">Seksi Pemdes</option>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>
                                    <?php } ?>
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
    <script>
    function myFunction() {
        var x = document.getElementById("Password1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <?php
    include'_partials/js.php';
  ?>
</body>

</html>