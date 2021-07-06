<?php
include "koneksi2.php";
 if (isset($_POST['upload'])) {
  $file = $_FILES['filemhsw']['name'];
  $extensi_file = array('xlsx','xlx');
  $explode = strtolower(end(explode('.',$file)));
  $extensi_ok =in_array($explode,$extensi_file);
  if (!($extensi_ok)) {
    echo "<script>alert('Import Gagal, Pastikan Upload Fiel Excel');history.go(-1)</script>";
  }else {
    require('plugins/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require('plugins/spreadsheet-reader-master/SpreadsheetReader.php');
  
    //upload data excel kedalam folder uploads
    $target_dir = "uploads/".basename($_FILES['filemhsw']['name']);
    
    move_uploaded_file($_FILES['filemhsw']['tmp_name'],$target_dir);
  
    $Reader = new SpreadsheetReader($target_dir);
  
    foreach ($Reader as $Key => $Row)
    {
     // import data excel mulai baris ke-2 (karena ada header pada baris 1)
     if ($Key < 1) continue;   
     $query = mysqli_query($host,"INSERT INTO tb_penduduk(no_kk,nik,nama,alamat,jenis_pkj,jml_phsl,jml_art,pengeluaran,status_tmpt,klasifikasi) 
     VALUES ('".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."','".$Row[5]."','".$Row[6]."','".$Row[7]."','".$Row[8]."','".$Row[9]."')");
    }
    if ($query) {
     header("location:listpenduduk.php");
     }else{
      echo mysql_error();
     }
  }
  
 }
 ?>