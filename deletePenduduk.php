<?php
    include "koneksi2.php";
    $id = $_GET['id_penduduk'];
    $query = "DELETE FROM tb_penduduk WHERE id_penduduk ='$id'";
    if (mysqli_query($host,$query)) {
        header("location:listPenduduk.php");
    }else{
        echo "Hapus Data Gagal";
    }
?>
