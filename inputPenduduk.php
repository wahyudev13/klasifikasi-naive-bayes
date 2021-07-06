<?php
include "koneksi2.php";

if (isset($_POST['simpan'])) {
    $kk = $_POST['kk'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $pekerjaan = $_POST['pekerjaan'];
    $penghasilan = $_POST['penghasilan'];
    $art = $_POST['art'];
    $penggeluaran = $_POST['penggeluaran'];
    $tempat = $_POST['tempat'];
    $klasifikasi = $_POST['klasifikasi'];
    mysqli_query($host, "INSERT INTO tb_penduduk VALUES('','$kk','$nik','$nama','$alamat','$pekerjaan','$penghasilan','$art','$penggeluaran','$tempat','$klasifikasi')");
    header("location:listPenduduk.php");
}else{
    echo "<script>alert('Gagal');history.go(-1)</script>";
}
?>