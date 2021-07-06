<?php
// Load file koneksi.php
include "koneksi2.php";
$id_uji = $_POST['id_uji']; 
$query = "DELETE FROM tb_uji WHERE id_uji IN(".implode(",", $id_uji).")";
//print_r($query);// Buat variabel $query untuk menampung query delete
$ress = mysqli_query($host,$query);

?>