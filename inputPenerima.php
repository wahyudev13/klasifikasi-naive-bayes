<?php
include "koneksi2.php";
include "function.php";
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
    $label = $_POST['label'];
    $done = mysqli_query($host, "INSERT INTO tb_uji VALUES('','$kk','$nik','$nama','$alamat','$pekerjaan','$penghasilan','$art','$penggeluaran','$tempat','$label')");
    $ok = mysqli_insert_id($host);//var_dump($ok);

    if ($done){
        $penghasilan_tampil = penghasilan_tampil_layak();
        $penghasilan_tampil2 = penghasilan_tampil_tidak();
        $penghasilan_numerik = penghasilan_sum_layak();
        $penghasilan_numerik2 = penghasilan_sum_tidak();
        $prob_penghasilan_layak = 1 / sqrt(2*3.14*$penghasilan_numerik)*exp(-(($penghasilan-penghasilan_mean_layak())**2)/($penghasilan_numerik**2));
        $prob_penghasilan_tidak = 1 / sqrt(2*3.14*$penghasilan_numerik2)*exp(-(($penghasilan-penghasilan_mean_tidak())**2)/($penghasilan_numerik2**2));
        //var_dump(penghasilan_mean_layak());
        //var_dump(penghasilan_mean_tidak());
        $tampil = tampil_layak();//var_dump($tampil);
        $tampil2 = tampil_tidak();
        $numerik = sum_layak(); //var_dump($numerik);
        $numerik2 = sum_tidak();
        $prob_art_layak = 1 / sqrt(2*3.14*$numerik)*exp(-(($art-mean_layak())**2)/($numerik**2));
        $prob_art_tdk = 1 / sqrt(2*3.14*$numerik2)*exp(-(($art-mean_tidak())**2)/($numerik2**2));

        $hasilLayak = (hitung('jenis_pkj',$pekerjaan,'Layak') / klasifikasi('Layak'))* ($prob_penghasilan_layak)
        *($prob_art_layak)*(hitung('pengeluaran',$penggeluaran,'Layak') / klasifikasi('Layak'))
        * (hitung('status_tmpt',$tempat,'Layak') / klasifikasi('Layak'))*(klasifikasi("layak") / totalData());
        
        $hasilTdkLayak =  (hitung('jenis_pkj',$pekerjaan,'Tidak Layak') / klasifikasi('Tidak Layak')) * ($prob_penghasilan_tidak)
        * ($prob_art_tdk)*(hitung('pengeluaran',$penggeluaran,'Tidak Layak') / klasifikasi('Tidak Layak'))*
        (hitung('status_tmpt',$tempat,'Tidak Layak') / klasifikasi('Tidak Layak'))*(klasifikasi("tidak layak") / totalData());
        
        if ($hasilLayak > $hasilTdkLayak) {
        $hasil = 'LAYAK';
        }else {
        $hasil = 'TIDAK LAYAK';   
        }
        mysqli_query($host, "INSERT INTO tb_klasifikasi VALUES('','$ok','$kk','$nik','$nama','$alamat','$pekerjaan','$penghasilan','$art','$penggeluaran','$tempat','$label','$hasilLayak','$hasilTdkLayak','$hasil')");
        header("location:listuji.php");
    }
        
}else{
    echo "<script>alert('Gagal');history.go(-1)</script>";
}
?>