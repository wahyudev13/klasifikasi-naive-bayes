<?php
    include "koneksi2.php";
    if (isset($_POST['update'])) {
        $id_penduduk = $_POST['id_penduduk'];
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
        $query = " UPDATE tb_penduduk SET
         no_kk = '$kk',
         nik = '$nik',
         nama = '$nama',
         alamat = '$alamat',
         jenis_pkj = '$pekerjaan',
         jml_phsl = '$penghasilan',
         jml_art = '$art',
         pengeluaran = '$penggeluaran',
         status_tmpt = '$tempat',
         klasifikasi = '$klasifikasi'

        WHERE id_penduduk = $id_penduduk";

        $hasil = mysqli_query($host, $query);
        if ($hasil) {
           header("location:listPenduduk.php");
        }else{
            echo"Gagal Update Data";
        }
        
    }
?>
