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
                            <li class="breadcrumb-item"><a href="disposisi_jadi.html">Disposisi Surat</a></li>
                            <li class="breadcrumb-item active">Edit Disposisi Surat</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if (session('status'))
            <div id="statusMessage" class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div id="errorMessage" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

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
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <!-- form start -->
                            <form action="/surat/disposisi/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="asal_surat">Asal Surat</label>
                                        <input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="" value="{{ $data->asal_surat }}">
                                        @error('asal_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="" value="{{ $data->nomor_surat }}">
                                        @error('nomor_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_surat">Tanggal Surat</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="tanggal_surat" name="tanggal_surat" data-target="#reservationdate" value="{{ $data->tanggal_surat }}" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('tanggal_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_diterima">Tanggal Diterima</label>
                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" id="tanggal_diterima" name="tanggal_diterima" data-target="#reservationdate1" value="{{ $data->tanggal_diterima }}" />
                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        @error('tanggal_diterima')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_agenda">Nomor Agenda</label>
                                        <input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda" placeholder="" value="{{ $data->nomor_agenda }}">
                                        @error('nomor_agenda')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="example4">Sifat :</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sifat_sangat_segera" name="sifat_surat[]" value="Sangat Segera" {{ in_array('Sangat Segera', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="sifat_sangat_segera">Sangat Segera</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sifat_segera" name="sifat_surat[]" value="Segera" {{ in_array('Segera', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="sifat_segera">Segera</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sifat_rahasia" name="sifat_surat[]" value="Rahasia" {{ in_array('Rahasia', explode(',', $data->sifat_surat)) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="sifat_rahasia">Rahasia</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="perihal">Perihal</label>
                                        <input type="text" class="form-control" id="perihal" name="perihal" placeholder="" value="{{ $data->perihal }}">
                                        @error('perihal')
                                            <small>{{ $message }}</small>
                                        @enderror
                                        {{-- </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example6">Diteruskan kepada :</label>
                                            <div class="row">
                                                <div class="col-8">
                                                    <!-- checkbox -->
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan[]" value="Sekertaris Dinas" {{ in_array('Sekertaris Dinas', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="diteruskan_sekertaris">Sekertaris Dinas</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Informasi & Statistik"{{ in_array('Bidang Informasi & Statistik', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="diteruskan_sekertaris">Bidang Informasi & Statistik</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Media"{{ in_array('Bidang Media', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="diteruskan_sekertaris">Bidang Media</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Teknologi Komunikasi & Persandian"{{ in_array('Bidang Teknologi Komunikasi & Persandian', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="diteruskan_sekertaris">Bidang Teknologi Komunikasi & Persandian</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Aplikasi & Sistem Informasi"{{ in_array('Bidang Aplikasi & Sistem Informasi', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="diteruskan_sekertaris">Bidang Aplikasi & Sistem Informasi</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">Lainnya...</label>
                                                            <input type="text" class="form-control" id="example7" placeholder="">
                                                        </div>
                                                        <!-- Tambahkan input checkbox lainnya dengan atribut name yang sesuai -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="example7">Dengan Hormat Harap :</label>
                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- checkbox -->
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Tanggapan dan saran"{{ in_array('Tanggapan dan saran', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="hormat_tanggapan_dan_saran">Tanggapan dan saran</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Proses lebih lanjut"{{ in_array('Proses lebih lanjut', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="hormat_tanggapan_dan_saran">Proses lebih lanjut</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Koordinasi/konfirmasikan"{{ in_array('Koordinasi/konfirmasikan', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="hormat_tanggapan_dan_saran">Koordinasi/konfirmasikan</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox">
                                                            <label class="form-check-label">Lainnya...</label>
                                                            <input type="text" class="form-control" id="example7" placeholder="">
                                                        </div>
                                                        <!-- Tambahkan input checkbox lainnya dengan atribut name yang sesuai -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="example6">Diteruskan kepada :<code>*</code></label>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <!-- checkbox -->
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan[]" value="Sekertaris Dinas" {{ in_array('Sekertaris Dinas', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="diteruskan_sekertaris">Sekertaris Dinas</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Informasi & Statistik"{{ in_array('Bidang Informasi & Statistik', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="diteruskan_sekertaris">Bidang Informasi & Statistik</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Media"{{ in_array('Bidang Media', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="diteruskan_sekertaris">Bidang Media</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Teknologi Komunikasi & Persandian"{{ in_array('Bidang Teknologi Komunikasi & Persandian', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="diteruskan_sekertaris">Bidang Teknologi Komunikasi & Persandian</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="diteruskan_sekertaris" name="diteruskan" value="Bidang Aplikasi & Sistem Informasi"{{ in_array('Bidang Aplikasi & Sistem Informasi', explode(',', $data->diteruskan)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="diteruskan_sekertaris">Bidang Aplikasi & Sistem Informasi</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Lainnya...</label>
                                                                    <input type="text" class="form-control" id="example6" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="example7">Dengan Hormat Harap :<code>*</code></label>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <!-- checkbox -->
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Tanggapan dan saran"{{ in_array('Tanggapan dan saran', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="hormat_tanggapan_dan_saran">Tanggapan dan saran</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Proses lebih lanjut"{{ in_array('Proses lebih lanjut', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="hormat_tanggapan_dan_saran">Proses lebih lanjut</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" id="hormat_tanggapan_dan_saran" name="hormat" value="Koordinasi/konfirmasikan"{{ in_array('Koordinasi/konfirmasikan', explode(',', $data->hormat)) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="hormat_tanggapan_dan_saran">Koordinasi/konfirmasikan</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <label class="form-check-label">Lainnya...</label>
                                                                    <input type="text" class="form-control" id="example7" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="catatan">Catatan</label>
                                            <textarea id="catatan" class="form-control" name="catatan" rows="4">{{ $data->catatan }}</textarea>
                                            @error('catatan')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                            </form>
                            {{-- <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="example1">Asal Surat</label>
                                        <input type="text" class="form-control" id="example1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="example2">No Surat</label>
                                        <input type="text" class="form-control" id="example2" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Diterima</label>
                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" />
                                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example3">No Agenda</label>
                                        <input type="text" class="form-control" id="example3" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="example4">Sifat :</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Sangat Segera</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Segera</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Rahasia</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example5">Perihal</label>
                                        <input type="text" class="form-control" id="example1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="example6">Diteruskan kepada :</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Sekertaris Dinas</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Bidang Informasi & Statistik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Bidang Media</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Bidang Teknologi Komunikasi & Persandian</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Bidang Aplikasi & Sistem Informaasi</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <input type="text" class="form-control" id="example6" placeholder="Dan seterusnya...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="example7">Dengan Hormat Harap :</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Tanggapan dan saran</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Proses lebih lanjut</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <label class="form-check-label">Koordinasi/konfirmasikan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox">
                                                        <input type="text" class="form-control" id="example7" placeholder="Dan seterusnya...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputDescription">Catatan</label>
                                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form> --}}
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
