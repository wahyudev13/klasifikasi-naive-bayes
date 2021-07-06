<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <?php
    include'_partials/header.php';
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
$c = array("jenis_pkj","pengeluaran","status_tmpt");

?>
<div class="wrapper">

  <!-- Navbar -->
  <?php
    include'_partials/navbar.php';
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include'_partials/sidebar.php';
  ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Probabilitas</h1>
            <a>Probabilitas Data Training</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Probabilitas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
           
    

            <!-- /.card-header -->

            <div class="card-body">
                <?php
                  include "function.php";
                ?>
                 <?php
                  include "koneksi2.php";
                  $query = mysqli_query($host,"SELECT * FROM tb_penduduk");
                  $cek = mysqli_num_rows($query);
                  if ($cek > 0 ) {
                   
                  ?>  
              <table class="table table-bordered">
               
                <tr style="background-color:#007bff57">
                  <th colspan="4">Menghitung jumlah class / label</th>
                </tr>
                <tr>
                  <th>Label</th>
                  <th>Jumlah Data</th>
                  <th>Jumlah Seluruh Data</th>
                  <th>Hasil</th>
                </tr>
                <tr>
                  <td>Layak</td>
                  <td><?= klasifikasi("layak") ?></td>
                  <td><?= totalData() ?></td>
                  <?php 
                  $labelLayak = klasifikasi("layak") / totalData();
                  ?>
                  <td><?= number_format($labelLayak,7,',','.');  ?></td>          
                </tr>
                <tr>
                  <td>Tidak Layak</td>
                  <td><?= klasifikasi("tidak layak") ?></td>
                  <td><?=  totalData() ?></td>
                  
                  <?php 
                  
                  $labelTdk = klasifikasi("tidak layak") / totalData();
                  ?>
                   <td><?= number_format($labelTdk,7,',','.');  ?></td>
                </tr>
              </table>
              <?php foreach ($c as $c) { ?>
                <!--mencari peluang-->
                <table style="margin-top:20px" class="table table-bordered">
                
                  <tr style="background-color:#007bff57">
                    <th colspan="5">MENCARI PELUANG <?= strtoupper($c) ?></th>
                  </tr>
                  <tr>
                    <th scope="col" rowspan="2" class="align-middle text-center"><?= strtoupper($c) ?></th>
                    <th scope="col" colspan="2" class="align-middle text-center">Jumlah Kejadian</th>
                    <th scope="col" colspan="2" class="align-middle text-center">Probabilitas</th> 
                  </tr>
                  <tr>
                    <th>Layak</th>
                    <th>Tidak Layak</th>
                    <th>Layak</th>
                    <th>Tidak Layak</th>
                  </tr>
                  <?php
                    $ya = 0;
                    $tidak = 0;
                    foreach (c($c) as $nilai) { ?>
                    <tr>
                      <td><?= $nilai[$c] ?></td>
                      <td><?= hitung($c, $nilai[$c], 'Layak') ?></td>
                      <td><?= hitung($c, $nilai[$c], 'Tidak Layak') ?></td>
                      <td><?= hitung($c, $nilai[$c], 'Layak') / klasifikasi("layak")?></td>
                      <td><?= hitung($c, $nilai[$c], 'Tidak Layak') / klasifikasi("tidak layak") ?></td>
                    </tr>
                    <?php
                    $ya = $ya + (hitung($c, $nilai[$c], 'Layak') / klasifikasi("layak"));
                    $tidak = $tidak + (hitung($c, $nilai[$c], 'Tidak Layak') / klasifikasi("tidak layak"));
                    }?>
                    <tr style="background-color:#c1c1c1">
                      <td ><b>Jumlah</b></td>
                      <td><?= klasifikasi("layak")?></td>
                      <td><?= klasifikasi("tidak layak") ?></td>
                      <td><?= $ya ?></td>
                      <td><?= $tidak ?></td>
                    </tr>
                </table>
              <?php } ?>
              
                <table style="margin-top:20px" class="table table-bordered">
                  <tr  style="background-color:#007bff57">
                      <th colspan="4" class=" text-center">Perhitungan Mean dan Standar Deviasi Penghasilan</th>
                  </tr>
                  <tr>
                      <th class=" text-center">No</th>
                      <th class=" text-center">Penghasilan (layak)</th> 
                      <th class=" text-center">Penghasilan - Mean</th> 
                      <th class=" text-center">(Penghasilan - Mean)^2</th> 
                  </tr>
                  <?php
                  $no = 1;
                  $mean = penghasilan('layak') / total_phsl('layak');
                  foreach (penghasilan_numerik_layak() as $key ) {
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key[0] ?></td>
                    <?php 
                    $selisih =  $key[0] - $mean;
                    ?>      
                    <td><?= $selisih; ?></td>        
                    <?php 
                    $pow =  pow($selisih,2);
                    $var_pow2[] =  pow($selisih,2);
                    ?>    
                    <td><?= $pow; ?></td>        
                  </tr>
                  <?php }?>
                  
                  <?php 

                  $jumlah_pow = array_sum($var_pow2); 
                  
                  ?>
                  <tr style="background-color:#c1c1c1">
                     <td><b>Total</b></td>
                     <td><?php echo penghasilan('layak');  ?></td>  
                     <td></td>
                     <td><?php echo $jumlah_pow;  ?></td>  
                  </tr>
                  <tr style="background-color:#c1c1c1">
                     <td><b>Mean <br>(Jumlah Item / Jumlah Total )</b></td>
                     <td><?php echo $mean;  ?></td>  
                       
                  </tr>
                  <?php
                  $strd_dev = sqrt($jumlah_pow / (total_phsl('layak')-1));
                  ?>
                  <tr style="background-color:#c1c1c1">
                     
                     <td><b>Standar Deviasi</b></td>
                     <td><?php echo number_format($strd_dev,3,',','.');  ?></td>  
                  </tr>
                </table>

                <!-- Tidak Layak -->
                <table style="margin-top:20px" class="table table-bordered">
                  <tr>
                      <th class=" text-center">No</th>
                      <th class=" text-center">Penghasilan (Tidak Layak)</th> 
                      <th class=" text-center">Penghasilan - Mean</th> 
                      <th class=" text-center">(Penghasilan - Mean)^2</th> 
                  </tr>
                  <?php
                  $no = 1;
                  $mean2 = penghasilan('tidak layak') / total_phsl('tidak layak');
                  foreach (penghasilan_numerik_tidak() as $key ) {
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key[0] ?></td>
                    <?php 
                    $selisih =  $key[0] - $mean2;
                    ?>      
                    <td><?= $selisih; ?></td>        
                    <?php 
                    $pow =  pow($selisih,2);
                    $var_pow[] =  pow($selisih,2);
                    ?>    
                    <td><?= $pow; ?></td>        
                  </tr>
                  <?php }?>
                  
                  <?php 

                  $jumlah_pow = array_sum($var_pow); 
                  
                  ?>
                  <tr style="background-color:#c1c1c1">
                     <td><b>Total</b></td>
                     <td><?php echo penghasilan('tidak layak');  ?></td>  
                     <td></td>
                     <td><?php echo $jumlah_pow;  ?></td>  
                  </tr>
                  <tr style="background-color:#c1c1c1">
                     <td><b>Mean <br>(Jumlah Item / Jumlah Total )</b></td>
                     <td><?php echo $mean2;  ?></td>  
                       
                  </tr>
                  <?php
                  $strd_dev = sqrt($jumlah_pow / (total_phsl('tidak layak')-1));
                  ?>
                  <tr style="background-color:#c1c1c1">
                     
                     <td><b>Standar Deviasi</b></td>
                     <td><?php echo number_format($strd_dev,3,',','.');  ?></td>  
                  </tr>

                  
                </table>


                <table style="margin-top:20px" class="table table-bordered">
                  <tr  style="background-color:#007bff57">
                      <th colspan="4" class=" text-center">Perhitungan Mean dan Standar Deviasi ART</th>
                  </tr>
                  <tr>
                      <th class=" text-center">No</th>
                      <th class=" text-center">ART (layak)</th> 
                      <th class=" text-center">ART - Mean</th> 
                      <th class=" text-center">(ART - Mean)^2</th> 
                  </tr>
                  <?php
                  $no = 1;
                  $mean = a('layak') / total('layak');
                  foreach (numerik_layak() as $key ) {
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key[0] ?></td>
                    <?php 
                    $selisih =  $key[0] - $mean;
                    ?>      
                    <td><?= $selisih; ?></td>        
                    <?php 
                    $pow =  pow($selisih,2);
                    $var_pow2[] =  pow($selisih,2);
                    ?>    
                    <td><?= $pow; ?></td>        
                  </tr>
                  <?php }?>
                  
                  <?php 

                  $jumlah_pow = array_sum($var_pow2); 
                  
                  ?>
                  <tr style="background-color:#c1c1c1">
                     <td><b>Total</b></td>
                     <td><?php echo a('layak');  ?></td>  
                     <td></td>
                     <td><?php echo $jumlah_pow;  ?></td>  
                  </tr>
                  <tr style="background-color:#c1c1c1">
                     <td><b>Mean <br>(Jumlah Item / Jumlah Total )</b></td>
                     <td><?php echo $mean;  ?></td>  
                       
                  </tr>
                  <?php
                  $strd_dev = sqrt($jumlah_pow / (total('layak')-1));
                  ?>
                  <tr style="background-color:#c1c1c1">
                     
                     <td><b>Standar Deviasi</b></td>
                     <td><?php echo number_format($strd_dev,3,',','.');  ?></td>  
                  </tr>
                </table>

                <!-- Tidak Layak -->
                <table style="margin-top:20px" class="table table-bordered">
                  <tr>
                      <th class=" text-center">No</th>
                      <th class=" text-center">ART (Tidak Layak)</th> 
                      <th class=" text-center">ART - Mean</th> 
                      <th class=" text-center">(ART - Mean)^2</th> 
                  </tr>
                  <?php
                  $no = 1;
                  $mean2 = a('tidak layak') / total('tidak layak');
                  foreach (numerik_tidak() as $key ) {
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key[0] ?></td>
                    <?php 
                    $selisih =  $key[0] - $mean2;
                    ?>      
                    <td><?= $selisih; ?></td>        
                    <?php 
                    $pow =  pow($selisih,2);
                    $var_pow[] =  pow($selisih,2);
                    ?>    
                    <td><?= $pow; ?></td>        
                  </tr>
                  <?php }?>
                  
                  <?php 

                  $jumlah_pow = array_sum($var_pow); 
                  
                  ?>
                  <tr style="background-color:#c1c1c1">
                     <td><b>Total</b></td>
                     <td><?php echo a('tidak layak');  ?></td>  
                     <td></td>
                     <td><?php echo $jumlah_pow;  ?></td>  
                  </tr>
                  <tr style="background-color:#c1c1c1">
                     <td><b>Mean <br>(Jumlah Item / Jumlah Total )</b></td>
                     <td><?php echo $mean2;  ?></td>  
                       
                  </tr>
                  <?php
                  $strd_dev = sqrt($jumlah_pow / (total('tidak layak')-1));
                  ?>
                  <tr style="background-color:#c1c1c1">
                     
                     <td><b>Standar Deviasi</b></td>
                     <td><?php echo number_format($strd_dev,3,',','.');  ?></td>  
                  </tr>

                  
                </table>
              
            </div>
            <!-- /.card-body -->
            <?php } else {
              echo '<div class="alert alert-danger" role="alert">
              Data Training Tidak Ada, Isi Data Training dulu !!!
              </div>';
            }?>


          </div>
          <!-- /.card -->
        
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include'_partials/footer.php';
  ?>

</div>
<!-- ./wrapper -->

<?php
    include'_partials/js.php';
  ?>
</body>
</html>
