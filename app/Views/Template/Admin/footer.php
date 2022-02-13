<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">

        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin meninggalkan sistem ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih <b>Keluar</b> jika kamu ingin keluar dari sistem</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger" href="<?= base_url('auth/logout_admin') ?>"><i class="fas fa-fw fa-sign-out-alt"></i> Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/vendor/jquery/jquery.mask.js"></script>
<!-- Select2 JS -->
<script src="<?= base_url() ?>/select2/dist/js/select2.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

<script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>


<script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
    // $(function() {
    //     $('#datetimepicker2').datetimepicker({
    //         locale: 'ru'
    //     });
    // });
    var x = window.matchMedia("(max-width: 700px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction)

    function myFunction(x) {
        if (x.matches) { // If media query matches
            $("body").toggleClass("sidebar-toggled");
            $(".sidebar").toggleClass("toggled");
            if ($(".sidebar").hasClass("toggled")) {
                $('.sidebar .collapse').collapse('hide');
            };
        }
    };

    function formatRupiah(angka) {
        if (angka == null) {
            return 'Rp.-';
        }
        angka = parseInt(angka);
        angka = angka.toString();
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    };
</script>
</body>

</html>