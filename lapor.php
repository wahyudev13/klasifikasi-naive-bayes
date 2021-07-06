
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
tr {
    text-align : center;
}
th.hed{
    border : 1px solid #000;
}
td.isi{
    border : 1px solid #000;
}
th.logo {
    padding: 0;
    margin: 0;
    width: 60px;
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
            <th class="title2" colspan="10" style="text-align:left">SISTEM PENDUKUNUG KEPUTUSAN</th>
        </tr>
        <tr>
            <th class="title3" colspan="10" style="text-align:left">PENERIMA BANTUAN SOSIAL DESA DOUDO</th>
        </tr>
        <tr style="margin-top : 19px;">
            <th colspan="11" class="kosong">DAFTAR HASIL KLASIFIKASI SISTEM</th>
        </tr>
        <tr>
            <th class="hed">No</th>
            <th class="hed">NIK</>
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
    </table>

</body>

</html>