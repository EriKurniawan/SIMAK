@extends('pages.admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item active">Beranda</li>
                            <li class="breadcrumb-item"><a href='/surat/sk/index'>Surat Keluar</a></li>
                            <li class="breadcrumb-item active">Tambah Data Surat Keluar</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <!-- form start -->
                            <form action="/surat/sk/store" method="POST" enctype="multipart/form-data" id="suratForm">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="cek_numbers">Nomor Surat <code>*</code></label>
                                        <input type="text" name="cek_number" class="form-control" id="cek_number" placeholder="" value="{{ 'xx/' . $nomor . '/II.15/TUBABA/2024' }}">
                                        <small id="cek_numbers" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tujuan">Tujuan Surat <code>*</code></label>
                                        <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="" value="{{ old('tujuan') }}">
                                        <small id="tujuanSuratError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat<code>*</code></label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="tanggal_surat" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('tanggal_surat') }}" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <small id="tanggalSuratError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="perihal">Perihal<code>*</code></label>
                                        <input type="text" name="perihal" class="form-control" id="perihal" placeholder="" value="{{ old('perihal') }}">
                                        <small id="perihalSuratError" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Kode Klasifikasi<code>*</code></label>
                                        <select id="keterangans" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option selected disabled>Pilih Kode</option>
                                            @foreach ($data_keterangan as $keterangan)
                                                <option value="{{ $keterangan->keterangan }}">{{ $keterangan->keterangan }}</option>
                                            @endforeach
                                        </select>
                                        <small id="keteranganSuratError" class="text-danger"></small>
                                    </div>

                                    <div class="form-group" id="subKeterangan" hidden>
                                        <label for="subKeterangans">Sub Kode Klasifikasi<code>*</code></label>
                                        <select id="options" name="keterangan" class="form-control select2 select2-primary" style="width: 100%;">

                                        </select>
                                        <small id="subKeteranganError" class="text-danger"></small>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="lampiran">Unggah File<code>*</code></label>
                                        <div class="mb-3">
                                            <input type="file" name="lampiran" class="form-control" id="lampiran">
                                            <small id="lampiranSuratError" class="text-danger"></small>
                                        </div>
                                    </div> --}}
                                </div>
                                <script>
                                    function validateForm(formId) {
                                        var form = document.getElementById(formId);
                                        var errors = false;

                                        // Logika validasi form disini...

                                        return !errors;
                                    }
                                </script>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" onclick="validateForm('suratMasuk')">Simpan</button>

                                </div>
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('script')
    <script>
        $('#keterangans').change(function(e) {
            e.preventDefault();
            var ket = $(this).val();
            $.ajax({
                type: "get",
                url: "/surat/sk/create/kategori",
                data: {
                    keterangan: ket[0] + ket[1] + ket[2]
                },
                success: function(response) {
                    $('#options').html('');
                    var array = ['<option selected disabled>Pilih Sub Kode Klasifikasi</option>'];
                    $.each(response.data, function(indexInArray, valueOfElement) {
                        var data = valueOfElement.keterangan;
                        array.push('<option value="' + data + '">' + data + '</option>')
                    });
                    var string = array.join(' ');
                    $('#options').append(string);
                    $('#subKeterangan').attr('hidden', false)
                    // console.log(string);
                }
            });
        });

        $('#options').change(function(e) {
            e.preventDefault();

            var ket = $(this).val();
            var nomor = $('#cek_number').val();

            var explode = nomor.split('/');
            var string;

            // Mengambil jumlah karakter yang sesuai dengan panjang 'ket'
            var angkaPertama = ket.substring(0, ket.length);

            // Hilangkan spasi dan karakter non-digit dari angka pertama
            angkaPertama = angkaPertama.replace(/[^\d.]/g, '');

            // Gabungkan angka pertama dengan bagian lain dari 'nomor' yang sudah dipisahkan
            string = angkaPertama + '/' + explode.slice(1).join('/');

            $('#cek_number').val(string);
        });
    </script>
@endpush
