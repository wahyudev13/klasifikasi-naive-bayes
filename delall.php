<?php
// Load file koneksi.php
include "koneksi2.php";
$id_penduduk = $_POST['id_penduduk']; // Ambil data NIS yang dikirim oleh index.php melalui form submit
$query = "DELETE FROM tb_penduduk WHERE id_penduduk IN(".implode(",", $id_penduduk).")";
print_r($query);// Buat variabel $query untuk menampung query delete
$ress = mysqli_query($host,$query);

?>