<!-- Link ke Bootstrap JS dan dependensi Popper.js -->

<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="/assets/js/demo.js"></script> --}}
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
<!-- InputMask -->
<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="/assets/plugins/dropzone/min/dropzone.min.js"></script>


<!-- Page specific script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        // Date picker menggunakan datetimepicker
        $('#reservationdate').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        $('#reservationdate1').datetimepicker({
            format: 'DD-MM-YYYY'
        });

        // Date and time picker menggunakan datetimepicker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });


        // Date range picker menggunakan daterangepicker
        $('#reservation').daterangepicker();

        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        });

        // Date range picker dengan tombol
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

        // Timepicker menggunakan datetimepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        });

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'));
    })

    // DropzoneJS Demo Code
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(document.body, {
        url: "/target-url",
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewsContainer: "#previews",
        clickable: ".fileinput-button",
        previewTemplate: document.querySelector('#template').innerHTML,
        autoQueue: false
    });

    myDropzone.on("addedfile", function(file) {
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file);
        };
    });

    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });

    myDropzone.on("sending", function(file) {
        document.querySelector("#total-progress").style.opacity = "1";
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });

    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0";
    });

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
</script>

<!-- Page specific script -->
<script>
    $(function() {
        // Initialize DataTables
        $("#example1").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: []
        }).buttons().container().appendTo("#example1_wrapper .col-md-6:eq(0)");

        $("#example2").DataTable({
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

<!-- Page specific script -->
@if (isset($totalsm) && isset($totalsk))
<script>
    const ctx = document.getElementById("myChart");
    if (ctx) { // Periksa apakah canvas untuk Chart.js ada
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Surat Masuk", "Surat Keluar"],
                datasets: [{
                    label: "Grafik Surat",
                    data: [{
                        !!$totalsm!!
                    }, {
                        !!$totalsk!!
                    }],
                    fill: false,
                    borderColor: "rgb(0, 119, 204)",
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
</script>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const diteruskanSelect = document.getElementById("diteruskan_select");
        const lainnyaInput = document.getElementById("lainnya_diteruskan_input");

        if (diteruskanSelect && lainnyaInput) { // Periksa ketersediaan elemen sebelum menambahkan event listener
            diteruskanSelect.addEventListener("change", function() {
                lainnyaInput.style.display = this.value === "lainnya" ? "block" : "none";
            });
        }
        // Fungsi submitForm
        window.submitForm = function() {
            document.getElementById("deleteForm").submit();
        };
    });
</script>
<script>
    // Memeriksa apakah fungsi validateForm() sudah didefinisikan sebelumnya
    if (typeof validateForm !== 'function') {
        function validateForm(formId) {
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

                // Validasi Perihal
                var perihalSurat = form.perihal.value.trim();
                if (perihalSurat === '') {
                    document.getElementById('perihalSuratError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('perihalSuratError').innerText = '';
                }

                // Validasi Keterangan
                var keteranganSurat = form.keterangan.value.trim();
                if (keteranganSurat === '') {
                    document.getElementById('keteranganSuratError').innerText = 'Form wajib diisi';
                    errors = true;
                } else {
                    document.getElementById('keteranganSuratError').innerText = '';
                }

                // Validasi Lampiran
                // var lampiranSurat = form.lampiran.value.trim();
                // if (lampiranSurat === '') {
                //     document.getElementById('lampiranSuratError').innerText = 'Form wajib diisi';
                //     errors = true;
                // } else {
                //     document.getElementById('lampiranSuratError').innerText = '';
                // }
            }

            if (!errors) {
                form.submit();
            }
        }
    }
</script>
<script>
    function submitForm() {
        document.getElementById("deleteForm").submit();
    }
</script>

<script>
    // Hilangkan pesan setelah 5 detik
    setTimeout(function() {
        var statusMessage = document.getElementById('statusMessage');
        if (statusMessage) {
            statusMessage.remove();
        }

        var errorMessage = document.getElementById('errorMessage');
        if (errorMessage) {
            errorMessage.remove();
        }
    }, 5000); // 5000 milidetik = 5 detik
</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#start_date", {
        dateFormat: "d/m/Y"
    });
    flatpickr("#end_date", {
        dateFormat: "d/m/Y"
    });
</script>