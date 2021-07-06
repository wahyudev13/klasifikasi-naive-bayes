<?php
include "koneksi2.php";
$jml = [];
$jml2 = [];
$pehsil =[];
$pehsil2 = [];
////////Perhitungan Standart Deviasi Layak /////////
function a($layak){
    global $host;
    $query = "SELECT DISTINCT jml_art from tb_penduduk WHERE klasifikasi = '$layak' ";
    $ress = mysqli_query($host,$query);
    while($data = mysqli_fetch_array($ress)){ 
        $a[] = $data['jml_art'];
    }
    $total = array_sum($a);
    return  $total;
}
//var_dump(a('Tidak layak'));
function numerik_layak(){
    global $host;
    $query = "SELECT DISTINCT jml_art from tb_penduduk WHERE klasifikasi = 'layak' ORDER BY jml_art ASC ";
    $ress = mysqli_query($host,$query);
    while($data = mysqli_fetch_array($ress)){ 
        $rows[] = $data;
    }
    return  $rows;
}
//print_r(numerik('tidak layak'));
//print_r(numerik('layak'));
function tampil_layak(){
    global $jml;
    foreach (numerik_layak() as $key) {
       array_push($jml,$key['jml_art']);
    }
}
//print_r(tampil_layak());

function jarak_layak($n){
    return ($n - mean_layak())**2;
}

function hasil_layak(){
    global $jml;
    $hasil = array_map('jarak_layak',$jml);
    return $hasil;
}
//print_r(hasil());
///print_r(count(hasil()));
function mean_layak(){
    $mean = a('layak') / total('layak');
    return $mean;
}
//print_r(mean_tidak());
function sum_layak(){
    $sum = array_sum(hasil_layak()) / (count(hasil_layak()) - 1);
    $stdv = sqrt($sum);
    return $stdv;
}
//print_r(sum_layak());

////////Perhitungan Standart Deviasi Tidak Layak /////////
function numerik_tidak(){
    global $host;
    $query = "SELECT DISTINCT jml_art from tb_penduduk WHERE klasifikasi = 'tidak layak' ORDER BY jml_art ASC ";
    $ress = mysqli_query($host,$query);
    while($data = mysqli_fetch_array($ress)){ 
        $rows[] = $data;
    }
    return  $rows;
}
//print_r(numerik_tidak());
//print_r(numerik('layak'));
function tampil_tidak(){
    global $jml2;
    foreach (numerik_tidak() as $key) {
       array_push($jml2,$key['jml_art']);
    }
}
//print_r(tampil_tidak());

function jarak_tidak($n){
    return ($n - mean_tidak())**2;
}

function hasil_tidak(){
    global $jml2;
    $hasil2 = array_map('jarak_tidak',$jml2);
    return $hasil2;
}
//print_r(hasil());
///print_r(count(hasil()));

function sum_tidak(){
    $sum = array_sum(hasil_tidak()) / (count(hasil_tidak()) - 1);
    $stdv = sqrt($sum);
    return $stdv;
}
//print_r(sum_tidak());



function total($layak){
    global $host; 
    $sql = "SELECT COUNT(DISTINCT jml_art) from tb_penduduk WHERE klasifikasi = '$layak'";
    $ress = mysqli_query($host,$sql);
    $result = mysqli_fetch_row($ress);
    return $result[0];
}
//print_r(total('tidak layak'));

function mean_tidak(){
    $mean = a('tidak layak') / total('tidak layak');
    return $mean;
}
//print_r(mean_tidak());
function stan_dev($layak){
    $strd_dev = sqrt($jumlah_pow / (total($layak)-1));
    return $strd_dev;
}

//// Standart Deviasi Penghasilan Layak //////
function penghasilan($layak){
    global $host;
    $query = "SELECT DISTINCT jml_phsl from tb_penduduk WHERE klasifikasi = '$layak' ";
    $ress = mysqli_query($host,$query);
    while($data = mysqli_fetch_array($ress)){ 
        $a[] = $data['jml_phsl'];
    }
    $total = array_sum($a);
    return  $total;
}
function penghasilan_numerik_layak(){
    global $host;
    $query = "SELECT DISTINCT jml_phsl from tb_penduduk WHERE klasifikasi = 'layak' ORDER BY jml_phsl ASC ";
    $ress = mysqli_query($host,$query);
    while($data = mysqli_fetch_array($ress)){ 
        $rows[] = $data;
    }
    return  $rows;
}
function total_phsl($layak){
    global $host; 
    $sql = "SELECT COUNT(DISTINCT jml_phsl) from tb_penduduk WHERE klasifikasi = '$layak'";
    $ress = mysqli_query($host,$sql);
    $result = mysqli_fetch_row($ress);
    return $result[0];
}
function penghasilan_tampil_layak(){
    global $pehsil;
    foreach (penghasilan_numerik_layak() as $key) {
       array_push($pehsil,$key['jml_phsl']);
    }
}
print_r(penghasilan_tampil_layak());

function penghasilan_jarak_layak($n){
    return ($n - penghasilan_mean_layak())**2;
}

function penghasilan_hasil_layak(){
    global $pehsil;
    $hasil = array_map('penghasilan_jarak_layak',$pehsil);
    return $hasil;
}
//print_r(penghasilan_hasil_layak());
function penghasilan_sum_layak(){
    $sum = array_sum(penghasilan_hasil_layak()) / (count(penghasilan_hasil_layak()) - 1);
    $stdv = sqrt($sum);
    return $stdv;
}
//print_r(penghasilan_sum_layak());

function penghasilan_mean_layak(){
    $mean = penghasilan('layak') / total_phsl('layak');
    return $mean;
}
//print_r(penghasilan_mean_layak());

//////////////////////////////////////////////////////////////
///// Standar Deviasi Tidak Layak //////////
function penghasilan_numerik_tidak(){
    global $host;
    $query = "SELECT DISTINCT jml_phsl from tb_penduduk WHERE klasifikasi = 'tidak layak' ORDER BY jml_phsl ASC ";
    $ress = mysqli_query($host,$query);
    while($data = mysqli_fetch_array($ress)){ 
        $rows[] = $data;
    }
    return  $rows;
}
function penghasilan_tampil_tidak(){
    global $pehsil2;
    foreach (penghasilan_numerik_tidak() as $key) {
       array_push($pehsil2,$key['jml_phsl']);
    }
}

function penghasilan_jarak_tidak($n){
    return ($n - penghasilan_mean_tidak())**2;
}

function penghasilan_hasil_tidak(){
    global $pehsil2;
    $hasil2 = array_map('penghasilan_jarak_tidak',$pehsil2);
    return $hasil2;
}

function penghasilan_sum_tidak(){
    $sum = array_sum(penghasilan_hasil_tidak()) / (count(penghasilan_hasil_tidak()) - 1);
    $stdv = sqrt($sum);
    return $stdv;
}

function penghasilan_mean_tidak(){
    $mean = penghasilan('tidak layak') / total_phsl('tidak layak');
    return $mean;
}
//print_r(penghasilan_mean_tidak());
function penghasilan_stan_dev($layak){
    $strd_dev = sqrt($jumlah_pow / (total_phsl($layak)-1));
    return $strd_dev;
}

///// Klasifikasi ////////
function klasifikasi($layak){
    global $host;
    $query = "SELECT COUNT(klasifikasi) from tb_penduduk WHERE klasifikasi ='$layak'";
    $ress = mysqli_query($host,$query);
    $result = mysqli_fetch_row($ress);
    return $result[0];
}
//var_dump(klasifikasi("Tidak Layak"));
//var_dump(klasifikasi("Layak"));

function totalData(){
    global $host;
    $querytotalData =  "SELECT COUNT(*) from tb_penduduk";
    $resstotal = mysqli_query($host,$querytotalData);
    $result = mysqli_fetch_row($resstotal);
    return $result[0];
}
//var_dump(totalData());
function totaldatauji(){
    global $host;
    $querytotalData =  "SELECT COUNT(*) from tb_uji";
    $resstotal = mysqli_query($host,$querytotalData);
    $result = mysqli_fetch_row($resstotal);
    return $result[0];
}

function c($c){
    global $host;
    $query = "SELECT DISTINCT $c from tb_penduduk";
    $result  = mysqli_query($host, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return  $rows;
}
function hitung($c, $nilai, $klasifikasi){
    global $host;
    //selec from jenis pkj from tb_penduduk where jenis pkj = petani and klasifikasi = layak
    $query = "SELECT COUNT($c) from tb_penduduk WHERE $c ='$nilai' AND klasifikasi = '$klasifikasi'";
    $ress = mysqli_query($host,$query);
    $result = mysqli_fetch_row($ress);
    return $result[0];

}
function user(){
    global $host;
    $query = "SELECT COUNT(*) from user";
    $resstotal = mysqli_query($host,$query);
    $result = mysqli_fetch_row($resstotal);
    return $result[0];
}

function deleteall($data){
    global $host;
    $query = "DELETE from tb_penduduk where id_penduduk IN ($data)";
    $ress = mysqli_query($host,$query);
    if ($ress) {
       return true;
    }else {
        return false;
    }

}
function deleteConfusion(){
    global $host;
    $query = "DELETE from tb_klasifikasi";
    $ress = mysqli_query($host,$query);
    if ($ress) {
       return true;
    }else {
        return false;
    }

}
?>