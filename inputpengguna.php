<?php
include "koneksi2.php";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $akses = $_POST['akses'];
    $cek_login = mysqli_num_rows(mysqli_query($host, "SELECT * FROM user WHERE username = '$username'"));
    if ($cek_login > 0) {
        echo "<script>alert('Username sudak Terdaftar');history.go(-1)</script>";
    }else {
        mysqli_query($host, "INSERT INTO user VALUES('','$nama','$username','$pass','$akses')");
        header("location:listuser.php");
    }
   
}else {
    echo "<script>alert('Gagal Input Data');history.go(-1)</script>";
}
?>