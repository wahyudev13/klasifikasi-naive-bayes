<?php
if (isset($_POST['proses'])) {
    $kk = $data['kk'];
    $nik = $data['nik'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $pekerjaan = $data['jenis_pkj'];
    $penghasilan = $data['jml_phsl'];
    $art = $data['jml_art'];
    $penggeluaran = $data['pengeluaran'];
    $tempat = $data['status_tmpt'];
    $kelas_asli = $data['kelas_asli'];
    $hasil4 = $hasil;
    mysqli_query($host, "INSERT INTO tb_klasifikasi VALUES('','$kk','$nik','$nama','$alamat','$pekerjaan','$penghasilan','$art','$penggeluaran','$tempat','$kelas_asli','$hasil4')");
    header("location:hasilakhir.php");
}

?>