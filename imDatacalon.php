<?php
include "koneksi2.php";
include "function.php";

 if (isset($_POST['uploadcalon'])) {
   $file = $_FILES['filecalon']['name'];
   $extensi_file = array('xlsx','xlx');
   $explode = strtolower(end(explode('.',$file)));
   $extensi_ok =in_array($explode,$extensi_file);
   if (!($extensi_ok)) {
    header("location:listuji.php?error=gagal");
   }else {
    
    require('plugins/spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require('plugins/spreadsheet-reader-master/SpreadsheetReader.php');
  
    //upload data excel kedalam folder uploads
    $target_dir = "uploads/dataCalon/".basename($_FILES['filecalon']['name']);
    
    move_uploaded_file($_FILES['filecalon']['tmp_name'],$target_dir);
  
    $Reader = new SpreadsheetReader($target_dir);
    
  
    foreach ($Reader as $Key => $Row)
    {
      // import data excel mulai baris ke-2 (karena ada header pada baris 1)
      if ($Key < 1) continue;   
      $query = mysqli_query($host,"INSERT INTO tb_uji(no_kk,nik,nama,alamat,jenis_pkj,jml_phsl,jml_art,pengeluaran,status_tmpt,kelas_asli) 
      VALUES ('".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."','".$Row[5]."','".$Row[6]."','".$Row[7]."','".$Row[8]."','".$Row[9]."')");
  
      if ($query) {  
        $ok = mysqli_insert_id($host);//var_dump($ok);
        $penghasilan_tampil = penghasilan_tampil_layak();
        $penghasilan_tampil2 = penghasilan_tampil_tidak();
        $penghasilan_numerik = penghasilan_sum_layak();
        $penghasilan_numerik2 = penghasilan_sum_tidak();
        $prob_penghasilan_layak = 1 / sqrt(2*3.14*$penghasilan_numerik)*exp(-(($Row[5]-penghasilan_mean_layak())**2)/($penghasilan_numerik**2));
        $prob_penghasilan_tidak = 1 / sqrt(2*3.14*$penghasilan_numerik2)*exp(-(($Row[5]-penghasilan_mean_tidak())**2)/($penghasilan_numerik2**2));
        //var_dump(penghasilan_mean_layak());
        //var_dump(penghasilan_mean_tidak());
        $tampil = tampil_layak();//var_dump($tampil);
        $tampil2 = tampil_tidak();
        $numerik = sum_layak(); //var_dump($numerik);
        $numerik2 = sum_tidak();
        $prob_art_layak = 1 / sqrt(2*3.14*$numerik)*exp(-(($Row[6]-mean_layak())**2)/($numerik**2));
        $prob_art_tdk = 1 / sqrt(2*3.14*$numerik2)*exp(-(($Row[6]-mean_tidak())**2)/($numerik2**2));

        $hasilLayak = (hitung('jenis_pkj',$Row[4],'Layak') / klasifikasi('Layak'))* ($prob_penghasilan_layak)
        *($prob_art_layak)*(hitung('pengeluaran',$Row[7],'Layak') / klasifikasi('Layak'))
        * (hitung('status_tmpt',$Row[8],'Layak') / klasifikasi('Layak'))*(klasifikasi("layak") / totalData());
        
        $hasilTdkLayak =  (hitung('jenis_pkj',$Row[4],'Tidak Layak') / klasifikasi('Tidak Layak')) * ($prob_penghasilan_tidak)
        * ($prob_art_tdk)*(hitung('pengeluaran',$Row[7],'Tidak Layak') / klasifikasi('Tidak Layak'))*
        (hitung('status_tmpt',$Row[8],'Tidak Layak') / klasifikasi('Tidak Layak'))*(klasifikasi("tidak layak") / totalData());
        
        if ($hasilLayak > $hasilTdkLayak) {
            $hasil = 'LAYAK';
        }else {
            $hasil = 'TIDAK LAYAK';   
        }
          
          mysqli_query($host,"INSERT INTO tb_klasifikasi(id_uji,no_kk,nik,nama,alamat,jenis_pkj,jml_phsl,jml_art,pengeluaran,status_tmpt,kelas_asli,layak,tidak,label_prediksi) 
          VALUES ('".$ok."','".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."','".$Row[5]."','".$Row[6]."','".$Row[7]."','".$Row[8]."','".$Row[9]."','".$hasilLayak."','".$hasilTdkLayak."','".$hasil."')");
          
          header("location:listuji.php");
        }else{
          echo mysql_error();
        }
        header("location:listuji.php?error=berhasil");
    }
   }
  }
 ?>