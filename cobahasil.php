<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include'_partials/header.php';
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
                            <h1 class="m-0 text-dark">Hasil Akhir</h1>
                            <a>Hasil dari Perhitungan Naive Bayes</a>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Hasil</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Hasil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No KK</th>
                                        <th>:</th>
                                        <td><span id="nokk"></span></td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <th>:</th>
                                        <td><span id="nik"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <th>:</th>
                                        <td><span id="nama"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Pekerjaan</th>
                                        <th>:</th>
                                        <td><span id="alamat"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Penghasilan</th>
                                        <th>:</th>
                                        <td><span id="jml_phsl"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggungan</th>
                                        <th>:</th>
                                        <td><span id="jml_art"></span></td>

                                    </tr>
                                    <tr>
                                        <th>Pengeluaran</th>
                                        <th>:</th>
                                        <td><span id="pengeluaran"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Tinggal</th>
                                        <th>:</th>
                                        <td><span id="status_tmpt"></span></td>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <?php
                include "koneksi2.php";
                  $query_cek = mysqli_query($host,"SELECT * FROM tb_penduduk");
                  $cekku = mysqli_num_rows($query_cek);
                  if ($cekku > 0 ) {
                ?>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <?php if ($_SESSION['akses']=='pemdes') : ?>
                            <div class="card-header">

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6" style="text-align:end">
                                        <a href="laporan_hasil.php"><button type="submit" id="btn-pdf" name="pdf"
                                                class="btn  btn-outline-success">
                                                <i class="fas fa-file-pdf"></i> PDF</button></a>
                                        <button type="submit" id="btn-excel" name="excel"
                                            class="btn  btn-outline-success">
                                            <i class="fas fa-file-excel"></i> Excel</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <?php endif ?>
                            <div class="card-body">
                                <form action="" method="post" class="form-hasil">
                                    <table id="example1" class="table table-bordered table-striped  nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Pekerjaan</th>
                                                <th>Penghasilan</th>
                                                <th>ART</th>
                                                <th>Pengeluaran</th>
                                                <th>Tempat Tinggal</th>
                                                <th>Label</th>
                                                <th>Layak</th>
                                                <th>Tidak Layak</th>
                                                <th>Hasil Prediksi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "function.php";          
                                            $query_mysql = mysqli_query($host,"SELECT * FROM tb_klasifikasi")or die(mysqli_error());
                                            $no = 1;
                                            $penghasilan_tampil = penghasilan_tampil_layak();
                                            $penghasilan_tampil2 = penghasilan_tampil_tidak();
                                            $penghasilan_numerik = penghasilan_sum_layak();
                                            $penghasilan_numerik2 = penghasilan_sum_tidak();

                                            $tampil = tampil_layak();//var_dump($tampil);
                                            $tampil2 = tampil_tidak();
                                            $numerik = sum_layak(); //var_dump($numerik);
                                            $numerik2 = sum_tidak();
                                            while($data = mysqli_fetch_array($query_mysql)){ 
                                            
                                            $prob_penghasilan_layak = 1 / sqrt(2*3.14*$penghasilan_numerik)*exp(-(($data['jml_phsl']-penghasilan_mean_layak())**2)/($penghasilan_numerik**2));
                                            $prob_penghasilan_tidak = 1 / sqrt(2*3.14*$penghasilan_numerik2)*exp(-(($data['jml_phsl']-penghasilan_mean_tidak())**2)/($penghasilan_numerik2**2));
                                            //var_dump($penghasilan_numerik);
                                            //var_dump(penghasilan_mean_layak());
                                            //var_dump(penghasilan_mean_tidak());
                                            
                                            $prob_art_layak = 1 / sqrt(2*3.14*$numerik)*exp(-(($data['jml_art']-mean_layak())**2)/($numerik**2));
                                            $prob_art_tdk = 1 / sqrt(2*3.14*$numerik2)*exp(-(($data['jml_art']-mean_tidak())**2)/($numerik2**2));

                                            $hasilLayak = (hitung('jenis_pkj',$data['jenis_pkj'],'Layak') / klasifikasi('Layak'))* ($prob_penghasilan_layak)
                                            *($prob_art_layak)*(hitung('pengeluaran',$data['pengeluaran'],'Layak') / klasifikasi('Layak'))
                                            * (hitung('status_tmpt',$data['status_tmpt'],'Layak') / klasifikasi('Layak'))*(klasifikasi("layak") / totalData());
                                            
                                            $hasilTdkLayak =  (hitung('jenis_pkj',$data['jenis_pkj'],'Tidak Layak') / klasifikasi('Tidak Layak')) * ($prob_penghasilan_tidak)
                                            * ($prob_art_tdk)*(hitung('pengeluaran',$data['pengeluaran'],'Tidak Layak') / klasifikasi('Tidak Layak'))*
                                            (hitung('status_tmpt',$data['status_tmpt'],'Tidak Layak') / klasifikasi('Tidak Layak'))*(klasifikasi("tidak layak") / totalData());
                                            
                                            if ($hasilLayak > $hasilTdkLayak) {
                                                $hasil = 'LAYAK';
                                            }else {
                                                $hasil = 'TIDAK LAYAK';   
                                            }
                                            ?>
                                            <tr>
                                                <td> <?php echo $no++; ?></td>
                                                <td> <?php echo $data['nama']; ?></td>
                                                <td> <?php echo $data['jenis_pkj']; ?></td>
                                                <td> <?php echo $data['jml_phsl']; ?></td>
                                                <td> <?php echo $data['jml_art']; ?> </td>
                                                <td> <?php echo $data['pengeluaran']; ?> </td>
                                                <td> <?php echo $data['status_tmpt']; ?> </td>
                                                <td> <?php echo $data['kelas_asli']; ?> </td>
                                                <td> <?php echo $hasilLayak; ?> </td>
                                                <td> <?php echo $hasilTdkLayak; ?> </td>
                                                <td> <?php echo $hasil; ?> </td>
                                                
                                                
                                                <td style="text-align:center;">
                                                    <button title="Detail" id="detail" type="button"
                                                        class="btn btn-link" data-toggle="modal"
                                                        data-target="#exampleModal"
                                                        data-nokk="<?php echo $data['no_kk']; ?>"
                                                        data-nik="<?php echo $data['nik']; ?>"
                                                        data-nama="<?php echo $data['nama']; ?>"
                                                        data-alamat="<?php echo $data['alamat']; ?>"
                                                        data-jenis_pkj="<?php echo $data['jenis_pkj']; ?>"
                                                        data-jml_phsl="<?php echo $data['jml_phsl']; ?>"
                                                        data-jml_art="<?php echo $data['jml_art']; ?>"
                                                        data-pengeluaran="<?php echo $data['pengeluaran']; ?>"
                                                        data-status_tmpt="<?php echo $data['status_tmpt']; ?>"
                                                        >
                                                        <i class="fas fa-eye"></i></button>
                                                </td>
                                            </tr>
                                            <?php }?>
                                    </table>
                                </form>
                                <?php
                            include "koneksi2.php";
                            $query = mysqli_query($host,"SELECT * FROM tb_klasifikasi");
                            $cek = mysqli_num_rows($query);
                            if ($cek > 0 ) {
                            
                            ?>
                                <?php
                                    $layak_tdk = 0;
                                    $tidak_layak = 0;
                                    $tidak_tidak =0;
                                    //Total
                                    $total = mysqli_query($host,"SELECT COUNT(kelas_asli)FROM tb_klasifikasi");
                                    $tot = mysqli_fetch_row($total);
                                    //Layak_Layak
                                    $query_layak_layak = mysqli_query($host,"SELECT COUNT(kelas_asli)FROM tb_klasifikasi 
                                    WHERE kelas_asli='Layak' AND label_prediksi='Layak'");
                                    $layak_layak = mysqli_fetch_row($query_layak_layak);//var_dump($layak_layak);
                                    //Tidak_Tidak
                                    $query_tidak_tidak = mysqli_query($host,"SELECT COUNT(kelas_asli)FROM tb_klasifikasi 
                                    WHERE kelas_asli='Tidak Layak' AND label_prediksi='Tidak Layak'");
                                    $tidak_tidak = mysqli_fetch_row($query_tidak_tidak);//var_dump($layak_layak);
                                    //Layak_Tidak
                                    $query_layak_tidak = mysqli_query($host,"SELECT COUNT(kelas_asli)FROM tb_klasifikasi 
                                    WHERE kelas_asli='Layak' AND label_prediksi='Tidak Layak'");
                                    $layak_tidak = mysqli_fetch_row($query_layak_tidak);//var_dump($layak_layak);
                                    //Tidak_Layak
                                    $query_tidak_layak = mysqli_query($host,"SELECT COUNT(kelas_asli)FROM tb_klasifikasi 
                                    WHERE kelas_asli='Tidak Layak' AND label_prediksi='Layak'");
                                    $tidak_layak = mysqli_fetch_row($query_tidak_layak);//var_dump($layak_layak);
                                ?>
                                <table id="example1" class="table table-bordered" style="width:100%">
                                    <tr style="text-align:center;background:#5ca2ec">
                                        <th colspan="3">Confusion Matrik</th>
                                    </tr>
                                    <tr>

                                        <th style="text-align:center;"></th>
                                        <th colspan="2" style="text-align:center;">Hasil Prediksi</th>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <th style="text-align:center;">Label</th>
                                        <td>Positive</td>
                                        <td>Negative</td>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <td>Layak</td>
                                        <td><?php echo $layak_layak[0] ?></td>
                                        <td><?php echo $layak_tidak[0] ?></td>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <td>Tidak Layak</td>
                                        <td><?php echo $tidak_layak[0] ?></td>
                                        <td><?php echo $tidak_tidak[0] ?></td>
                                    </tr>
                                </table>
                                <table id="example1" class="table table-bordered" style="width:100%;margin-top:9px">
                                    <tr style="text-align:center;background:#5ca2ec">
                                        <th colspan="2">Perhitungan Akurasi</th>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <td>True Positive (TP) </td>
                                        <td><?php echo $layak_layak[0] ?></td>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <td>True Negative (TN)</td>
                                        <td><?php echo $tidak_tidak[0] ?></td>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <td>False Positive (FP) </td>
                                        <td><?php echo $tidak_layak[0] ?></td>
                                    </tr>
                                    <tr style="text-align:center;">
                                        <td>False Negative (FN) </td>
                                        <td><?php echo $layak_tidak[0] ?></td>
                                    </tr>
                                    <tr style="text-align:center;background:#d6d6d6;">
                                        <td><b>Total</b></td>
                                        <td><?php echo $tot[0] ?></td>
                                    </tr>
                                    <tr style="text-align:center;background:#d6d6d6;">
                                        <?php
                                    $tp_tn = $layak_layak[0] + $tidak_tidak[0];
                                    $tp_tn_fp_fn = $layak_layak[0] + $tidak_tidak[0]+$layak_tidak[0]+$tidak_layak[0];

                                    $hasilakrasi = ($tp_tn / $tp_tn_fp_fn)*100;
                                    ?>
                                        <td><b>Akurasi (%)</b></td>
                                        <td><?php echo number_format($hasilakrasi,1,',','.') ?> %</td>
                                    </tr>
                                </table>
                                <?php } else {
                                echo '<div class="alert alert-danger" role="alert">
                                Data Uji Tidak Ada, Isi Data Uji dulu !!!
                                </div>';
                                }?>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <?php } else {
              echo '<div class="alert alert-danger" role="alert">
              Data Training Tidak Ada, Isi Data Training dulu !!!
              </div>';
            }?>

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