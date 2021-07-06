<?php
include "koneksi2.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($host, "SELECT * FROM user WHERE username = '$username'");
    $cek = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    //var_dump($row);
    if($cek > 0)
    {
        if ($password == $row['password']) {
            session_start();
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['akses'] = $row['akses'];
            header("location:index.php");
        }else {
            header("location:login.php?pwsd_error=gagal2");
        }
        
    }else{   
        header("location:login.php?pwsd_error=gagal");
    }
}


?>