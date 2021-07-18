<?php
session_start();
if(isset($_SESSION['akses'])){
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

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
           <a href="login.php"><img class="logo-login" style="width: 100%;" src="img/logo3.png" alt="logo"></a>

        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <?php if (isset($_GET['pwsd_error'])) { 
                    if($_GET['pwsd_error'] == "gagal"){
                    echo '<div class="alert alert-danger" role="alert">
                          <p style="color:#fff;padding:0px" class="login-box-msg">
                            Username Tidak ada dalam sistem
                          </p>
                         </div>';
                    }elseif ($_GET['pwsd_error'] == "logout") {
                        echo '<div class="alert alert-success" role="alert">
                          <p style="color:#fff;padding:0px" class="login-box-msg">
                            Berhasil Logout
                          </p>
                         </div>';
                    }elseif ($_GET['pwsd_error'] == "gagal2") {
                        echo '<div class="alert alert-danger" role="alert">
                          <p style="color:#fff;padding:0px" class="login-box-msg">
                            Password yang anda masukan salah 
                          </p>
                         </div>';
                    }
                }?>

                <form method="post" action="prosesLogin.php">
                
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <?php
    include'_partials/js.php';
  ?>
</body>

</html>