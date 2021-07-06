<?php
 session_start();
	//Jika download plugin mpdf dengan composer (versi baru)
    require_once "plugins/mpdf_v8.0.3-master/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
    $nama_dokumen='laporan-hasil';
    ob_start();	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
</head>
<style>
body { 
    font-family: arial; 
    font-size: 10pt; 
}


table {
    border-collapse: collapse;
    
}
tr td.isi{
    text-align : center;
}
th.hed{
    border : 1px solid #000;
}
td.isi{
    border : 1px solid #000;
}
td.ttd{
    padding-top: 50px;
}
th.logo {
    padding: 0;
    margin: 0;
    width: 60px;
}
th.kosong{
    padding-top: 31px;
    font-size: 14pt; 
}
th.title,
th.title2,
th.title3 {
    padding-left: 9px;
}
</style>

<body>

    <table cellpadding="8">
        <tr>
            <th class="logo" rowspan="3"><img style="width:9%" src="img/logo2.png" alt=""></th>
            <th class="title" colspan="10" style="text-align:left">LAPORAN PERHITUNGAN</th>
        </tr>
        <tr>
            <th class="title2" colspan="10" style="text-align:left">SISTEM KLASIFIKASI REKOMENDASI</th>
        </tr>
        <tr>
            <th class="title3" colspan="10" style="text-align:left">CALON PENERIMA BANTUAN SOSIAL DESA DOUDO</th>
        </tr>
        <tr>
            <th colspan="11" class="kosong">DAFTAR HASIL KLASIFIKASI SISTEM</th>
        </tr>
        <tr>
            <th class="hed">No</th>
            <th class="hed">NIK</th>
            <th class="hed">Nama</th>
            <th class="hed">Pekerjaan</th>
            <th class="hed">Penghasilan</th>
            <th class="hed">Tanggungan</th>
            <th class="hed">Pengeluaran</th>
            <th class="hed">Tempat Tinggal</th>
            <th class="hed">Label</th>
            <th class="hed">Hasil Prediksi</th>
        </tr>
        <?php
            include "koneksi2.php";
            include "function.php";
            $query_mysql = mysqli_query($host,"SELECT * FROM tb_klasifikasi")or die(mysqli_error());
            $no = 1;
            while($data = mysqli_fetch_array($query_mysql)){            
        ?>
        <tr>
            <td class="isi"><?php echo $no++; ?></td>
            <td class="isi"> <?php echo $data['nik']; ?></td>
            <td class="isi"> <?php echo $data['nama']; ?></td>
            <td class="isi"> <?php echo $data['jenis_pkj']; ?></td>
            <td class="isi"> <?php echo $data['jml_phsl']; ?></td>
            <td class="isi"> <?php echo $data['jml_art']; ?> </td>
            <td class="isi"> <?php echo $data['pengeluaran']; ?> </td>
            <td class="isi"> <?php echo $data['status_tmpt']; ?> </td>
            <td class="isi"> <?php echo $data['kelas_asli']; ?> </td>
            <td class="isi"> <?php echo $data['label_prediksi']; ?> </td>
        </tr>
        
        <?php }?>
        <tr>
            <td colspan="11" style="text-align:right;">Mengetahui, <br>Seksi Kesejahteraan Desa</td>
        </tr>
        <tr>
            <td class="ttd" colspan="11" style="text-align:right;"><?php echo $_SESSION['nama']?></td>
        </tr>
    </table>

</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
$mpdf->WriteHTML($html);
$mpdf->Output("".$nama_dokumen.".pdf" ,'D');
$db1->close();
?>