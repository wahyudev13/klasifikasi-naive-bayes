<?php
    include "koneksi2.php";
    $id = $_GET['id_uji'];
    $query = "DELETE FROM tb_uji WHERE id_uji='$id'";
    if (mysqli_query($host,$query)) {
        header("location:listuji.php");
    }else{
        echo "<script>alert('Gagal Hapus Data');history.go(-1)</script>";

    }
?>
