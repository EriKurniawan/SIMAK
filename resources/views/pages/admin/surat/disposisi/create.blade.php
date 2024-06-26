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
                            <li class="breadcrumb-item"><a href="/surat/sm/index">Surat Masuk</a></li>
                            <li class="breadcrumb-item active">Tambah Disposisi</li>
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
                            <form action="/surat/disposisi/store" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="asal_surat">Asal Surat <code>*</code></label>
                                        <input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="" value="{{ $data->asal_surat }}">
                                        @error('asal_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nomor_surat">Nomor Surat<code>*</code></label>
                                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="" value="{{ $data->nomor_surat }}">
                                        @error('nomor_surat')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="tanggal_surat">Tanggal Surat<code>*</code></label>
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
                                        <label for="tanggal_diterima">Tanggal Diterima<code>*</code></label>
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
                                        <label for="nomor_agenda">Nomor Agenda<code>*</code></label>
                                        <input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        <label for="example4">Sifat :<code>*</code></label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- checkbox -->
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sifat_sangat_segera" name="sifat_surat" value="Sangat Segera">
                                                        <label class="form-check-label" for="sifat_sangat_segera">Sangat Rahasia</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sifat_segera" name="sifat_surat" value="Segera">
                                                        <label class="form-check-label" for="sifat_segera">Rahasia</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sifat_rahasia" name="sifat_surat" value="Rahasia">
                                                        <label class="form-check-label" for="sifat_rahasia">Penting</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="sifat_rahasia" name="sifat_surat" value="Rahasia">
                                                        <label class="form-check-label" for="sifat_rahasia">Biasa</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="perihal">Perihal<code>*</code></label>
                                        <input type="text" class="form-control" id="perihal" name="perihal" placeholder="" value="{{ $data->perihal }}">
                                        @error('perihal')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="example6">Diteruskan kepada :<code>*</code></label>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <!-- checkbox -->
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="sekertaris_dinas" name="diteruskan" value="Sekertaris Dinas">
                                                                <label class="form-check-label" for="sifat_sangat_segera">Sekertaris Dinas</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="bidang_informasi_&_statistik" name="diteruskan" value="Bidang Informasi & Statistik">
                                                                <label class="form-check-label" for="bidang_informasi_&_statistik">Bidang Informasi & Statistik</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="bidang_aplikasi" name="diteruskan" value="Bidang Media">
                                                                <label class="form-check-label" for="bidang_aplikasi">Bidang Media</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="bidang_teknologi_komunikasi" name="diteruskan" value="Bidang Teknologi Komunikasi & Persandian">
                                                                <label class="form-check-label" for="bidang_teknologi_komunikasi">Bidang Teknologi Komunikasi & Persandian</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="bidang_aplikasi_&_sistem_informasi" name="diteruskan" value="Bidang Aplikasi & Sistem Informaasi">
                                                                <label class="form-check-label" for="bidang_aplikasi_&_sistem_informasi">Bidang Aplikasi & Sistem Informaasi</label>
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
                                                                <input class="form-check-input" type="checkbox" id="tanggapan_dan_saran" name="hormat" value="Tanggapan dan saran">
                                                                <label class="form-check-label" for="tanggapan_dan_saran">Tanggapan dan saran</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"id="proses_lebih_lanjut" name="hormat" value="Proses lebih lanjut">
                                                                <label class="form-check-label" for="proses_lebih_lanjut">Proses lebih lanjut</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="koordinasi" name="hormat" value="Koordinasi/konfirmasikan">
                                                                <label class="form-check-label" for="koordinasi">Koordinasi/konfirmasikan</label>
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
                                        <label for="catatan">Catatan<code>*</code></label>
                                        <textarea id="catatan" class="form-control" name="catatan" rows="4"></textarea>
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
@endsection
