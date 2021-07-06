<?php
    include "koneksi2.php";
    if (isset($_POST['update'])) {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $akses = $_POST['akses'];
        $query = " UPDATE user SET
         nama = '$nama',
         username = '$username',
         password = '$password',
         akses = '$akses'

        WHERE id_user = $id_user";

        $hasil = mysqli_query($host, $query);
        if ($hasil) {
           header("location:listuser.php");
        }else{
            echo"Gagal Update Data";
        }
        
    }
?>
