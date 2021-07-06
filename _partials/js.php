<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!--Datepicker-->
<script src="dist/js/bootstrap-datepicker.js"></script>
<script src="_partials/docs.min.js"></script>
<script>
$(function() {

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>

<script type="text/javascript">
$(function() {
    $(".datepicker").datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: false,
    });
    $("#tgl_mulai").on('changeDate', function(selected) {
        var startDate = new Date(selected.date.valueOf());
        $("#tgl_akhir").datepicker('setStartDate', startDate);
        if ($("#tgl_mulai").val() > $("#tgl_akhir").val()) {
            $("#tgl_akhir").val($("#tgl_mulai").val());
        }
    });
});
</script>

<script>
$(document).ready(function() {
    $(document).on('click', '#detail', function() {
        var nokk = $(this).data('nokk');
        var nik = $(this).data('nik');
        var nama = $(this).data('nama');
        var alamat = $(this).data('alamat');
        var jenis_pkj = $(this).data('jenis_pkj');
        var jml_phsl = $(this).data('jml_phsl');
        var jml_art = $(this).data('jml_art');
        var pengeluaran = $(this).data('pengeluaran');
        var status_tmpt = $(this).data('status_tmpt');
        var hasil = $(this).data('hasil');
        $('#nokk').text(nokk);
        $('#nik').text(nik);
        $('#nama').text(nama);
        $('#alamat').text(alamat);
        $('#jenis_pkj').text(jenis_pkj);
        $('#jml_phsl').text(jml_phsl);
        $('#jml_art').text(jml_art);
        $('#pengeluaran').text(pengeluaran);
        $('#status_tmpt').text(status_tmpt);
        $('#hasil').text(hasil);

    })
})
</script>
<script>
$(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
    $("#check-all").click(function() { // Ketika user men-cek checkbox all
        $('.check-item').prop('checked', this.checked);
        if ($(this).is(":checked")) // Jika checkbox all diceklis
            $(".check").addClass('removeRow'); // ceklis semua checkbox siswa dengan class "check-item"
        else // Jika checkbox all tidak diceklis
            $(".check").removeClass(
            'removeRow'); // un-ceklis semua checkbox siswa dengan class "check-item"
    });

    $('#btn-delete').click(function() {
        if (confirm("Apakah anda yakin ingin menghapus data ini ?")) {
            var id_penduduk = [];
            $('input.check-item:checked').each(function(i) {
                id_penduduk[i] = $(this).val();
            });
            if (id_penduduk.length === 0) {
                alert("Pilih Data terlebih dahulu");
            } else {
                $.ajax({
                    url: 'delall.php',
                    method: 'post',
                    data: {
                        id_penduduk: id_penduduk
                    },
                    success: function() {
                        window.location = "listPenduduk.php";

                    }
                });
            }
        } else {
            return false;
        }
    });
});
</script>
<script>
$('#del-uji').click(function() {
    if (confirm("Apakah anda yakin ingin menghapus data ini ?")) {
        var id_uji = [];
        $('input.check-item:checked').each(function(i) {
            id_uji[i] = $(this).val();
        });
        if (id_uji.length === 0) {
            alert("Pilih Data terlebih dahulu");
        } else {
            $.ajax({
                url: 'del.php',
                method: 'post',
                data: {
                    id_uji: id_uji
                },
                success: function() {
                    window.location = "listuji.php";

                }
            });
        }
    } else {
        return false;
    }
});
</script>
<script>
//menghilangkan alert
$(document).ready(function() {
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
});
</script>