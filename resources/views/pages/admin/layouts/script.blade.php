<!-- Link ke Bootstrap JS dan dependensi Popper.js -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- ChartJS -->
<script src="/assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE App -->
<script src="/assets/js/adminlte.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/jszip/jszip.min.js"></script>
<script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Select2 -->
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<!-- Moment.js -->
<script src="/assets/plugins/moment/moment.min.js"></script>

<!-- InputMask -->
<script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- DateRangePicker -->
<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Bootstrap Colorpicker -->
<script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Bootstrap Switch -->
<script src="/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- BS-Stepper -->
<script src="/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>

<!-- Dropzone -->
<script src="/assets/plugins/dropzone/min/dropzone.min.js"></script>

<!-- Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Page specific script -->
<script>
    $(function() {
        // Initialize Select2 Elements
        $('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        // Initialize Input Masks
        $('[data-mask]').inputmask();

        // Date pickers using datetimepicker
        $('#reservationdate, #reservationdate1').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        // DateTime picker using datetimepicker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        // Date range pickers using daterangepicker
        $('#reservation, #reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        });

        // Date range picker with presets using daterangepicker
        $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        }, function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

        // Timepicker using datetimepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        });

        // Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox();

        // Colorpicker
        $('.my-colorpicker1, .my-colorpicker2').colorpicker();

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        // Bootstrap Switch
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        // Initialize DataTables after all other scripts
        $('#example1').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: []
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#example2').DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true
        });
    });
</script>

<!-- Chart script -->
@if (isset($totalsm) && isset($totalsk))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById("myChart");

            // Check if ctx (canvas) exists in DOM
            if (ctx) {
                const totalsm = {!! json_encode($totalsm) !!};
                const totalsk = {!! json_encode($totalsk) !!};

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Surat Masuk', 'Surat Keluar'],
                        datasets: [{
                            label: 'Grafik Surat',
                            data: [totalsm, totalsk],
                            fill: false,
                            borderColor: 'rgb(0, 119, 204)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script>
@endif

<!-- Additional page specific script -->
<script>
    // Event listener for 'diteruskan_select'
    var diteruskanSelect = document.getElementById("diteruskan_select");
    var lainnyaInput = document.getElementById("lainnya_diteruskan_input");

    if (diteruskanSelect && lainnyaInput) {
        diteruskanSelect.addEventListener("change", function() {
            lainnyaInput.style.display = this.value === "lainnya" ? "block" : "none";
        });
    }
</script>

<!-- Form validation function -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener for form submission
        var submitButton = document.getElementById('submitFormButton');

        // Check if submitButton is null or not
        if (!submitButton) {
            // console.error('Element with ID "submitFormButton" not found.');
            return; // Exit early if the element is not found
        }

        submitButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission to validate first

            var formId = 'suratForm'; // Adjust form ID as needed
            var form = document.getElementById(formId);
            var errors = false;
            if (formId === 'suratMasuk') {
                // Validasi Nomor Surat
                var nomorSurat = form.nomor_surat.value.trim();
                if (nomorSurat === '') {
                    document.getElementById('nomorSuratMasukError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('nomorSuratMasukError').innerText = '';
                }

                // Validasi Asal Surat
                var asalSurat = form.asal_surat.value.trim();
                if (asalSurat === '') {
                    document.getElementById('asalSuratMasukError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('asalSuratMasukError').innerText = '';
                }

                // Validasi Tanggal Surat
                var tanggalSurat = form.tanggal_surat.value.trim();
                if (tanggalSurat === '') {
                    document.getElementById('tanggalSuratMasukError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('tanggalSuratMasukError').innerText = '';
                }

                // Validasi Tanggal Diterima
                var tanggalDiterima = form.tanggal_diterima.value.trim();
                if (tanggalDiterima === '') {
                    document.getElementById('tanggalMasukDiterimaError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('tanggalMasukDiterimaError').innerText = '';
                }

                // Validasi Perihal
                var perihal = form.perihal.value.trim();
                if (perihal === '') {
                    document.getElementById('perihalMasukError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('perihalMasukError').innerText = '';
                }

                // Validasi Lampiran
                var lampiran = form.lampiran.value.trim();
                if (lampiran === '') {
                    document.getElementById('lampiranMasukError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('lampiranMasukError').innerText = '';
                }
            } else if (formId === 'suratForm') {
                // Validasi Tujuan Surat
                var tujuanSurat = form.tujuan.value.trim();
                if (tujuanSurat === '') {
                    document.getElementById('tujuanSuratError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('tujuanSuratError').innerText = '';
                }

                // Validasi Tanggal Surat
                var tanggalSurat = form.tanggal_surat.value.trim();
                if (tanggalSurat === '') {
                    document.getElementById('tanggalSuratError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('tanggalSuratError').innerText = '';
                }

                // Validasi Perihal Surat
                var perihalSurat = form.perihal.value.trim();
                if (perihalSurat === '') {
                    document.getElementById('perihalSuratError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('perihalSuratError').innerText = '';
                }

                // Validasi Keterangan Surat
                var keteranganSurat = form.keterangan.value.trim();
                if (keteranganSurat === '') {
                    document.getElementById('keteranganSuratError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('keteranganSuratError').innerText = '';
                }

                // Validasi Lampiran Surat (jika diperlukan)
                // var lampiranSurat = form.lampiran.value.trim();
                // if (lampiranSurat === '') {
                //     document.getElementById('lampiranSuratError').innerText = 'Form wajib diisi';
                //     errors = true;
                // } else {
                //     document.getElementById('lampiranSuratError').innerText = '';
                // }
            }

            // Jika tidak ada kesalahan, submit form
            if (!errors) {
                form.submit();
            }
        });
    });
</script>
