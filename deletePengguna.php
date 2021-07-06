<?php
    include "koneksi2.php";
    $id = $_GET['id_user'];
    $query = "DELETE FROM user WHERE id_user='$id'";
    if (mysqli_query($host,$query)) {
        header("location:listuser.php");
    }else{
        echo "Hapus Data Gagal";
    }

?>
