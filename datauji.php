<?php session_start();?>
<?php
$c = array("jenis_pkj","jml_phsl","jml_art","pengeluaran","status_tmpt");
include "function.php";


?>
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
            <h1 class="m-0 text-dark">Data Uji </h1>
            <a>Proses Perhitungan Data Uji</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Uji</li>
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
            <div class="card-header">
            <h3 class="card-title"><button type="button" onclick="history.back();" class="btn btn-block btn-outline-primary"><i class="fas fa-arrow-alt-circle-left"></i></i> Kembali</button></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form" method="POST" action="">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kk">No KK </label>
                            <input type="number" name="kk" class="form-control" id="kk" placeholder="No KK" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nik">NIK </label>
                            <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK" required>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label >Status Tempat Tinggal</label>
                        <select class="custom-select" name="pekerjaan">
                            <option value="Petani">Petani</option>
                            <option value="Pedagang">Pedagang</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="PNS">PNS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="penghasilan">Penghasilan</label>
                        <input type="number" name="penghasilan" class="form-control" id="penghasilan" placeholder="penghasilan" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="art">Anggota Rumah</label>
                            <input type="number" name="art" class="form-control" id="art" placeholder="Anggota Rumah" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="penggeluaran">Jumlah penggeluaran perhari</label>
                        <select class="custom-select" name="penggeluaran" id="penggeluaran">
                            <option value="kurangRp.50.000">< Rp.50.000</option>
                            <option value="Rp.50.000 – Rp.100.000">Rp.50.000 – Rp.100.000</option>
                            <option value="lebihRp.100.000">> Rp.100.000</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Status Tempat Tinggal</label>
                    <select class="custom-select" name="tempat">
                          <option value="Numpang">Numpang</option>
                          <option value="Sewa">Sewa</option>
                          <option value="Milik Sendiri">Milik Sendiri</option>
                        </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Proses</button>
                </div>
              </form>
                <?php 
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
                ?>
                
                <h4>Data Kasus Terbaru</h4>
                <table style="margin-top:9px" class="table table-bordered">
                    <thead>
                        <tr style="background-color:#c1c1c1">
                            <th rowspan="2" class="align-middle text-center">Perhitungan</th>
                            <th colspan="2">Pekerjaan(<?= $pekerjaan ?>)</th>
                            <th colspan="2">Penghasilan(<?= $penghasilan ?>)</th>
                            <th colspan="2">Jumlah ART(<?= $art ?>)</th>
                            <th colspan="2">Pengeluaran(<?= $penggeluaran ?>)</th>
                            <th colspan="2">Status Tempat Tinggal(<?= $tempat ?>)</th>
                           
                        </tr>
                        <tr style="background-color:#c1c1c1">
                            <th>Layak</th>
                            <th>Tidak Layak</th>
                            <th>Layak</th>
                            <th>Tidak Layak</th>
                            <th>Layak</th>
                            <th>Tidak Layak</th>
                            <th>Layak</th>
                            <th>Tidak Layak</th>
                            <th>Layak</th>
                            <th>Tidak Layak</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                          $penghasilan_tampil = penghasilan_tampil_layak();
                          $penghasilan_tampil2 = penghasilan_tampil_tidak();
                          $penghasilan_numerik = penghasilan_sum_layak();
                          $penghasilan_numerik2 = penghasilan_sum_tidak();
                          $prob_penghasilan_layak = 1 / sqrt(2*3.14*$penghasilan_numerik)*exp(-(($penghasilan-penghasilan_mean_layak())**2)/($penghasilan_numerik**2));
                          $prob_penghasilan_tidak = 1 / sqrt(2*3.14*$penghasilan_numerik2)*exp(-(($penghasilan-penghasilan_mean_tidak())**2)/($penghasilan_numerik2**2));
                          var_dump($penghasilan_numerik);
                          //var_dump(penghasilan_mean_layak());
                          //var_dump(penghasilan_mean_tidak());
                          $tampil = tampil_layak();//var_dump($tampil);
                          $tampil2 = tampil_tidak();
                          $numerik = sum_layak(); //var_dump($numerik);
                          $numerik2 = sum_tidak();
                          $prob_art_layak = 1 / sqrt(2*3.14*$numerik)*exp(-(($art-mean_layak())**2)/($numerik**2));
                          $prob_art_tdk = 1 / sqrt(2*3.14*$numerik2)*exp(-(($art-mean_tidak())**2)/($numerik2**2));
                        ?>
                            <td>Probabilitas</td>
                            <td><?= number_format(hitung('jenis_pkj',$pekerjaan,'Layak') / klasifikasi('Layak'),7,',','.'); ?></td>
                            <td><?= number_format(hitung('jenis_pkj',$pekerjaan,'Tidak Layak') / klasifikasi('Tidak Layak'),7,',','.');?></td>
                            <td><?= number_format($prob_penghasilan_layak,7,',','.');?></>
                            <td><?= number_format($prob_penghasilan_tidak,7,',','.');?></td>
                            <td><?= number_format($prob_art_layak,7,',','.');?></>
                            <td><?= number_format($prob_art_tdk,7,',','.');?></td>
                            <td><?= number_format(hitung('pengeluaran',$penggeluaran,'Layak') / klasifikasi('Layak'),7,',','.');?></td>
                            <td><?= number_format(hitung('pengeluaran',$penggeluaran,'Tidak Layak') / klasifikasi('Tidak Layak'),7,',','.');?></td>
                            <td><?= number_format(hitung('status_tmpt',$tempat,'Layak') / klasifikasi('Layak'),7,',','.');?></td>
                            <td><?= number_format(hitung('status_tmpt',$tempat,'Tidak Layak') / klasifikasi('Tidak Layak'),7,',','.');?></td>
                            
                        </tr>
                        <?php 
                        $labelLayak = klasifikasi("layak") / totalData();
                        $labelTdk = klasifikasi("tidak layak") / totalData();
                        $hasilLayak = (hitung('jenis_pkj',$pekerjaan,'Layak') / klasifikasi('Layak'))* ($prob_penghasilan_layak)
                        *($prob_art_layak)*(hitung('pengeluaran',$penggeluaran,'Layak') / klasifikasi('Layak'))
                        * (hitung('status_tmpt',$tempat,'Layak') / klasifikasi('Layak'))*($labelLayak);
                        
                        $hasilTdkLayak =  (hitung('jenis_pkj',$pekerjaan,'Tidak Layak') / klasifikasi('Tidak Layak')) * ($prob_penghasilan_tidak)
                        * ($prob_art_tdk)*(hitung('pengeluaran',$penggeluaran,'Tidak Layak') / klasifikasi('Tidak Layak'))*
                        (hitung('status_tmpt',$tempat,'Tidak Layak') / klasifikasi('Tidak Layak'))*($labelTdk);

                        if ($hasilLayak > $hasilTdkLayak) {
                            $hasil = 'Layak';
                        }else {
                            $hasil = 'Tidak Layak';
                        }
                        ?>
                        <tr>
                            <td>Layak</td>
                            <td colspan="12"><?= hitung('jenis_pkj',$pekerjaan,'Layak') / klasifikasi('Layak'). ' * ' .$prob_penghasilan_layak. ' 
                            * ' .$prob_art_layak. ' * ' .hitung('pengeluaran',$penggeluaran,'Layak') / klasifikasi('Layak'). '
                            * ' .hitung('status_tmpt',$tempat,'Layak') / klasifikasi('Layak').' * '.klasifikasi("Layak") / totalData().' = '; ?><b><?= $hasilLayak; ?></b></td>
                        </tr>
                        <tr>
                            <td>Tidak Layak</td>
                            <td colspan="12"><?= hitung('jenis_pkj',$pekerjaan,'Tidak Layak') / klasifikasi('Tidak Layak'). ' * ' .$prob_penghasilan_tidak. ' 
                            * ' .$prob_art_tdk. ' * ' .hitung('pengeluaran',$penggeluaran,'Tidak Layak') / klasifikasi('Tidak Layak'). '
                            * ' .hitung('status_tmpt',$tempat,'Tidak Layak') / klasifikasi('Tidak Layak').' * '.klasifikasi("Tidak Layak") / totalData().' = '; ?><b><?= $hasilTdkLayak; ?></b></td>
                        </tr>
                    
                </table>
                <table style="margin-top:9px" class="table table-bordered">
                    <thead>
                        <tr style="background-color:#c1c1c1">
                        <th>No KK</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Penghasilan</th>
                        <th>Jumlah ART</th>
                        <th>Pengeluaran</th>
                        <th>Status Tempat Tinggal</th>
                        <th>Klasifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $kk; ?></td>
                        <td><?php echo $nik; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $pekerjaan; ?></td>
                        <td><?php echo $penghasilan; ?></td>
                        <td><?php echo $art; ?></td>
                        <td><?php echo $penggeluaran; ?></td>
                        <td><?php echo $tempat; ?></td>
                        <td><?php echo $hasil; ?></td>  
                    </tr>
                </table>
                <?php }?>
            </div>
            <!-- /.card-body -->
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
